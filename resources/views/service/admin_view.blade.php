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
	</style>
@endsection
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<form method="post" action="{{ route('ServiceRecive') }}">
					@csrf
					<center><h3><label>รายละเอียดแจ้งซ่อม</label></h3></center>
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
						<label class="data">{{ $data_service->description }}</label>
					</div>
					<div class="form-group">
						<label>รูปภาพประกอบ :: </label><br/>
						@if(!$data_service->picture)
							<label class="data">-</label>
						@else
							<center>
								<img src="{{ url('storage/img/service/'.$data_service->picture) }}" width="50%" height="50%">
							</center>
						@endif
					</div>
					<div class="form-group">
						<label>ชื่อผู้ให้บริการ :: </label>
						@if($data_service->status==1)
							<select class="form-control" name="staff_id">
								@foreach($data_staff as $key_staff => $value_staff)
									<option value="{{ $key_staff }}">{{ $value_staff }}</option>
								@endforeach
							</select>
						@else
							<label class="data">{{ $data_staff[$data_service->staff_id] }}</label>
						@endif
					</div>
					<div class="form-group">
						<center>
							@if($data_service->status==1)
								<input type="hidden" name="service_id" value="{{ $data_service->service_id }}">
								<input type="hidden" name="status" value="2">
								<button class="btnSubmit" id="btnSubmit">
									รับงาน
								</button>
							@endif
						</center>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection