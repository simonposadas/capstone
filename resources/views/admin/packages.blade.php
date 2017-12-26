@extends('layouts.sidebar')

@section('title', 'Packages')
@section('content')

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="/admin/dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Packages</a> </div>
  <h1>Packages</h1>
</div>
<div class="container-fluid">
    <hr>
    <div class="pull-left">
      <button class="btn btn-success btn-large icon-plus addFood"> Add Package</button>
    </div>
    <div class="row-fluid">
      <div class="colspan">
        <div class="widget-box">
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Package Name</th>
                  <th>Price</th>
                  <th>Actions</th>
                </tr>
              </thead>
                @foreach($packages as $pack)
                  <tbody>
                    <tr>
                      <td>{{$pack->package_name}}</td>
                      <td>{{$pack->package_price}}</td>
                      <td>
                        <button class="btn btn-primary icon-pencil edittype" data-id="{{ $pack->package_id }}"> Edit</button>
                        <button class="btn btn-danger icon-trash deletetype" data-id="{{ $pack->package_id }}"> Delete</button>
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
<!-- delete modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="/deletePack">
        {{csrf_field()}}
        <input type="hidden" class="id" name="id" id="deleteID">		  
        <div class="form-group">
          <h4>Delete package?</h4>
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
<script>

      $('.deletetype').click(function () {
          $('#deleteID').val($(this).data('id'));
          $('#deleteModal').modal('show');
      });

</script>
@endsection