<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_site extends CI_Model {
	//error_reporting(0);
	/**
	*** Login Functions [Start]
	**/
	// [Check] email and password is match?
	public function can_log_in() {
		// Mean where is username is equal to $this....
		$this->db->where('username_cus', $this->input->post('username'));
		$fetch_user = $this->db->get('customer');
		// Check found user? first
		if ($fetch_user->num_rows() == 1){
			$this->db->where('password_cus', $this->input->post('password'));
			$query = $this->db->get('customer');
			// In condition, mean if that found a user?
			if ($query->num_rows() == 1) return true;
			else return false;
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



}

?>
