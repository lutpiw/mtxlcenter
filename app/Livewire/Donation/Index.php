<?php

namespace App\Livewire\Donation;

use App\Services\DonationService;
use Livewire\Component;

class Index extends Component
{

    public $data = [];

    public function mount(DonationService $donationService)
    {
        $this->data = $donationService->getIndexData();
    }

    public function render()
    {
        return view('livewire.donation.index');
    }
}
