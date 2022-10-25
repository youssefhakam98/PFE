<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FrontController extends Controller
{
    //

    public function index()
    {

        // $categories = Category::latest()->paginate(4);
        $menu = Menu::all();
        $user_id = Auth::id();
        $count = Cart::where('user_id', $user_id)->count();
        return view('layouts.front.index', compact('menu', 'count'));
    }


    public function reservation()
    {
        $menu = Menu::all();
        $user_id = Auth::id();
        $count = Cart::where('user_id', $user_id)->count();
        return view('layouts.front.reservation', compact('count', 'menu'));
    }



    public function shwoCart(Request $request, $id)
    {

        $users = Auth::id();
        // dd($user);
        $count = Cart::where('user_id', $id)->count();

        $sum = Cart::where('user_id', $id)->join('menus', 'carts.food_id', '=', 'menus.id')->sum('price');
        // dd($sum);
        $data = Cart::where('user_id', $id)->join('menus', 'carts.food_id', '=', 'menus.id')->get();
        // dd($data);
        $image = Cart::where('user_id', $id)->join('menus', 'carts.food_id', '=', 'menus.image')->get();

        $deleteCart = Cart::select('*')->where('user_id', '=', $id)->get();

        return view('layouts.front.shwoCart', compact('count', 'data', 'sum', 'deleteCart', 'users'));
    }


    public function AddToCard(Request $request, $id)
    {
        if (Auth::id()) {

            $user_id = Auth::id();

            $foodid = $id;

            $quantity = $request->quantity;

            $cart = new Cart();

            $cart->user_id = $user_id;
            $cart->food_id = $foodid;
            $cart->quantity_id = $quantity;

            $cart->save();

            return redirect()->back();
        } else {

            return redirect('/login');
        }
    }



    public function reservationClient()
    {
        $reservation = Reservation::all();
        $trachReser = Reservation::onlyTrashed()->latest()->paginate(3);

        return view('layouts.managments.reservation.reservation', compact('reservation', 'trachReser'));
    }


    public function AllReservation()
    {
        $trachReser = Reservation::onlyTrashed()->latest()->paginate(3);
        // dd($trachReser);
        return view('layouts.managments.reservation.allReservastion', compact('trachReser'));
    }

    public function AddReservation(Request $request)
    {
        $reservation = new Reservation();

        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->time = $request->time;
        $reservation->date = $request->date;
        $reservation->gest = $request->gest;
        $reservation->message = $request->message;

        $reservation->save();

        return Redirect()->back();
    }


    public function softDelete($id)
    {
        $delete = Reservation::find($id)->delete();
        return Redirect()->back()->with('success', 'Reservation prepary');
    }

    public function restoreReservation($id)
    {
        $restore = Reservation::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success', 'Rservation ....');
    }

    public function daleteReservation($id)
    {
        $delete = Reservation::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success', 'Rservation ....');
    }

    public function daleteCart($id)
    {
        $cart = Cart::find($id);

        $cart->delete();

        return redirect()->back();
    }


    public function deleteAllCart($id)
    {
        $cart = Cart::where('user_id', $id)->get();

        // dd($cart);
        $cart->delete()->all();

        return redirect()->back();
    }
}
