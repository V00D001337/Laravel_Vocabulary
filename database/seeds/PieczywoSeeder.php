<?php

use Illuminate\Database\Seeder;
use App\Pieczywo;

class PieczywoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 5; $i++){
            Pieczywo::create([
                'nazwa' => str_random(10),
                'skladniki' => str_random(30)
            ]);
        }
    }
}
