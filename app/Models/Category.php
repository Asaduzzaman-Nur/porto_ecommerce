<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable= ['root','name','slug','status','created_by'];

    protected $with = ['sub_category','user'];

    public function sub_category()
    {
        return $this->hasMany(Category::class, 'root')->select('id','root','name','slug','status','created_by');
    }
    public function user(){
        return $this->belongsTo(User::class , 'created_by')->select('id','name');
    }
}
