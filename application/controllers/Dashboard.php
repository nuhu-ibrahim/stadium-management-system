<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(($this->session->userdata('logged_in') == ""))
		{		    
			redirect('User/login');	
        }
        
        $this->load->model('Dashboard_Model');
    }
	
	public function index()
	{
        $id = $this->session->userdata('user_id');
        $data['bookings'] = $this->Dashboard_Model->get_all_bookings();
        $data['available_events'] = $this->Dashboard_Model->get_available_events();

        $this->load->view('back_end/header');
        $this->load->view('back_end/dashboard', $data);
        $this->load->view('back_end/footer');
    }

    public function ticket($id)
	{
        $data['ticket'] = $this->Dashboard_Model->get_ticket_info($id);

        $this->load->view('back_end/header');
        $this->load->view('back_end/ticket', $data);
        $this->load->view('back_end/footer');
    }

    public function update_ticket()
    {
        $user_events_id = $this->input->post('user_events_id');
        $this->form_validation->set_rules('is_paid', 'Activate / Deactivate', 'required');

        if ($this->form_validation->run() == false)
        {

            $this->session->set_flashdata('flashError', array('message' => validation_errors()));
			
			redirect(base_url('Dashboard/ticket/' . $user_events_id));

        }else
        {

            $is_paid = $this->input->post('is_paid');
            $event_id = $this->input->post('event_id');

            if ($is_paid == 1)
            {
                $this->Dashboard_Model->decrease_seats($event_id);
            }elseif ($is_paid == 0)
            {
                $this->Dashboard_Model->increase_seats($event_id);
            }

            $data = array(
                'is_paid' => $this->input->post('is_paid')
            );

            $this->Dashboard_Model->update_ticket($user_events_id, $data);

            $this->session->set_flashdata('flashSuccess', array('message' => 'Ticket updated successfully.'));
            redirect(base_url('Dashboard/ticket/' . $user_events_id));

        }

    }
    
}
