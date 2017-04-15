<?php

use Illuminate\Database\Seeder;

class UserRoleTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $db = DB::table('user_roles');

        $db->insert(['id' => 1, 'title' => 'Пользователь']);
        $db->insert(['id' => 2, 'title' => 'Админ']);;
    }
}
