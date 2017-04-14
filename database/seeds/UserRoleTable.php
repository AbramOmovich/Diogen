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

        $db->insert(['title' => 'Пользователь']);
        $db->insert(['title' => 'Админ']);;
    }
}
