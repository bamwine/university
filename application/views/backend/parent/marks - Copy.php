<hr />
 
<br><br><br>

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
					<table class="table table-bordered" >
                    <thead>
                        <tr>
                           
                            <td><?php echo get_phrase('mark_obtained');?>(out of 100)</td>
                            <td><?php echo get_phrase('comment');?></td>
                        </tr>
                    </thead>
                    <tbody>
                    	
                        <?php 
						 $subject   =   $this->db->get_where('subject' , array('class_id'=>$class_id))->result_array();
foreach($subject as $subject){
  
}
						
						$students	=	$this->db->get_where('student' , array('student_id' => $student_id))->result_array();
						foreach($students as $rowx):
						
							$verify_data	=	array(	'exam_id' => $exam_id ,
														'class_id' =>$rowx['class_id'] ,
														'subject_id' => 1 , 
														'student_id' => $rowx['student_id']);
														
							$query = $this->db->get_where('mark' , $verify_data);							 
							$marks	=	$query->result_array();
							foreach($marks as $row2):
							?>
                            <tr>
								
								<td style="text-align:center;">
									 <?php echo $row2['mark_obtained'];?>
												
								</td>
								<td style="width:200px;">
									<?php echo $row2['comment'];?>
								</td>
							 </tr>
                         	<?php 
							endforeach;
						 endforeach;
						 
						 ?>
                     </tbody>
                  </table>
            
				
				</div>

			</div>
			
		</div>	
	
	</div>
</div>