<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Product;

class InvoiceController extends Controller
{
    function show(){
        $invoices = invoice::all(); // en vez de all puede ser first
        //return dd($invoices); // se puede ver sin crear la vista y puede llamar $invoices ->products
        return view('invoice.list', compact('invoices'));//[invoices => $invoices] 
        //Lo convierte en un array asociativo para usarlo en una vista
    }

    function form(){
        $products = Product::all();
        return view('invoice.form',['products'=> $products]);
    }
}
