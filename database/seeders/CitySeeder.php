<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\State;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gujarat = State::where('name', 'Gujarat')->first();
        $maharashtra = State::where('name', 'Maharashtra')->first();
        $california = State::where('name', 'California')->first();
        $ontario = State::where('name', 'Ontario')->first();

        $cities = [
            ['name' => 'Ahmedabad', 'state_id' => $gujarat->id],
            ['name' => 'Surat', 'state_id' => $gujarat->id],
            ['name' => 'Mumbai', 'state_id' => $maharashtra->id],
            ['name' => 'Pune', 'state_id' => $maharashtra->id],
            ['name' => 'Los Angeles', 'state_id' => $california->id],
            ['name' => 'San Francisco', 'state_id' => $california->id],
            ['name' => 'Toronto', 'state_id' => $ontario->id],
            ['name' => 'Ottawa', 'state_id' => $ontario->id],
        ];

        City::insert($cities);
    }
}
