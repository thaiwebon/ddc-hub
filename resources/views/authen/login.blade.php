@extends('authen.template')
@section('content')
	<div class="containerform">
		<img src="{{URL::asset('images/icon/it_logo.png')}}" width="60%">
		<h1>login</h1>
		<div class="form-input">
			<input type="text" id="username" onkeyup="liveSearch()">
			<label for="username"><span>User Account Internet</span></label><br/>
		</div>
	</div>
@endsection
<script type="text/javascript">
	function liveSearch()
	{
		// alert("ok");
		// console.log("ok");
		var username = $("#username").val();
		// console.log(username);
		$.ajax({
			type: "GET",
			url:'/authen',
			data:{username:username},
			success:function(data){
				// console.log(data.data_value.length);
				switch(data.data_value.length) {
					case 1:
						// alert("ยินดีต้อนรับ :: "+data.data_value[0].username);
						window.location.href = "{{ route('hub')}}";
						break;
					case 0:
						break;
				}		
			}
		})
	}
</script>