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
				<table id="tableDashboard" class="display" style="width:100%">
					<thead>
						<!-- <tr>
							<th>หมายเลขงาน</th>
							<th>ชื่อ - นามสกุล</th>
							<th>หน่วยงาน</th>
							<th>วันที่แจ้งซ่อม</th>
							<th>เวลาที่แจ้งซ่อม</th>
							<th>รายการแจ้งซ่อม</th>
							<th>สถานะ</th>
							<th>รายละเอียด</th>
						</tr> -->
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#tableDashboard').DataTable({
				// "order": [[ 0, "desc" ]],
				"scrollX": true
			});
		});
	</script>
@endsection
