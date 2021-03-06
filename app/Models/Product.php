<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['name','slug','category_id','brand_id','model','buying_price','selling_price','special_price','special_price_from','special_price_to','quantity','sku_code','color','size','thumbnail','images','warranty','warranty_duration','warranty_condition','description','status','created_by'];
}
