<?php

use Illuminate\Database\Seeder;

class CreateTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $db = DB::table('post_types');

        $db->insert(['title' => 'Аренда']);
        $db->insert(['title' => 'Продажа']);
        $db->insert(['title' => 'Строительство']);
    }
}
