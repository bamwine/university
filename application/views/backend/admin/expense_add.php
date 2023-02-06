<div class="col-md-12">
<div class="panel panel-primary" data-collapsed="0">
<div class="panel-heading">
<div class="panel-title">
<i class="entypo-plus-circled"></i>
Add Expense </div>
</div>
<div class="panel-body">
<form action="index.php?admin/expense/create/" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
<div class="form-group">
<label for="field-1" class="col-sm-3 control-label">title</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="title" data-validate="required" data-message-required="Value Required" value="" autofocus="">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Category</label>
<div class="col-sm-6">
<select name="expense_category_id" class="form-control" required="">
<option value=""><?php echo get_phrase('select');?></option>
                              <?php 
								$examsd = $this->db->get('expense_category')->result_array();
								foreach($examsd as $row):
									?>
                            		<option value="<?php echo $row['expense_category_id'];?>">
									 <?php echo $row['name'];?>
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
<input type="text" class="form-control" name="description" value="">
</div>
</div>
<div class="form-group">
<label for="field-2" class="col-sm-3 control-label">amount</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="amount" value="">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Method</label>
<div class="col-sm-6">
<select name="method" class="form-control">
<option value="1">Cash</option>
<option value="2">Check</option>
<option value="3">Card</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">date</label>
<div class="col-sm-6">
<input type="text" class="datepicker form-control" name="timestamp">
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-3 col-sm-5">
<button type="submit" class="btn btn-info">Add Expense</button>
</div>
</div>
</form> </div>
</div>
</div>

