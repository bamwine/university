<?php 
$edit_data		=	$this->db->get_where('expense_category' , array('expense_category_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="col-md-12">
<div class="panel panel-primary" data-collapsed="0">
<div class="panel-heading">
<div class="panel-title">
<i class="entypo-plus-circled"></i>
Edit Expense </div>
</div>
<div class="panel-body">
<form action="index.php?admin/expense_category/edit/<?php echo $row['expense_category_id'];?>" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
<div class="form-group">
<label for="field-1" class="col-sm-3 control-label">name</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="name" data-validate="required" data-message-required="Value Required" value="<?php echo $row['name'];?>">
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-3 col-sm-5">
<button type="submit" class="btn btn-info">Update</button>
</div>
</div>
</form> </div>
</div>
</div>

<?php
endforeach;
?>
