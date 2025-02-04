<?php

namespace App\Services;

use App\Models\ZiswafTransaction;
use App\Repositories\Contracts\ZiswafCampaignRepositoryInterface;
use App\Repositories\Contracts\ZiswafCategoryRepositoryInterface;
use App\Repositories\Contracts\ZiswafProgramRepositoryInterface;

class DonationService
{
    protected $ziswafCategoryRepository;
    protected $ziswafProgramRepository;
    protected $ziswafCampaignRepository;

    public function __construct(ZiswafCategoryRepositoryInterface $ziswafCategoryRepository,
                                ZiswafProgramRepositoryInterface $ziswafProgramRepository,
                                ZiswafCampaignRepositoryInterface $ziswafCampaignRepository)
    {
        $this->ziswafCategoryRepository = $ziswafCategoryRepository;
        $this->ziswafProgramRepository = $ziswafProgramRepository;
        $this->ziswafCampaignRepository = $ziswafCampaignRepository;
    }

    public function getIndexData()
    {
        $ziswafCategories = $this->ziswafCategoryRepository->getAllCategories();
        $ziswafPrograms = $this->ziswafProgramRepository->getAllPrograms();
        $campaignLatest = $this->ziswafCampaignRepository->getLatest();
        $campaignTrending = $this->ziswafCampaignRepository->getTrending();
        return compact('ziswafCategories', 'ziswafPrograms', 'campaignLatest', 'campaignTrending');
    }

    public function getAllCampaigns()
    {
        return $this->ziswafCampaignRepository->getAllCampaigns();
    }

    public function createTransaction(array $data)
    {
        return ZiswafTransaction::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'doa' => $data['doa'],
            'transaction_id' => $data['transaction_id'],
            'transaction_date' => now()->format('Y-m-d H:i:s'),
            'amount' => $data['nominal'],
            'payment_method' => $data['nominal'],
            'proof' => $data['payment_proof'],
            'ziswaf_campaign_id' => $data['ziswaf_campaign_id'],
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

}
