<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('h_encrypt_decrypt'))
{
//function to encrypt and decrypt data like url ids account name codes etc
	function h_encrypt_decrypt($string,$action = false)
	{

	    $output = $string;

	    $encrypt_method = "AES-256-CBC";
	    //pls set your unique hashing key
	    $secret_key = 'bams';
	    $secret_iv = 'sheebly';

	    // hash
	    $key = hash('sha256', $secret_key);

	    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
	    $iv = substr(hash('sha256', $secret_iv), 0, 16);


	    if( $action == 'decrypt' )
	    {
	    	//decrypt the given text/string/number
	        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	    }
	    else
	    {
	    	//do the encyption given text/string/number
	        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
	        $output = base64_encode($output);  	
	    }

    	return $output;
	}
	}
	
	if ( ! function_exists('total_marks'))
{
	  function total_marks($student_id,$exam_id)
    {
		$CI	=&	get_instance();
		$CI->load->database();
		
		$class   =   $CI->db->get_where('student' , array('student_id'=>$student_id))->result_array();
		 foreach($class as $class){
	 
		 $subject   =   $CI->db->get_where('subject' , array('class_id'=>$class['class_id']))->result_array();
		 
 foreach($subject as $subjectrow){ 
       $CI->db->select_sum('mark_obtained',' total');
		$CI->db->where(array('student_id'=>$student_id,'exam_id'=>$exam_id,'subject_id'=>$subjectrow['subject_id']));
	$subjects = $CI->db->get('mark')->result_array();
		
        foreach ($subjects as $query) {
           $tt+=$query['total'];
			
 }
 
 }
 //echo'<td style="text-align: center;">'.$tt.'</td>';
 echo $tt;
 }


 
}
}


	if ( ! function_exists('average_marks'))
{
	  function average_marks($student_id,$exam_id)
    {
		$CI	=&	get_instance();
		$CI->load->database();
		
		 $class   =   $CI->db->get_where('student' , array('student_id'=>$student_id))->result_array();
 foreach($class as $class){
	 
		 $subject   =   $CI->db->get_where('subject' , array('class_id'=>$class['class_id']))->result_array();
		 $count=0;
 foreach($subject as $subjectrow){
		$count++;
       $CI->db->select('round(AVG (mark_obtained),2) AS total ', FALSE);	
    $CI->db->where(array('student_id'=>$student_id,'exam_id'=>$exam_id,'subject_id'=>$subjectrow['subject_id']));
	$query = $CI->db->get('mark')->result_array();		
        foreach ($query as $query) {
           
			 $tt+=$query['total'];
		
			
 }

		$av=($tt/$count);
 
 }
 //echo'<td style="text-align: center;">'.$av.'</td>';
 echo $av;
 }

 
 }
}



///////////////////////////////////////////////////////////////





	if ( ! function_exists('save_average_marks'))
{
	  function save_average_marks($student_id,$exam_id)
    {
		$CI	=&	get_instance();
		$CI->load->database();
		
		 $class   =   $CI->db->get_where('student' , array('student_id'=>$student_id))->result_array();
 foreach($class as $class){
	 
		 $subject   =   $CI->db->get_where('subject' , array('class_id'=>$class['class_id']))->result_array();
		 $count=0;
 foreach($subject as $subjectrow){
		$count++;
       $CI->db->select('round(AVG (mark_obtained),2) AS total ', FALSE);	
    $CI->db->where(array('student_id'=>$student_id,'exam_id'=>$exam_id,'subject_id'=>$subjectrow['subject_id']));
	$query = $CI->db->get('mark')->result_array();		
        foreach ($query as $query) {
           
			 $tt+=$query['total'];
		
			
 }

		$av=($tt/$count);
 
 }
 //echo'<td style="text-align: center;">'.$av.'</td>';
 //echo $av;
 }
$check   = $CI->db->get_where('avrage_postion' , array('student_id'=>$student_id,'exam_id'=>$exam_id));
if ($check->num_rows() <1)
{$CI->db->insert('avrage_postion', array('student_id' => $student_id,'exam_id' =>$exam_id,'average' => $av ));
}else{$CI->db->upadate('avrage_postion', array('student_id' => $student_id,'exam_id' =>$exam_id,'average' => $av ));
}

 }

 
 }

////////////////////////////////////////////////////////////////


	if ( ! function_exists('get_aggreates'))
{
	  function get_aggreates($student_id,$exam_id)
    {
		$CI	=&	get_instance();
		$CI->load->database();
				 $class   =   $CI->db->get_where('student' , array('student_id'=>$student_id))->result_array();
 foreach($class as $class){
	 
		 $subject   =   $CI->db->get_where('subject' , array('class_id'=>$class['class_id']))->result_array();
		 
 foreach($subject as $subjectrow){
	 
      $CI->db->select_sum('aggr',' total');
    $CI->db->where(array('student_id'=>$student_id,'exam_id'=>$exam_id,'subject_id'=>$subjectrow['subject_id']));
	$query = $CI->db->get('mark')->result_array();	
        foreach ($query as $query) {
			
			$hh+=$query['total'];
           
			
 }
 
 }
 //echo'<td style="text-align: center;">'. $hh.'</td>';
 echo $hh;
 }

 
}
}



	if ( ! function_exists('get_aggreates_grad'))
{
	  function get_aggreates_grad($student_id,$exam_id,$subject_id)
    {
		$CI	=&	get_instance();
		$CI->load->database();
				 $class   =   $CI->db->get_where('student' , array('student_id'=>$student_id))->result_array();
 foreach($class as $class){
	 
		 $subject   =   $CI->db->get_where('subject' , array('class_id'=>$class['class_id']))->result_array();
		 
 foreach($subject as $subjectrow){
	 
      //$CI->db->select_sum('aggr',' total');
    $CI->db->where(array('student_id'=>$student_id,'exam_id'=>$exam_id,'subject_id'=>$subject_id));
	$query = $CI->db->get('mark')->result_array();	
        foreach ($query as $query) {
			
			$hh=$query['aggr'];
			
           
			
 }
 
 }
 echo'<td style="text-align: center;">'. $hh.'</td>';
 }

 
}
}


	if ( ! function_exists('get_aggreates_comment'))
{
	  function get_aggreates_comment($student_id,$exam_id,$subject_id)
    {
		$CI	=&	get_instance();
		$CI->load->database();
				 $class   =   $CI->db->get_where('student' , array('student_id'=>$student_id))->result_array();
 foreach($class as $class){
	 
		 $subject   =   $CI->db->get_where('subject' , array('class_id'=>$class['class_id']))->result_array();
		 
 foreach($subject as $subjectrow){
	 
      //$CI->db->select_sum('aggr',' total');
    $CI->db->where(array('student_id'=>$student_id,'exam_id'=>$exam_id,'subject_id'=>$subject_id));
	$query = $CI->db->get('mark')->result_array();	
        foreach ($query as $query) {
			
			$hh=$query['comment'];
			
           
			
 }
 
 }
 echo'<td style="text-align: center;">'. $hh.'</td>';
 }

 
}
}


/////////////////////////////////////////////


	if ( ! function_exists('get_subject_mark'))
{
	  function get_subject_mark($student_id,$exam_id,$subject_id)
    {
		$CI	=&	get_instance();
		$CI->load->database();
		
		 $class   =   $CI->db->get_where('student' , array('student_id'=>$student_id))->result_array();
 foreach($class as $class){
	 
		 $subject   =   $CI->db->get_where('subject' , array('class_id'=>$class['class_id']))->result_array();
		 
 foreach($subject as $subjectrow){
	 
    $query =  $CI->db->get_where('mark' , array('student_id'=>$student_id,'exam_id'=>$exam_id,'subject_id'=>$subjectrow['subject_id']))->result_array();
	$query2 =  $CI->db->get_where('mark' , array('student_id'=>$student_id,'exam_id'=>$exam_id,'subject_id'=>$subjectrow['subject_id']));
		
		
	 $mark= $query2->num_rows() == 0 ? '0':  $query2->row()->mark_obtained;
	
	echo'<td style="text-align: center;">'. $mark.'</td>';
 }
 
 
 }

}
}



	if ( ! function_exists('get_subject_mark2'))
{
	  function get_subject_mark2($student_id,$exam_id,$subject_id)
    {
		$CI	=&	get_instance();
		$CI->load->database();
		
		 $class   =   $CI->db->get_where('student' , array('student_id'=>$student_id))->result_array();
 foreach($class as $class){
	 
		 $subject   =   $CI->db->get_where('subject' , array('class_id'=>$class['class_id']))->result_array();
		 
 foreach($subject as $subjectrow){
	 
    $query =  $CI->db->get_where('mark' , array('student_id'=>$student_id,'exam_id'=>$exam_id,'subject_id'=>$subject_id))->result_array();
	$query2 =  $CI->db->get_where('mark' , array('student_id'=>$student_id,'exam_id'=>$exam_id,'subject_id'=>$subject_id));
		
		
	 $mark= $query2->num_rows() == 0 ? '0':  $query2->row()->mark_obtained;
	
	
 }
 echo'<td style="text-align: center;">'. $mark.'</td>';
 
 }

}
}








if ( ! function_exists('get_division')){
  function get_division($student_id,$exam_id,$grade_point)
    {
		$CI	=&	get_instance();
		$CI->load->database();
        $aggr = 0;
        
	$CI->db->select_sum('aggr',' total');
    $CI->db->where(array('student_id'=>$student_id,'exam_id'=>$exam_id));
	$query = $CI->db->get('mark')->result_array();
            foreach($query as $rows){
		            $aggr = $rows['total'];
            
			}
			
		$queryr = $CI->db->query('SELECT class.class_level FROM class INNER JOIN student ON student.class_id = class.class_id WHERE student.student_id = "'.$student_id.'"');
		$grade_point = $queryr->row()->class_level;


        //getting the ranges
		$CI->db->where(array('grade_point'=>$grade_point));
       $query2 = $CI->db->get('aggre')->result_array();
         foreach($query2 as $rows2){

            $firstAggr = $rows2['mark_from'];
            $secondAggr = $rows2['mark_upto'];
            if ($aggr >= $firstAggr && $aggr < $secondAggr) {

                //current division
                $div = $rows2['division'];
			//echo'<td style="text-align: center;">'. $div.'</td>';
                //get_division_by_rules($div, $student_id,$exam_id);
		//echo'<td style="text-align: center;">'. get_division_by_rules($div, $student_id,$exam_id).'</td>';
                get_division_by_rules($div, $student_id,$exam_id);
            }
		 }
    }
	
	}
	
	
	if ( ! function_exists('get_division_by_rules')){
	    function get_division_by_rules($current_division, $student_id,$exam_id)
    {
		$CI	=&	get_instance();
		$CI->load->database();
		
        $obtained = array();
		$final_div=0;
        //getting the priority subjects
          $query = $CI->db->get('priority_mark_rules');
		  
		   if ($query->num_rows() >=1){
	      
        foreach($query->result_array() as $re){
            $subjectid = $re['subjectId'];

         	$rr   = $CI->db->get_where('mark' , array('student_id'=>$student_id,'exam_id'=>$exam_id,'subject_id'=>$subjectid));
			
			 if ($rr->num_rows() >=1){//echo'<td style="text-align: center;">0</td>';
	
               foreach($rr->result_array() as $r){

                    //now we have to check and see if the priority mark can push this student to the next grade
                    if($r['aggr'] == $re['aggr_obtained']){

                   					

                        array_push($obtained, $re['toDiv']);  //this one converts the derived divs into an array and they are attached to an array to a value (obtained)

                        //echo max(4, 5, 1, 6);
                    }
                }
				
				
				
	       } 
	
				
	}  
	
	} 
       
		
////////////////////////


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
return $final_div;
    }}
	
	
	
if ( ! function_exists('derive_point_grades')){
  function derive_point_grades($student_id,$exam_id)
    {
		
		$CI	=&	get_instance();
		$CI->load->database();
		
		
		$querysb = $CI->db->query('SELECT  subject.name,subject.subject_id,  subject.class_id FROM  subject   INNER JOIN student ON student.class_id = subject.class_id
WHERE   student.student_id = "'.$student_id.'"');


		
		$queryr = $CI->db->query('SELECT class.class_level FROM class INNER JOIN student ON student.class_id = class.class_id WHERE student.student_id = "'.$student_id.'"');
		$grade_point = $queryr->row()->class_level;

		foreach ($querysb->result() as $rowsbn){
		$rowsbn->subject_id;
		$sess = explode("-",$rowsbn->name);
		  $new_arr[]=$sess[0];
		 
		
		}
		
		$uniq_arr = array_unique($new_arr);
		// print_r($uniq_arr);
		
		 
		  foreach($uniq_arr as $key =>  $val) {
			
			  unset($uniq_arr[$key + 1]); 
			  
		$check   = $CI->db->get_where('a_level_points' , array('student_id'=>$student_id,'exam_id'=>$exam_id,'subject_name'=>$val));
			
			 if ($check->num_rows() >1){
				 
				 //insert
			
				 
		$query1 = $CI->db->query('SELECT aggr,GROUP_CONCAT(aggr) AS aggrcombo FROM mark WHERE student_id = "'.$student_id.'" and subj_name LIKE "%'.$val.'%" ORDER BY subj_name ASC');	
		foreach ($query1->result() as $row)
			{
				
		 $combination= $row->aggrcombo;
		$query2 = $CI->db->query('SELECT * FROM aggre WHERE grade_point LIKE "%'.$grade_point.'%" AND mark_from LIKE "'.$combination.'" ORDER BY grade_point ASC');	
		foreach($query2->result() as $row2){
		            
					 $point_grade = $row2->mark_upto;
					 
					   if ($point_grade == "A") {
                            $pointgrade = 6;
                        } else if ($point_grade == "B") {
                            $pointgrade = 5;
                        } else if ($point_grade == "C") {
                            $pointgrade = 4;
                        } else if ($point_grade == "D") {
                            $pointgrade = 3;
                        } else if ($point_grade == "E") {
                            $pointgrade = 2;
                        } else if ($point_grade == "O") {
                            $pointgrade = 1;
                        } else if ($point_grade == "F") {
                            $pointgrade = 0;
                        }
						
						
						
			}
		
			//echo $pointgrade;		
			}
        //$queryr = $CI->db->query('DELETE FROM `a_level_points` WHERE student_id ="'.$student_id.'" and exam_id="'.$exam_id.'" and subject_name="'.$val.'"');
		
					$CI->db->update('a_level_points',  array('student_id' => $student_id,'exam_id' =>$exam_id,'subject_name' => $val,'point_grade' => $pointgrade ));
         
			 }
			 else if ($check->num_rows() ==0){
				 
				
				$query1 = $CI->db->query('SELECT aggr,GROUP_CONCAT(aggr) AS aggrcombo FROM mark WHERE student_id = "'.$student_id.'" and subj_name LIKE "%'.$val.'%" ORDER BY aggr DESC');	
		foreach ($query1->result() as $row)
			{
				
		 $combination= $row->aggrcombo;
		$query2 = $CI->db->query('SELECT * FROM aggre WHERE grade_point LIKE "%'.$grade_point.'%" AND mark_from LIKE "'.$combination.'" ORDER BY grade_point ASC');	
		foreach($query2->result() as $row2){
		            
					 $point_grade = $row2->mark_upto;
					 
					   if ($point_grade == "A") {
                            $pointgrade = 6;
                        } else if ($point_grade == "B") {
                            $pointgrade = 5;
                        } else if ($point_grade == "C") {
                            $pointgrade = 4;
                        } else if ($point_grade == "D") {
                            $pointgrade = 3;
                        } else if ($point_grade == "E") {
                            $pointgrade = 2;
                        } else if ($point_grade == "O") {
                            $pointgrade = 1;
                        } else if ($point_grade == "F") {
                            $pointgrade = 0;
                        }
						
						
            
			}
		
					//echo $pointgrade;
			}
			
			//$queryr = $CI->db->query('DELETE FROM `a_level_points` WHERE student_id ="'.$student_id.'" and exam_id="'.$exam_id.'" and subject_name="'.$val.'" ');
		
				//$CI->db->update('a_level_points',  array('student_id' => $student_id,'exam_id' =>$exam_id,'subject_name' => $val,'point_grade' => $pointgrade ));
				$CI->db->insert('a_level_points', array('student_id' => $student_id,'exam_id' =>$exam_id,'subject_name' => $val,'point_grade' => $pointgrade ));
			
			 }
	
   }

   }}
	
	
if ( ! function_exists('number_of_students')){

	  function number_of_students($class_id)
    {
		$CI	=&	get_instance();
		$CI->load->database();
				 $queryr = $CI->db->query('SELECT count(*) as num FROM student where student.class_id = "'.$class_id.'"');
		$grade_point = $queryr->row()->num;

		echo $grade_point;
 return $grade_point;
}
}


if ( ! function_exists('get_student_postion')){

	  function get_student_postion($class_id,$exam_id,$student_id)
    {
		$CI	=&	get_instance();
		$CI->load->database();
				 $queryr = $CI->db->query('SELECT avrage_postion.*, FIND_IN_SET( average,( SELECT GROUP_CONCAT( average ORDER BY average DESC ) FROM avrage_postion WHERE class_id ="'.$class_id.'" and exam_id="'.$exam_id.'") ) AS rank FROM avrage_postion where student_id="'.$student_id.'" ORDER BY `rank` DESC ');
		$grade_point = $queryr->row()->rank;

		echo $grade_point;
 return $grade_point;
}
}



if ( ! function_exists('sum_aleve_points')){

	  function sum_aleve_points($student_id,$exam_id)
    {
		derive_point_grades($student_id,$exam_id);
		
		$CI	=&	get_instance();
		$CI->load->database();
				 $queryr = $CI->db->query('select sum(point_grade)as points FROM `a_level_points` WHERE student_id ="'.$student_id.'" and exam_id="'.$exam_id.'" ');
		$grade_point = $queryr->row()->points;

		echo $grade_point;
 return $grade_point;
}
}



	if ( ! function_exists('get_aggreates_gradf'))
{
	  function get_aggreates_gradf($student_id,$exam_id,$subject_id)
    {
		$CI	=&	get_instance();
		$CI->load->database();
				 $class   =   $CI->db->get_where('student' , array('student_id'=>$student_id))->result_array();
 foreach($class as $class){
	 
		 $subject   =   $CI->db->get_where('subject' , array('class_id'=>$class['class_id']))->result_array();
		 
 foreach($subject as $subjectrow){
	 
      //$CI->db->select_sum('aggr',' total');
    $CI->db->where(array('student_id'=>$student_id,'exam_id'=>$exam_id,'subject_id'=>$subject_id));
	$query = $CI->db->get('mark')->result_array();	
        foreach ($query as $query) {
			
			$hh=$query['aggr'];
			
           
			
 }
 
 }
 //echo'<td style="text-align: center;">'. $hh.'</td>';

 }

  echo 'a';
}
}



	if ( ! function_exists('get_subject_mark2f'))
{
	  function get_subject_mark2f($student_id,$exam_id,$subject_id)
    {
		$CI	=&	get_instance();
		$CI->load->database();
		
		 $class   =   $CI->db->get_where('student' , array('student_id'=>$student_id))->result_array();
 foreach($class as $class){
	 
		 $subject   =   $CI->db->get_where('subject' , array('class_id'=>$class['class_id']))->result_array();
		 
 foreach($subject as $subjectrow){
	 
    //$query =  $CI->db->get_where('mark' , array('student_id'=>$student_id,'exam_id'=>$exam_id,'subject_id'=>$subject_id))->result_array();
	$query2 =  $CI->db->get_where('mark' , array('student_id'=>$student_id,'exam_id'=>$exam_id,'subject_id'=>$subject_id));
		
		
	 $mark= $query2->num_rows() == 0 ? '0':  $query2->row()->mark_obtained;
	
	
 }
 echo'<td style="text-align: center;">'. $mark.'</td>';
 
 }

}
}



	if ( ! function_exists('average_marksf'))
{
	  function average_marksf($student_id,$exam_id)
    {
		
		$CI	=&	get_instance();
		$CI->load->database();
		
		
		 $class   =   $CI->db->get_where('student' , array('student_id'=>$student_id))->result_array();
 foreach($class as $class){
	 
		 $subject   =   $CI->db->get_where('subject' , array('class_id'=>$class['class_id']))->result_array();
		 $count=0;
 foreach($subject as $subjectrow){
		$count++;
       $CI->db->select('round(AVG (mark_obtained),2) AS total ', FALSE);	
    $CI->db->where(array('student_id'=>$student_id,'exam_id'=>$exam_id,'subject_id'=>$subjectrow['subject_id']));
	$query = $CI->db->get('mark')->result_array();		
        foreach ($query as $query) {
           
			 $tt+=$query['total'];
		
			
 }

		$av=($tt/$count);
 
 }
 //echo'<td style="text-align: center;">'.$av.'</td>';
 echo $av;
 }

 
 
 
 }
}





	if ( ! function_exists('average_marksf'))
{
	  function average_marksf($student_id,$exam_id)
    {
		
		$CI	=&	get_instance();
		$CI->load->database();
		
		
		 $class   =   $CI->db->get_where('student' , array('student_id'=>$student_id))->result_array();
 foreach($class as $class){
	 
		 $subject   =   $CI->db->get_where('subject' , array('class_id'=>$class['class_id']))->result_array();
		 $count=0;
 foreach($subject as $subjectrow){
		$count++;
       $CI->db->select('round(AVG (mark_obtained),2) AS total ', FALSE);	
    $CI->db->where(array('student_id'=>$student_id,'exam_id'=>$exam_id,'subject_id'=>$subjectrow['subject_id']));
	$query = $CI->db->get('mark')->result_array();		
        foreach ($query as $query) {
           
			 $tt+=$query['total'];
		
			
 }

		$av=($tt/$count);
 
 }
 //echo'<td style="text-align: center;">'.$av.'</td>';
 echo $av;
 }

 
 
 
 }
}


	if ( ! function_exists('get_tchr_initials'))
{

   function get_tchr_initials($teacher)
    {
        $expr = '/(?<=\s|^)[a-z]/i';
        preg_match_all($expr, $teacher, $matches);
        $result = implode('', $matches[0]);
        $result = strtoupper($result);
        return $result;

    }
}


	if ( ! function_exists('get_aggreates_commentf'))
{
	  function get_aggreates_commentf($student_id,$exam_id,$subject_id)
    {
		$CI	=&	get_instance();
		$CI->load->database();
				 $class   =   $CI->db->get_where('student' , array('student_id'=>$student_id))->result_array();
 foreach($class as $class){
	 
		 $subject   =   $CI->db->get_where('subject' , array('class_id'=>$class['class_id']))->result_array();
		 
 foreach($subject as $subjectrow){
	 
      //$CI->db->select_sum('aggr',' total');
    $CI->db->where(array('student_id'=>$student_id,'exam_id'=>$exam_id,'subject_id'=>$subject_id));
	$query = $CI->db->get('mark')->result_array();	
        foreach ($query as $query) {
			
			$hh=$query['comment'];
			
           
			
 }
 
 }
 echo $hh;
 }

 
}
}




 function check_lice()
    {	
	
	 $date_now = date("Y-m-d");
		$CI	=&	get_instance();
		$CI->load->database();
	$query = $CI->db->get('valid')->result_array();		
        foreach ($query as $row) {
           
		if ($date_now >= $row['enda']) {
        return 1;
    }else if ($date_now < $row['startd']){
       return 1;
    }
			 
		
			
 }
	
      return 0;
    }

	if ( ! function_exists('student_number')){

	  function student_number()
    {
		//substr(0,2)
	   $rand_id=rand(1000,9999);
	   $h=date('Y');
	   $g=substr($h,0,2);
		return $g.'/SS/'.$rand_id.'/PS';
}
}

?>