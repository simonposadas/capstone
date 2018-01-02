@extends('layouts.sidebar')

@section('title', 'Employee')
@section('content')

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="/admin/dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Employee</a> </div>
  <h1>Employees</h1>
</div>
<div class="row-fluid">
    <hr>
    <div class="pull-left">
      <button class="btn btn-success btn-large icon-plus addWorker"> Add Worker</button>
    </div>
    <div class="container-fluid">
      <div class="span12">
        <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5>Data table</h5>
        </div>
        <div class="widget-content nopadding">
          <table class="table table-bordered data-table" id="emp_table">
            <thead>
              <tr>
                <th>Employee Name</th>
                <th>Role</th>
                <th>Actions</th>
              </tr>
            </thead>
              @foreach($employee as $emp)
                <tbody>
                  <tr>
                    <td>{{$emp->worker_fname .' '. $emp->worker_lname}}</td>
                    <td>{{$emp->worker_role_description}}</td>
                    <td >
                      <button class="btn btn-primary icon-pencil edittype" data-id="{{$emp->worker_id}}"> Edit</button>
                      <button class="btn btn-danger icon-trash deletetype" data-id="{{$emp->worker_id}}"> Delete</button>
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
        <h4 class="modal-title">Add Employee</h4>
      </div>
      <div class="modal-body">
      <form method="post" action="/addEmployee">
        {{csrf_field()}}
          <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" placeholder="First Name" name="fname" required>
          </div>
          <div class="form-group">
            <label>Middle Name</label>
            <input type="text" class="form-control" placeholder="Middle Name" name="mname" required>
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" placeholder="Last Name" name="lname" required>
          </div>
          <div class="form-group">
            <label>Age</label>
            <input type="number" class="form-control" placeholder="Age" name="age" required>
          </div>
          <div class="control-group">
            <label class="control-label">Select input</label>
            <div class="controls select2-container">
              <select name="worker_role">
                <option disabled>Select worker role</option>
                @foreach($type as $type)
                  <option value="{{$type->worker_role_id}}">{{$type->worker_role_description}}</option>
                @endforeach
              </select>
            </div>
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
        <h4 class="modal-title">Edit Employee</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="/editEmployee">
        {{csrf_field()}}
          <input type="hidden" class="id" name="id" id="editID">		  
        <div class="form-group">
          <label>First Name</label>
          <input type="text" class="form-control" placeholder="First Name" name="fname" required>
        </div>
        <div class="form-group">
          <label>Middle Name</label>
          <input type="text" class="form-control" placeholder="Middle Name" name="mname" required>
        </div>
        <div class="form-group">
          <label>Last Name</label>
          <input type="text" class="form-control" placeholder="Last Name" name="lname" required>
        </div>
        <div class="form-group">
          <label>Age</label>
          <input type="number" class="form-control" placeholder="Age" name="age" required>
        </div>
        <!--  -->
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
        <form method="post" action="/deleteEmployee">
        {{csrf_field()}}
        <input type="hidden" class="id" name="id" id="deleteID">		  
        <div class="form-group">
          <h4>Delete employee?</h4>
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
   
    $('.addWorker').click(function () {
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
        //     url : '/getEmployee' + $(this).data('id'),
        //     data : {id : $(this).data('id')},
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