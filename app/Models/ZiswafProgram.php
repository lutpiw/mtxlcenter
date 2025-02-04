<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ZiswafProgram extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'prefix',
        'icon',
        'bank_account_id',
        'created_by',
        'updated_by'
    ];

    public function ziswafCategories()
    {
        return $this->belongsToMany(ZiswafCategory::class);
    }

    public function ziswafCampaigns()
    {
        return $this->hasMany(ZiswafCampaign::class);
    }

    public function getRouteKeyName()
    {
        return 'slug'; // Pastikan 'slug' adalah kolom yang ada di tabel
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
        $this->attributes['prefix'] = Str::upper(Str::substr($value, 0, 3));
    }
}
