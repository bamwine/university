
<div class="row">
<div class="col-md-12">
<form action="index.php?admin/tabulation_sheet" method="post" accept-charset="utf-8">

<div class="row">
<div class="col-md-4">

<div class="col-md-12">
<div class="form-group">
<label class="col-sm-3 control-label">Course</label>
<select name="class_id" id="class_id" class="form-control selectboxit visible" style="display: none;" onchange="return get_class_subject(this.value)" required>
<option value=""><?php echo get_phrase('select');?></option>
                              <?php 
								$classes = $this->db->get('class')->result_array();
								foreach($classes as $row):
									?>
                            		<option value="<?php echo $row['class_id'];?>"
									 >
											<?php echo $row['name'];?>
											
                                            </option>
                                <?php
								endforeach;
							  ?>
</select>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label class="col-sm-6 control-label">Course unit</label>
<select name="subject_id" id="subject_id"  class="form-control "  onchange="return get_courseuint_periods(this.value)" required >
<option value="">Select Course First</option>
</select>
</div>
</div>

</div>


<div class="col-md-4">

<div class="col-md-12">
<div class="form-group">
<label class="col-sm-6 control-label">Year Of Study</label>
<select name="yos" id="yos" class="form-control " required>
<option value="">Select Course unit First</option>
</select>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label class="col-sm-6 control-label">Period Of Study</label>
<select name="tos" id="tos" class="form-control " required>
<option value=""><?php echo get_phrase('Select Course unit First');?></option>

</select>
</div>
</div>

</div>


<div class="col-md-4">

<div class="col-md-12">
<div class="form-group">
<label class="col-sm-6 control-label">Exam</label>
<select name="exam_id" class="form-control selectboxit visible" style="display: none;" required>
<option value=""><?php echo get_phrase('select');?></option>
                              <?php 
								$examsd = $this->db->get('exam')->result_array();
								foreach($examsd as $row):
									?>
                            		<option value="<?php echo $row['exam_id'];?>"
									<?php if($exam_id == $row['exam_id'])echo 'selected';?>>
											<?php echo $row['name'];?>
                                            </option>
                                <?php
								endforeach;
							  ?>
</select>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label class="col-sm-6 control-label">Academic Period</label>
<select name="acadmic_period" class="form-control selectboxit visible" style="display: none;" required>
<option value=""><?php echo get_phrase('select');?></option>
                              <?php 
								$classes = $this->db->get('session')->result_array();
								foreach($classes as $row):
									?>
                            		<option value="<?php echo $row['name'];?>"
									 >
											<?php echo $row['name'];?>
											
                                            </option>
                                <?php
								endforeach;
							  ?>
</select>
</div>
</div>

</div>

</div>

<!--    ends here        -->


<input type="hidden" name="operation" value="selection">
<div class="col-md-4">
<button type="submit" class="btn btn-success btn-sm btn-icon icon-left"> <i class="entypo-calendar"></i>View Tabulation Sheet</button>
</div>
</form>

</div>
</div>
<br>
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4" style="text-align: left;">
<div class="tile-stats tile-white tile-white-primary">
<h3>
Tabulation Sheet </h3>
<h4><?php echo $this->crud_model->get_type_name_by_id('class',$class_id);?></h4>
<!--h4><?php // echo $this->crud_model->get_type_name_by_id('exam',$exam_id);?></h4-->
<h4>Course Unit:&nbsp;&nbsp;&nbsp;<span><?php echo $this->crud_model->get_type_name_by_id('subject',$subject_id);?></span></h4>
<h4>Acadmic Period:&nbsp;&nbsp;&nbsp;<span><?php echo $acadmic_period;?></span></h4>
<h4>Period of study:&nbsp;&nbsp;&nbsp;<span><?php echo $tos;?></span></h4>
<h4>Year of study:&nbsp;&nbsp;&nbsp;<span><?php echo $yos;?></span></h4>
</div>
</div>
<div class="col-md-4"></div>
</div>
<hr>

<div class="row">
<?php  

// $students = $this->db->get_where('mark' , array('exam_id' =>$exam_id ,'class_id' =>$class_id, 'subject_id' =>$subject_id,'tos'=>$tos,'yos'=>$yos,'acadmic_period' =>$acadmic_period))->result_array();
// $getmark = $this->db->get_where('mark' , array('exam_id' =>1 ,'class_id' =>$class_id, 'subject_id' =>$subject_id,'tos'=>$tos,'yos'=>$yos,'acadmic_period' =>$acadmic_period))->row()->mark_obtained;
$this->db->group_by('student_id');
$students = $this->db->get_where('mark' , array('class_id' =>$class_id, 'subject_id' =>$subject_id,'tos'=>$tos,'yos'=>$yos,'acadmic_period' =>$acadmic_period))->result_array();
        
 if($students){
  ?>

<table  class="table table-bordered table-striped datatable" id="table-2">
<thead>
<tr>
<td>student</td>

<?php 
$this->db->order_by('exam_id', 'ASC');
$examsd = $this->db->get('exam')->result_array();
foreach($examsd as $row){
	?>
	<td><?php echo $row['name'];?></td>	
<?php
}
?>

<td>Action</td>
</tr>
</thead>
<tbody>




<?php foreach($students as $rowst){?>
<tr>
<td><?php echo $this->crud_model->get_type_name_by_id('student',$rowst['student_id']);?></td>


<?php 
$this->db->order_by('exam_id', 'ASC');
$examsd = $this->db->get('exam')->result_array();
foreach($examsd as $rowse){
	?>
<td>


<?php echo $this->db->get_where('mark' , array( 'student_id' =>$rowst['student_id'],'exam_id' =>$rowse['exam_id'],'class_id' =>$class_id, 'subject_id' =>$subject_id,'tos'=>$tos,'yos'=>$yos,'acadmic_period' =>$acadmic_period))->row()->mark_obtained;?>

</td>	
<?php
}
?>

<td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-blue btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-primary pull-right" role="menu">
                                    
                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/tabulation_complaint/<?php echo $class_id;?>/<?php echo $exam_id; ?>/<?php echo $subject_id;?>/<?php echo $tos;?>/<?php echo $yos;?>/<?php echo $acadmic_period;?>/<?php echo $rowst['student_id']; ?>">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                                    </li>
                                    
                                   
                                </ul>
                            </div>
        					</td>
                        


</tr>
 <?php }?>


</tbody>
</table>



<br>

  <?php } else{?>
  
  <br><br>
  <table class="table table-bordered">

<tbody>
<tr>
<td><h1>No Results found</h1></td>
</tr>

</tbody>
</table>
  
  <?php } ?>
  
  
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

<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">
    jQuery(window).load(function ()
    {
        var $ = jQuery;

        $("#table-2").dataTable({
            "sPaginationType": "bootstrap",
            "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>"
        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });

        // Highlighted rows
        $("#table-2 tbody input[type=checkbox]").each(function (i, el)
        {
            var $this = $(el),
                    $p = $this.closest('tr');

            $(el).on('change', function ()
            {
                var is_checked = $this.is(':checked');

                $p[is_checked ? 'addClass' : 'removeClass']('highlight');
            });
        });

        // Replace Checboxes
        $(".pagination a").click(function (ev)
        {
            replaceCheckboxes();
        });
    });
</script>