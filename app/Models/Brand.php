<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable= ['name','slug','status','created_by'];

    public function user(){
        return $this->belongsTo(User::class , 'created_by')->select('id','name');
    }
}
