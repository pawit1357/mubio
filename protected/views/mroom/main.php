<form id="Form1" method="POST" enctype="multipart/form-data"
	class="form-horizontal">

	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<?php echo  MenuUtil::getMenuName($_SERVER['REQUEST_URI'])?>
					</div>
					<div class="actions">
					<?php echo (UserLoginUtils::canCreate($_SERVER['REQUEST_URI']) == false)? "":  CHtml::link('เพิ่มข้อมูล',array('MRoom/Create'),array('class'=>'btn btn-default btn-sm'));?>
					</div>
				</div>
				<div class="portlet-body">
					<table class="table table-striped table-hover table-bordered"
						id="gvResult">
						<thead>
							<tr>
								<th>ลำดับ</th>
								<th>ชื่อห้อง</th>
								<th>เลขห้อง</th>
								<th>คณะ</th>
								<th>อาคาร</th>
								<th>ชั้น</th>
								<th>ไฟล์แผนผังห้อง</th>
								<th class="no-sort"></th>
							</tr>
						</thead>
						<tbody>
	<?php
	$counter = 1;
	$dataProvider = $data->search ();
	
	foreach ( $dataProvider->data as $data ) {
		?>
<tr>
<td class="center"><?php echo $counter;?></td>
								<td class="center"><?php echo $data->name?></td>
								<td class="center"><?php echo $data->number?></td>
<td class="center"><?php echo $data->fac?></td>
								<td class="center"><?php echo $data->building_id?></td>
								<td class="center"><?php echo $data->floor;// (($data->floor < 1 )? 'ใต้ดินชั้น ' : '') .''. abs($data->floor)?></td>
								<td class="center">
									<?php if(isset($data->room_plan)){?>
									<a title="Download" class="fa fa-download"
									href="<?php echo  ConfigUtil::getAppName().''. $data->room_plan?>">&nbsp;ดาวโหลด</a>	<?php }?></td>



								<td class="center">
		
									
<?php if(UserLoginUtils::canUpdate( $_SERVER['REQUEST_URI'])){?>
<a title="Edit" class="fa fa-edit"
									href="<?php echo Yii::app()->CreateUrl('MRoom/Update/id/'.$data->id)?>"></a>
<?php }?>
<?php if(UserLoginUtils::canDelete( $_SERVER['REQUEST_URI'])){?>
<a title="Delete" onclick="return confirm('ต้องการลบข้อมูลใช่หรือไม่?')"
									class="fa fa-trash"
									href="<?php echo Yii::app()->CreateUrl('MRoom/Delete/id/'.$data->id)?>"></a>
<?php }?>	
									
									
								</td>
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