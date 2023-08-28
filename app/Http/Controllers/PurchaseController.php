<?php

namespace App\Http\Controllers;
use App\Models\Product;

use App\Models\Category;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{

    public function index()
    {
        $title = "Purchases";
        $purchases = Purchase::with('product', 'supplier')
        ->where('quantity', '>', 0)
        ->get();
    return view('purchases.purchases', compact('title', 'purchases'));
    }

    public function create()
    {
        $title = "Add Purchase";
        $suppliers = Supplier::all();
        $products = Product::all();

        return view('purchases.add-purchase', compact('title', 'suppliers', 'products'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'product_id' => 'required|max:200',
            'N_Facture' => 'required|min:1',
            'N_lot' => 'required|min:1',
            'date' => 'required',
            'price' => 'required|min:1',
            'quantity' => 'required|min:1',
            'expiry_date' => 'required',
            'supplier' => 'required',
            //'image' => 'file|image|mimes:jpg,jpeg,png,gif',
        ]);

       // $imageName = null;
        //if ($request->hasFile('image')) {
          //  $imageName = time() . '.' . $request->image->extension();
            //$request->image->move(public_path('storage/purchases'), $imageName);
        //}

        try {
       // Store the initial quantity
       $product = Product::find($request->product_id);


            $purchase = Purchase::create([
                'product_id' => $request->product_id,
                'supplier_id' => $request->supplier,
                'price' => $request->price,
                'N_Facture' => $request->N_Facture,
                'date' => $request->date,
                'N_lot' => $request->N_lot,
                'quantity' => $request->quantity,
                'initial_quantity' => $request->quantity, // Store the initial quantity here

                'expiry_date' => $request->expiry_date,
            ]);

            $notification = array(
                'success' => $purchase->product->name . ' added successfully!',
            );
        } catch (\Throwable $th) {
            // Log the error message and stack trace
            \Log::error('Error creating purchase: ' . $th->getMessage());
            \Log::error('Stack Trace: ' . $th->getTraceAsString());

            // Add a debug message to the notification
            $notification = array(
                'error' => 'Opps!! Something went wrong, please check and try again',
                'debug_message' => 'Error creating purchase: ' . $th->getMessage(),
            );
        }

        return redirect()->route('purchases')->with($notification);
    }

    public function show(Request $request, $id)
    {
        $title = "Edit Purchase";
        $purchase = Purchase::find($id);
    
        if (!$purchase) {
            return redirect()->route('purchases')->with('error', 'Purchase record not found.');
        }
        $products=Product::get();
    
        $categories = Category::get();
        $suppliers = Supplier::get();
    
        return view('purchases.edit-purchase', compact('title', 'purchase', 'categories', 'suppliers','products'));
    }
    
    public function update(Request $request, Purchase $purchase)
    {
        $this->validate($request, [
            'product_id' => 'required|max:200',
            'N_Facture' => 'required',
            'date' => 'required',
            'N_lot' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'expiry_date' => 'required',
            'supplier' => 'required',
        ]);
       

        try {
            $purchase->update([
                'product_id' => $request->product_id,
                'supplier_id' => $request->supplier,
                'N_Facture' => $request->N_Facture,
                'price' => $request->price,
                'N_lot' => $request->N_lot,
                'quantity' => $request->quantity,
                'initial_quantity' => $request->quantity, // Store the initial quantity here

                'expiry_date' => $request->expiry_date,
                'date' => $request->date,
              // 'image' => $imageName,
            ]);
            $notifications = array(
                'success' =>  $purchase->product->name . '  ' ." updated successfully!",
            );
        } catch (\Throwable $th) {
            $notifications = array(
                'error' => "Opps!! Something got wrong, Please check and try again",
            );
        }
        return redirect()->route('purchases')->with($notifications);
    }


    public function destroy(Request $request)
    {
        $purchase = Purchase::find($request->id);
        $purchase->delete();
        $notification = array(
            'message' => "Purchase has been deleted",
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
