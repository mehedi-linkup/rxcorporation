<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','price','category_id','status','slug','description','short_des','image'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
