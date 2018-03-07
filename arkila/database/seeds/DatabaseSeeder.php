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
  		$this->call(TerminalTableSeeder::class);
  		$this->call(DestinationTableSeeder::class);
      $this->call(VanTableSeeder::class);
      $this->call(AnnouncementTableSeeder::class);
      //$this->call(DriverTableSeeder::class);
      //$this->call(TripTableSeeder::class);
      $this->call(MemberTableSeeder::class);
    }
}
