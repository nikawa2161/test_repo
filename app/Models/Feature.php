<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'offer_id',
    ];

    // featureとofferのリレーション
    public function offer()
    {
        return $this->hasOne(Offer::class);
    }
}
