<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categori;

class CategoriController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

    function show(){
        $list = Categori::all();
        return view('category/list',['categories' =>$list]);
    }

    function form($id=null){
        $category = new Categori();
        if($id!=null){
            $category = Categori::findOrFail($id);
        }
        return view('category/form',['categories'=> $category]);
    }

     function save(Request $request){

        $request->validate([
            "name"=>'required|max:50',            
        ]);

        $category = new Categori();
        if($request->id > 0){
            $category = Categori::findOrFail($request->id);
        }
        $category->name = $request->name;       

        $category->save();

        return redirect('/category')->with('message', 'categoria guardada');
    }

    function delete($id){
        $category = Categori::findOrFail($id);
        $category->delete();
        return redirect('/category')->with('message', 'categoria eliminada exitosamente');
    }
    
}
