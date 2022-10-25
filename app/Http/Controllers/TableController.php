<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::paginate(4);
        return view('layouts.managments.tables.index', compact('tables'));
    }


    public function create()
    {
        return view('layouts.managments.tables.create');
    }


    public function AddTable(Request $request)
    {
      
        $tables =  new Table();
        $tables->name = $request->name;
      
        $tables->save();


        return Redirect()->route('all.table')->with('success', 'Table Inserted Successfull');
    }


    public function Edit($id)
    {
        $tables = Table::find($id);
        return view('layouts.managments.tables.edit', compact('tables'));
    }


    public function Update(Request $request, $id)
    {
        $this->validate($request, [
            "name" => "required|unique:tables,name," . $id,
            "status" => "required|boolean"
        ]);

        $update = Table::find($id)->update([
            'name' => $request->name,
            'status' => $request->status
        ]);

        return Redirect()->ChangeStatusroute('all.table')->with('success', 'Table Update Successfull');
    }


    public function ChangeStatus(Request $request)
    {
        $tables = Table::find($request->member_id);
        $tables->status = $request->status;
        $tables->save();
    }



    public function Delete($id)
    {

        $delete = Table::find($id)->delete();
        // return Redirect()->back()->with('success', 'Table deleted');
        return response()->json(['status' => 'Recorde has been deleted']);
    }
}
