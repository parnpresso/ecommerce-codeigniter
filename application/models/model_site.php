<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_site extends CI_Model {
	//error_reporting(0);
	/**
	*** Login Functions [Start]
	**/
	// [Check] email and password is match?
	public function can_log_in() {

		/*
		$this->db->where('username_cus', $this->input->post('username'));
		$fetch_user = $this->db->get('customer');
		if ($fetch_user->num_rows() == 1){
			$this->db->where('password_cus', $this->input->post('password'));
			$query = $this->db->get('customer');
			if ($query->num_rows() == 1) return true;
			else return false;
		} else return false;
		*/

		$this->db->where('username_cus', $this->input->post('username'));
		$this->db->where('password_cus', $this->input->post('password'));
		$fetch_user = $this->db->get('customer');
		if ($fetch_user->num_rows() == 1) {
			return true;
		} else return false;
	}
	// Create a session
	public function setSession(){
		// Set session from users table
		$this->db->where('username_cus', $this->input->post('username'));
		$fetch_user = $this->db->get('customer');
		$data = array(
			'id' => $fetch_user->row()->id,
			'username' => $this->input->post('username'),
			'is_logged_in' => 1,
		);
		$this->session->set_userdata($data);
	}
	/**
	*** Login Functions [End]
	**/


	/**
	*** Register Functions [Start]
	**/
	// [Insert] user after signup [inactivate]
	public function add_user() {
		$data = array(
			'email_cus' => $this->input->post('email_cus'),
			'username_cus' => $this->input->post('username_cus'),
			'password_cus' => $this->input->post('password_cus'),
			'fname_cus' => $this->input->post('fname_cus'),
			'lname_cus' => $this->input->post('lname_cus'),
			'idcard_cus' => $this->input->post('idcard_cus'),
			'address' => $this->input->post('address'),
			'tel' => $this->input->post('tel'),
		);
		$query = $this->db->insert('customer', $data);
		if ($query) return true;
		else return false;
	}
	/**
	*** Register Functions [End]
	**/

	public function get_profile() {
    $this->db->where('id', $this->session->userdata('id'));
    $fetch = $this->db->get('customer');
		return $fetch->result();
  }

	public function edit_profile() {
		$data = array(
			'username_cus' => $this->input->post('username_cus'),
			'password_cus' => $this->input->post('password_cus'),
			'fname_cus' => $this->input->post('fname_cus'),
			'lname_cus' => $this->input->post('lname_cus'),
			'email_cus' => $this->input->post('email_cus'),
			'idcard_cus' => $this->input->post('idcard_cus'),
			'tel' => $this->input->post('tel'),
			'address' => $this->input->post('address'),
			'postcode' => $this->input->post('postcode'),
			'province' => $this->input->post('province'),
			'district' => $this->input->post('district'),
		);
    $this->db->where('id', $this->session->userdata('id'));
    $this->db->update('customer', $data);
		if ($query) return true;
		else return false;
	}


}

?>
