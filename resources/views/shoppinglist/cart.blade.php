@extends('layouts.homepage')

@section('content')
{{csrf_field()}}
<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                @foreach($item_in_cart as $single_cart_item)
                                    <tr>
                                        <td class="cart_product_img">
                                            <a href="#"><img src="upload/{{$single_cart_item->primary_image}}" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>{{$single_cart_item->product_name}}</h5>
                                        </td>
                                        <td class="price">
                                            <span>${{$single_cart_item->price}}</span>
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p>Qty</p>
                                                <div class="quantity">
                                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty2'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <input type="number" class="qty-text" id="qty2" step="1" min="1" max="300" name="quantity" value="1">
                                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty2'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                </div>
                                                <button onclick="delete_from_cart({{$single_cart_item->id}})" type="button" class="btn btn-danger">X</button>
                                            </div>
                                        </td>
                                    </tr>
                                  @endforeach
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                            <?php
                            $total=0;
                                foreach($item_in_cart as $counter_sum)
                                {
                                   $total= $counter_sum->price + $total;

                                }
                            ?>
                                <li><span>subtotal:</span> <span>{{$total}}</span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span> <span>{{$total}}</span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <a href="" class="btn amado-btn w-100">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('javascript')
<script>
 $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$(document).ready(function() {

 //alert("reached here");

    

    });

    function delete_from_cart(pid)
    {
        alert(pid);
        $.ajax({
                
                url: "/delete_from_cart/"+pid,
                type: "GET",
                processData:false,
                contentType:false,
                cache:false,
                success: function (data) {
                    
                  if(data=="deleted")
                  {
                    var cart_number =  $('#cart_number')[0].innerHTML;
                        var cart_number=parseInt(cart_number);
                        //alert("Item has been deleted from cart!!");
                        $("#cart_number").html(cart_number-1);
                        location.reload();
                  }
                   
                else{

                    //alert("Some error has occured!");
                }
                    
                  
                    
                // setTimeout(function() { location.reload(); }, 2000); 
                
                },
                
                
            });


    }
    
</script>
@endsection