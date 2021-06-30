<?php

namespace Database\Factories;

use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Report::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tipe = $this->faker->randomElement(['rekening', 'telepon']);
        $users = \App\Models\User::pluck('id')->toArray();

        $report = [
            'user_id' => $this->faker->randomElement($users),
            'tipe_laporan' => $tipe,
            'terverifikasi' => 0,
            'nama_terlapor' => $this->faker->name,
            'kontak_pelaku' => $this->faker->phoneNumber,
            'kronologi' => $this->faker->sentence(12),
            'total_kerugian' =>  $this->faker->numberBetween(10000000, 90000000),
        ];

        if($tipe == 'rekening'){
            $report['bank'] = $this->faker->sentence(2);
            $report['nomor_rekening'] = $this->faker->numberBetween(1000000000, 9000000000);
            $report['platform'] = $this->faker->randomElement(['LINE','WA','IG','Twitter']);
        }

        return $report;
    }
}
