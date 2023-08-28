<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Sales;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\services;
use App\Models\Category;

use App\Events\PurchaseOutStock;
use Illuminate\Http\Request;

class StockRapportController extends Controller
{
    public function generateStockReport(Request $request)
    {
        $products = Product::all();
        $selectedProduct = null;
        $stockReport = [];

        if ($request->has('product_id')) {
            $selectedProduct = Product::find($request->product_id);

            if ($selectedProduct) {
                $purchases = Purchase::where('product_id', $selectedProduct->id)->orderBy('date', 'asc')->get();

                $initialEntranceStock = null; // Initialize initial entrance stock
                $currentStock = 0; // Initialize current stock

                foreach ($purchases as $purchase) {
                    $totalSales = Sales::where('purchase_id', $purchase->id)->sum('quantity');

                        $currentStock += $purchase->initial_quantity ;


                    $stockReport[] = [
                        'date' => $purchase->created_at,
                        'reference' => $purchase->reference,
                        'product' => $selectedProduct,
                        'entrance_stock' => $purchase->initial_quantity,
                        'sortie_stock' => 0,
                        'total_stock' => $currentStock,
                    ];

                    $sales = Sales::where('purchase_id', $purchase->id)->get();


                    foreach ($sales as $sale) {
                        $currentStock -= $sale->quantity;

                        $stockReport[] = [
                            'date' => $sale->created_at,
                            'reference' => $sale->reference,
                            'product' => $selectedProduct,
                            'entrance_stock' => 0,
                            'sortie_stock' => $sale->quantity,
                            'total_stock' => $currentStock,
                        ];
                    }
                }
            }
        }

        return view('Stock.report', compact('stockReport', 'products', 'selectedProduct'));
    }
    public function generateAnnualStockReport(Request $request)
    {
       

        

        $year = $request->input('year');
        $products = Product::all();
        $reportData = [];
        $totalEntry = 0;
        $totalExit = 0;
        $totalPriceEntry = 0;
        $totalPriceExit = 0;
        $totalReport = 0;
        foreach ($products as $product) {
            $purchases = Purchase::where('product_id', $product->id)
                ->whereYear('date', $year)
                ->sum('initial_quantity');
            $prix = Purchase::where('product_id', $product->id)
                ->whereYear('date', $year)
                ->get(['price', 'initial_quantity'])
                ->sum(function ($purchase) {
                    return $purchase->price * $purchase->initial_quantity;
                });
            
            // Now $totalCost holds the total cost for the given year and product
            


            $sales = Sales::whereHas('purchase', function ($query) use ($product) {
                    $query->where('product_id', $product->id);
                })
                ->whereYear('created_at', $year)
                ->sum('quantity'); 
            $prix_exit = Sales::whereHas('purchase', function ($query) use ($product) {
                    $query->where('product_id', $product->id);
                })
                ->whereYear('sales.created_at', $year) // Specify the table name for created_at
                ->join('purchases', 'sales.purchase_id', '=', 'purchases.id')
                ->sum(DB::raw('purchases.price * sales.quantity'));
                
                // Now $totalSalesValue holds the total sales value for the given year and product
                
              
    

                

                $previousYear = $year - 1;
                $previousYearStock = Purchase::where('product_id', $product->id)
                                           ->whereYear('date', $previousYear)
                                           ->sum('initial_quantity') -
                                     Sales::whereHas('purchase', function ($query) use ($product, $previousYear) {
                                         $query->where('product_id', $product->id)
                                               ->whereYear('date', $previousYear);
                                     })
                                    ->sum('quantity');            
                $stock = $purchases - $sales;
              

            $reportData[] = [
                'product' => $product->name,
                'year' => $year,
                'entry' => $purchases,
                'prix' => $prix,
                'exit' => $sales,
                'price_exit'=>$prix_exit,
                'report' => $previousYearStock,
                'stock' => $stock,
            ];
           
            $totalEntry = array_sum(array_column($reportData, 'entry'));
            $totalPriceEntry = array_sum(array_column($reportData, 'prix'));
            $totalExit = array_sum(array_column($reportData, 'exit'));
            $totalPriceExit = array_sum(array_column($reportData, 'price_exit'));
            $totalReport = array_sum(array_column($reportData, 'report'));
            $totalStock = array_sum(array_column($reportData, 'stock'));


        }

        return view('stock.annual_report', compact('reportData', 'year', 'totalEntry', 'totalPriceEntry', 'totalExit', 'totalPriceExit', 'totalReport','totalStock'));
    }
    public function generateAnnualCategoryReport(Request $request)
    {
        $categories = Category::all();
        $selectedYear = $request->year ?: date('Y'); // Get the selected year or default to current year
        $categoryReport = [];
    
        foreach ($categories as $category) {
            $categoryTotal = 0;
    
            $productsInCategory = Product::where('category_id', $category->id)->get();
    
            foreach ($productsInCategory as $product) {
                $productTotal = Purchase::where('product_id', $product->id)
                    ->whereYear('date', $selectedYear)
                    ->sum(DB::raw('initial_quantity * price'));
    
                $categoryTotal += $productTotal;
            }
    
            $totalExit = Sales::whereHas('purchase.product', function ($query) use ($category) {
                $query->where('category_id', $category->id);
            })
            ->whereYear('sales.created_at', $selectedYear)
            ->join('purchases', 'sales.purchase_id', '=', 'purchases.id')
            ->sum(DB::raw('purchases.price * sales.quantity'));
    
            $stock = $categoryTotal - $totalExit;
    
            $categoryReport[] = [
                'category' => $category->name,
                'year' => $selectedYear,
                'entry' => $categoryTotal,
                'exit' => $totalExit,
                'stock' => $stock,
            ];  
            $totalEntry = array_sum(array_column($categoryReport, 'entry'));
            $totalExit = array_sum(array_column($categoryReport, 'exit'));
            $totalStock = array_sum(array_column($categoryReport, 'stock'));
            $y=array_column($categoryReport,'year');

        }
    
        return view('Stock.annual_category_report', compact('categoryReport', 'selectedYear','totalEntry','totalExit','totalStock','y'));
    }
    public function generateServiceSalesReport(Request $request)
    {
        $year = $request->input('year');
        
        $services = services::all();
        $serviceSalesReport = [];

        foreach ($services as $service) {
            $totalSales = Sales::where('service_id', $service->id)
                ->whereYear('created_at', $year)
                ->sum('quantity');
            
            $totalPrice = Sales::where('service_id', $service->id)
                ->whereYear('created_at', $year)
                ->sum('total_price');

            $serviceSalesReport[] = [
                'service' => $service->name,
                'total_sales' => $totalSales,
                'total_price' => $totalPrice,
            ];
        }

        return view('Stock.service_report', compact('serviceSalesReport', 'year'));
    }

    public function salesPurchasesChart()
    {
        $salesData = Sales::orderBy('created_at')->get(['created_at', 'quantity']);
        $purchaseData = Purchase::orderBy('created_at')->get(['created_at', 'initial_quantity']);

        return view('Stock.sales_purchases_chart', compact('salesData', 'purchaseData'));
    }
}
    

