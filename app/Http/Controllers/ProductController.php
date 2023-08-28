<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;

use App\Models\Category;

class ProductController extends Controller
{

    public function index()
    {
        $title = "Products";
        $products = Product::all();

        return view('products.products', compact(
            'title', 'products'
        ));
    }

    public function create()
    {
        $title = "Add Product";
        $categories = Category::all();

        return view('products.add-product', compact(
            'title', 'categories'
        ));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            'category' => 'required',
            'description' => 'nullable|max:200',
            'reference' => 'nullable|max:100',
            'nmbr_min_stock' => 'nullable|integer|min:0',
            'image' => 'file|image|mimes:jpg,jpeg,png,gif',

            
            
        ]);
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/products'), $imageName);
        }


        try {
            Product::create([
                'name' => $request->name,
                'category_id' => $request->category,
                'description' => $request->description,
                'reference' => $request->reference,
                'nmbr_min_stock' => $request->nmbr_min_stock,
                'image' => $imageName,

            ]);

            $notification = array(
                'success' => "Product added successfully!",
            );
        } catch (\Throwable $th) {
            $notification = array(
                'error' => "Oops!! Something went wrong, Please check and try again",
            );
        }

        return redirect()->route('products')->with($notification);
    }

    public function show($id)
    {
        $title = "Edit Product";
        $product = Product::find($id);
        $categories = Category::all();

        return view('products.edit-product', compact(
            'title', 'product', 'categories'
        ));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            'category' => 'required',
            'description' => 'nullable|max:200',
            'reference' => 'nullable|max:100',
            'nmbr_min_stock' => 'nullable|integer|min:0',
            'image' => 'file|image|mimes:jpg,jpeg,png,gif',

        ]);
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/products'), $imageName);
        }
        try {
            $product = Product::find($id);
            $product->update([
                'name' => $request->name,
                'category_id' => $request->category,
                'description' => $request->description,
                'reference' => $request->reference,
                'nmbr_min_stock' => $request->nmbr_min_stock,
                'image' => $imageName,

            ]);

            $notification = array(
                'success' => "Product updated successfully!",
            );
        } catch (\Throwable $th) {
            $notification = array(
                'error' => "Oops!! Something went wrong, Please check and try again",
            );
        }

        return redirect()->route('products')->with($notification);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->forceDelete();
    
        $notification = [
            'success' => "Product has been deleted",
        ];
    
        return back()->with($notification);
    }
    
    
    public function expired()
    {
        $title = "Expired Products";
        $expiryDateLimit = Carbon::now()->addMonths(6);

        $products = Purchase::whereDate('expiry_date', '<=', $expiryDateLimit)->get();
        return view('products.expired', compact(
            'title', 'products'
        ));
    }

    public function outstock()
    {
        $title = "Outstocked Products";
        
        $products = Purchase::join('products', 'purchases.product_id', '=', 'products.id')
            ->where('products.nmbr_min_stock', '>', 0)
            ->where('purchases.quantity', '<=', \DB::raw('products.nmbr_min_stock'))
            ->select('purchases.*')
            ->with('product')
            ->paginate(5);
    
        return view('products.outstock', compact(
            'title', 'products'
        ));
    }
    
    
    
}
