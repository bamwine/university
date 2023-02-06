
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('Add');?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open(base_url() . 'index.php?admin/priority/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('Courses');?></label>
                        <div class="col-sm-5">
                            <select name="class_id" class="form-control" onchange="show_subjects(this.value)">
                                <option value=""><?php echo get_phrase('select');?></option>
                                <?php 
                                $teachers = $this->db->get('class')->result_array();
                                foreach($teachers as $row2):
                                ?>
             <option value="<?php echo $row2['class_id'];?>"  >  <?php echo $row2['name'];?>
                                                </option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
					
					
					 <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('Course units');?></label>
                        <div class="col-sm-5">
                            <select name="subject_id" class="form-control" id="subject_id_2">
                               
                            </select>
                        </div>
                    </div>
					<li><p><b> If a student gets aggregate in</b></p></li>
					<div class="col-sm-9">
<div class="col-md-3">
<select name="aggregate_obt" class="form-control selectboxit visible" style="display: none;">
<option value="">aggregate</option>
<option value="9">9</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
</select>

</div>
<div class="col-md-1"> from grade</div>
<div class="col-md-3">
<select name="fromDiv" class="form-control selectboxit visible" style="display: none;">
<option value="">grade</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">Ungraded</option>

</select>
</div>
<div class="col-md-1">To</div>
<div class="col-md-3">
<select name="toDiv" class="form-control selectboxit visible" style="display: none;">
<option value="">grade</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">Ungraded</option>
</select>

</div>
</div>
</br></br>
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('add');?></button>
						</div>
					</div>
        		</form>
            </div>
        </div>
    </div>
	
	
	
<div class="tab-pane box active" id="list">

<table class="table table-bordered datatable dataTable" id="table_export" aria-describedby="table_export_info">
<thead>
<tr role="row">
<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="exam name: activate to sort column descending" style="width: 136px;">
<div>Condition</div></th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-label="date: activate to sort column ascending" style="width: 127px;"><div>Subject</div></th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-label="comment: activate to sort column ascending" style="width: 527px;"><div>comment</div></th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-label="options: activate to sort column ascending" style="width: 132px;">
<div>options</div></th></tr>
</thead>

<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php 
$edit_data	=	$this->db->get('priority_mark_rules')->result_array();
foreach($edit_data as $row):?>
<tr class="odd">
<th class=" sorting_1">IF GETS &nbsp;&nbsp;<b><?php echo $row['aggr_obtained'];?></b></th>
<th class=" "><?php echo $this->crud_model->get_type_name_by_id('subject',$row['subjectId']);?></th>
<th class=" "> HE/SHE GOES FROM GRADE <b><?php echo $row['fromDiv'];?></b> TO GRADE <b><?php echo $row['toDiv'];?></b></th>
<td class=" ">
<div class="btn-group">
<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
Action <span class="caret"></span>
</button>
<ul class="dropdown-menu dropdown-default pull-right" role="menu">


<li class="divider"></li>

<li>
<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/priority/delete/<?php echo $row['id'];?>');">
<i class="entypo-trash"></i>
delete </a>
</li>
</ul>
</div>
</td>
</tr>

  <?php endforeach;?>
</tbody>
</table>



</div>


	
</div>


<script type="text/javascript">
  function show_subjects(class_id)
  {
     
	  $.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_class_subject/' + class_id ,
            success: function(response)
            {
                jQuery('#subject_id_2').html(response);
            }
        });
  }

</script>

