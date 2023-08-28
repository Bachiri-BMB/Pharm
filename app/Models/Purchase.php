<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Supplier;
use App\Events\ProductReachedLowStock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Purchase extends Model
{
    use HasFactory,Notifiable;

    protected $fillable =[
       'product_id','price','N_lot','quantity','date','N_Facture',
        'expiry_date','supplier_id','initial_quantity'
    ];

   

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
 
}
