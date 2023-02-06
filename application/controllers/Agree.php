<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*	
 *	@author 	: Joyonto Roy
 *	date		: 27 september, 2014
 *	FPS School Management System Pro
 *	http://codecanyon.net/user/FreePhpSoftwares
 *	support@freephpsoftwares.com
 */

class Agree extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('crud_model');
        $this->load->database();
        $this->load->library('session');
        
    }
    
    /***default functin, redirects to login page if no admin logged in yet***/
    public function index()
    {
       
		$this->check_lice();
    }
    
     function check_lice()
    {	$today=date('Y-m-d');
		$now=date_create($today);
		$start=date_create($this->crud_model->get_key_val->row->startd);
        $end=date_create($this->crud_model->get_key_val->row->enda);
		
		//redirect(base_url() . 'index.php?Login/key_register');
		
		 if($now<$start){redirect(base_url() . 'index.php?Login/key_register');}
		 else if($now>=$end){redirect(base_url() . 'index.php?Login/key_register');}
		 else {redirect(base_url() . 'index.php?Login');}
		 
      
    }
    
}
