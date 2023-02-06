<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('grade_list');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_grade');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------>
        
		<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
				<!--center>

<?php //echo form_open(base_url() . 'index.php?admin/grade' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data', 'method' => 'post'));?>

	
<table border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
<tbody><tr>
<td>select Level</td>

<td>&nbsp;</td>
</tr>
<tr>
<td>
<select name="grade_point" class="form-control" style="float:left;">
<option value=""><?php //echo get_phrase('select');?></option>
<option value="o">Degree</option>
<option value="a">Diploma</option>
<option value="m">Masters</option>
<option value="dr">PhD</option>
</select>
</td>


<td>
<input type="hidden" name="operation" value="selection">
<button type="submit" class="btn btn-success btn-sm btn-icon icon-left"> <i class="entypo-check"></i>Check Grade</button>
</td>
</tr>
</tbody></table>
</form>

</center-->

<br><br>

<form action="index.php?admin/grade" method="post" accept-charset="utf-8">
                <table class="table table-bordered datatable" id="table_export">
                	<thead>
                		<tr>
                    		<!--th width="80"><div><?php echo get_phrase('Aggregate');?></div></th-->                            
                            <th><div><?php echo get_phrase('Grade');?></div></th>
							<th><div><?php echo get_phrase('Mark From ');?></div></th>
							<th><div><?php echo get_phrase('Mark To ');?></div></th>
                            <th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
					



                    	<?php $count = 1;foreach($grades as $row):?>
                        <tr>
							<!--td><input value="<?php echo $row['name'];?>" type="text" name="aggregate_<?php echo $row['grade_id'];?>" class="form-control" /></td-->
							<td><select name="comment_<?php echo $row['grade_id'];?>" class="form-control " style="width:100%;">
	
		<option value="A+" <?php if($row['comment'] =='A+'){echo 'selected';}?>>A+</option>
		<option value="A" <?php if($row['comment'] =='A'){echo 'selected';}?>>A</option>
		<option value="B+" <?php if($row['comment'] =='B+'){echo 'selected';}?>>B+</option>
		<option value="B" <?php if($row['comment'] =='B'){echo 'selected';}?>>B</option>
		<option value="C+" <?php if($row['comment'] =='C+'){echo 'selected';}?>>C+</option>
		<option value="C" <?php if($row['comment'] =='C'){echo 'selected';}?>>C</option>
		<option value="D+" <?php if($row['comment'] =='D+'){echo 'selected';}?>>D+</option>											
		<option value="D" <?php if($row['comment'] =='D'){echo 'selected';}?>>D</option>																						
		<option value="F" <?php if($row['comment'] =='F'){echo 'selected';}?>>Fail</option>
		
			
</select></td>
							<td><input value="<?php echo $row['mark_from'];?>" type="text" name="mark_from_<?php echo $row['grade_id'];?>" class="form-control" /></td>
							<td><input value="<?php echo $row['mark_upto'];?>" type="text" name="mark_upto_<?php echo $row['grade_id'];?>" class="form-control" /></td>
							<input type="hidden" name="grade_id_<?php echo $row['grade_id'];?>" value="<?php echo $row['grade_id'];?>">
							<input type="hidden" name="grade_point2" value="<?php echo $row['grade_point'];?>">
							<input type="hidden" name="operation" value="update">
							<td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    
                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_grade/<?php echo $row['grade_id'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>
                                    
                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/grade/delete/<?php echo $row['grade_id'];?>');">
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
				
				<center>
<button type="submit" class="btn btn-success btn-sm btn-icon icon-left"> <i class="entypo-check"></i>Update Grades</button>
</center>

</form>
				
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<?php echo form_open(base_url() . 'index.php?admin/grade/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                        <div class="padded">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('From (Mark)');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="mark_from" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('To (Mark)');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="mark_upto"/>
                                </div>
                            </div>
                            <!--div class="form-group">
                                <label class="col-sm-3 control-label"><?php //echo get_phrase('Aggregate');?></label>
                                <div class="col-sm-5">
                                    <select name="aggregate" class="form-control select2" style="width:100%;">
                                    	
                                            <option value=""><?php //echo get_phrase('select');?></option>
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
                                    <select name="comment" class="form-control select2" style="width:100%;">
                                    	
                                            <option value=""><?php echo get_phrase('select');?></option>
                                    		<option value="A+">A+</option>
											<option value="A">A</option>
											<option value="B+">B+</option>
											<option value="B">B</option>
											<option value="C+">C+</option>
											<option value="C">C</option>
											<option value="D+">D+</option>											
											<option value="D">D</option>																						
											<option value="F">Fail</option>
											
                                    </select>
                                </div>
                            </div>
							 <!--div class="form-group">
                                <label class="col-sm-3 control-label"><?php //echo get_phrase('Level');?></label>
                                <div class="col-sm-5">
                                    <select name="grade_point" class="form-control select2" style="width:100%;">
                                    	
                                            <option value=""><?php //echo get_phrase('select');?></option>
                                    		<option value="o">O-level</option>
											<option value="a">A-level</option>
                                       
                                    </select>
                                </div>
                            </div-->
							
                        </div>
                        <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo get_phrase('add_grade');?></button>
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
						"mColumns": [1,4]
					},
					{
						"sExtends": "pdf",
						"mColumns": [1,4]
					},
					{
						"sExtends": "print",
						"fnSetText"	   : "Press 'esc' to return",
						"fnClick": function (nButton, oConfig) {
							datatable.fnSetColumnVis(0, false);
							datatable.fnSetColumnVis(3, false);
							
							this.fnPrint( true, oConfig );
							
							window.print();
							
							$(window).keyup(function(e) {
								  if (e.which == 27) {
									  datatable.fnSetColumnVis(0, true);
									  datatable.fnSetColumnVis(3, true);
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

