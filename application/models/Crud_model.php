<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crud_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    function get_type_name_by_id($type, $type_id = '', $field = 'name') {
        return $this->db->get_where($type, array($type . '_id' => $type_id))->row()->$field;
    }

	
	function get_if_exist($mark_from) {
        $query =  $this->db->get_where('aggre' , array('mark_from'=>$mark_from,'grade_point'=>'a'));
		$mark= $query->num_rows() == 0 ? '0': '1';
        return $mark;
    }
	
    ////////STUDENT/////////////
	  function new_student_list() {
        $data = array();
        $sql = "select * from student order by student_id desc limit 0, 7";
        $rows = $this->db->query($sql)->result_array();
        foreach ($rows as $row) {
            $key = $row['student_id'];
            $face_file = 'uploads/student_image/' . $row['student_id'] . '.jpg';
            if (!file_exists($face_file)) {
                $face_file = 'uploads/default_avatar.jpg';
            }
            $row["face_file"] = base_url() . $face_file;

            array_push($data, $row);
        }
        return $data;
    }

    function get_students($class_id) {
        $query = $this->db->get_where('student', array('class_id' => $class_id));
        return $query->result_array();
    }

    function get_student_info($student_id) {
        $query = $this->db->get_where('student', array('student_id' => $student_id));
        return $query->result_array();
    }

    /////////TEACHER/////////////
    function get_teachers() {
        $query = $this->db->get('teacher');
        return $query->result_array();
    }

    function get_teacher_name($teacher_id) {
        $query = $this->db->get_where('teacher', array('teacher_id' => $teacher_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['name'];
    }

    function get_teacher_info($teacher_id) {
        $query = $this->db->get_where('teacher', array('teacher_id' => $teacher_id));
        return $query->result_array();
    }

    //////////SUBJECT/////////////
    function get_subjects() {
        $query = $this->db->get('subject');
        return $query->result_array();
    }

    function get_subject_info($subject_id) {
        $query = $this->db->get_where('subject', array('subject_id' => $subject_id));
        return $query->result_array();
    }

    function get_subjects_by_class($class_id) {
        $query = $this->db->get_where('subject', array('class_id' => $class_id));
        return $query->result_array();
    }

    function get_subject_name_by_id($subject_id) {
        $query = $this->db->get_where('subject', array('subject_id' => $subject_id))->row();
        return $query->name;
    }
	
	function get_subject_name_by_id2($subject_id) {
        $query = $this->db->get_where('subject', array('subject_id' => $subject_id))->row();
        return $query;
    }

    ////////////CLASS///////////
    function get_class_name($class_id) {
        $query = $this->db->get_where('class', array('class_id' => $class_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['name'];
    }

    function get_class_name_numeric($class_id) {
        $query = $this->db->get_where('class', array('class_id' => $class_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['name_numeric'];
    }

    function get_classes() {
        $query = $this->db->get('class');
        return $query->result_array();
    }

    function get_class_info($class_id) {
        $query = $this->db->get_where('class', array('class_id' => $class_id));
        return $query->result_array();
    }

    //////////EXAMS/////////////
    function get_exams() {
        $query = $this->db->get('exam');
        return $query->result_array();
    }

    function get_exam_info($exam_id) {
        $query = $this->db->get_where('exam', array('exam_id' => $exam_id));
        return $query->result_array();
    }

    //////////GRADES/////////////
    function get_grades() {
        $query = $this->db->get('grade');
        return $query->result_array();
    }

    function get_grade_info($grade_id) {
        $query = $this->db->get_where('grade', array('grade_id' => $grade_id));
        return $query->result_array();
    }

    function get_obtained_marks( $exam_id , $class_id , $subject_id , $student_id) {
        $marks = $this->db->get_where('mark' , array(
                                    'subject_id' => $subject_id,
                                        'exam_id' => $exam_id,
                                            'class_id' => $class_id,
                                                'student_id' => $student_id))->result_array();
                                        
        foreach ($marks as $row) {
            echo $row['mark_obtained'];
        }
    }

    function get_highest_marks( $exam_id , $class_id , $subject_id ) {
        $this->db->where('exam_id' , $exam_id);
        $this->db->where('class_id' , $class_id);
        $this->db->where('subject_id' , $subject_id);
        $this->db->select_max('mark_obtained');
        $highest_marks = $this->db->get('mark')->result_array();
        foreach($highest_marks as $row) {
            echo $row['mark_obtained'];
        }
    }

    function get_grade($mark_obtained) {
		
        $query = $this->db->get('grade')->result_array();
        //$grades = $query->result_array();
        foreach ($query as $row) {
            if ($mark_obtained >= $row['mark_from'] && $mark_obtained <= $row['mark_upto']){
			return $row['comment'];
			
			}
        }
		
    }
	
	    function get_grade2($mark_obtained) {
		
        $query = $this->db->get('grade')->result_array();
        //$grades = $query->result_array();
        foreach ($query as $row) {
            if ($mark_obtained >= $row['mark_from'] && $mark_obtained <= $row['mark_upto']){
			return $row['grade_point'];
			
			}
        }
		
    }
	
	
	function get_aggretes_makr($mark,$level)
    {
		 
			$query = $this->db->get_where('grade' , array('grade_point' =>$level))->result_array();
            foreach($query as $rows){				
				
				$firstMark = $rows['mark_from'];
                $secondMark = $rows['mark_upto'];
				if ($mark >= $firstMark && $mark <= $secondMark) {
				$aggre = $rows['name'];
				
				return $aggre;
				}
			}		
       
    }
	
	
	

    function create_log($data) {
        $data['timestamp'] = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));
        $data['ip'] = $_SERVER["REMOTE_ADDR"];
        $location = new SimpleXMLElement(file_get_contents('http://freegeoip.net/xml/' . $_SERVER["REMOTE_ADDR"]));
        $data['location'] = $location->City . ' , ' . $location->CountryName;
        $this->db->insert('log', $data);
    }

    function get_system_settings() {
        $query = $this->db->get('settings');
        return $query->result_array();
    }

    ////////BACKUP RESTORE/////////
    function create_backup($type) {
        $this->load->dbutil();


        $options = array(
            'format' => 'txt', // gzip, zip, txt
            'add_drop' => TRUE, // Whether to add DROP TABLE statements to backup file
            'add_insert' => TRUE, // Whether to add INSERT data to backup file
            'newline' => "\n"               // Newline character used in backup file
        );


        if ($type == 'all') {
            $tables = array('');
            $file_name = 'system_backup';
        } else {
            $tables = array('tables' => array($type));
            $file_name = 'backup_' . $type;
        }

        $backup = & $this->dbutil->backup(array_merge($options, $tables));


        $this->load->helper('download');
        force_download($file_name . '.sql', $backup);
    }

    /////////RESTORE TOTAL DB/ DB TABLE FROM UPLOADED BACKUP SQL FILE//////////
    function restore_backup() {
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/system_backup.sql');
        $this->load->dbutil();


        $prefs = array(
            'filepath' => 'uploads/system_backup.sql',
            'delete_after_upload' => TRUE,
            'delimiter' => ';'
        );
        $restore = & $this->dbutil->restore($prefs);
        unlink($prefs['filepath']);
    }

    /////////DELETE DATA FROM TABLES///////////////
    function truncate($type) {
        if ($type == 'all') {
            $this->db->truncate('student');
            $this->db->truncate('mark');
            $this->db->truncate('teacher');
            $this->db->truncate('subject');
            $this->db->truncate('class');
            $this->db->truncate('exam');
            //$this->db->truncate('grade');
			$this->db->truncate('attendance');
			$this->db->truncate('avrage_postion');
			$this->db->truncate('a_level_points');
			$this->db->truncate('class_routine');
			$this->db->truncate('dormitory');
			$this->db->truncate('expense_category');
			$this->db->truncate('invoice');
			$this->db->truncate('noticeboard');
			$this->db->truncate('parent');
			$this->db->truncate('payment');
			$this->db->truncate('section');
			$this->db->truncate('transport');
			$this->db->truncate('priority_mark_rules');
			
        } else {
            $this->db->truncate($type);
        }
    }

    ////////IMAGE URL//////////
    function get_image_url($type = '', $id = '') {
        if (file_exists('uploads/' . $type . '_image/' . $id . '.jpg'))
            $image_url = base_url() . 'uploads/' . $type . '_image/' . $id . '.jpg';
        else
            $image_url = base_url() . 'uploads/user.jpg';

        return $image_url;
    }

    ////////STUDY MATERIAL//////////
    function save_study_material_info()
    {
        $data['timestamp']      = strtotime($this->input->post('timestamp'));
        $data['title'] 		= $this->input->post('title');
        $data['description']    = $this->input->post('description');
        $data['file_name'] 	= $_FILES["file_name"]["name"];
        $data['file_type'] 	= $this->input->post('file_type');
        $data['class_id'] 	= $this->input->post('class_id');
        
        $this->db->insert('document',$data);
        
        $document_id            = $this->db->insert_id();
        move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/document/" . $_FILES["file_name"]["name"]);
    }
    
    function select_study_material_info()
    {
        $this->db->order_by("timestamp", "desc");
        return $this->db->get('document')->result_array(); 
    }
    
    function select_study_material_info_for_student()
    {
        $student_id = $this->session->userdata('student_id');
        $class_id   = $this->db->get_where('student', array('student_id' => $student_id))->row()->class_id;
        $this->db->order_by("timestamp", "desc");
        return $this->db->get_where('document', array('class_id' => $class_id))->result_array();
    }
    
    function update_study_material_info($document_id)
    {
        $data['timestamp']      = strtotime($this->input->post('timestamp'));
        $data['title'] 		= $this->input->post('title');
        $data['description']    = $this->input->post('description');
        $data['class_id'] 	= $this->input->post('class_id');
        
        $this->db->where('document_id',$document_id);
        $this->db->update('document',$data);
    }
    
    function delete_study_material_info($document_id)
    {
        $this->db->where('document_id',$document_id);
        $this->db->delete('document');
    }
    
    ////////private message//////
    function send_new_private_message() {
        $message    = $this->input->post('message');
        $timestamp  = strtotime(date("Y-m-d H:i:s"));

        $reciever   = $this->input->post('reciever');
        $sender     = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');

        //check if the thread between those 2 users exists, if not create new thread
        $num1 = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->num_rows();
        $num2 = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->num_rows();

        if ($num1 == 0 && $num2 == 0) {
            $message_thread_code                        = substr(md5(rand(100000000, 20000000000)), 0, 15);
            $data_message_thread['message_thread_code'] = $message_thread_code;
            $data_message_thread['sender']              = $sender;
            $data_message_thread['reciever']            = $reciever;
            $this->db->insert('message_thread', $data_message_thread);
        }
        if ($num1 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->row()->message_thread_code;
        if ($num2 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->row()->message_thread_code;


        $data_message['message_thread_code']    = $message_thread_code;
        $data_message['message']                = $message;
        $data_message['sender']                 = $sender;
        $data_message['timestamp']              = $timestamp;
        $this->db->insert('message', $data_message);

        // notify email to email reciever
        //$this->email_model->notify_email('new_message_notification', $this->db->insert_id());

        return $message_thread_code;
    }

    function send_reply_message($message_thread_code) {
        $message    = $this->input->post('message');
        $timestamp  = strtotime(date("Y-m-d H:i:s"));
        $sender     = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');


        $data_message['message_thread_code']    = $message_thread_code;
        $data_message['message']                = $message;
        $data_message['sender']                 = $sender;
        $data_message['timestamp']              = $timestamp;
        $this->db->insert('message', $data_message);

        // notify email to email reciever
        //$this->email_model->notify_email('new_message_notification', $this->db->insert_id());
    }

    function mark_thread_messages_read($message_thread_code) {
        // mark read only the oponnent messages of this thread, not currently logged in user's sent messages
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $this->db->where('sender !=', $current_user);
        $this->db->where('message_thread_code', $message_thread_code);
        $this->db->update('message', array('read_status' => 1));
    }

    function count_unread_message_of_thread($message_thread_code) {
        $unread_message_counter = 0;
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $messages = $this->db->get_where('message', array('message_thread_code' => $message_thread_code))->result_array();
        foreach ($messages as $row) {
            if ($row['sender'] != $current_user && $row['read_status'] == '0')
                $unread_message_counter++;
        }
        return $unread_message_counter;
    }
	
	
	function get_key_val() {
        $query = $this->db->get('valid');
        return $query;
    }
	
	function get_division($aggr,$class_level) {
        //getting the ranges
		$this->db->where(array('grade_point'=>$class_level));
       $query2 = $this->db->get('aggre')->result_array();
         foreach($query2 as $rows2){

            $firstAggr = $rows2['mark_from'];
            $secondAggr = $rows2['mark_upto'];
            if ($aggr >= $firstAggr && $aggr < $secondAggr) {

               
                $div = $rows2['division'];
			        //get_division_by_rules($div, $student_id,$exam_id);
					 return $div;
            }
		 }
       
    }
	
	function get_division_by_rules($student_id,$subjectid,$current_division) {
		
		 $obtained = array();
		$final_div=0;
		
		    $query = $this->db->get('priority_mark_rules');
		  
		   if ($query->num_rows() >=1){
	      
        foreach($query->result_array() as $re){
            $subjectid = $re['subjectId'];

         	$rr   = $this->db->get_where('mark' , array('student_id'=>$student_id,'subject_id'=>$subjectid));
			
			 if ($rr->num_rows() >=1){
	
               foreach($rr->result_array() as $r){

                    //now we have to check and see if the priority mark can push this student to the next grade
                    if($r['aggr'] == $re['aggr_obtained']){

                   					

                        array_push($obtained, $re['toDiv']);  //this one converts the derived divs into an array and they are attached to an array to a value (obtained)

                        
                    }
                }
				
				
				
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
		
	return $final_div;
	
	}
	
	
	  function save_average_marks($student_id,$exam_id)
    {
		
		
		
		 $class   =   $this->db->get_where('student' , array('student_id'=>$student_id))->result_array();
 foreach($class as $class){
	 
		 $subject   =   $this->db->get_where('subject' , array('class_id'=>$class['class_id']))->result_array();
		 $count=0;
 foreach($subject as $subjectrow){
		$count++;
       $this->db->select('round(AVG (mark_obtained),2) AS total ', FALSE);	
    $this->db->where(array('student_id'=>$student_id,'exam_id'=>$exam_id,'subject_id'=>$subjectrow['subject_id']));
	$query = $this->db->get('mark')->result_array();		
        foreach ($query as $query) {
           
			 $tt+=$query['total'];
		
			
 }

		$av=($tt/$count);
 
 }

 $class_id=$class['class_id'];
 }
$check   = $this->db->get_where('avrage_postion' , array('student_id'=>$student_id,'exam_id'=>$exam_id,'class_id' => $class_id));
if ($check->num_rows() <1)
{
	$this->db->insert('avrage_postion', array('student_id' => $student_id,'exam_id' =>$exam_id,'average' => $av,'class_id' => $class_id ));
	
	}else{
		
		$this->db->update('avrage_postion', array('student_id' => $student_id,'exam_id' =>$exam_id,'average' => $av,'class_id' => $class_id ));

		}
 //return 0;
 }


    function unread_message_of_curuser() {
        $data = array();
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $sql = "select a.*  from message a "
                . " inner join message_thread b on a.message_thread_code=b.message_thread_code "
                . " where b.reciever='" . $current_user . "' and a.read_status=0";
        $rows = $this->db->query($sql)->result_array();
        foreach ($rows as $row) {
            $sender = explode('-', $row['sender']);
            $sender_type = $sender[0];
            $sender_id = $sender[1];

            $sql = "select name from " . $sender_type . " where " . $sender_type . "_id=" . $sender_id;
            $result = $this->db->query($sql)->row_array();
            $row["sender_name"] = $result["name"];

            $key = $row['sender'];
            $face_file = 'uploads/' . $sender_type . '_image/' . $sender_id . '.jpg';
            if (!file_exists($face_file)) {
                $face_file = 'uploads/default_avatar.jpg';
            }
            $row["face_file"] = base_url() . $face_file;

//            $cur_time = date('Y-m-d H:i:s', time());
//            $send_time =date('Y-m-d H:i:s', $row["timestamp"]);
//            echo $cur_time;
//            $diff = date_diff($cur_time, $send_time);
            $ago = '';
            $sec = time() - $row["timestamp"];
            $year = (int) ($sec / 31556926);
            $month = (int) ($sec / 2592000);
            $day = (int) ($sec / 86400);
            $hou = (int) ($sec / 3600);
            $min = (int) ($sec / 60);
            if ($year > 0) {
                $ago = $year . ' year(s)';
            } else if ($month > 0) {
                $ago = $month . ' month(s)';
            } else if ($day > 0) {
                $ago = $day . ' day(s)';
            } else if ($hou > 0) {
                $ago = $hou . ' hour(s)';
            } else if ($min > 0) {
                $ago = $min . ' minute(s)';
            } else {
                $ago = $sec . ' second(s)';
            }

            $row["ago"] = $ago;

            array_push($data, $row);
        }
        return $data;
    }
	
	 function count_unread_message_of_curuser() {
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $sql = "select count(a.message_id) counts from message a "
                . " inner join message_thread b on a.message_thread_code=b.message_thread_code "
                . " where b.reciever='" . $current_user . "' and a.read_status=0";
        $row = $this->db->query($sql)->row_array();
        return $row["counts"];
    }
	
	function get_course_years($type_id) {
        return $this->db->get_where('class', array('class_id' => $type_id))->row()->study_p;
    }
	
	function get_courseunit_term($this_id,$this_name) {
		
		return $this->db->get_where('subject', array('subject_id' => $this_id))->row()->$this_name;
        //return $this->db->get_where('subject' , array('subject_id' => $this_id))->result_array();
		
        
    }
	
}
