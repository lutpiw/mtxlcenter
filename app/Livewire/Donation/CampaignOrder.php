<?php

namespace App\Livewire\Donation;

use Illuminate\Validation\Rule;
use App\Models\ZiswafCampaign;
use App\Services\DonationService;
use Illuminate\Support\Facades\Log;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class CampaignOrder extends Component
{

    use LivewireAlert;
    use WithFileUploads;

    public $currentStep = 1;
    public $totalSteps = 4;
    public $isStepValid = false;

    // Step 1 - Amount
    public $nominal = '10000';
    public $formattedNominal = '';
    private const MINIMUM_AMOUNT = 10000;

    public $formattedSuggestions = [
        ['value' => 10000, 'display' => 'Rp 10.000'],
        ['value' => 20000, 'display' => 'Rp 20.000'],
        ['value' => 50000, 'display' => 'Rp 50.000'],
        ['value' => 100000, 'display' => 'Rp 100.000'],
        ['value' => 200000, 'display' => 'Rp 200.000'],
        ['value' => 500000, 'display' => 'Rp 500.000'],
    ];

    // Step 2 - Profile
    public $name = '';
    public $email = '';
    public $phone = '';
    public $isAnonymous = false;

    // Step 3 - Agreement
    public $doa = '';
    public $isAgree = false;

    // Step 4 - Payment
    public $paymentMethod = '';
    public $paymentProof;

    public $ziswafCampaign;
    public $bankAccount;
    public $bank;

    public function mount(ZiswafCampaign $ziswafCampaign)
    {
        $this->ziswafCampaign = $ziswafCampaign;
        $this->setNominal(self::MINIMUM_AMOUNT);
        $this->bankAccount = $this->ziswafCampaign->ziswafCategory->bankAccount;
        $this->bank = $this->bankAccount->bank;
        $this->validateCurrentStep();
    }

    protected function rules()
    {
        return [
            // Step 1
            'nominal' => ['required', 'numeric', 'min:' . self::MINIMUM_AMOUNT],

            // Step 2
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email:rfc,dns', 'max:100'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:16'],

            // Step 3
            'isAgree' => ['accepted'],

            // Step 4
            'paymentMethod' => ['required', Rule::in(['bank_transfer', 'qris'])],
            'paymentProof' => [
                'required',
                'image',
                'max:2048', // 2MB Max
                'mimes:jpg,jpeg,png'
            ],
        ];
    }

    protected function messages()
    {
        return [
            // Step 1
            'nominal.required' => 'Nominal donasi harus diisi',
            'nominal.numeric' => 'Nominal donasi harus berupa angka',
            'nominal.min' => 'Minimal donasi adalah Rp ' . number_format(self::MINIMUM_AMOUNT, 0, ',', '.'),

            // Step 2
            'name.required' => 'Nama lengkap harus diisi',
            'name.max' => 'Nama maksimal 255 karakter',
            'phone.required' => 'Nomor telepon harus diisi',
            'phone.regex' => 'Format nomor telepon tidak valid',
            'phone.min' => 'Nomor telepon minimal 10 digit',
            'phone.max' => 'Nomor telepon maksimal 16 digit',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.max' => 'Email maksimal 100 karakter',

            // Step 3
            'isAgree.accepted' => 'Anda harus menyetujui akad dan ketentuan',

            // Step 4
            'paymentMethod.required' => 'Please select a payment method',
            'paymentMethod.in' => 'Invalid payment method selected',
            'paymentProof.required' => 'Bukti pembayaran harus diupload',
            'paymentProof.image' => 'File harus berupa gambar',
            'paymentProof.max' => 'Ukuran file maksimal 2MB',
            'paymentProof.mimes' => 'Format file harus jpg, jpeg, atau png',
        ];
    }

    private function getStepFields($step)
    {
        $steps = [
            1 => ['nominal'],
            2 => ['name', 'email', 'phone'],
            3 => ['isAgree'],
            4 => ['paymentMethod', 'paymentProof'],
        ];

        return $steps[$step] ?? [];
    }

    private function validateCurrentStep()
    {
        $stepFields = $this->getStepFields($this->currentStep);
        $rules = array_intersect_key($this->rules(), array_flip($stepFields));

        try {
            $this->validate($rules, $this->messages());
            $this->isStepValid = true;
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->isStepValid = false;
        }
    }

    // Real-time validation for specific fields
    public function updated($propertyName)
    {
        // Get current step fields
        $stepFields = $this->getStepFields($this->currentStep);

        // Only validate if the updated field belongs to current step
        if (in_array($propertyName, $stepFields)) {
            $this->validateOnly($propertyName, $this->rules(), $this->messages());
            $this->validateCurrentStep();
        }
    }

    // Step 1
    public function setNominal($value)
    {
        $this->nominal = $value;
        $this->formattedNominal = $this->formatNumber($value, 0, ',', '.');
    }

    protected function formatNumber($number)
    {
        return number_format($number, 0, '', '.');
    }

    public function selectAmount($amount)
    {
        $this->setNominal($amount);
        $this->validateOnly('nominal');
    }

    public function updatedFormattedNominal($value)
    {
        // Only keep numeric characters
        $numericValue = (int) preg_replace('/[^0-9]/', '', $value);
        $this->setNominal($numericValue);
        $this->validateOnly('nominal');
    }

    // Step 3
    private function getAkadText()
    {
        $categoryName = strtolower($this->ziswafCampaign->ziswafCategory->name);
        $campaignTitle = $this->ziswafCampaign->name ?? 'campaign ini';
        return "Saya {$this->name} dengan ini menyatakan :\n\n" .
               "1. Mengamanahkan dana <b>{$categoryName}</b> untuk program <b>{$campaignTitle}</b> sebesar <b>Rp. {$this->formattedNominal}</b> \n" .
               "2. Dana yang saya salurkan adalah dana yang halal\n" .
               "3. Saya setuju dana tersebut dikelola oleh Majelis Taklim XL Axiata\n";
    }

    protected function gatherTransactionData(array $validatedData):array
    {
        return [
            'ziswaf_campaign_id' => $this->ziswafCampaign->id,
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'nominal' => $validatedData['nominal'],
            'is_anonymous' => $this->isAnonymous,
            'is_agree' => $this->isAgree,
            'doa' => $this->doa,
            'payment_method' => $validatedData['paymentMethod'],
            'payment_proof' => $validatedData['paymentProof']->store('payment_proofs', 'public'),
            'transaction_id' => $this->generateTrxId(),
        ];
    }

    private function generateTrxId():string
    {
        $categoryPrefix = $this->ziswafCampaign->ziswafCategory->prefix;
        $programPrefix = $this->ziswafCampaign->ziswafProgram->prefix;
        $prefix = $categoryPrefix . $programPrefix . '-' . date('Ymd') . '-';
        $randomNumber = random_int(100000, 999999);
        return $prefix . $randomNumber;
    }

    public function nextStep()
    {
        $this->validateCurrentStep();

        if ($this->isStepValid) {
            if ($this->currentStep < $this->totalSteps) {
                $this->currentStep++;
                $this->validateCurrentStep();
            } else {
                $this->submit();
            }
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
            $this->validateCurrentStep();
        }
    }

    public function submit()
    {
        try {
            $validatedData = $this->validate();
            $transactionData = $this->gatherTransactionData($validatedData);
            $transaction = app(DonationService::class)->createTransaction($transactionData);

            if ($transaction) {
                // Show success message
                session()->flash('message', 'Donation submitted successfully!');

                // You might want to redirect to a thank you page or payment page
                return redirect()->route('donasi.campaign_order_finish', $transaction);
            }
        } catch (\Exception $e) {
            // Handle any errors
            session()->flash('error', 'Failed to submit donation. Please try again.');
            Log::error('Donation submission failed: ' . $e->getMessage());
        }
    }

    public function copyToClipboard($text)
    {
        $this->dispatch('copy-to-clipboard', text: $text);
        $this->alert('success', 'Nomor rekening berhasil disalin!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function render()
    {
        return view('livewire.donation.campaign-order');
    }
}
