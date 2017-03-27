<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_product extends CI_Model {

  public function get_product_total_row() {
    $query = $this->db->get('product');
    return $query->num_rows();
  }

  public function get_order_total_row() {
    $query = $this->db->get('order');
    return $query->num_rows();
  }

  public function search_product($name) {
    $this->db->select('product.*,product_categories.name AS cate_name');
    $this->db->join('product_categories', 'product.category_id = product_categories.id', 'left');
    $this->db->from('product');
    $this->db->like('product.name', $name);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return $query->result();
    }
  }

  public function search_order($name) {
    $this->db->select('*');
    $this->db->from('order');
    $this->db->join('order_product', 'order_product.order_id = order.id', 'inner');
    $this->db->join('order_orderer', 'order_orderer.id = order.orderer_id', 'inner');
    $this->db->like('order_orderer.username', $name);
    $query = $this->db->get();
    $temp = $query->result();

    // Separate order each bill
    $current_id = $temp[0]->order_id;
    $orderlist = array(array($temp[0]));

    $indexat = 0;
    for ($x=0; $x < sizeof($temp); $x++) {
      if ($current_id == $temp[$x]->order_id) {
        if ($x != 0) {
          array_push($orderlist[$indexat], $temp[$x]);
        }
      } else {
        $current_id = $temp[$x]->order_id;
        $indexat++;
        $orderlist[$indexat] = array($temp[$x]);
      }
    }

    if ($query->num_rows() > 0) {
      return $orderlist;
    } else {
      return $query->result();
    }
  }

  public function add_product() {
    $cateid = 0;
    $cate = $query = $this->db->get('product_categories')->result();
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
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'detail' => $this->input->post('detail'),
      'weight' => $this->input->post('weight'),
			'size' => $this->input->post('size'),
			'unit' => $this->input->post('unit'),
			'category_id' => $cateid,
      'image' => $image
		);
		$query = $this->db->insert('product', $data);
		if ($query) return true;
		else return false;
  }

  // Upload Config Loader
	public function get_upload_config(){
		return array(
			// Change path when you upload to a live server
			'upload_path'   => "C:xampp\htdocs\asia\public\image\product",
            'allowed_types' => 'gif|jpg|png|jpeg',
            'max_size'      => '1000',
            'max_width'     => '2000',
            'max_height'    => '2000',
            'encrypt_name'  => true,
            'overwrite'     => true
			);
	}
	// Update a upload and profiles table
	public function update_upload(){
		// Insert a Upload table
		$upload_data = $this->upload->data();
        $data_ary = array(
                'title'     => $upload_data['client_name'],
                'file'      => $upload_data['file_name'],
                'width'     => $upload_data['image_width'],
                'height'    => $upload_data['image_height'],
                'type'      => $upload_data['image_type'],
                'size'      => $upload_data['file_size'],
                'date'      => time(),
        );
        $this->db->insert('upload', $data_ary);

        // Check is default image or old image
        $this->db->where('id', $this->session->userdata('id'));
		$fetch_user = $this->db->get('user_profiles');
        if ($fetch_user->row()->image != 'default.gif'){
        	// Delete the old image
	        $this->do_delete_old_image();
        }


        // Update a profiles table
        $data = array(
        	'image' => $data_ary['file']
        	);
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('user_profiles', $data);

        // Resize image
        $this->do_profile_resize_image($data_ary);

        return $upload_data;
	}
	// Resize a image to 300 x 300 px
	public function do_profile_resize_image($data){
		//Your Image
		$imgSrc = 'public/upload/img/profile/' . $data['file'];

		//getting the image dimensions
		list($width, $height) = getimagesize($imgSrc);

		//saving the image into memory (for manipulation with GD Library)
		if ($data['type'] == "jpeg" || $data['type'] == "jpg")
			$myImage = imagecreatefromjpeg($imgSrc);
		else if ($data['type'] == "png")
			$myImage = imagecreatefrompng($imgSrc);
		else if ($data['type'] == "gij")
			$myImage = imagecreatefromgif($imgSrc);

		// calculating the part of the image to use for thumbnail
		if ($width > $height) {
		  $y = 0;
		  $x = ($width - $height) / 2;
		  $smallestSide = $height;
		} else {
		  $x = 0;
		  $y = ($height - $width) / 2;
		  $smallestSide = $width;
		}

		// copying the part into thumbnail
		$thumbSize = 300;
		$thumb = imagecreatetruecolor($thumbSize, $thumbSize);
		imagecopyresampled($thumb, $myImage, 0, 0, $x, $y, $thumbSize, $thumbSize, $smallestSide, $smallestSide);

		//final output
		$thumbnail_path = 'public/upload/img/profile/thumbnail_' . $data['file'];
		if ($data['type'] == "jpeg" || $data['type'] == "jpg") {
			imagejpeg($thumb, $thumbnail_path);
		}
		else if ($data['type'] == "png") {
			imagepng($thumb, $thumbnail_path);
		}
		else if ($data['type'] == "gif") {
			imagegif($thumb, $thumbnail_path);
		}

	}
	// Delete a old profile image
	public function do_delete_old_image(){
		$data = $this->get_profile();

		// Delete file
		$this->load->helper("file");
		$old_image_path = $data['image'];
		// Change path when you upload to a live server
		if ($old_image_path != 'default.gif') {
			unlink($_SERVER['DOCUMENT_ROOT']. 'ci/public/upload/img/profile/thumbnail_' .$old_image_path);
			unlink($_SERVER['DOCUMENT_ROOT']. 'ci/public/upload/img/profile/' .$old_image_path) ;
		}

		// Remove a file table in upload table
        $this->db->where('id', $this->session->userdata('id'));
        $fetch_image = $this->db->get('user_profiles')->row()->image;
        $this->db->where('file', $fetch_image);
        $this->db->delete('upload');

		// Remove filename in profiles table
		$temp_data = array(
			'image' => 'default.gif'
			);
		$this->db->where('id', $this->session->userdata('id'));
		$this->db->update('user_profiles', $temp_data);
	}


  public function get_categories() {
    $array = array();
    $query = $this->db->get('product_categories');
    foreach ($query->result() as $each) {
      array_push($array, $each->name);
    }
    return $array;
  }

  public function get_product_list($limit, $start) {
    $this->db->limit($limit, $start);
    $this->db->select('product.*,product_categories.name AS cate_name');
    $this->db->from('product');
    $this->db->join('product_categories', 'product.category_id = product_categories.id', 'left');
    $query = $this->db->get();
		return $query->result();
  }

  public function get_product($id) {
    $this->db->select('product.*,product_categories.name AS cate_name');
    $this->db->from('product');
    $this->db->join('product_categories', 'product.category_id = product_categories.id', 'left');
    $this->db->where('product.id', $id);
    $fetch = $this->db->get();

		return $fetch->result();
  }

  public function edit_product($id) {
    $cateid = 0;
    $cate = $query = $this->db->get('product_categories')->result();
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
      $data = $this->get_product($id);
  		$old_image_path = $data[0]->image;

  		// Change path when you upload to a live server
  		if ($old_image_path != 'test.png') {
  			unlink($_SERVER['DOCUMENT_ROOT']. 'asia/public/image/product/' .$old_image_path) ;
  		}
      $image = $this->upload->data('file_name');
    }

    $data = array(
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'detail' => $this->input->post('detail'),
			'category_id' => $cateid,
      'weight' => $this->input->post('weight'),
			'size' => $this->input->post('size'),
			'unit' => $this->input->post('unit'),
      'image' => $image
		);
    $this->db->where('id', $id);
    $this->db->update('product', $data);
		if ($query) return true;
		else return false;
  }

  public function delete_product($id) {
    $this->db->delete('product', array('id' => $id));
  }

  public function get_category_list($limit, $start){
    $this->db->limit($limit, $start);
    $query = $this->db->get('product_categories');
    return $query->result();
  }

  public function get_category_total_row() {
    $query = $this->db->get('product_categories');
    return $query->num_rows();
  }

  public function get_category($id) {
    $this->db->where('id', $id);
    $fetch = $this->db->get('product_categories');
		return $fetch->result();
  }

  public function add_category() {
    $data = array(
			'name' => $this->input->post('name'),
			'codename' => $this->input->post('codename'),
		);
		$query = $this->db->insert('product_categories', $data);
		if ($query) return true;
		else return false;
  }

  public function edit_category() {
    $data = array(
			'name' => $this->input->post('name'),
			'codename' => $this->input->post('codename'),
		);
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('product_categories', $data);
		if ($query) return true;
		else return false;
  }

  public function delete_category($id) {
    $this->db->delete('product_categories', array('id' => $id));
  }

  public function checkout(){
    //var_dump(sizeof($this->session->userdata('cart')));
    //break;

    $this->load->model('model_product');
    //$user = $this->model_user->get_user($this->session->userdata('id'));

    $data = array(
			'email' => $this->input->post('email_cus'),
      'username' => $this->session->userdata('username'),
			'fname' => $this->input->post('fname_cus'),
			'lname' => $this->input->post('lname_cus'),
      'idcard' => $this->input->post('idcard_cus'),
			'address' => $this->input->post('address'),
			'tel' => $this->input->post('tel'),
      'district' => $this->input->post('district'),
			'province' => $this->input->post('province'),
			'postcode' => $this->input->post('postcode'),
		);
		$query = $this->db->insert('order_orderer', $data);

    $data2 = array(
      'orderer_id' => $this->db->insert_id()
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
