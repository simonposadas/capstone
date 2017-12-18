@extends('layouts.sidebar')

@section('title', 'Reservations')
@section('content')

<!--main-container-part-->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Reservations</a> </div>
  <h1>Reservations</h1>
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
              <th>Reserve ID</th>
              <th>Customer Name</th>
              <th>Guest Number</th>
              <th>Budget</th>
              <th>Place</th>
              <th>Event Date</th>
              <th>Event Time</th>
              <th>Actions</th>
            </thead>
              @foreach($details as $detail)
                <tbody>
                  <tr>
                    <td>{{$detail->reserv_id}}</td>
                    <td>{{$detail->cust_fname . " " . $detail->cust_lname}}</td>
                    <td>{{$detail ->reserv_guestNo}}</td>
                    <td>{{$detail->cust_budget}}</td>
                    <td>{{$detail->place}}</td>
                    <td>{{$detail->reserv_date}}</td>
                    <td>{{$detail->reserv_time}}</td>
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
<!--main-container-part-->

@endsection

@section('script')
@endsection