<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('items')->insert([
            'name' => 'Gin',
            'comments' => 'Blood of creativity',
            'rating' => 9,
            'brew_date' => '1973-09-03',
        ]);
    }
}
