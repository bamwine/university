<?php 
$edit_data		=	$this->db->get_where('book' , array('book_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>


<div class="tab-pane box active" id="edit" style="padding: 5px">
<div class="box-content">
<form action="index.php?admin/book/do_update/<?php echo $row['book_id'];?>" class="form-horizontal form-groups-bordered validate" target="_top" method="post" accept-charset="utf-8" novalidate="novalidate">
<div class="form-group">
<label class="col-sm-3 control-label">name</label>
<div class="col-sm-5">
<input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">author</label>
<div class="col-sm-5">
<input type="text" class="form-control" name="author" value="<?php echo $row['author'];?>">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">description</label>
<div class="col-sm-5">
<input type="text" class="form-control" name="description" value="<?php echo $row['description'];?>">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">price</label>
<div class="col-sm-5">
<input type="text" class="form-control" name="price" value="<?php echo $row['price'];?>">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">class</label>
<div class="col-sm-5">
<select name="class_id" class="form-control">
<option value=""><?php echo get_phrase('select');?></option>
				<?php 
				$teachers = $this->db->get('class')->result_array();
				foreach($teachers as $row2):
				?>
<option value="<?php echo $row2['class_id'];?>"  <?php if($row['class_id'] == $row2['class_id'])echo 'selected';?>>  <?php echo $row2['name'];?>
								</option>
				<?php
				endforeach;
				?>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">status</label>
<div class="col-sm-5">
<select name="status" class="form-control">
<option value="available" selected="">available</option>
<option value="unavailable">unavailable</option>
</select>
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-3 col-sm-5">
<button type="submit" class="btn btn-info">edit book</button>
</div>
</div>
</form>
</div>
</div>



<?php
endforeach;
?>