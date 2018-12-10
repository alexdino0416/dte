<?php

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobs = ['Contable',
        'Actor',
        'Azafata',
        'Panadero',
        'Albañil',
        'Carnicero',
        'Portero',
        'Carpintero',
        'Cajero',
        'Consultor',
        'Asesor', 
        'Cocinero',
        'Bailarín',
        'Dentista',
        'Diseñador',
        'Médico',
        'Modista',
        'Economista',
        'Electricista',
        'Ingeniero',
        'Bombero',
        'Pescador',
        'Florista',
        'Peluquero',
        'Cazador',
        'Joyero',
        'Periodista',
        'Abogado',
        'Mecánico',
        'Meteorólogo',
        'Modelo',
        'Enfermero/a',
        'Oficinista',
        'Pintor',
        'repostero',
        'Farmaceútico',
        'Fotógrafo',
        'Fontanero',
        'Policía',
        'Político',
        'Conserje',
        'Cartero',
        'Profesor',
        'Programador',
        'Psiquiatra',
        'Psicólogo',
        'Recepcionista',
        'Investigador',
        'Vendedor',
        'Científico',
        'Secretario',
        'Cantante',
        'Trabajador social',
        'deportista',
        'Cirujano',
        'Taxista',
        'Profesor/a',
        'Telefonista',
        'Agente de viajes',
        'Camionero',
        'Veterinario',
        'Camarero',
        'Escritor'];

        sort($jobs);

        foreach ($jobs as $job) {
            App\Job::create([
                'name' => $job
            ]);
        }
    }
}
