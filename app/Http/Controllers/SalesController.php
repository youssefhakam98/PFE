<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Sales;
use App\Models\Servants;
use Illuminate\Http\Request;

class SalesController extends Controller
{


    public function index()
    {
        //
        $sales = Sales::orderBy("created_at", "DESC")->paginate(10);
        return view("sales.index")->with([
            "sales" => $sales,
            "servents" => Servants::all()
        ]);
    }


    public function create()
    {
        return view('layouts.managments.categories.create');
    }


    public function store(Request $request)
    {
        //
        $this->validate($request, [
            "table_id" => "required",
            "menu_id" => "required",
            "servant_id" => "required",
            "quantity" => "required|numeric",
            "total_price" => "required|numeric",
            "total_received" => "required|numeric",
            "change" => "required|numeric",
            "payment_type" => "required",
            "payment_status" => "required",
        ]);


        $sales = new Sales();

        $sales->servant_id     = $request->servant_id;
        $sales->quantity       = $request->quantity;
        $sales->total_price    = $request->total_price;
        $sales->total_received = $request->total_received;
        $sales->change         = $request->change;
        $sales->payment_status = $request->payment_status;
        $sales->payment_type   = $request->payment_type;
        $sales->save();

        $sales->menus()->sync($request->menu_id);
        $sales->tables()->sync($request->table_id);

        return  redirect()->route('store.vents')->with([
            "success" => "Paiment effectué avec success"
        ]);
    }


    // public function edit(Sales $sales)
    // {
    //     //get sale tables
    //     $tables = $sales->tables()->where('sales_id',$sales->id)->get();
    //     // get table menu
    //     $menus = $sales->menus()->where('sales_id',$sales->id)->get();

    //     return view("sales.edit")->with([
    //         "tables" => $tables,
    //         "menus" => $menus,
    //         "sale" => $sales,
    //         "servents" => Servants::all()
    //     ]);

    // }


    public function edit($id)
    {
        //get sale to update
        $sales = Sales::findOrFail($id);
        //get sale tables
        $tables = $sales->tables()->where('sales_id', $sales->id)->get();
        //get table menus
        $menus = $sales->menus()->where('sales_id', $sales->id)->get();
        return view("sales.edit")->with([
            "tables" => $tables,
            "menus" => $menus,
            "sale" => $sales,
            "servents" => Servants::all()
        ]);
    }




    // public function edit(Sales $sales)
    // {
    //     // $sales = Sales::find($id);
    //     $tables = $sales->tables()->where('sales_id',$sales->id)->get();
    //     // $menus = Menu::find($id);
    //     $menus = $sales->menus()->where('sales_id',$sales->id)->get();
    //     $servents = Servants::all();

    //     return view('sales.edit', [$tables=>'tables', $menus=>"menus", $sales=>"sale","servents"]);


    //     // return view("layouts.managments.menu.edit")->with([
    //     //     "categories" => Category::all(),
    //     //     "menus" => $menus
    //     // ]); 
    // }




    public function Update(Request $request, $id)
    {
        //
        $this->validate($request, [
            "table_id" => "required",
            "menu_id" => "required",
            "servant_id" => "required",
            "quantity" => "required|numeric",
            "total_price" => "required|numeric",
            "total_received" => "required|numeric",
            "change" => "required|numeric",
            "payment_type" => "required",
            "payment_status" => "required",
        ]);


        $sales = Sales::findOrFail($id);


        $sales->servant_id     = $request->servant_id;
        $sales->quantity       = $request->quantity;
        $sales->total_price    = $request->total_price;
        $sales->total_received = $request->total_received;
        $sales->change         = $request->change;
        $sales->payment_status = $request->payment_status;
        $sales->payment_type   = $request->payment_type;
        $sales->update();

        $sales->menus()->sync($request->menu_id);
        $sales->tables()->sync($request->table_id);

        return  redirect()->back()->with([
            "success" => "Paiment update avec success"
        ]);
    }
    public function destroy($id)
    {
        $sales = Sales::findOrFail($id);

        $sales->delete();

        // return  redirect()->back()->with([
        //     "success" => "Paiment deleted avec success"
        // ]);

        return Redirect()->back()->with('success', 'Paiment deleted avec success');
    }
}
