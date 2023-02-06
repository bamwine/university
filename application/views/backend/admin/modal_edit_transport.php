
<?php 
$edit_data		=	$this->db->get_where('transport' , array('transport_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>

<div class="tab-pane box active" id="edit" style="padding: 5px">
<div class="box-content">
<form action="index.php?admin/transport/do_update/<?php echo $row['transport_id']?>" class="form-horizontal form-groups-bordered validate" target="_top" method="post" accept-charset="utf-8" novalidate="novalidate">
<div class="padded">
<div class="form-group">
<label class="col-sm-3 control-label">route name</label>
<div class="col-sm-5">
<input type="text" class="form-control" name="route_name" value="<?php echo $row['route_name']?>">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">number of vehicle</label>
<div class="col-sm-5">
<input type="text" class="form-control" name="number_of_vehicle" value="<?php echo $row['number_of_vehicle']?>">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">description</label>
<div class="col-sm-5">
<input type="text" class="form-control" name="description" value="<?php echo $row['description']?>">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">route fare</label>
<div class="col-sm-5">
<input type="text" class="form-control" name="route_fare" value="<?php echo $row['route_fare']?>">
</div>
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-3 col-sm-5">
<button type="submit" class="btn btn-info">edit transport</button>
</div>
</div>
</form>
</div>
</div>

<?php
endforeach;
?>