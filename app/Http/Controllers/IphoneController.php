<?php

namespace App\Http\Controllers;

use App\Models\Iphone;
use App\Models\Image;

class IphoneController extends Controller
{
    public function fetch(){
        $data = file_get_contents('https://dummyjson.com/products/category/smartphones');
        $data = json_decode($data);
        
        foreach($data->products as $phone){
            if($phone->brand == "Apple"){
                $phone = json_decode(json_encode($phone), true);
                foreach($phone['images'] as $img){
                    Image::firstOrCreate([ 
                        "img" => $img, 
                        "iphone_id" => $phone['id']
                    ]); 
                }

                unset($phone['images']);
                Iphone::firstOrCreate($phone);
            }    
        }

        return Iphone::all();
    }
}

