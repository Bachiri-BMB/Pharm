<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sales extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'purchase_id','service_id','quantity','total_price',
    ];

   

    public function purchase(){
        return $this->belongsTo(Purchase::class,'purchase_id');
    }

      public function services(){
        return $this->belongsTo(services::class,'service_id');
    } 
}
