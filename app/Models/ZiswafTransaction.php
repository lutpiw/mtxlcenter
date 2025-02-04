<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZiswafTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_paid',
        'name',
            'phone',
            'email',
            'doa',
            'transaction_id',
            'transaction_date',
            'amount',
            'payment_method',
            'proof',
            'ziswaf_campaign_id',
            'created_at',
            'updated_at'
    ];

    public function ziswafCampaign()
    {
        return $this->belongsTo(ZiswafCampaign::class);
    }
}
