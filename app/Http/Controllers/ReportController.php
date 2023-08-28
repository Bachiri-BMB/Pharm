<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(){
        $title = "generate Reports";
        return view('reports.reports',compact(
            'title',
        ));
    }

    public function getData(Request $request){
        $this->validate($request,[
            'from_date'=>'required',
            'to_date'=>'required',
            'resource'=>'required',
        ]);
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        if ($request->resource == 'sales'){
            //$sales = Sales::whereBetween(DB::raw('DATE(created_at)'), array($from_date, $to_date))->get();
            $sales = Sales::with(['purchase', 'services'])->whereBetween(DB::raw('DATE(created_at)'), array($from_date, $to_date))->get();

            $total_sales = $sales->count();
            $total_cash =$sales->sum('total_price');
            $title = "Sales Reports";
            return view('reports.reports',compact('sales','title','total_sales','total_cash'));
        }
        if ($request->resource == 'services') {
            $title = "Services Reports";
        
            $services = Services::all();
        
            foreach ($services as $service) {
                $totalSales = Sales::where('service_id', $service->id)
                    ->whereBetween(DB::raw('DATE(created_at)'), array($from_date, $to_date))
                    ->sum('quantity');
                
                $totalPrice = Sales::where('service_id', $service->id)
                    ->whereBetween(DB::raw('DATE(created_at)'), array($from_date, $to_date))
                    ->sum('total_price');
                
                // You might want to store or display the $totalSales and $totalPrice for each service.
                // You can create an array or use another data structure to achieve this.
            }
        
            return view('reports.reports', compact('totalSales', 'totalPrice', 'services', 'title'));
        }
        
        if($request->resource == 'purchases'){
            $title = "Purchases Reports";
            $purchases = Purchase::whereBetween(DB::raw('DATE(created_at)'), array($from_date, $to_date))->get();
            return view('reports.reports',compact('title','purchases'));
        }
    }
}
