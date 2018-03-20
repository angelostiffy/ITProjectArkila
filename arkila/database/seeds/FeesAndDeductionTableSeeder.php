<?php

use Illuminate\Database\Seeder;
use \App\FeesAndDeduction;

class FeesAndDeductionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FeesAndDeduction::create([
            'description' => 'Community Fund',
            'amount' => '100',
            'type' => 'Fee'
        ]);
    }
}
