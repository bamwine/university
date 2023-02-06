
<div class="panel panel-gradient">
<div class="panel-heading">
<div class="panel-title">
Aggretgates Information Page </div>
</div>
<div class="table-responsive">

<div class="tab-pane  active" id="list">
<center>

<?php echo form_open(base_url() . 'index.php?admin/aggre' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data', 'method' => 'post'));?>
<!--form action="index.php?admin/marks" method="post" accept-charset="utf-8"-->
	
<table border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
<tbody><tr>
<td>select Level</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>
<select name="grade_point" class="form-control" style="float:left;">
<option value=""><?php echo get_phrase('select');?></option>
 <option value="o">O-level</option>
<option value="a">A-level</option>                             
</select>
</td>


<td>
<input type="hidden" name="operation" value="selection">
<button type="submit" class="btn btn-success btn-sm btn-icon icon-left"> <i class="entypo-check"></i>Fetch</button>
</td>
</tr>
</tbody></table>
</form>

</center>

</div>
<br><br>

<?php 
 
  	 //$students   =   $this->db->get_where('student' , array('class_id'=>$class_id))->result_array();
	$students  = $this->db->get_where('aggre', array('grade_point'=>$class_id))->result_array();	
  //if($class_id=='o')
  if($students){
  ?>
<form action="index.php?admin/aggre" method="post" accept-charset="utf-8">

<table class="table table-bordered">
<thead>
<tr>

<td><?php echo $nn = $class_id=='o'? 'From':'Aggregate Combination';?></td>
<td><?php echo $nn = $class_id=='o'? 'To':'Grade';?></td>
<td> <?php echo $nn = $class_id=='o'? 'Division':'Points';?></td>
</tr>
</thead>
<tbody>

<?php //echo form_open(base_url() . 'index.php?admin/marks/1/2' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data', 'method' => 'post'));?>




<?php foreach($students as $row):?>
<tr>
<!--td><?php //echo $row['aggre_id'];?></td-->
<td>
<input type="<?php echo $nn = $class_id=='o'? 'number':'text';?>" value="<?php echo $row['mark_from'];?>" name="mark_from<?php echo $row['aggre_id'];?>" class="form-control">

</td>
<td>
<?php  ?>
<input type="<?php echo $nn = $class_id=='o'? 'number':'text';?>" value="<?php echo $row['mark_upto'];?>" name="mark_upto<?php echo $row['aggre_id'];?>" class="form-control">

</td>
<td>

<textarea name="division<?php echo $row['aggre_id'];?>" class="form-control"><?php echo $row['division'];?></textarea>
</td>
<td> <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/aggre/delete/<?php echo $row['aggre_id'];?>');">
       <i class="entypo-trash"></i><?php echo get_phrase('delete');?> </a></td>
	   
<input type="hidden" name="aggre_id<?php echo $row['aggre_id'];?>" value="<?php echo $row['aggre_id'];?>">

<input type="hidden" name="operation" value="update">
</tr>
  <?php endforeach;?>


</tbody>
</table>
<center>
<button type="submit" class="btn btn-success btn-sm btn-icon icon-left"> <i class="entypo-check"></i>Update aggretgates</button>
</center>

</form>

<br>
<form action="index.php?admin/aggre" method="post" accept-charset="utf-8">

<table class="table table-bordered">
<thead>
<tr>

<td><?php echo $nn = $class_id=='o'? 'From':'Aggregate Combination';?></td>
<td><?php echo $nn = $class_id=='o'? 'To':'Grade';?></td>
<td> <?php echo $nn = $class_id=='o'? 'Division':'Points';?></td>
</tr>
</thead>
<tbody>





<tr>
<!--td><?php //echo $row['aggre_id'];?></td-->
<td>
<input type="<?php echo $nn = $class_id=='o'? 'number':'text';?>" placeholder="<?php echo $nn = $class_id=='o'? '':'eg 134';?>"  name="mark_from" class="form-control">

</td>
<td>
<?php  ?>
<input type="<?php echo $nn = $class_id=='o'? 'number':'text';?>"  name="mark_upto" class="form-control">

</td>
<td>

<textarea name="division" class="form-control"></textarea>
</td>
<input type="hidden" name="grade_point" value="<?php echo $class_id;?>">
<input type="hidden" name="operation" value="add">
</tr>
 


</tbody>
</table>
<center>
<button type="submit" class="btn btn-success btn-sm btn-icon icon-left"> <i class="entypo-check"></i>Add aggretgates</button>
</center>

</form>
  <?php } else{?>
  
  <br><br>
  <table class="table table-bordered">

<tbody>
<tr>
<td><h1>No Results found</h1></td>
</tr>

</tbody>
</table>
  
  <?php } ?>


</div>
</div>
<script type="text/javascript">
  function show_subjects(class_id)
  {
      for(i=0;i<=100;i++)
      {

          try
          {
              document.getElementById('subject_id_'+i).style.display = 'none' ;
	  		  document.getElementById('subject_id_'+i).setAttribute("name" , "temp");
          }
          catch(err){}
      }
      document.getElementById('subject_id_'+class_id).style.display = 'block' ;
	  document.getElementById('subject_id_'+class_id).setAttribute("name" , "subject_id");
  }

</script>
