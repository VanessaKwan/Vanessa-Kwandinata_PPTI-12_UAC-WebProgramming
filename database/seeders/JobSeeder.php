<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $jobs = [
            ['name' => 'IT Engineer'],
            ['name' => 'Database Administrator'],
            ['name' => 'Network'],
            ['name' => 'Data Analyst'],
            ['name' => 'Human Resource'],
            ['name' => 'Phycologist'],
        ];

        foreach ($jobs as $job) {
            Job::create($job);
        }
    }
}
