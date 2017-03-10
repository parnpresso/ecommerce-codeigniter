<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_staff extends CI_Model {

  public function get_staff_list() {
    $query = $this->db->get('staff');
    return $query->result();
  }

  public function get_user($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('customer');
    return $query->result();
  }

  public function add_user() {
		$data = array(
			'email_cus' => $this->input->post('email'),
			'username_cus' => $this->input->post('username'),
			'password_cus' => $this->input->post('password'),
			'fname_cus' => $this->input->post('firstname'),
			'lname_cus' => $this->input->post('lastname'),
      'idcard_cus' => $this->input->post('idcard'),
			'address' => $this->input->post('address'),
			'tel' => $this->input->post('telephone'),
      'district' => $this->input->post('district'),
			'province' => $this->input->post('province'),
			'postcode' => $this->input->post('postcode'),
		);
		$query = $this->db->insert('customer', $data);
		if ($query) return true;
		else return false;
	}

  public function delete_user($id) {
    $this->db->delete('customer', array('id' => $id));
  }

  public function edit_user($id) {
    $data = array(
			'email_cus' => $this->input->post('email'),
			'username_cus' => $this->input->post('username'),
			'password_cus' => $this->input->post('password'),
			'fname_cus' => $this->input->post('firstname'),
			'lname_cus' => $this->input->post('lastname'),
      'idcard_cus' => $this->input->post('idcard'),
			'address' => $this->input->post('address'),
			'tel' => $this->input->post('telephone'),
      'district' => $this->input->post('district'),
			'province' => $this->input->post('province'),
			'postcode' => $this->input->post('postcode'),
		);
    $this->db->where('id', $id);
    $this->db->update('customer', $data);
		if ($query) return true;
		else return false;
  }

}
