<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('title')</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/bootstrap-responsive.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/fullcalendar.css') }}" />
<link rel="stylesheet" href="{{ asset('css/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/colorpicker.css') }}" />
<link rel="stylesheet" href="{{ asset('css/datepicker.css') }}" />
<link rel="stylesheet" href="{{ asset('css/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('css/matrix-style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/matrix-media.css') }}" />
<link rel="stylesheet" href="{{ asset('css/bootstrap-wysihtml5.css') }}" />
<link href="{{ asset('font/css/font-awesome.css') }}" rel="stylesheet" />
<link href='{{ asset('css/sweetalert.css') }}' rel='stylesheet'>
<link rel="stylesheet" href="{{ asset('css/jquery.gritter.css') }}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>



<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="/admin/dashboard" class="sAdd">fasdfasfsad</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <!-- <ul class="nav">
    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li>
  </ul> -->
  <div>
  <a title="" href="/login" class="tip-bottom"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a>
</div>
</div>
<!--close-top-Header-menu-->



<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li><a href="/admin/dashboard"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="/admin/reservation"><i class="icon icon-table"></i> <span>Reservations</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th"></i> <span>Maintenance</span> <span class=""></span><i class="icon-chevron-down"></i></a>
      <ul>
        <li><a href="/admin/food">Food</a></li>
        <li><a href="/admin/foodtype">Food Type</a></li>
        <li><a href="/admin/packages">Packages</a></li>
        <li><a href="/admin/employee">Employee</a></li>
        <li><a href="/admin/employeerole">Worker Role</a></li>
      </ul>
    </li>
  </ul>
</div>
<!--sidebar-menu-->
@yield('content')
@yield('modal')

<script src="{{ asset('js/excanvas.min.js') }}"></script> 
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/masked.js') }}"></script>
<script src="{{ asset('js/jquery.ui.custom.js') }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/jquery.flot.min.js') }}"></script> 
<script src="{{ asset('js/jquery.flot.resize.min.js') }}"></script> 
<script src="{{ asset('js/jquery.peity.min.js') }}"></script> 
<script src="{{ asset('js/fullcalendar.min.js') }}"></script> 
<script src="{{ asset('js/matrix.js') }}"></script> 
<script src="{{ asset('js/matrix.dashboard.js') }}"></script> 
<script src="{{ asset('js/jquery.gritter.min.js') }}"></script> 
<script src="{{ asset('js/matrix.interface.js') }}"></script> 
<script src="{{ asset('js/matrix.chat.js') }}"></script> 
<script src="{{ asset('js/matrix.charts.js') }}"></script> 
<script src="{{ asset('js/matrix.calendar.js') }}"></script> 
<script src="{{ asset('js/jquery.validate.js') }}"></script> 
<script src="{{ asset('js/matrix.form_validation.js') }}"></script> 
<script src="{{ asset('js/matrix.form_common.js') }}"></script> 
<script src="{{ asset('js/jquery.wizard.js') }}"></script> 
<script src="{{ asset('js/jquery.uniform.js') }}"></script> 
<script src="{{ asset('js/select2.min.js') }}"></script> 
<script src="{{ asset('js/matrix.popover.js') }}"></script> 
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script> 
<script src="{{ asset('js/matrix.tables.js') }}"></script> 
<script src="{{ asset('js/matrix.wizard.js') }}"></script> 
<script src="{{ asset('js/bootstrap-wysihtml5.js') }}"></script> 
<script src="{{ asset('js/wysihtml5-0.3.0.js') }}"></script> 
<script src="{{ asset('js/bootstrap-colorpicker.js') }}"></script> 
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script> 
<script src="{{ asset('js/jquery.flot.min.js') }}"></script> 
<script src="{{ asset('js/jquery.flot.pie.min.js') }}"></script> 
<script src="{{ asset('js/sweetalert.min.js') }}"></script> 
@include('sweet::alert')
@yield('script') 
</body>
</html>