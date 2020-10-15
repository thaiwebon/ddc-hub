@extends('layouts.template.template')
@section('title')
	DDC SERVICE
@endsection
@section('dataTable')
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
@endsection
@section('canvasJS')
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<center><h3><label>รายการแจ้งซ่อม</label></h3></center>
				<table id="tableService" class="display" style="width:100%">
					<thead>
						<tr>
							<th>หมายเลขงาน</th>
							<th>ชื่อ - นามสกุล</th>
							<th>หน่วยงาน</th>
							<th>วัน-เวลา แจ้งซ่อม</th>
							<th>รายการแจ้งซ่อม</th>
							<th>สถานะ</th>
							<th>รายละเอียด</th>
							<th>ยกเลิกแจ้งซ่อม</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data_service as $value_service)
							<tr>
								<td>
									{{ $value_service->service_id }}
								</td>
								<td>
									{{ $value_service->name }}
								</td>
								<td>
									{{ $value_service->department }}
								</td>
								<td>
									{{ formatDateThai($value_service->data_date) }}
								</td>
								<td>
									{{ $data_menuservice[$value_service->menuservice_id] }}
								</td>
								<td>
									{{ $data_status[$value_service->status] }}
								</td>
								<td align="center">
									<form method="post" action="{{ route('ServiceView') }}">
										@csrf
										<input type="hidden" name="service_id" value="{{ $value_service->service_id }}">
										<button style="border: none; padding: 0; background: none;" type="submit">
											<img src="{{ URL::asset('assets/images/icon-repair.jpg') }}" width="40">
										</button>
									</form>
								</td>
								<td align="center">
									@if ($value_service->status != 0)
										<form method="post" action="{{ route('ServiceDelete') }}">
											@csrf
											<input type="hidden" name="service_id" value="{{ $value_service->service_id }}">
											<input type="hidden" name="status" value="0">
											<button style="border: none; padding: 0; background: none;" type="submit">
												<img src="{{ URL::asset('assets/images/trash.png') }}" width="35">
											</button>
										</form>
									@endif
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>	
		</div>
		<hr>
		<div class="row">
			<div class="col-sm-12">
				<form method="post" action="{{ route('ServiceInsert') }}" enctype="multipart/form-data">
					@csrf
					<center><h3>แจ้งปัญหา / แจ้งซ่อม</h3></center>
					<div class="form-group">
						<label>ชื่อ - นามสกุล </label>
						<label style="width: 300px; padding-left: 10px;">
							<input type="text" class="form-control" id="name" name="name" maxlength="30" value="{{ Session::get('name') }}" readonly="">
						</label>
					</div>
					<div id="formService">
						<div class="form-group">
							<label>หน่วยงาน </label>
							<label style="padding-left: 10px;">
								<input type="txt" class="form-control" id="department" name="department" value="{{ Session::get('department') }}" readonly="">
							</label>
						</div>
						<div class="form-group">
							<label> เบอร์โทรศัพท์ </label>
							<label style="padding-left: 10px;">
								<input type="text" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" class="form-control" id="tel" name="tel" maxlength="10" required="">
							</label>
						</div>
						<div class="form-group">
							<label>อาคาร </label>
							<label style="padding-left: 10px;">
								<select class="form-control" id="building" style="padding-left: 10px;" name="building" required="">
									<option disabled selected>-- เลือกอาคาร --</option>
									@for($i=1; $i <= 11; $i++)
										<option value="{{ $i }}">{{ $i }}</option>
									@endfor
								</select>
							</label>
							<label style="padding-left: 20px;">ชั้น </label>
							<label style="padding-left: 10px;">
								<select class="form-control" id="floor" style="padding-left: 10px;" name="floor" required>
									<option disabled selected>-- เลือกชั้น --</option>
									@for($i=1; $i <= 7; $i++)
										<option value="{{ $i }}">{{ $i }}</option>
									@endfor
								</select>
							</label>
						</div>
						<hr>
						<div class="form-group" id="menurepairradiobutton">
							<label>รายการแจ้งซ่อม</label>
							@foreach($data_menuservice as $key_menuservice => $value_menuservice)
								<div style="padding-left: 50px;">
									<input type="radio" name="menuservice_id" value="{{ $key_menuservice }}" required>
									<label style="padding-left: 5px;">{{ $value_menuservice }}</label>
								</div>
							@endforeach
						</div>
						<div class="form-group">
							<label>รายละเอียด </label>
							<textarea class="form-control" style="height: 150px;" id="description" name="description" required=""></textarea>
						</div>
						<div class="form-group">
							<label>ภาพประกอบ </label>
							<input type="file" name="picture" class="form-control">
						</div>
						<input type="hidden" id="status" name="status" value="1">
						<button type="submit" class="btnSubmit" id="btnSubmit">ส่งซ่อม</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
@section('js-custom')
	<script type="text/javascript">
		$(document).ready(function() {
			$('#tableService').DataTable({
				// "order": [[ 0, "desc" ]],
				"scrollX": true
			});
		});
	</script>
@endsection
