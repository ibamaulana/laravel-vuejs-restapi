<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitialUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();


        DB::table('price')->insert([
            [
                'price_category' => 'bayi', 
                'price_before_discount' => 19900,
                'price_after_discount' => 14900, 
            ],
            [
                'price_category' => 'pelajar', 
                'price_before_discount' => 46900,
                'price_after_discount' => 23450, 
            ],
            [
                'price_category' => 'personal', 
                'price_before_discount' => 58900,
                'price_after_discount' => 38900, 
            ],
            [
                'price_category' => 'bisnis', 
                'price_before_discount' => 109900,
                'price_after_discount' => 65900, 
            ],
        ]);

    }
}
