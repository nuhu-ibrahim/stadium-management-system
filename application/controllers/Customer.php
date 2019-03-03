<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(($this->session->userdata('logged_in') == ""))
		{		    
			redirect('User/login');	
        }
        
        $this->load->model('Customer_Model');
    }
	
	public function index()
	{
        $data['customers'] = $this->Customer_Model->get_customers();

        $this->load->view('back_end/header');
        $this->load->view('back_end/customers', $data);
        $this->load->view('back_end/footer');
    }

}