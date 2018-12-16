<?php

use Illuminate\Database\Seeder;
use App\Piekarz;
use Carbon\Carbon;

class PiekarzSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 5; $i++){
            Piekarz::create([
                'imie' => str_random(10),
                'nazwisko' => str_random(10),
                'data_zatrudnienia' => Carbon::create(rand(1960, 2015), rand(1, 30), rand(6, 11), 0, 0)->format('Y-m-d'),
                'specjalnosc' => rand(1, 5),
                'ubezpieczenie' => rand(0, 1)
            ]);
        }
    }
}
