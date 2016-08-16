<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;

class ProductController extends Controller
{
    public function index()
    {
    	return View('products.index');
    }

    public function store(Request $request)
    {
    	Product::create($request->all());
    }

    public function apiIndex()
    {
    	$products=Product::all();
    	return $products;
    }

}
