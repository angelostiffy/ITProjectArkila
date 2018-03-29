<?php

use Illuminate\Database\Seeder;

class VanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Van::class, 30)->create();
    }
}