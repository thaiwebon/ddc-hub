@extends('layouts.template.template')
@section('title')
	DDC SERVICE
@endsection
@section('css-custom')
	<style type="text/css">
		.data{
			color: blue;
			font-weight: bold;
		}
		.box {
		    width: 400px;
		    height: 90px;
		    border-radius: 20px;
		    background: #67676780;
		}

		input[type="radio"] {
		    width: 40px;
		    height: 40px;
		    outline: none;
		    position: relative;
		    -webkit-appearance: none !important;
		    top: 22px;
		    /*left: 18px;*/
		    margin-left: 10px;
		}

		input[type="radio"]:before {
		    content: '';
		    position: absolute;
		    top: 0;
		    width: 100%;
		    height: 100%;
		    left: 0;
		    border: 4px solid #fff;
		    border-radius: 50%;
		    box-sizing: border-box;
		    animation: rollback .30s linear;
		    transition: 0.5s;
		}

		input:checked[type="radio"].angry:before {
		    content: '😠';
		    font-size: 50px;
		    border: none;
		    border-radius: 0;
		    top: -14px;
		    left: -4px;
		    position: absolute;
		    animation: rotate .30s linear;
		}

		input:checked[type="radio"].okok:before {
		    content: '😩';
		    font-size: 50px;
		    border: none;
		    border-radius: 0;
		    top: -14px;
		    left: -4px;
		    position: absolute;
		    animation: rotate .30s linear;
		}

		input:checked[type="radio"].good:before {
		    content: '😊';
		    font-size: 50px;
		    border: none;
		    border-radius: 0;
		    left: -4px;
		    top: -14px;
		    position: absolute;
		    animation: rotate .30s linear;
		}

		input:checked[type="radio"].better:before {
		    content: '😄';
		    font-size: 50px;
		    border: none;
		    border-radius: 0;
		    top: -14px;
		    left: -4px;
		    position: absolute;
		    animation: rotate .30s linear;
		}

		input:checked[type="radio"].awesome:before {
		    content: '😍';
		    font-size: 50px;
		    border: none;
		    border-radius: 0;
		    top: -14px;
		    left: -4px;
		    position: absolute;
		    animation: rotate .30s linear;
		}

		.hidden {
		    display: none;
		}
	</style>
@endsection
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<center><h3><label>ให้คะแนนการแจ้งซ่อม</label></h3></center>
				<div class="form-group">
					<label>หมายเลขงาน :: </label>
					<label class="data">{{ $data_service->service_id }}</label>
				</div>
				<div class="form-group">
					<label>วันที่รับบริการ :: </label>
					<label class="data">{{ formatDateThai($data_service->data_date) }}</label>
				</div>
				<div class="form-group">
					<label>ชื่อ - นามสกุล :: </label>
					<label class="data">{{ $data_service->name }}</label>
				</div>
				<div class="form-group">
					<label>หน่วยงาน :: </label>
					<label class="data">{{ $data_service->department }}</label>
				</div>
				<div class="form-group">
					<label>อาคาร :: </label>
					<label class="data">{{ $data_service->building }}</label>
					<label>ชั้น :: </label>
					<label class="data">{{ $data_service->floor }}</label>
				</div>
				<div class="form-group">
					<label>รายการแจ้งซ่อม :: </label>
					<label class="data">{{ $data_menuservice[$data_service->menuservice_id] }}</label>
				</div>
				<div class="form-group">
					<label>รายละเอียด :: </label>
					<label class="data">{{ nl2br($data_service->description) }}</label>
				</div>
				@if($data_service->picture)
					<div class="form-group">
						<label>รูปภาพประกอบ :: </label><br/>
						<center>
							<img src="{{ url('storage/img/service/'.$data_service->picture) }}" width="50%" height="50%">
						</center>
					</div>
				@endif
				<hr>
				@if($data_service->data_date_start)
					<div class="form-group">
						<label>วันที่รับงาน :: </label>
						<label class="data">{{ $data_service->data_date_start }}</label><br/>
					</div>
				@endif
				@if($data_service->data_date_success)
					<div class="form-group">
						<label>วันที่เสร็จงาน :: </label>
						<label class="data">{{ $data_service->data_date_success }}</label>
					</div>
				@endif
				@if($data_service->staff_id)
					<div class="form-group">
						<label>ผู้ให้บริการ :: </label>
						<label class="data">{{ $data_staff[$data_service->staff_id] }}</label>
					</div>
				@endif
				<div class="form-group">
					<label>สถานะ :: </label>
					<label class="data">{{ $data_status[$data_service->status] }}</label>
				</div>
				<div class="panel panel-default" align="center">
					<form method="post" action="{{ route('ServiceScore') }}">
						@csrf
						<div class="center">
							<div class="box">
								<label>1</label>
								<input type="radio" class="angry" name="emoji" onclick="pointFunction(this.value)" value="1">
								<a class="hidden">Worst</a>

								<label>2</label>
								<input type="radio" class="okok" name="emoji" onclick="pointFunction(this.value)" value="2">
								<a class="hidden"> Bad</a>

								<label>3</label>
								<input type="radio" class="good" name="emoji" onclick="pointFunction(this.value)" value="3">
								<a class="hidden">Good</a>

								<label>4</label>
								<input type="radio" class="better" name="emoji" onclick="pointFunction(this.value)" value="4">
								<a class="hidden">Better</a>

								<label>5</label>
								<input type="radio" class="awesome" name="emoji" onclick="pointFunction(this.value)" value="5">
								<a class="hidden">Awesome</a>
							</div>
						</div><br/>
						<input type="hidden" name="service_id" value="{{ $data_service->service_id }}">
						<input type="hidden" id="point_value" name="score">
						<input type="hidden" id="status" name="status" value="3">
						<button type="submit" class="btnSubmit" id="btnSend">ส่ง</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	
@endsection
@section('js-custom')
	<script type="text/javascript">
		function pointFunction(point_value) {
			document.getElementById("point_value").value = point_value;
		}
	</script>
@endsection