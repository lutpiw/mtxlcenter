<?php

namespace App\Livewire\Utility;

use App\Models\ZiswafTransaction;
use Livewire\Component;
use Livewire\WithPagination;

class Timeline extends Component
{
    use WithPagination;

    public $campaignId;
    public $showModal = false;
    public $initialLimit = 5;
    protected $paginationTheme = 'tailwind';

    public function mount($campaignId)
    {
        $this->campaignId = $campaignId;
    }

    public function loadInitialTransactions()
    {
        return ZiswafTransaction::where('ziswaf_campaign_id', $this->campaignId)
            ->orderBy('created_at', 'desc')
            ->take($this->initialLimit)
            ->get();
    }

    public function loadAllTransactions()
    {
        return ZiswafTransaction::where('ziswaf_campaign_id', $this->campaignId)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function toggleModal()
    {
        $this->showModal = !$this->showModal;
        // Reset pagination when opening modal
        if ($this->showModal) {
            $this->resetPage();
        }
    }

    public function render()
    {
        return view('livewire.utility.timeline', [
            'initialTransactions' => $this->loadInitialTransactions(),
            'allTransactions' => $this->showModal ? $this->loadAllTransactions() : null,
        ]);
    }
}
