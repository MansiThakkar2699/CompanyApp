<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_logo',
        'company_name',
        'email',
        'mobile',
        'services',
        'country_id',
        'state_id',
        'city_id',
        'branches',
    ];

    protected $casts = [
        'services' => 'array',
        'branches' => 'array',
    ];

    // Relationships
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
