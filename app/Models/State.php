<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'country_id'];

    // A state belongs to one country
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // A state has many cities
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    // A state can have many companies
    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
