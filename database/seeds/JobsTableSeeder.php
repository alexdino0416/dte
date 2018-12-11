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
        'Dentista',
        'Médico',
        'Ingeniero',
        'Abogado',
        'Mecánico',
        'Fotógrafo',
        'Programador',
        'Científico',
        'Trabajador social'];

        sort($jobs);

        foreach ($jobs as $job) {
            App\Job::create([
                'name' => $job
            ]);
        }
    }
}
