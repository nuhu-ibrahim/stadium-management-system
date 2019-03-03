<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(($this->session->userdata('logged_in') == ""))
		{		    
			redirect('User/login');	
        }
        
        $this->load->model('Event_Model');

    }
	
	public function index()
	{
        $data['events'] = $this->Event_Model->get_events();

        $this->load->view('back_end/header');
        $this->load->view('back_end/event/index', $data);
        $this->load->view('back_end/footer');
    }
	
	public function create()
	{
        $this->load->view('back_end/header');
        $this->load->view('back_end/event/create');
        $this->load->view('back_end/footer');
    }

    public function store()
    {
        $this->form_validation->set_rules('event_title', 'Event Title', 'required');
        $this->form_validation->set_rules('start_date_time', 'Start Date / Time', 'required');
        $this->form_validation->set_rules('end_date_time', 'End Date / Time', 'required');
        $this->form_validation->set_rules('event_description', 'Event Description', 'required');
        $this->form_validation->set_rules('available_seats', 'Available Seats', 'required');

        if ($this->form_validation->run() == false)
        {

            $this->session->set_flashdata('flashError', array('message' => validation_errors()));
			
			redirect(base_url('Event/create'));

        }else
        {

            $data = array(
                'event_title' => $this->input->post('event_title'),
                'start_date_time' => $this->input->post('start_date_time'),
                'end_date_time' => $this->input->post('end_date_time'),
                'event_description' => $this->input->post('event_description'),
                'amount' => $this->input->post('amount'),
                'available_seats' => $this->input->post('available_seats')
            );

            $this->Event_Model->add_event($data);

            $this->session->set_flashdata('flashSuccess', array('message' => 'Event added successfully.'));
            redirect(base_url('Event/create'));

        }

    }

    public function delete($id)
	{
        $count_event_bookings = $this->Event_Model->confirm_bookings($id);

        if ($count_event_bookings > 0)
        {
            $this->session->set_flashdata('flashError', array('message' => 'Sorry, this event has been booked.'));
        }else 
        {
            $this->Event_Model->delete_event($id);
            $this->session->set_flashdata('flashSuccess', array('message' => 'Successfully deleted event.'));
        }
		
        redirect(base_url() . 'Event/index');
	}
    
}
