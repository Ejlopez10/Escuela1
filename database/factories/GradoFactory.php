<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Grado;

class GradoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'profesor_id'=>$this->faker->numberBetween(1,300),
        'alumno_id'=>$this->faker->numberBetween(1,300),
        'Grado'=>$this->faker->numberBetween(1,12).'º',
            'Nombre_Profesor'=>$this->faker->name,
            'Seccion'=>$this->faker->numerify('####'),
            'Aula'=>$this->faker->numerify('##')
            //
        ];
    }
}
