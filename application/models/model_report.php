<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_report extends CI_Model {
  public function get_report($month, $year) {
    // Get All ordered product order by category and name
    $this->db->select('*');
    $this->db->from('order');
    $this->db->join('order_product', 'order_product.order_id = order.id', 'inner');
    $this->db->join('order_orderer', 'order_orderer.id = order.orderer_id', 'inner');
    $this->db->where('MONTH(date) = '.$month);
    $this->db->where('YEAR(date) = '.$year);
    $this->db->order_by('product_category', 'desc');
    $this->db->order_by('product_name', 'desc');
    $query = $this->db->get();
    $original = $query->result();
    $temp = $query->result();
    //var_dump($original);

    // Store product
    for ($x = 1; $x < sizeof($original); $x++) {
      if ($temp[$x]->product_name == $temp[$x-1]->product_name) {
        //$temp[$x-1] = (int)$temp[$x-1]->product_quantity + (int)$temp[$x]->product_quantity;
        //unset($temp[$x]);
        //var_dump($temp[$x-1]->product_name );
        //var_dump($temp[$x]->product_name );
        //echo $temp[$x]->product_name == $temp[$x-1]->product_name;
        $temp[$x]->product_quantity = (int)$temp[$x-1]->product_quantity + (int)$temp[$x]->product_quantity;
        //echo $temp[$x]->product_quantity."+".$temp[$x]->product_quantity."=";
        //echo $temp[$x]->product_quantity ;
        unset($temp[$x-1]);
      } //else {echo "S";}
      //echo '=============='.$x.' of '. sizeof($original).'==============<br>';
    }
    $final = array_values($temp);
    //array_unshift($temp);
    //$final = array_values($temp);
    //var_dump($final);
    //break;
    return $final;
  }

}
