<div class="panel panel-gradient">
<div class="panel-heading">
<div class="panel-title">
Income Information Page </div>
</div>
<div class="table-responsive">
<ul class="nav nav-tabs bordered">
<li class="active">
<a href="#unpaid" data-toggle="tab">
<span class="hidden-xs">Unpaid Invoices</span>
</a>
</li>
<li class="">
<a href="#paid" data-toggle="tab">
<span class="hidden-xs">Payment History</span>
</a>
</li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="unpaid">
<div id="table-2_wrapper" class="dataTables_wrapper form-inline" role="grid">


<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered datatable" id="table_export">


<thead>
<tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 32px;">#</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="student: activate to sort column ascending" style="width: 75px;"><div>student</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="title: activate to sort column ascending" style="width: 111px;"><div>title</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="description: activate to sort column ascending" style="width: 111px;"><div>description</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Total: activate to sort column ascending" style="width: 63px;"><div>Total</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="paid: activate to sort column ascending" style="width: 63px;"><div>paid</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="date: activate to sort column ascending" style="width: 117px;"><div>date</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="Payment Status: activate to sort column ascending" style="width: 150px;"><div>Payment Status</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="options: activate to sort column ascending" style="width: 110px;"><div>options</div></th></tr>
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
<td class=" ">
<div class="btn-group">
<button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
Action <span class="caret"></span>
</button>
<ul class="dropdown-menu dropdown-primary pull-right" role="menu">

<li>
<a href="#" onclick="showAjaxModal('index.php?modal/popup/modal_view_invoice/<?php echo $row['invoice_id']?>');">
<i class="entypo-credit-card"></i>
view invoice </a>
</li>
<li class="divider"></li>

<li>
<a href="#" onclick="showAjaxModal('index.php?modal/popup/modal_edit_invoice/<?php echo $row['invoice_id']?>');">
<i class="entypo-pencil"></i>
edit </a>
</li>
<li class="divider"></li>

<li>
<a href="#" onclick="confirm_modal('index.php?admin/invoice/delete/<?php echo $row['invoice_id']?>');">
<i class="entypo-trash"></i>
delete </a>
</li>
</ul>
</div>
</td>
</tr>
<?php endforeach;?>
</tbody></table>

</div>

</div>



<div class="tab-pane" id="paid">
<table class="table table-bordered table-striped datatable" id="table-2">
<thead>
<tr>
<th><div>#</div></th>
<th><div>title</div></th>
<th><div>description</div></th>
<th><div>Method</div></th>
<th><div>amount</div></th>
<th><div>date</div></th>
<th></th>
</tr>
</thead>
<tbody>

<?php  $i=1;$parents = $this->db->get('payment')->result_array();
 foreach($parents as $row):?>
<tr>
<td><?php echo $i++?></td>
<td><?php echo $row['title']?></td>
<td><?php echo $row['description']?></td>
<td><?php if($row['method'] == '1'){echo 'Cash';} else if($row['method'] == '2'){echo 'Cheque';} else{echo 'Card';} ?> </td>
<td><?php echo $row['amount']?></td>
<td><?php echo date("jS F, Y", strtotime($row['timestamp'])); ?></td>
<td align="center">
<a href="#" onclick="showAjaxModal('index.php?modal/popup/modal_view_invoice/<?php echo $row['invoice_id']?>');" class="btn btn-primary">
view invoice </a>
</td>
</tr>

<?php endforeach;?>


</tbody>
</table>
</div>
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
                       "mColumns": [1,2,3,4,5,6,7]
                    },
                    {
                        "sExtends": "pdf",
                        "mColumns": [1,2,3,4,5,6,7]
                    },
                    {
                        "sExtends": "print",
                        "fnSetText"    : "Press 'esc' to return",
                        "fnClick": function (nButton, oConfig) {
                            datatable.fnSetColumnVis(6, false);
                            
                            this.fnPrint( true, oConfig );
                            
                            window.print();
                            
                            $(window).keyup(function(e) {
                                  if (e.which == 27) {
                                      datatable.fnSetColumnVis(6, true);
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

