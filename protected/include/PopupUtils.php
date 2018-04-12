<!-- POPUP:: -->
<div id="static" class="modal fade" tabindex="-1">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title"><i class="fa fa-building-o"></i> รายชื่อห้อง</h4>
	</div>
	<div class="modal-body">

		<table class="table table-striped table-hover table-bordered"
			id="gvResultRoom">
			<thead>
				<tr>
					<th class="no-sort"></th>
					<th>ชื่อห้อง</th>
					<th>เลขห้อง</th>
					<th>ชั้น</th>
					<th>อาคาร</th>
					<th>คณะ</th>
				</tr>
			</thead>
			<tbody>
        <?php
        $model = new UsersLogin();
        $counter = 1;
        $dataProvider = $model->search();
        
        foreach ($dataProvider->data as $item) {?>
				<tr>
					<td class="center"><a href="#" onclick="return selectedUser('<?php echo $item->id; ?>')"><i class="fa fa-check-square-o"></i></a></td>
					<td class="center"><?php echo $item->first_name?></td>
					<td class="center"><?php echo $item->last_name?></td>
					<td class="center"><?php echo $item->email?></td>
					<td class="center"><?php echo $item->mobile_phone?></td>
					<td class="center"><?php echo $item->department->name?></td>

				</tr>
		<?php
            $counter ++;
        }?>	
			</tbody>
		</table>

	</div>
	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
	</div>
</div>

<!-- USED -->
<a class="btn btn-outline dark" data-toggle="modal" href="#modalRoom"> ค้นหา </a>




