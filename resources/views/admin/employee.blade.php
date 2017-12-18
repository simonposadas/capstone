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
                      <button class="btn btn-primary icon-pencil"> Edit</button>
                      <button class="btn btn-danger icon-trash"> Delete</button>
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

@section('script')
@endsection