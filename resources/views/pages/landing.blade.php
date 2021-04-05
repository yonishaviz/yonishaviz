@extends('layouts.app')
@section('content')

<ul>
@foreach($categories as $category)
<lo class="{{request()->category == $category->slug ? 'SelCat' : ''}}"> <a href="{{route('shop.index',['category' => $category->slug])}}">{{$category ->name}}</a></lo>
         @endforeach
</ul>
<br>
<div><h1>&nbsp&nbsp&nbsp&nbsp&nbsp HiiiI I AM HERE {{$categoryName}} </h1>
       
    <div align="center"> <strong>sort by price:&nbsp&nbsp</strong> 
<a href="{{route('shop.index',['category' => request()->category, 'sort' => 'low_high'])}}"> low to high</a>&nbsp&nbsp&nbsp&nbsp&nbsp
        <a href="{{route('shop.index',['category' => request()->category, 'sort' => 'high_low'])}}"> high to low</a></div>
<br>
</div>
  <div style ='width:1200px'  class="products text-center">
         
 @forelse($products as $product)
<div class="product">
  <div>  <a href ="{{route('shop.show',$product->slug)}}">
  
    <img style="width:20%" src= "{{('storage/'.$product->product_image)}}" alt="product">
     
    </a>
      
    </div>

    <div>
   &nbsp&nbsp&nbsp&nbsp&nbsp <a href ="{{route('shop.show',$product->slug)}}">{{$product->name}}</a>
        <br>
    </div>
    <div>
   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  <small class="item-product">{{$product->price}}</small>
            </div>
      </div>
      @empty
      <div> No Items found</div>
@endforelse
     </div>
<div align = 'center'>{{$products->appends(request()->input())->links()}}
</div>


@endsection
   
