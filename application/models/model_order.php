<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_order extends CI_Model {

  public function get_order($id){
    $this->db->select('*');
    $this->db->from('order');
    $this->db->join('order_product', 'order_product.order_id = order.id', 'inner');
    $this->db->join('order_orderer', 'order_orderer.id = order.orderer_id', 'inner');
    $this->db->like('order.id', $id);
    $query = $this->db->get();
    $temp = $query->result();
    return $temp;
  }
}
