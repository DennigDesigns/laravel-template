<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;//hook up the DB

class AuthProductsController extends Controller
{
    
	/**
	show only to those signed in --> if this is enabled, EVERYTHING in this controller is locked behind the login screen.
	*/
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

		//load all of the products
		
		//$products = Products::all();
		//return view('products.index', compact('products'));
		
  //alt way to do it:
		//$products = DB::table('products')->get();

		//put the products in a view aka app/views/products/index ==> written as products.index
		//return view('products.index', ['products' => $products]);
		
		
		//load products for just the specific signed in user
		$products = Products::where('user_id', auth()->id())->get();//it means: select * from projects where user_id = 1
	
		return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource. url: /photos/create
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {	
        //
		return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		//validate the fields. Error messages are shown on the create.blade.php page.
		$request->validate([
		        'name' => 'bail|required|unique:products|max:100',
		        'description' => 'bail|required',
		   ]);
		   		
			
		// The blog post is valid...
		
		$products = new products;
		
		$products->user_id = auth()->id();
		$products->name = $request->name;
		$products->description = $request->description;
		
		$products->save();	
		
		
        //load all of the products
		return redirect('/products');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//replace with ($id) instead of  (Products $products)
    {
        //
		$products = Products::findOrFail($id);
		
		//authenticate for the corect user
		if($products->user_id !== auth()->id()){
			abort(403);
		}
		
		return view('products.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage. aka "PATCH"
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)//replace with (Request $request, $id) instead of Request $request, Products $products 
    {
		//validate the fields. Error messages are shown on the edit.blade.php page.
		$request->validate([
		        'name' => 'bail|required|max:100',
		        'description' => 'bail|required',
		   ]);
		
        //PUT/PATCH 	/photos/{photo} 	update 	photos.update
		$products = Products::findOrFail($id);
		
		//authenticate for the corect user
		if($products->user_id !== auth()->id()){
			abort(403);
		}
		
		$products->name = request('name');//$request->name;
		$products->description = request('description');//$request->description;
		
		$products->save();	
		
		
        //load all of the products
		return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//replace with ($id) instead of Products $products
    {
        //delete the specific project
		Products::findOrFail($id)->delete();
		
        //load all of the products
		return redirect('/products');
		
		
    }
}
