<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\product;



class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 9;
        $categories = Category::all();
       if(request()->category){
     $products = product::with('categories') 
    ->whereHas('categories',function($query){
               $query->where('slug',request()->category);
           });
      $categoryName = $categories->where('slug',request()->category)->first()
          ->name;
       }
else{
   
       $products = product::inRandomOrder()->where('multible',true);
    $categoryName = 'multiple products';
}
        if(request()->sort == 'low_high'){
            $products = $products->orderBy('price')->paginate($pagination);
        } elseif(request()->sort == 'high_low'){
            $products = $products->orderBy('price','desc')->paginate($pagination);
        }
        else{
            $products = $products->paginate($pagination);
        }
       return view('pages.landing')->with(['products' => $products,
                                         'categories' => $categories,
                                          'categoryName' => $categoryName,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = product::where('slug',$slug)->firstOrFail();
        $might = product::where('slug','!=',$slug)->inRandomOrder()->take(4)->get();
        return view('pages.product')->with(['product' => $product,
                                          'might' => $might,]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
