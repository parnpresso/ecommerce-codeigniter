<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index(){
		$query = $this->db->get('product_categories');
		$data['categories'] = $query->result();
		$this->load->model('model_product');
		$this->load->model('model_home');
		$data['productlist'] = $this->model_product->get_product_list(4,1);
		$data['contents'] = $this->model_home->get_all_contents();

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
	public function order(){

		$this->db->select('*');
		$this->db->from('order');
		$this->db->join('order_product', 'order_product.order_id = order.id', 'inner');
		$this->db->join('order_orderer', 'order_orderer.id = order.orderer_id', 'inner');
		$this->db->where('order_orderer.username', $this->session->userdata('username'));
		$query = $this->db->get();
		$temp = $query->result();

		// Separate order each bill
		$current_id = $temp[0]->order_id;
		$orderlist = array(array($temp[0]));

		$indexat = 0;
		for ($x=0; $x < sizeof($temp); $x++) {
			if ($current_id == $temp[$x]->order_id) {
				if ($x != 0) {
					array_push($orderlist[$indexat], $temp[$x]);
				}
			} else {
				$current_id = $temp[$x]->order_id;
				$indexat++;
				$orderlist[$indexat] = array($temp[$x]);
			}
		}


		$data['orders'] = $orderlist;

		$this->load->view('includes/header');
		$this->load->view('order', $data);
		$this->load->view('includes/footer');
	}
	public function view_order($id){
		$this->load->model('model_order');
		$data['order'] = $this->model_order->get_order($id);
		//$this->load->view('includes/header');
		$this->load->view('order_view', $data);
		//$this->load->view('includes/footer');
	}
	public function cart(){
		$data['items'] = array();
		for ($x = 0; $x < sizeof($this->session->userdata('cart'));$x++){
			$this->db->where('id', $this->session->userdata('cart')[$x]['productid']);
			$fetch = $this->db->get('product');
			$temp = $fetch->result();
			array_push($temp, array('quan' => $this->session->userdata('cart')[$x]['quantity']));
			array_push($data['items'],$temp);
		}

		$this->load->view('includes/header');
		$this->load->view('cart', $data);
		$this->load->view('includes/footer');
	}
	public function checkout(){
		$data['items'] = array();
		for ($x = 0; $x < sizeof($this->session->userdata('cart'));$x++){
			$this->db->where('id', $this->session->userdata('cart')[$x]['productid']);
			$fetch = $this->db->get('product');
			$temp = $fetch->result();
			array_push($temp, array('quan' => $this->session->userdata('cart')[$x]['quantity']));
			array_push($data['items'],$temp);
		}

		$this->load->model('model_user');
		$data['customer'] = $this->model_user->get_user($this->session->userdata('id'));

		$this->load->view('includes/header');
		$this->load->view('checkout',$data);
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
	public function send_contact(){

		$this->load->library('email');

		$this->email->from($this->input->post('email'), $this->input->post('name'));
		$this->email->to('parnpresso@gmail.com');
		$this->email->subject("[AE] Contact from customer");
		$data = $this->input->post('topic'). " - ". $this->input->post('message'). " (". $this->input->post('email'). ")";
		$this->email->message($data);

		if ($this->email->send()) {
			$this->load->view('includes/header');
			$this->load->view('contact_success');
			$this->load->view('includes/footer');
		} else {
			show_error($this->email->print_debugger());
			break;
		}

	}
	public function subscribing_success(){
		$this->load->view('includes/header');
		$this->load->view('subscribing_success');
		$this->load->view('includes/footer');
	}
	public function login(){
		$this->session->sess_destroy();
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
	public function checkout_success() {
		$this->load->view('includes/header');
		$this->load->view('checkout_success');
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
	public function add_cart(){
		var_dump($this->input->post());
		break;
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
		$this->form_validation->set_rules('idcard_cus', 'ID Card', 'required|trim|numeric|min_length[13]|max_length[13]');
		$this->form_validation->set_rules('tel', 'Tel', 'required|trim|numeric|min_length[10]|max_length[10]');
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
		//var_dump($this->input->post());
		//break;
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
		$this->load->model('model_promotion');
		$arraycate = $this->model_promotion->get_promotion_category_list(99,0);
		//var_dump($arraycate);
		//break;
		for ($x = 0; $x < sizeof($this->input->post())-1; $x++) {
			//echo 'cate'.$x;
			//echo $this->input->post('cate'.$x);
			for ($y = 0; $y < sizeof($arraycate); $y++) {
				if ($this->input->post('cate'.$x) == $arraycate[$y]->id) {
					//echo  $arraycate[$y]->id;
					// INSERT relationship
					$data = array(
						'general_cus_id' => $email_id[0]->id,
						'promotion_categories_id' => $arraycate[$y]->id
					);
					$this->db->insert('subscribe_relation', $data);
					var_dump($data);
					break;
	      }
			}
    }

		//var_dump($email_id[0]->id);
		//break;
		redirect('site/subscribing_success');
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

	public function carting($id) {
		//var_dump($this->input->post());
		//break;
		if ($this->session->userdata('cart') == NULL) {
			$temp = array('productid' => $id,
			'quantity' => $this->input->post('quantity'));
			$newdata = array(
			  'cart'  => array($temp)
			);
			$this->session->set_userdata($newdata);
		} else {
			$session_data = $this->session->userdata('cart');
			$temp = array('productid' => $id,
			'quantity' => $this->input->post('quantity'));
			array_push($session_data,$temp);
			$this->session->set_userdata("cart", $session_data);
		}
		redirect('site/product');
	}

	public function delete_item($id) {

		for ($x=0; $x < sizeof($this->session->userdata('cart')); $x++) {
			if ($this->session->userdata('cart')[$x]['productid'] == $id) {
				$temp = $this->session->userdata('cart');
				$this->session->unset_userdata('cart');
				for ($y=0; $y < sizeof($temp); $y++)
				{
				    if ($temp[$y]['productid'] == $id) {
				      unset($temp[$y]);
				   }
				}
				$sessiondata = array_values($temp);
				//$sessiondata = $temp;
				$this->session->set_userdata("cart", $sessiondata);
				//var_dump($temp);
				//break;
				redirect('site/cart');
			}
		}
		//var_dump($this->session->userdata('cart'));
		//break;
	}

	public function checkout_validation() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fname_cus', 'First name', 'required|trim');
		$this->form_validation->set_rules('lname_cus', 'Last name', 'required|trim');
		$this->form_validation->set_rules('email_cus', 'Email', 'required|trim');
		$this->form_validation->set_rules('idcard_cus', 'ID card', 'required|trim|numeric');
		$this->form_validation->set_rules('tel', 'Telephone', 'required|trim');
		$this->form_validation->set_rules('address', 'Address', 'required|trim');
		$this->form_validation->set_rules('district', 'Province', 'required|trim');
		$this->form_validation->set_rules('province', 'Province', 'required|trim');
		$this->form_validation->set_rules('postcode', 'postcode', 'required|trim');
		if ($this->form_validation->run()){
			$this->load->model('model_product');
			$this->model_product->checkout();
			redirect('site/checkout_success');
		} else {
			$this->checkout();
		}
	}
}
