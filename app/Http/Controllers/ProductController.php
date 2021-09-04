<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Categori;

class ProductController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

    function show(){
        $list = Product::all();
        return view('product/list',['products' =>$list]);
    }

    function form($id=null){
        $product = new Product();
        $brands = Brand::all();
        $categori = Categori::all();
        if($id!=null){
            $product = Product::findOrFail($id);
        }
        return view('product/form',['product'=> $product, 'brands'=>$brands, 'categori' =>$categori]);
        
    }

    function save(Request $request){

        $request->validate([
            "name"=>'required|max:50',
            "cost"=>'required|numeric',
            "price"=>'required|numeric',
            "quantity"=>'required|numeric',
            "brand"=>'required|max:50',
            "categori"=>'required|max:50',
        ]);

        $product = new Product();
        if($request->id > 0){
            $product = Product::findOrFail($request->id);
        }
        $product->name = $request->name;
        $product->cost = $request->cost;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->brand_id = $request->brand;
        $product->categori_id = $request->categori;

        $product->save();

        return redirect('/products')->with('message', 'Producto guardado');
    }

    function delete($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/products')->with('message', 'Producto eliminado exitosamente');
    }
}

