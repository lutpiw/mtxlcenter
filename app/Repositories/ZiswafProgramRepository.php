<?php

namespace App\Repositories;

use App\Models\ZiswafProgram;
use App\Repositories\Contracts\ZiswafProgramRepositoryInterface;

class ZiswafProgramRepository implements ZiswafProgramRepositoryInterface
{
    public function getAllPrograms()
    {
        return ZiswafProgram::withCount(['ziswafCampaigns' => function ($query) {
                    $query->where('is_open', true)->where('close_at', '>=', now()->toDateString());
                }])->get();
    }
}
