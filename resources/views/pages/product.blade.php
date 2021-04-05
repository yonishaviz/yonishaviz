@extends('layouts.app')
@section('content')
<section>
<nav>
    <ul>
       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    </ul>
  </nav>
    
 <div style="width: 30%"  class="product-image">
   <img style="width: 60%"  src= "{{productImage($product->product_image)}}"  alt="product" id="currentImage">
    </div>
    <ul> 
      <div>
         <div><h1>{{$product->name}}</h1></div>
         <br>
            <h3> Detils</h3>
        <div>{{$product->details}}</div>
                     <br>

            <h3> Description</h3>

      <p>{{$product->desc}}</p>
              <div><h1>{{$product->price}}</h1></div>

            </div>
            <br>
    <input type="hidden" name="id" value="{{$product->id}}">
    <input type="hidden" name="name" value="{{$product->name}}">
    <input type="hidden" name="price" value="{{$product->price}}">
    <button class="btn btn-success btn-submit">Add to Cart</button>
</ul>
  </section>
<section>
<nav>
    <ul>
       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    </ul>
  </nav>
<div style="width: 30%" class="product-section-images">

  <div class="product-section-thumbnail selected">
 <img style="width:90%"  src= "{{productImage($product->product_image)}}"  alt="product">
</div>
@if($product->images)
@foreach(json_decode($product->images, true) as $image)
 <div class="product-section-thumbnail">
 <img style="width:90%" src= "{{productImage($image)}}"  alt="product">
</div>
@endforeach
   @endif
</div>
</div>
</section>
   



<hr>
<h2>you might like</h2>
<script type="text/javascript">

   

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

   

    $(".btn-submit").click(function(e){

  

        e.preventDefault();

   

        var id = $("input[name=id]").val();

        var name = $("input[name=name]").val();

        var price = $("input[name=price]").val();

   

        $.ajax({

           type:'POST',

           url:"{{ route('cart.store') }}",

           data:{id:id, name:name, price:price},

           success:function(data){

              alert('item added to cart');

           }

        });

  

	});


</script>
<script>
  (function(){
const currentImage = document.querySelector('#currentImage');
const images = document.querySelectorAll('.product-section-thumbnail');
images.forEach((element)=> element.addEventListener('click', thumbnailClick));
function thumbnailClick(e) {
currentImage.src = this.querySelector('img').src;
}
  })();
</script>

@include('pages.might')

@endsection


@section('extra-js')

@endsection

   