<?php

namespace Database\Factories;

use App\Models\ReportRekening;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportRekeningFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReportRekening::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $platform = array("LINE", "WA", "IG", "Twitter");
        $users = \App\Models\User::pluck('id')->toArray();
        return [
            'user_id' => $this->faker->randomElement($users),
            'tipe_laporan' => "BELUM TERVERIFIKASI",
            'nama_terlapor' => $this->faker->name,
            'bank' => $this->faker->sentence(2),
            'nomor_rekening' => $this->faker->numberBetween(1000000000, 9000000000),
            'platform' => $platform[array_rand($platform)],
            'kontak_pelaku' => $this->faker->phoneNumber,
            'kronologi' => $this->faker->sentence(12),
            'total_kerugian' =>  $this->faker->numberBetween(10000000, 90000000),
            'nama_terlapor'  => $this->faker->sentence(2),
        ];
    }
}
