<?php

namespace App\Api\V1\Controllers;

use Config;
use App\Http\Models\Price;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Notifications\PriceNotification;
use Illuminate\Support\Facades\Notification;

class PriceController extends Controller
{
    public function get()
    {   
        $price = Price::get();

        return response()->json([
            'status' => 'ok',
            'status_code' => 200,
            'data' => $price
        ], 200);
    }

    public function update(Request $request)
    {  
        foreach($request->price as $key){
            $price = Price::where('price_category',$key['price_category'])->first();
            $price->price_category = $key['price_category'];
            $price->price_before_discount = $key['price_before_discount'];
            $price->price_after_discount = $key['price_after_discount'];
            $price->update();
        }

        $send = Notification::send(null, new PriceNotification()); 

        return response()->json([
            'status' => 'ok',
            'status_code' => 200,
            'data' => $price
        ], 200);
    }
}
