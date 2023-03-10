<?php
$student_info	=	$this->crud_model->get_student_info($param2);
foreach($student_info as $row):?>

<div class="profile-env">
	
	<header class="row">
		
		<div class="col-sm-3">
			
			<a href="#" class="profile-picture">
				<img src="<?php echo $this->crud_model->get_image_url('student' , $row['student_id']);?>" 
                	class="img-responsive img-circle" />
			</a>
			
		</div>
		
		<div class="col-sm-9">
			
			<ul class="profile-info-sections">
				<li style="padding:0px; margin:0px;">
					<div class="profile-name">
							<h3><?php echo $row['name'];?></h3>
					</div>
				</li>
			</ul>
			
		</div>
		
		
	</header>
	
	<section class="profile-info-tabs">
		
		<div class="row">
			
			<div class="">
            		<br>
                <table class="table table-bordered">
                
                    <?php if($row['class_id'] != ''):?>
                    <tr>
                        <td><?php echo get_phrase('course');?></td>
                        <td><b><?php echo $this->crud_model->get_class_name($row['class_id']);?></b></td>
                    </tr>
                    <?php endif;?>

                    
                
                    <?php if($row['student_no'] != ''):?>
                    <tr>
                        <td> <?php echo get_phrase('Student_Number');?></td>
                        <td><b><?php echo $row['student_no'];?></b></td>
                    </tr>
                    <?php endif;?>
					
					
					<?php if($row['admit_date'] != ''):?>
                    <tr>
                        <td> <?php echo get_phrase('Admitted');?></td>
                        <td><b><?php echo date($row['admit_date']);?></b></td>
                    </tr>
                    <?php endif;?>
                
                    <?php if($row['birthday'] != ''):?>
                    <tr>
                        <td> <?php echo get_phrase('Birthday');?></td>
                        <td><b><?php echo $row['birthday'];?></b></td>
                    </tr>
                    <?php endif;?>
                
                    <?php if($row['sex'] != ''):?>
                    <tr>
                        <td><?php echo get_phrase('Gender');?></td>
                        <td><b><?php echo $row['sex'];?></b></td>
                    </tr>
                    <?php endif;?>
                
                
                    <?php if($row['phone'] != ''):?>
                    <tr>
                        <td><?php echo get_phrase('Phone');?></td>
                        <td><b><?php echo $row['phone'];?></b></td>
                    </tr>
                    <?php endif;?>
                
                    <?php if($row['email'] != ''):?>
                    <tr>
                        <td> <?php echo get_phrase('Email');?></td>
                        <td><b><?php echo $row['email'];?></b></td>
                    </tr>
                    <?php endif;?>
                
                    <?php if($row['address'] != ''):?>
                    <tr>
                        <td> <?php echo get_phrase('Address');?></td>
                        <td><b><?php echo $row['address'];?></b>
                        </td>
                    </tr>
                    <?php endif;?>
					
                    <?php if($row['parent_id'] != ''):?>
                    <tr>
                        <td> <?php echo get_phrase('Parent');?></td>
                        <td><b><?php echo $this->db->get_where('parent' , array('parent_id' => $row['parent_id']))->row()->name;?></b></td>
                    </tr>
                    <tr>
                        <td> <?php echo get_phrase('Parent Phone');?></td>
                        <td><b><?php echo $this->db->get_where('parent' , array('parent_id' => $row['parent_id']))->row()->phone;?></b></td>
                    </tr>
                    <?php endif;?>
                    
                </table>
			</div>
		</div>		
	</section>
	
	
	
</div>


<?php endforeach;?>