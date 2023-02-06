<a 	class="btn btn-primary pull-right">
                <i class="entypo-user"></i>
            	<?php  $stut2 =  $this->crud_model->get_student_info($student_id);
				foreach ($stut2 as $food)
				echo $food['name'];
				?>
                </a> 
                <br><br>

<div class="row">
	<div class="col-md-12">
	
		<div class="tabs-vertical-env">
		
			<ul class="nav tabs-vertical">
			<?php 
				$classes = $this->db->get('exam')->result_array();
				foreach ($classes as $row):
			?>
				<li class="<?php if ($row['exam_id'] == $exam_id) echo 'active';?>">
					<a href="<?php echo base_url();?>index.php?parents/marks/<?php echo $student_id;?>/<?php echo $row['exam_id'];?>">
						<i class="entypo-dot"></i>
						Exam <?php echo $row['name'];?>
					</a>
				</li>
			<?php endforeach;?>
			</ul>
			
			<div class="tab-content">

				<div class="tab-pane active">
					<table class="table table-bordered space-up" style="margin-top:10px;margin-left:11%;">
<tr>
    <th>SUBJECT</th>
    

  <th>MARK OBTAINED</th>
  <th>AGGREGATE</th>  
  <th>AVERAGE</th>
    
	
</tr>
<?php

$students	=	$this->db->get_where('student' , array('student_id' => $student_id))->result_array();
						foreach($students as $rowx){
						

$subject   =   $this->db->get_where('subject' , array('class_id'=>$rowx['class_id']))->result_array();
foreach($subject as $subject) { ?>

<tr>
<td><b><?php echo $subject['name'];?></b></td>


<b><?php get_subject_mark2f($student_id,$exam_id,$subject['subject_id']);?></b>

<td><b><?php get_aggreates($student_id,$exam_id);?></b></td>


<td><b><?php average_marksf($student_id,$exam_id);?></b></td>
<?php
 }}
 ?>



</tr>
  

                                
                
            </table>
                
	
				</div>

			</div>
			
		</div>	
	
	</div>
</div>