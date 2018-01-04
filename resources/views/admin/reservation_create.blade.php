@extends('layouts.sidebar')

@section('title', 'Create Reservation')
@section('content')
<!--main-container-part-->  
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="/admin/dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/admin/reservation">Reservations</a> <a href="#" class="current">Create reservations</a> </div>
  <h1>Create Reservation</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="colspan">
      <div class="widget-box">
        <div class="widget-content nopadding">
            <form action="#" method="get" class="form-horizontal">
                <div class="control-group">
                    <label class="control-label">Reservation Date (mm-dd-yyyy)</label>
                    <div class="controls">
                        <div  data-date="12-02-2012" class="input-append date datepicker">
                        <input type="text" value="12-02-2012"  data-date-format="mm-dd-yyyy" class="span11" >
                        <span class="add-on"><i class="icon-th"></i></span> </div>
                    </div>
                </div>
                <hr>
                <div class="control-group">
                    <label class="control-label">First Name :</label>
                    <div class="controls">
                        <input type="text" class="span5" placeholder="First name" required/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Middle Name :</label>
                    <div class="controls">
                        <input type="text" class="span5" placeholder="Middle name(optional)" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Last Name :</label>
                    <div class="controls">
                        <input type="text" class="span5" placeholder="Last name" required/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">First Name :</label>
                    <div class="controls">
                        <input type="text" class="span5" placeholder="First name" required/>
                    </div>
                </div>
            </form>

        </div>
    </div>
  </div>
</div>
@endsection

@section('script')

@endsection