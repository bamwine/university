<?php 
$edit_data		=	$this->db->get_where('subject' , array('subject_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_course_unit');?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open(base_url() . 'index.php?admin/subject/do_update/'.$row['subject_id'] , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
                
                	
	
					
	
					

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Course');?></label>
                        
						<div class="col-sm-5">
							<select name="course_id" id="course_id" class="form-control" data-validate="required"  
								data-message-required="<?php echo get_phrase('value_required');?>"
									onchange="return get_course_years(this.value)">
                              <option value=""><?php echo get_phrase('select');?></option>
                              <?php 
									$clas = $this->db->get('class')->result_array();
									foreach($clas as $row3):
										?>
                                		<option value="<?php echo $row3['class_id'];?>"
                                        	<?php if($row['class_id'] == $row3['class_id'])echo 'selected';?>>
													<?php echo $row3['name'];?>
                                                </option>
	                                <?php
									endforeach;
								  ?>
                          </select>
						</div> 
					</div>
					
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('course_unit_name');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="cuname" required value="<?php echo $row['name'];?>">
						</div>
					</div>
					
					

<div class="form-group">
<label class="col-sm-3 control-label"><?php echo get_phrase('course_unit_code');?></label>

<div class="col-sm-5">
 <input type="text" class="form-control" name="cucode" value="<?php echo $row['unit_code'];?>" required />
 </div>
 
</div>

<div class="form-group">
<label class="col-sm-3 control-label"><?php echo get_phrase('course_credit_unit');?></label>

<div class="col-sm-5">
 <input type="text" class="form-control" name="cucredit" value="<?php echo $row['credit_uints'];?>" required />
 </div>
 
</div>

 <div class="form-group">
	<label class="col-sm-3 control-label"><?php echo get_phrase('Year_of_study');?></label>
	<div class="col-sm-5">
		<select class="form-control " name="cuyos" id="cuyos" required>
			<option value=""><?php echo get_phrase('select');?></option>
			<option value="1" <?php if ($row['yos'] == 1) echo 'selected';?> ><?php echo get_phrase('1');?></option>						
			<option value="2" <?php if ($row['yos'] == 2) echo 'selected';?>><?php echo get_phrase('2');?></option>						
			<option value="3" <?php if ($row['yos'] == 3) echo 'selected';?>><?php echo get_phrase('3');?></option>						
			<option value="4" <?php if ($row['yos'] == 4) echo 'selected';?>><?php echo get_phrase('4');?></option>						
			<option value="5" <?php if ($row['yos'] == 5) echo 'selected';?>><?php echo get_phrase('5');?></option>						
		</select>
	</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label"><?php echo get_phrase('Term_of_study');?></label>

<div class="col-sm-5">
 <!--input type="text" class="form-control" name="cutos" value="<?php //echo $row['tos'];?> " required /-->
   <select name="cutos" class="form-control ">
  
<?php 
	$clas = $this->db->get('sessionp')->result_array();
	foreach($clas as $row2){
		?>
		<option value="<?php echo $row2['name'];?>"
			<?php if($row['tos'] == $row2['name'])echo 'selected';?>>
					<?php echo $row2['name'];?>
				</option>
	<?php
	}
  ?>
  
 </select>
 </div>
 
</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Lecturer');?></label>
                        
						<div class="col-sm-5">
							<select name="teacher_id" class="form-control" required	>
                              <option value=""><?php echo get_phrase('select');?></option>
                              <?php 
									$classes = $this->db->get('teacher')->result_array();
									foreach($classes as $row2):
										?>
                                		<option value="<?php echo $row2['teacher_id'];?>"
                                        	<?php if($row['teacher_id'] == $row2['teacher_id'])echo 'selected';?>>
													<?php echo $row2['name'];?>
                                                </option>
	                                <?php
									endforeach;
								  ?>
                          </select>
						</div> 
					</div>


                    
                    <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('edit_course_unit');?></button>
						</div>
					</div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>


<script type="text/javascript">

 $(function () {
        
		get_course_years();
    });

	function get_course_years(class_id) {

    	$.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_course_yearsedit/' + class_id ,
            success: function(response)
            {
                jQuery('#cuyos').html(response);
            }
        });

    }
	
</script>