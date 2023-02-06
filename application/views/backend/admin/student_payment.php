
<div class="panel panel-gradient">
<div class="panel-heading">
<div class="panel-title">
Payment Information Page </div>
</div>
<div class="table-responsive">
<br>
<ul class="nav nav-tabs bordered">
<li class="active">
<a href="#unpaid" data-toggle="tab">
<span class="hidden-xs">Create Single Invoice</span>
</a>
</li>
<li>
<a href="#paid" data-toggle="tab">
<span class="hidden-xs">Create Mass Invoice</span>
</a>
</li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="unpaid">

<form action="index.php?admin/invoice/create" class="form-horizontal form-groups-bordered validate" target="_top" method="post" accept-charset="utf-8" novalidate="novalidate">
<div class="row">
<div class="col-md-6">
<div class="panel panel-success panel-shadow" data-collapsed="0">
<div class="panel-heading">
<div class="panel-title">Invoice Informations</div>
</div>
<div class="panel-body">
<div class="form-group">
<label class="col-sm-3 control-label">class</label>
<div class="col-sm-9">
<select name="class_id" class="form-control" onchange="return get_class_students(this.value)">
<option value=""><?php echo get_phrase('select');?></option>
  <?php 
	$classes = $this->db->get('class')->result_array();
	foreach($classes as $row):
		?>
		<option value="<?php echo $row['class_id'];?>">
				<?php echo $row['name'];?>
				</option>
	<?php
	endforeach;
  ?>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">student</label>
<div class="col-sm-9">
<select name="student_id" class="form-control" style="width:100%;" id="student_selection_holder">
<option value="">Select Class First</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">title</label>
<div class="col-sm-9">
<input type="text" class="form-control" name="title">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">description</label>
<div class="col-sm-9">
<input type="text" class="form-control" name="description">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">date</label>
<div class="col-sm-9">
<input type="text" class="datepicker form-control" name="date">
</div>
</div>
</div>
</div>
</div>
<div class="col-md-6">
<div class="panel panel-success panel-shadow" data-collapsed="0">
<div class="panel-heading">
<div class="panel-title">Payment Informations</div>
</div>
<div class="panel-body">
<div class="form-group">
<label class="col-sm-3 control-label">Total</label>
<div class="col-sm-9">
<input type="text" class="form-control" name="amount" placeholder="Enter Total Amount">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">payment</label>
<div class="col-sm-9">
<input type="text" class="form-control" name="amount_paid" placeholder="Enter Payment Amount">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">status</label>
<div class="col-sm-9">
<select name="status" class="form-control">
<option value="paid">paid</option>
<option value="unpaid">unpaid</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Method</label>
<div class="col-sm-9">
<select name="method" class="form-control">
<option value="1">Cash</option>
<option value="2">Cheque</option>
 <option value="3">Card</option>
</select>
</div>
</div>
</div>
</div>
<div class="form-group">
<div class="col-sm-5">
<button type="submit" class="btn btn-success btn-sm btn-icon icon-left"><i class="entypo-plus"></i>add invoice</button>
</div>
</div>
</div>
</div>
</form>

</div>
<div class="tab-pane" id="paid">

<form action="index.php?admin/invoice/create_mass_invoice" class="form-horizontal form-groups-bordered validate" id="mass" target="_top" method="post" accept-charset="utf-8" novalidate="novalidate">
<br>
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-5">
<div class="form-group">
<label class="col-sm-3 control-label">class</label>
<div class="col-sm-9">
<select name="class_id" class="form-control" onchange="return get_class_students_mass(this.value)">
<option value=""><?php echo get_phrase('select');?></option>
  <?php 
	$classes = $this->db->get('class')->result_array();
	foreach($classes as $row):
		?>
		<option value="<?php echo $row['class_id'];?>">
				<?php echo $row['name'];?>
				</option>
	<?php
	endforeach;
  ?>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">title</label>
<div class="col-sm-9">
<input type="text" class="form-control" name="title">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">description</label>
<div class="col-sm-9">
<input type="text" class="form-control" name="description">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Total</label>
<div class="col-sm-9">
<input type="text" class="form-control" name="amount" placeholder="Enter Total Amount">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">payment</label>
<div class="col-sm-9">
<input type="text" class="form-control" name="amount_paid" placeholder="Enter Payment Amount">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">status</label>
<div class="col-sm-9">
<select name="status" class="form-control">
<option value="paid">paid</option>
<option value="unpaid">unpaid</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Method</label>
<div class="col-sm-9">
<select name="method" class="form-control">
<option value="1">Cash</option>
<option value="2">Check</option>
<option value="3">Card</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">date</label>
<div class="col-sm-9">
<input type="text" class="datepicker form-control" name="date">
</div>
</div>
<div class="form-group">
<div class="col-sm-5 col-sm-offset-3">
<button type="submit" class="btn btn-success btn-sm btn-icon icon-left"><i class="entypo-plus"></i>add invoice</button>
</div>
</div>
</div>
<div class="col-md-6">
<div id="student_selection_holder_mass"></div>
</div>
</div>
</form>

</div>
</div>
</div>
</div>

<script type="text/javascript">
	// function check() {
 //    	$("#selectall").click(function () {
 //    		$("input:checkbox").prop('checked', $(this).prop("checked"));
	// 	});
	// }

	function select() {
		var chk = $('.check');
			for (i = 0; i < chk.length; i++) {
				chk[i].checked = true ;
			}

		//alert('asasas');
	}
	function unselect() {
		var chk = $('.check');
			for (i = 0; i < chk.length; i++) {
				chk[i].checked = false ;
			}
	}
</script>
<script type="text/javascript">
    function get_class_students(class_id) {
        $.ajax({
            url: 'index.php?admin/get_class_students/' + class_id ,
            success: function(response)
            {
                jQuery('#student_selection_holder').html(response);
            }
        });
    }
</script>
<script type="text/javascript">
    function get_class_students_mass(class_id) {
    	
        $.ajax({
            url: 'index.php?admin/get_class_students_mass/' + class_id ,
            success: function(response)
            {
                jQuery('#student_selection_holder_mass').html(response);
            }
        });

        
    }
</script>
