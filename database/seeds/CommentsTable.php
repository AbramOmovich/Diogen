<?php

use App\Post;
use App\User;
use Illuminate\Database\Seeder;

class CommentsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $db = DB::table('comments');

        $faker = Faker\Factory::create();

        $user_ids = User::all()->pluck('id')->toArray();

        foreach (Post::all()->pluck('id')->toArray() as $post_id){
            for ($i = 0; $i < 3; $i++){
                $values ['post_id'] = $post_id;
                $values ['text'] = $faker->realText();
                $values ['user_id'] = array_rand(array_flip($user_ids),1);

                $db->insert($values);
            }
        }
    }
}
