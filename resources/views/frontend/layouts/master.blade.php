<!DOCTYPE html>
<html lang="">
<head>
	@include('frontend.layouts.head')	
</head>
<body class="js">
	
	<div id="this-top" class="layout-theme animated-css" data-header="sticky" data-header-top="200">

		<!-- Loader -->
		<div id="page-preloader">
			<div class="loader-img">
				<img src="{{url('storage/street-location.gif')}}" alt="" style="height: 100px; object-fit: contain">
			</div>
		</div>
		<!-- Loader end -->
	
		<div id="wrapper">
	
	
	@include('frontend.layouts.notification')
	<!-- Header -->
	@include('frontend.layouts.header')
	<!--/ End Header -->
	@yield('main-content')
	
	@include('frontend.layouts.footer')

</body>
@toastr_js
@toastr_render 
</html>