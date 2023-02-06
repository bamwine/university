

<div class="panel panel-gradient">
<div class="panel-heading">
<div class="panel-title">
<?php echo get_phrase('Time Table Information Page');?>
 </div>
</div>
<div class="table-responsive">

<ul class="nav nav-tabs bordered">
<li class="active">
<a href="#list" data-toggle="tab"><i class="entypo-menu"></i>

<?php echo get_phrase('Time Table list');?>
 </a></li>
<li class="">
<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
<?php echo get_phrase('add Course Time Table ');?>
</a></li>
</ul>

<div class="tab-content">

<div class="tab-pane active" id="list">


<?php 
$classes = $this->db->get('class')->result_array();
foreach($classes as $row):
?>
<div class="panel-group joined" id="accordion-test-<?php echo $row['class_id'];?>">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion-test-<?php echo $row['class_id'];?>" href="#collapse<?php echo $row['class_id'];?>" class="collapsed">
<i class="entypo-rss"></i> Course -- <?php echo $row['name'];?> </a>
</h4>
</div>
<div id="collapse<?php echo $row['class_id'];?>" class="panel-collapse collapse" style="height: 0px;">
<div class="panel-body">
<?php for($k=1;$k<$this->crud_model->get_course_years($row['class_id'])+1;$k++) {?> 

<div class="panel-heading">
<h4 class="panel-title">
<a>
<i class="entypo-rss"></i> YEAR --- <?php echo $k;?>  &nbsp;&nbsp;&nbsp; PERIOD OF STUDY &nbsp;&nbsp;&nbsp; : <?php echo $acadmic_term;?></a>
</h4>
</div>

<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
<tbody>
<tr class="gradeA">
<td width="100">SUNDAY</td>
<td>

<?php 
$daydata = $this->db->get_where('class_routine' , array('class_id' =>$row['class_id'],'yos' =>$k,'day' =>'SUNDAY'))->result_array();
foreach($daydata as $rowdata):
?>
<div class="btn-group">
<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
<?php echo $this->crud_model->get_type_name_by_id('subject',$rowdata['subject_id']);?> 
(<?php echo $rowdata['time_start'] ?>:<?php echo $rowdata['time_start_min'] ?>-<?php echo $rowdata['time_end'] ?>:<?php echo $rowdata['time_end_min'] ?>) <span class="caret"></span>
</button>
<ul class="dropdown-menu">
<li>
<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_class_routine/<?php echo $rowdata['class_routine_id']?>');">
<i class="entypo-pencil"></i>
edit </a>
</li>
<li>
<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/class_routine/delete/<?php echo $rowdata['class_routine_id']?>');">
<i class="entypo-trash"></i>
delete </a>
</li>
</ul>
</div>
<?php
endforeach;
?>
</td>
</tr>
<!--   sta-->
<tr class="gradeA">
<td width="100">MONDAY</td>


<td>

<?php 
$daydata = $this->db->get_where('class_routine' , array('class_id' =>$row['class_id'],'yos' =>$k, 'day' =>'MONDAY'))->result_array();
foreach($daydata as $rowdata):
?>
<div class="btn-group">
<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
<?php echo $this->crud_model->get_type_name_by_id('subject',$rowdata['subject_id']);?> 
(<?php echo $rowdata['time_start'] ?>:<?php echo $rowdata['time_start_min'] ?>-<?php echo $rowdata['time_end'] ?>:<?php echo $rowdata['time_end_min'] ?>) <span class="caret"></span>
</button>
<ul class="dropdown-menu">
<li>
<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_class_routine/<?php echo $rowdata['class_routine_id']?>');">
<i class="entypo-pencil"></i>
edit </a>
</li>
<li>
<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/class_routine/delete/<?php echo $rowdata['class_routine_id']?>');">
<i class="entypo-trash"></i>
delete </a>
</li>
</ul>
</div>
<?php
endforeach;
?>
</td>

</tr>

<!--   sta-->

<tr class="gradeA">
<td width="100">TUESDAY</td>
<td>

<?php 
$daydata = $this->db->get_where('class_routine' , array('class_id' =>$row['class_id'],'yos' =>$k, 'day' =>'TUESDAY'))->result_array();
foreach($daydata as $rowdata):
?>
<div class="btn-group">
<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
<?php echo $this->crud_model->get_type_name_by_id('subject',$rowdata['subject_id']);?> 
(<?php echo $rowdata['time_start'] ?>:<?php echo $rowdata['time_start_min'] ?>-<?php echo $rowdata['time_end'] ?>:<?php echo $rowdata['time_end_min'] ?>) <span class="caret"></span>
</button>
<ul class="dropdown-menu">
<li>
<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_class_routine/<?php echo $rowdata['class_routine_id']?>');">
<i class="entypo-pencil"></i>
edit </a>
</li>
<li>
<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/class_routine/delete/<?php  echo $rowdata['class_routine_id']?>');">
<i class="entypo-trash"></i>
delete </a>
</li>
</ul>
</div>
<?php
endforeach;
?>
</td>
</tr>
<tr class="gradeA">
<td width="100">WEDNESDAY</td>
<td>

<?php 
$daydata = $this->db->get_where('class_routine' , array('class_id' =>$row['class_id'],'yos' =>$k, 'day' =>'WEDNESDAY'))->result_array();
foreach($daydata as $rowdata):
?>
<div class="btn-group">
<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
<?php echo $this->crud_model->get_type_name_by_id('subject',$rowdata['subject_id']);?> 
(<?php echo $rowdata['time_start'] ?>:<?php echo $rowdata['time_start_min'] ?>-<?php echo $rowdata['time_end'] ?>:<?php echo $rowdata['time_end_min'] ?>) <span class="caret"></span>
</button>
<ul class="dropdown-menu">
<li>
<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_class_routine/<?php echo $rowdata['class_routine_id']?>');">
<i class="entypo-pencil"></i>
edit </a>
</li>
<li>
<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/class_routine/delete/<?php echo $rowdata['class_routine_id']?>');">
<i class="entypo-trash"></i>
delete </a>
</li>
</ul>
</div>
<?php
endforeach;
?>
</td>
</tr>
<tr class="gradeA">
<td width="100">THURSDAY</td>
<td>

<?php 
$daydata = $this->db->get_where('class_routine' , array('class_id' =>$row['class_id'],'yos' =>$k, 'day' =>'THURSDAY'))->result_array();
foreach($daydata as $rowdata):
?>
<div class="btn-group">
<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
<?php echo $this->crud_model->get_type_name_by_id('subject',$rowdata['subject_id']);?> 
(<?php echo $rowdata['time_start'] ?>:<?php echo $rowdata['time_start_min'] ?>-<?php echo $rowdata['time_end'] ?>:<?php echo $rowdata['time_end_min'] ?>) <span class="caret"></span>
</button>
<ul class="dropdown-menu">
<li>
<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_class_routine/<?php echo $rowdata['class_routine_id']?>');">
<i class="entypo-pencil"></i>
edit </a>
</li>
<li>
<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/class_routine/delete/<?php echo $rowdata['class_routine_id']?>');">
<i class="entypo-trash"></i>
delete </a>
</li>
</ul>
</div>
<?php
endforeach;
?>
</td>
</tr>
<tr class="gradeA">
<td width="100">FRIDAY</td>
<td>

<?php 
$daydata = $this->db->get_where('class_routine' , array('class_id' =>$row['class_id'],'yos' =>$k, 'day' =>'FRIDAY'))->result_array();
foreach($daydata as $rowdata):
?>
<div class="btn-group">
<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
<?php echo $this->crud_model->get_type_name_by_id('subject',$rowdata['subject_id']);?> 
(<?php echo $rowdata['time_start'] ?>:<?php echo $rowdata['time_start_min'] ?>-<?php echo $rowdata['time_end'] ?>:<?php echo $rowdata['time_end_min'] ?>) <span class="caret"></span>
</button>
<ul class="dropdown-menu">
<li>
<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_class_routine/<?php echo $rowdata['class_routine_id']?>');">
<i class="entypo-pencil"></i>
edit </a>
</li>
<li>
<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/class_routine/delete/<?php echo $rowdata['class_routine_id']?>');">
<i class="entypo-trash"></i>
delete </a>
</li>
</ul>
</div>
<?php
endforeach;
?>
</td>
</tr>
<tr class="gradeA">
<td width="100">SATURDAY</td>
<td>

<?php 
$daydata = $this->db->get_where('class_routine' , array('class_id' =>$row['class_id'],'yos' =>$k, 'day' =>'SATURDAY'))->result_array();
foreach($daydata as $rowdata):
?>
<div class="btn-group">
<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
<?php echo $this->crud_model->get_type_name_by_id('subject',$rowdata['subject_id']);?> 
(<?php echo $rowdata['time_start'] ?>:<?php echo $rowdata['time_start_min'] ?>-<?php echo $rowdata['time_end'] ?>:<?php echo $rowdata['time_end_min'] ?>) <span class="caret"></span>
</button>
<ul class="dropdown-menu">
<li>
<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_class_routine/<?php echo $rowdata['class_routine_id']?>');">
<i class="entypo-pencil"></i>
edit </a>
</li>
<li>
<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/class_routine/delete/<?php echo $rowdata['class_routine_id']?>');">
<i class="entypo-trash"></i>
delete </a>
</li>
</ul>
</div>
<?php
endforeach;
?>
</td>
</tr>
</tbody>
</table>


<?php } ?>
</div>
</div>
</div>


</div>

<?php
endforeach;
?>
</div>


<div class="tab-pane box" id="add" style="padding: 5px">
<div class="box-content">
<form action="index.php?admin/class_routine/create" class="form-horizontal form-groups-bordered validate" target="_top" method="post" accept-charset="utf-8" novalidate="novalidate">
<div class="form-group">
<label class="col-sm-3 control-label">Course</label>
<div class="col-sm-5">
<select name="class_id" class="form-control" style="width:100%;" onchange="return get_class_subject(this.value)" required>
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
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Course unit</label>
<div class="col-sm-5">
<select name="subject_id" id="subject_id" class="form-control" style="width:100%;" onchange="return get_courseuint_periods(this.value)" required>
<option value="">Select Course First</option>

</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-3 control-label">Year Of Study</label>
<div class="col-sm-5">
<select  name="yos" id="yos" class="form-control" style="width:100%;" required >
<option value="">Select Course unit First</option>
</select>

</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Period Of Study</label>
<div class="col-sm-5">
<select name="tos" id="tos" class="form-control" style="width:100%;" required >
<option value="">Select Course unit First</option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">day</label>
<div class="col-sm-5">
<select name="day" class="form-control selectboxit visible" style="width: 100%; display: none;">
<option value="sunday">sunday</option>
<option value="monday">monday</option>
<option value="tuesday">tuesday</option>
<option value="wednesday">wednesday</option>
<option value="thursday">thursday</option>
<option value="friday">friday</option>
<option value="saturday">saturday</option>
</select>

</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">starting time</label>

<div class="col-sm-9">
<div class="col-md-3">
<select name="time_start" class="form-control selectboxit visible" style="display: none;">
<option value="">Hour</option>
 <option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>

</div>
<div class="col-md-3">
<select name="time_start_min" class="form-control selectboxit visible" style="display: none;">
<option value="">Minutes</option>
<option value="0">0</option>
<option value="5">5</option>
<option value="10">10</option>
<option value="15">15</option>
<option value="20">20</option>
<option value="25">25</option>
<option value="30">30</option>
<option value="35">35</option>
<option value="40">40</option>
<option value="45">45</option>
<option value="50">50</option>
<option value="55">55</option>
</select>

</div>
<div class="col-md-3">
<select name="starting_ampm" class="form-control selectboxit visible" style="display: none;">
<option value="1">am</option>
<option value="2">pm</option>
</select>

</div>
</div>

</div>


<div class="form-group">
<label class="col-sm-3 control-label">ending time</label>
<div class="col-sm-9">
<div class="col-md-3">
<select name="time_end" class="form-control selectboxit visible" style="display: none;">
<option value="">Hour</option>
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>

</div>
<div class="col-md-3">
<select name="time_end_min" class="form-control selectboxit visible" style="display: none;">
<option value="">Minutes</option>
<option value="0">0</option>
<option value="5">5</option>
<option value="10">10</option>
<option value="15">15</option>
<option value="20">20</option>
<option value="25">25</option>
<option value="30">30</option>
<option value="35">35</option>
<option value="40">40</option>
<option value="45">45</option>
<option value="50">50</option>
<option value="55">55</option>
</select>

</div>
<div class="col-md-3">
<select name="ending_ampm" class="form-control selectboxit visible" style="display: none;">
 <option value="1">am</option>
<option value="2">pm</option>
</select>

</div>
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-3 col-sm-5">
<button type="submit" class="btn btn-success btn-sm btn-icon icon-left"><i class="fa fa-save"></i> <?php echo get_phrase('add_course_timetable');?></button>
</div>
</div>
</form>
</div>
</div>

</div>
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
