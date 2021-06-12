<?php

namespace Database\Seeders;

use App\Models\ReportRekening;
use App\Models\ReportTelepon;
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
        // ReportRekening::factory(10)->create();
        ReportTelepon::factory(10)->create();
    }
}
