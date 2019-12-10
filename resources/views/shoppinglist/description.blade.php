@extends('layouts.homepage')

@section('content')

<div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">{{$singleitem->category}}</a></li>
                               
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(/upload/{{$singleitem->primary_image}});">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(/upload/{{$singleitem->img2}});">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(/upload/{{$singleitem->img3}});">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url(/upload/{{$singleitem->img4}});">
                                    </li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="/upload/{{$singleitem->primary_image}}">
                                            <img class="d-block w-100" src="/upload/{{$singleitem->primary_image}}">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="/upload/{{$singleitem->img2}}">
                                            <img class="d-block w-100" src="/upload/{{$singleitem->img2}}" alt="Second slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="/upload/{{$singleitem->img3}}">
                                            <img class="d-block w-100" src="/upload/{{$singleitem->img3}}" alt="Third slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="/upload/{{$singleitem->img4}}">
                                            <img class="d-block w-100" src="/upload/{{$singleitem->img4}}" alt="Fourth slide">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">$  {{$singleitem->price}}</p>
                                <a href="product-details.html">
                                    <h6>{{$singleitem->product_name}}</h6>
                                </a>
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="review">
                                        <a href="#">Write A Review</a>
                                    </div>
                                </div>
                                <!-- Avaiable -->
                                <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                            </div>

                            <div class="short_overview my-5">
                                <p>{{$singleitem->description}}</p>
                            </div>

                            <!-- Add to Cart Form -->
                            <form class="cart clearfix" id="add_to_cart">
                            {{csrf_field()}}
                                <div class="cart-btn d-flex mb-50">
                                   <input type="text" id="pid" name="pid" value="{{request()->route('id')}}" hidden>
                                   
                                </div>
                                <button type="button" name="addtocart" id="add_to_cart_true" value="5" class="btn amado-btn">Add to cart</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
        $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$(document).ready(function() {



    

    });

        </script>
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

    

    $('#add_to_cart_true').click(function (e) {
        e.preventDefault();
        
        var myForm = document.getElementById('add_to_cart');
        var formData = new FormData(myForm);
  
       
                $.ajax({
                data: formData,
                url: "/add_product_to_cart",
                type: "POST",
                processData:false,
                contentType:false,
                cache:false,
                success: function (data) {
                  if(data=="saved")
                  {
                    var cart_number =  $('#cart_number')[0].innerHTML;
                        var cart_number=parseInt(cart_number);
                        alert("Item has been saved to cart!!");
                        $("#cart_number").html(cart_number+1);
                  }
                   
                else{

                    alert("Product already in cart");
                }
                    
                  
                    
                // setTimeout(function() { location.reload(); }, 2000); 
                
                },
                
                
            });
   
   
        
       
    });

  

 







</script>
@endsection