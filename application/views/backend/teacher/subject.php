<div class="panel panel-success">
<div class="panel-heading">
<div class="panel-title">
SUBJECTS</div>
</div>
</br></br>

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
                    		<th><div><?php echo get_phrase('Courses');?></div></th>
                    		<th><div><?php echo get_phrase('course_unit_name');?></div></th>
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
                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?teacher/subject/delete/<?php echo $row['subject_id'];?>');">
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
                	<?php echo form_open(base_url() . 'index.php?teacher/subject/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>

							                            
<div class="form-group">
<label class="col-sm-3 control-label"><?php echo get_phrase('course_unit_name');?></label>

<div class="col-sm-9">
<div class="col-md-3">
 <input type="text" class="form-control" name="name"/>

</div>
<div class="col-md-3">
<select name="paper_no" class="form-control selectboxit visible" style="display: none;">
<option value="">None</option>
<option value="-one">one</option>
<option value="-two">two</option>
<option value="-three">three</option>
<option value="-four">four</option>
<option value="-five">five</option>
<option value="-six">six</option>
<option value="-seven">seven</option>

</select>

</div>

</div>

</div>
							
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('Courses');?></label>
                                <div class="col-sm-5">
                                    <select class="form-control select2" name="class_id">
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

