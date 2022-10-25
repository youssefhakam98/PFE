<?php

namespace App\Http\Controllers;

use App\Models\Servants;
use Illuminate\Http\Request;

class ServantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servents = Servants::paginate(4);
        return view('layouts.managments.serveurs.index', compact('servents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.managments.serveurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AddServant(Request $request)
    {
        $this->validate($request, [
            "name" => "required|min:3",
        ]);

        $servents =  new Servants();
        $servents->name = $request->name;
        $servents->address = $request->address;
        $servents->save();


        return Redirect()->route('all.servants')->with('success', 'Servants Inserted Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servants  $servants
     * @return \Illuminate\Http\Response
     */
    public function show(Servants $servants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servants  $servants
     * @return \Illuminate\Http\Response
     */
    public function Edit($id)
    {
        $servents = Servants::find($id);
        return view('layouts.managments.serveurs.edit', compact('servents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servants  $servants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Servants::find($id)->update([
            'name' => $request->name,
            'address' => $request->address
        ]);

        return Redirect()->route('all.servants')->with('success', 'Servants Update Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servants  $servants
     * @return \Illuminate\Http\Response
     */
    public function Delete($id)
    {
        $delete =  Servants::find($id)->delete();
        // return Redirect()->back()->with('success', 'Servents deleted');
        return response()->json(['status' => 'Recorde has been deleted']);
    }
}
