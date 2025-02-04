<?php

namespace App\Repositories;

use App\Models\ZiswafCampaign;
use App\Models\ZiswafCategory;
use App\Repositories\Contracts\ZiswafCampaignRepositoryInterface;

class ZiswafCampaignRepository implements ZiswafCampaignRepositoryInterface
{

    public function getLatest($limit = 5)
    {
        return ZiswafCampaign::openOrActive()
                ->latest()
                ->take($limit)
                ->get();
    }

    public function getTrending($limit = 5)
    {
        return ZiswafCampaign::openOrActive()
                ->where('is_trending', true)
                ->latest()
                ->take($limit)
                ->get();
    }

    public function getAllCampaigns()
    {
        return ZiswafCampaign::openOrActive()
                ->latest()
                ->get();
    }
}
