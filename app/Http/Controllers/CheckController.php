<?php

namespace App\Http\Controllers;
 use Cart;
 use App\Orderrs;
 use Mail;
  use App\Mail\OrderPlaced;

use App\Order_Product;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('pages.check')->with([
            'discount'=> $this->getNubmer()->get('discount'),
            'newsub'=>$this->getNubmer()->get('newsub'),
            'newtax'=>$this->getNubmer()->get('newtax'),
            'newtotal'=>$this->getNubmer()->get('newtotal'),
        ]);
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
try{
         $order = $this->addToOrdersTable($request, null);
     
  Mail::send(new OrderPlaced($order));
}catch(CardErrorException $e){
             $this->addToOrdersTable($request, $e->getMessage());

    return back()->withErrors('Error!'.$e->getMessage());
}}

     protected function addToOrdersTable($request, $error)
     {

     
     $order = Orderrs::create([

        'user_id'=>auth()->user() ? auth()->user()->id :null,
        'billing_email'=>$request->email,
        'billing_name'=>$request->name,
        'billing_discount'=> $this->getNubmer()->get('discount'),
        'billing_subtotal'=> $this->getNubmer()->get('newsub'),
        'billing_discount_conde'=> $this->getNubmer()->get('code'),
        'billing_tax' => $this->getNubmer()->get('newtax'),
        'billing_total' => $this->getNubmer()->get('newtotal'),
        'erorr' => $error,
    ]);

        foreach (Cart::content() as  $item) {

Order_Product::create([
'order_id' => $order->id,
'product_id' => $item->model->id,
'quantity' => $item->qty,

]);        }
return $order;
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
    public function destroy($id)
    {
        //
    }

    private function getNubmer()
    {
        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $code = session()->get('coupon')['name'] ?? 0;
        $newsub = (Cart::subtotal(2,'.','') - $discount);
        $newtax = $newsub * $tax;
        $newtotal = $newsub + $newtax;

        return collect([
      'tax' => $tax,
      'discount' => $discount,
      'code' => $code,
      'newsub' => $newsub,
      'newtax' => $newtax,
      'newtotal' => $newtotal,
      '$newsub' => $newsub,
        ]);
    }
}
