<a 	class="btn btn-primary pull-right">
                <i class="entypo-user"></i>
            	<?php  $stut2 =  $this->crud_model->get_student_info($student_id);
				foreach ($stut2 as $food)
				echo $food['name'];
				?>
                </a> 
                <br><br>

<div class="panel panel-gradient">
<div class="panel-heading">
<div class="panel-title">
Class Routine Information Page </div>
</div>
<div class="table-responsive">

<ul class="nav nav-tabs bordered">
<li class="active">
<a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
class routine list </a></li>

</ul>

<div class="tab-content">

<div class="tab-pane active" id="list">


<?php 
$stut =  $this->crud_model->get_student_info($student_id);
foreach($stut as $srow)
$classes = $this->db->get_where('class', array('class_id' =>$srow['class_id']))->result_array();
foreach($classes as $row):
?>
<div class="panel-group joined" id="accordion-test-<?php echo $row['class_id'];?>">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion-test-<?php echo $row['class_id'];?>" href="#collapse<?php echo $row['class_id'];?>" class="collapsed">
<i class="entypo-rss"></i> Class <?php echo $row['name'];?> </a>
</h4>
</div>
<div id="collapse<?php echo $row['class_id'];?>" class="panel-collapse collapse" style="height: 0px;">
<div class="panel-body">
<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
<tbody>
<tr class="gradeA">
<td width="100">SUNDAY</td>
<td>

<?php 
$daydata = $this->db->get_where('class_routine' , array('class_id' =>$row['class_id'], 'day' =>'SUNDAY'))->result_array();
foreach($daydata as $rowdata):
?>
<div class="btn-group">
<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
<?php echo $this->crud_model->get_type_name_by_id('subject',$rowdata['subject_id']);?> 
(<?php echo $rowdata['time_start'] ?>:<?php echo $rowdata['time_start_min'] ?>-<?php echo $rowdata['time_end'] ?>:<?php echo $rowdata['time_end_min'] ?>) <span class="caret"></span>
</button>

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
$daydata = $this->db->get_where('class_routine' , array('class_id' =>$row['class_id'], 'day' =>'MONDAY'))->result_array();
foreach($daydata as $rowdata):
?>
<div class="btn-group">
<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
<?php echo $this->crud_model->get_type_name_by_id('subject',$rowdata['subject_id']);?> 
(<?php echo $rowdata['time_start'] ?>:<?php echo $rowdata['time_start_min'] ?>-<?php echo $rowdata['time_end'] ?>:<?php echo $rowdata['time_end_min'] ?>) <span class="caret"></span>
</button>

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
$daydata = $this->db->get_where('class_routine' , array('class_id' =>$row['class_id'], 'day' =>'TUESDAY'))->result_array();
foreach($daydata as $rowdata):
?>
<div class="btn-group">
<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
<?php echo $this->crud_model->get_type_name_by_id('subject',$rowdata['subject_id']);?> 
(<?php echo $rowdata['time_start'] ?>:<?php echo $rowdata['time_start_min'] ?>-<?php echo $rowdata['time_end'] ?>:<?php echo $rowdata['time_end_min'] ?>) <span class="caret"></span>
</button>

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
$daydata = $this->db->get_where('class_routine' , array('class_id' =>$row['class_id'], 'day' =>'WEDNESDAY'))->result_array();
foreach($daydata as $rowdata):
?>
<div class="btn-group">
<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
<?php echo $this->crud_model->get_type_name_by_id('subject',$rowdata['subject_id']);?> 
(<?php echo $rowdata['time_start'] ?>:<?php echo $rowdata['time_start_min'] ?>-<?php echo $rowdata['time_end'] ?>:<?php echo $rowdata['time_end_min'] ?>) <span class="caret"></span>
</button>

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
$daydata = $this->db->get_where('class_routine' , array('class_id' =>$row['class_id'], 'day' =>'THURSDAY'))->result_array();
foreach($daydata as $rowdata):
?>
<div class="btn-group">
<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
<?php echo $this->crud_model->get_type_name_by_id('subject',$rowdata['subject_id']);?> 
(<?php echo $rowdata['time_start'] ?>:<?php echo $rowdata['time_start_min'] ?>-<?php echo $rowdata['time_end'] ?>:<?php echo $rowdata['time_end_min'] ?>) <span class="caret"></span>
</button>

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
$daydata = $this->db->get_where('class_routine' , array('class_id' =>$row['class_id'], 'day' =>'FRIDAY'))->result_array();
foreach($daydata as $rowdata):
?>
<div class="btn-group">
<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
<?php echo $this->crud_model->get_type_name_by_id('subject',$rowdata['subject_id']);?> 
(<?php echo $rowdata['time_start'] ?>:<?php echo $rowdata['time_start_min'] ?>-<?php echo $rowdata['time_end'] ?>:<?php echo $rowdata['time_end_min'] ?>) <span class="caret"></span>
</button>

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
$daydata = $this->db->get_where('class_routine' , array('class_id' =>$row['class_id'], 'day' =>'SATURDAY'))->result_array();
foreach($daydata as $rowdata):
?>
<div class="btn-group">
<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
<?php echo $this->crud_model->get_type_name_by_id('subject',$rowdata['subject_id']);?> 
(<?php echo $rowdata['time_start'] ?>:<?php echo $rowdata['time_start_min'] ?>-<?php echo $rowdata['time_end'] ?>:<?php echo $rowdata['time_end_min'] ?>) <span class="caret"></span>
</button>

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
</div>
</div>
</div>


</div>

<?php
endforeach;
?>
</div>



</div>
</div>
</div>
<script type="text/javascript">
    function get_class_subject(class_id) {
        $.ajax({
            url: 'index.php?admin/get_class_subject/' + class_id ,
            success: function(response)
            {
                jQuery('#subject_selection_holder').html(response);
            }
        });
    }
</script>
