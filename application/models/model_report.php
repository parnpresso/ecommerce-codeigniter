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

    // Store product
    for ($x = 1; $x < sizeof($original); $x++) {
      if ($temp[$x]->product_name == $temp[$x-1]->product_name) {
        $temp[$x]->product_quantity = (int)$temp[$x-1]->product_quantity + (int)$temp[$x]->product_quantity;
        unset($temp[$x-1]);
      }
    }
    $final = array_values($temp);

    if ($final != NULL) {
      // Separate category
      $cate_counter = 0;
      $final_with_category = array(array('category' => $final[0]->product_category, 'product' => array($final[0])));
      for ($y = 1; $y < sizeof($final); $y++) {
        if ($final[$y]->product_category == $final[$y-1]->product_category) {
          array_push($final_with_category[$cate_counter]['product'], $final[$y]);
        } else {
          $cate_counter++;
          array_push($final_with_category, array('category' => $final[$y]->product_category, 'product' => array($final[$y])));
        }
      }

      return $final_with_category;
    } else {
      return NULL;
    }

  }
  public function get_report_popular($month, $year) {

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

    // Store product
    for ($x = 1; $x < sizeof($original); $x++) {
      if ($temp[$x]->product_name == $temp[$x-1]->product_name) {
        $temp[$x]->product_quantity = (int)$temp[$x-1]->product_quantity + (int)$temp[$x]->product_quantity;
        unset($temp[$x-1]);
      } 
    }
    $final = array_values($temp);
    //array_unshift($temp);
    //$final = array_values($temp);
    //var_dump($final);

    /*if ($final != NULL) {
      // Separate category
      $cate_counter = 0;
      $final_with_category = array(array('category' => $final[0]->product_category, 'product' => array($final[0])));
      for ($y = 1; $y < sizeof($final); $y++) {
        if ($final[$y]->product_category == $final[$y-1]->product_category) {
          array_push($final_with_category[$cate_counter]['product'], $final[$y]);
        } else {
          $cate_counter++;
          array_push($final_with_category, array('category' => $final[$y]->product_category, 'product' => array($final[$y])));
        }
      }

      //var_dump($final_with_category);
      //break;

      // return $final;
      return $final_with_category;
    } else {
      return NULL;
    }*/

    if ($final != NULL) {
      /*$final_popular = $final;
      var_dump($final);
      usort($final_popular, function($a, $b) {
        var_dump( $a['product_quantity'] - $b['product_quantity']);
      });
        var_dump($final_popular);
      break;*/
      //var_dump($final);
      for ($x = 1; $x < sizeof($final); $x++) {
        for ($y = 1; $y < sizeof($final); $y++) {
          if ((int)$final[$y]->product_quantity > (int)$final[$y-1]->product_quantity) {
            $temp = $final[$y-1];
            $final[$y-1] = $final[$y];
            $final[$y] = $temp;
          }
        }
      }
      //var_dump($final);
      //break;
      return $final;
    } else {
      return NULL;
    }

  }

}
