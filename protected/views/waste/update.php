<form id="Form1" method="post" enctype="multipart/form-data"
	class="form-horizontal">
	<!-- 	<div class="alert alert-danger display-hide"> -->
	<!-- 		<button class="close" data-close="alert"></button> -->
	<!-- 		You have some form errors. Please check below. -->
	<!-- 	</div> -->
	<!-- 	<div class="alert alert-success display-hide"> -->
	<!-- 		<button class="close" data-close="alert"></button> -->
	<!-- 		Your form validation is successful! -->
	<!-- 	</div> -->

	<div class="<?php echo ConfigUtil::getPortletTheme(); ?>">
		<div class="portlet-title">
			<div class="caption">
				<?php echo  MenuUtil::getMenuName($_SERVER['REQUEST_URI'])?>

			</div>
			<div class="actions">
			<?php echo CHtml::link('ย้อนกลับ',array('Waste/'),array('class'=>'btn btn-default btn-sm'));?>
			</div>
		</div>
		<div class="portlet-body form">
			<div class="form-body">
				<!-- BEGIN FORM-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group" id="divReq-waste_code">
							<label class="control-label col-md-3">รหัส:<span class="required">*</span></label>
							<div class="col-md-6">
								<input id="waste_code" type="text" value="<?php echo $data->waste_code;?>" class="form-control"
									name="Waste[waste_code]"> <span class="help-block"
									id="req-waste_code"><?php echo Pathogen::$req1;?></span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group" id="divReq-waste_type">
							<label class="control-label col-md-3">ประเภทของเสีย:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<input id="waste_type" type="text" value="<?php echo $data->waste_type;?>" class="form-control"
									name="Waste[waste_type]"> <span class="help-block"
									id="req-waste_type"><?php echo Pathogen::$req1;?></span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group" id="divReq-container_type">
							<label class="control-label col-md-3">ประเภทภาชนะ:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<input id="container_type" type="text" value="<?php echo $data->container_type;?>"
									class="form-control" name="Waste[container_type]"> <span
									class="help-block" id="req-container_type"><?php echo Pathogen::$req1;?></span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group" id="divReq-waste_volume">
							<label class="control-label col-md-3">ปริมาตร/น้ำหนัก:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<input id="waste_volume" type="text" value="<?php echo $data->waste_volume;?>"
									class="form-control grpOfInt" name="Waste[waste_volume]"> <span
									class="help-block" id="req-waste_volume"><?php echo Pathogen::$req1;?></span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group" id="divReq-waste_room">
							<label class="control-label col-md-3">สถานที่เก็บ:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<input id="waste_room" type="text" value="<?php echo $data->waste_room;?>" class="form-control"
									name="Waste[waste_room]"> <span class="help-block"
									id="req-waste_room"><?php echo Pathogen::$req1;?></span>
							</div>
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
								<?php echo CHtml::link(ConfigUtil::getBtnCancelButton(),array('Waste/'),array('class'=>'btn btn-default uppercase'));?>
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

    	$("#req-waste_code").hide();
    	$("#req-waste_type").hide();
    	$("#req-container_type").hide();
    	$("#req-waste_volume").hide();
    	$("#req-waste_room").hide();


        
	    $('.grpOfInt').keypress(function (event) {
            return isNumber(event);
        });

// 	 $("#name").attr('maxlength','200');
    	$( "#Form1" ).submit(function( event ) {
        	
         	if($("#waste_code").val().length==0){
        		$("#divReq-waste_code").closest('.form-group').addClass('has-error');
        		$("#req-waste_code").show();
        		$("#waste_code").focus();
        		return false;
            }else{
            	$("#divReq-waste_code").closest('.form-group').removeClass('has-error');
            	$("#req-waste_code").hide();
        	}
         	if($("#waste_type").val().length==0){
        		$("#divReq-waste_type").closest('.form-group').addClass('has-error');
        		$("#req-waste_type").show();
        		$("#waste_type").focus();
        		return false;
            }else{
            	$("#divReq-waste_type").closest('.form-group').removeClass('has-error');
            	$("#req-waste_type").hide();
        	}
         	if($("#container_type").val().length==0){
        		$("#divReq-container_type").closest('.form-group').addClass('has-error');
        		$("#req-container_type").show();
        		$("#container_type").focus();
        		return false;
            }else{
            	$("#divReq-container_type").closest('.form-group').removeClass('has-error');
            	$("#req-container_type").hide();
        	}
         	if($("#waste_volume").val().length==0){
        		$("#divReq-waste_volume").closest('.form-group').addClass('has-error');
        		$("#req-waste_volume").show();
        		$("#waste_volume").focus();
        		return false;
            }else{
            	$("#divReq-waste_volume").closest('.form-group').removeClass('has-error');
            	$("#req-waste_volume").hide();
        	}
         	if($("#waste_room").val().length==0){
        		$("#divReq-waste_room").closest('.form-group').addClass('has-error');
        		$("#req-waste_room").show();
        		$("#waste_room").focus();
        		return false;
            }else{
            	$("#divReq-waste_room").closest('.form-group').removeClass('has-error');
            	$("#req-waste_room").hide();
        	}
        	this.submit();
    	});
    });
    
</script>

</form>