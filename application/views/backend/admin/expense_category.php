

<div class="panel panel-gradient">
<div class="panel-heading">
<div class="panel-title">
Expense Information Page </div>
</div>
<div class="table-responsive">
<br>
&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:;" onclick="showAjaxModal('index.php?modal/popup/expense_category_add/');" class="btn btn-primary ">
<i class="entypo-plus-circled"></i>
Add New Expense Category</a>
<br><br>
<div id="table_export_wrapper" class="dataTables_wrapper form-inline" role="grid">

<table class="table table-bordered datatable dataTable" id="table_export" aria-describedby="table_export_info">
<thead>
<tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 86px;"><div>#</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-label="name: activate to sort column ascending" style="width: 579px;"><div>name</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table_export" rowspan="1" colspan="1" aria-label="options: activate to sort column ascending" style="width: 307px;"><div>options</div></th></tr>
</thead>

<tbody role="alert" aria-live="polite" aria-relevant="all">

<?php 
		$i=1;		$classes = $this->db->get('expense_category')->result_array();
				foreach ($classes as $row):
			?>
<tr class="odd">
<td class=" sorting_1"><?php echo $i++;;?></td>
<td class=" "><?php echo $row['name'];?></td>
<td class=" ">
<div class="btn-group">
<button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
Action <span class="caret"></span>
</button>
<ul class="dropdown-menu dropdown-primary pull-right" role="menu">

<li>
<a href="#" onclick="showAjaxModal('index.php?modal/popup/expense_category_edit/<?php echo $row['expense_category_id'];?>');">
<i class="entypo-pencil"></i>
edit </a>
</li>
<li class="divider"></li>

<li>
<a href="#" onclick="confirm_modal('index.php?admin/expense_category/delete/<?php echo $row['expense_category_id'];?>');">
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
</div>

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
						"mColumns": [1]
					},
					{
						"sExtends": "pdf",
						"mColumns": [1]
					},
					{
						"sExtends": "print",
						"fnSetText"	   : "Press 'esc' to return",
						"fnClick": function (nButton, oConfig) {
							datatable.fnSetColumnVis(2, false);
							
							this.fnPrint( true, oConfig );
							
							window.print();
							
							$(window).keyup(function(e) {
								  if (e.which == 27) {
									  datatable.fnSetColumnVis(2, true);
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
