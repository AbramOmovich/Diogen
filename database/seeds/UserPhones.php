<?php

use App\User;
use Illuminate\Database\Seeder;

class UserPhones extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_ids = User::all()->pluck('id')->toArray();
        $db = DB::table('user_phones');

        $this->faker = Faker\Factory::create();

        for ($i = 0; $i < 40; $i++){
            $values ['phone'] = $this->faker->phoneNumber;
            $values ['user_id'] = array_rand(array_flip($user_ids),1);

            $db->insert($values);
        }
    }
}
