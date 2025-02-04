<?php

namespace App\Http\Controllers;

use App\Models\ZiswafCategory;
use App\Models\ZiswafProgram;
use App\Services\DonationService;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    protected $donationService;

    public function __construct(DonationService $donationService)
    {
        $this->donationService = $donationService;
    }

    public function donasiByProgram(ZiswafProgram $ziswafProgram)
    {
        $campaigns = $ziswafProgram->ziswafCampaigns;
        return response()->json($campaigns);
    }

    public function donasiByCategory(ZiswafCategory $ziswafCategory)
    {
        $campaigns = $ziswafCategory->ziswafCampaigns;
        return response()->json($campaigns);
    }
}
