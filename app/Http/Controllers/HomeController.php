<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $products = Product::orderBy("created_at","desc")->paginate(20);
        return view("user.pages.home",compact("products"));
    }

    public function product(Product $product){
        $relateds = Product::where("category_id",$product->category_id)
            ->where("id","!=",$product->id)
            ->where("qty",">",0)
            ->orderBy("created_at","desc")
            ->limit(4)
            ->get();
        return view("user.pages.product",compact("product","relateds"));
    }
    public function product2(){
        return view("user.pages.product");
    }

}
