<?php

use Illuminate\Database\Seeder;

class TerminalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Terminal::class, 2)->create();
    }
}
