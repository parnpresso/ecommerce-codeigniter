<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index(){
		$query = $this->db->get('product_categories');
		$data['categories'] = $query->result();

		$this->load->view('includes/header');
		$this->load->view('home', $data);
		$this->load->view('includes/footer');
	}
	public function product(){
		$query = $this->db->get('product_categories');
		$data['categories'] = $query->result();

		$this->load->library('pagination');
		$this->load->model('model_product');

		$config['base_url'] = base_url('site/product'). '/page/';
		$config['total_rows'] = $this->model_product->get_product_total_row();
		$config['per_page'] = 9;
		$config['uri_segment'] = 4;

		// Pagination style
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$this->pagination->initialize($config);
		$page = $this->uri->segment(4,0);
		$data['pagination'] = $this->pagination->create_links();
		$data['productlist'] = $this->model_product->get_product_list($config['per_page'], $page);

		$this->load->view('includes/header');
		$this->load->view('product', $data);
		$this->load->view('includes/footer');
	}
	public function aboutus(){
		$this->load->view('includes/header');
		$this->load->view('aboutus');
		$this->load->view('includes/footer');
	}
	public function contact(){
		$this->load->view('includes/header');
		$this->load->view('contact');
		$this->load->view('includes/footer');
	}
	public function login(){
		$this->load->view('includes/header');
		$this->load->view('login');
		$this->load->view('includes/footer');
	}
	public function logout() {
		$this->session->sess_destroy();
		redirect('site');
	}
	public function register() {
		$this->load->view('includes/header');
		$this->load->view('register');
		$this->load->view('includes/footer');
	}
	public function singleproduct() {
		$this->load->view('includes/header');
		$this->load->view('singleproduct');
		$this->load->view('includes/footer');
	}


	public function login_validation() {
		$this->load->library('form_validation');
		// In required | is a extra options
		// callback_validate_credentials is call a function "validate_credentials"
		$this->form_validation->set_rules('username', 'Username', 'required|trim|callback_validate_credentials');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		// Ic condition, it required you to enter the correct input that you set_rules
		// from above, the command that check is run()
		if ($this->form_validation->run()){
			// Set session
			$this->load->model('model_site');
			$this->model_site->setSession();
			// For view a session component
			// var_dump($this->session->userdata('session_id'));
			redirect('site');
		} else {
			$this->login();
		}
		// For debug, it will show a POST value
		// echo $this->input->post('password');
	}
	// Check User Info
	public function validate_credentials(){
		$this->load->model('model_site');
		if ($this->model_site->can_log_in()) {
			return true;
		} else {
			$this->form_validation->set_message('validate_credentials', 'Incorrect Username or Password');
			return false;
		}
	}


	public function register_validation() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email_cus', 'Email', 'required|trim|valid_email|is_unique[customer.email_cus]');
		$this->form_validation->set_rules('username_cus', 'Username', 'required|trim|min_length[4]|max_length[15]|is_unique[customer.username_cus]');
		$this->form_validation->set_rules('password_cus', 'Password', 'required|trim|min_length[8]|max_length[30]');
		$this->form_validation->set_rules('fname_cus', 'First Name', 'required|trim');
		$this->form_validation->set_rules('lname_cus', 'Last Name', 'required|trim');
		$this->form_validation->set_rules('address', 'Address', '');
		$this->form_validation->set_rules('com_add', 'Company Address', '');
		$this->form_validation->set_rules('idcard_cus', 'ID Card', 'required|trim|numeric');
		$this->form_validation->set_rules('tel', 'Tel', 'required|trim');
		// Change error message
		$this->form_validation->set_message('is_unique', '%s already exists.');

		if ($this->form_validation->run()) {
			// Add them to the CUSTOMER db
			$this->load->model('model_users');
			$this->model_users->add_user();
			redirect('site/login');
		} else {
			// Register has Failed
			$this->register();
		}
	}

}
