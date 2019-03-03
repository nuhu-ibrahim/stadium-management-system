<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class User extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {		
		parent::__construct();
		$this->load->model('User_Model');		
	}
	
	
	public function index() {
		

		
	}
	
	/**
	 * register function.
	 * 
	 * @access public
	 * @return void
	 */
	public function register() {

		$this->load->view('user/header');
		$this->load->view('user/register');
		$this->load->view('user/footer');
		
	}

	public function process_registration()
	{

		// set validation rules
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		
		if ($this->form_validation->run() === false) {

			$this->session->set_flashdata('flashError', array('message' => validation_errors()));
			
			redirect(base_url('User/register'));
			
		} else {
			
			// set variables from the form
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$phone_number = $this->input->post('phone_number');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			if ($this->User_Model->create_user($first_name, $last_name, $phone_number, $email, $password)) {
				
				redirect(base_url('User/login'));
				
			}
			
		}

	}
		
	/**
	 * login function.
	 * 
	 * @access public
	 * @return void
	 */
	public function login() {
		
		$this->load->view('user/header');
		$this->load->view('user/login');
		$this->load->view('user/footer');
		
	}

	public function process_login()
	{

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === false) {
			
			$this->session->set_flashdata('flashError', array('message' => validation_errors()));
			
			redirect(base_url('User/login'));
			
		} else {

			// set variables from the form
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			if ($this->User_Model->resolve_user_login($email, $password)) {
				
				$user_id = $this->User_Model->get_user_id_from_email($email);
				$user = $this->User_Model->get_user($user_id);
				
				// set session user datas
				$_SESSION['user_id']      = (int)$user->id;
				$_SESSION['email']     = (string)$user->email;
				$_SESSION['logged_in']    = (bool)true;
				$_SESSION['is_admin']     = (bool)$user->is_admin;
				
				// user login ok
				redirect(base_url('Dashboard/index'));

			}else {
				redirect(base_url('User/login'));
			}

		}

	}
	
	/**
	 * logout function.
	 * 
	 * @access public
	 * @return void
	 */
	public function logout() {
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			
			// user logout ok
			redirect(base_url('/'));
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('/');
			
		}
		
	}
	
}
