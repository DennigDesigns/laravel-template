<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;//hook up the DB

class ProductsController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($id)//replace with ($id) instead of  (Products $products)
    {

		//GET 	/photos/{photo} 		show 	photos.show

		$products = Products::findOrFail($id);
		
		return view('products.show', compact('products'));
		
    }
    

}
