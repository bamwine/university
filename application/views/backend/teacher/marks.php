
<div class="panel panel-primary">
<div class="panel-heading">
<div class="panel-title">
Marks Information Page </div>
</div>
<div class="table-responsive">

<div class="tab-pane  active" id="list">
<center>

<?php echo form_open(base_url() . 'index.php?teacher/marks' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data', 'method' => 'post'));?>
<!--form action="index.php?teacher/marks" method="post" accept-charset="utf-8"-->
	
<table border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
<tbody><tr>
<td>select exam</td>
<td>select class</td>
<td>select subject</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>
<select name="exam_id" class="form-control" style="float:left;">
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
</td>
<td>
<select name="class_id" class="form-control" onchange="show_subjects(this.value)" style="float:left;">
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
</td>
 <td>

<select name="subject_id" id="subject_id_2" style="display:block;" class="form-control">
<option value=""><?php echo get_phrase('select');?></option>
                              <?php 
								$subjectd = $this->db->get('subject')->result_array();
								foreach($subjectd as $row):
									?>
                            		<option value="<?php echo $row['subject_id'];?>"
									<?php if($subject_id == $row['subject_id'])echo 'selected';?>>
											<?php echo $row['name'];?>
                                            </option>
                                <?php
								endforeach;
							  ?>
</select>

</td>
<td>

<input type="hidden" name="operation" value="selection">
<button type="submit" class="btn btn-success btn-sm btn-icon icon-left"> <i class="entypo-check"></i>manage marks</button>
</td>
</tr>
</tbody></table>
</form>

</center>

</div>
<br><br>

<?php 
 
  $query = $this->db->get_where('mark' , array('exam_id' =>$exam_id , 'class_id' =>$class_id, 'subject_id' =>$subject_id));
            if ($query->num_rows() > 0){
			 $students   =   $this->db->get_where('mark' , array('exam_id' =>$exam_id , 'class_id' =>$class_id, 'subject_id' =>$subject_id))->result_array();	
			}else{
				 $students   =   $this->db->get_where('student' , array('class_id'=>$class_id))->result_array();
			}
  
  if($students){
  ?>

<table class="table table-bordered">
<thead>
<tr>
<td>student</td>
<td>mark obtained(out of 100)</td>
<td>comment</td>
</tr>
</thead>
<tbody>

<?php //echo form_open(base_url() . 'index.php?teacher/marks/1/2' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data', 'method' => 'post'));?>

<form action="index.php?teacher/marks/<?php echo $exam_id;?>/<?php echo $class_id;?>" method="post" accept-charset="utf-8">

<!--form action="index.php?teacher/marks" method="post" accept-charset="utf-8"-->


<?php foreach($students as $row):?>
<tr>
<td><?php echo $this->crud_model->get_type_name_by_id('student',$row['student_id']);?></td>
<td>
<input type="number" value="<?php echo $row['mark_obtained'];?>" name="mark_obtained_<?php echo $row['student_id'];?>" class="form-control">
</td>
<td>

<textarea name="comment_<?php echo $row['student_id'];?>" class="form-control"><?php echo $row['comment'];?></textarea>
</td>
<input type="hidden" name="mark_id_<?php echo $row['student_id'];?>" value="<?php echo $row['mark_id'];?>">
<input type="hidden" name="exam_id" value="<?php echo $exam_id;?>">
<input type="hidden" name="class_id" value="<?php echo $class_id;?>">
<input type="hidden" name="subject_id" value="<?php echo $subject_id;?>">
<input type="hidden" name="subj_name<?php echo $row['student_id'];?>" value="<?php echo $this->crud_model->get_type_name_by_id('subject',$subject_id);?>">

<input type="hidden" name="student_id<?php echo $row['student_id'];?>" value="<?php echo $row['student_id'];?>">
<input type="hidden" name="operation" value="update">
</tr>
  <?php endforeach;?>


</tbody>
</table>
<center>
<button type="submit" class="btn btn-success btn-sm btn-icon icon-left"> <i class="entypo-check"></i>Update Marks</button>
</center>

</form>

<br>

  <?php } else{?>
  
  <br><br>
  <table class="table table-bordered">

<tbody>
<tr>
<td><h1>No Results found</h1></td>
</tr>

</tbody>
</table>
  
  <?php } ?>


</div>
</div>
<script type="text/javascript">
  function show_subjects(class_id)
  {
     
	  $.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_class_subject/' + class_id ,
            success: function(response)
            {
               // jQuery('#subject_id_2').html(response);
            }
        });
  }

</script>
