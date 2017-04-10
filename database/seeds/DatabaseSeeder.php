<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CreateTypes::class);
        $this->call(UserTable::class);
        $this->call(PostsTable::class);
    }
}
