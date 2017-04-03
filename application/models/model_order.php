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

  public function get_order_total_row() {
    $query = $this->db->get('order');
    return $query->num_rows();
  }

  public function add_order(){
    //var_dump(sizeof($this->session->userdata('cart')));
    //break;
    $this->load->model('model_user');
    $this->load->model('model_product');
    $user = $this->model_user->get_user($this->session->userdata('customer')[0]['customerid']);

    $data = array(
			'email' => $user[0]->email_cus,
      'username' => $user[0]->username_cus,
			'fname' => $user[0]->fname_cus,
			'lname' => $user[0]->lname_cus,
      'idcard' => $user[0]->idcard_cus,
			'address' => "walk-in",
			'tel' => $user[0]->tel,
      'district' => $user[0]->district,
			'province' => $user[0]->province,
			'postcode' => $user[0]->postcode,
		);
		$query = $this->db->insert('order_orderer', $data);

    $data2 = array(
      'orderer_id' => $this->db->insert_id(),
      'note' => "",
      'discount' => $this->input->post('discount')
    );
    $query2 = $this->db->insert('order', $data2);
    $order_id = $this->db->insert_id();

    for ($x = 0; $x < sizeof($this->session->userdata('cart')); $x++){
      $pid = $this->session->userdata('cart')[$x]['productid'];
      $product = $this->model_product->get_product($pid);
      //var_dump($product[0]->cate_name);
      //var_dump((int)$this->session->userdata('cart')[$x]['quantity']);
      //if ($x == 1) break;

      $data3 = array(
        'order_id' => $order_id,
        'product_name' => $product[0]->name,
        'product_price' => $product[0]->price,
        'product_detail' => $product[0]->detail,
        'product_weight' => $product[0]->weight,
        'product_size' => $product[0]->size,
        'product_unit' => $product[0]->unit,
        'product_category' => $product[0]->cate_name,
        'product_quantity' => (int)$this->session->userdata('cart')[$x]['quantity']
      );
      $query3 = $this->db->insert('order_product', $data3);

    }
    $this->session->unset_userdata('cart');
    //break;
  }
}
