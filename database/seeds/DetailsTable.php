<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $db = DB::table('details');

        $faker = Faker\Factory::create();

        $types = Post::all()->pluck('dwelling_type_id')->toArray();
        $post_ids = Post::all()->pluck('id')->toArray();
        for ( $i = 0; $i < count($post_ids); $i++ ){
            $values ['post_id'] = $post_ids[$i];

            switch ($types[$i]){
                //room
                case 1 : {

                    $values ['floor'] = $faker->numberBetween(1, 18);
                    $values ['floor_max'] = $faker->numberBetween($values['floor'],18);
                    $values ['balcony'] = $faker->numberBetween(0,1);
                    $values ['internet'] = $faker->numberBetween(0,1);
                    $values ['parking'] = $faker->numberBetween(0,1);
                    break;
                }
                //apartment
                case 2 : {
                    $values ['rooms'] = $faker->numberBetween(1,5);
                    $values ['square'] = $faker->numberBetween(1, 100);
                    $values ['floor'] = $faker->numberBetween(1, 18);
                    $values ['floor_max'] = $faker->numberBetween($values['floor'],18);
                    $values ['balcony'] = $faker->numberBetween(0,1);
                    $values ['internet'] = $faker->numberBetween(0,1);
                    $values ['parking'] = $faker->numberBetween(0,1);
                    break;
                }
                //house
                case 3 : {
                    $values ['rooms'] = $faker->numberBetween(1,5);
                    $values ['square'] = $faker->numberBetween(1, 100);
                    $values ['internet'] = $faker->numberBetween(0,1);
                    $values ['parking'] = $faker->numberBetween(0,1);
                    break;
                }
            }
            $db->insert($values);
            unset($values);
        }
    }
}
