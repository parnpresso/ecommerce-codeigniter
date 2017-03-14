<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_promotion extends CI_Model {

  public function get_promotion_total_row() {
    $query = $this->db->get('promotion');
    return $query->num_rows();
  }

  public function get_promotion_category_total_row() {
    $query = $this->db->get('promotion_categories');
    return $query->num_rows();
  }

  public function get_promotion_list($limit, $start){
    $this->db->limit($limit, $start);
    $query = $this->db->get('promotion');
    return $query->result();
  }

  public function get_promotion_category_list($limit, $start){
    $this->db->limit($limit, $start);
    $query = $this->db->get('promotion_categories');
    return $query->result();
  }

  public function get_promotion_category($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('promotion_categories');
    return $query->result();
  }

  public function search_promotion($name) {
    $this->db->select('*');
    $this->db->from('promotion');
    $this->db->like('pro_name', $name);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return $query->result();
    }
  }

  public function add_promotion_category() {
    $data = array(
			'name' => $this->input->post('name'),
			'codename' => $this->input->post('codename'),
		);
		$query = $this->db->insert('promotion_categories', $data);
		if ($query) return true;
		else return false;
  }

  public function edit_promotion_category() {
    $data = array(
      'name' => $this->input->post('name'),
      'codename' => $this->input->post('codename'),
    );
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('promotion_categories', $data);
    if ($query) return true;
    else return false;
  }

  public function delete_promotion_category($id) {
    $this->db->delete('promotion_categories', array('id' => $id));
  }
}
