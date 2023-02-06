

<?php 
$edit_data		=	$this->db->get_where('exam', array('exam_id' => $param2))->result_array();

?>
<div class="panel panel-primary" data-collapsed="0">
<div class="panel-heading">
<div class="panel-title">
<i class="entypo-plus-circled"></i>
edit exam </div>
</div>
<div class="panel-body">
<?php foreach($edit_data as $row):?>
<form action="index.php?admin/exam/edit/do_update/<?php echo $row['exam_id'];?>" class="form-horizontal form-groups-bordered validate" target="_top" method="post" accept-charset="utf-8">
<div class="padded">

<div class="form-group">
<label class="col-sm-3 control-label">name</label>
<div class="col-sm-5">
<input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" data-validate="required" data-message-required="Value Required">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">date</label>
<div class="col-sm-5">
<input type="text" class="datepicker form-control" name="date" value="<?php echo $row['date'];?>">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">comment</label>
<div class="col-sm-5">
<input type="text" class="form-control" name="comment" value="<?php echo $row['comment'];?>">
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-3 col-sm-5">
<button type="submit" class="btn btn-info">edit exam</button>
</div>
</div>


</div></form>
<?php endforeach;?>
</div>
</div>