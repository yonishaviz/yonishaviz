<?php

namespace App\Http\Controllers;
use App\Coupons;
 use Cart;

use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function store(Request $request)
    {

        $coupon = Coupons::where('code',$request->coupon_code)->first();
        if(!$coupon){
            return redirect()->route('check.index')->with('error','Inviled coupon code, Please try again');
        }
        $sub = Cart::total();
        session()->put('coupon',[
            'name' => $coupon->code,
            'discount' => $coupon->discount(Cart::subtotal(2,'.','')),
        ]);
         return redirect()->route('check.index')->with('success','coupon has been alpplied');
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('coupon');
        
        return redirect()->route('check.index')->with('success','coupon has been removed');
        
    }
}
