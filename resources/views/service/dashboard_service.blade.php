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
				<div class="form-group" style="text-align: center;">
					<label>เลือกหน่วยงาน</label>
					<select class="form-control" style="text-align: center;" id="select_department">
						<option value="">-- เลือกหน่วยงาน --</option>
						@foreach($data_group_department as $value_group_department)
							<option value="{{ $value_group_department->department }}">{{ $value_group_department->department }}</option>
						@endforeach
					</select>
				</div>
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
						</tr>
					</thead>
					<tbody>
						@foreach($data_service as $value_service)
							@if($value_service->status == 0)
								<tr style="color: #800002;">
							@elseif($value_service->status == 1)
								<tr style="color: #fc0107;">
							@elseif($value_service->status == 2)
								<tr style="color: #fd8008;">
							@elseif($value_service->status == 3)
								<tr style="color: #108040;">
							@endif
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
										<input type="hidden" name="active" value="view">
										<button style="border: none; padding: 0; background: none;" type="submit">
											<img src="{{ URL::asset('assets/images/icon-repair.jpg') }}" width="40">
										</button>
									</form>
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
				"order": [[ 3, "desc" ]],
				"scrollX": true
			});

			$('#select_department').on("change", function(){
				var department = $("#select_department").val();
				// console.log(department);
				$.ajax({
					type: "GET",
					url: "{{ route('ServiceFindData') }}",
					data: {"department":department},
					success:function(data_service){
						console.log(data_service);
						// $('#tableService').html(data_service);
					}
				})
			});
		});
	</script>
@endsection