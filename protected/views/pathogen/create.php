<?php
$deptCri = new CDbCriteria();
$deptCri->condition = " t.id <> 1";
$departments = MDepartment::model()->findAll($deptCri);
?>
<form id="Form1" method="post" enctype="multipart/form-data"
	class="form-horizontal">

	<div class="<?php echo ConfigUtil::getPortletTheme(); ?>">
		<div class="portlet-title">
			<div class="caption">
				<?php echo  MenuUtil::getMenuName($_SERVER['REQUEST_URI'])?>
			</div>
			<div class="tools">
				<a href="javascript:;" class="collapse"> </a> <a
					href="#portlet-config" data-toggle="modal" class="config"> </a> <a
					href="javascript:;" class="reload"> </a> <a href="javascript:;"
					class="remove"> </a>
			</div>
		</div>
		<div class="portlet-body form">
			<div class="form-body">

				<!-- XXXXXXXXXXXXXX -->

				<div class="panel-group accordion" id="accordion1">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle" data-toggle="collapse"
									data-parent="#accordion1" href="#collapse_1"> <i
									class="fa fa-info"></i> รายละเอียดผู้จดแจ้ง
								</a>
							</h4>
						</div>

						<div id="collapse_1" class="panel-collapse in">
							<br>
							<div class="row">
								<div class="col-md-10">
									<div class="form-group" id="divReq-department_id">
										<label class="control-label col-md-4">ชื่อหน่วยงาน:<span
											class="required">*</span></label>
										<div class="col-md-4">
											<select class="form-control select2"
												name="Pathogen[department_id]" id="department_id"
												onchange="onchangeDepartment(this.value)">
												<option value="0">-- โปรดเลือก --</option>
                								<?php foreach($departments as $item) {?><option
													value="<?php echo $item->id?>"><?php echo $item->name; ?></option><?php }?>
                								<option value="-1">-- อื่นๆ โปรดระบุ --</option>
											</select> <span class="help-block" id="req-department_id"><?php echo Pathogen::$req1;?></span>
										</div>
									</div>
								</div>
							</div>
							<div class="row" id="row-department_other">
								<div class="col-md-10">
									<div class="form-group" id="divReq-department_other">
										<label class="control-label col-md-4">อื่น ๆ ระบุ:<span
											class="required">*</span></label>
										<div class="col-md-4">
											<input id="department_other" type="text" value=""
												class="form-control" name="Pathogen[department_other]"> <span
												class="help-block" id="req-department_other"><?php echo Pathogen::$req1;?></span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10">
									<div class="form-group" id="divReq-pathogen_no">
										<label class="control-label col-md-4">หมายเลขจดแจ้ง:<span
											class="required">*</span></label>
										<div class="col-md-4">
											<input id="pathogen_no" type="text" value=""
												class="form-control" name="Pathogen[pathogen_no]"> <span
												class="help-block" id="req-pathogen_no"><?php echo Pathogen::$req1;?></span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10">
									<div class="form-group" id="divReq-address">
										<label class="control-label col-md-4">ที่อยู่:<span
											class="required">*</span></label>
										<div class="col-md-4">
											<input id="address" type="text" value="" class="form-control"
												name="Pathogen[address]"> <span class="help-block"
												id="req-address"><?php echo Pathogen::$req1;?></span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10">
									<div class="form-group" id="divReq-phone_number">
										<label class="control-label col-md-4">โทรศัพท์:<span
											class="required">*</span></label>
										<div class="col-md-4">
											<input id="phone_number" type="text" value=""
												class="form-control" name="Pathogen[phone_number]"> <span
												class="help-block" id="req-phone_number"><?php echo Pathogen::$req1;?></span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10">
									<div class="form-group" id="divReq-fax_number">
										<label class="control-label col-md-4">โทรสาร:<span
											class="required">*</span></label>
										<div class="col-md-4">
											<input id="fax_number" type="text" value=""
												class="form-control" name="Pathogen[fax_number]"> <span
												class="help-block" id="req-fax_number"><?php echo Pathogen::$req1;?></span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10">
									<div class="form-group" id="divReq-email">
										<label class="control-label col-md-4">e-mail address:<span
											class="required">*</span></label>
										<div class="col-md-4">
											<input id="email" type="text" value="" class="form-control"
												name="Pathogen[email]"> <span class="help-block"
												id="req-email"><?php echo Pathogen::$req1;?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- GRIDVIEW DETAIL -->
				<div class="panel-group accordion" id="accordion2">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle" data-toggle="collapse"
									data-parent="#accordion2" href="#collapse_2"> <i
									class="fa fa-list-alt"></i> รายละเอียดรายการที่จดแจ้ง
								</a>
							</h4>
						</div>

						<div id="collapse_2" class="panel-collapse in">
							<div class="table-scrollable">
								<table class="table table-striped table-bordered table-hover"
									id="tData">
									<thead>
										<tr>
											<th style="text-align: center; vertical-align: middle;"
												rowspan="2">ลำดับที่</th>
											<th style="text-align: center; vertical-align: middle;"
												rowspan="2">ชื่อเชื้อโรค/พิษจากสัตว์<br>(๑)
											</th>
											<th style="text-align: center; vertical-align: middle;"
												rowspan="2">รหัสเชื้อโรค/พิษจากสัตว์<br>(๒)
											</th>
											<th style="text-align: center; vertical-align: middle;"
												rowspan="2">ชื่อผู้ควบคุม<br>(๓)
											</th>
											<th style="text-align: center; vertical-align: middle;"
												rowspan="2">รูปแบบการ<br>จัดเก็บ
											</th>
											<th style="text-align: center; vertical-align: middle;"
												rowspan="2">รวม<br>จำนวน<br>ทั้งหมด<br>ของเดือน<br>นี้
											</th>
											<th style="text-align: center; vertical-align: middle;"
												colspan="6">จำนวน/ปริมาณที่ผลิต (๕)</th>
											<th style="text-align: center; vertical-align: middle;"
												rowspan="2">ครอบครอง</th>
											<th style="text-align: center; vertical-align: middle;"
												colspan="6">จำนวน/ปริมาณที่จำหน่าย (๖)</th>
											<th style="text-align: center; vertical-align: middle;"
												colspan="3">จำนวน/ปริมาณ (๗)</th>
										</tr>
										<tr>
											<th style="text-align: center; vertical-align: middle;">เพาะ</th>
											<th style="text-align: center; vertical-align: middle;">ผสม</th>
											<th style="text-align: center; vertical-align: middle;">ปรุง</th>
											<th style="text-align: center; vertical-align: middle;">แปรสภาพ</th>
											<th style="text-align: center; vertical-align: middle;">แบ่งบรรจุ</th>
											<th style="text-align: center; vertical-align: middle;">รวมบรรจุ</th>
											<th style="text-align: center; vertical-align: middle;">ขาย</th>
											<th style="text-align: center; vertical-align: middle;">จ่ายแจก
												ให้</th>
											<th style="text-align: center; vertical-align: middle;">แลกเปลี่ยน</th>
											<th style="text-align: center; vertical-align: middle;">สูญหาย</th>
											<th style="text-align: center; vertical-align: middle;">เสียหาย</th>
											<th style="text-align: center; vertical-align: middle;">ทิ้งทำลาย</th>
											<th style="text-align: center; vertical-align: middle;">นำเข้า<br>จาก<br>ต่าง<br>ประเทศ
											</th>
											<th style="text-align: center; vertical-align: middle;">ส่งออก<br>ไป<br>ต่าง<br>ประเทศ
											</th>
											<th style="text-align: center; vertical-align: middle;">นำผ่าน<br>ประเทศ<br>ไทยไปยัง<br>ประเทศ<br>อื่น
											</th>
											<th style="text-align: center; vertical-align: middle;"></th>
										</tr>
									</thead>
									<tbody>
									</tbody>
									<tfoot>
										<tr>
											<td style="text-align: center;"><button type="button"
													class="btn green uppercase" id="btnAdd">เพิ่ม</button></td>
											<td style="text-align: left;"><input
												style="width: 100px !important;" id="txt_pathogen_name"
												type="text" value="" class="form-control"></td>
											<td><input style="width: 100px !important;"
												id="txt_pathogen_code" type="text" value=""
												class="form-control"></td>
											<td><input style="width: 100px !important;"
												id="txt_pathogen_volume" type="text" value=""
												class="form-control"></td>
											<td><input style="width: 100px !important;"
												id="txt_supervisor" type="text" value=""
												class="form-control"></td>
											<td><input style="width: 60px !important;"
												id="txt_manufacture_plant" type="text" value=""
												class="form-control"></td>
											<td><input style="width: 60px !important;"
												id="txt_manufacture_fuse" type="text" value=""
												class="form-control"></td>
											<td><input style="width: 60px !important;"
												id="txt_manufacture_prepare" type="text" value=""
												class="form-control"></td>
											<td><input style="width: 60px !important;"
												id="txt_manufacture_transform" type="text" value=""
												class="form-control"></td>
											<td><input style="width: 60px !important;"
												id="txt_manufacture_packing" type="text" value=""
												class="form-control"></td>
											<td><input style="width: 60px !important;"
												id="txt_manufacture_total_packing" type="text" value=""
												class="form-control"></td>
											<td><input style="width: 60px !important;"
												id="txt_distribute_sell" type="text" value=""
												class="form-control"></td>
											<td><input style="width: 60px !important;"
												id="txt_distribute_pay" type="text" value=""
												class="form-control"></td>
											<td><input style="width: 60px !important;"
												id="txt_distribute_give" type="text" value=""
												class="form-control"></td>
											<td><input style="width: 60px !important;"
												id="txt_distribute_exchange" type="text" value=""
												class="form-control"></td>
											<td><input style="width: 60px !important;"
												id="txt_distribute_donate" type="text" value=""
												class="form-control"></td>
											<td><input style="width: 60px !important;"
												id="txt_distribute_lost" type="text" value=""
												class="form-control"></td>
											<td><input style="width: 60px !important;"
												id="txt_distribute_discard" type="text" value=""
												class="form-control"></td>
											<td><input style="width: 60px !important;"
												id="txt_distribute_destroy" type="text" value=""
												class="form-control"></td>
											<td><input style="width: 60px !important;" id="txt_import"
												type="text" value="" class="form-control"></td>
											<td><input style="width: 60px !important;" id="txt_export"
												type="text" value="" class="form-control"></td>
											<td><input style="width: 60px !important;"
												id="txt_import_to_other" type="text" value=""
												class="form-control"></td>
											<td></td>
										</tr>
									</tfoot>
								</table>
							</div>

						</div>
					</div>
				</div>

				<!-- END GRIDVIEW DETAIL -->
				<!-- GRIDVIEW DETAIL -->
				<div class="panel-group accordion" id="accordion3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle" data-toggle="collapse"
									data-parent="#accordion3" href="#collapse_3"> <i
									class="fa fa-user"></i> รายละเอียดผู้จดแจ้ง
								</a>
							</h4>
						</div>

						<div id="collapse_3" class="panel-collapse in">
							<br>
							<div class="row">
								<div class="col-md-10">
									<div class="form-group" id="divReq-inform_name">
										<label class="control-label col-md-4">ผู้จดแจ้ง:<span
											class="required">*</span></label>
										<div class="col-md-4">
											<input id="inform_name" type="text" value=""
												class="form-control" name="Pathogen[inform_name]"> <span
												class="help-block" id="req-inform_name"><?php echo Pathogen::$req1;?></span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10">
									<div class="form-group" id="divReq-inform_date">
										<label class="control-label col-md-4">วันที่แจ้ง:<span
											class="required">*</span></label>
										<div class="col-md-4">
											<input type="text" readonly="readonly" value=""
												id="inform_date" name="Pathogen[inform_date]"
												class="form-control" style="width: 150px !important;" /> <span
												class="help-block" id="req-inform_date"><?php echo Pathogen::$req1;?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END GRIDVIEW DETAIL -->


				<div class="note note-info">
					<p>คำอธิบาย</p>

					(๑) ชื่อเชื้อโรค/พิษจากสัตว์ ให้ระบุ
					ชื่อหรือชื่อทางวิทยาศาสตร์ของเชื้อโรคหรือพิษจากสัตว์ที่ใช้ในภาษาอังกฤษ<br>
					(๒) รหัสเชื้อโรค/พิษจากสัตว์ ให้ระบุ
					รหัสอ้างอิงที่มาของเชื้อโรคหรือพิษจากสัตว์<br> (๓) ผู้ควบคุม
					ให้ระบุชื่อของบุคคลที่หน่วยงานมอบหมายให้เป็นผู้ควบคุมดูแลเชื้อโรคหรือพิษจากสัตว์
					โดยต้องมีคุณสมบัติตามที่กฎหมายกำหนด<br> (๔) วันที่ เดือน ปี
					ที่จัดทำบัญชีจดแจ้ง<br> (๕) (๖) และ (๗) จำนวน/ปริมาณ
					ให้ระบุจำนวนหรือปริมาณพร้อมหน่วยนับ
					กรณีจำหน่ายให้ระบุปลายทางของการจำหน่าย <br>
				</div>
			</div>
			<div class="form-actions right">
				<button type="submit" class="btn green uppercase"><?php echo ConfigUtil::getBtnSaveButton();?></button>
				<?php echo CHtml::link(ConfigUtil::getBtnCancelButton(),array('Pathogen/'),array('class'=>'btn btn-default uppercase'));?>
			</div>
			<!-- END FORM-->
		</div>
	</div>

	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/jquery.min.js"
		type="text/javascript"></script>
	<script>
	var host = 'http://localhost:81/mu_rad';
    jQuery(document).ready(function () {

    	
    	$('#row-department_other').hide();
    	$('#divReq-department_other').hide();
    	$('#req-department_other').hide();
    	
    	$("#req-department_id").hide();
    	$("#req-department_other").hide();
    	$("#req-pathogen_no").hide();
    	$("#req-address").hide();
    	$("#req-phone_number").hide();
    	$("#req-fax_number").hide();
    	$("#req-email").hide();
    	$("#req-inform_name").hide();
    	$("#req-inform_date").hide();
    	
	    $('.grpOfInt').keypress(function (event) {
            return isNumber(event);
        });

		 $.datepicker.regional['th'] ={
			        changeMonth: true,
			        changeYear: true,
			        yearOffSet: 543,
			        showOn: "button",
			        buttonImage: 'http://localhost:81/mubio/images/calendar.gif',
			        buttonImageOnly: true,
			        dateFormat: 'dd/mm/yy',
			        dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
			        dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
			        monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
			        monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'],
			        constrainInput: true,
			       
			        prevText: 'ก่อนหน้า',
			        nextText: 'ถัดไป',
			        yearRange: '-10:+10',
			        buttonText: 'เลือก',
			      
		};
		$.datepicker.setDefaults($.datepicker.regional['th']);


		
// 		$( "#inform_date" ).datepicker( $.datepicker.regional["th"] ); // Set ภาษาที่เรานิยามไว้ด้านบน
		 
		$("#inform_date").val($.datepicker.formatDate("dd/mm/yy", new Date()));
			
	    $('#btnAdd').click(function (event) {
	    	 var txt_pathogen_name = $('#txt_pathogen_name').val();
	    	 var txt_pathogen_code = $('#txt_pathogen_code').val();
	    	 var txt_pathogen_volume = $('#txt_pathogen_volume').val();
	    	 var txt_supervisor = $('#txt_supervisor').val();
	    	 var txt_manufacture_plant = $('#txt_manufacture_plant').val();
	    	 var txt_manufacture_fuse = $('#txt_manufacture_fuse').val();
	    	 var txt_manufacture_prepare = $('#txt_manufacture_prepare').val();
	    	 var txt_manufacture_transform = $('#txt_manufacture_transform').val();
	    	 var txt_manufacture_packing = $('#txt_manufacture_packing').val();
	    	 var txt_manufacture_total_packing = $('#txt_manufacture_total_packing').val();
	    	 var txt_distribute_sell = $('#txt_distribute_sell').val();
	    	 var txt_distribute_pay = $('#txt_distribute_pay').val();
	    	 var txt_distribute_give = $('#txt_distribute_give').val();
	    	 var txt_distribute_exchange = $('#txt_distribute_exchange').val();
	    	 var txt_distribute_donate = $('#txt_distribute_donate').val();
	    	 var txt_distribute_lost = $('#txt_distribute_lost').val();
	    	 var txt_distribute_discard = $('#txt_distribute_discard').val();
	    	 var txt_distribute_destroy = $('#txt_distribute_destroy').val();
	    	 var txt_import = $('#txt_import').val();
	    	 var txt_export = $('#txt_export').val();
	    	 var txt_import_to_other = $('#txt_import_to_other').val();
	    	 var rowCount = $('#tData tr').length;
	    	 var rid = uniqId();
	    	$('#tData > tbody:last').append('<tr id="r'+(rid)+'"><td style="text-align: center;">'+(rowCount-2)+'.</td>'+
	    			'<td style="text-align: center;"><input style="width : 100px !important;" id="pathogen_name" type="text" value="'+txt_pathogen_name+'"class="form-control" name="pathogen_name[]"></td>'+
	    			'<td><input style="width : 100px !important;" id="pathogen_code" type="text" value="'+txt_pathogen_code+'"class="form-control" name="pathogen_code[]"></td>'+
	    			'<td><input style="width : 100px !important;" id="pathogen_volume" type="text" value="'+txt_pathogen_volume+'"class="form-control" name="pathogen_volume[]"></td>'+
	    			'<td><input style="width : 100px !important;" id="supervisor" type="text" value="'+txt_supervisor+'"class="form-control" name="supervisor[]"></td>'+
	    			'<td><input style="width : 60px !important;" id="manufacture_plant" type="text" value="'+txt_manufacture_plant+'"class="form-control" name="manufacture_plant[]"></td>'+
	    			'<td><input style="width : 60px !important;" id="manufacture_fuse" type="text" value="'+txt_manufacture_fuse+'"class="form-control" name="manufacture_fuse[]"></td>'+
	    			'<td><input style="width : 60px !important;" id="manufacture_prepare" type="text" value="'+txt_manufacture_prepare+'"class="form-control" name="manufacture_prepare[]"></td>'+
	    			'<td><input style="width : 60px !important;" id="manufacture_transform" type="text" value="'+txt_manufacture_transform+'"class="form-control" name="manufacture_transform[]"></td>'+
	    			'<td><input style="width : 60px !important;" id="manufacture_packing" type="text" value="'+txt_manufacture_packing+'"class="form-control" name="manufacture_packing[]"></td>'+
	    			'<td><input style="width : 60px !important;" id="manufacture_total_packing" type="text" value="'+txt_manufacture_total_packing+'"class="form-control" name="manufacture_total_packing[]"></td>'+
	    			'<td><input style="width : 60px !important;" id="distribute_sell" type="text" value="'+txt_distribute_sell+'"class="form-control" name="distribute_sell[]"></td>'+
	    			'<td><input style="width : 60px !important;" id="distribute_pay" type="text" value="'+txt_distribute_pay+'"class="form-control" name="distribute_pay[]"></td>'+
	    			'<td><input style="width : 60px !important;" id="distribute_give" type="text" value="'+txt_distribute_give+'"class="form-control" name="distribute_give[]"></td>'+
	    			'<td><input style="width : 60px !important;" id="distribute_exchange" type="text" value="'+txt_distribute_exchange+'"class="form-control" name="distribute_exchange[]"></td>'+
	    			'<td><input style="width : 60px !important;" id="distribute_donate" type="text" value="'+txt_distribute_donate+'"class="form-control" name="distribute_donate[]"></td>'+
	    			'<td><input style="width : 60px !important;" id="distribute_lost" type="text" value="'+txt_distribute_lost+'"class="form-control" name="distribute_lost[]"></td>'+
	    			'<td><input style="width : 60px !important;" id="distribute_discard" type="text" value="'+txt_distribute_discard+'"class="form-control" name="distribute_discard[]"></td>'+
	    			'<td><input style="width : 60px !important;" id="distribute_destroy" type="text" value="'+txt_distribute_destroy+'"class="form-control" name="distribute_destroy[]"></td>'+
	    			'<td><input style="width : 60px !important;" id="import" type="text" value="'+txt_import+'"class="form-control" name="import[]"></td>'+
	    			'<td><input style="width : 60px !important;" id="export" type="text" value="'+txt_export+'"class="form-control" name="export[]"></td>'+
	    			'<td><input style="width : 60px !important;" id="import_to_other" type="text" value="'+txt_import_to_other+'"class="form-control" name="import_to_other[]"></td>'+
	    			'<td style="text-align: center;"><button type="button" class="btn red uppercase" id="btnAdd" onclick="return deleteElement(r'+(rid)+');">ลบ</button></td>'+
	    	    	'</tr>'); 

	    	 $('#txt_pathogen_name').val('');
	    	 $('#txt_pathogen_code').val('');
	    	 $('#txt_pathogen_volume').val('');
	    	 $('#txt_supervisor').val('');
	    	 $('#txt_manufacture_plant').val('');
	    	 $('#txt_manufacture_fuse').val('');
	    	 $('#txt_manufacture_prepare').val('');
	    	 $('#txt_manufacture_transform').val('');
	    	 $('#txt_manufacture_packing').val('');
	    	 $('#txt_manufacture_total_packing').val('');
	    	 $('#txt_distribute_sell').val('');
	    	 $('#txt_distribute_pay').val('');
	    	 $('#txt_distribute_give').val('');
	    	 $('#txt_distribute_exchange').val('');
	    	 $('#txt_distribute_donate').val('');
	    	 $('#txt_distribute_lost').val('');
	    	 $('#txt_distribute_discard').val('');
	    	 $('#txt_distribute_destroy').val('');
	    	 $('#txt_import').val('');
	    	 $('#txt_export').val('');
	    	 $('#txt_import_to_other').val('');
	    	
        });
        
//   $("#id").attr('maxlength','3');
// 	 $("#name").attr('maxlength','200');

    	$( "#Form1" ).submit(function( event ) {

         	if($("#department_id").val() == "0"){
        		$("#divReq-department_id").closest('.form-group').addClass('has-error');
        		$("#req-department_id").show();
        		$("#department_id").focus();
        		return false;
            }else{
            	$("#divReq-department_id").closest('.form-group').removeClass('has-error');
            	$("#req-department_id").hide();
        	}
         	if($("#department_id").val() == "-1"){
         		if($("#department_other").val().length==0){
            		$("#divReq-department_other").closest('.form-group').addClass('has-error');
            		$("#req-department_other").show();
            		$("#department_other").focus();
            		return false;
         		}else{
                	$("#divReq-department_other").closest('.form-group').removeClass('has-error');
                	$("#req-department_other").hide();
         		}
         	}
         	
     		if($("#pathogen_no").val().length==0){
        		$("#divReq-pathogen_no").closest('.form-group').addClass('has-error');
        		$("#req-pathogen_no").show();
        		$("#pathogen_no").focus();
        		return false;
     		}else{
            	$("#divReq-pathogen_no").closest('.form-group').removeClass('has-error');
            	$("#req-pathogen_no").hide();
     		}

     		if($("#address").val().length==0){
        		$("#divReq-address").closest('.form-group').addClass('has-error');
        		$("#req-address").show();
        		$("#address").focus();
        		return false;
     		}else{
            	$("#divReq-address").closest('.form-group').removeClass('has-error');
            	$("#req-address").hide();
     		}
     		
     		if($("#phone_number").val().length==0){
        		$("#divReq-phone_number").closest('.form-group').addClass('has-error');
        		$("#req-phone_number").show();
        		$("#phone_number").focus();
        		return false;
     		}else{
            	$("#divReq-phone_number").closest('.form-group').removeClass('has-error');
            	$("#req-phone_number").hide();
     		}
     		
     		if($("#fax_number").val().length==0){
        		$("#divReq-fax_number").closest('.form-group').addClass('has-error');
        		$("#req-fax_number").show();
        		$("#fax_number").focus();
        		return false;
     		}else{
            	$("#divReq-fax_number").closest('.form-group').removeClass('has-error');
            	$("#req-fax_number").hide();
     		}

     		if($("#email").val().length==0){
        		$("#divReq-email").closest('.form-group').addClass('has-error');
        		$("#req-email").show();
        		$("#email").focus();
        		return false;
     		}else{
            	$("#divReq-email").closest('.form-group').removeClass('has-error');
            	$("#req-email").hide();
     		}

     		if($("#inform_name").val().length==0){
        		$("#divReq-inform_name").closest('.form-group').addClass('has-error');
        		$("#req-inform_name").show();
        		$("#inform_name").focus();
        		return false;
     		}else{
            	$("#divReq-inform_name").closest('.form-group').removeClass('has-error');
            	$("#req-inform_name").hide();
     		}

    		$row_count = $('#tData tbody tr').length;
    		if($row_count == 0){
        		alert('ยังไม่ได้เพิ่มรายงาน\n(กดปุ่ม+ เพื่อเพิ่มรายการก่อนบันทึก)');
				return false;
        	}
     		
        	this.submit();
    	});
    });

    function onchangeDepartment($id){
        if($id == -1){
        	$('#row-department_other').show();
        	 $('#divReq-department_other').show();
        }else{
        	$('#divReq-department_other').val('');
        	$('#divReq-department_other').hide();
        	$('#row-department_other').hide();
        }
    }

    function deleteElement(id){
        $("#"+id.id).remove();
    }

    function uniqId() {
   		return Math.round(new Date().getTime() + (Math.random() * 100));
    }
</script>

</form>