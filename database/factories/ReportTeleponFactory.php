<?php

namespace Database\Factories;

use App\Models\ReportTelepon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportTeleponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReportTelepon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = \App\Models\User::pluck('id')->toArray();
        return [
            'user_id' => $this->faker->randomElement($users),
            'tipe_laporan' => "BELUM TERVERIFIKASI",
            'nama_terlapor' => $this->faker->name,
            'nomor_telepon' => $this->faker->phoneNumber,
            'kronologi' => $this->faker->sentence(15),
            'total_kerugian' =>  $this->faker->numberBetween(1000000, 90000000),
        ];
    }
}
