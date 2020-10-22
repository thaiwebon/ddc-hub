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
				"order": [[ 0, "desc" ]],
				"scrollX": true
			});
		});
	</script>
@endsection