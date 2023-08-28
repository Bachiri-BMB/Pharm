<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sales;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\Product;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Notifications\StockAlert;
use App\Events\ProductReachedLowStock;

class DashboardController extends Controller
{
    public function index(){
        $title = "dashboard";
        $products = Purchase::where('quantity', '<=', 10)->get();
        $product = Purchase::where('quantity', '<=', 10)->first();
        $total_suppliers = Supplier::count();
        $total_medicines = Product::count();
        $available_medicines = Purchase::where('quantity', '>' , 5)->count();
        $total_medicines_outStock = Purchase::where('quantity', 0)->count();
        $total_medicines_runningOutStock = Purchase::where('quantity', '<=', 5)->count();
        $total_purchases = Purchase::where('expiry_date','=',Carbon::now())->count();

        $total_categories = Category::count();
        $total_suppliers = Supplier::count();
        $total_sales = Sales::count();

        $yesterday_sales = Sales::whereDate('created_at',  Carbon::now()->yesterday()->format('Y-m-d'))->sum('total_price');
        $last_sevenDays = Sales::where('created_at', '>=', Carbon::now()->subDays(7))->sum('total_price');

        // dd($yesterday_sales);

        $pieChart = app()->chartjs
                ->name('pieChart')
                ->type('pie')
                ->size(['width' => 400, 'height' => 200])
                ->labels(['Total Purchases', 'Total Suppliers','Total Sales'])
                ->datasets([
                    [
                        'backgroundColor' => ['#FF6384', '#36A2EB','#7bb13c'],
                        'hoverBackgroundColor' => ['#FF6384', '#36A2EB','#7bb13c'],
                        'data' => [$total_purchases, $total_suppliers,$total_sales]
                    ]
                ])
                ->options([]);

            // dd($pieChart );
            $currentDate = Carbon::now()->toDateString();

            $product_outs = Purchase::join('products', 'purchases.product_id', '=', 'products.id')
                ->where('products.nmbr_min_stock', '>', 0)
                ->where('purchases.quantity', '<=', \DB::raw('products.nmbr_min_stock'))
                ->whereDate('purchases.created_at', $currentDate) // Filter by today's date
                ->select('purchases.*')
                ->with('product')
                ->get();
                $expiryDateLimit = Carbon::now()->addMonths(6);

                $pirimes = Purchase::whereDate('expiry_date', '<=', $expiryDateLimit)->get();        
                $total_expired_products = Purchase::whereDate('expiry_date', '<=', $expiryDateLimit)->count();        

        $latest_sales = Sales::whereDate('created_at','=',Carbon::now())->get();
        $today_sales = Sales::whereDate('created_at','=',Carbon::now())->sum('total_price');
        
        return view('home',compact(
            'title','pieChart','total_expired_products',
            'latest_sales','today_sales','total_categories',
            'total_purchases','total_medicines','total_medicines_outStock',
            'total_medicines_runningOutStock','available_medicines',
            'total_suppliers', 'last_sevenDays','yesterday_sales','products','product_outs','pirimes'
        ));
    }
    
    
}
