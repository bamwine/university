<div class="panel panel-gradient">
<div class="panel-heading">
<div class="panel-title">
All Invoice </div>
</div>
<div class="tab-pane active" id="unpaid">
<div id="table-2_wrapper" class="dataTables_wrapper form-inline" role="grid">


<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered datatable" id="table_export">


<thead>
<tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 32px;">#</th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="student: activate to sort column ascending" style="width: 75px;"><div>student</div></th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="title: activate to sort column ascending" style="width: 111px;"><div>title</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="description: activate to sort column ascending" style="width: 111px;"><div>description</div></th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Total: activate to sort column ascending" style="width: 63px;"><div>Total</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="paid: activate to sort column ascending" style="width: 63px;"><div>paid</div></th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="date: activate to sort column ascending" style="width: 117px;"><div>date</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Payment Status: activate to sort column ascending" style="width: 150px;"><div>Payment Status</div></th>

</tr>
</thead>

<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php  $i=1; foreach($invoices as $row):?>
<tr class="odd">
<td class=" sorting_1"><?php echo $i++;?></td>
<td class=" "> <?php echo $this->crud_model->get_type_name_by_id('student',$row['student_id']);?></td>
<td class=" "><?php echo $row['title']?></td>
<td class=" "><?php echo $row['description']?></td>
<td class=" "><?php echo $row['amount']?></td>
<td class=" "><?php echo $row['amount_paid']?></td> 
<td class=" "><?php echo date("jS F, Y", strtotime($row['creation_timestamp']));?></td>
<td class=" ">
<span class="label label-danger"><?php echo $row['status']?></span>
</td>

</tr>
<?php endforeach;?>
</tbody></table>

</div>

</div>

</div>