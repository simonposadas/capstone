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