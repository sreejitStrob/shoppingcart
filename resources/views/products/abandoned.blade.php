@extends('layouts.master')

@section('content')
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>    
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>    
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"/>    
<link rel="stylesheet" href="{{asset('css/datatableCutstom.css')}}"/>
<link rel="stylesheet" href="{{asset('css/swal.css')}}"/> 
<link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}"/> 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">




<div class="card-body">

<ul class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#opened_cases">Abandoned Cart</a>
    </li>
 
</ul>

  <div class="tab-content">
  <div id="opened_cases" class="tab-pane active">
<table id="example" class="hover" style="width:100%">
           <thead class="table_head">
         
                <th>ID</th>
                <th>Image</th>
                <th>User id</th>
                <th>Item Title</th>
                <th>Price</th>
               <th>Created on</th>
               
             
                
      
            </thead>
      
         <!--  <td>
  
          <img class="img-circle elevation-2" src="/images/Red_l.png" alt="logo" weight="20px" height="20px">
      
          <img class="img-circle elevation-2" src="/images/Orange_l.png" alt="logo" weight="20px" height="20px">
       
          <img class="img-circle elevation-2" src="/images/Green_l.png" alt="logo" weight="20px" height="20px">
        
           </td>
      -->
        <tbody>
        @foreach($item_in_cart as $single_uni_item)
            <tr>
                <td>{{$single_uni_item->id}}</td>
                <td> <img class="img-circle elevation-2" src="upload/{{$single_uni_item->primary_image}}" alt="logo" weight="100px" height="100px"></td>
                <td>{{$single_uni_item->user_id}}</td>
                <td>{{$single_uni_item->product_name}}</td>
                <td>{{$single_uni_item->price}}</td>
                <td>{{$single_uni_item->created_at}}</td>

            </tr>

        @endforeach
   
            </tbody>
        
    </table>
</div>


<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modal Header</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <form role="form" id="close_form" enctype="multipart/form-data">
          <div class ="row">
            <div class="col-md-3">
            {{csrf_field()}}
                
            
              <label></label>
            
            </div>
            <div class="col-md-9">
                  <label>Have you received payment from the buyer?</label>
                  <input type="text" name="hidden_disputeid" id="hidden_disputeid"> 
                  <div class="radio">
                    <input type="radio" value="Yes" name="optradio" id="optradio1" checked>Yes
                  </div>
                  <div class="radio">
                    <input type="radio" value="No" name="optradio" id="optradio2">No
                  </div>
            </div>
          </div>
        </div>
          
        <button type="button" id="close_case" name="close_case" class="btn btn-success" data-dismiss="modal">Close Case</button>
        </form>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


@endsection

@section('javascript')
<script src="{{asset('admin-lte/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin-lte/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
 $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$(document).ready(function() {

$('#example').DataTable( {

} );

$('#example thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text"/>' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( data_table.column(i).search() !== this.value ) {
              data_table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );





</script>
@endsection

