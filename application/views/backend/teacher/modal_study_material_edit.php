<?php 
$edit_data		=	$this->db->get_where('document' , array('document_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>


<div class="row">
<div class="col-md-12">
<div class="panel panel-primary" data-collapsed="0">
<div class="panel-heading">
<div class="panel-title">
<h3>Edit Study Material</h3>
</div>
</div>
<div class="panel-body">
<form role="form" class="form-horizontal form-groups-bordered" action="index.php?teacher/study_material/update/<?php  $row['document_id'];?>" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="field-1" class="col-sm-3 control-label">date</label>
<div class="col-sm-7">
<div class="date-and-time">
<input type="text" name="timestamp" class="form-control datepicker" data-format="D, dd MM yyyy" placeholder="date here" value="<?php echo date($row['timestamp']);?>">
</div>
</div>
</div>
<div class="form-group">
<label for="field-1" class="col-sm-3 control-label">title</label>
<div class="col-sm-5">
<input type="text" name="title" class="form-control" id="field-1" value="<?php echo $row['title'];?>">
</div>
</div>
<div class="form-group">
<label for="field-ta" class="col-sm-3 control-label">description</label>
<div class="col-sm-9">
<textarea name="description" class="form-control wysihtml5" data-stylesheet-url="assets/css/wysihtml5-color.css" id="field-ta"><?php echo $row['description'];?></textarea>
</div>
</div>
<div class="form-group">
<label for="field-ta" class="col-sm-3 control-label">class</label>
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
<div class="col-sm-3 control-label col-sm-offset-1">
<input type="submit" class="btn btn-success" value="Update">
</div>
</form>
</div>
</div>
</div>
</div>

<?php
endforeach;
?>