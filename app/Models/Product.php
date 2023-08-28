<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory,SoftDeletes,Notifiable;

    protected $fillable = [
        'name','category_id',
        'description','reference',
        'nmbr_min_stock','image'
    ];

   
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function purchase()
    {
        return $this->hasMany(Purchase::class);
    }
   
}
