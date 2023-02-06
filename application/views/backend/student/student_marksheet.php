<div class="panel panel-gradient panel-shadow" data-collapsed="0">
<div class="panel-heading">
<div class="panel-title">Performance</div>
</div>
<div class="panel-body">
<div class="col-md-12">
<table class="table table-bordered">
<thead>
<tr>
<td style="text-align: center;">
Exam <i class="entypo-right-thin"></i>
</td>

<?php 
//$class_id=1;
 
  $subject   =   $this->db->get_where('subject' , array('class_id'=>$class_id))->result_array();
foreach($subject as $subject):?>
  
  <td style="text-align: center;"><?php echo $subject['name'];?></td>
  
 <?php endforeach;?>
<td style="text-align: center;">Total</td>
<td style="text-align: center;">Average Grade Point</td>
<td style="text-align: center;">Aggregates</td>
<td style="text-align: center;">division</td>
</tr>
</thead>
<tbody>
					
<?php 
//$this->db->where('class_id' , $class_id);
 $students = $this->db->get_where('student' , array('class_id'=>$class_id))->result_array();
 foreach($students as $studentsrow){
	  $exams = $this->db->get('exam')->result_array();
        foreach($exams as $row){	 
	 
	 ?>
<tr>

 <td style="text-align: center;"><?php echo $row['name'];?></td>
 <!-- makrks obtained -->
<?php get_subject_mark($student_id,$row['exam_id']);?>
 <!-- ends makrks obtained -->
 
 
 <!-- total marks --> 
  
 <td style="text-align: center;"><?php total_marks($student_id,$row['exam_id']);?></td>
  <!-- end total marks -->
  
   <!-- get average -->
   
    <td style="text-align: center;"><?php average_marks($student_id,$row['exam_id']);?></td>
  
    <!-- ends get average -->
	
	   <!-- get aggregates -->
     
	<td style="text-align: center;"><?php get_aggreates($student_id,$row['exam_id']);?></td>
    <!-- ends get aggregates -->
	
	 <!-- get division -->
	 
	 <td style="text-align: center;"><?php get_division($student_id,$row['exam_id']);?></td>


<?php  ?>

</tr>
 <?php }} ?>

</tbody>
</table>

<br> <br>
<a href="index.php?student/student_marksheet_print_view/<?php echo $student_id?>/<?php echo $exam_id?>" class="btn btn-primary" target="_blank">
Print Marksheet </a>
</div>
<div class="col-md-6">
<div id="chartdiv1" class="exam_chart"></div>
<script type="text/rocketscript" data-rocketoptimized="true">
                            var chart1 = AmCharts.makeChart("chartdiv1", {
                                "theme": "none",
                                "type": "serial",
                                "dataProvider": [
                                                                                {
                                            "subject": "Mathematics",
                                            "mark_obtained": 
                                            0,
                                            "mark_highest": 
                                            70                                        },
                                                                                {
                                            "subject": "Economics",
                                            "mark_obtained": 
                                            0,
                                            "mark_highest": 
                                            0                                        },
                                                                                {
                                            "subject": "Social Studies",
                                            "mark_obtained": 
                                            ,
                                            "mark_highest": 
                                                                                    },
                                                                            
                                ],
                                "valueAxes": [{
                                    "stackType": "3d",
                                    "unit": "%",
                                    "position": "left",
                                    "title": "Obtained Mark vs Highest Mark"
                                }],
                                "startDuration": 1,
                                "graphs": [{
                                    "balloonText": "Obtained Mark in [[category]]: <b>[[value]]</b>",
                                    "fillAlphas": 0.9,
                                    "lineAlpha": 0.2,
                                    "title": "2004",
                                    "type": "column",
                                    "fillColors":"#7f8c8d",
                                    "valueField": "mark_obtained"
                                }, {
                                    "balloonText": "Highest Mark in [[category]]: <b>[[value]]</b>",
                                    "fillAlphas": 0.9,
                                    "lineAlpha": 0.2,
                                    "title": "2005",
                                    "type": "column",
                                    "fillColors":"#34495e",
                                    "valueField": "mark_highest"
                                }],
                                "plotAreaFillAlphas": 0.1,
                                "depth3D": 20,
                                "angle": 45,
                                "categoryField": "subject",
                                "categoryAxis": {
                                    "gridPosition": "start"
                                },
                                "exportConfig":{
                                    "menuTop":"20px",
                                    "menuRight":"20px",
                                    "menuItems": [{
                                        "format": 'png'   
                                    }]  
                                }
                            });
                    </script>
</div>
</div>
</div>