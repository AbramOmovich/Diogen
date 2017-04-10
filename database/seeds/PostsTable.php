<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker\Factory::create();

        $db = DB::table('posts');

        for($i = 0; $i < 508; $i++){
            $values ['title']= $this->faker->sentence;
            $values ['slug'] = str_slug($values['title']);
            $values ['short_description'] = $this->faker->realText(600);
            $values ['description'] = $this->faker->realText(1500);
            $values ['created_at']= $this->faker->dateTimeBetween('-1 years');
            $values ['updated_at'] = clone $values['created_at'];
            $values ['updated_at']->add($values['created_at']->diff(new $this->faker->dateTimeBetween('-1 years'),true));
            $values ['price'] = $this->faker->numberBetween(500, 4000000);
            $values ['photo'] = 'single_family_colonial_1.png';
            $values ['type_id'] = $this->faker->numberBetween(1,3);
            $values ['user_id'] = $this->faker->numberBetween(1,10);

            $db->insert($values);
        }
    }
}
