<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iphone extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function getImages(){
        return $this->belongsTo(Category::class);
    }
}
