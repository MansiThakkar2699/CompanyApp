<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // A country has many states
    public function states()
    {
        return $this->hasMany(State::class);
    }

    // A country can have many companies
    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
