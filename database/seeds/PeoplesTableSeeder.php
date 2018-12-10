<?php

use Illuminate\Database\Seeder;

class PeoplesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\People::Class, 7000)->create();   
    }
}
