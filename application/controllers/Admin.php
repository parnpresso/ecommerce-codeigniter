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
      $this->load->view('includes/header-admin');
      $this->load->view('home-admin');
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
      $this->load->view('includes/header-admin');
      $this->load->view('order-admin');
      $this->load->view('includes/footer-admin');
		} else {
      redirect('admin/login');
    }
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
}
