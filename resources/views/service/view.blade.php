@extends('layouts.template.template')
@section('title')
	DDC SERVICE
@endsection
@section('css-custom')
	<style type="text/css">
		.data{
			color: blue;
		}
	</style>
@endsection
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<center><h3><label>รายละเอียดแจ้งซ่อม</label></h3></center>
				<div class="form-group">
					<label>หมายเลขงาน :: </label>
					<label class="data">{{ $data_service->service_id }}</label><br/>
					<label>วันที่รับบริการ :: </label>
					<label class="data">{{ formatDateThai($data_service->data_date) }}</label><br/>
					<label>ชื่อ - นามสกุล :: </label>
					<label class="data">{{ $data_service->name }}</label><br/>
					<label>หน่วยงาน :: </label>
					<label class="data">{{ $data_service->department }}</label><br/>
					<label>อาคาร :: </label>
					<label class="data">{{ $data_service->building }}</label>
					<label>ชั้น :: </label>
					<label class="data">{{ $data_service->floor }}</label><br/>
					<label>รายการแจ้งซ่อม :: </label>
					<label class="data">{{ $data_menuservice[$data_service->menuservice_id] }}</label><br/>
					<label>รายละเอียด :: </label>
					<label class="data">{{ $data_service->description }}</label><br/>
					<label>รูปภาพประกอบ :: </label><br/>
					<img src="{{ url('storage/img/service/'.$data_service->picture) }}" width="50%" height="50%">

					<hr>

					<label>วันที่รับงาน :: </label>
					@if(!$data_service->data_date_start)
						<label class="data">-</label>
					@endif
					<label class="data">{{ $data_service->data_date_start }}</label><br/>
					<label>วันที่เสร็จงาน :: </label>
					@if(!$data_service->data_date_success)
						<label class="data">-</label>
					@endif
					<label class="data">{{ $data_service->data_date_success }}</label><br/>
					<label>ผู้ให้บริการ :: </label>
					@if($data_service->staff_id)
						<label class="data">{{ $data_staff[$data_service->staff_id] }}</label>
					@endif
					<label class="data">-</label><br/>
					<label>สถานะ :: </label>
					<label class="data">{{ $data_status[$data_service->status] }}</label><br/>
				</div>
			</div>
		</div>
	</div>
@endsection