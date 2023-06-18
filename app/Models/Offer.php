<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'company_id',
    ];

    // OfferとCompanyのリレーション
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Offerとfeatureのリレーション
    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }

    // Offerとentryのリレーション
    public function entry()
    {
        return $this->belongsTo(Application::class);
    }
}
