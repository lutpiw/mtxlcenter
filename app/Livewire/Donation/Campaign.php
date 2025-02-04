<?php

namespace App\Livewire\Donation;

use App\Helper\CurrencyHelper;
use App\Models\ZiswafCategory;
use App\Models\ZiswafProgram;
use App\Repositories\ZiswafCampaignRepository;
use App\Repositories\ZiswafCategoryRepository;
use App\Repositories\ZiswafProgramRepository;
use App\Services\DonationService;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Campaign extends Component
{

    public $ziswafProgram;
    public $ziswafCategory;
    public $campaigns = [];

    public function mount($ziswafProgramSlug = null, $ziswafCategorySlug = null)
    {
        if ($ziswafProgramSlug) {
            $this->ziswafProgram = ZiswafProgram::where('slug', $ziswafProgramSlug)->firstOrFail();
            $this->methodForProgram($this->ziswafProgram);
        }

        if ($ziswafCategorySlug) {
            $this->ziswafCategory = ZiswafCategory::where('slug', $ziswafCategorySlug)->firstOrFail();
            $this->methodForCategory($this->ziswafCategory);
        }

        if (!$this->ziswafProgram && !$this->ziswafCategory) {
            $this->getAllCampaign();
        }
    }

    public function methodForProgram(ZiswafProgram $ziswafProgram)
    {
        $this->campaigns = $ziswafProgram->ziswafCampaigns->where('is_open', true)->where('close_at', '>=', now()->toDateString());
    }

    public function methodForCategory(ZiswafCategory $ziswafCategory)
    {
        $this->campaigns = $ziswafCategory->ziswafCampaigns->where('is_open', true)->where('close_at', '>=', now()->toDateString());
    }

    public function getAllCampaign()
    {
        $donationService = new DonationService(new ZiswafCategoryRepository, new ZiswafProgramRepository, new ZiswafCampaignRepository);
        $this->campaigns = $donationService->getAllCampaigns();
    }

    public function render()
    {
        //dd($this->campaigns);
        return view('livewire.donation.campaign');
    }
}
