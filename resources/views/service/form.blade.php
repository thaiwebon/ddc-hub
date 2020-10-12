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
		<div class="row" style="padding-bottom: 100px;">
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
									{{ $data_department[$value_service->department_id] }}
								</td>
								<td>
									{{ $value_service->data_date }}
								</td>
								<td>
									{{ $data_menuservice[$value_service->menuservice_id] }}
								</td>
								<td>
									{{ $data_status[$value_service->status] }}
								</td>
								<td align="center">
									<a href="#myModal" data-toggle="modal" id="{{ $value_service->service_id }}" data-target="#edit-modalForm">
										<img src="{{ URL::asset('assets/images/icon-repair.jpg') }}" width="40">
									</a>
								</td>
								<td align="center">
									<img src="{{URL::asset('assets/images/trash.png')}}" width="35">
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
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
