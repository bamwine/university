<div class="panel panel-gradient">
<div class="panel-heading">
<div class="panel-title">
Study Material Information </div>
</div>
<div class="table-responsive">
<br>
&nbsp;&nbsp;&nbsp;&nbsp;<button onclick="showAjaxModal('index.php?modal/popup/modal_study_material_add');" class="btn btn-primary">
Add Study Material</button>
<div style="clear:both;"></div>
<br>
<table class="table table-bordered table-striped datatable" id="table-2">
<thead>
<tr>
<th>#</th>
<th>date</th>
<th>title</th>
<th>description</th>
<th>class</th>
<th>Download</th>
<th>options</th>
</tr>
</thead>
<tbody>
<?php $count = 1;foreach($study_material_info as $row){ ?>
<tr>
<td><?php echo $count++;?></td>
<td>19 Jul, 2017</td>
<td><?php echo $row['title'];?></td>
<td><?php echo $row['description'];?></td>
<td>
<?php echo $this->crud_model->get_class_name($row['class_id']) ;?> </td>
<td>
<a href="<?php echo base_url()?>uploads/document/<?php echo $row['file_name'];?>" class="btn btn-blue btn-icon icon-left">
<i class="entypo-download"></i>
Download
</a>
</td>
<td>
<a onclick="showAjaxModal('<?php echo base_url()?>index.php?modal/popup/modal_study_material_edit/<?php echo $row['document_id'];?>');" class="btn btn-default btn-sm btn-icon icon-left">
<i class="entypo-pencil"></i>
Edit
</a>
<a href="<?php echo base_url()?>index.php?teacher/study_material/delete/<?php echo $row['document_id'];?>" class="btn btn-danger btn-sm btn-icon icon-left" onclick="return confirm('Are you sure to delete?');">
<i class="entypo-cancel"></i>
Delete
</a>
</td>
</tr>
<?php }?>
</tbody>
</table>
</div>
</div>