<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_report extends CI_Model {
  public function get_report($month, $year) {
    $this->db->select('*');
    $this->db->from('order');
    $this->db->join('order_product', 'order_product.order_id = order.id', 'inner');
    $this->db->join('order_orderer', 'order_orderer.id = order.orderer_id', 'inner');
    $this->db->where('MONTH(date) = '.$month);
    $this->db->where('YEAR(date) = '.$year);
    $this->db->order_by('product_category', 'desc');
    $query = $this->db->get();
    $temp = $query->result();
    return $temp;
  }

}
