<?php 
$edit_data		=	$this->db->get_where('grade' , array('grade_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_grade');?>
            	</div>
            </div>
			<div class="panel-body">
				<?php echo form_open(base_url() . 'index.php?admin/grade/do_update/'.$row['grade_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                       
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('From (Mark)');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="mark_from" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="<?php echo $row['mark_from'];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('To (Mark)');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="mark_upto" value="<?php echo $row['mark_upto'];?>">
                                </div>
                            </div>
                            <!--div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('Aggregate');?></label>
                                <div class="col-sm-5">
                                    <select name="aggregate" class="form-control " style="width:100%;">
                                    	
                                            <option value=""><?php echo get_phrase('select');?></option>
											<option value="9">9</option>
											<option value="8">8</option>
											<option value="7">7</option>
											<option value="6">6</option>
											<option value="5">5</option>
											<option value="4">4</option>
											<option value="3">3</option>
											<option value="2">2</option>
											<option value="1">1</option>
                                    		
                                        
                                    </select>
                                </div>
                            </div-->
							 <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('Grade');?></label>
                                <div class="col-sm-5">
                                    <select name="comment" class="form-control " style="width:100%;">
                                    	
                                            <option value=""><?php echo get_phrase('select');?></option>
                                    		<option value="A+" <?php if($row['comment'] =='A+'){echo 'selected';}?>>A+</option>
		<option value="A" <?php if($row['comment'] =='A'){echo 'selected';}?>>A</option>
		<option value="B+" <?php if($row['comment'] =='B+'){echo 'selected';}?>>B+</option>
		<option value="B" <?php if($row['comment'] =='B'){echo 'selected';}?>>B</option>
		<option value="C+" <?php if($row['comment'] =='C+'){echo 'selected';}?>>C+</option>
		<option value="C" <?php if($row['comment'] =='C'){echo 'selected';}?>>C</option>
		<option value="D+" <?php if($row['comment'] =='D+'){echo 'selected';}?>>D+</option>											
		<option value="D" <?php if($row['comment'] =='D'){echo 'selected';}?>>D</option>																						
		<option value="F" <?php if($row['comment'] =='F'){echo 'selected';}?>>Fail</option>
											
                                    </select>
                                </div>
                            </div>
							 <!--div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('Level');?></label>
                                <div class="col-sm-5">
                                    <select name="grade_point" class="form-control " data-message-required="<?php echo get_phrase('value_required');?>" >
                                    	
                                            <option value=""><?php echo get_phrase('select');?></option>
                                    		<option value="o">O-level</option>
											<option value="a">A-level</option>
                                       
                                    </select>
                                </div>
                            </div-->
					
						
                        <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo get_phrase('edit_grade');?></button>
                              </div>
							</div>
                    </form> 
				
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>
