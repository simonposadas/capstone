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
    <button class="btn btn-success btn-large icon-plus"> Add Food</button>
  </div>
  <div class="row-fluid">
    <div class="colspan">
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