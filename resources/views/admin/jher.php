@extends('header')
@section('Title','Equipment')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
<div class="">
<div class="page-title">
<div class="title_left">
<div class="page-title">
<div class="title_left"></div>
<h1>Equipment </h1>
</div>
</div>
@if(session()->has('message'))

<?php
$message = session()->get("message");
?>

<script type="text/javascript">

function message()
{
var mess = "<?php echo $message ?>";
new PNotify({
title: 'Success!',
text: mess,
type: 'success',
styling: 'bootstrap3'
});
}

window.onload = message;
</script>
@endif
</div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12">

        <div class="x_title">
        <div class="clearfix"></div>
        </div>
        <div class="x_content">

      </div>
    </div>


  <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
  <div class="table-responsive" style="padding-top: 25px;">
  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap jambo_table bulk_action" cellspacing="0" width="100%">
  <thead>
  <tr class="headings">
  <th>Equipment Name </th>
  <th>Quantity </th>
  <th>Available </th>
  <th>Price</th>
  <th>Action</th>
  </tr>
  </thead>
  <tbody>
  <tr>
    @foreach ($equip as $equip)
  <td>{{ $equip->Item}}</td>
  <td>{{ $equip->qty}}</td>
  <td>{{ $equip->available_item}}</td>
  <td>{{ $equip->equipprice}}</td>
  <td>
  <a class="btn btn-info" data-toggle="modal" href= "#editModal" onclick="updateEquipmentGet(this.name);" name="{{$equip->Inv_id}}"><i class="fa fa-edit"></i></a>
  <a class="btn btn-warning" data-toggle="modal" href= "#deleteModal" name="{{$equip->Inv_id}}" onclick="deleteEquipmentGet(this.name)"><i class="fa fa-archive"></i></a>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>

<!-- edit modal -->
<form method = "POST" action = "/updateEquipment" id="updateEquipmentform">
<div class="modal" id="editModal" >
<div class="modal-content " style = "width: 500px;">
    {!! csrf_field() !!}
<div class="alert alert-info" role="alert" >
<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
&nbsp;<big>Update Equipment</big><button type="button" class="close" data-dismiss="modal">&times;</button>
<input type = "text" name="Inv_id" id ="Inv_id" hidden> </input> <br>
</div>
<div class="form-horizontal form-label-left editequipment">
<div class=form-group>
<label class="control-label col-md-4 col-sm-4 col-xs-4">Equipment Name: </label>
<div class="col-md-6 col-sm-6 col-xs-6">
<input class="form-control col-md-8 col-xs-1" style="text-transform: capitalize;" type="text" name="Itemedit" id ="Itemedit" maxlength="22" > </input> <br>
</div>
</div>

<div class=form-group>
<label class="control-label col-md-4 col-sm-4 col-xs-4">Quantity: </label>
<div class="col-md-6 col-sm-6 col-xs-6">
<input class="form-control col-md-8 col-xs-1" type="text" name="qtyedit" id ="qtyedit" maxlength="22" > </input> <br>
</div>
</div>


<div class=form-group>
<label class="control-label col-md-4 col-sm-4 col-xs-4">Price: </label>
<div class="col-md-6 col-sm-6 col-xs-6">
<input class="form-control col-md-8 col-xs-1" type="text" name="equippriceedit" id ="equippriceedit" maxlength="22" > </input> <br>
</div>
</div>

<div class="ln_solid"></div>
<div class="form-group">
<div class="col-md-9 col-md-offset-4">
<input type ="submit" class="btn btn-info" name="editequipments" value="Update"></input>
<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
</div>
</div>
</div>
</div>
</div>
</form>
<!--end edit modal -->

<!-- delete modal -->
<form method = "POST" action = "/deleteEquipment">
<div class="modal" id="deleteModal" >
<div class="modal-content deleteequipment" style = "width: 400px;">
{!! csrf_field() !!}
<div class="alert alert-warning" role="alert">
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
<span class="sr-only">Error:</span><big>Are you sure you want to delete this?</big>
<button type="button" class="close" data-dismiss="modal">&times;</button>
<input type = "text" name="Inv_iddelete" id ="Inv_iddelete" style="color:black" hidden> </input> <br>
</div>
<div class="form-horizontal form-label-left">
<div class="form-group">
<div class="col-md-9 col-md-offset-3">
<input type="submit" class='btn btn-success submit-button' id="delButton" value="&nbsp;&nbsp;&nbsp;&nbsp;Ok&nbsp;&nbsp;&nbsp;&nbsp;" />
<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
</div>
</div>
</div>
</div>
</div>
</form>

<!-- end delete modal -->


<!-- /page content -->
@stop


<script src="js/jquery.min.js"></script>
<script>
function deleteEquipmentGet(id){
$("#Inv_iddelete").val(id);
}
  function updateEquipmentGet(id){
    $.ajax({
            type: "GET",
            url:  "/RetrieveEquipment",
            data:
            {
                Inv_id: id
            },

            success: function(data){

            $('#Inv_id').val(data['equipment'][0]['Inv_id']);
            $('#Itemedit').val(data['equipment'][0]['Item']);
            $('#itemdescriptedit').val(data['equipment'][0]['itemdescript']);
            // $('#editequipmenttype').val(data['equipment'][0]['equipmenttype']);
            $('#qtyedit').val(data['equipment'][0]['qty']);
            $('#equippriceedit').val(data['equipment'][0]['equipprice']);


            },
            error: function(xhr)
            {
                alert("Error");
                alert($.parseJSON(xhr.responseText)['error']['message']);
            }
        });
  }

</script>
<script type="text/javascript">
$(document).ready(function() {
$('#updateEquipmentform').bootstrapValidator({
// To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
feedbackIcons: {
valid: 'glyphicon glyphicon-ok',
invalid: 'glyphicon glyphicon-remove',
validating: 'glyphicon glyphicon-refresh'
},
fields: {
Itemedit: {
validators: {
stringLength: {
max: 30,
message: 'This Field is Maximum of 30 Characters Only'
},
regexp: {
regexp: /[a-zA-Z0-9]/,
message: 'This Field is for letters and numbers only'
},
notEmpty: {
message: 'Please Input Something'
}
}
},
qtyedit: {
validators: {
stringLength: {
max: 30,
message: 'This Field is Maximum of 20 Characters Only'
},
regexp: {
regexp: /^[1-9]\d*$/,
message: 'This Field is for positive and whole numbers only'
},
notEmpty: {
message: 'Please Input Something'
}
}
},
available_itemedit: {
validators: {
stringLength: {
max: 30,
message: 'This Field is Maximum of 20 Characters Only'
},
regexp: {
regexp: /^[1-9]\d*$/,
message: 'This Field is for positive and whole numbers only'
},
notEmpty: {
message: 'Please Input Something'
}
}
},
}
})
.on('success.form.bv', function(e) {
$('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
$('#updateEquipmentform').data('bootstrapValidator').resetForm();

// Prevent form submission
e.preventDefault();

// Get the form instance
var $form = $(e.target);

// Get the BootstrapValidator instance
var bv = $form.data('bootstrapValidator');

// Use Ajax to submit form data
$.post($form.attr('action'), $form.serialize(), function(result) {
console.log(result);
}, 'json');
});
});
</script>