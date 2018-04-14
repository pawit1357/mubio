<?php
$deptCri = new CDbCriteria();
$deptCri->condition = " t.id <> 1";
$departments = MDepartment::model()->findAll($deptCri);
?>
<form id="Form1" method="post" class="horizontal-form">

	<div class="portlet box blue">
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
			<!-- BEGIN FORM-->


			<div class="form-body">


				<div class="row">
					<div class="col-md-6">
						<div class="form-group" id="divReq-department_id">
							<label class="control-label">ชื่อหน่วยงาน</label> <select
								class="form-control select2" name="Pathogen[department_id]"
								id="department_id" onchange="onchangeDepartment(this.value)">
								<option value="0">-- โปรดเลือก --</option>
								<?php foreach($departments as $item) {?><option
									value="<?php echo $item->id?>"
									<?php echo ($item->id == $data->department_id? 'selected="selected"':'')?>><?php echo $item->name; ?></option><?php }?>
								<option value="-1">-- อื่นๆ โปรดระบุ --</option>
							</select> <span class="help-block" id="req-department_id"><?php echo Pathogen::$req1;?></span>
						</div>
						<div class="form-group" id="divReq-department_other">
							<input id="department_other" type="text"
								value="<?php echo $data->department_other;?>"
								class="form-control" name="Pathogen[department_other]"> <span
								class="help-block" id="req-department_other"><?php echo Pathogen::$req1;?></span>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group" id="divReq-pathogen_no">
							<label class="control-label">หมายเลขจดแจ้ง</label> <input
								id="pathogen_no" type="text"
								value="<?php echo $data->pathogen_no;?>" class="form-control"
								name="Pathogen[pathogen_no]"> <span class="help-block"
								id="req-pathogen_no"><?php echo Pathogen::$req1;?></span>
						</div>
					</div>
					<!--/span-->
				</div>
				<!--/row-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group" id="divReq-address">
							<label class="control-label">ที่อยู่</label> <input id="address"
								type="text" value="<?php echo $data->address;?>"
								class="form-control" name="Pathogen[address]"> <span
								class="help-block" id="req-address"><?php echo Pathogen::$req1;?></span>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group" id="divReq-phone_number">
							<label class="control-label">โทรศัพท์</label> <input
								id="phone_number" type="text"
								value="<?php echo $data->phone_number;?>" class="form-control"
								name="Pathogen[phone_number]"> <span class="help-block"
								id="req-phone_number"><?php echo Pathogen::$req1;?></span>
						</div>
					</div>
					<!--/span-->
				</div>
				<!--/row-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group" id="divReq-fax_number">
							<label class="control-label">โทรสาร</label> <input
								id="fax_number" type="text"
								value="<?php echo $data->fax_number;?>" class="form-control"
								name="Pathogen[fax_number]"> <span class="help-block"
								id="req-fax_number"><?php echo Pathogen::$req1;?></span>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group" id="divReq-email">
							<label class="control-label">e-mail address</label> <input
								id="email" type="text" value="<?php echo $data->email;?>"
								class="form-control" name="Pathogen[email]"> <span
								class="help-block" id="req-email"><?php echo Pathogen::$req1;?></span>
						</div>
					</div>
					<!--/span-->
				</div>
				<!--/row-->
				<!-- 				<div class="panel-group accordion" id="accordion1"> -->
				<!-- 					<div class="panel panel-default"> -->
				<!-- 						<div class="panel-heading"> -->
				<!-- 							<h4 class="panel-title"> -->
				<!-- 								<a class="accordion-toggle" data-toggle="collapse" -->
				<!-- 									data-parent="#accordion1" href="#collapse_1"> <i -->
				<!-- 									class="fa fa-cog"></i> ข้อมูลเครื่องกำเนิดรังสี -->
				<!-- 								</a> -->
				<!-- 							</h4> -->
				<!-- 						</div> -->
				<!-- 						<div id="collapse_1" class="panel-collapse in"> -->
				<!-- 						xxxx -->
				<!-- 						</div> -->
				<!-- 					</div> -->
				<!-- 				</div> -->
				<h3 class="form-section">ข้อมูล</h3>
				<div class="row">
					<div class="col-md-12 ">
						<div class="form-group">

							<div class="table-scrollable">
								<table class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
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
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input id="pathogen_name" name="Pathogen[pathogen_name]" type="text" value="<?php echo $data->pathogen_name;?>"></td>
											<td><input id="pathogen_code" name="Pathogen[pathogen_code]"  type="text" value="<?php echo $data->pathogen_code;?>"></td>
											<td><input id="pathogen_volume" name="Pathogen[pathogen_volume]"  type="text" value="<?php echo $data->pathogen_volume;?>"></td>
											<td><input id="supervisor" name="Pathogen[supervisor]"  type="text" value="<?php echo $data->supervisor;?>"></td>
											<td><input id="manufacture_plant" name="Pathogen[manufacture_plant]"  type="text" value="<?php echo $data->manufacture_plant;?>"></td>
											<td><input id="manufacture_fuse" name="Pathogen[manufacture_fuse]"  type="text" value="<?php echo $data->manufacture_fuse;?>"></td>
											<td><input id="manufacture_prepare" name="Pathogen[manufacture_prepare]"  type="text" value="<?php echo $data->manufacture_prepare;?>"></td>
											<td><input id="manufacture_transform" name="Pathogen[manufacture_transform]"  type="text" value="<?php echo $data->manufacture_transform;?>"></td>
											<td><input id="manufacture_packing" name="Pathogen[manufacture_packing]"  type="text" value="<?php echo $data->manufacture_packing;?>"></td>
											<td><input id="manufacture_total_packing" name="Pathogen[manufacture_total_packing]"  type="text" value="<?php echo $data->manufacture_total_packing;?>"></td>
											<td><input id="distribute_sell" name="Pathogen[distribute_sell]"  type="text" value="<?php echo $data->distribute_sell;?>"></td>
											<td><input id="distribute_pay" name="Pathogen[distribute_pay]"  type="text" value="<?php echo $data->distribute_pay;?>"></td>
											<td><input id="distribute_give" name="Pathogen[distribute_give]"  type="text" value="<?php echo $data->distribute_give;?>"></td>
											<td><input id="distribute_exchange" name="Pathogen[distribute_exchange]"  type="text" value="<?php echo $data->distribute_exchange;?>"></td>
											<td><input id="distribute_donate" name="Pathogen[distribute_donate]"  type="text" value="<?php echo $data->distribute_donate;?>"></td>
											<td><input id="distribute_lost" name="Pathogen[distribute_lost]"  type="text" value="<?php echo $data->distribute_lost;?>"></td>
											<td><input id="distribute_discard" name="Pathogen[distribute_discard]"  type="text" value="<?php echo $data->distribute_discard;?>"></td>
											<td><input id="distribute_destroy" name="Pathogen[distribute_destroy]"  type="text" value="<?php echo $data->distribute_destroy;?>"></td>
											<td><input id="import" name="Pathogen[import]"  type="text" value="<?php echo $data->import;?>"></td>
											<td><input id="export" name="Pathogen[export]"  type="text" value="<?php echo $data->export;?>"></td>
											<td><input id="import_to_other" name="Pathogenimport_to_other]"  type="text" value="<?php echo $data->import_to_other;?>"></td>
											<td></td>
										</tr>
									</tbody>

								</table>
							</div>


						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group" id="divReq-inform_name">
							<label class="control-label">ผู้จดแจ้ง</label> <input
								id="inform_name" type="text"
								value="<?php echo $data->inform_name;?>" class="form-control"
								name="Pathogen[inform_name]"> <span class="help-block"
								id="req-inform_name"><?php echo Pathogen::$req1;?></span>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group" id="divReq-inform_date">
							<label class="control-label">วันที่แจ้ง</label> <input
								type="text" readonly="readonly"
								value="<?php echo CommonUtil::getDateThai($data->inform_date);?>"
								id="inform_date" name="Pathogen[inform_date]"
								class="form-control" style="width: 150px !important;" /> <span
								class="help-block" id="req-inform_date"><?php echo Pathogen::$req1;?></span>
						</div>
					</div>
					<!--/span-->
				</div>
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
    	$('#department_other').hide();
    	
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

//      		if($("#inform_date").val().length==0){
//         		$("#divReq-inform_date").closest('.form-group').addClass('has-error');
//         		$("#req-inform_date").show();
//         		$("#inform_date").focus();
//         		return false;
//      		}else{
//             	$("#divReq-inform_date").closest('.form-group').removeClass('has-error');
//             	$("#req-inform_date").hide();
//      		}
     		
        	this.submit();
    	});
    });

    function onchangeDepartment($id){
        if($id == -1){
        	 $('#department_other').show();
        }else{
        	$('#department_other').val('');
        	$('#department_other').hide();
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