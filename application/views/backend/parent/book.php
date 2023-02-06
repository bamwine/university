
<div class="panel panel-gradient">
<div class="panel-heading">
<div class="panel-title">
Book Information Page </div>
</div>
<div class="table-responsive">

<ul class="nav nav-tabs bordered">
<li class="active">
<a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
book list </a></li>

</ul>

<div class="tab-content">

<div class="tab-pane box active" id="list">
<div id="table-2_wrapper" class="dataTables_wrapper form-inline" role="grid">

 
 <table class="table table-bordered table-striped datatable dataTable" id="table-2" aria-describedby="table-2_info">

 <thead>
<tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 13px;"><div>#</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="book name: activate to sort column ascending" style="width: 82px;"><div>book name</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="author: activate to sort column ascending" style="width: 229px;"><div>author</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="description: activate to sort column ascending" style="width: 218px;"><div>description</div></th>
<th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="price: activate to sort column ascending" style="width: 47px;"><div>price</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="class: activate to sort column ascending" style="width: 89px;"><div>class</div></th><th class="sorting" role="columnheader" tabindex="0" aria-controls="table-2" rowspan="1" colspan="1" aria-label="status: activate to sort column ascending" style="width: 87px;"><div>status</div></th>
</tr>
</thead>

<tbody role="alert" aria-live="polite" aria-relevant="all">

<?php 

foreach($books as $row):
?>
<tr class="odd">
<td class=" sorting_1">1</td>
<td class=" "><?php echo $row['name'];?></td>
<td class=" "><?php echo $row['author'];?></td>
<td class=" "><?php echo $row['description'];?></td>
<td class=" "><?php echo $row['price'];?></td>
<td class=" "><?php echo $this->crud_model->get_type_name_by_id('class',$row['class_id']);?></td>
<td class=" "><span class="label label-success"><?php echo $row['status'];?></span></td>

</tr>

<?php
endforeach;
?>
</tbody></table>
</div>

</div>



</div>
</div>
</div>
<script type="text/javascript">
    jQuery(window).load(function ()
    {
        var $ = jQuery;

        $("#table-2").dataTable({
            "sPaginationType": "bootstrap",
            "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>"
        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });

        // Highlighted rows
        $("#table-2 tbody input[type=checkbox]").each(function (i, el)
        {
            var $this = $(el),
                    $p = $this.closest('tr');

            $(el).on('change', function ()
            {
                var is_checked = $this.is(':checked');

                $p[is_checked ? 'addClass' : 'removeClass']('highlight');
            });
        });

        // Replace Checboxes
        $(".pagination a").click(function (ev)
        {
            replaceCheckboxes();
        });
    });
</script>

