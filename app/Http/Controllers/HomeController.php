<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use App\Models\Sales;
use App\Models\Servants;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $product = Menu::all();
        $reservationCount = Reservation::all()->count();
        $SalesCount = Sales::all()->count();
        return view('home', compact('product', 'reservationCount', 'SalesCount'));
    }




    public function role()
    {
        $role = Auth::user()->role;

        if ($role == '0') {

            $product = Menu::all();
            $reservationCount = Reservation::all()->count();
            $SalesCount = Sales::all()->count();
            return view('home', compact('product', 'reservationCount', 'SalesCount'));
        } else {
            $menu = Menu::all();
            $user_id = Auth::id();
            $count = Cart::where('user_id', $user_id)->count();
            return view('layouts.front.index', compact('menu', 'count'));
        }
    }




    // public function index()
    // {
    //     $product = Menu::all();
    //     return view('layouts.home',compact('product'));
    // }
}
