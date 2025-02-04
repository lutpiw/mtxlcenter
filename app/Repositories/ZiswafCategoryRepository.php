<?php

namespace App\Repositories;

use App\Models\ZiswafCategory;
use App\Repositories\Contracts\ZiswafCategoryRepositoryInterface;

class ZiswafCategoryRepository implements ZiswafCategoryRepositoryInterface
{
    public function getAllCategories()
    {
        return ZiswafCategory::withCount(['ziswafCampaigns' => function ($query) {
                    $query->where('is_open', true)->where('close_at', '>=', now()->toDateString());
                }])->get();
    }
}
