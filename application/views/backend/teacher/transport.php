
<div class="panel panel-primary">
<div class="panel-heading">
<div class="panel-title">
Transport Information Page </div>
</div>
<div class="table-responsive">

<ul class="nav nav-tabs bordered">
<li class="active">
<a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
transport list </a></li>

</ul>

<div class="tab-content">

<div class="tab-pane box active" id="list">
<div id="table_export_wrapper" class="dataTables_wrapper form-inline" role="grid">


<table class="table table-bordered datatable dataTable" id="table_export" aria-describedby="table_export_info">

<thead>
<tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="route name: activate to sort column descending" style="width: 162px;"><div>route name</div></th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-label="number of vehicle: activate to sort column ascending" style="width: 242px;"><div>number of vehicle</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-label="description: activate to sort column ascending" style="width: 196px;"><div>description</div></th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-label="route fare: activate to sort column ascending" style="width: 143px;"><div>route fare</div></th>
</tr>
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

</tr>
<?php
endforeach;
?>
</tbody>
</table>



</div>

</div>


</div>
</div>
</div>
