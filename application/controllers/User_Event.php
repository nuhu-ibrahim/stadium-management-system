<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Event extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(($this->session->userdata('logged_in') == ""))
		{		    
			redirect('User/login');	
        }
        
        $this->load->model('Event_Model');
        $this->load->model('User_Event_Model');
    }
	
	public function index($id)
	{
        $data['user_events'] = $this->User_Event_Model->get_user_events($id);

        $this->load->view('back_end/header');
        $this->load->view('back_end/user_event/index', $data);
        $this->load->view('back_end/footer');
    }
	
	public function create()
	{
        $data['events'] = $this->User_Event_Model->get_events();

        $this->load->view('back_end/header');
        $this->load->view('back_end/user_event/create', $data);
        $this->load->view('back_end/footer');
    }

    public function store()
    {
        $this->form_validation->set_rules('event_id', 'Event Title', 'required');

        if ($this->form_validation->run() == false)
        {

            $this->session->set_flashdata('flashError', array('message' => validation_errors()));
			
			redirect(base_url('User_Event/create'));

        }else
        {

            $data = array(
                'user_id' => $this->input->post('user_id'),
                'event_id' => $this->input->post('event_id')
            );

            $this->User_Event_Model->add_event($data);

            $this->session->set_flashdata('flashSuccess', array('message' => 'Event added successfully.'));
            redirect(base_url('User_Event/create'));

        }

    }

    public function receipt($event_id, $user_id)
    {
        $data['reciept'] = $this->User_Event_Model->receipt($event_id, $user_id);

        $this->load->view('back_end/user_event/reciept', $data);
    }

    public function get_event_details()
	{
		$id = $this->input->post('event_id');
		$data = $this->User_Event_Model->get_event_details($id);
		echo json_encode($data);
	}
    
}
