<br>
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4" style="text-align: left;">
<div class="tile-stats tile-white tile-white-primary">
<h3>
Complaint Sheet </h3>
<h4>Course Unit:&nbsp;&nbsp;&nbsp;<span><?php echo $this->crud_model->get_type_name_by_id('subject',$subject_id);?></span></h4>
<h4>Acadmic Period:&nbsp;&nbsp;&nbsp;<span><?php echo $acadmic_period;?></span></h4>
<h4>Period of study:&nbsp;&nbsp;&nbsp;<span><?php echo $tos;?></span></h4>
<h4>Year of study:&nbsp;&nbsp;&nbsp;<span><?php echo $yos;?></span></h4>
<h4>Student Name:&nbsp;&nbsp;&nbsp;<span><?php echo $this->crud_model->get_type_name_by_id('student',$student_id);?></span></h4>
</div>
</div>
<div class="col-md-4"></div>
</div>
<hr>

<div class="row">


<table class="table table-bordered">
<thead>
<tr>
<td>student</td>
<?php 
$this->db->order_by('exam_id', 'ASC');
$examsd = $this->db->get('exam')->result_array();
foreach($examsd as $row){
	?>
	<td><?php echo $row['name'];?></td>	
<?php
}
?>

</tr>
</thead>
<tbody>

<form action="index.php?<?php echo $account_type; ?>/tabulation_complaint/<?php echo $exam_id;?>/<?php echo $class_id;?>" method="post" accept-charset="utf-8">


<tr>
<td><?php echo $this->crud_model->get_type_name_by_id('student',$student_id);?></td>

<?php 
$this->db->order_by('exam_id', 'ASC');
$examsd = $this->db->get('exam')->result_array();
foreach($examsd as $rowse){
	?>
<td>


<input type="number" value="<?php echo $this->db->get_where('mark' , array('student_id' =>$student_id,'exam_id' =>$rowse['exam_id'],'class_id' =>$class_id, 'subject_id' =>$subject_id,'tos'=>$tos,'yos'=>$yos,'acadmic_period' =>$acadmic_period))->row()->mark_obtained;?>" name="mark_obtained_<?php echo $rowse['exam_id'];?>" class="form-control">
<input type="text" name="exam_id<?php echo $rowse['exam_id'];?>" value="<?php echo $rowse['exam_id'];?>">

</td>
	
<?php
}
?>


</tr>

<input type="text" name="student_id" value="<?php echo $student_id;?>">
<input type="text" name="class_id" value="<?php echo $class_id;?>">
<input type="text" name="subject_id" value="<?php echo $subject_id;?>">
<input type="text" name="tos" value="<?php echo $tos;?>">
<input type="text" name="yos" value="<?php echo $yos;?>">
<input type="text" name="acadmic_period" value="<?php echo $acadmic_period;?>">
<input type="text" name="exam_id" value="<?php echo $exam_id;?>">

<input type="hidden" name="operation" value="updatedata">

</tbody>
</table>
<center>
<button type="submit" class="btn btn-success btn-sm btn-icon icon-left"> <i class="entypo-check"></i>Update Marks</button>
</center>

</form>

<br>

  
  
  
  
  
</div>



