@extends('layouts.master')

@section('content')
<section class="content">
<div class="row">
<div class="col-sm-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
        <h3 class="card-title">Add product</h3>
        </div>
    
        <form id="add_product_form" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="container">
            <div class="card-body">           
                <div class="row">
                <div class="col-sm-2">
                        <label for="product_title" class="form-label">Product Name :</label>
                   </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="product_title" id="product_title" placeholder="Product Name">
                    </div>
                </div>
                <br>
                <div class="row">
                <div class="col-sm-2">
                        <label for="Crm_username" class="form-label">Category:</label>
                   </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="product_category" id="product_category" placeholder="Category">
                    </div>
                </div>    
                <br>
                 <div class="row">
                    <div class="col-sm-2">
                        <label for="Password" class="form-label">Price:</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="price" id="price" placeholder="Price">
                    </div>
                </div>  
                <br>
                 
            
                 <div class="row">
                    <div class="col-sm-2">
                        <label for="Auth Token" class="form-label">Description:</label>
                    </div>
                    <div class="col-sm-9">
                    <textarea name="description" id="description" placeholder="Product_details" rows="4" cols="50">

                        </textarea>
            <br>
            <div class="row">
                     <div class="col-sm-5">
                     <input type="file" id="upload_file" name="file[]" onchange="preview_image();" multiple="true"">
                     </div>



            </div>
            <br>
            <div id="image_preview"></div>
           
                        <div class="row">
                        <div class="col-sm-5">
                        <br>
                        <button class="form control btn btn-success" type="button" title="Add Product" name="add_product" id="add_product" value="add_item">Add Product </button>
                       </div>
                        </div>
                           </form>                
                    </div>
                   
                </div>         
            </div>
        </div>
    </div>

    
</div>
</div>
</section>
@endsection
@section('javascript')
<script src="{{asset('admin-lte/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin-lte/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
 $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$(document).ready(function() {

 //alert("reached here");

    

    });

    //save User with ebay auth

    $('#add_product').click(function (e) {
        e.preventDefault();
        
        var myForm = document.getElementById('add_product_form');
        var formData = new FormData(myForm);
        var validation= validationtest();
        if(validation==true)
        {
                $.ajax({
                data: formData,
                url: "/add_product_store",
                type: "POST",
                processData:false,
                contentType:false,
                cache:false,
                success: function (data) {
                    debugger;
                    $('#add_product_form').trigger("reset");
                    $('#image_preview').empty(); 
                    console.log(data);
                    
                    swal("Product added Successfully!");
                    
                // setTimeout(function() { location.reload(); }, 2000); 
                
                },
                
                
            });
    }
    else{

        swal("some error has occured");
    }
        
       
    });

    function validationtest()
    {
        debugger;
        var total_file=document.getElementById("upload_file").files.length;
        if(total_file!=5)
        {
            swal("Please Upload exactly 5 Files");
            return false;

        }  
        else{

            return true;
        }

    }

    function preview_image() 
{
    $('#image_preview').empty();
 var total_file=document.getElementById("upload_file").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<img height='42' width='42' src='"+URL.createObjectURL(event.target.files[i])+"'> &nbsp;");
 }
}







</script>
@endsection




