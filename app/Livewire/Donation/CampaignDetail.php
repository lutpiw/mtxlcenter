<?php

namespace App\Livewire\Donation;

use App\Models\ZiswafCampaign;
use Livewire\Component;

class CampaignDetail extends Component
{

    public $ziswafCampaign;

    public function mount(ZiswafCampaign $ziswafCampaign = null)
    {
        $this->ziswafCampaign = $ziswafCampaign;
        $this->ziswafCampaign->photos = $ziswafCampaign->ziswafCampaignPhotos;
        $this->ziswafCampaign->transaction_count = $ziswafCampaign->paidZiswafTransactions->count();
    }

    public function render()
    {
        //dd($this->ziswafCampaign);
        return view('livewire.donation.campaign-detail');
    }
}
