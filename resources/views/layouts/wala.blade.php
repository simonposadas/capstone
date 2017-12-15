<!DOCTYPE html>
<html lang="en">
    <head><title>@yield('title')</title></head>
            @yield('content')
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/bootstrap-responsive.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/fullcalendar.css') }}" />
<link rel="stylesheet" href="{{ asset('css/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('css/matrix-style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/matrix-media.css') }}" />
<link rel="stylesheet" href="{{ asset('css/matrix-login.css') }}" />
<link href="{{ asset('font/css/font-awesome.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/jquery.gritter.css') }}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

<script src="{{ asset('js/excanvas.min.js') }}"></script> 
<script src="{{ asset('js/jquery.min.js') }}"></script>
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
<script src="{{ asset('js/jquery.validate.js') }}"></script> 
<script src="{{ asset('js/matrix.form_validation.js') }}"></script> 
<script src="{{ asset('js/jquery.wizard.js') }}"></script> 
<script src="{{ asset('js/jquery.uniform.js') }}"></script> 
<script src="{{ asset('js/select2.min.js') }}"></script> 
<script src="{{ asset('js/matrix.popover.js') }}"></script> 
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script> 
<script src="{{ asset('js/matrix.tables.js') }}"></script> 

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
    @yield('scripts')
</html>