<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_home extends CI_Model {

  public function get_content_list() {
    $fetch = $this->db->get('content');
		return $fetch->result();
  }

  public function get_content($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('content');
    return $query->result();
  }

  // Upload Config Loader
	public function get_upload_config(){
		return array(
			// Change path when you upload to a live server
			'upload_path'   => "C:xampp\htdocs\asia\public\image\contents",
            'allowed_types' => 'gif|jpg|png|jpeg',
            'max_size'      => '1000',
            'max_width'     => '2000',
            'max_height'    => '2000',
            'encrypt_name'  => true,
            'overwrite'     => true
			);
	}

  public function edit_content($id) {
    $image = 'test.png';
    $this->load->library('upload', $this->get_upload_config());
    if ( ! $this->upload->do_upload('userfile')) {
        $image = 'test.png';
    } else {
      // Delete old file
  		$this->load->helper("file");
      $data = $this->get_content($id);
  		$old_image_path = $data[0]->image;

  		// Change path when you upload to a live server
  		if ($old_image_path != 'test.png') {
  			unlink($_SERVER['DOCUMENT_ROOT']. 'asia/public/image/contents/' .$old_image_path) ;
  		}
      $image = $this->upload->data('file_name');
    }

    $data = array(
			'topic' => $this->input->post('topic'),
			'detail' => $this->input->post('detail'),
      'image' => $image
		);
    $this->db->where('id', $id);
    $this->db->update('content', $data);
		if ($query) return true;
		else return false;
  }

  public function get_all_contents() {
    $this->db->order_by('id', 'asc'); //จัดเรียงตาม id น้อย ->มาก (asc)
    $fetch = $this->db->get('content');
    $fetched = $fetch->result();
    $data = array(
      'slide1' => $fetched[0]->image,
      'slide2' => $fetched[1]->image,
      'slide3' => $fetched[2]->image,
      'promotion1' => $fetched[3]->image,
      'promotion1_topic' => $fetched[3]->topic,
      'promotion2' => $fetched[4]->image,
      'promotion2_topic' => $fetched[4]->topic,
    );
    return $data;
  }
}
