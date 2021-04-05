@component('mail::message') 
# Order receved 
thank you for your order from our shop

**Order ID:** {{$order->id}}<br>
**Order Email:** {{$order->billing_email}}<br>
**Order Billing Name:** {{$order->billing_name}}<br>
**Order Total:** {{$order->billing_total}}<br>

 
**Item Ordered**

you can get further details about your order by logging into our website.

@component('mail::button',['url'=>config('app.url'), 'color'=> 'green'])
Go To Web Site
@endcomponent
thank you agin for choosing us.


Regards,<br>

{{config('app.name')}}
    

  @endcomponent