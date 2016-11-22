<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('User');
	}

	public function index()
	{
		$this->load->view('main');
	}
	public function process_form()
	{
		if($this->input->post())
		{
			$this->load->helper(array('url'));

			$this->load->library('form_validation');

			$this->form_validation->set_rules('first_name', 'First Name', 'required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required');
			
			$this->form_validation->set_rules('password', 'Password', array('required', 'min_length[8]'));
			$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');


			if ($this->form_validation->run() == TRUE)
			{
				$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password'),
					'confirm_password' => $this->input->post('confirm_password')
					);
				$this->load->model('User'); 
				$this->User->create($data);
				$this->session->set_userdata('email', $this->input->post('email'));
				redirect('Users/results'); 
			}
			else
			{
				$this->session->set_flashdata('errors', validation_errors());
				redirect('Users/index');
			}
		}
		else 
			redirect(base_url);
	}
	public function results()
	{
		$this->load->model('User');
		$data = $this->User->get_by_email($this->session->userdata('email'));
		$this->load->view('results', array("data"=>$data));
			
	}

	public function login() 
	{
		if ($this->input->post())
		{
			$this->load->helper(array('url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
		}


		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/Users/index');
		}
		else
		{
			$this->load->model('PokeUser');

			$user = $this->User->get_by_email($this->input->post('email'));


			if($user){

				if($this->input->post("password") == $user["password"]){
					$userdata = $this->User->get_all_users();
					$pokedata = $this->PokeUser->get_all_pokes();
					$this->session->set_userdata('firstname', $user['first_name']);
					$this->session->set_userdata('id', $user['id']);
					$this->load->view("logged_in", array('users' => $userdata, 'pokeusers' => $pokedata));	
				} 
				else{
					redirect('/Users/index');
				}
			} 
			else{
				redirect('/Users/index');
			}
		}
	}

	public function poke($id){
		$this->load->model('User');
		$this->User->poke_user($id);
		$this->load->model('PokeUser');
		$this->PokeUser->poke_the_user($id);
		$userdata = $this->User->get_all_users();
		$pokedata = $this->PokeUser->get_all_pokes();
		// $data = array();
		// $data['users'] = $userdata;
		// $data['pokeusers'] = $pokedata;
		$this->load->view("logged_in", array('users' => $userdata, 'pokeusers' => $pokedata));	
	}
}

?>