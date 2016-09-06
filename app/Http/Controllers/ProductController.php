<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;

use App\Events\ProductRegistrationEvent;

class ProductController extends Controller
{
    public function index()
    {
    	return View('products.index');
    }

    public function store(Request $request)
    {
        $data=$request->all();
    	Product::create($request->all());

        event(new ProductRegistrationEvent($data));
    }

    public function apiIndex()
    {
    	$products=Product::all();
    	return $products;
    }

    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        $product->delete();
    }

    public function update(Request $request,$id)
    {
        Product::where('id','=',$id)
        ->update($request->all());

    }

}
