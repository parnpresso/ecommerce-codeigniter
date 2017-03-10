<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index() {
    $this->home();
	}
	
  public function login() {
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
			$this->load->model('model_product');
			$data = array("productlist" => $this->model_product->get_product_list(), "categorylist" => $this->model_product->get_category_list());
      $this->load->view('includes/header-admin');
      $this->load->view('product-admin', $data);
      $this->load->view('includes/footer-admin');
		} else {
      redirect('admin/login');
    }
  }
	public function add_product() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_product');
			$data = array("categories" => $this->model_product->get_categories());
      $this->load->view('product-add-admin', $data);
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
	public function add_category() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
      $this->load->view('product_category_add_admin');
		} else {
      redirect('admin/login');
    }
  }
	public function add_category_success() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
      $this->load->view('includes/header-admin');
      $this->load->view('product_category_add_success_admin');
      $this->load->view('includes/footer-admin');
		} else {
      redirect('admin/login');
    }
  }
	public function edit_category($id) {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_product');
			$data = array("category" => $this->model_product->get_category($id));
      $this->load->view('product_category_edit_admin', $data);
		} else {
      redirect('admin/login');
    }
  }
	public function edit_category_success() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
      $this->load->view('includes/header-admin');
      $this->load->view('product_category_edit_success_admin');
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
			$this->load->view('product_category_delete_success_admin');
			$this->load->view('includes/footer-admin');
		} else {
			redirect('admin/login');
		}
	}

	/// STAFF MANAGEMENT
	public function staff() {
    if ($this->session->userdata('access') == 'ADMIN'){
			$this->load->model('model_staff');
			$data = array("stafflist" => $this->model_staff->get_staff_list());
      $this->load->view('includes/header-admin');
      $this->load->view('staff_admin', $data);
      $this->load->view('includes/footer-admin');
		} else {
      redirect('admin/login');
    }
  }

	/// USER MANAGEMENT
	public function user() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
			$this->load->model('model_user');
			$data = array("userlist" => $this->model_user->get_user_list());
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

	public function promotion() {
    if ($this->session->userdata('access') == 'ADMIN' || $this->session->userdata('access') == 'STAFF'){
      $this->load->view('includes/header-admin');
      $this->load->view('promotion-admin');
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
}
