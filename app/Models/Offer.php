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
        'account_id',
    ];

    // public function company()
    // {
    //     return $this->belongsTo(Account::class);
    // }

    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }

    public function entry()
    {
        return $this->belongsTo(Application::class);
    }
}
