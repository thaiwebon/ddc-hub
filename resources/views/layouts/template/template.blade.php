<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="generator" content="Mobirise v4.8.1, mobirise.com">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="shortcut icon" href="{{URL::asset('assets/images/logo2-122x120.png')}}" type="image/x-icon">
	<meta name="description" content="DDC Service Web Site">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>@yield('title')</title>

	<!-- jquery -->
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<!-- Datatable -->
	@yield('dataTable')

	<link rel="stylesheet" href="{{URL::asset('assets/web/assets/mobirise-icons/mobirise-icons.css')}}">
	<link rel="stylesheet" href="{{URL::asset('assets/tether/tether.min.css')}}">
	<link rel="stylesheet" href="{{URL::asset('assets/soundcloud-plugin/style.css')}}">
	<link rel="stylesheet" href="{{URL::asset('assets/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{URL::asset('assets/bootstrap/css/bootstrap-grid.min.css')}}">
	<link rel="stylesheet" href="{{URL::asset('assets/bootstrap/css/bootstrap-reboot.min.css')}}">
	<link rel="stylesheet" href="{{URL::asset('assets/dropdown/css/style.css')}}">
	<link rel="stylesheet" href="{{URL::asset('assets/socicon/css/styles.css')}}">
	<link rel="stylesheet" href="{{URL::asset('assets/theme/css/style.css')}}">
	<link rel="stylesheet" href="{{URL::asset('assets/mobirise/css/mbr-additional.css')}}">

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="{{URL::asset('css/w3.css')}}" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- <script type="text/JavaScript" src="{{URL::asset('public/js/forms.js')}}"></script> -->
	<!-- <script type="text/JavaScript" src="{{URL::asset('js/sha512.js')}}"></script> -->
	@yield('javascript')

	<!-- Styles -->
    <link href="{{URL::asset('css/stylesheet.css')}}" rel="stylesheet">

    <!-- script popup -->
    <script data-require="bootstrap@*" data-semver="3.1.1" src="{{URL::asset('js/bootstrap.min.js')}}"></script>

    <!-- canvas js -->
    @yield('canvasJS')
    
</head>
<body>
	@include('layouts.menu.menu')
	<section class="engine"></section>
	<section class="mbr-section form1 cid-r5uABbPI15" id="form1-22">
		@yield('content')
	</section>
	@include('layouts.footer.footer')
	<script src="{{URL::asset('assets/popper/popper.min.js')}}"></script>
	<script src="{{URL::asset('assets/tether/tether.min.js')}}"></script>
	<script src="{{URL::asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{URL::asset('assets/smoothscroll/smooth-scroll.js')}}"></script>
	<script src="{{URL::asset('assets/dropdown/js/script.min.js')}}"></script>
	<script src="{{URL::asset('assets/touchswipe/jquery.touch-swipe.min.js')}}"></script>
	<script src="{{URL::asset('assets/theme/js/script.js')}}"></script>
	<script src="{{URL::asset('assets/formoid/formoid.min.js')}}"></script>
</body>
</html>