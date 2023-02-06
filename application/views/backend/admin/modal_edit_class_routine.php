<?php 
$edit_data		=	$this->db->get_where('class_routine' , array('class_routine_id' => $param2) )->result_array();
foreach ( $edit_data as $rowdata):
?>

<div class="tab-pane box active" id="edit" style="padding: 5px">
<div class="box-content">
<form action="<?php echo base_url();?>index.php?admin/class_routine/do_update/<?php $rowdata['class_routine_id']?>" class="form-horizontal validatable" target="_top" method="post" accept-charset="utf-8">
<div class="form-group">
<label class="col-sm-3 control-label">Course </label>
<div class="col-sm-5">
<select name="class_id" class="form-control  "  onchange="return get_class_subject(this.value)" required>
<option value=""><?php echo get_phrase('select');?></option>
<?php 
	$clas = $this->db->get('class')->result_array();
	foreach($clas as $row3):
		?>
		<option value="<?php echo $row3['class_id'];?>"
			<?php if($rowdata['class_id'] == $row3['class_id'])echo 'selected';?>>
					<?php echo $row3['name'];?>
				</option>
	<?php
	endforeach;
  ?>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Course unit</label>
<div class="col-sm-5">
<select name="subject_id" id="subject_id" class="form-control" required>
<?php //	$clas = $this->db->get('subject')->result_array();	foreach($clas as $row3){}		?>
		<option value="<?php echo $rowdata['subject_id'];?>"><?php echo $this->crud_model->get_subject_name_by_id($rowdata['subject_id']);?>			
		</option>

</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-3 control-label">Year Of Study</label>
<div class="col-sm-5">
<select name="yos" id="yos" class="form-control selectboxit visible" style="display: none;" required>

<?php // for($k=1;$k<$this->crud_model->get_course_years($rowdata['class_id'])+1;$k++) {}?> 

<option value="<?php echo $rowdata['yos'];?>"> <?php echo $rowdata['yos'];?>
</option>

</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-3 control-label">Period Of Study</label>
<div class="col-sm-5">
<select name="tos" id="tos" class="form-control selectboxit visible" style="display: none;" required>

<?php // for($k=1;$k<$this->crud_model->get_course_years($rowdata['class_id'])+1;$k++) { }?> 

<option value="<?php echo $rowdata['tos'];?>"> <?php echo $rowdata['tos'];?>
					
</option>

</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">day</label>
<div class="col-sm-5">
<select name="day" class="form-control selectboxit visible" style="display: none;">
<option value="saturday" <?php if($rowdata['day'] == 'saturday')echo 'selected';?>>saturday</option>
<option value="sunday" <?php if($rowdata['day'] == 'sunday')echo 'selected';?>>sunday</option>
<option value="monday" <?php if($rowdata['day'] == 'monday')echo 'selected';?>>monday</option>
<option value="tuesday" <?php if($rowdata['day'] == 'tuesday')echo 'selected';?>>tuesday</option>
<option value="wednesday" <?php if($rowdata['day'] == 'wednesday')echo 'selected';?>>wednesday</option>
<option value="thursday" <?php if($rowdata['day'] == 'thursday')echo 'selected';?>>thursday</option>
<option value="friday" <?php if($rowdata['day'] == 'friday')echo 'selected';?>>friday</option>
</select>

</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">starting time</label>
<div class="col-sm-9">
<div class="col-md-3">
<select name="time_start" class="form-control">
<option value="">Hour</option>
<option value="0" <?php if($rowdata['time_start'] == 0)echo 'selected';?>>0</option>
<option value="1" <?php if($rowdata['time_start'] == 1)echo 'selected';?>>1</option>
<option value="2" <?php if($rowdata['time_start'] == 2)echo 'selected';?>>2</option>
<option value="3" <?php if($rowdata['time_start'] == 3)echo 'selected';?>>3</option>
<option value="4" <?php if($rowdata['time_start'] == 4)echo 'selected';?>>4</option>
<option value="5" <?php if($rowdata['time_start'] == 5)echo 'selected';?>>5</option>
<option value="6" <?php if($rowdata['time_start'] == 6)echo 'selected';?>>6</option>
<option value="7" <?php if($rowdata['time_start'] == 7)echo 'selected';?>>7</option>
<option value="8" <?php if($rowdata['time_start'] == 8)echo 'selected';?>>8</option>
<option value="9" <?php if($rowdata['time_start'] == 9)echo 'selected';?>>9</option>
<option value="10" <?php if($rowdata['time_start'] == 10)echo 'selected';?>>10</option>
<option value="11" <?php if($rowdata['time_start'] == 11)echo 'selected';?>>11</option>
<option value="12" <?php if($rowdata['time_start'] == 12)echo 'selected';?>>12</option>
</select>
</div>
<div class="col-md-3">
<select name="time_start_min" class="form-control">
<option value="">Minutes</option>
<option value="0" <?php if($rowdata['time_start_min'] == 0)echo 'selected';?>>0</option>
<option value="5" <?php if($rowdata['time_start_min'] == 5)echo 'selected';?>>5</option>
<option value="10" <?php if($rowdata['time_start_min'] == 10)echo 'selected';?>>10</option>
<option value="15" <?php if($rowdata['time_start_min'] == 15)echo 'selected';?>>15</option>
<option value="20" <?php if($rowdata['time_start_min'] == 20)echo 'selected';?>>20</option>
<option value="25" <?php if($rowdata['time_start_min'] == 25)echo 'selected';?>>25</option>
<option value="30" <?php if($rowdata['time_start_min'] == 30)echo 'selected';?>>30</option>
<option value="35" <?php if($rowdata['time_start_min'] == 35)echo 'selected';?>>35</option>
<option value="40" <?php if($rowdata['time_start_min'] == 40)echo 'selected';?>>40</option>
<option value="45" <?php if($rowdata['time_start_min'] == 45)echo 'selected';?>>45</option>
<option value="50" <?php if($rowdata['time_start_min'] == 50)echo 'selected';?>>50</option>
<option value="55" <?php if($rowdata['time_start_min'] == 55)echo 'selected';?>>55</option>
</select>
</div>
<div class="col-md-3">
<select name="starting_ampm" class="form-control">
<option value="1" >am</option>
<option value="2">pm</option>
</select>
</div>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">ending time</label>
<div class="col-sm-9">
<div class="col-md-3">
<select name="time_end" class="form-control">
<option value="">Hour</option>
<option value="0" <?php if($rowdata['time_end'] == 0)echo 'selected';?>>0</option>
<option value="1" <?php if($rowdata['time_end'] == 1)echo 'selected';?>>1</option>
<option value="2" <?php if($rowdata['time_end'] == 2)echo 'selected';?>>2</option>
<option value="3" <?php if($rowdata['time_end'] == 3)echo 'selected';?>>3</option>
<option value="4" <?php if($rowdata['time_end'] == 4)echo 'selected';?>>4</option>
<option value="5" <?php if($rowdata['time_end'] == 5)echo 'selected';?>>5</option>
<option value="6" <?php if($rowdata['time_end'] == 6)echo 'selected';?>>6</option>
<option value="7" <?php if($rowdata['time_end'] == 7)echo 'selected';?>>7</option>
<option value="8" <?php if($rowdata['time_end'] == 8)echo 'selected';?>>8</option>
<option value="9" <?php if($rowdata['time_end'] == 9)echo 'selected';?>>9</option>
<option value="10" <?php if($rowdata['time_end'] == 10)echo 'selected';?>>10</option>
<option value="11" <?php if($rowdata['time_end'] == 11)echo 'selected';?>>11</option>
<option value="12" <?php if($rowdata['time_end'] == 12)echo 'selected';?>>12</option>
</select>
</div>
<div class="col-md-3">
<select name="time_end_min" class="form-control">
<option value="">Minutes</option>
<option value="0" <?php if($rowdata['time_end_min'] == 0)echo 'selected';?>>0</option>
<option value="5" <?php if($rowdata['time_end_min'] == 5)echo 'selected';?>>5</option>
<option value="10" <?php if($rowdata['time_end_min'] == 10)echo 'selected';?>>10</option>
<option value="15" <?php if($rowdata['time_end_min'] == 15)echo 'selected';?>>15</option>
<option value="20" <?php if($rowdata['time_end_min'] == 20)echo 'selected';?>>20</option>
<option value="25" <?php if($rowdata['time_end_min'] == 25)echo 'selected';?>>25</option>
<option value="30" <?php if($rowdata['time_end_min'] == 30)echo 'selected';?>>30</option>
<option value="35" <?php if($rowdata['time_end_min'] == 35)echo 'selected';?>>35</option>
<option value="40" <?php if($rowdata['time_end_min'] == 40)echo 'selected';?>>40</option>
<option value="45" <?php if($rowdata['time_end_min'] == 45)echo 'selected';?>>45</option>
<option value="50" <?php if($rowdata['time_end_min'] == 50)echo 'selected';?>>50</option>
<option value="55" <?php if($rowdata['time_end_min'] == 55)echo 'selected';?>>55</option>
</select>
</div>
<div class="col-md-3">
<select name="ending_ampm" class="form-control">
<option value="1">am</option>
<option value="2">pm</option>
</select>
</div>
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-3 col-sm-5">
<button type="submit" class="btn btn-info"> <?php echo get_phrase('edit_course_timetable');?></button>
</div>
</div>
</form>
</div>


</div>




<script type="text/javascript">
 $(function () {
        get_class_subject();
		get_courseuint_periods();
    });

    function get_class_subject(class_id) {
        $.ajax({
            url: 'index.php?admin/get_class_subject/' + class_id ,
            success: function(response)
            {
                jQuery('#subject_id').html(response);
				get_courseuint_periods();
            }
        });
    }




	function get_courseuint_periods() {

	
	var classid = $('#subject_id').val();
	//alert(classid);
    	$.ajax({
			type:'POST',
            url: '<?php echo base_url();?>index.php?admin/get_courseuint_periods/' ,
			data:{'subjectid':classid,'names':'yos'},			
            async: false,
            success: function(response)
            {
                jQuery('#yos').html(response);
				//$('#yos').val(response);
            }
        });
		
		
		$.ajax({
			type:'POST',
            url: '<?php echo base_url();?>index.php?admin/get_courseuint_periods/' ,
			data:{'subjectid':classid,'names':'tos'},			
            async: false,
            success: function(response)
            {
                jQuery('#tos').html(response);
				//$('#tos').val(response); for input textfield
            }
        });

    }
	
</script>

<?php
endforeach;
?>




