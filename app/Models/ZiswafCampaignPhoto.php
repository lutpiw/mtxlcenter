<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ZiswafCampaignPhoto extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'ziswaf_campaign_id',
        'photo',
        'created_by',
        'updated_by'
    ];

    public function ziswafCampaign()
    {
        return $this->belongsTo(ZiswafCampaign::class);
    }
}
