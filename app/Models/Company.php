<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Company extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tell',
        'company_name',
        'industry_id',
    ];

    public function account()
    {
        return $this->hasMany(Account::class);
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }


}
