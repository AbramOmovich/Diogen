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

        $db->insert(['id' => 1, 'title' => 'Аренда']);
        $db->insert(['id' => 2, 'title' => 'Продажа']);
        $db->insert(['id' => 3, 'title' => 'Строительство']);
    }
}
