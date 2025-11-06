<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\State;
use App\Models\Country;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $india = Country::where('name', 'India')->first();
        $usa   = Country::where('name', 'United States')->first();
        $canada = Country::where('name', 'Canada')->first();

        $states = [
            // India
            ['name' => 'Gujarat', 'country_id' => $india->id],
            ['name' => 'Maharashtra', 'country_id' => $india->id],
            ['name' => 'Karnataka', 'country_id' => $india->id],

            // United States
            ['name' => 'California', 'country_id' => $usa->id],
            ['name' => 'Texas', 'country_id' => $usa->id],

            // Canada
            ['name' => 'Ontario', 'country_id' => $canada->id],
            ['name' => 'Quebec', 'country_id' => $canada->id],
        ];

        State::insert($states);
    }
}
