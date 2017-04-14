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

        $db->insert(['title' => 'Брестская область']);
        $db->insert(['title' => 'Гродненская область']);
        $db->insert(['title' => 'Витебская область']);
        $db->insert(['title' => 'Могилёвская область']);
        $db->insert(['title' => 'Гомельская область']);
        $db->insert(['title' => 'Минская область']);
    }
}
