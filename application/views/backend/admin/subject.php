<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('Course units');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add Course unit');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------>
        
	
		<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered datatable" id="table_export">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('Course');?></div></th>
                    		<th><div><?php echo get_phrase('course_unit_name');?></div></th>
							<th><div><?php echo get_phrase('course_unit_code');?></div></th>
							<th><div><?php echo get_phrase('course_credit_units (CU)');?></div></th>
							<th><div><?php echo get_phrase('Year_of_study');?></div></th>
							<th><div><?php echo get_phrase('Term_of_study');?></div></th>
                    		<th><div><?php echo get_phrase('Lecturer');?></div></th>
                    		<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($subjects as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td>			
							<?php if ($row['class_id'] != '')
								echo $this->db->get_where('class' , array('class_id' => $row['class_id']))->row()->name;
							?>
							
							</td>
							<td class="span5"><?php echo $row['name'];?></td>
							<td class="span5"><?php echo $row['unit_code'];?></td>
							<td class="span5"><?php echo $row['credit_uints'];?></td>
							<td class="span5"><?php echo $row['yos'];?></td>
							<td class="span5"><?php echo $row['tos'];?></td>
							<td>							
							<?php if ($row['teacher_id'] != '')
											echo $this->db->get_where('teacher' , array('teacher_id' => $row['teacher_id']))->row()->name;
										?>
							</td>
							<td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    
                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_subject/<?php echo $row['subject_id'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>
                                    
                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/subject/delete/<?php echo $row['subject_id'];?>');">
                                            <i class="entypo-trash"></i>
                                                <?php echo get_phrase('delete');?>
                                            </a>
                                                    </li>
                                </ul>
                            </div>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<?php echo form_open(base_url() . 'index.php?admin/subject/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>

					 <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('Course');?></label>
                                <div class="col-sm-5">
                                    <select class="form-control select2" name="course_id" id="course_id" onchange="return get_course_years(this.value)" required >
                                        <option value=""><?php echo get_phrase('select');?></option>
                              <?php 
								$classes = $this->db->get('class')->result_array();
								foreach($classes as $row):
									?>
                            		<option value="<?php echo $row['class_id'];?>">
											<?php echo $row['name'];?>
                                            </option>
                                <?php
								endforeach;
							  ?>
									
									</select>
                                </div>
                            </div>
					
							                            
<div class="form-group">
<label class="col-sm-3 control-label"><?php echo get_phrase('course_unit_name');?></label>

<div class="col-sm-5">
 <input type="text" class="form-control" name="cuname" required />
 </div>
 
</div>


<div class="form-group">
<label class="col-sm-3 control-label"><?php echo get_phrase('course_unit_code');?></label>

<div class="col-sm-5">
 <input type="text" class="form-control" name="cucode" required />
 </div>
 
</div>

<div class="form-group">
<label class="col-sm-3 control-label"><?php echo get_phrase('course_credit_unit');?></label>

<div class="col-sm-5">
 <input type="number" class="form-control" name="cucredit" required />
 </div>
 
</div>

 <div class="form-group">
	<label class="col-sm-3 control-label"><?php echo get_phrase('Year_of_study');?></label>
	<div class="col-sm-5">
		<select class="form-control select2" name="cuyos" id="cuyos" required>
									
		</select>
	</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label"><?php echo get_phrase('Term_of_study');?></label>

<div class="col-sm-5">
  
   <select name="cutos" class="form-control select2">
                              <option value=""><?php echo get_phrase('select');?></option>
                              <?php 
								$session = $this->db->get('sessionp')->result_array();
								foreach($session as $row){
									?>                            		
									<option value="<?php echo $row['name'];?>">
                                	<?php echo $row['name'];?>
                                    </option>
									
								<?php
								}
							  ?>
                                
                          </select>
 </div>
 
</div>
							
                           
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('Lecturer');?></label>
                                <div class="col-sm-5">
                                    <select class="form-control select2" name="teacher_id">
                                        <option value=""><?php echo get_phrase('select');?></option>
                              <?php 
								$parents = $this->db->get('teacher')->result_array();
								foreach($parents as $row):
									?>
                            		<option value="<?php echo $row['teacher_id'];?>">
										<?php echo $row['name'];?>
                                    </option>
                                <?php
								endforeach;
							  ?>
									
									</select>
                                </div>
                            </div>

                             <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('add Course unit');?></button>
                            </div>
						</div>
                    </form>                
                </div>                
			</div>
			<!----CREATION FORM ENDS-->
            
		</div>
	</div>
</div>


<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">

    jQuery(document).ready(function($)
    {
        

        var datatable = $("#table_export").dataTable({
            "sPaginationType": "bootstrap",
            "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
            "oTableTools": {
                "aButtons": [
                    
                    {
                        "sExtends": "xls",
                        "mColumns": [1,2,3]
                    },
                    {
                        "sExtends": "pdf",
                        "mColumns": [1,2,3]
                    },
                    {
                        "sExtends": "print",
                        "fnSetText"    : "Press 'esc' to return",
                        "fnClick": function (nButton, oConfig) {
                            datatable.fnSetColumnVis(4, false);
                            
                            this.fnPrint( true, oConfig );
                            
                            window.print();
                            
                            $(window).keyup(function(e) {
                                  if (e.which == 27) {
                                      datatable.fnSetColumnVis(4, true);
                                  }
                            });
                        },
                        
                    },
                ]
            },
            
        });
        
        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });
        
</script>


<script type="text/javascript">

 $(function () {
        
		get_course_years();
    });

	function get_course_years(class_id) {

    	$.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_course_years/' + class_id ,
            success: function(response)
            {
                jQuery('#cuyos').html(response);
            }
        });

    }
	
</script>

