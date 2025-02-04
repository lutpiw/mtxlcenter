<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankAccount extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'account_name',
        'account_number',
        'qris',
        'logo',
        'created_by',
        'updated_by'
    ];

    public function bank() {
        return $this->belongsTo(Bank::class);
    }

    public function ziswafCategories() {
        return $this->hasMany(ZiswafCategory::class, 'bank_account_id');
    }

}
