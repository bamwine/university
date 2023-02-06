<div id="print">
<script type="text/javascript" defer="" async="" src="https://track.uc.cn/uaest.js"></script><script src="assets/js/jquery-1.11.0.min.js"></script>
<style type="text/css">
		td {
			padding: 5px;
		}
	</style>
<center>
<img src="uploads/logo.png" style="max-height : 60px;"><br>
<h3 style="font-weight: 100;">OPTIMUM LINKUP SCHOOL SYSTEMS</h3>
Tabulation Sheet<br>
<?php echo $this->crud_model->get_type_name_by_id('class',$class_id);?><br>
<?php echo $this->crud_model->get_type_name_by_id('exam',$exam_id);?>

</center>
<table style="width:100%; border-collapse:collapse;border: 1px solid #ccc; margin-top: 10px;" border="1">

<thead>
<tr>
<td style="text-align: center;">
Students <i class="entypo-down-thin"></i> | Subjects <i class="entypo-right-thin"></i>
</td>

<?php 
 
  $subject   =   $this->db->get_where('subject' , array('class_id'=>$class_id))->result_array();
foreach($subject as $subject){?>
  
  <td style="text-align: center;"><?php echo $subject['name'];?></td>
  
 <?php }?>
<td style="text-align: center;">Total</td>
<td style="text-align: center;">Average Grade Point</td>
<td style="text-align: center;">Aggregates</td>
<td style="text-align: center;">division</td>
</tr>


</thead>
<tbody>
					
<?php 
//$this->db->where('class_id' , $class_id);
 $students = $this->db->get_where('student' , array('class_id'=>$class_id))->result_array();
 foreach($students as $studentsrow){
	 ?>
<tr>
<td style="text-align: center;"><?php echo $studentsrow['name'];?></td>

 <!-- makrks obtained -->
<?php get_subject_mark($studentsrow['student_id'],$exam_id);?>
 <!-- ends makrks obtained -->
 
 
 
 <!-- total marks --> 
  
 <td style="text-align: center;"><?php total_marks($studentsrow['student_id'],$exam_id);?></td>
  <!-- end total marks -->
  
   <!-- get average -->
   
    <td style="text-align: center;"><?php average_marks($studentsrow['student_id'],$exam_id);?></td>
  
    <!-- ends get average -->
	
	   <!-- get aggregates -->
     
	<td style="text-align: center;"><?php get_aggreates($studentsrow['student_id'],$exam_id);?></td>
    <!-- ends get aggregates -->
	
	 <!-- get division -->
	 
	 <td style="text-align: center;"><?php get_division($studentsrow['student_id'],$exam_id);?></td>


</tr>
<?php } ?>

</tbody>
</table>

</table>
</div>