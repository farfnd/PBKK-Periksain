<?php

namespace Database\Factories;


use App\Models\Disclaimer;
use Illuminate\Database\Eloquent\Factories\Factory;

class DisclaimerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = disclaimer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = \App\Models\User::pluck('id')->toArray();
        $reports = \App\Models\Report::pluck('id')->toArray();
        return [
            'user_id' => $this->faker->randomElement($users),
            'id_laporan' => $this->faker->randomElement($reports),
            'sanggahan' => $this->faker->sentence(15),
            // 'file' => $this->faker->sentence(15),
            'terverifikasi' => 0
        ];
    }

}
