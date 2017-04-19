<?php

use Illuminate\Database\Seeder;

class RegionsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $db = DB::table('regions');

        $db->insert(['region_id' => 1, 'title' => 'Минская область']);
        $db->insert(['region_id' => 2, 'title' => 'Брестская область']);
        $db->insert(['region_id' => 3, 'title' => 'Гродненская область']);
        $db->insert(['region_id' => 4, 'title' => 'Витебская область']);
        $db->insert(['region_id' => 5, 'title' => 'Могилёвская область']);
        $db->insert(['region_id' => 6, 'title' => 'Гомельская область']);
    }
}
