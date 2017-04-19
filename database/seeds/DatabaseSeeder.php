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
        $this->call(DwellingTypes::class);
        $this->call(UserRoleTable::class);
        $this->call(UserTable::class);
        $this->call(UserPhones::class);
        $this->call(CurrenciesTable::class);
        $this->call(PostsTable::class);
        $this->call(CommentsTable::class);
        $this->call(DetailsTable::class);
        $this->call(UserContacts::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(AdressesTable::class);

    }
}
