<form id="Form1" method="POST" enctype="multipart/form-data"
	class="form-horizontal">

	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
	<div class="<?php echo ConfigUtil::getPortletTheme(); ?>">
				<div class="portlet-title">
					<div class="caption">
						<?php echo  MenuUtil::getMenuName($_SERVER['REQUEST_URI'])?>
					</div>
					<div class="actions">
					<?php echo (UserLoginUtils::canCreate($_SERVER['REQUEST_URI']) == false)? "":  CHtml::link('เพิ่มข้อมูล',array('Tracking/Create'),array('class'=>'btn btn-default btn-sm'));?>
					</div>
				</div>
				<div class="portlet-body">
					<table class="table table-striped table-hover table-bordered"
						id="gvResult">
						<thead>
							<tr>
								<th>ลำดับ</th>
								<th>รหัส</th>
								<th>ผู้รองขอ</th>
								<th>รายละเอียด</th>
								<th>สถานะ</th>
								<th>วันที่ร้องขอ</th>
								<th>Download(Cert)</th>
							</tr>
						</thead>
						<tbody>
            	<?php
            	$counter = 1;
            	$dataProvider = $data->search ();
            	
            	foreach ( $dataProvider->data as $data ) 
            	{
            	?>
                        <tr>
                        <td class="center"><?php echo $counter;?></td>
								<td class="center"><?php echo $data->code;?></td>
								<td class="center"><?php echo $data->usersLogin->first_name.'  '.$data->usersLogin->last_name;?></td>
								<td class="center"><?php echo $data->description;?></td>
								<td class="center"><?php echo $data->trackingStatus->name;?></td>
								<td class="center"><?php echo CommonUtil::getDateThai($data->create_date);?></td>
								<td class="center">
									<?php if(isset($data->certificate_path)){?>
									<a title="Download" class="fa fa-download" target="_blank"
									href="<?php echo  ConfigUtil::getAppName().''. $data->certificate_path?>">&nbsp;ดาวโหลด</a>	<?php }else{echo "-";}?></td>

							</tr>
			<?php
			     $counter++;
    	       }
    	    ?>	

						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>

	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/jquery.min.js"
		type="text/javascript"></script>
	<script>
jQuery(document).ready(function () {
	var table = $('#gvResult');

	var oTable = table.dataTable({

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


	    // setup responsive extension: http://datatables.net/extensions/responsive/
	    responsive: true,

	    //"ordering": false, disable column ordering 
	    //"paging": false, disable pagination

	    "order": [
	        [0, 'asc']
	    ],
	    
	    "lengthMenu": [
	        [5, 10, 15, 20, -1],
	        [5, 10, 15, 20, "ทั้งหมด"] // change per page values here
	    ],
	    "columns": [
	        { "width": "2%" },
	        { "width": "5%" },
	        { "width": "50%" },
	        { "width": "5%" },
	        { "width": "20%" },
	        { "width": "3%" },
	        { "width": "5%" },
	        { "width": "10%" },
	      ],
	    // set the initial value
	    "pageLength": 10 ,
	    "columnDefs": [ {
	        "targets": 'no-sort',
	        "orderable": false,
	  } ]
		});
});

</script>
</form>