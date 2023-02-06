<br><br><br>

<div class="row">
<div class="col-md-12">

<div class="panel-group joined" id="accordion-test-<?php echo $class_id;?>">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion-test-<?php echo $class_id;?>" href="#collapse<?php echo $class_id;?>" class="collapsed">
<i class="entypo-rss"></i> Course -- <?php echo $class_name;?>&nbsp;&nbsp; Student Name: -- <?php echo $student_name;?> </a>
</h4>
</div>
<div id="collapse<?php echo $class_id;?>" class="panel-collapse out" style="height: 0px;">
<div class="panel-body">

<?php for($k=1;$k<$this->crud_model->get_course_years($class_id)+1;$k++) {
	
$studyper = $this->db->get('sessionp')->result_array();
foreach($studyper as $studydat){	
	
?> 

<div class="panel-heading">
<h4 class="panel-title">
<a>
<i class="entypo-rss"></i> YEAR --- <?php echo $k;?>  &nbsp;&nbsp;&nbsp; PERIOD OF STUDY &nbsp;&nbsp;&nbsp; : <?php echo $studydat['name'];?></a>
</h4>
</div>

<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
<tbody>


<?php 

$courseuitdata = $this->db->get_where('subject' , array('class_id' =>$class_id,'yos' =>$k,'tos' =>$studydat['name']))->result_array();
foreach($courseuitdata as $courseuit){
?>
<tr class="gradeA">
<td width="100"><?php echo $courseuit['name']?></td>
<td>

<?php 
$markdata = $this->db->get_where('mark' , array('class_id' =>$class_id,'student_id' =>$student_id,'subject_id'=>$courseuit['subject_id']))->result_array();
foreach($markdata as $marks){
?>
<div class="btn-group">
<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
<?php echo $marks['mark_obtained'];?> 
</button>

</div>

<div class="btn-group">
<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
<?php echo $grade_hold=$this->crud_model->get_grade($marks['mark_obtained']); 
				?> 
</button>

</div>
<?php
}
?>
</td>
</tr>

<?php 
}
?>
</tbody>
</table>


<?php } } ?>


</div>
</div>
</div>


</div>


</div>
</div>
