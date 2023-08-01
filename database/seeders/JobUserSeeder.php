<?php

namespace Database\Seeders;

use App\Models\JobUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        for ($i = 0; $i < 30; $i++) {
            JobUser::create([
                'job_id' => mt_rand(1, 6),
                'user_id' => mt_rand(1, 40)
            ]);

        }
    }
}
