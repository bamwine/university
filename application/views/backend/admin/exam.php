<div class="panel panel-gradient">
<div class="panel-heading">
<div class="panel-title">
Exam Information Page </div>
</div>
<div class="table-responsive">

<ul class="nav nav-tabs bordered">
<li class="active">
<a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
exam list </a></li>
<li>
<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
add exam </a></li>
</ul>

<div class="tab-content">

<div class="tab-pane box active" id="list">

<table class="table table-bordered datatable dataTable" id="table_export" aria-describedby="table_export_info">
<thead>
<tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="exam name: activate to sort column descending" style="width: 136px;"><div>exam name</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-label="date: activate to sort column ascending" style="width: 127px;"><div>date</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-label="comment: activate to sort column ascending" style="width: 527px;"><div>comment</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-label="options: activate to sort column ascending" style="width: 132px;"><div>options</div></th></tr>
</thead>

<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php foreach($exams as $row):?>
<tr class="odd">
<td class=" sorting_1"><?php echo $row['name'];?></td>
<td class=" "><?php echo $row['date'];?></td>
<td class=" "><?php echo $row['comment'];?></td>
<td class=" ">
<div class="btn-group">
<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
Action <span class="caret"></span>
</button>
<ul class="dropdown-menu dropdown-default pull-right" role="menu">

<li>
<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_exam/<?php echo $row['exam_id'];?>');">
<i class="entypo-pencil"></i>
edit </a>
</li>
<li class="divider"></li>

<li>
<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/exam/delete/<?php echo $row['exam_id'];?>');">
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


<div class="tab-pane box" id="add" style="padding: 5px">
<div class="box-content">
<form action="index.php?admin/exam/create" class="form-horizontal form-groups-bordered validate" target="_top" method="post" accept-charset="utf-8" novalidate="novalidate">
<div class="form-group">
<label class="col-sm-3 control-label">name</label>
<div class="col-sm-5">
<input type="text" class="form-control" name="name" data-validate="required" data-message-required="Value Required">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">date</label>
<div class="col-sm-5">
<input type="text" class="datepicker form-control" name="date" required="">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">comment</label>
<div class="col-sm-5">
<input type="text" class="form-control" name="comment">
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-3 col-sm-5">
<button type="submit" class="btn btn-info">add exam</button>
</div>
</div>
</form>
</div>
</div>

</div>
</div>
</div>