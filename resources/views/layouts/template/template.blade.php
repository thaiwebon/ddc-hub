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

	@include('layouts.css.css')
	@yield('css-custom-script')
  	@yield('css-custom')

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	@yield('javascript')
	
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
	@include('layouts.js.js')
	@yield('js-custom-script')
  	@yield('js-custom')
</body>
</html>