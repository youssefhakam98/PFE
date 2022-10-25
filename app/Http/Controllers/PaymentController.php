<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sales;
use App\Models\Servants;
use App\Models\Table;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    //
  
    public function index()
    {
        
    
        return view("layouts.payments.index")->with([
            "tables" => Table::all(),       
            "categories" => Category::all(),
            "servents" => Servants::all(),
         
        ]);
     
        
    }


    public function indexCount()
    {
        $sales = DB::table('sales')->count();
    }

    public function vent()
    {
        return view("layouts.payments.vent")->with([
            "tables" => Table::all(),       
            "categories" => Category::all(),
            "servents" => Servants::all(),
        ]);
    }
}
