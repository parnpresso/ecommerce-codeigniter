<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_staff extends CI_Model {

  public function get_staff_list($limit, $start) {
    $this->db->limit($limit, $start);
    $query = $this->db->get('staff');
    return $query->result();
  }

  public function get_staff_total_row() {
    $query = $this->db->get('staff');
    return $query->num_rows();
  }

  public function get_staff($id) {
    $this->db->where('user_id', $id);
    $query = $this->db->get('staff');
    return $query->result();
  }

  public function get_access() {
    $array = array();
    $this->db->group_by('Status');
    $query = $this->db->get('staff');
    foreach ($query->result() as $each) {
      array_push($array, $each->Status);
    }
    return $array;
  }

  public function add_staff() {

    $status = 'USER';
    if ($this->input->post('access') == 0) $status = 'ADMIN';

		$data = array(
			'email_staff' => $this->input->post('email'),
			'username_staff' => $this->input->post('username'),
			'password_staff' => $this->input->post('password'),
			'fname_staff' => $this->input->post('firstname'),
			'lname_staff' => $this->input->post('lastname'),
      'idcard_staff' => $this->input->post('idcard'),
			'address_staff' => $this->input->post('address'),
			'tel_staff' => $this->input->post('telephone'),
      'Status' => $status
		);
		$query = $this->db->insert('staff', $data);
		if ($query) return true;
		else return false;
	}

  public function delete_staff($id) {
    $this->db->delete('staff', array('user_id' => $id));
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

  public function search_staff($name) {
    $this->db->select('*');
    $this->db->from('staff');
    $this->db->like('username_staff', $name);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return $query->result();
    }
  }

}
