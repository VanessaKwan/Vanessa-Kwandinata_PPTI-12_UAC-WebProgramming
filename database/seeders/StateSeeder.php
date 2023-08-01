<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $states = [
            ['name' => 'jomblo'],
            ['name' => 'waiting'],
            ['name' => 'match'],
        ];

        foreach ($states as $state) {
            State::create($state);
        }
    }
}
