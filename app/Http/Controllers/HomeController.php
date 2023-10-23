<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Fooditem;
use App\Models\Cart;
use App\Models\Shipping;
use App\Models\Order;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {
    public function home() {
        $food_items = fooditem::all();
        return view( 'home', compact( 'food_items' ) );
    }

    public function index() {
        if ( Auth::user() ) {
            $usertype = Auth::user()->usertype;
            $user_id = Auth::user()->id;
            if ( $usertype == 1 ) {
                return redirect()->route( 'admindashboard' );

            } else {
                $food_items = fooditem::all();
                $cart_count = Cart::where( 'userId', $user_id )->count();
                return view( 'home', compact( 'food_items', 'cart_count' ) );
            }

        } else {
            $food_items = Fooditem::all();
            return view( 'home', compact( 'food_items' ) );
        }

    }

    public function perform() {
        Session::flush();

        Auth::logout();

        //return redirect( 'login' );
        //return view( 'home' );
        return redirect()->route( 'root' );
    }

    public function addcart( Request $request, $food_id ) {
        if ( Auth::user() ) {
            $user_id = Auth::user()->id;
            $food_id = $food_id;
            $food_quantity = $request->quantity;
            $check = Cart::where( 'foodId', $food_id )->where( 'userId', $user_id )->first();

            if ( $check ) {
                Cart::where( 'foodId', $food_id )->where( 'userId', $user_id )->increment( 'quantity', $food_quantity );
                return redirect()->back()->with( 'message', 'Food added to cart successfully!' );
            } else {
                $user_name = Auth::user()->name;
                $food_id = $food_id;
                $food_name = $request->name;
                $food_price = $request->price;
                $food_quantity = $request->quantity;
                $total_price = $food_price*$food_quantity;
                $cartData = new Cart;
                $cartData->userId = $user_id;
                $cartData->userName = $user_name;
                $cartData->foodId = $food_id;
                $cartData->foodName = $food_name;
                $cartData->price = $food_price;
                $cartData->quantity = $food_quantity;
                //$cartData->totalPrice = $total_price;
                $cartData->save();
                return redirect()->back()->with( 'message', 'Food added to cart successfully!' );
            }
        } else {
            return redirect()->route( 'login' );
        }

    }

    public function mycart() {
        $user_id = Auth::user()->id;
        if ( $user_id ) {
            $cart_items = Cart::where( 'userId', Auth::user()->id )->get();
            $cart_count = Cart::where( 'userId', $user_id )->count();
            return view( 'mycart', compact( 'cart_items', 'cart_count' ) );
        } else {
            return redirect()->route( 'login' );
        }
    }

    public function deletecart( $id ) {
        $cart_id = $id;
        Cart::find( $cart_id )->delete();
        $cart_items = Cart::where( 'userId', Auth::user()->id )->get();

        $cart_count = Cart::where( 'userId', Auth::user()->id )->count();
        return redirect()->back()->with( 'message', 'Cart deleted successfully!' );

    }

    public function shippingform() {
        $cart_count = Cart::where( 'userId', Auth::user()->id )->count();
        return view( 'shipping_form', compact( 'cart_count' ) );
    }

    public function storeshipping( Request $request ) {
        $user_id = Auth::user()->id;
        $name = $request->name;
        $address = $request->address;
        $mobile = $request->mobile;
        $postcode = $request->postcode;
        $shipping_data = new Shipping;
        $shipping_data->user_id = $user_id;
        $shipping_data->name = $name;
        $shipping_data->address = $address;
        $shipping_data->mobile = $mobile;
        $shipping_data->postcode = $postcode;

        $shipping_data->save();
        $shipping_info = Shipping::where( 'user_id', $user_id )->get()->first();
        $cart_items = Cart::where( 'userId', $user_id )->get();
        $cart_count = Cart::where( 'userId', Auth::user()->id )->count();
        return view( 'orderplace', compact( 'shipping_info', 'cart_items', 'cart_count' ) );
    }

    public function storeorder() {
        $user_id = Auth::user()->id;
        $shipping_info = Shipping::where( 'user_id', $user_id )->get()->first();
        $cart_items = Cart::where( 'userId', $user_id )->get();
        $cart_count = Cart::where( 'userId', Auth::user()->id )->count();

        $order = new Order;
        foreach ( $cart_items as $cart_item ) {
            $order->user_id = $user_id;
            $order->address = $shipping_info->address;
            $order->mobile = $shipping_info->mobile;
            $order->postcode = $shipping_info->postcode;
            $order->foodName = $cart_item->foodName;
            $order->price = $cart_item->price;
            $order->quantity = $cart_item->quantity;
            $order->totalPrice = $cart_item->price*$cart_item->quantity;
            $order->save();
            $cart_id = $cart_item->id;
            Cart::where( 'id', $cart_id )->delete();
        }
        return view( 'ordersuccess', compact( 'cart_count' ) )->with( 'message', 'Order placed successfully!' );
    }

}
