<?php

namespace App\Http\Controllers;

use App\Exports\SalesExport;
use App\Models\Category;
use App\Models\Sales;
use App\Models\Servants;
use App\Models\Table;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    //

    public function indexReports()
    {
        return view("reports.index");
    }


    //Aficheer les vents
    public function generate(Request $request)
    {   
        //LA Validation
        $this->validate($request,[
            "from" => "required",
            "to" => "required"
        ]);



        $startDate = date("Y-m-d-H:i:s", strtotime($request->from."00.00.00"));
        $endDate = date("Y-m-d-H:i:s", strtotime($request->to."23.59.59 "));
        $sales = Sales::whereBetween("created_at",[$startDate,$endDate])->where("payment_status","paid")->get();
        

        return view("reports.index")->with([  
            "startDate" => $startDate,
            "endDate" => $endDate,
            "total" => $sales->sum("total_received"),
            "sales" => $sales,
            "servents" => Servants::all(),
            "tables" => Table::all(),
            "categories" => Category::all(),


        ]);
    }

    
    //Dowlond ficher exel
    public function export(Request $request)
    {
        return Excel::download(new SalesExport($request->from, $request->to), "sales.xlsx");
    }
}
