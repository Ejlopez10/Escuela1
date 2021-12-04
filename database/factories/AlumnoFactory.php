<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Alumno;

class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'grado_id'=>$this->faker->numerify('###'),
            'Nombre'=>$this->faker->name,
            'identidad'=>$this->faker->numberBetween(0, 9)
            .$this->faker->numberbetween(1950, 2005)
            .$this->faker->unique()->numerify('#####'),
             'Apellido'=>$this->faker->firstName,
             'Nacionalidad'=>$this->faker->randomElement(['hondureño/a','nicaraguense','salvadoreño/a',
             'costaricense','guatemalteco/a']),
            'Ciudad'=>$this->faker->city,
            'Fecha_Nacimiento'=>$this->faker->dateTimeBetween('-40 years', '-16 years'),
            'Nombre_Tutor'=>$this->faker->name,
            'Curso'=>$this->faker->numberBetween(1,12).'º',
        
            //
        ];
    }
}
