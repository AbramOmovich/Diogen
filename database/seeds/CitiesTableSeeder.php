<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $db = DB::table('cities');

        $cities = unserialize( file_get_contents('d:\OpenServer\domains\estate\database\seeds\citiesSeeder'));

        foreach ($cities as $city){
            $db->insert($city);
        }
    }
}
