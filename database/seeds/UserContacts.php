<?php

use App\Post;
use App\UserPhone;
use Illuminate\Database\Seeder;

class UserContacts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $db = DB::table('post_user_phone');

        $faker = Faker\Factory::create();

        $post_ids = Post::all()->pluck('id')->toArray();
        $user_ids = Post::all()->pluck('user_id')->toArray();

        $post_user_id = array_combine($post_ids,$user_ids);

        foreach ($post_user_id as &$user_id){
            $user_phone_ids = UserPhone::where('user_id', $user_id)->get()->pluck('id')->toArray();
            $user_id = array_rand(array_flip($user_phone_ids),$faker->numberBetween(1,count($user_phone_ids)));
        }

        foreach ($post_user_id as $post_id => $user_phone_ids){
            $values ['post_id'] = $post_id;
            if (is_array($user_phone_ids)){
                foreach ($user_phone_ids as $user_phone_id){
                    $values ['user_phone_id'] = $user_phone_id;
                    $db->insert($values);
                }
            }else{
                $values ['user_phone_id'] = $user_phone_ids;
                $db->insert($values);
            }
        }
    }
}
