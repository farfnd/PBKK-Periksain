<?php

namespace Database\Seeders;

use App\Models\Disclaimer;
use App\Models\Report;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Report::factory(200)->create();
        // Disclaimer::factory(10)->create();
    }
}
