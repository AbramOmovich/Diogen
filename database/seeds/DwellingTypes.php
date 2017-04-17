<?php

use Illuminate\Database\Seeder;

class DwellingTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $db = DB::table('dwelling_types');

        $db->insert(['dwelling_id' => 1, 'title' => 'Комната']);
        $db->insert(['dwelling_id' => 2, 'title' => 'Квартира']);
        $db->insert(['dwelling_id' => 3, 'title' => 'Дом']);
    }
}
