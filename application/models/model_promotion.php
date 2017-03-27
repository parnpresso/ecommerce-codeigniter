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

  public function get_promotion_categories() {
    $array = array();
    $query = $this->db->get('promotion_categories');
    foreach ($query->result() as $each) {
      array_push($array, $each->name);
    }
    return $array;
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

  public function get_email_list($limit, $start){
    $this->db->limit($limit, $start);
    $query = $this->db->get('general_cus');
    //var_dump($query->result());
    //break;
    return $query->result();
  }

  public function get_email_total_row() {
    $query = $this->db->get('general_cus');
    return $query->num_rows();
  }

  public function delete_email($id) {
    $this->db->delete('general_cus', array('id' => $id));
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
  public function delete_promotion($id) {
    $this->db->delete('promotion', array('id' => $id));
  }

  public function add_promotion() {
    $cateid = 0;
    $cate = $query = $this->db->get('promotion_categories')->result();
    for ($x = 0; $x <= sizeof($cate)-1; $x++) {
      if ($x == $this->input->post('category')) {
        $cateid = $cate[$x]->id;
      }
    }


    $image = 'test.png';
    $this->load->library('upload', $this->get_upload_config());
    if ( ! $this->upload->do_upload('userfile')) {
        $image = 'test.png';
    } else {
      $image = $this->upload->data('file_name');
    }

    $data = array(
			'pro_name' => $this->input->post('name'),
			'pro_detail' => $this->input->post('detail'),
			'category_id' => $cateid,
      'pro_image' => $image
		);
		$query = $this->db->insert('promotion', $data);
		if ($query) {

      // 'subscribe_relation.*,promotion_categories.name AS cate_name'
      $this->db->select('general_cus.gen_email');
      $this->db->from('subscribe_relation');
      $this->db->join('general_cus', 'subscribe_relation.general_cus_id = general_cus.id', 'left');
      $this->db->where('subscribe_relation.promotion_categories_id', $data['category_id']);
      $fetch = $this->db->get();

  		$maillist = $fetch->result();
      for ($x = 0; $x < $maillist; $x++) {
        $this->load->library('email');

        $this->email->attach(public_url()."image/promotion/".$data['pro_image'], "inline");

    		$this->email->from('parnpresso@gmail.com', "AE Team");
    		$this->email->to($maillist[$x]->gen_email);
    		$this->email->subject("[AE] News update");
    		$text = $data['pro_name']. " - ". $data['pro_detail'];
        //"<br><img src=\"cid:".$data['pro_image']."\" border=\"0\">"
    		$this->email->message($text);
        echo $maillist[$x]->gen_email."<br>";
    		if ($this->email->send()) {
          //var_dump($data);

    			return true;
    		} else return false;
      }

      //var_dump($data);
      //break;

    }
		else return false;
  }

  // Upload Config Loader
	public function get_upload_config(){
		return array(
			// Change path when you upload to a live server
			'upload_path'   => "C:xampp\htdocs\asia\public\image\promotion",
            'allowed_types' => 'gif|jpg|png|jpeg',
            'max_size'      => '1000',
            'max_width'     => '2000',
            'max_height'    => '2000',
            'encrypt_name'  => true,
            'overwrite'     => true
			);
	}

  public function get_promotion($id) {
    $this->db->select('promotion.*,promotion_categories.name AS cate_name');
    $this->db->from('promotion');
    $this->db->join('promotion_categories', 'promotion.category_id = promotion_categories.id', 'left');
    $this->db->where('promotion.id', $id);
    $fetch = $this->db->get();

		return $fetch->result();
  }

  public function edit_promotion($id) {
    $cateid = 0;
    $cate = $query = $this->db->get('promotion_categories')->result();
    for ($x = 0; $x <= sizeof($cate)-1; $x++) {
      if ($x == $this->input->post('category')) {
        $cateid = $cate[$x]->id;
      }
    }




    $image = 'test.png';
    $this->load->library('upload', $this->get_upload_config());
    if ( ! $this->upload->do_upload('userfile')) {
        $image = 'test.png';
    } else {
      // Delete old file
      $this->load->helper("file");
      $data = $this->get_promotion($id);
      $old_image_path = $data[0]->pro_image;

      // Change path when you upload to a live server
      if ($old_image_path != 'test.png') {
        unlink($_SERVER['DOCUMENT_ROOT']. 'asia/public/image/promotion/' .$old_image_path) ;
      }
      $image = $this->upload->data('file_name');
    }

    $data = array(
      'pro_name' => $this->input->post('name'),
      'pro_detail' => $this->input->post('detail'),
      'category_id' => $cateid,
      'pro_image' => $image
    );
    $this->db->where('id', $id);
    $this->db->update('promotion', $data);
    if ($query) return true;
    else return false;
  }
}
