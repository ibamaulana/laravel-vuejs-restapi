<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ShopInitial extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now = \Carbon\Carbon::now();

        DB::table('shop')->insert([
            ['shop_name' => 'My Daily Wash', 'shop_address' => 'Jakarta', 'shop_contact' => '089688578285', 'shop_email' => 'mydailywash@gmail.com', 'shop_logo' => 'shop/default_senja.jpg', 'shop_description' => 'Daily wash', 'shop_instagram' => '@senjacoffee.smg', 'shop_facebook' => 'Senja Coffee and Space', 'province_id' => 1, 'city_id' => 1, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
        ]);
        DB::table('shop')->insert([
            ['shop_name' => 'Senja Coffee and Space', 'shop_address' => 'Jl. Jatimulyo No.12, Pedalangan, Kec. Banyumanik, Kota Semarang, Jawa Tengah', 'shop_contact' => '089688578285', 'shop_email' => 'senjacoffee@gmail.com', 'shop_logo' => 'shop/default_senja.jpg', 'shop_description' => 'Coffee at dusk', 'shop_instagram' => '@senjacoffee.smg', 'shop_facebook' => 'Senja Coffee and Space', 'province_id' => 1, 'city_id' => 1, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
