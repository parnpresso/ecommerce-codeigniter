<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index() {
    $this->home();
	}
  public function login() {
		$this->session->sess_destroy();
    $this->load->view('login-admin');
  }
  public function logout() {
		$this->session->sess_destroy();
		redirect('admin/login');
	}
  public function home() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_product');
			$this->load->model('model_order');
			$this->load->model('model_user');
			$this->load->model('model_promotion');
			$data['amount_product'] = $this->model_product->get_product_total_row();
			$data['amount_order'] = $this->model_order->get_order_total_row();
			$data['amount_user'] = $this->model_user->get_user_total_row();
			$data['amount_promotion'] = $this->model_promotion->get_promotion_total_row();

      $this->load->view('includes/header-admin');
      $this->load->view('home-admin', $data);
      $this->load->view('includes/footer-admin');
		} else {
      redirect('admin/login');
    }
  }

	/// PRODUCT MANAGEMENT
  public function product() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){

			$this->load->library('pagination');
			$this->load->model('model_product');

			$config['base_url'] = base_url('admin/product'). '/page/';
			$config['total_rows'] = $this->model_product->get_product_total_row();
			$config['per_page'] = 10;
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


      $this->load->view('includes/header-admin');
      $this->load->view('product_admin', $data);
      $this->load->view('includes/footer-admin');
		} else {
      redirect('admin/login');
    }
  }
	public function search_product() {
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_product');
			$data = array("productlist" => $this->model_product->search_product($this->input->post('username')));
      $this->load->view('includes/header-admin');
      $this->load->view('product_admin', $data);
      $this->load->view('includes/footer-admin');
		} else {
      redirect('admin/login');
    }
	}
	public function add_product() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_product');
			$data = array("categories" => $this->model_product->get_categories());
      $this->load->view('product_add_admin', $data);
		} else {
      redirect('admin/login');
    }
  }
	public function add_product_success() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
      $this->load->view('includes/header-admin');
      $this->load->view('product_add_success_admin');
      $this->load->view('includes/footer-admin');
		} else {
      redirect('admin/login');
    }
  }
	public function edit_product($id) {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_product');
			$data = array("product" => $this->model_product->get_product($id), "categories" => $this->model_product->get_categories());
      $this->load->view('product_edit_admin', $data);
		} else {
      redirect('admin/login');
    }
  }
	public function edit_product_success() {
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->view('includes/header-admin');
			$this->load->view('product_edit_success_admin');
			$this->load->view('includes/footer-admin');
		} else {
			redirect('admin/login');
		}
	}
	public function view_product() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_product');
			$data = array("product" => $this->model_product->get_product($this->uri->segment(3)), "categories" => $this->model_product->get_categories());
      $this->load->view('product_view_admin', $data);
		} else {
      redirect('admin/login');
    }
  }
	public function delete_product($id){
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_product');
			$this->model_product->delete_product($id);
			$this->load->view('includes/header-admin');
			$this->load->view('product_delete_success_admin');
			$this->load->view('includes/footer-admin');
		} else {
			redirect('admin/login');
		}
	}

	// CATEGORY MANAGEMENT
	public function category() {
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){

			$this->load->library('pagination');
			$this->load->model('model_product');

			$config['base_url'] = base_url('admin/category'). '/page/';
			$config['total_rows'] = $this->model_product->get_category_total_row();
			$config['per_page'] = 10;
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
			$data['categorylist'] = $this->model_product->get_category_list($config['per_page'], $page);


      $this->load->view('includes/header-admin');
      $this->load->view('category_admin', $data);
      $this->load->view('includes/footer-admin');
		} else {
      redirect('admin/login');
    }
  }
	public function add_category() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
      $this->load->view('category_add_admin');
		} else {
      redirect('admin/login');
    }
  }
	public function add_category_success() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
      $this->load->view('includes/header-admin');
      $this->load->view('category_add_success_admin');
      $this->load->view('includes/footer-admin');
		} else {
      redirect('admin/login');
    }
  }
	public function edit_category($id) {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_product');
			$data = array("category" => $this->model_product->get_category($id));
      $this->load->view('category_edit_admin', $data);
		} else {
      redirect('admin/login');
    }
  }
	public function edit_category_success() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
      $this->load->view('includes/header-admin');
      $this->load->view('promotion_category_edit_success_admin');
      $this->load->view('includes/footer-admin');
		} else {
      redirect('admin/login');
    }
  }
	public function delete_category($id){
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_product');
			$this->model_product->delete_category($id);
			$this->load->view('includes/header-admin');
			$this->load->view('category_delete_success_admin');
			$this->load->view('includes/footer-admin');
		} else {
			redirect('admin/login');
		}
	}

	/// STAFF MANAGEMENT
	public function staff() {
    if ($this->session->userdata('access') == 'ADMIN'){

			$this->load->library('pagination');
			$this->load->model('model_staff');

			$config['base_url'] = base_url('admin/staff'). '/page/';
			$config['total_rows'] = $this->model_staff->get_staff_total_row();
			$config['per_page'] = 10;
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
			$data['stafflist'] = $this->model_staff->get_staff_list($config['per_page'], $page);


      $this->load->view('includes/header-admin');
      $this->load->view('staff_admin', $data);
      $this->load->view('includes/footer-admin');
		} else {
      redirect('admin/login');
    }
  }
	public function search_staff() {
		if ($this->session->userdata('access') == 'ADMIN'){
			$this->load->model('model_staff');
			$data = array("stafflist" => $this->model_staff->search_staff($this->input->post('username')));
      $this->load->view('includes/header-admin');
      $this->load->view('staff_admin', $data);
      $this->load->view('includes/footer-admin');
		} else {
      redirect('admin/login');
    }
	}
	public function add_staff() {
    if ($this->session->userdata('access') == 'ADMIN' ){
			$this->load->model('model_staff');
			$data = array("access" => $this->model_staff->get_access());
      $this->load->view('staff_add_admin', $data);
		} else {
      redirect('admin/login');
    }
  }
	public function add_staff_success() {
    if ($this->session->userdata('access') == 'ADMIN' ){
      $this->load->view('includes/header-admin');
      $this->load->view('staff_add_success_admin');
      $this->load->view('includes/footer-admin');
		} else {
      redirect('admin/login');
    }
  }
	public function edit_staff($id) {
		if ($this->session->userdata('access') == 'ADMIN' ){
			$this->load->model('model_staff');
			$data = array("staff" => $this->model_staff->get_staff($id));
			$this->load->view('staff_edit_admin', $data);
		} else {
			redirect('admin/login');
		}
	}
	public function edit_staff_success() {
		if ($this->session->userdata('access') == 'ADMIN' ){
			$this->load->view('includes/header-admin');
			$this->load->view('staff_edit_success_admin');
			$this->load->view('includes/footer-admin');
		} else {
			redirect('admin/login');
		}
	}
	public function view_staff() {
		if ($this->session->userdata('access') == 'ADMIN' ){
			$this->load->model('model_staff');
			$data = array("staff" => $this->model_staff->get_staff($this->uri->segment(3)));
			$this->load->view('staff_view_admin', $data);
		} else {
			redirect('admin/login');
		}
	}
	public function delete_staff($id){
		if ($this->session->userdata('access') == 'ADMIN' ){
			$this->load->model('model_staff');
			$this->model_staff->delete_staff($id);
			$this->load->view('includes/header-admin');
			$this->load->view('staff_delete_success_admin');
			$this->load->view('includes/footer-admin');
		} else {
			redirect('admin/login');
		}
	}

	/// USER MANAGEMENT
	public function user() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){

			$this->load->library('pagination');
			$this->load->model('model_user');

			$config['base_url'] = base_url('admin/user'). '/page/';
			$config['total_rows'] = $this->model_user->get_user_total_row();
			$config['per_page'] = 10;
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
			$data['userlist'] = $this->model_user->get_user_list($config['per_page'], $page);

      $this->load->view('includes/header-admin');
      $this->load->view('user_admin', $data);
      $this->load->view('includes/footer-admin');
		} else {
      redirect('admin/login');
    }
  }
	public function add_user() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
      $this->load->view('user_add_admin');
		} else {
      redirect('admin/login');
    }
  }
	public function add_user_success() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
      $this->load->view('includes/header-admin');
      $this->load->view('user_add_success_admin');
      $this->load->view('includes/footer-admin');
		} else {
      redirect('admin/login');
    }
  }
	public function edit_user($id) {
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_user');
			$data = array("user" => $this->model_user->get_user($id));
			$this->load->view('user_edit_admin', $data);
		} else {
			redirect('admin/login');
		}
	}
	public function edit_user_success() {
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->view('includes/header-admin');
			$this->load->view('user_edit_success_admin');
			$this->load->view('includes/footer-admin');
		} else {
			redirect('admin/login');
		}
	}
	public function view_user() {
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_user');
			$data = array("user" => $this->model_user->get_user($this->uri->segment(3)));
			$this->load->view('user_view_admin', $data);
		} else {
			redirect('admin/login');
		}
	}
	public function delete_user($id){
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_user');
			$this->model_user->delete_user($id);
			$this->load->view('includes/header-admin');
			$this->load->view('user_delete_success_admin');
			$this->load->view('includes/footer-admin');
		} else {
			redirect('admin/login');
		}
	}
	public function search_user() {
		if ($this->session->userdata('access') == 'ADMIN'){
			$this->load->model('model_user');
			$data = array("userlist" => $this->model_user->search_user($this->input->post('username')));
      $this->load->view('includes/header-admin');
      $this->load->view('user_admin', $data);
      $this->load->view('includes/footer-admin');
		} else {
      redirect('admin/login');
    }
	}

	public function promotion() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){

			$this->load->library('pagination');
			$this->load->model('model_promotion');

			$config['base_url'] = base_url('admin/promotion'). '/page/';
			$config['total_rows'] = $this->model_promotion->get_promotion_total_row();
			$config['per_page'] = 10;
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
			$data['promotionlist'] = $this->model_promotion->get_promotion_list($config['per_page'], $page);


      $this->load->view('includes/header-admin');
      $this->load->view('promotion_admin', $data);
      $this->load->view('includes/footer-admin');
		} else {
        redirect('admin/login');
    }
  }
	public function search_promotion() {
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_promotion');
			$data = array("promotionlist" => $this->model_promotion->search_promotion($this->input->post('name')));
			$this->load->view('includes/header-admin');
			$this->load->view('promotion_admin', $data);
			$this->load->view('includes/footer-admin');
		} else {
			redirect('admin/login');
		}
	}
	public function add_promotion() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_promotion');
			$data = array("categories" => $this->model_promotion->get_promotion_categories());
      $this->load->view('promotion_add_admin', $data);
		} else {
      redirect('admin/login');
    }
  }
	public function add_promotion_success() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
      $this->load->view('includes/header-admin');
      $this->load->view('promotion_add_success_admin');
      $this->load->view('includes/footer-admin');
		} else {
      redirect('admin/login');
    }
  }
	public function edit_promotion($id) {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_promotion');
			$data = array("promotion" => $this->model_promotion->get_promotion($id), "categories" => $this->model_promotion->get_promotion_categories());
      $this->load->view('promotion_edit_admin', $data);
		} else {
      redirect('admin/login');
    }
  }
	public function edit_promotion_success() {
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->view('includes/header-admin');
			$this->load->view('promotion_edit_success_admin');
			$this->load->view('includes/footer-admin');
		} else {
			redirect('admin/login');
		}
	}
	public function view_promotion() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_promotion');
			$data = array("promotion" => $this->model_promotion->get_promotion($this->uri->segment(3)), "categories" => $this->model_promotion->get_promotion_categories());
      $this->load->view('promotion_view_admin', $data);
		} else {
      redirect('admin/login');
    }
  }
	public function delete_promotion($id){
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_promotion');
			$this->model_promotion->delete_promotion($id);
			$this->load->view('includes/header-admin');
			$this->load->view('promotion_delete_success_admin');
			$this->load->view('includes/footer-admin');
		} else {
			redirect('admin/login');
		}
	}

	public function promotion_category() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){

			$this->load->library('pagination');
			$this->load->model('model_promotion');

			$config['base_url'] = base_url('admin/promotion_category'). '/page/';
			$config['total_rows'] = $this->model_promotion->get_promotion_category_total_row();
			$config['per_page'] = 10;
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
			$data['promotioncategorylist'] = $this->model_promotion->get_promotion_category_list($config['per_page'], $page);


      $this->load->view('includes/header-admin');
      $this->load->view('promotion_category_admin', $data);
      $this->load->view('includes/footer-admin');
		} else {
        redirect('admin/login');
    }
  }
	public function add_promotion_category() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
      $this->load->view('promotion_category_add_admin');
		} else {
      redirect('admin/login');
    }
  }
	public function add_promotion_category_success() {
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->view('includes/header-admin');
			$this->load->view('promotion_category_add_success_admin');
			$this->load->view('includes/footer-admin');
		} else {
			redirect('admin/login');
		}
	}
	public function edit_promotion_category($id) {
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_promotion');
			$data = array("promotion" => $this->model_promotion->get_promotion_category($id));
			$this->load->view('promotion_category_edit_admin', $data);
		} else {
			redirect('admin/login');
		}
	}
	public function edit_promotion_category_success() {
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->view('includes/header-admin');
			$this->load->view('promotion_category_edit_success_admin');
			$this->load->view('includes/footer-admin');
		} else {
			redirect('admin/login');
		}
	}
	public function delete_promotion_category($id){
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_promotion');
			$this->model_promotion->delete_promotion_category($id);
			$this->load->view('includes/header-admin');
			$this->load->view('promotion_category_delete_success_admin');
			$this->load->view('includes/footer-admin');
		} else {
			redirect('admin/login');
		}
	}

  public function order() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){

			$this->session->unset_userdata('cart');
			$this->session->unset_userdata('customer');

			$this->load->library('pagination');
			$this->load->model('model_product');

			$config['base_url'] = base_url('admin/order'). '/page/';
			$config['total_rows'] = $this->model_product->get_order_total_row();
			$config['per_page'] = 100;
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

			$this->db->select('*');
			$this->db->from('order');
			$this->db->join('order_product', 'order_product.order_id = order.id', 'inner');
			$this->db->join('order_orderer', 'order_orderer.id = order.orderer_id', 'inner');
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


      $this->load->view('includes/header-admin');
      $this->load->view('order_admin', $data);
      $this->load->view('includes/footer-admin');
		} else {
      redirect('admin/login');
    }
  }
	public function search_order() {
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_product');
			$data = array("orders" => $this->model_product->search_order($this->input->post('username')));
      $this->load->view('includes/header-admin');
      $this->load->view('order_admin', $data);
      $this->load->view('includes/footer-admin');
		} else {
      redirect('admin/login');
    }
	}
	public function view_order($id) {
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_order');
			$data = array("order" => $this->model_order->get_order($id));
      $this->load->view('includes/header-admin');
      $this->load->view('order_view_admin', $data);
      $this->load->view('includes/footer-admin');
		} else {
      redirect('admin/login');
    }
	}
	public function add_order() {
		if ($this->input->post() != NULL) {
			var_dump($this->input->post());
			$newdata = array(
        'fname'  => 'johndoe',
        'lname'     => 'johndoe@some-site.com',
				'discount'  => 'johndoe',
				'note'     => 'johndoe@some-site.com',
			);

			$this->session->set_userdata($newdata);
		}

    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){

			$this->load->library('pagination');
			$this->load->model('model_product');

			$config['base_url'] = base_url('admin/add_order'). '/page/';
			$config['total_rows'] = $this->model_product->get_product_total_row();
			$config['per_page'] = 10;
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
			$data['userlist'] = "";

			//$this->load->view('includes/header-admin');
      $this->load->view('order_add_admin', $data);
      //$this->load->view('includes/footer-admin');
		} else {
      redirect('admin/login');
    }
  }
	public function search_product_order() {
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){

			$this->load->model('model_product');
			$data['productlist'] = $this->model_product->search_product($this->input->post('product'));

      $this->load->view('order_add_2_admin', $data);
		} else {
      redirect('admin/login');
    }
	}
	public function choose_customer(){
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_product');
			$data['productlist'] = $this->model_product->search_product($this->input->post('product'));
			$data['customerid'] = $this->input->post('customerid');


			$this->load->view('order_add_2_admin', $data);
		} else {
			redirect('admin/login');
		}
	}
	public function choose_product() {
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			//$this->load->model('model_user');
			//$this->load->model('model_product');
			//$data['userlist'] = $this->model_user->search_user($this->input->post('customer'));
			//$data['productlist'] = $this->model_product->search_product($this->input->post('product'));
			$this->load->model('model_user');
			//if ($this->session->userdata('customer') != NULL) $data['customer'] = $this->model_user->get_user($this->session->userdata('customer')[0]['customerid']);
			//else $data['customer'] = $this->model_user->get_user($this->input->post('customerid'));

			if ($this->input->post('customerid') != NULL || $this->session->userdata('access') == NULL) {
				$temp = array('customerid' => $this->input->post('customerid'), 'customer_name' =>  $this->model_user->get_user($this->input->post('customerid'))[0]->username_cus);
				$newdata = array(
				  'customer'  => array($temp)
				);
				$this->session->set_userdata($newdata);
			}


			$this->load->library('pagination');
			$this->load->model('model_product');

			$config['base_url'] = base_url('admin/choose_product'). '/page/';
			$config['total_rows'] = $this->model_product->get_product_total_row();
			$config['per_page'] = 10;
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


      $this->load->view('order_add_2_admin', $data);
		} else {
      redirect('admin/login');
    }
	}
	public function choose_discount() {
		$this->load->view('order_add_3_admin');
	}
	public function search_customer_order() {
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_user');
			$this->load->model('model_product');
			$data['userlist'] = $this->model_user->search_user($this->input->post('customer'));
			$data['productlist'] = $this->model_product->search_product($this->input->post('product'));
      $this->load->view('order_add_admin', $data);
		} else {
      redirect('admin/login');
    }
	}
	public function choose_product_by_id($id){
		//var_dump($this->input->post());
		//break;

		if ($this->session->userdata('cart') == NULL) {
			$temp = array('productid' => $this->input->post('productid'),
			'quantity' => $this->input->post('amount'));
			$newdata = array(
			  'cart'  => array($temp)
			);
			$this->session->set_userdata($newdata);
		} else {
			$session_data = $this->session->userdata('cart');
			$temp = array('productid' => $this->input->post('productid'),
			'quantity' => $this->input->post('amount'));
			array_push($session_data,$temp);
			$this->session->set_userdata("cart", $session_data);
		}
		redirect('admin/choose_product');
	}



	/// ACCOUNT MANAGEMENT
	public function editprofile() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_admin');
			$data = array("profile" => $this->model_admin->get_profile());
      $this->load->view('editprofile-admin', $data);
		} else {
      redirect('admin/login');
    }
  }
	public function edit_profile_success() {
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->view('includes/header-admin');
      $this->load->view('edit_profile_success_admin');
      $this->load->view('includes/footer-admin');
		} else {
      redirect('admin/login');
    }
	}

	// HOMEPAGE MANAGEMENT
	public function home_management() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){

			$this->load->model('model_home');
			$data['contents'] = $this->model_home->get_content_list();

      $this->load->view('includes/header-admin');
			$this->load->view('home_management_admin', $data);
      $this->load->view('includes/footer-admin');
		} else {
        redirect('admin/login');
    }
  }
	public function edit_home($id) {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_home');
			$data = array("content" => $this->model_home->get_content($id));
      $this->load->view('home_management_edit_admin', $data);
		} else {
      redirect('admin/login');
    }
  }
	public function edit_home_success() {
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->view('includes/header-admin');
			$this->load->view('home_management_edit_success_admin');
			$this->load->view('includes/footer-admin');
		} else {
			redirect('admin/login');
		}
	}

	// EMAIL MANAGEMENT
	public function email() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->library('pagination');
			$this->load->model('model_promotion');

			$config['base_url'] = base_url('admin/email'). '/page/';
			$config['total_rows'] = $this->model_promotion->get_email_total_row();
			$config['per_page'] = 1000;
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
			$data['emaillist'] = $this->model_promotion->get_email_list($config['per_page'], $page);

			$this->load->model('model_promotion');
			$data['categories'] = $this->model_promotion->get_promotion_category_list(999, 0);

      $this->load->view('includes/header-admin');
      $this->load->view('email_admin.php', $data);
      $this->load->view('includes/footer-admin');
		} else {
      redirect('admin/login');
    }
  }
	public function delete_email($id){
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_promotion');
			$this->model_promotion->delete_email($id);
			$this->load->view('includes/header-admin');
			$this->load->view('email_delete_success_admin');
			$this->load->view('includes/footer-admin');
		} else {
			redirect('admin/login');
		}
	}

	/// STAFF MANAGEMENT
	public function report() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){

			/*$this->load->library('pagination');
			$this->load->model('model_staff');

			$config['base_url'] = base_url('admin/staff'). '/page/';
			$config['total_rows'] = $this->model_staff->get_staff_total_row();
			$config['per_page'] = 10;
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
			$data['stafflist'] = $this->model_staff->get_staff_list($config['per_page'], $page);
*/

      $this->load->view('includes/header-admin');
      $this->load->view('report_admin');
      $this->load->view('includes/footer-admin');
		} else {
      redirect('admin/login');
    }
  }
	public function view_report(){
		if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_report');


			if ($this->input->post('month') == 1) $data['month'] = "มกราคม";
			else if ($this->input->post('month') == 2) $data['month'] = "กุมภาพันธ์";
			else if ($this->input->post('month') == 3) $data['month'] = "มีนาคม";
			else if ($this->input->post('month') == 4) $data['month'] = "เมษายน";
			else if ($this->input->post('month') == 5) $data['month'] = "พฤษภาคม";
			else if ($this->input->post('month') == 6) $data['month'] = "มิถุนายน";
			else if ($this->input->post('month') == 7) $data['month'] = "กรกฎาคม";
			else if ($this->input->post('month') == 8) $data['month'] = "สิงหาคม";
			else if ($this->input->post('month') == 9) $data['month'] = "กันยายน";
			else if ($this->input->post('month') == 10) $data['month'] = "ตุลาคม";
			else if ($this->input->post('month') == 11) $data['month'] = "พฤศจิกายน";
			else if ($this->input->post('month') == 12) $data['month'] = "ธันวาคม";

			if ($this->input->post('year') == 2017) $data['year'] = "2560";
			else if ($this->input->post('year') == 2016) $data['year'] = "2559";
			else if ($this->input->post('year') == 2015) $data['year'] = "2558";
			else if ($this->input->post('year') == 2014) $data['year'] = "2557";
			else if ($this->input->post('year') == 2013) $data['year'] = "2556";
			else if ($this->input->post('year') == 2012) $data['year'] = "2555";
			else if ($this->input->post('year') == 2011) $data['year'] = "2554";
			else if ($this->input->post('year') == 2010) $data['year'] = "2553";
			else if ($this->input->post('year') == 2009) $data['year'] = "2552";
			else if ($this->input->post('year') == 2008) $data['year'] = "2551";

			if ($this->input->post('type') == "popular") {
				$data['report'] = $this->model_report->get_report_popular($this->input->post('month'), $this->input->post('year'));
				if ($data['report'] == NULL) {
					$this->load->view('includes/header-admin');
					$this->load->view('report_error_admin');
					$this->load->view('includes/footer-admin');
				} else {
					$this->load->view('report_view_popular_admin', $data);
				}
			} else {
				$data['report'] = $this->model_report->get_report($this->input->post('month'), $this->input->post('year'));
				if ($data['report'] == NULL) {
					$this->load->view('includes/header-admin');
					$this->load->view('report_error_admin');
					$this->load->view('includes/footer-admin');
				} else {
					$this->load->view('report_view_admin', $data);
				}
			}

		} else {
			redirect('admin/login');
		}
	}



  public function validation() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|callback_validate_credentials');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run()){
			$this->load->model('model_admin');
			$this->model_admin->setSession();
			redirect('admin/home');
		} else {
			$this->login();
		}
	}
	public function validate_credentials(){
		$this->load->model('model_admin');
		if ($this->model_admin->can_log_in()) {
			return true;
		} else {
			$this->form_validation->set_message('validate_credentials', 'Incorrect Username or Password');
			return false;
		}
	}
	public function add_product_validation() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('price', 'Price', 'required|trim|numeric');
		$this->form_validation->set_rules('discount', 'Discount', 'numeric');
		$this->form_validation->set_rules('detail', 'Detail', 'required|trim');
		if ($this->form_validation->run()){
			$this->load->model('model_product');
			$this->model_product->add_product();
			redirect('admin/add_product_success');
		} else {
			$this->add_product();
		}
	}
	public function edit_product_validation($id) {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('price', 'Price', 'required|trim|numeric');
		$this->form_validation->set_rules('discount', 'Discount', 'numeric');
		$this->form_validation->set_rules('detail', 'Detail', 'required|trim');
		$this->form_validation->set_rules('weight', 'Weight', 'required|trim|numeric');
		$this->form_validation->set_rules('size', 'Size', 'required|trim');
		$this->form_validation->set_rules('unit', 'Unit', 'required|trim');
		if ($this->form_validation->run()){
			$this->load->model('model_product');
			$this->model_product->edit_product($id);
			redirect('admin/edit_product_success');
		} else {
			$data = array('error'=>'Invalid Input');
			$this->session->set_flashdata('error',$data);
			redirect('admin/edit_product/'. $id);
		}
	}
	public function add_category_validation() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('codename', 'Codename', 'required|trim');
		if ($this->form_validation->run()){
			$this->load->model('model_product');
			$this->model_product->add_category();
			redirect('admin/add_category_success');
		} else {
			$this->add_category();
		}
	}
	public function edit_category_validation() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('codename', 'Codename', 'required|trim');
		if ($this->form_validation->run()){
			$this->load->model('model_product');
			$this->model_product->edit_category();
			redirect('admin/edit_category_success');
		} else {
			$this->edit_category();
		}
	}
	public function edit_profile_validation() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username_staff', 'Username', 'required|trim');
		$this->form_validation->set_rules('password_staff', 'Password', 'required|trim');
		$this->form_validation->set_rules('fname_staff', 'First name', 'required|trim');
		$this->form_validation->set_rules('lname_staff', 'Last name', 'required|trim');
		$this->form_validation->set_rules('email_staff', 'Email', 'required|trim');
		$this->form_validation->set_rules('idcard_staff', 'ID card', 'trim|numeric');
		$this->form_validation->set_rules('tel_staff', 'Telephone', 'trim');
		if ($this->form_validation->run()){
			$this->load->model('model_admin');
			$this->model_admin->edit_profile();
			redirect('admin/edit_profile_success');
		} else {
			$this->editprofile();
		}
	}
	public function add_user_validation() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('firstname', 'Firstname', 'required|trim');
		$this->form_validation->set_rules('lastname', 'Lastname', 'required|trim');
		$this->form_validation->set_rules('idcard', 'ID card', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('telephone', 'Telephone', 'required|trim');
		$this->form_validation->set_rules('address', 'Address', 'required|trim');
		$this->form_validation->set_rules('district', 'District', 'required|trim');
		$this->form_validation->set_rules('province', 'Province', 'required|trim');
		$this->form_validation->set_rules('postcode', 'Postcode', 'required|trim');
		if ($this->form_validation->run()){
			$this->load->model('model_user');
			$this->model_user->add_user();
			redirect('admin/add_user_success');
		} else {
			$this->add_user();
		}
	}
	public function edit_user_validation($id) {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('firstname', 'Firstname', 'required|trim');
		$this->form_validation->set_rules('lastname', 'Lastname', 'required|trim');
		$this->form_validation->set_rules('idcard', 'ID card', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('telephone', 'Telephone', 'required|trim');
		$this->form_validation->set_rules('address', 'Address', 'required|trim');
		$this->form_validation->set_rules('district', 'District', 'required|trim');
		$this->form_validation->set_rules('province', 'Province', 'required|trim');
		$this->form_validation->set_rules('postcode', 'Postcode', 'required|trim');
		//var_dump($this->input->post());
		//break;
		if ($this->form_validation->run()){
			$this->load->model('model_user');
			$this->model_user->edit_user($id);
			redirect('admin/edit_user_success');
		} else {
			$data = array('error'=>'Invalid Input');
			$this->session->set_flashdata('error',$data);
			redirect('admin/edit_user/'. $id);
		}
	}
	public function add_staff_validation() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('firstname', 'Firstname', 'required|trim');
		$this->form_validation->set_rules('lastname', 'Lastname', 'required|trim');
		$this->form_validation->set_rules('idcard', 'ID card', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('telephone', 'Telephone', 'required|trim');
		$this->form_validation->set_rules('address', 'Address', 'required|trim');
		if ($this->form_validation->run()){
			$this->load->model('model_staff');
			$this->model_staff->add_staff();
			redirect('admin/add_staff_success');
		} else {
			$this->add_staff();
		}
	}
	public function edit_staff_validation($id) {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('firstname', 'Firstname', 'required|trim');
		$this->form_validation->set_rules('lastname', 'Lastname', 'required|trim');
		$this->form_validation->set_rules('idcard', 'ID card', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('telephone', 'Telephone', 'required|trim');
		$this->form_validation->set_rules('address', 'Address', 'required|trim');
		//var_dump($this->input->post());
		//break;
		if ($this->form_validation->run()){
			$this->load->model('model_staff');
			$this->model_staff->edit_staff($id);
			redirect('admin/edit_staff_success');
		} else {
			$data = array('error'=>'Invalid Input');
			$this->session->set_flashdata('error',$data);
			redirect('admin/edit_staff/'. $id);
		}
	}

	public function add_promotion_category_validation() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('codename', 'Codename', 'required|trim');
		if ($this->form_validation->run()){
			$this->load->model('model_promotion');
			$this->model_promotion->add_promotion_category();
			redirect('admin/add_promotion_category_success');
		} else {
			$this->add_promotion_category();
		}
	}
	public function edit_promotion_category_validation($id) {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('codename', 'Codename', 'required|trim');
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		if ($this->form_validation->run()){
			$this->load->model('model_promotion');
			$this->model_promotion->edit_promotion_category($id);
			redirect('admin/edit_promotion_category_success');
		} else {
			$data = array('error'=>'Invalid Input');
			$this->session->set_flashdata('error',$data);
			redirect('admin/edit_promotion_category/'. $id);
		}
	}


	public function add_promotion_validation() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('detail', 'Detail', 'required|trim');
		if ($this->form_validation->run()){
			$this->load->model('model_promotion');
			$this->model_promotion->add_promotion();
			redirect('admin/add_promotion_success');
		} else {
			$this->add_promotion();
		}
	}
	public function edit_promotion_validation($id) {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('detail', 'Detail', 'required|trim');
		if ($this->form_validation->run()){
			$this->load->model('model_promotion');
			$this->model_promotion->edit_promotion($id);
			redirect('admin/edit_promotion_success');
		} else {
			$data = array('error'=>'Invalid Input');
			$this->session->set_flashdata('error',$data);
			redirect('admin/edit_promotion/'. $id);
		}
	}

	public function edit_home_validation($id) {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('topic', 'Topic', 'required|trim');
		$this->form_validation->set_rules('detail', 'Detail', 'required|trim');
		if ($this->form_validation->run()){
			$this->load->model('model_home');
			$this->model_home->edit_content($id);
			redirect('admin/edit_home_success');
		} else {
			$data = array('error'=>'Invalid Input');
			$this->session->set_flashdata('error',$data);
			redirect('admin/edit_home/'. $id);
		}
	}


	public function email_promotion_validation() {

		$this->db->select('*');
		$this->db->from('promotion');
		$this->db->order_by('pro_date','desc');
		$this->db->where('category_id', $this->input->post('promotion'));
		$query = $this->db->get();
		$finalmail = $query->result()[0];

		$this->db->select('general_cus.gen_email');
		$this->db->from('subscribe_relation');
		$this->db->join('general_cus', 'subscribe_relation.general_cus_id = general_cus.id', 'left');
		$this->db->where('subscribe_relation.promotion_categories_id', $this->input->post('promotion'));
		$fetch = $this->db->get();
		$maillist = $fetch->result();
		//var_dump($maillist[0]->gen_email);

		for ($x = 0; $x < sizeof($maillist); $x++) {
			$this->load->library('email');
			$this->email->attach(public_url()."image/promotion/".$finalmail->pro_image, "inline");

			$this->email->from('beamhippo@gmail.com', "AE Team");
			$this->email->to($maillist[$x]->gen_email);
			$this->email->subject("[AE] News update");
			$text = $finalmail->pro_name. " - ". $finalmail->pro_detail;
			//"<br><img src=\"cid:".$data['pro_image']."\" border=\"0\">"
			$this->email->message($text);
			//echo $maillist[$x]->gen_email."<br>";
			$this->email->send();
			//echo $this->email->print_debugger();

    }
		//break;
		redirect('admin/email');
	}


	public function add_order_validation(){
		var_dump($this->session->all_userdata());
		var_dump($this->input->post());

		/*$data['items'] = array();
		for ($x = 0; $x < sizeof($this->session->userdata('cart'));$x++){
			$this->db->where('id', $this->session->userdata('cart')[$x]['productid']);
			$fetch = $this->db->get('product');
			$temp = $fetch->result();
			array_push($temp, array('quan' => $this->session->userdata('cart')[$x]['quantity']));
			array_push($data['items'],$temp);
		}*/

		$this->load->model('model_order');
		$this->model_order->add_order();
		redirect('admin/order');
	}



}
