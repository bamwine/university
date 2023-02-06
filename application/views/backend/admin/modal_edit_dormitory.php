
<?php 
$edit_data		=	$this->db->get_where('dormitory' , array('dormitory_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>

<div class="tab-pane box active" id="edit" style="padding: 5px">
<div class="box-content">
<form action="index.php?admin/dormitory/do_update/<?php echo $row['dormitory_id'];?>" class="form-horizontal form-groups-bordered validate" target="_top" method="post" accept-charset="utf-8" novalidate="novalidate">
<div class="padded">
<div class="form-group">
<label class="col-sm-3 control-label">dormitory name</label>
<div class="col-sm-5">
<input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">number of room</label>
<div class="col-sm-5">
<input type="text" class="form-control" name="number_of_room" value="<?php echo $row['number_of_room'];?>">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">description</label>
<div class="col-sm-5">
<input type="text" class="form-control" name="description" value="<?php echo $row['description'];?>">
</div>
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-3 col-sm-5">
<button type="submit" class="btn btn-info">Edit Dormitory</button>
</div>
</div>
</form>
</div>
</div>

<?php
endforeach;
?>