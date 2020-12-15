<!DOCTYPE html>
<html lang="">
<head>
	@include('frontend.layouts.head')	
</head>
<body class="js">
	
	<div id="this-top" class="layout-theme animated-css" data-header="sticky" data-header-top="200">

		<!-- Loader -->
		<div id="page-preloader"><span class="spinner"></span></div>
		<!-- Loader end -->
	
		<div id="wrapper">
	
	
	@include('frontend.layouts.notification')
	<!-- Header -->
	@include('frontend.layouts.header')
	<!--/ End Header -->
	@yield('main-content')
	
	@include('frontend.layouts.footer')

</body>
</html>