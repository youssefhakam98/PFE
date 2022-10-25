<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::paginate(4);
        $categories = Category::all();

        return view('layouts.managments.menu.index', compact('menus', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('layouts.managments.menu.create', compact("categories"));
    }






    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AddMenu(Request $request)
    {
      
        // dd($request->all());



        // INSERT IMAGE AND UPLOADE TO THE FOLDER AND THEN TO  DATABASE
        $image = $request->file('image'); // petit dejeuner
        // add a unique id for the image 
        $name_gen      = hexdec(uniqid()); // 45569587
        // put the extension of image to lowerCase 
        $img_extension = strtolower($image->getClientOriginalExtension()); /// .Png = png
        // the name of image 
        $img_name      = $name_gen.'.'.$img_extension;  // 45569587.png
        // the local of image 
        $up_location   = 'image/'; // siri ldossier image li kayn f public
        // the final step
        $last_img      = $up_location.$img_name;  // 'image/45569587.png'
        // move to 'image/x.png' 
        $image->move($up_location, $img_name);



        // if($request->hasFile('image')){
        //     $file = $request->image;
        //     $imageName = time()."_".$file->getClientOriginalName();
        //     $file->move(public_path('images/menus'),$imageName);
        //     $title = $request->title;
        //     Menu::create([
        //         "title" => $request->title,
        //         "description" => $request->description,
        //         "price" => $request->price,
        //         "category_id" => $request->category_id,
        //         "image" => $imageName,
        //     ]);



        $menus =  new Menu();
        $menus->title = $request->title;
        $menus->description = $request->description;
        $menus->image = $last_img;
        $menus->price = $request->price;
        $menus->category_id = $request->category_id;
        $menus->save();
        // }

        return Redirect()->route('all.menus')->with('success', 'Menu Inserted Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $menus = Menu::find($id);

        return view('layouts.managments.menu.edit', compact('menus', 'categories'));


        // return view("layouts.managments.menu.edit")->with([
        //     "categories" => Category::all(),
        //     "menus" => $menus
        // ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function Update(Request $request, Menu $menu, $id)
    {
        // $this->validate($request, [
        //     "title" => "required|unique:menus,title".$menu->id,
        //     "description" => "required|min:5",
        //     "image" => "required|image|mimes:pnh,jpg,jpeg|max:2048",
        //     "price" => "required|numeric",
        //     "category_id" => "required|min:3|unique:menus,title",
        // ]);



        // INSERT IMAGE AND UPLOADE TO THE FOLDER AND THEN TO  DATABASE
        $image = $request->file('image'); // petit dejeuner
        $old_image = $request->old_image;
        if ($image) {
            // add a unique id for the image 
            $name_gen      = hexdec(uniqid()); // 45569587
            // put the extension of image to lowerCase 
            $img_extension = strtolower($image->getClientOriginalExtension()); /// .Png = png
            // the name of image 
            $img_name      = $name_gen . '.' . $img_extension;  // 45569587.png
            // the local of image 
            $up_location   = 'image/'; // siri ldossier image li kayn f public
            // the final step
            $last_img      = $up_location . $img_name;  // 'image/45569587.png'
            // move to 'image/x.png' 
            $image->move($up_location, $img_name);
            unlink($old_image);

            $update = Menu::find($id);
            $update->title = $request->title;
            $update->description = $request->description;
            $update->image = $last_img;
            $update->price = $request->price;
            $update->category_id = $request->category_id;
            $update->save();
        } else {
            $update = Menu::find($id);
            $update->title = $request->title;
            $update->description = $request->description;
            $update->price = $request->price;
            $update->category_id = $request->category_id;
            $update->save();
        }


      
            return Redirect()->route('all.menus')->with('success', 'Servants Update Successfull');

        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function Delete($id)
    {

        $delete = Menu::find($id);
        unlink($delete->image);
        $delete->delete();
        // return Redirect()->back()->with('success', 'Table Deleted Successfully');
        return response()->json(['status' => 'Recorde has been deleted']);

    }
}
