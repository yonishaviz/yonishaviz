@extends('layouts.app')
@section('content')

@if(Cart::count()>0)

<h2>{{Cart::count()}} Item(s) in shopping cart</h2>
<div>
@foreach(Cart::content() as $item)
        <table>

        <td>
    <a href="{{route('shop.show',$item->model->slug)}}"><img style="width:30%" src="{{('storage/'.$item->model->product_image)}}  " alt="item"></a>
     </td>
    <td>
<a href="{{route('shop.show',$item->model->slug)}}">{{$item->model->name}}</a>
        </td>
           
                <td> &nbsp&nbsp &nbsp&nbsp
   {{$item->subtotal}}

             </td>
             <td>&nbsp&nbsp &nbsp&nbsp
        <select class = 'quantity' data-id='{{$item->rowId}}'>
                <option {{$item->qty == 1 ? 'selected' : ''}}>1</option>
                <option {{$item->qty == 2 ? 'selected' : ''}}>2</option>
                <option {{$item->qty == 3 ? 'selected' : ''}}>3</option>
                <option {{$item->qty == 4 ? 'selected' : ''}}>4</option>
                <option {{$item->qty == 5 ? 'selected' : ''}}>5</option>

        </select>
            </td>
            <td> 
    
                &nbsp&nbsp &nbsp&nbsp
    </td>
            <td> 
    <form action="{{route('cart.ForLater',$item->rowId)}}" method="post">
    {{csrf_field()}} 
       <button type="submit" class="cart-option">Save For Later </button> &nbsp&nbsp  
    </form>
            </td> 
<td>  
    <form action="{{route('cart.destroy',$item->rowId)}}" method="post">
    {{csrf_field()}} 
    {{method_field('DELETE')}}
       <button type="submit" class="cart-option">Remove</button>  
    </form> </td>



<table>
    &nbsp&nbsp &nbsp&nbsp
    <td></td>
    <td>   {{$item->model->details}}</td>

            
            </table>
    </table>
<hr>
   
@endforeach
     
	
    <div> 
    Subtotal: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  {{Cart::subtotal()}}
        <br>
    Tax(21%):    &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp{{Cart::tax()}}
        <br>
        <b> Total: &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp {{Cart::total()}}</b>
    
    
   	
    </div>
</div>

		
@else
<h2>no Items in the Shopping Cart</h2>

@endif
 <script type="text/javascript">
        
 $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });


$('select.quantity').on('click', function() {


      const cc= document.querySelectorAll('.quantity');
      Array.from(cc).forEach(function(element){
        
element.addEventListener('change',function(){

      const id = element.getAttribute('data-id');
      var qan = $(this).val();

$.ajax({
        data:{qan: qan},
        type:'POST',
        url:"update/"+id,

success:function(data){
        window.location.href='{{route('cart.index')}}';
           },
    error:function(data){
            window.location.href='{{route('cart.index')}}';
}
           })
           });
           }); 
           });
           
</script>

<a class="nav-link" href="/"><font face="Times New Roman" size="4">
<br>
    <button>Countinue Showping</button></font></a>
<a class="nav-link" href="/check"><font face="Times New Roman" size="4">
    <button>compelete proccess</button></font></a>

@if(Cart::instance('SaveForLater')->count() > 0)
<h2>{{Cart::instance('SaveForLater')->count()}} Item(s) Saved for Later</h2>
@foreach(Cart::instance('SaveForLater')->content() as $item)
<table>
<td>
    <a href="{{route('shop.show',$item->model->slug)}}"><img style="width:30%" src="{{asset('storage/cover_images/'.$item->model->slug.'.jpg')}}" alt="item"></a>
     </td>
<td>
<a href="{{route('shop.show',$item->model->slug)}}">{{$item->model->name}}</a>
        </td>
                <td> &nbsp&nbsp &nbsp&nbsp
   {{$item->model->price}}
&nbsp&nbsp 
                    </td>
         <td> 
    <form action="{{route('ForLater.swtichToCart',$item->rowId)}}" method="post">
    {{csrf_field()}} 
       <button type="submit" class="cart-option">Move To Cart</button>
    
    </form></td>
<td> 
    <form action="{{route('ForLater.destroy',$item->rowId)}}" method="post">
    {{csrf_field()}} 
    {{method_field('DELETE')}}
    &nbsp&nbsp     <button type="submit" class="cart-option">Remove</button>
    </form>
</td>

 </table>
    
<table>
    <td></td>
    <td>   {{$item->model->details}}</td>

           
    </table>
<hr>

@endforeach
@else
<h2>no Items Saved for later</h2>

@endif

@endsection
