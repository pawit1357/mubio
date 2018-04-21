<input type="hidden" id="url" value="<?php echo ConfigUtil::getSiteName();?>">

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
					<div class="col-md-4">
						<div class="form-group" id="divReq-start_date">
							<label class="control-label col-md-3">วันที่เริ่ม:</label>
							<div class="col-md-6">
								<input type="text" value="<?php echo CommonUtil::getCurDate();?>" id="start_date"
									name="Rpt[start_date]" />
									<span class="help-block" id="req-start_date"><?php echo Pathogen::$req1;?></span>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-4">
						<div class="form-group" id="divReq-start_date">						
							<label class="control-label col-md-3">วันที่สิ้นสุด:</label> <input
								type="text" value="<?php echo CommonUtil::getCurDate();?>" id="end_date" name="Rpt[end_date]" />
								<span class="help-block" id="req-end_date"><?php echo Pathogen::$req1;?></span>
						</div>
					</div>
					<!--/span-->
				</div>
				<?php echo '';//"::".$_SESSION['ReportNotFound']; ?>
			<?php if(strcmp($_SESSION['ReportNotFound'],"1")==0){?>
			<div class="alert alert-danger">
				<strong>ไม่พบข้อมูลรายงาน!</strong> ไม่พบข้อมูลตามเงื่อนไขที่กำหนด.
			</div>
			<?php }?>
			
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

	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/jquery.min.js"
		type="text/javascript"></script>

	



	<script>
    jQuery(document).ready(function () {

    	var url = $("#url").val();

    	$("#req-end_date").hide();
    	$("#req-start_date").hide();


    	
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


        $.datetimepicker.setLocale('th'); // ต้องกำหนดเสมอถ้าใช้ภาษาไทย และ เป็นปี พ.ศ.
        

         
        // กรณีใช้แบบ input
        $("#start_date").datetimepicker({
            timepicker:false,
            format:'d/m/Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000            
            lang:'th',  // ต้องกำหนดเสมอถ้าใช้ภาษาไทย และ เป็นปี พ.ศ.
            onSelectDate:function(dp,$input){
                var yearT=new Date(dp).getFullYear()-0;  
                var yearTH=yearT+543;
                var fulldate=$input.val();
                var fulldateTH=fulldate.replace(yearT,yearTH);
                $input.val(fulldateTH);
            },
        });       
        $("#end_date").datetimepicker({
            timepicker:false,
            format:'d/m/Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000            
            lang:'th',  // ต้องกำหนดเสมอถ้าใช้ภาษาไทย และ เป็นปี พ.ศ.
            onSelectDate:function(dp,$input){
                var yearT=new Date(dp).getFullYear()-0;  
                var yearTH=yearT+543;
                var fulldate=$input.val();
                var fulldateTH=fulldate.replace(yearT,yearTH);
                $input.val(fulldateTH);
            },
        }); 

        // กรณีใช้กับ input ต้องกำหนดส่วนนี้ด้วยเสมอ เพื่อปรับปีให้เป็น ค.ศ. ก่อนแสดงปฏิทิน
        $("#start_date").on("mouseenter mouseleave",function(e){
            var dateValue=$(this).val();
            if(dateValue!=""){
                    var arr_date=dateValue.split("/"); // ถ้าใช้ตัวแบ่งรูปแบบอื่น ให้เปลี่ยนเป็นตามรูปแบบนั้น
                    // ในที่นี้อยู่ในรูปแบบ 00-00-0000 เป็น d-m-Y  แบ่งด่วย - ดังนั้น ตัวแปรที่เป็นปี จะอยู่ใน array
                    //  ตัวที่สอง arr_date[2] โดยเริ่มนับจาก 0 
                    if(e.type=="mouseenter"){
                        var yearT=arr_date[2]-543;
                    }       
                    if(e.type=="mouseleave"){
                        var yearT=parseInt(arr_date[2])+543;
                    }   
                    dateValue=dateValue.replace(arr_date[2],yearT);
                    $(this).val(dateValue);                                                 
            }       
        });
        $("#end_date").on("mouseenter mouseleave",function(e){
            var dateValue=$(this).val();

            if(dateValue!=""){
                    var arr_date=dateValue.split("/"); // ถ้าใช้ตัวแบ่งรูปแบบอื่น ให้เปลี่ยนเป็นตามรูปแบบนั้น
//                     // ในที่นี้อยู่ในรูปแบบ 00-00-0000 เป็น d-m-Y  แบ่งด่วย - ดังนั้น ตัวแปรที่เป็นปี จะอยู่ใน array
//                     //  ตัวที่สอง arr_date[2] โดยเริ่มนับจาก 0 
                    if(e.type=="mouseenter"){
                        var yearT=arr_date[2]-543;
                    }       
                    if(e.type=="mouseleave"){
                        var yearT=parseInt(arr_date[2])+543;
                    }   
                    dateValue=dateValue.replace(arr_date[2],yearT);
                    $(this).val(dateValue);                                                 
            }       
        });
    	$( "#Form1" ).submit(function( event ) {
        	
         	if($("#start_date").val().length==0){
        		$("#divReq-start_date").closest('.form-group').addClass('has-error');
        		$("#req-start_date").show();
        		$("#start_date").focus();
        		return false;
            }else{
            	$("#divReq-start_date").closest('.form-group').removeClass('has-error');
            	$("#req-start_date").hide();
        	}

         	if($("#end_date").val().length==0){
        		$("#divReq-end_date").closest('.form-group').addClass('has-error');
        		$("#req-end_date").show();
        		$("#end_date").focus();
        		return false;
            }else{
            	$("#divReq-end_date").closest('.form-group').removeClass('has-error');
            	$("#req-end_date").hide();
        	}

        	this.submit();
    	});
    });
</script>

</form>
