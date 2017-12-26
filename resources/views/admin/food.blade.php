@extends('layouts.sidebar')

@section('title', 'Food')
@section('content')

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="/admin/dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Food</a> </div>
  <h1>Foods</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="pull-left">
    <button class="btn btn-success btn-large icon-plus addFood"> Add Food</button>
  </div>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-content nopadding">
          <table class="table table-bordered data-table">
            <thead>
              <tr>
                <th>Food ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Price</th>
                <th>Actions</th>
              </tr>
            </thead>
              @foreach($var as $var)
                <tbody>
                  <tr>
                    <td>{{$var->food_id}}</td>
                    <td>{{$var->food_name}}</td>
                    <td>{{$var->food_type_name}}</td>
                    <td>Php {{$var->price}}</td>
                    <td >
                      <button class="btn icon-pencil btn-primary edittype" data-id="{{ $var->food_id }}"> Edit</button>
                      <button class="btn btn-danger icon-trash deletetype" data-id="{{ $var->food_id }}"> Delete</button>
                    </td>
                  </tr>
                </tbody>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('modal')
<!-- add modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Food</h4>
      </div>
      <div class="modal-body">
      <form method="post" action="/addFood">
      {{csrf_field()}}		  
            <div class="form-group">
          <label>Food Name</label>
          <input type="text" class="form-control" placeholder="Food Name" name="name" required>
        </div>
        <div class="control-group">
          <label class="control-label">Select input</label>
          <div class="controls select2-container">
            <select name="food_type">
              <option disabled>Select food type</option>
              @foreach($types as $type)
                <option value="{{$type->food_type_id}}">{{$type->food_type_name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label>Price</label>
          <input type="number" class="form-control" placeholder="Price" name="price" required>
        </div>
      </div>  
		  <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- end add modal -->


<!-- edit modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Food</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="/editFood">
        {{csrf_field()}}
          <input type="hidden" name="id" id="editID">		  
          <div class="form-group">
		        <label>Food Name</label>
		        <input type="text" class="form-control inpname" name="name">
		      </div>
          <div class="form-group">
            <label>Price</label>
            <input type="number" class="form-control inprice" name="price">
          </div>
      </div>  
		  <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- end edit modal -->

<!-- delete modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="/deleteFood">
        {{csrf_field()}}
        <input type="hidden" class="id" name="id" id="deleteID">		  
        <div class="form-group">
          <h4>Delete food?</h4>
        </div>
      </div>  
		  <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Confirm</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- end delete modal -->
@endsection

@section('script')

<script type="text/javascript">
   
    $('.addFood').click(function () {
      $('#addModal').modal('show');
    });


    $('#editModal').on('show.bs.modal', function () {
        $(this).find('#btn-primary').on('click', function () {
            $('#editModal').find('form').submit();
        });
    })

    $('.edittype').click(function () {
        // $.ajax
        // ({
        //     type : 'Get',
        //     url : '/getFood' + $(this).data('id'),
        //     data : {"id" : $(this).data('id')},
        //     dataType: "json",
        //     success: function(response) {
        //         response.forEach(function(data){
        //             $('#editModal .id').val($(this).data('id'));
        //             $('#editModal .inpname').val(data.food_name);
        //             $('#editModal .inprice').val(data.price);
        //         })
        //     }
        // });
        $('#editID').val($(this).data('id'));
        $('#editModal').modal('show');
    });


    $('.deletetype').click(function () {
        $('#deleteID').val($(this).data('id'));
        $('#deleteModal').modal('show');
    });

</script>

@endsection