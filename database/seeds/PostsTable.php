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
            $values ['description'] = $this->faker->realText(450);
            $values ['created_at']= $this->faker->dateTimeBetween('-1 years');
            $values ['updated_at'] = clone $values['created_at'];
            $values ['updated_at']->add($values['created_at']->diff(new $this->faker->dateTimeBetween('-1 years'),true));

            $values ['dwelling_type_id'] = $this->faker->numberBetween(1,3);
            $values ['type_id'] = $this->faker->numberBetween(1,3);
            switch ($values['type_id']){
                case 1 : {
                    switch ($values['dwelling_type_id']){
                        case 1 : {
                            $values ['price'] = $this->faker->numberBetween(50, 250); break;
                        }
                        case 2 : {
                            $values ['price'] = $this->faker->numberBetween(150, 750); break;
                        }
                        case 3 : {
                            $values ['price'] = $this->faker->numberBetween(200, 700); break;
                        }
                    } ;break;
                }
                case 2 : {
                    switch ($values['dwelling_type_id']){
                        case 1 : {
                            $values ['price'] = $this->faker->numberBetween(10000, 25000); break;
                        }
                        case 2 : {
                            $values ['price'] = $this->faker->numberBetween(30000, 70000); break;
                        }
                        case 3 : {
                            $values ['price'] = $this->faker->numberBetween(35000, 85000); break;
                        }
                    } ;break;
                }
                case 3 : {
                    switch ($values['dwelling_type_id']){
                        case 1 : {
                            $values ['price'] = $this->faker->numberBetween(9000, 17000); break;
                        }
                        case 2 : {
                            $values ['price'] = $this->faker->numberBetween(35000, 50000); break;
                        }
                        case 3 : {
                            $values ['price'] = $this->faker->numberBetween(40000, 60000); break;
                        }
                    } ;break;
                }
            }
            $values ['currency_id'] = $this->faker->numberBetween(1,2);
            $values ['photo'] = 'single_family_colonial_1.png';
            $values ['user_id'] = $this->faker->numberBetween(1,10);

            $db->insert($values);
            unset($values);
        }
    }
}
