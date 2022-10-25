<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    
    public function index()
    {
        
        $categories = Category::latest()->paginate(4);
        return view('layouts.managments.categories.index',compact('categories'));
    }


    public function AddCatego(Request $request)
    {

        
        $categories =  new Category;
        $categories->title = $request->category_name;
        
        $categories->save();

        // return response()->json($categories);

        return Redirect()->route('all.category')->with('success','Category Inserted Successfull');

    }


    public function Edit($id)
    {
        $categories = Category::find($id);
        return view('layouts.managments.categories.edit',compact('categories'));
    }


    public function create()
    {
        return view('layouts.managments.categories.create');
    }



    public function Update(Request $request, $id)
    {
        $update = Category::find($id)->update([
            'title' => $request->title
        ]);

        return Redirect()->route('all.category')->with('success','Category Update Successfull');
    }


    public function Delete($id)
    {
        // $delete =  Category::find($id)->delete();
        Category::find($id)->delete();
        
        // return Redirect()->back()->with('success', 'Category deleted');
        return response()->json(['warning' => 'Recorde has been deleted']);
    }

    
    public function search(Request $request)
    {

        if($request->ajax())
    {


        $output="";
        // $products=DB::table('products')->where('title','LIKE','%'.$request->search."%")->get()
        $categories = Category::where('title','LIKE','%'.$request->search.'%')->get();;

        if($categories){

            foreach ($categories as $key => $category) {
                $output.='<tr>'.
                '<td>'.$category->id.'</td>'.
                '<td>'.$category->title.'</td>'.
                '</tr>';
                }
                

        return Response($output);
   }else{
      return  $categories = Category::all();
   }


        // $search_text = $_GET['qurey'];
        // $categories = Category::where('title','LIKE','%'.$search_text.'%')->get();
    }
    return view('layouts.managments.categories.search',compact('categories','output'));


}
}
