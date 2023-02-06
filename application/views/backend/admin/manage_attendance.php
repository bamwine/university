<div class="main-content" style="min-height: 1650px;">

<div class="panel panel-gradient">
<div class="panel-heading">
<div class="panel-title">
Parent Information Page </div>
</div>
<hr>
<div class="table-responsive">
<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
<thead>
<tr>
<th>Select Date</th>
<th>Select Month</th>
<th>Select Year</th>
<th>select class</th>
<th>Select Date</th>
</tr>
</thead>
<tbody>
<form method="post" action="index.php?admin/attendance_selector" class="form">
<tr class="gradeA">
<td>
<select name="date" class="form-control">
<option value="1" <?php if($date == 1){echo 'selected';}?>>1 </option>
<option value="2" <?php if($date == 2){echo 'selected';}?>>2 </option>
<option value="3" <?php if($date == 3){echo 'selected';}?>>3 </option>
<option value="4" <?php if($date == 4){echo 'selected';}?>>4 </option>
<option value="5" <?php if($date == 5){echo 'selected';}?>>5 </option>
<option value="6" <?php if($date == 6){echo 'selected';}?>>6 </option>
<option value="7" <?php if($date == 7){echo 'selected';}?>>7 </option>
<option value="8" <?php if($date == 8){echo 'selected';}?>>8 </option>
<option value="9" <?php if($date == 9){echo 'selected';}?>>9 </option>
<option value="10" <?php if($date == 10){echo 'selected';}?>>10 </option>
<option value="11" <?php if($date == 11){echo 'selected';}?>>11 </option>
<option value="12"<?php if($date == 12){echo 'selected';}?> >12 </option>
<option value="13" <?php if($date == 13){echo 'selected';}?>>13 </option>
<option value="14" <?php if($date == 14){echo 'selected';}?>>14 </option>
<option value="15" <?php if($date == 15){echo 'selected';}?>>15 </option>
<option value="16" <?php if($date == 16){echo 'selected';}?>>16 </option>
<option value="17"<?php if($date == 17){echo 'selected';}?>>17 </option>
<option value="18"<?php if($date == 18){echo 'selected';}?>>18 </option>
<option value="19"<?php if($date == 19){echo 'selected';}?>>19 </option>
<option value="20"<?php if($date == 20){echo 'selected';}?>>20 </option>
<option value="21" <?php if($date == 21){echo 'selected';}?>>21 </option>
<option value="22"<?php if($date == 22){echo 'selected';}?> >22 </option>
<option value="23"<?php if($date == 23){echo 'selected';}?>>23 </option>
<option value="24"<?php if($date == 24){echo 'selected';}?>>24 </option>
<option value="25"<?php if($date == 25){echo 'selected';}?>>25 </option>
<option value="26"<?php if($date == 26){echo 'selected';}?>>26 </option>
<option value="27"<?php if($date == 27){echo 'selected';}?>>27 </option>
<option value="28"<?php if($date == 28){echo 'selected';}?>>28 </option>
<option value="29"<?php if($date == 29){echo 'selected';}?>>29 </option>
<option value="30" <?php if($date == 30){echo 'selected';}?>>30 </option>
<option value="31"<?php if($date == 31){echo 'selected';}?>>31 </option>
</select>
</td>
<td>
<select name="month" class="form-control">
<option value="1"<?php if($month == 1){echo 'selected';}?>>january </option>
<option value="2"<?php if($month == 2){echo 'selected';}?>>february </option>
<option value="3"<?php if($month == 3){echo 'selected';}?>>march </option>
<option value="4"<?php if($month == 4){echo 'selected';}?>>april </option>
<option value="5"<?php if($month == 5){echo 'selected';}?>>may </option>
<option value="6"<?php if($month == 6){echo 'selected';}?>>june </option>
<option value="7"<?php if($month == 7){echo 'selected';}?> >july </option>
<option value="8"<?php if($month == 8){echo 'selected';}?>>august </option>
<option value="9"<?php if($month == 9){echo 'selected';}?>>september </option>
<option value="10"<?php if($month == 10){echo 'selected';}?>>october </option>
<option value="11"<?php if($month == 11){echo 'selected';}?>>november </option>
<option value="12"<?php if($month == 12){echo 'selected';}?>>december </option>
</select>
</td>
<td>
<select name="year" class="form-control">
<option value="2030"<?php if($year == 2030){echo 'selected';}?>>2030 </option>
<option value="2029"<?php if($year == 2029){echo 'selected';}?>>2029 </option>
<option value="2028"<?php if($year == 2028){echo 'selected';}?>>2028 </option>
<option value="2027"<?php if($year == 2027){echo 'selected';}?>>2027 </option>
<option value="2026"<?php if($year == 2026){echo 'selected';}?>>2026 </option>
<option value="2025"<?php if($year == 2025){echo 'selected';}?>>2025 </option>
<option value="2024"<?php if($year == 2024){echo 'selected';}?>>2024 </option>
<option value="2023"<?php if($year == 2023){echo 'selected';}?>>2023 </option>
<option value="2022"<?php if($year == 2022){echo 'selected';}?>>2022 </option>
<option value="2021"<?php if($year == 2021){echo 'selected';}?>>2021 </option>
<option value="2020"<?php if($year == 2020){echo 'selected';}?>>2020 </option>
<option value="2019"<?php if($year == 2019){echo 'selected';}?>>2019 </option>
<option value="2018" <?php if($year == 2018){echo 'selected';}?>>2018 </option>
<option value="2017" <?php if($year == 2017){echo 'selected';}?> >2017 </option>
<option value="2016">2016 </option>
<option value="2015">2015 </option>
<option value="2014">2014 </option>
<option value="2013">2013 </option>
<option value="2012">2012 </option>
<option value="2011">2011 </option>
<option value="2010">2010 </option>
</select>
</td>
<td>
<select name="class_id" class="form-control">
<option value=""><?php echo get_phrase('select');?></option>
<?php 
$classes = $this->db->get('class')->result_array();
foreach($classes as $row):
	?>
	<option value="<?php echo $row['class_id'];?>" <?php if($row['class_id']==$class_id) echo 'selected';?> >
			<?php echo $row['name'];?>
			</option>
<?php
endforeach;
?>
</select>
</td>
<td align="center">
<button type="submit" class="btn btn-success btn-sm btn-icon icon-left"> <i class="entypo-check"></i>Manage Attendance</button>
</td>
</tr>
</form>
</tbody>
</table>
</div>
</div>



<hr>
<center>
<div class="row">
<div class="col-sm-offset-4 col-sm-4">
<div class="tile-stats tile-white-gray">
<div class="icon"><i class="entypo-suitcase"></i></div>
<h2> <?php $mydate = $date.'-'.$month.'-'.$year;
echo date('l, F jS, Y', strtotime($mydate));?></h2>
<h3>Attendance of class <?php $class_id?></h3>
<p><?php echo $date.'-'.$month.'-'.$year?></p>
</div>
<a href="#" id="update_attendance_button" onclick="return update_attendance();" class="btn btn-info btn-sm btn-icon icon-left">
Update Attendance
<i class="entypo-book"></i>
</a>
</div>
</div>
</center>
<hr>
<div class="row" id="attendance_list">
<div class="col-sm-offset-0 col-md-12">
<table class="table table-bordered datatable">
<thead>
<tr>
<td>roll</td>
<td>Student Names</td>
<td>Attendance Status</td>
</tr>
</thead>
<tbody>
<?php
$students   =   $this->db->get_where('student', array('class_id' => $class_id))->result_array();
foreach ($students as $row)
{ ?>

<tr class="gradeA">
<td><?php echo $row['student_no'];?></td>
<?php $student_name   = $this->db->get_where('attendance' , array('student_id' => $row['student_id']))->row()->status;?>
<td><?php echo $row['name'];?></td>
<td><?php  if($student_name==0||''){echo 'Never';}else if($student_name==1){echo 'present';}else if($student_name==2){echo 'Absent';}?></td>
</tr>
<?php }?>

</tbody>
</table>
</div>
</div>
<div class="row" id="update_attendance" style="display: none;">

<form method="post" action="index.php?admin/manage_attendance/<?php echo $date.'/'.$month.'/'.$year.'/'.$class_id?>">
<div class="col-sm-offset-0 col-md-12">
<center>
<a class="btn btn-success" onclick="mark_all_present()">
<i class="entypo-check"></i> Mark All Present </a>
<a class="btn btn-danger" onclick="mark_all_absent()">
<i class="entypo-cancel"></i> Mark All Absent </a>
</center>
<hr>
<table class="table table-bordered">
<thead>
<tr class="gradeA">
<th>roll</th>
<th>name</th>
<th>status</th>
</tr>
</thead>
<tbody>

<?php
$students   =   $this->db->get_where('student', array('class_id' => $class_id))->result_array();
foreach ($students as $row)
{ ?>			
<tr class="gradeA">
<td><?php echo $row['student_no'];?></td>
<td><?php echo $row['name'];?></td>
<td align="center">

<select name="status_<?php echo $row['student_id']?>" class="form-control" id="status_<?php echo$row['student_id']?>" style="width:100px; float:left;">
<option value="0" selected="selected"></option>
<option value="1">Present</option>
<option value="2">Absent</option>
</select>
</td>
</tr>
<?php }?>


</tbody>
</table>
<input type="hidden" name="date" value="<?php echo $year.'-'.$month.'-'.$date?>">
<center>
<input type="submit" class="btn btn-info" value="save changes">
</center>
</div>
</form>
</div>
<br>
<div class="row">
<div class="col-md-12"></div>
<div class="col-md-12">
<div class="alert alert-success">
SMS Will Be Sent By Twilio </div>
</div>
<div class="col-md-4"></div>
</div>


<script type="text/javascript">

    $("#update_attendance").hide();

    function update_attendance() {

        $("#attendance_list").hide();
        $("#update_attendance_button").hide();
        $("#update_attendance").show();

    }
</script>
<script type="text/javascript">

    function mark_all_present() {
        var count = 1;

        for(var i = 0; i < count; i++)
            $('#status_' + i).val("1");
    }

    function mark_all_absent() {
        var count = 1;

        for(var i = 0; i < count; i++)
            $('#status_' + i).val("2");
    }
    
</script>

</div>