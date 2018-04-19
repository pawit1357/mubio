<?php
$usersLogin = UsersLogin::model()->findAll();
$trackingStatus = TrackingStatus::model()->findAll();

?>
<form id="Form1" method="post" enctype="multipart/form-data"
	class="form-horizontal">
	<div class="<?php echo ConfigUtil::getPortletTheme(); ?>">
		<div class="portlet-title">
			<div class="caption">
				<?php echo  MenuUtil::getMenuName($_SERVER['REQUEST_URI'])?>

			</div>
			<div class="actions">
			<?php echo CHtml::link('ย้อนกลับ',array('Tracking/'),array('class'=>'btn btn-default btn-sm'));?>
			</div>
		</div>
		<div class="portlet-body form">
			<div class="form-body">

				<!-- BEGIN FORM-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group" id="divReq-code">
							<label class="control-label col-md-3">รหัส:<span class="required">*</span></label>
							<div class="col-md-6">
								<input id="code" type="text"
									value="<?php echo $data->code;?>"
									class="form-control" name="Tracking[code]" readonly> <span
									class="help-block" id="req-code"><?php echo Pathogen::$req1;?></span>
							</div>

						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group" id="divReq-user_id">
							<label class="control-label col-md-3">ผู้ขอรับรอง:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<select class="form-control select2" name="Tracking[user_id]"
									id="user_id">
									<option value="0">-- โปรดเลือก --</option>
                        			<?php foreach($usersLogin as $item) {?>
                        			<option value="<?php echo $item->id?>" <?php echo ($item->id == $data->user_id? 'selected="selected"':'')?>><?php echo  $item->first_name.'  '.$item->last_name;?></option>
                        			<?php }?>
								</select> <span class="help-block" id="req-user_id"><?php echo Pathogen::$req1;?></span>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group" id="divReq-description">
							<label class="control-label col-md-3">รายละเอียด:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<textarea rows="4" cols="58" id="description"
									name="Tracking[description]"><?php echo $data->description;?></textarea>
								<span class="help-block" id="req-description"><?php echo Pathogen::$req1;?></span>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group" id="divReq-status_id">
							<label class="control-label col-md-3">สถานะ:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<select class="form-control select2" name="Tracking[status_id]"
									id="status_id">
									<option value="0">-- โปรดเลือก --</option>
                        			<?php foreach($trackingStatus as $item) {?>
                        			<option value="<?php echo $item->id?>" <?php echo ($item->id == $data->status_id? 'selected="selected"':'')?>><?php echo  $item->name;?></option>
                        			<?php }?>
								</select> <span class="help-block" id="req-status_id"><?php echo Pathogen::$req1;?></span>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3">อัพโหลดไฟล์ : </label>

							<div class="col-md-6">
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="input-group input-large">
										<div
											class="form-control uneditable-input input-fixed input-large"
											data-trigger="fileinput">
											<i class="fa fa-file fileinput-exists"></i>&nbsp; <span
												class="fileinput-filename"></span>
										</div>
										<span class="input-group-addon btn default btn-file"> <span
											class="fileinput-new">Select file </span> <span
											class="fileinput-exists">Change </span> <input type="file"
											name="file_path[]" id="file_path" size="25">



										</span> <a href="javascript:;"
											class="input-group-addon btn red fileinput-exists"
											data-dismiss="fileinput">Remove </a>

									</div>
									<div></div>
									<?php if(isset($data->certificate_path)){?>
									<a title="Download" target="_blank"
									href="<?php echo  ConfigUtil::getAppName().''. $data->certificate_path?>"><i class="fa fa-file-pdf-o"></i></a>	
									<?php }?>
									<span class="text-success">เลือกไฟล์ Certificate (*.pdf)</span>
								</div>
								<!--<p class="text-success">อัพโหลดไฟล์ที่ได้ทำการแก้ไขเสร็จแล้ว</p> -->

							</div>
							<div id="divReq-certificate_path"></div>
						</div>
					</div>
				</div>


				<!-- END FORM-->

			</div>
			<div class="form-actions">
				<div class="row">
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn green uppercase"><?php echo ConfigUtil::getBtnSaveButton();?></button>
								<?php echo CHtml::link(ConfigUtil::getBtnCancelButton(),array('Tracking/'),array('class'=>'btn btn-default uppercase'));?>
							</div>
						</div>
					</div>
					<div class="col-md-9"></div>
				</div>
			</div>
		</div>
	</div>

	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/jquery.min.js"
		type="text/javascript"></script>


	<script>
	var host = 'http://localhost:81/mu_rad';
    jQuery(document).ready(function () {

    	$("#req-code").hide();
    	$("#req-user_id").hide();
    	$("#req-status_id").hide();
    	$("#req-description").hide();

    	
	    $('.grpOfInt').keypress(function (event) {
            return isNumber(event);
        });
        
//   $("#id").attr('maxlength','3');
// 	 $("#name").attr('maxlength','200');
	 
    	$( "#Form1" ).submit(function( event ) {
        	
         	if($("#code").val().length==0){
        		$("#divReq-code").closest('.form-group').addClass('has-error');
        		$("#req-code").show();
        		$("#code").focus();
        		return false;
            }else{
            	$("#divReq-code").closest('.form-group').removeClass('has-error');
            	$("#req-code").hide();
        	}
        	
         	if($("#user_id").val() == "0"){
        		$("#divReq-user_id").closest('.form-group').addClass('has-error');
        		$("#req-user_id").show();
        		$("#user_id").focus();
        		return false;
            }else{
            	$("#divReq-user_id").closest('.form-group').removeClass('has-error');
            	$("#req-user_id").hide();
        	}
        	
         	if($("#description").val().length==0){
        		$("#divReq-description").closest('.form-group').addClass('has-error');
        		$("#req-description").show();
        		$("#description").focus();
        		return false;
            }else{
            	$("#divReq-description").closest('.form-group').removeClass('has-error');
            	$("#req-description").hide();
        	}
        	
         	if($("#status_id").val() == "0"){
        		$("#divReq-status_id").closest('.form-group').addClass('has-error');
        		$("#req-status_id").show();
        		$("#status_id").focus();
        		return false;
            }else{
            	$("#divReq-status_id").closest('.form-group').removeClass('has-error');
            	$("#req-status_id").hide();
        	}
        	


        	this.submit();
    	});
    });
    
	   function selectedUser($vals){
// 		   alert($vals);
// 		   var $arrDatas = $vals.split(",");
// 		   $('#room_id').val($arrDatas[0]);
// 		   $('#room_name').val($arrDatas[1]);
// 		   $('#modalRoom').modal('hide');
	   }
    
</script>

</form>