<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ZiswafCategory extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'bank_account_id',
        'prefix',
        'created_by',
        'updated_by'
    ];

    public function bankAccount() {
        return $this->belongsTo(BankAccount::class);
    }

    public function ziswafPrograms() {
        return $this->belongsToMany(ZiswafProgram::class);
    }

    public function ziswafCampaigns() {
        return $this->hasMany(ZiswafCampaign::class, 'ziswaf_category_id');
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
        $this->attributes['prefix'] = Str::upper(Str::substr($value, 0, 3));
    }
}
