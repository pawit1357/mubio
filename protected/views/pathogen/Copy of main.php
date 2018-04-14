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
					<?php echo (UserLoginUtils::canCreate($_SERVER['REQUEST_URI']) == false)? "":  CHtml::link('เพิ่มข้อมูล',array('Pathogen/Create'),array('class'=>'btn btn-default btn-sm'));?>
					</div>
				</div>
				<div class="portlet-body">
					<table class="table table-striped table-hover table-bordered" id="gvResult">
									<thead>
										<tr>
											<th style="text-align: center; vertical-align: middle;" rowspan="2"></th>
											<th style="text-align: center; vertical-align: middle;" rowspan="2">ลำดับที่</th>
											<th style="text-align: center; vertical-align: middle;" rowspan="2">ชื่อเชื้อโรค/พิษจากสัตว์<br>(๑)</th>
											<th style="text-align: center; vertical-align: middle;" rowspan="2">รหัสเชื้อโรค/พิษจากสัตว์<br>(๒)</th>
											<th style="text-align: center; vertical-align: middle;" rowspan="2">ชื่อผู้ควบคุม<br>(๓)</th>
											<th style="text-align: center; vertical-align: middle;" rowspan="2">รูปแบบการ<br>จัดเก็บ</th>
											<th style="text-align: center; vertical-align: middle;" rowspan="2">รวม<br>จำนวน<br>ทั้งหมด<br>ของเดือน<br>นี้</th>
											<th style="text-align: center; vertical-align: middle;" colspan="6">จำนวน/ปริมาณที่ผลิต (๕)</th>
											<th style="text-align: center; vertical-align: middle;" rowspan="2">ครอบครอง</th>
											<th style="text-align: center; vertical-align: middle;" colspan="6">จำนวน/ปริมาณที่จำหน่าย (๖)</th>
											<th style="text-align: center; vertical-align: middle;" colspan="4">จำนวน/ปริมาณ (๗)</th>
										</tr>
										<tr>
											<th style="text-align: center; vertical-align: middle;">เพาะ</th>
											<th style="text-align: center; vertical-align: middle;">ผสม</th>
											<th style="text-align: center; vertical-align: middle;">ปรุง</th>
											<th style="text-align: center; vertical-align: middle;">แปรสภาพ</th>
											<th style="text-align: center; vertical-align: middle;">แบ่งบรรจุ</th>
											<th style="text-align: center; vertical-align: middle;">รวมบรรจุ</th>
											<th style="text-align: center; vertical-align: middle;">ขาย</th>
											<th style="text-align: center; vertical-align: middle;">จ่ายแจก ให้</th>
											<th style="text-align: center; vertical-align: middle;">แลกเปลี่ยน</th>
											<th style="text-align: center; vertical-align: middle;">สูญหาย</th>
											<th style="text-align: center; vertical-align: middle;">เสียหาย</th>
											<th style="text-align: center; vertical-align: middle;">ทิ้งทำลาย</th>
											<th style="text-align: center; vertical-align: middle;">นำเข้า<br>จาก<br>ต่าง<br>ประเทศ</th>
											<th style="text-align: center; vertical-align: middle;">ส่งออก<br>ไป<br>ต่าง<br>ประเทศ</th>
											<th style="text-align: center; vertical-align: middle;">นำผ่าน<br>ประเทศ<br>ไทยไปยัง<br>ประเทศ<br>อื่น</th>
										</tr>
									</thead>
						<tbody>
	<?php
	$counter = 1;
	$dataProvider = $data->search ();
	foreach ( $dataProvider->data as $data ) {
	?>
										<tr>
										<td>				<?php if(UserLoginUtils::canUpdate( $_SERVER['REQUEST_URI'])){?>
									<a title="Edit" class="fa fa-edit" href="<?php echo Yii::app()->CreateUrl('Pathogen/Update/id/'.$data->id)?>"></a>
								<?php }?></td>
											<td style="text-align: center;"><?php echo $counter;?></td>
                                            <td style="text-align: left;"><?php echo $data->pathogen_name;?></td>
                                            <td><?php echo $data->pathogen_code;?></td>
                                            <td><?php echo $data->pathogen_volume;?></td>
                                            <td><?php echo $data->supervisor;?></td>
                                            <td><?php echo $data->manufacture_plant;?></td>
                                            <td><?php echo $data->manufacture_fuse;?></td>
                                            <td><?php echo $data->manufacture_prepare;?></td>
                                            <td><?php echo $data->manufacture_transform;?></td>
                                            <td><?php echo $data->manufacture_packing;?></td>
                                            <td><?php echo $data->manufacture_total_packing;?></td>
                                            <td><?php echo $data->distribute_sell;?></td>
                                            <td><?php echo $data->distribute_pay;?></td>
                                            <td><?php echo $data->distribute_give;?></td>
                                            <td><?php echo $data->distribute_exchange;?></td>
                                            <td><?php echo $data->distribute_donate;?></td>
                                            <td><?php echo $data->distribute_lost;?></td>
                                            <td><?php echo $data->distribute_discard;?></td>
                                            <td><?php echo $data->distribute_destroy;?></td>
                                            <td><?php echo $data->import;?></td>
                                            <td><?php echo $data->export;?></td>
                                            <td><?php echo $data->import_to_other;?></td>
                                           
                                         
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