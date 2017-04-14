<?php

use Illuminate\Database\Seeder;

class CurrenciesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $db = DB::table('currencies');

        $db->insert(['sign' => '$']);
        $db->insert(['sign' => 'руб.']);
    }
}
