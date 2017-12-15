@extends('layouts.sidebar')

@section('title', 'Dashboard')
@section('content')

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="/dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    <h1>Dashboard</h1>
  </div>
<!--End-breadcrumbs-->
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="colspan">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Reservations</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Reserve ID</th>
                  <th>Customer Name</th>
                  <th>Guest Number</th>
                  <th>Budget</th>
                  <th>Place</th>
                  <th>Event Date</th>
                  <th>Event Time</th>
                  <th>Actions</th>
                </tr>
              </thead>
                @foreach($types as $type)
                  <tbody>
                    <tr class="gradeX">
                      <td>{{$type->reserv_id}}</td>
                      <td>{{$type->cust_fname . " " . $type->cust_lname}}</td>
                      <td>{{$type ->reserv_guestNo}}</td>
                      <td>{{$type->cust_budget}}</td>
                      <td>{{$type->place}}</td>
                      <td>{{$type->reserv_date}}</td>
                      <td>{{$type->reserv_time}}</td>
                      <td>fl;ajsdflsf</td>
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

<!--end-main-container-part-->

@endsection

@section('script')
@endsection