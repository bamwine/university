<?php 
$edit_data		=	$this->db->get_where('payment' , array('payment_id' => $param2) )->result_array();
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
<form action="index.php?admin/expense/edit/<?php echo $row['payment_id'];?>" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<div class="form-group">
<label for="field-1" class="col-sm-3 control-label">title</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="title" data-validate="required" data-message-required="Value Required" value="PURCHASE OF SCHOOL CHALK">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Category</label>
<div class="col-sm-6">
<select name="expense_category_id" class="form-control" required="">
<option value=""><?php echo get_phrase('select');?></option>
<?php 
	$parents = $this->db->get('expense_category')->result_array();
foreach($parents as $row3):
	?>
	<option value="<?php echo $row3['expense_category_id'];?>"
		<?php if($row['expense_category_id'] == $row3['expense_category_id'])echo 'selected';?>>
				<?php echo $row3['name'];?>
			</option>
<?php
endforeach;
?>
</select>
</div>
</div>
<div class="form-group">
<label for="field-2" class="col-sm-3 control-label">description</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="description" value="<?php echo $row['description'];?>">
</div>
</div>
<div class="form-group">
<label for="field-2" class="col-sm-3 control-label">amount</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="amount" value="<?php echo $row['amount'];?>">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Method</label>
<div class="col-sm-6">
<select name="method" class="form-control">
<option value="1" <?php if($row['method'] == 1)echo 'selected';?>>Cash</option>
<option value="2" <?php if($row['method'] == 2)echo 'selected';?>>Check</option>
<option value="3" <?php if($row['method'] == 3)echo 'selected';?>>Card</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">date</label>
<div class="col-sm-6">
<input type="text" class="datepicker form-control" name="timestamp" value="<?php echo date('m/d/y', $row['timestamp']) ;?>">
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