<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

        User::create([
            'name' => 'Vanessa',
            'gender' => 'Female',
            'age' => $faker->numberBetween(18, 50),
            'photo' => 'database-assets/vanessa.jpg',
            'password' => Hash::make('password'),
            'username' => 'Vanessa',
            'phone' => '090908971231',
            'state_id' => 1,
            'wallet' => 200000,
            'registPrice' => $faker->numberBetween(100000, 125000),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        for ($i = 0; $i < 20; $i++) {
            User::create([
                'name' => $faker->firstNameFemale,
                'gender' => 'Female',
                'age' => $faker->numberBetween(18, 50),
                'photo' => 'database-assets/female.png',
                'password' => Hash::make('password'),
                'username' => 'https://www.linkedin.com/in/admin' . $i,
                'phone' => $faker->unique()->numerify('##########'),
                'state_id' => 1,
                'registPrice' => $faker->numberBetween(100000, 125000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        for ($i = 0; $i < 20; $i++) {
            User::create([
                'name' => $faker->firstNameMale,
                'gender' => 'Male',
                'age' => $faker->numberBetween(18, 50),
                'photo' => 'database-assets/male.jpeg',
                'password' => Hash::make('password'),
                'username' => 'https://www.linkedin.com/in/admin' . $i,
                'phone' => $faker->unique()->numerify('##########'),
                'state_id' => 1,
                'registPrice' => $faker->numberBetween(100000, 125000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
