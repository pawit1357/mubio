<?php
$criteria = new CDbCriteria();
$criteria ="id <> 1";
$departments = MDepartment::model ()->findAll ( $criteria );
?>
<form id="Form1" method="post" enctype="multipart/form-data"
	class="form-horizontal">
	<div class="portlet light">
		<div class="portlet-title">
			<div class="caption">
				
					<?php echo  MenuUtil::getMenuName($_SERVER['REQUEST_URI'])?>
				<span class="caption-helper">(ระบุเงื่อนไขสำหรับการค้นหา)</span>
			</div>
			<div class="actions"></div>
		</div>
		<div class="portlet-body form">
			<div class="form-body">
				<!-- BEGIN FORM-->
				<div class="row">
					<div class="col-md-9">
						<div class="form-group" id="divReq-department_id">
							<label class="control-label col-md-3">หน่วยงาน:<span
								class="required">*</span></label>
							<div class="col-md-6">
								<input id="" type="text" name="PersonBiosafety[create_date]">
							</div>
							<div></div>
						</div>
					</div>
				</div>
			</div>
			<!-- END FORM-->
			<div class="form-actions">
				<div class="row">
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<input type='submit' name='submitBtn' id='submitBtn'
									class='btn green uppercase' value="ค้นหา" />
								<button type="reset" class="enableOnInput btn default uppercase">ยกเลิก</button>
							</div>
						</div>
					</div>
					<div class="col-md-9"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="portlet light">
		<div class="portlet-body form">
			<div class="form-body">
				<!-- BEGIN FORM-->
				<br> <br> <br>

			</div>
		</div>
	</div>
	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/jquery.min.js"
		type="text/javascript"></script>



	<script>
    jQuery(document).ready(function () {

    	$("#req-department_id").hide();

    	
    	var table = $('#gvResult');

    	var oTable = table.dataTable({
	        dom: 'Bfrtip',
	        buttons: [
// 	             'copy', 'csv', 'excel', 'pdf', 'print'
	        	'excel',  'print'
	        ],
    	    // Internationalisation. For more info refer to http://datatables.net/manual/i18n
    	    "language": {
    	        "aria": {
    	            "sortAscending": ": activate to sort column ascending",
    	            "sortDescending": ": activate to sort column descending"
    	        },
    	        "emptyTable": "ไม่พบข้อมูล",
    	        "info": "แสดง  _START_ ถึง _END_ จากทั้งหมด _TOTAL_ รายการ",
    	        "infoEmpty": "No entries found",
    	        "infoFiltered": "(filtered1 from _MAX_ total entries)",
    	        "lengthMenu": "แสดงข้อมูล  _MENU_ รายการ",
    	        "search": "ใส่คำที่ต้องการค้นหา:",
    	        "zeroRecords": "ไม่พบรายการที่ค้นหา"
    	    },

    	    responsive: true,
    	    "searching": false,
    	    //"ordering": false, disable column ordering 
    	    //"paging": false, disable pagination

    	    "order": [ [0, 'asc']],
    	    "lengthMenu": [
    	        [5, 10, 15, 20, -1],
    	        [5, 10, 15, 20, "ทั้งหมด"] // change per page values here
    	    ],
    	    // set the initial value
    	    "pageLength": 10 ,
    	    "columnDefs": [ {
    	        "targets": 'no-sort',
    	        "orderable": false,
    	  } ]
    		});

    	$( "#Form1" ).submit(function( event ) {
        	
         	if($("#department_id").val()=="0"){
        		$("#divReq-department_id").closest('.form-group').addClass('has-error');
        		$("#req-department_id").show();
        		$("#department_id").focus();
        		return false;
            }else{
            	$("#divReq-department_id").closest('.form-group').removeClass('has-error');
            	$("#req-department_id").hide();
        	}



        	this.submit();
    	});
    });
</script>

</form>
