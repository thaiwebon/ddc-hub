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
						<label>วันที่ประเมิน :: </label>
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
				
				@if($data_service->status==0)
					<div class="form-group">
						<label>เหตุผลการยกเลิกแจ้งซ่อม :: </label>
						<label class="data">{{ $data_service->comment }}</label>
					</div>
					<div class="form-group">
						<label>เวลายกเลิกแจ้งซ่อม :: </label>
						<label class="data">{{ formatDateThai($data_service->data_date_cancel) }}</label>
					</div>
				@endif
				

				<div class="form-group">
					<center>
						@if($active=="delete")
							<form method="post" action="{{ route('ServiceDelete') }}" style="display: inline;">
								@csrf
								<div class="form-group">
									<label>เหตุผลการยกเลิกแจ้งซ่อม<span id="error_comment" style="color: red;"></span></label>
									<textarea class="form-control" name="comment" id="comment" required=""></textarea>
								</div>
								<input type="hidden" name="service_id" value="{{ $data_service->service_id }}">
								<input type="hidden" name="status" value="0">
								<button class="btnCancel" id="btnSubmit" type="submit">
									ยกเลิกแจ้งซ่อม
								</button>
								
							</form>
						@endif
						<a href="{{ route('ServiceForm') }}">
							<button class="btnSubmit">
								กลับ
							</button>
						</a>
					</center>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('js-custom')
	<script type="text/javascript">
		$(document).ready(function() {
			$("#comment").focusout(function(){
				if ($(this).val()=='') {
					$(this).css("border-color", "#FF0000");
					$('#btnSubmit').attr('disabled',true);
					$("#error_comment").text("* กรุณากรอกเหตุผลการแจ้งยกเลิก");
					$("#comment").focus();
				} else {
					$(this).css("border-color", "#2eb82e");
					$('#btnSubmit').attr('disabled',false);
					$("#error_comment").text("");

					var SpacialCharacter = /[`~!@#$%^&*()_|+\-=?;:'"<>\{\}\[\]\\\/]/gi;
					if ($(this).val().match(SpacialCharacter)) {
						$(this).css("border-color", "#FF0000");
						$('#btnSubmit').attr('disabled',true);
						$("#error_comment").text("* ห้ามใส่อักขระพิเศษ");
						$("#comment").focus();
					} else {
						$(this).css("border-color", "#2eb82e");
						$('#btnSubmit').attr('disabled',false);
						$("#error_comment").text("");
					}
				}
			});
		});
	</script>
@endsection