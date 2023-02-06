<?php 
$edit_data		=	$this->db->get_where('invoice' , array('invoice_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="modal-content">

<div class="modal-body" style="height:500px; overflow:auto;">

<div class="tab-pane box active" id="edit" style="padding: 5px">
<div class="box-content">
<form action="index.php?admin/invoice/do_update/<?php echo $row['invoice_id']?>" class="form-horizontal form-groups-bordered validate" target="_top" method="post" accept-charset="utf-8" novalidate="novalidate">
<div class="form-group">
<label class="col-sm-3 control-label">student</label>
<div class="col-sm-5">
<select name="student_id" class="form-control" style="width:400px;">
<option value="5">
<option value=""><?php echo get_phrase('select');?></option>
<?php 
	$parents = $this->db->get('student')->result_array();
	foreach($parents as $row3):
		?>
		<option value="<?php echo $row3['student_id'];?>"
			<?php if($row['student_id'] == $row3['student_id'])echo 'selected';?>>
					<?php echo 'Class '.$this->crud_model->get_type_name_by_id('class',$row3['class_id']).'-  roll '. $row3['student_no'].'  - '.$row3['name'];?>
				</option>
	<?php
	endforeach;
  ?>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">title</label>
<div class="col-sm-5">
<input type="text" class="form-control" name="title" value="<?php echo $row['title']?>">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">description</label>
<div class="col-sm-5">
<input type="text" class="form-control" name="description" value="<?php echo $row['description']?>">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Total Amount</label>
<div class="col-sm-5">
<input type="text" class="form-control" name="amount" value="<?php echo $row['amount']?>">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">status</label>
<div class="col-sm-5">
<select name="status" class="form-control">
<option value="unpaid" <?php if($row['status'] == 'unpaid')echo 'selected';?>>unpaid</option>
<option value="paid" <?php if($row['status'] == 'paid')echo 'selected';?>>paid</option>

</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">date</label>
<div class="col-sm-5">
<input type="text" class="datepicker form-control" name="date" value="<?php echo date('m-d-y', $row['creation_timestamp']) ;?>">
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-3 col-sm-5">
<button type="submit" class="btn btn-info">edit invoice</button>
</div>
</div>
</form>
</div>
</div></div>

</div>


<?php
endforeach;
?>