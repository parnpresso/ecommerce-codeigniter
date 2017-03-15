<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index(){
		$query = $this->db->get('product_categories');
		$data['categories'] = $query->result();
		$this->load->model('model_product');
		$data['productlist'] = $this->model_product->get_product_list(4,1);

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
	public function category($id){
		$query = $this->db->get('product_categories');
		$data['categories'] = $query->result();
		$data['pagination'] = '';

		$this->db->select('product.*,product_categories.name AS cate_name');
    $this->db->join('product_categories', 'product.category_id = product_categories.id', 'left');
		$this->db->where('product_categories.id', $id);
    $this->db->from('product');
    $query = $this->db->get();

		$data['productlist'] = $query->result();

		$this->load->view('includes/header');
		$this->load->view('product', $data);
		$this->load->view('includes/footer');
	}
	public function search(){
		$query = $this->db->get('product_categories');
		$data['categories'] = $query->result();
		$data['pagination'] = '';

		$this->db->select('product.*,product_categories.name AS cate_name');
		$this->db->join('product_categories', 'product.category_id = product_categories.id', 'left');
		$this->db->from('product');
		$this->db->like('product.name', $this->input->post('text'));
		$query = $this->db->get();

		$data['productlist'] = $query->result();

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
	public function cart(){
		$this->load->view('includes/header');
		$this->load->view('cart');
		$this->load->view('includes/footer');
	}
	public function checkout(){
		$this->load->view('includes/header');
		$this->load->view('checkout');
		$this->load->view('includes/footer');
	}
	public function editprofile(){
		if ($this->session->userdata('is_logged_in')){
			$this->load->model('model_site');
			$data = array("profile" => $this->model_site->get_profile());

			$this->load->view('includes/header');
			$this->load->view('editprofile', $data);
			$this->load->view('includes/footer');
		} else {
      redirect('site/login');
    }

	}
	public function edit_profile_success() {
		if ($this->session->userdata('is_logged_in')){
			$this->load->view('includes/header');
      $this->load->view('edit_profile_success');
      $this->load->view('includes/footer');
		} else {
      redirect('site/login');
    }
	}
	public function subscribe(){
		$this->load->model('model_promotion');
		$data['categories'] = $this->model_promotion->get_promotion_category_list(999, 0);
		$this->load->view('includes/header');
		$this->load->view('subscribe', $data);
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
	public function single_product($id) {
		$this->load->model('model_product');
		$data['productlist'] = $this->model_product->get_product_list(6,1);
		$data['product'] = $this->model_product->get_product($id);
		$this->load->view('includes/header');
		$this->load->view('single_product', $data);
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
			$this->load->model('model_site');
			$this->model_site->add_user();
			redirect('site/login');
		} else {
			// Register has Failed
			$this->register();
		}
	}

	public function subscribing(){

		// INSERT email
		$data = array(
			'gen_email' => $this->input->post('email')
		);
		$this->db->insert('general_cus', $data);

		// SELECT email id
		$this->db->select('*');
    $this->db->from('general_cus');
    $this->db->where('gen_email', $this->input->post('email'));
    $fetch = $this->db->get();

		$email_id = $fetch->result();


		// SELECT Promotion categories id
		/*for ($x = 0; $x < sizeof($this->input->post())-1; $x++) {
      if ($this->input->post('cate'.$x) == ) {
        $cateid = $cate[$x]->id;
      }
    }*/

		var_dump($email_id[0]->id);
		//var_dump();
		break;
	}

	public function edit_profile_validation() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username_cus', 'Username', 'required|trim');
		$this->form_validation->set_rules('password_cus', 'Password', 'required|trim');
		$this->form_validation->set_rules('fname_cus', 'First name', 'required|trim');
		$this->form_validation->set_rules('lname_cus', 'Last name', 'required|trim');
		$this->form_validation->set_rules('email_cus', 'Email', 'required|trim');
		$this->form_validation->set_rules('idcard_cus', 'ID card', 'required|trim|numeric');
		$this->form_validation->set_rules('tel', 'Telephone', 'required|trim');
		$this->form_validation->set_rules('address', 'Address', 'required|trim');
		$this->form_validation->set_rules('district', 'District', 'required|trim');
		$this->form_validation->set_rules('province', 'Province', 'required|trim');
		$this->form_validation->set_rules('postcode', 'postcode', 'required|trim');
		if ($this->form_validation->run()){
			$this->load->model('model_site');
			$this->model_site->edit_profile();
			redirect('site/edit_profile_success');
		} else {
			$this->editprofile();
		}
	}

}
