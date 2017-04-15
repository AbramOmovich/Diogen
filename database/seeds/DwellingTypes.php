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

        $db->insert(['id' => 1, 'title' => 'Комната']);
        $db->insert(['id' => 2, 'title' => 'Квартира']);
        $db->insert(['id' => 3, 'title' => 'Дом']);
        $db->insert(['id' => 4, 'title' => 'Строительство']);
    }
}
