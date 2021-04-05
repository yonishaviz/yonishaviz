<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use Illuminate\support\facades\validator;

 use Cart;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.cart');
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
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request){
            return $cartItem->id === $request->id;
        });
        if($duplicates->isNotEmpty()){
            return redirect()->route('cart.index')->with('success','Item already in your cart!');
        }
        cart::add($request->id, $request->name,1, $request->price)->associate('App\product');
        return redirect()->route('cart.index')->with('success','Item was add to your cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $validator = validator::make($request->all(),[
            'qan' => 'required|numeric|between:1,5'
        ]);
        if($validator->fails()){
        session()->flash('error','Quantity must be between 1 and 5');
        return response()->json(['success'=> false],400);
        }
        Cart::update($id, $request->qan);
        session()->flash('success','quantity updated successfully');
        return response()->json(['success'=> true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart:: remove($id);
        return back()->with('success','Item has been  removed');
    }
    
    /**
     * save spsicifed resouce for later.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ForLater($id)
    {
        $item = Cart::get($id);
        Cart::remove($id);
        
         $duplicates = Cart::instance('SaveForLater')->search(function ($cartItem, $rowId) use ($id){
            return $rowId === $id;
        });
        if($duplicates->isNotEmpty()){
            return redirect()->route('cart.index')->with('success','Item is already Saved for later');
        }
        
        
        Cart::instance('SaveForLater')->add($item->id, $item->name,1, $item->price)->associate('App\product');
        return redirect()->route('cart.index')->with('success','Item has been saved for later');
    }
}
