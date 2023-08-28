<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Events\MedicineOutStock;
use App\Models\Sales;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Events\PurchaseOutStock;

class SalesController extends Controller
{
    public function index()
{
    $title = "Sales";
    $services = Services::get();
    

    $distinctPurchases = DB::table('purchases')
        ->where('quantity', '>', 0)
        ->join('products', 'purchases.product_id', '=', 'products.id')
        ->select('purchases.id as purchase_id', 'products.name','purchases.expiry_date','purchases.quantity')
        ->orderBy('purchases.expiry_date', 'asc') // Sortp par  date avec  (FIFO)
        ->distinct()
        ->get();

    $sales = Sales::with(['purchase', 'services'])->latest()->get();
    $sale = new Sales();

    return view('sales.sales', compact(
        'title',
        'distinctPurchases',
        'services',
        'sales',
        'sale'
    ));
}

    public function store(Request $request)
    {
        $this->validate($request, [
            'purchase_id' => 'nullable|integer',
            'service_id' => 'nullable|integer',
            'quantity' => 'required|integer|min:1',
        ]);
    
        $item = null;
        if ($request->purchase_id) {
            $item = Purchase::find($request->purchase_id);
        } elseif ($request->service_id) {
            $item = services::find($request->service_id);
        }
    
        if (!$item) {
            return back()->with([
                'error' => "Item not found!",
            ]);
        }
    
        $relatedModel = null;
        if ($item instanceof Purchase) {
            $relatedModel = 'purchase';
        } elseif ($item instanceof Service) {
            $relatedModel = 'service';
        }
    
        $newQuantity = $item->quantity - $request->quantity;
    
        if ($newQuantity >= 0) {
            Sales::updateOrCreate(
                ['id' => $request->edit_id],
                [
                    'purchase_id' => $request->purchase_id,
                    'service_id' => $request->service_id,
                    'quantity' => $request->quantity,
                    'total_price' => $request->quantity * $item->price,
                    'related_model' => $relatedModel,
                ]
            );
    
            $item->decrement('quantity', $request->quantity);
    
            $notification = [
                'success' => "Item sold successfully!",
            ];
    
            if ($newQuantity <= 1 || $newQuantity == 0) {
                event(new MedicineOutStock($item));
                // end of notification
                $notification = [
                    'error' => "Item is running out of stock!!!",
                ];
            }
    
            return back()->with($notification);
        } else {
            return back()->with([
                'error' => "Requested quantity cannot be greater than available quantity! Available Quantity is {$item->quantity}",
            ]);
        }
    }
    

    public function destroy(Request $request)
    {
        $sale = Sales::find($request->id);
        $sale->delete();
        $notification = [
            'message' => "Sale has been deleted",
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }
}
