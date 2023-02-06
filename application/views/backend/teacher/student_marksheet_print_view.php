<?php
	$term        =	$this->db->get_where('settings' , array('type'=>'term'))->row()->description;
	$years        =	$this->db->get_where('settings' , array('type'=>'years'))->row()->description;
	
	
	?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Report Card</title>
<link rel="shortcut icon" href="assets/images/favicon.png">
<script src="assets/js/jquery-ui/js/jquery-1.9.1.js"></script>
    
    <link rel="stylesheet" href="assets/css/bamwine.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
    <style>
       
        .background_watermark{
			margin-top: 600px;
            opacity:0.06; width:90%;top: 30%; left: 50%;transform: translate(-50%, -50%); position:absolute;
        }
		
		 </style>


    
<script type="text/javascript">

  
	
	  
        function printDiv2(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;

          
        }
  
	
	
	function PrintDiv(id) {
            var data=document.getElementById(id).innerHTML;
            var myWindow = window.open('', 'my div', 'height=400,width=600');
            myWindow.document.write('<html><head><title>my div</title>');
            /*optional stylesheet*/ //myWindow.document.write('<link rel="stylesheet" target="_blank" rel="nofollow" href="main.css" type="text/css" />');
           // mywindow.document.write('<style> .background_watermark{	margin-top: 600px;opacity:0.06; width:90%;top: 30%; left: 50%;transform: translate(-50%, -50%); position:absolute; } </style>');
			//mywindow.document.write('<link rel="stylesheet" href="assets/css/bamwine.css" type="text/css" media="print" />');
			//mywindow.document.write('<link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css"  media="print" />');
       
			myWindow.document.write('</head><body>');
            myWindow.document.write(data);
            myWindow.document.write('</body></html>');
            myWindow.document.close(); // necessary for IE >= 10

            myWindow.onload=function(){ // necessary if the div contain images

                myWindow.focus(); // necessary for IE >= 10
                myWindow.print();
                myWindow.close();
            };
			 setTimeout(function () { // necessary for Chrome
            myWindow.print();
            myWindow.close();
        }, 5);
			
			
        }

</script>


</head>


<body >



<div class="container-fluid">




    <br/>
    <a  onclick="PrintDiv('print')" target="_blank" class="btn btn-default pull-right"><i class="fa fa-print"></i> Print</a>
<div id="print">
<div class="container light-shadow">

   

    <div class="">
	      <div class="col-md-12" style="font-family:'Century Gothic';color:#2182C0;">

		<div style="height:100%; width:100%;">
		
		<div  style="height:50%; width:100%;float:left;">
            <center>
                <img src="uploads/schoo_badge.png" alt="" class="background_watermark"/>
            </center>

                <div class="col-md-2 space-up" style="height:200px; margin-top:20px;">
                    <img src="uploads/schoo_badge.png" style="height:60%; width:100%;"/>
                </div>

                <div class="col-md-8 space-up">
                    <center>
<p class="text-uppercase theme-font broadway" style="font-size:50px;">
   <?php echo $this->db->get_where('settings' , array('type' =>'school_name'))->row()->description;?></p>
                <p style="font-size:16px; letter-spacing: 4px">"<i><?php echo $this->db->get_where('settings' , array('type' =>'school_motto'))->row()->description;?></i>"</p>

            <p style="font-size:16px;">
                P. O. Box <?php echo $this->db->get_where('settings' , array('type' =>'school_boxno'))->row()->description;?><br/>
                Tel: <?php echo $this->db->get_where('settings' , array('type' =>'school_phone'))->row()->description;?> <br/> 
				Email: <?php echo $this->db->get_where('settings' , array('type' =>'school_email'))->row()->description;?><br>
				Center No: <?php echo $this->db->get_where('settings' , array('type' =>'school_uneb'))->row()->description;?><br/> 
			</p>
	
                <p style="font-size:25px;">
                <u>REPORT FORM</u>
                </p>
                        </center>
        </div>

        <div class="col-md-2 space-up " >
            <img src="<?php echo $this->crud_model->get_image_url('student',$student_id);?>"  class="fit space-up" style="max-height:200px;"/>
        </div>

		</div>
		
            <div class="col-md-12 theme-font" style="font-size:20px; height:50%; width:100%;">
                <center>
				
                STUDENT NAME: 
				<b><font class="text-uppercase" style="text-decoration: underline;"><?php echo $this->crud_model->get_type_name_by_id('student',$student_id);?></font></b>
                <b>&nbsp&nbsp TERM:</b> <u> <?php echo $term;?></u> &nbsp&nbsp YEAR: <u><?php echo $years;?></u>
                    <b>&nbsp&nbsp CLASS:</b> <u><?php echo $this->crud_model->get_type_name_by_id('class',$class_id);?></u>
                    <b>&nbsp&nbsp Report No:</b> <u style="color:red;"><?php echo $student_id;?></u>
                    </center>
            </div>
			
		</div>	
			
			
<div class="col-md-12">


            <div class="col-md-10">
            <table class="table table-bordered space-up" style="margin-top:10px;margin-left:11%;">
<tr>
    <th>SUBJECT</th>
    
   
<?php 
$examsd = $this->db->get('exam')->result_array();
foreach($examsd as $row){
?>
<th><?php echo $row['name'];?> </th>

<?php
}
?>
	
   
    <th>AVERAGE</th>
	<th>GRADE</th>
    <th>REMARKS</th>
    <th>TEACHER's INITIALS</th>
</tr>
<?php
 $subject   =   $this->db->get_where('subject' , array('class_id'=>$class_id))->result_array();
foreach($subject as $subject):?>

<tr>
<td><b><?php echo $subject['name'];?></b></td>
<?php 
$examsd = $this->db->get('exam')->result_array();
foreach($examsd as $row){
?>

  <!--  geting subject marks-->
<td style="text-align: center;">
                                    <?php
                                        $obtained_mark_query = $this->db->get_where('mark' , array(
                                                    'subject_id' => $subject['subject_id'],
                                                        'exam_id' => $row['exam_id'],
                                                            'class_id' => $class_id,
                                                                'student_id' => $student_id));
                                        if ( $obtained_mark_query->num_rows() > 0) {
                                            $marks = $obtained_mark_query->result_array();
                                            foreach ($marks as $row4) {
                                                echo $row4['mark_obtained'];
                                                $total_marks += $row4['mark_obtained'];
                                            }
                                        }else {echo 0;}
                                    ?>
                                </td>
								
								
								
								 
<?php
}
?>

	  <!--  geting average marks-->

<td style="text-align: center;">
	<?php
	$this->db->select('round(AVG (mark_obtained),2) AS total ', FALSE);
		$obtained_mark_query = $this->db->where( array(
					'subject_id' => $subject['subject_id'],                                                        
							'class_id' => $class_id,
								'student_id' => $student_id));
	   // if ( $obtained_mark_query->num_rows() > 0) {
		   
			$marks = $query = $this->db->get('mark')->result_array();	
			foreach ($marks as $row4) {
		echo    $row4['total'];
			  $total_avrage += $row4['total'];
			}
			//  
	   // }
		 
	?>
</td>


 <!--  geting grades or aggregates marks-->
<td style="text-align: center;">
	<?php
	$this->db->select('round(AVG (mark_obtained),2) AS total ', FALSE);
		$obtained_mark_query = $this->db->where( array(
					'subject_id' => $subject['subject_id'],                                                        
							'class_id' => $class_id,
								'student_id' => $student_id));
	   
		   
			$marks = $query = $this->db->get('mark')->result_array();	
			foreach ($marks as $row5) {
		
			 if ($row5['total'] >= 0 || $row5['total'] != '') {
	//$grade = $this->crud_model->get_grade($row4['mark_obtained']);
	 $grade = $this->crud_model->get_aggretes_makr($row5['total'],$class_level);
	echo $grade['name'];
	
			 $total_agree += $grade['name'];
	
				}

			}
		 
	?>
</td>

								

<td style="text-align: center;"><b><?php get_aggreates_commentf($student_id,$row['exam_id'],$subject['subject_id']);?></b></td>



<td style="text-align: center;">
                                    <?php
									//$this->db->select('round(AVG (mark_obtained),2) AS total ', FALSE);
                                        $obtained_mark_query = $this->db->where( array(
                                                    'subject_id' => $subject['subject_id'],                                                        
                                                            'class_id' => $class_id
                                                                ));
                                     										   
                                            $marks = $query = $this->db->get('subject')->result_array();	
                                            foreach ($marks as $row4) {
                                            $row4['teacher_id'];
                                             $this->crud_model->get_teacher_name($row4['teacher_id']);
										echo	get_tchr_initials($this->crud_model->get_teacher_name($row4['teacher_id']));
                                            }
                                       // }
										 
                                    ?>
                                </td>




</tr>




  
 <?php endforeach;?>
                                
                
            </table>
                <div class="col-md-12 theme-font" style="margin-left:9%;font-size:18px; color:#2182C0;">
              <?php if($class_level=='o'){ ?>  AGGREGATE :  <input style="border-bottom:1px dotted #2182C0; width:300px;" class="no-border-top no-border-left no-border-right" value="&nbsp <?php echo $total_agree;?>"/>
				&nbsp;&nbsp;  DIVISION: <input style="border-bottom:1px dotted #2182C0; width:200px;" class="no-border-top no-border-left no-border-right" value="&nbsp <?php 

 $obtained = array();
		$final_div=0;
		$current_division=$this->crud_model->get_division($total_agree,$class_level);
		    $query = $this->db->get('priority_mark_rules');
		  
		   if ($query->num_rows() >=1){
	      
        foreach($query->result_array() as $re){
		   $subjectid = $re['subjectId'];
		   
		   $this->db->select('round(AVG (mark_obtained),2) AS total ', FALSE);
		$obtained_mark_query = $this->db->where( array(
					'subject_id' => $subjectid,                                                        
							'class_id' => $class_id,
								'student_id' => $student_id));
	   
		   
			$marks = $query = $this->db->get('mark')->result_array();	
			foreach ($marks as $row5) {
		
			 if ($row5['total'] >= 0 || $row5['total'] != '') {
	//$grade = $this->crud_model->get_grade($row4['mark_obtained']);
	 $grade = $this->crud_model->get_aggretes_makr($row5['total'],'o');
		
				}
				
			 if($grade == $re['aggr_obtained']){                   					

                        array_push($obtained, $re['toDiv']);  //this one converts the derived divs into an array and they are attached to an array to a value (obtained)

                        
                    }	

			}
		   
		   
		   }
		   
		   
		    $aggr_obtained = max(", ", $obtained);  //this one separates the array values into commas and also find the biggest value in the array using the mx function

        //echo max($aggr_obtained);  //if the array is not empty the biggest value in the array is displayed
        if(empty($aggr_obtained)){  //this one checks if the array is empty thus it displays the current_division
            //echo 
			$final_div= $current_division;
        }else {
            $final_div =  max($aggr_obtained);  //if the array is not empty the biggest value in the array is displayed
            //echo $final_div;
            if($final_div < $current_division){
                //echo
				$final_div= $current_division;
            }else{
                //echo 
				$final_div;
            }
        }
		
		
		echo $final_div;
		   
		   } else {echo $final_div =$this->crud_model->get_division($total_agree,$class_level);}



?>"/>
                    <br/><br/>
                    POSITION IN CLASS:  <input style="border-bottom:1px dotted #2182C0; width:300px;" class="no-border-top no-border-left no-border-right" value="<?php  get_student_postion($class_id,$exam_id,$student_id)?>"/>
					&nbsp&nbsp  OUT OF: <input style="border-bottom:1px dotted #2182C0; width:260px;" class="no-border-top no-border-left no-border-right" value="&nbsp <?php number_of_students($class_id)?>"/><br/><br/>
					&nbsp&nbspAVERAGE:  <input style="border-bottom:1px dotted #2182C0; width:300px;" class="no-border-top no-border-left no-border-right" value="<?php echo $total_avrage;?>"/>
                    <br/>
			  <?php }?>
			  
			  <?php if($class_level=='a'){ ?>  TOTAL POINTS:  <input style="border-bottom:1px dotted #2182C0; width:300px;" class="no-border-top no-border-left no-border-right" value="&nbsp <?php sum_aleve_points($student_id,$exam_id);?>"/>
				    <br/>
			  <?php }?>
			  
                    <br/>
                    CLASS TEACHER'S REMARKS:  <input style="border-bottom:1px dotted #2182C0; width:100%;" class="no-border-top no-border-left no-border-right" value=""/>
                    <br/><br/>
                    
                    SIGNATURE: <input style="border-bottom:1px dotted #2182C0; width:50%;" class="no-border-top no-border-left no-border-right" value=""/>
                    <br/>
                    <br/>
                    HEAD TEACHER'S REMARKS:  <input style="border-bottom:1px dotted #2182C0; width:100%; color:#000; font-style:italic; font-family:'Segoe UI';" class="no-border-top no-border-left no-border-right" value="Good perfomance bamwine, keep it up and keep aiming for the the highest grades"/>
                    <br/><br/>
                    SIGNATURE: <input style="border-bottom:1px dotted #2182C0; width:50%;" class="no-border-top no-border-left no-border-right" value=""/>
                    <br/>
                    <br/>
                    NEXT TERM BEGINS ON:  <input style="border-bottom:1px dotted #2182C0; width:300px;color:#000; font-style:italic; font-family:'Segoe UI';" class="no-border-top no-border-left no-border-right" value=""/>
					&nbsp&nbsp  AND ENDS ON: <input style="border-bottom:1px dotted #2182C0; width:190px;color:#000; font-style:italic; font-family:'Segoe UI';" class="no-border-top no-border-left no-border-right" value=""/>
                    <br/><br/>
                    REQUIREMENTS FOR NEXT TERM:  <input style="border-bottom:1px dotted #2182C0; width:70%;" class="no-border-top no-border-left no-border-right" value=""/>
                    <br/><br/>
                    FEES:  <input style="border-bottom:1px dotted #2182C0; width:93%;" class="no-border-top no-border-left no-border-right" value=""/>
                    <br/><br/>
                    LAST TERM'S BALANCE:  <input style="border-bottom:1px dotted #2182C0; width:76%;" class="no-border-top no-border-left no-border-right" value=""/>
                    <br/><br/>
                    <br/><br/>
                    <center>
                        
                        <br/>
                        &copy; <?php echo $this->db->get_where('settings' , array('type' =>'school_name'))->row()->description;?><br/>
                        <small>
                        <i>"<?php echo $this->db->get_where('settings' , array('type' =>'school_motto'))->row()->description;?>"</i>
                        </small><br/>
						<small>
                        <i>located "<?php echo $this->db->get_where('settings' , array('type' =>'school_address'))->row()->description;?>"</i>
                        </small>
                    </center>
                    </div>

                </div>


            
        </div>


        
        </div>
    

    
    
    </div>
	
</div>

</div>

</div>


</body>
