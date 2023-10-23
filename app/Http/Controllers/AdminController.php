<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Fooditem;
use App\Models\Reservation;
use App\Models\Chef;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller {

    public function admindashboard() {
        if ( Auth::user() ) {
            $usertype = Auth::user()->usertype;

            if ( $usertype == 1 ) {

                return view( 'admin.dashboard' );

            } else {
                $food_items = Fooditem::all();
                $cart_count = Cart::where( 'userId', $user_id )->count();
                return view( 'home', compact( 'food_items', 'cart_count' ) );
            }

        } else {
            return redirect()->route( 'login' );
        }
    }

    public function users() {
        $alluser = user::all();
        return view( 'admin.users', compact( 'alluser' ) );
        //return redirect()->route( 'users' );
    }

    public function deleteuser( $user_id ) {
        $user = user::findOrFail( $user_id );
        $user->delete();
        return redirect()->back();
    }

    public function addfood() {
        return view( 'admin.add_food' );
    }

    public function storefood( Request $request ) {

        $food_name  = $request->name;
        $food_desc  = $request->short_desc;
        $food_price = $request->price;
        $food_image_file = $request->image;
        $imageName       = time().'.'.$food_image_file->getClientOriginalExtension();
        $img_path        = $food_image_file->move( 'public/home/assets/images/FoodImages/', $imageName );

        $food_image = $imageName;
        $single_food_info = new Fooditem;
        $single_food_info->name = $food_name;
        $single_food_info->description = $food_desc;
        $single_food_info->price = $food_price;
        $single_food_info->image = $food_image;
        $single_food_info->save();
        return view ( 'admin.add_food' )->with( 'message', 'Food added successfully!' );

    }

    public function allfoods() {
        $food_items = Fooditem::all();
        return view( 'admin.all_foods', compact( 'food_items' ) );
    }

    public function deletefood( $food_id ) {
        $foodImage = Fooditem::find( $food_id )->image;
        unlink( 'Public/home/assets/images/FoodImages/'.$foodImage );
        Fooditem::find( $food_id )->delete();
        return redirect()->back()->with( 'message', 'Food deleted successfully!' );

    }

    public function editfood( $id ) {
        $food_info = Fooditem::find( $id );
        return view ( 'admin.edit_food', compact( 'food_info' ) );
    }

    public function updatefood( Request $request, $id ) {
        $food_to_edit = Fooditem::find( $id );
        $previous_food_image = $food_to_edit->image;
        $food_name  = $request->name;
        $food_desc  = $request->short_desc;
        $food_price = $request->price;
        $food_image_file = $request->image;
        if ( $food_image_file ) {
            $imageName       = time().'.'.$food_image_file->getClientOriginalExtension();
            $img_path        = $food_image_file->move( 'public/home/assets/images/FoodImages/', $imageName );

            $food_image = $imageName;
        } else {
            $food_image = $previous_food_image;
        }

        $food_to_edit->name = $food_name;
        $food_to_edit->description = $food_desc;
        $food_to_edit->price = $food_price;
        $food_to_edit->image = $food_image;
        $food_to_edit->save();
        return redirect()->back()->with( 'message', 'Food updated successfully!' );

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
                $cartData->totalPrice = $total_price;
                $cartData->save();
                return redirect()->back()->with( 'message', 'Food added to cart successfully!' );
            }
        } else {
            return redirect()->route( 'login' );
        }

    }

    public function storereservation( Request $request ) {

        $customer_name  = $request->name;

        $customer_email  = $request->email;
        $customer_phone = $request->phone;
        $customer_number_guests = $request->number_guests;
        $reservation_date = $request->date;
        $reservation_time = $request->time;
        $reservation_message = $request->message;

        $reservation = new Reservation;

        $reservation->name = $customer_name;
        $reservation->email = $customer_email;
        $reservation->phone = $customer_phone;
        $reservation->number_guests = $customer_number_guests;
        $reservation->date = $reservation_date;
        $reservation->time = $reservation_time;
        $reservation->message = $reservation_message;
        $reservation->save();
        return redirect()->back()->with( 'message', 'Reservatin booked successfully!' );

    }

    public function allreservations() {
        $allreservations = Reservation::all();
        return view( 'admin.all_reservations', compact( 'allreservations' ) );
    }

    public function deletereservation( $id ) {
        Reservation::find( $id )->delete();
        return redirect()->back()->with( 'message', 'Reservation deleted successfully!' );
    }

    public function addchef() {
        return view( 'admin.add_chef' );
    }

    public function storechef( Request $request ) {
        $chef_name = $request->name;
        $chef_description = $request->short_desc;
        $chef_expert = $request->expert;
        $chef_image_file = $request->image;
        $imageName       = time().'.'.$chef_image_file->getClientOriginalExtension();
        $img_path        = $chef_image_file->move( 'public/home/assets/images/ChefImages/', $imageName );

        $chef_image = $imageName;

        $chef_facebook = $request->facebook_link;
        $chef_twitter = $request->twitter_link;
        $chef_instagram = $request->instagram_link;
        $chef_behance = $request->behance_link;
        $chef_googleplus = $request->googleplus_link;
        $chef = new Chef;

        $chef->name = $chef_name;
        $chef->short_description = $chef_description;
        $chef->expert = $chef_expert;
        $chef->image = $chef_image;
        $chef->facebook = $chef_facebook;
        $chef->twitter = $chef_twitter;
        $chef->instagram = $chef_instagram;
        $chef->behance = $chef_behance;
        $chef->googleplus = $chef_googleplus;

        $chef->save();
        return redirect()->back()->with( 'message', 'Chef added successfully!' );

    }

    public function allchefs() {
        $allchefs = Chef::all();
        return view( 'admin.all_chefs', compact( 'allchefs' ) );
    }

    public function deletechef( $id ) {
        $chef_image = Chef::find( $id )->image;
        unlink( 'Public/home/assets/images/ChefImages/'.$chef_image );
        Chef::find( $id )->delete();
        return redirect()->back()->with( 'message', 'Food deleted successfully!' );
    }

    public function allorders() {
        $order_items = Order::all();
        return view( 'admin.all_orders', compact( 'order_items' ) );
    }

    public function deleteorder( $order_id ) {
        $order_id = $order_id;
        Order::find( $order_id )->delete();
        return redirect()->back()->with( 'message', 'Order deleted successfully!' );
    }

    public function searchorder( Request $request ) {
        $search_text = $request->search;
        //dd( $search_text );
        $order_items = Order::where( 'foodName', 'LIKE', '%'.$search_text.'%' )->orWhere( 'price', 'LIKE', '%'.$search_text.'%' )->get();
        //dd( $order_items );
        return view( 'admin.all_orders', compact( 'order_items' ) );

    }

    public function searchorderajax( Request $request ) {
        $query = $request->get( 'query' );

        if ( $request->ajax() ) {
            $data = Order::where( 'foodName', 'LIKE', '%'.$query.'%' )->orWhere( 'address', 'LIKE', '%'.$query.'%' )->orWhere( 'mobile', 'LIKE', '%'.$query.'%' )->get();

            //$output = count( $data );
            $output = '';
            if ( count( $data ) > 0 ) {

                foreach ( $data as $row ) {
                    $output = '<tr>';
                    $output .= '<td>' . $row->user_id . '</td>';
                    $output .= '<td>' . $row->address . '</td>';
                    $output .= '<td>' . $row->mobile . '</td>';
                    $output .= '<td>' . $row->postcode . '</td>';
                    $output .= '<td>' . $row->foodName . '</td>';
                    $output .= '<td>$ ' . $row->price . '</td>';
                    $output .= '<td>' . $row->quantity . '</td>';
                    $output .= '<td>$ ' . $row->totalPrice . '</td>';

                    $output .= '</tr>';

                }

            } else {
                $output = '<tr>';
                $output .= '<td>' . 'No results' . '</td>';
                $output .= '</tr>';
            }
            return $output;
        }

    }

    public function addcustomer() {
        return view( 'admin.add_customer' );
    }

    public function storecustomer( Request $request ) {
        //dd( $request );
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->mobile = $request->mobile;
        $customer->save();
        //return redirect()->back()->with( 'message', 'Customer added successfully!' );
        return[ 'msg'=>'Customer Added Successfully!!!!!!!' ];

    }

    public function allcustomer() {
        $allcustomers = Customer::all();
        return view( 'admin.all_customers', compact( 'allcustomers' ) );
    }

    public function deletecustomer( $id ) {
        $customer_id = $id;
        Customer::where( 'id', $customer_id )->delete();
        $allcustomers = Customer::all();
        return view ( 'admin.all_customers', compact( 'allcustomers' ) )->with( 'message', 'Customer deleted successfully!!' );
    }

    public function deletecustomerajax( $id ) {
        Customer::find( $id )->delete();

        return response()->json( [ 'success' => 'Customer Deleted Successfully!' ] );

    }

}
