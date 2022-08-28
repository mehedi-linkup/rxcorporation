<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','date','short_description','description','image','status'];
    public function user(){
        return $this->belongsTo(User::class,'saved_by','id');
    }
}
