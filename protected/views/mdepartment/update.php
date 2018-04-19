<?php
$depts = MDepartment::model ()->findAll ();
?>
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
			<?php echo CHtml::link('ย้อนกลับ',array('MDepartment/'),array('class'=>'btn btn-default btn-sm'));?>
			</div>
		</div>
		<div class="portlet-body form">
			<div class="form-body">
				<!-- BEGIN FORM-->
				<h4>ข้อมูลหน่วยงาน</h4>

				<div class="row">
					<div class="col-md-10">
						<div class="form-group" id="divReq-parent_id">
							<label class="control-label col-md-4">ภายใต้หน่วยงาน<span
								class="required">*</span></label>
							<div class="col-md-6">
								<select class="form-control select2"
									name="MDepartment[parent_id]" id="parent_id">
									<option value="-1">-- ไม่ได้อยู่ภายใต้หน่วยงานใด --</option>
                        			<?php foreach($depts as $item) {?>
                        			<option value="<?php echo $item->id?>" <?php echo $item->id == $data->parent_id ? 'selected="selected"' : ''?>><?php echo $item->name ?></option>
                        			<?php }?>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group" id="divReq-code">
							<label class="control-label col-md-4">Code:<span class="required">*</span></label>
							<div class="col-md-6">
								<input id="code" type="text" value="<?php echo $data->code;?>" class="form-control"
									name="MDepartment[code]">
									<span class="help-block" id="req-code"><?php echo Pathogen::$req1;?></span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group" id="divReq-name">
							<label class="control-label col-md-4">Name:<span class="required">*</span></label>
							<div class="col-md-6">
								<input id="name" type="text" value="<?php echo $data->name;?>" class="form-control"
									name="MDepartment[name]">
									<span class="help-block" id="req-name"><?php echo Pathogen::$req1;?></span>
							</div>
							<div></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group" id="divReq-status">
							<label class="control-label col-md-4">Status<span
								class="required">*</span></label>
							<div class="col-md-6">
								<select class="form-control select2"
									name="MDepartment[status]" id="status">
									<option value="1" <?php echo "1"== $data->status ? 'selected="selected"' : ''?>>Active</option>
                            		<option value="0" <?php echo "0" == $data->status ? 'selected="selected"' : ''?>>InActive</option>
								</select>
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
								<?php echo CHtml::link(ConfigUtil::getBtnCancelButton(),array('MDepartment/'),array('class'=>'btn btn-default uppercase'));?>
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
    	$("#req-name").hide();
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
         	if($("#name").val().length==0){
        		$("#divReq-name").closest('.form-group').addClass('has-error');
        		$("#req-name").show();
        		$("#name").focus();
        		return false;
            }else{
            	$("#divReq-name").closest('.form-group').removeClass('has-error');
            	$("#req-name").hide();
        	}


        	
        	this.submit();
    	});
    });

</script>

</form>