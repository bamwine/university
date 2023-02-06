<div class="row">
<div class="col-md-12">
<div class="panel panel-primary" data-collapsed="0">
<div class="panel-heading">
<div class="panel-title">
<h3>Add Study Material</h3>
</div>
</div>
<div class="panel-body">
<form action="index.php?teacher/study_material/create" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
<div class="form-group">
<label for="field-1" class="col-sm-3 control-label">date</label>
<div class="col-sm-7">
<div class="date-and-time">
<input type="text" name="timestamp" class="form-control datepicker" data-format="D, dd MM yyyy" placeholder="date here">
</div>
</div>
</div>
<div class="form-group">
<label for="field-1" class="col-sm-3 control-label">title</label>
<div class="col-sm-5">
<input type="text" name="title" class="form-control" id="field-1">
</div>
</div>
<div class="form-group">
<label for="field-ta" class="col-sm-3 control-label">description</label>
<div class="col-sm-9">
<textarea name="description" class="form-control wysihtml5" id="field-ta" data-stylesheet-url="assets/css/wysihtml5-color.css"></textarea>
</div>
</div>
<div class="form-group">
<label for="field-ta" class="col-sm-3 control-label">class</label>
<div class="col-sm-5">
<select name="class_id" class="form-control">
<option value=""><?php echo get_phrase('select');?></option>
                              <?php 
								$classes = $this->db->get('class')->result_array();
								foreach($classes as $row):
									?>
                            		<option value="<?php echo $row['class_id'];?>">
											<?php echo $row['name'];?>
                                            </option>
                                <?php
								endforeach;
							  ?>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">File</label>
<div class="col-sm-5">
<input type="file" name="file_name" class="form-control file2 inline btn btn-primary" data-label="<i class='glyphicon glyphicon-file'></i> Browse">
</div>
</div>
<div class="form-group">
<label for="field-ta" class="col-sm-3 control-label">File Type</label>
<div class="col-sm-5">
<select name="file_type" class="form-control">
<option value="">Select File Type</option>
<option value="image">Image</option>
<option value="doc">Doc</option>
<option value="pdf">Pdf</option>
<option value="excel">Excel</option>
<option value="other">Other</option>
</select>
</div>
</div>
<div class="col-sm-3 control-label col-sm-offset-2">
<input type="submit" class="btn btn-success" value="Submit">
</div>
</form>
</div>
</div>
</div>
</div>
