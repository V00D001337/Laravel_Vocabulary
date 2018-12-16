<?php

use Illuminate\Database\Seeder;
use App\workers;

class workersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=\Faker\Factory::create();    
        for($i=0;$i<100;$i++) {
            $prac=new workers();
            $prac->imie=$faker->word;
            $prac->nazwisko=$faker->word;
            $prac->data_ur=$faker->date($format = 'Y-m-d', $max = 'now');
            $prac->nr_tel=$faker->randomNumber($nbDigits = NULL, $strict = false);
            $prac->pensja=$faker->numberBetween($min = 1000, $max = 9000);
            $prac->save();
    }
}
}
