<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_admin extends CI_Model {
	//error_reporting(0);
	/**
	*** Login Functions [Start]
	**/
	// [Check] email and password is match?
	public function can_log_in() {
		// Mean where is username is equal to $this....
		$this->db->where('username_staff', $this->input->post('username'));
		$fetch_user = $this->db->get('staff');
		// Check found user? first
		if ($fetch_user->num_rows() == 1){
			$this->db->where('password_staff', $this->input->post('password'));
			$query = $this->db->get('staff');
			// In condition, mean if that found a user?
			if ($query->num_rows() == 1) return true;
			else return false;
		} else return false;
	}
	// Create a session
	public function setSession(){
		// Set session from users table
		$this->db->where('username_staff', $this->input->post('username'));
		$fetch_user = $this->db->get('staff');
		if ($fetch_user->row()->Status == 'ADMIN') $access = 'ADMIN';
		else if ($fetch_user->row()->Status == 'USER') $access = 'STAFF';
		$data = array(
			'id' => $fetch_user->row()->user_id,
			'username' => $this->input->post('username'),
      'access' => $access,
		);
		$this->session->set_userdata($data);
	}
	/**
	*** Login Functions [End]
	**/

	public function get_profile() {
    $this->db->where('user_id', $this->session->userdata('id'));
    $fetch = $this->db->get('staff');
		return $fetch->result();
  }

	public function edit_profile() {
		$data = array(
			'username_staff' => $this->input->post('username_staff'),
			'password_staff' => $this->input->post('password_staff'),
			'fname_staff' => $this->input->post('fname_staff'),
			'lname_staff' => $this->input->post('lname_staff'),
			'email_staff' => $this->input->post('email_staff'),
			'idcard_staff' => $this->input->post('idcard_staff'),
			'tel_staff' => $this->input->post('tel_staff'),
		);
    $this->db->where('user_id', $this->session->userdata('id'));
    $this->db->update('staff', $data);
		if ($query) return true;
		else return false;
	}

}

?>
