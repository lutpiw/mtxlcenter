<?php

namespace App\Repositories\Contracts;

interface ZiswafCampaignRepositoryInterface
{
    public function getLatest();
    public function getTrending();
    public function getAllCampaigns();
}
