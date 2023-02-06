<div class="panel panel-gradient">
<div class="panel-heading">
<div class="panel-title">
Study Materials </div>
</div>
<div class="table-responsive">
<table class="table table-bordered table-striped datatable" id="table-2">
<thead>
<tr>
<th>#</th>
<th>date</th>
<th>title</th>
<th>description</th>
<th>class</th>
<th>Download</th>
</tr>
</thead>
<tbody>
<?php $i=0;foreach ($documents as $row) { ?>
<tr>
<td><?php echo $i++;?></td>
<td><?php echo date("jS F, Y", strtotime($row['timestamp']));?></td>
<td><?php echo $row['title'];?></td>
<td><?php echo $row['description'];?></td>
<td><?php echo $this->crud_model->get_class_name($row['class_id']);?> </td>
<td>
<a href="<?php echo base_url()?>uploads/document/<?php echo $row['file_name'];?>" class="btn btn-blue btn-icon icon-left">
<i class="entypo-download"></i>
Download
</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>