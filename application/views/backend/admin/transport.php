
<div class="panel panel-gradient">
<div class="panel-heading">
<div class="panel-title">
Transport Information Page </div>
</div>
<div class="table-responsive">

<ul class="nav nav-tabs bordered">
<li class="active">
<a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
transport list </a></li>
<li>
<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
add transport </a></li>
</ul>

<div class="tab-content">

<div class="tab-pane box active" id="list">
<div id="table_export_wrapper" class="dataTables_wrapper form-inline" role="grid">


<table class="table table-bordered datatable dataTable" id="table_export" aria-describedby="table_export_info">

<thead>
<tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="route name: activate to sort column descending" style="width: 162px;"><div>route name</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-label="number of vehicle: activate to sort column ascending" style="width: 242px;"><div>number of vehicle</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-label="description: activate to sort column ascending" style="width: 196px;"><div>description</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-label="route fare: activate to sort column ascending" style="width: 143px;"><div>route fare</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-label="options: activate to sort column ascending" style="width: 161px;"><div>options</div></th></tr>
</thead>

<tbody role="alert" aria-live="polite" aria-relevant="all">

<?php 

foreach($transports as $row):
?>
<tr class="odd">
<td class=" sorting_1"><?php echo $row['route_name'];?></td>
<td class=" "><?php echo $row['number_of_vehicle'];?></td>
<td class=" "><?php echo $row['description'];?></td>
<td class=" "><?php echo $row['route_fare'];?></td>
<td class=" ">
<div class="btn-group">
<button type="button" class="btn btn-blue btn-sm dropdown-toggle" data-toggle="dropdown">
Action <span class="caret"></span>
</button>
<ul class="dropdown-menu dropdown-primary pull-right" role="menu">

<li>
<a href="#" onclick="showAjaxModal('index.php?modal/popup/modal_transport_student/<?php echo $row['transport_id'];?>');">
<i class="entypo-users"></i>
Students </a>
</li>
<li class="divider"></li>

<li>
<a href="#" onclick="showAjaxModal('index.php?modal/popup/modal_edit_transport/<?php echo $row['transport_id'];?>');">
<i class="entypo-pencil"></i>
edit </a>
 </li>
<li class="divider"></li>

<li>
<a href="#" onclick="confirm_modal('index.php?admin/transport/delete/<?php echo $row['transport_id'];?>');">
<i class="entypo-trash"></i>
delete </a>
</li>
</ul>
</div>
</td>
</tr>
<?php
endforeach;
?>
</tbody>
</table>



</div>

</div>


<div class="tab-pane box" id="add" style="padding: 5px">
<div class="box-content">
<form action="index.php?admin/transport/create" class="form-horizontal form-groups-bordered validate" target="_top" method="post" accept-charset="utf-8" novalidate="novalidate">
<div class="form-group">
<label class="col-sm-3 control-label">route name</label>
<div class="col-sm-5">
<input type="text" class="form-control" name="route_name">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">number of vehicle</label>
<div class="col-sm-5">
<input type="text" class="form-control" name="number_of_vehicle">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">description</label>
<div class="col-sm-5">
<input type="text" class="form-control" name="description">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">route fare</label>
<div class="col-sm-5">
<input type="text" class="form-control" name="route_fare">
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-3 col-sm-5">
<button type="submit" class="btn btn-success btn-sm btn-icon icon-left"><i class="entypo-location"></i>add transport</button>
</div>
</div>
</form>
</div>
</div>

</div>
</div>
</div>
