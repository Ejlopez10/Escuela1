<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Profesor;

class ProfesorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'grado_id'=>$this->faker->numberBetween(1,30),
            'Nombre_Profesor'=>$this->faker->name,
            'Email'=> $this->faker->unique()->safeEmail(),
            'Clase'=>$this->faker->randomElement(['Español','Matematicas','Sociologia','Quimica','Educ.Fisica']),
             'Telefono'=>$this->faker->numerify('#######'),
             'Titulo'=>$this->faker->randomElement(['Lic.Educacion Primaria','Lic.Sociologia','Ing.Quimico','Ing.Industrial']),
             'Sueldo'=>$this->faker->numberBetween(10000,22500)
            //
        ];
    }
}
