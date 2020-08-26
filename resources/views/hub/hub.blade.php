@extends('hub.template')
@section('content')
<div class="container">
	<div class="title m-b-md">
		<img src="{{URL::asset('images/icon/it_logo.png')}}" width="80%">
	</div>

	<div class="card card-1" onclick="window.location.href = '{{ url('formService') }}';">
		<img src="{{URL::asset('images/icon/service_icon.png')}}" width="200" height="200">
		<label>Service</label>
	</div>
	<!-- <div class="card card-1" onclick="window.location.href = '{{ url('dashboardService') }}';">
		<img src="{{URL::asset('images/icon/dashboard_icon.png')}}" width="200" height="200">
		<label>Dashboard</label>
	</div> -->
	<div class="card card-1" onclick="window.location.href = '{{ url('formEmail') }}';">
		<img src="{{URL::asset('images/icon/email_icon.png')}}" width="200" height="200">
		<label>MailGoThai Register</label>
	</div>

	<div class="card card-1">
		<img src="{{URL::asset('images/icon/vpn_icon.png')}}" width="200" height="200">
		<label>VPN</label>
	</div>
	<div class="card card-1" onclick="window.location = '{{ url('') }}'">
		<img src="{{URL::asset('images/icon/ad_icon.png')}}" width="200" height="200">
		<label>AD</label>
	</div>
	<div class="card card-1">
		<img src="{{URL::asset('images/icon/vm_icon.png')}}" width="200" height="200">
		<label>VM</label>
	</div>
	
	<div class="card card-1" onclick="window.location.href = '{{ url('commentService') }}';">
		<img src="{{URL::asset('images/icon/comment_icon.png')}}" width="200" height="200">
		<label>Comment</label>
	</div>
	<div id="myModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<img src="{{URL::asset('images/banner.jpg')}}" style="width: 100%; height: auto;">
				</div>
			</div>
		</div>
    </div>
</div>
@endsection
