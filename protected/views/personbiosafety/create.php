<?php
// $criteria = new CDbCriteria ();
// $criteria->condition = " branch_group_id like '%" . UserLoginUtils::getBranchId() . "%'";
// $rptDeps = MReportDepartment::model ()->findAll ( $criteria );
$titles = MTitle::model()->findall();
$positions = MPosition::model()->findAll();
?>

<form id="Form1" method="post" enctype="multipart/form-data"
	class="form-horizontal">

	<div class="portlet box blue">
		<div class="portlet-title">
			<div class="caption">
				<?php echo  MenuUtil::getMenuName($_SERVER['REQUEST_URI'])?>

			</div>
			<div class="actions">
			<?php echo CHtml::link('ย้อนกลับ',array('PersonBiosafety/'),array('class'=>'btn btn-default btn-sm'));?>
			</div>
		</div>
		<div class="portlet-body form">
			<div class="form-body">
				<!-- BEGIN FORM-->

				<div class="panel-group accordion" id="accordion1">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle" data-toggle="collapse"
									data-parent="#accordion1" href="#collapse_1"> <i
									class="fa fa-user"></i> ข้อมูลบุคลากร
								</a>
							</h4>
						</div>

						<div id="collapse_1" class="panel-collapse in">
							<br>
							<div class="row">
								<div class="col-md-10">
									<div class="form-group" id="divReq-title_id">
										<label class="control-label col-md-4">คำนำหน้า:<span
											class="required">*</span></label>
										<div class="col-md-4">
											<select class="form-control select2" name="PersonBiosafety[title_id]"
												id="title_id">
												<option value="0">-- โปรดเลือก --</option>
                                    			<?php foreach($titles as $item) {?>
                                    			<option
													value="<?php echo $item->id?>"><?php echo  $item->name?></option>
                                    			<?php }?>
        									</select> <span class="help-block" id="req-title_id"><?php echo Pathogen::$req1;?></span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10">
									<div class="form-group" id="divReq-position_id">
										<label class="control-label col-md-4">ตำแหน่ง:<span
											class="required">*</span></label>
										<div class="col-md-4">
											<select class="form-control select2"
												name="PersonBiosafety[position_id]" id="position_id">
												<option value="0">-- โปรดเลือก --</option>
                                    			<?php foreach($positions as $item) {?>
                                    			<option
													value="<?php echo $item->id?>"><?php echo  $item->name?></option>
                                    			<?php }?>
        									</select> <span class="help-block" id="req-position_id"><?php echo Pathogen::$req1;?></span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10">
									<div class="form-group" id="divReq-firstname">
										<label class="control-label col-md-4">ชื่อ:<span
											class="required">*</span></label>
										<div class="col-md-4">
											<input id="firstname" type="text" value=""
												class="form-control" name="PersonBiosafety[firstname]"> <span
												class="help-block" id="req-firstname"><?php echo Pathogen::$req1;?></span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10">
									<div class="form-group" id="divReq-surname">
										<label class="control-label col-md-4">นามสกุล:<span
											class="required">*</span></label>
										<div class="col-md-4">
											<input id="surname" type="text" value="" class="form-control"
												name="PersonBiosafety[surname]"> <span class="help-block"
												id="req-surname"><?php echo Pathogen::$req1;?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- END FORM-->

			</div>
			<div class="form-actions">
				<div class="row">
					<div class="col-md-10">
						<div class="row">
							<div class="col-md-offset-3 col-md-10">
								<button type="submit" class="btn green uppercase"><?php echo ConfigUtil::getBtnSaveButton();?></button>
								<?php echo CHtml::link(ConfigUtil::getBtnCancelButton(),array('PersonBiosafety/'),array('class'=>'btn btn-default uppercase'));?>
							</div>
						</div>
					</div>
					<div class="col-md-10"></div>
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
    	
    	$("#req-title_id").hide();
    	$("#req-position_id").hide();
    	$("#req-firstname").hide();
    	$("#req-surname").hide();
    	
	    $('.grpOfInt').keypress(function (event) {
            return isNumber(event);
        });
        
    	$( "#Form1" ).submit(function( event ) {
        	
         	if($("#title_id").val()=="0"){
        		$("#divReq-title_id").closest('.form-group').addClass('has-error');
        		$("#req-title_id").show();
        		$("#title_id").focus();
        		return false;
            }else{
            	$("#divReq-title_id").closest('.form-group').removeClass('has-error');
            	$("#req-title_id").hide();
        	}

         	if($("#position_id").val()=="0"){
        		$("#divReq-position_id").closest('.form-group').addClass('has-error');
        		$("#req-position_id").show();
        		$("#position_id").focus();
        		return false;
            }else{
            	$("#divReq-position_id").closest('.form-group').removeClass('has-error');
            	$("#req-position_id").hide();
        	}

         	if($("#firstname").val().length==0){
        		$("#divReq-firstname").closest('.form-group').addClass('has-error');
        		$("#req-firstname").show();
        		$("#firstname").focus();
        		return false;
            }else{
            	$("#divReq-firstname").closest('.form-group').removeClass('has-error');
            	$("#req-firstname").hide();
        	}

         	if($("#surname").val().length==0){
        		$("#divReq-surname").closest('.form-group').addClass('has-error');
        		$("#req-surname").show();
        		$("#surname").focus();
        		return false;
            }else{
            	$("#divReq-surname").closest('.form-group').removeClass('has-error');
            	$("#req-surname").hide();
        	}

        	this.submit();
    	});







        
    	//initPosition();

    });
    
    function initPosition(){
    	$.ajax({
		     url: host+"/index.php/AjaxRequest/GetPosition",
		     type: "GET",
		     dataType: "json",
		     success: function (json) {
		            $('#position_id').empty();
		            $('#position_id').append($('<option>').text("Select"));
		            $.each(json, function(i, obj){
		                    $('#position_id').append($('<option>').text(obj.name).attr('value', obj.id));
		            });
     	
		     },
		     error: function (xhr, ajaxOptions, thrownError) {
				alert('ERROR');
		     }
    	});
    }
    

</script>

</form>