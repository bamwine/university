<?php 
$edit_data		=	$this->db->get_where('invoice' , array('invoice_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>


<div class="" style="height:500px; overflow:auto;">
<center>
<a onclick="PrintElem('#invoice_print')" class="btn btn-default btn-icon icon-left hidden-print pull-right">
Print Invoice
<i class="entypo-print"></i>
</a>
</center>
<br><br>
<div id="invoice_print">
<table width="100%" border="0">
<tbody><tr>
<td align="right">
<h5>Creation Date : <?php echo date("jS F, Y", strtotime( $row['creation_timestamp'])) ;?></h5>
<h5>title : <?php echo $row['title']?></h5>
<h5>description : <?php echo $row['description']?></h5>
<h5>status : <?php if($row['status'] == 'unpaid'){echo 'unpaid';}else {echo 'paid';}?></h5>
</td>
</tr>
</tbody></table>
<hr>
<table width="100%" border="0">
<tbody><tr>
<td align="left"><h4>payment to </h4></td>
<td align="right"><h4>bill to </h4></td>
</tr>
<tr>
<td align="left" valign="top">
<?php echo strtoupper ($this->db->get_where('settings' , array('type' =>'system_name'))->row()->description);?><br>
<?php echo $this->db->get_where('settings' , array('type' =>'address'))->row()->description;?><br>
<?php echo $this->db->get_where('settings' , array('type' =>'phone'))->row()->description;?><br>
</td>
<td align="right" valign="top">

<?php 	 
	$parents=$this->db->get_where('student' , array('student_id'=>$row['student_id']))->result_array();
	foreach($parents as $row3):
		?>				
<?php echo $row3['name'];?><br>
class <?php echo $this->crud_model->get_type_name_by_id('class',$row3['class_id']);?><br>
roll - <?php echo  $row3['student_no'];?><br>
<?php
	endforeach;
  ?>
</td>
</tr>
</tbody></table>
<hr>
<table width="100%" border="0">
<tbody><tr>
<td align="right" width="80%">Total Amount :</td>
<td align="right"><?php echo $row['amount']?></td>
</tr>
<tr>
<td align="right" width="80%"><h4>Paid Amount :</h4></td>
<td align="right"><h4><?php echo $row['amount_paid']?></h4></td>
</tr>
</tbody></table>
<hr>

<h4>Payment History</h4>
<table class="table table-bordered" width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th>date</th>
<th>amount</th>
<th>Method</th>
</tr>
</thead>
<tbody>
<?php 	 
	$pay=$this->db->get_where('payment' , array('student_id'=>$row['student_id']))->result_array();
	foreach($pay as $rowp):
		?>
<tr>
<td><?php echo date("jS F, Y", strtotime($rowp['timestamp']));?></td>
<td><?php echo $rowp['amount'];?></td>
<td><?php if($rowp['method'] == 1){echo 'Cash';}else if($rowp['method'] == 2){echo 'Cheque';}else {echo 'Card';}?> </td>
</tr>

<?php
	endforeach;
  ?>


</tbody>
<tbody>
</tbody></table>
</div>
<script type="text/javascript">

    // print invoice function
    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'invoice', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Invoice</title>');
        mywindow.document.write('<link rel="stylesheet" href="assets/css/neon-theme.css" type="text/css" />');
        mywindow.document.write('<link rel="stylesheet" href="assets/js/datatables/responsive/css/datatables.responsive.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>
</div>


<?php
endforeach;
?>