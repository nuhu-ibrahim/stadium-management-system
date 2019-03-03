<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(($this->session->userdata('logged_in') == ""))
		{		    
			redirect('User/login');	
        }
        
        $this->load->model('Report_Model');
    }

    public function get_report()
	{

        $this->form_validation->set_rules('start_date_time', 'Start Date', 'required');
        $this->form_validation->set_rules('end_date_time', 'End Date', 'required');
        
        if ($this->form_validation->run() == false)
        {

            $this->session->set_flashdata('flashError', array('message' => validation_errors()));
			redirect(base_url('Report/create'));

        }else
        {
            $start_date_time = $this->input->post('start_date_time');
            $end_date_time = $this->input->post('end_date_time');

            $data['report'] = $this->Report_Model->get_report($start_date_time, $end_date_time);

            $this->load->view('back_end/header');
            $this->load->view('back_end/reports/get_report', $data);
            $this->load->view('back_end/footer');

            //$this->session->set_flashdata('flashSuccess', array('message' => 'Event added successfully.'));
            //redirect(base_url('Event/create'));

        }

    }

    public function create()
	{
        $this->load->view('back_end/header');
        $this->load->view('back_end/reports/create');
        $this->load->view('back_end/footer');
    }

}