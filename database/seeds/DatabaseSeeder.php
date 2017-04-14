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
        $this->call(RegionsTable::class);
        $this->call(CreateTypes::class);
        $this->call(UserRoleTable::class);
        $this->call(UserTable::class);
        $this->call(UserPhones::class);
        $this->call(CurrenciesTable::class);
        $this->call(PostsTable::class);
        $this->call(AdressesTable::class);
        $this->call(CommentsTable::class);

    }
}
