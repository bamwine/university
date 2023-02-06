<div class="panel panel-gradient">
<div class="panel-heading">
<div class="panel-title">
Expenses Information Page </div>
</div>
<div class="table-responsive">
<br>
&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:;" onclick="showAjaxModal('index.php?modal/popup/expense_add/');" class="btn btn-primary ">
<i class="entypo-plus-circled"></i>
Add New Expense</a>
<br><br>
<div id="table_export_wrapper" class="dataTables_wrapper form-inline" role="grid">

<table class="table table-bordered datatable dataTable" id="table_export" aria-describedby="table_export_info">

<thead>
<tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 24px;"><div>#</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-label="title: activate to sort column ascending" style="width: 310px;"><div>title</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 177px;"><div>Category</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-label="Method: activate to sort column ascending" style="width: 78px;"><div>Method</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-label="amount: activate to sort column ascending" style="width: 80px;"><div>amount</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-label="date: activate to sort column ascending" style="width: 115px;"><div>date</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-label="options: activate to sort column ascending" style="width: 116px;"><div>options</div></th></tr>
</thead>

<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php 
$i=1;
$examsd = $this->db->get('payment')->result_array();
foreach($examsd as $row):
?>

<tr class="odd">
<td class=" sorting_1"><?php echo $i++;?></td>
<td class=" "><?php echo $row['title'];?></td>
<td class=" "><?php if($row['expense_category_id'] == 0){echo 'N/A';} echo $this->crud_model->get_type_name_by_id('expense_category',$row['expense_category_id']);?> </td>
<td class=" "><?php if($row['method'] == 1){echo 'Cash';} else if($row['method'] == 2){echo 'Check';}else if($row['method'] == 3){echo 'Card';}?> </td>
<td class=" "><?php echo $row['amount'];?></td>
<td class=" "> <?php echo  date("jS F, Y", strtotime($row['timestamp']))?></td>
<td class=" ">
<div class="btn-group">
<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
Action <span class="caret"></span>
</button>
<ul class="dropdown-menu dropdown-default pull-right" role="menu">

<li>
<a href="#" onclick="showAjaxModal('index.php?modal/popup/expense_edit/<?php echo $row['payment_id'];?>');">
<i class="entypo-pencil"></i>
edit </a>
</li>
<li class="divider"></li>

<li>
<a href="#" onclick="confirm_modal('index.php?admin/expense/delete/<?php echo $row['payment_id'];?>');">
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
</tbody></table>

</div>

</div>
</div>