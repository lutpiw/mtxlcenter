<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'logo',
        'created_by',
        'updated_by'
    ];

    public function bankAccounts() {
        return $this->hasMany(BankAccount::class, 'bank_id');
    }
}
