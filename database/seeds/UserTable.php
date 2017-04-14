<?php

use Illuminate\Database\Seeder;

class UserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $db = DB::table('users');

        $this->faker = Faker\Factory::create();

        $values ['firstName'] = 'Роман';
        $values ['lastName'] = 'Телепнёв';
        $values ['email'] = 'AbramOmovich@gmail.com';
        $values ['password'] = bcrypt('123123');
        $values ['role_id'] = 2;

        $db->insert($values);

        for($i = 0; $i < 10; $i++) {

            $values ['firstName'] = $this->faker->firstName;
            $values ['lastName'] = $this->faker->lastName;
            $values ['email'] = $this->faker->email;
            $values ['password'] = bcrypt('123123');
            $values ['role_id'] = 1;

            $db->insert($values);
        }
    }
}
