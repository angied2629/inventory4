<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//Category -> tabla category
class Category extends Model
{
    use HasFactory;

    function products(){
        return $this->hasMany(Product::class);
 
    }

}
