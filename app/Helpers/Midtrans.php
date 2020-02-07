<?php 

namespace App\Helpers;

use Illuminate\Http\Request;
use App\Helpers\GuzzleMidtransMidtrans;

class Midtrans
{
	public static function va($type, Array $request)
    {   
        $param = (object)[
            'payment_type' => 'bank_transfer',
            'bank_transfer' => (object)[
                'bank' => $type,
            ],
            'transaction_details' => (object)[
                'order_id' => $request['order_number'],
                'gross_amount' => $request['amount']
            ],
            'customer_details' => (object)[
                'email' => $request['email'],
                'first_name' => $request['first_name'],
                'phone' => $request['phone']
            ],
            'item_details' => $request['item_detail']
        ];

        $token = base64_encode(env('MIDTRANS_SERVER_KEY').':');
        $midtrans = GuzzleMidtrans::post($param,env('MIDTRANS_HOST').'/'.env('MIDTRANS_VERSION').'/','charge',$token);

        return $midtrans['data'];
    }

    public static function gopay(Array $request)
    {   
        $param = (object)[
            'payment_type' => 'gopay',
            'transaction_details' => (object)[
                'order_id' => $request['order_number'],
                'gross_amount' => $request['amount']
            ],
            'customer_details' => (object)[
                'email' => $request['email'],
                'first_name' => $request['first_name'],
                'phone' => $request['phone']
            ],
            'item_details' => $request['item_detail']
        ];
        // dd($param);
        $token = base64_encode(env('MIDTRANS_SERVER_KEY').':');
        $midtrans = GuzzleMidtrans::post($param,env('MIDTRANS_HOST').'/'.env('MIDTRANS_VERSION').'/','charge',$token);

        return $midtrans['data'];
    }
}