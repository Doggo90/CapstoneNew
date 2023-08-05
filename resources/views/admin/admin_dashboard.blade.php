<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>Admin Panel</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->
	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset(' backend/assets/vendors/core/core.css' )}}">
	<!-- endinject -->
  

	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset( 'backend/assets/fonts/feather-font/css/iconfont.cs' )}}s">
	<link rel="stylesheet" href="{{ asset( 'backend/assets/vendors/flag-icon-css/css/flag-icon.min.css' )}}">
	<!-- endinject -->

    <!-- Layout styles -->  
	<link rel="stylesheet" href="{{ asset( 'backend/assets/css/demo2/style.css' )}}">
    <!-- End layout styles -->

  <link rel="shortcut icon" href="{{ asset( 'backend/assets/images/favicon.png' )}}" />
    <!-- Toastr CSS -->  
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    <!-- End Toastr CSS --> 
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>

</head>
<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
        @include('admin.body.sidebar')
		<!-- partial -->

	<div class="page-wrapper">
					
			<!-- partial:partials/_navbar.html -->
        @include('admin.body.header')
			<!-- partial -->

     
      <br><br><br>
        @yield('admin')

			<!-- partial:partials/_footer.html -->

			<!-- partial -->
        @include('admin.body.footer')
	</div>
	</div>


	<!-- core:js -->
	<script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
	<!-- endinject -->


	<!-- inject:js -->
	<script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/template.js') }}"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
  <script src="{{ asset('backend/assets/js/dashboard-dark.js') }}"></script>
	<!-- End custom js for this page -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Toastr js -->
    
    <script>
     @if(Session::has('message'))
     var type = "{{ Session::get('alert-type','info') }}"
     switch(type){
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;
    
        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;
    
        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;
    
        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break; 
     }
     @endif 
    </script>
    <!-- End Toastr js -->
</body>
</html>    