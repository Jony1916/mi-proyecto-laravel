<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contacto;
use App\Models\Telefono;
use App\Models\Email;
use App\Models\Direccion;
use Faker\Factory as Faker;
class ContactosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5000; $i++) {
            $contacto = Contacto::create([
                'nombre' => $faker->firstName,
                'apellido' => $faker->lastName,
            ]);

            for ($j = 0; $j < rand(1, 3); $j++) {
                // Generar un número de teléfono de 10 dígitos
                $telefono = '';
                for ($k = 0; $k < 10; $k++) {
                    $telefono .= rand(0, 9);
                }

                Telefono::create([
                    'contacto_id' => $contacto->id,
                    'numero' => $telefono,
                ]);

                Email::create([
                    'contacto_id' => $contacto->id,
                    'email' => $faker->email,
                ]);

                Direccion::create([
                    'contacto_id' => $contacto->id,
                    'calle' => $faker->streetAddress,
                    'ciudad' => $faker->city,
                    'estado' => $faker->state,
                    'codigo_postal' => $faker->postcode,
                ]);
            }
        }
    }
}
