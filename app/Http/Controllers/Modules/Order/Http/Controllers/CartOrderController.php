<?php

namespace App\Http\Controllers\Modules\Order\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;
use App\Http\Models\Product;
use App\Http\Models\Categories;
use App\Http\Models\Cart;
use App\Http\Models\CartDetail;
use App\Helpers\RajaOngkir;
use App\Http\Models\Transaction;
use App\Http\Models\TransactionDetail;
use Veritrans_Config;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;

class CartOrderController extends Controller
{
  public function index()
  {
      $userid = @Auth::user()->id;
      if(!empty($userid)){
          $data = Cart::where('user_id',$userid)->where('is_claim',0)->with('cartdetail')->first();
      }else{
          $data = [];
      }

      return view('order::topcart')->withCart($data);
  }

  public function create(Request $request)
  {
      $userid = @Auth::user()->id;
      $cekcart = Cart::where('user_id',$userid)->where('is_claim',0)->with('cartdetail.product');
      if($cekcart->count() == 0){
          //create cart
          $createcart = new Cart();
          $createcart->user_id = $userid;
          $createcart->is_claim = 0;
          $createcart->save();
          //create cart detail
          $createdetail = new CartDetail();
          $createdetail->cart_id = $createcart->id;
          $createdetail->product_id = $request->id;
          $createdetail->qty = 1;
          $createdetail->save();
      }else{
          //update cart detail
          //cek product cart
          $cekcartdetail = CartDetail::where('cart_id',$cekcart->first()->id)->where('product_id',$request->id);
          if($cekcartdetail->count() == 0){
              $createdetail = new CartDetail();
              $createdetail->cart_id = $cekcart->first()->id;
              $createdetail->product_id = $request->id;
              $createdetail->qty = 1;
              $createdetail->save();
          }else{
              $cekcartdetail->update(['qty' => $cekcartdetail->first()->qty+1]);
          }
      }

  }
}
