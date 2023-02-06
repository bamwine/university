<div class="row">
<div class="col-md-12">
<div class="panel panel-default panel-shadow" data-collapsed="0">

<div class="panel-heading">
<div class="panel-title">Send Marks via SMS</div>
</div>

<div class="panel-body">
<form action="index.php?admin/exam_marks_sms/send_sms" target="_top" method="post" accept-charset="utf-8">
<div class="form-group">
<div class="col-md-3">
<select name="exam_id" class="form-control" required="">
<option value=""><?php echo get_phrase('select');?></option>
                              <?php 
								$examsd = $this->db->get('exam')->result_array();
								foreach($examsd as $row):
									?>
                            		<option value="<?php echo $row['exam_id'];?>"
									<?php if($exam_id == $row['exam_id'])echo 'selected';?>>
											<?php echo $row['name'];?>
                                            </option>
                                <?php
								endforeach;
							  ?>
</select>
</div>
</div>
<div class="form-group">
<div class="col-md-3">
<select name="class_id" class="form-control" required="">
<option value=""><?php echo get_phrase('select');?></option>
                              <?php 
								$classes = $this->db->get('class')->result_array();
								foreach($classes as $row):
									?>
                            		<option value="<?php echo $row['class_id'];?>"
									<?php if($class_id == $row['class_id'])echo 'selected';?>>
											<?php echo $row['name'];?>
                                            </option>
                                <?php
								endforeach;
							  ?>
</select>
</div>
</div>
<div class="form-group">
<div class="col-md-3">
<select name="receiver" class="form-control" required="">
<option value="">Select Receiver</option>
<option value="student">Students</option>
<option value="parent">Parents</option>
</select>
</div>
</div>
<div class="col-md-3">
<button type="submit" class="btn btn-success btn-sm btn-icon icon-left"> <i class="entypo-book"></i>Send Marksvia SMS</button>
</div>
</form>
</div>
</div>
</div>
</div>