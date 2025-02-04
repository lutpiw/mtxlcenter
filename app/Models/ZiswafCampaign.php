<?php

namespace App\Models;

use App\Helper\CurrencyHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ZiswafCampaign extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'ziswaf_program_id',
        'ziswaf_category_id',
        'cost',
        'close_at',
        'is_open',
        'is_trending',
        'about',
        'thumbnail',
        'created_by',
        'updated_by'
    ];

    public function setNameAttribute($value) {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function ziswafCategory()
    {
        return $this->belongsTo(ZiswafCategory::class);
    }

    public function ziswafCampaignPhotos()
    {
        return $this->hasMany(ZiswafCampaignPhoto::class, 'ziswaf_campaign_id');
    }

    public function ziswafProgram()
    {
        return $this->belongsTo(ZiswafProgram::class);
    }

    public function paidZiswafTransactions()
    {
        return $this->hasMany(ZiswafTransaction::class, 'ziswaf_campaign_id')->where('is_paid', true);;
    }

    public function setAboutAttribute($value)
    {
        $this->attributes['about'] = strip_tags($value, '<p><strong><em><ul><ol><li><br>');
    }

    public function getRemainingDaysAttribute()
    {
        $closeAt = Carbon::parse($this->close_at)->toDateString();
        $today = Carbon::now()->toDateString();
        return Carbon::parse($today)->diffInDays(Carbon::parse($closeAt), true);
    }

    public function scopeOpenOrActive($query)
    {
        return $query->where('is_open', true)
                     ->Where('close_at', '>=', now()->toDateString());
    }


    public function getFormattedCostAttribute()
    {
        return CurrencyHelper::formatRupiah($this->cost);
    }

    public function getFormattedAmountAttribute()
    {
        return CurrencyHelper::formatRupiah($this->paidZiswafTransactions()->sum('amount'));
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($ziswafCampaign) {
            // Hapus file thumbnail
            if ($ziswafCampaign->thumbnail) {
                Storage::disk('public')->delete($ziswafCampaign->thumbnail);
            }

            // Hapus file previews
            foreach ($ziswafCampaign->ziswafCampaignPhotos as $photo) {
                if (Storage::disk('public')->exists($photo->photo)) {
                    Storage::disk('public')->delete($photo->photo);
                }
            }
        });
    }

}
