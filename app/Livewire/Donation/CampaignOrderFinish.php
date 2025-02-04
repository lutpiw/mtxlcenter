<?php

namespace App\Livewire\Donation;

use App\Models\ZiswafTransaction;
use Livewire\Component;

class CampaignOrderFinish extends Component
{

    public $ziswafTransaction;

    public function mount(ZiswafTransaction $ziswafTransaction)
    {
        $this->ziswafTransaction = $ziswafTransaction;
    }

    public function render()
    {
        return view('livewire.donation.campaign-order-finish');
    }
}
