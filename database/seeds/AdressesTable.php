<?php

use App\City;
use App\Post;
use Illuminate\Database\Seeder;

class AdressesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $db = DB::table('addresses');

        $faker = Faker\Factory::create();
        $cities_id = City::all()->pluck('city_id')->toArray();

        foreach (Post::all()->pluck('id')->toArray() as $post_id){
            $values ['post_id'] = $post_id;
            $values ['street'] = $faker->streetAddress;
            $values ['house'] = $faker->numberBetween(1, 300);
            $values ['city_id'] = array_rand(array_flip($cities_id),1);

            $db->insert($values);
        }
    }
}
