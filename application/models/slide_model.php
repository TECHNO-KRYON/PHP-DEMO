<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Slide_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function get_slides()
    {
		$this->db->select("*");
		$this->db->from('slides');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result();
    }
	
	function add() {
		
		$path 		= realpath(APPPATH . '../images/slides/');
		$path_url 	= base_url().'/images/slides/';
		$slide 		= new stdClass();
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $path,
			'max_size' => 0,
		);
		$this->load->library('upload');
		$this->upload->initialize($config);
		if($this->upload->do_upload('image')) {
			
			$image_data = $this->upload->data();
			$config = array(
				'source_image' 	=> $image_data['full_path'],
				'new_image' 	=> $path . '/thumbs',
				'maintain_ratio'=> true,
				'width' 		=> 115,
				'master_dim' 	=> 'width'
			);
			
			$this->load->library('image_lib', $config);
			
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$this->image_lib->clear();
			unset($config);
			$config 	= array(
				'source_image' 		=> $image_data['full_path'],
				'maintain_ratio' 	=> TRUE,
				'width' 			=> 928,
				'master_dim' 		=> 'width'
			);
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
		
			$slide->image   			= $image_data['file_name'];
		}
		
		
		$slide->title_ar   		= $_POST['title_ar'];
		$slide->title_en   		= $_POST['title_en'];			
		$slide->desc_ar   		= $_POST['desc_ar'];
		$slide->desc_en   		= $_POST['desc_en'];
		$slide->link_ar   		= $_POST['link_ar'];
		$slide->link_en   		= $_POST['link_en'];
		
		$this->db->insert('slides', $slide);
	}
	
	
	function edit($id) {
		
		$path 		= realpath(APPPATH . '../images/slides/');
		$path_url 	= base_url().'/images/slides/';
		$slide 		= new stdClass();
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $path,
			'max_size' => 0,
		);
		$this->load->library('upload');
		$this->upload->initialize($config);
		if($this->upload->do_upload('image')) {
			
			$image_data = $this->upload->data();
			$config = array(
				'source_image' 	=> $image_data['full_path'],
				'new_image' 	=> $path . '/thumbs',
				'maintain_ratio'=> true,
				'width' 		=> 115,
				'master_dim' 	=> 'width'
			);
			
			$this->load->library('image_lib', $config);
			
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$this->image_lib->clear();
			unset($config);
			$config 	= array(
				'source_image' 		=> $image_data['full_path'],
				'maintain_ratio' 	=> TRUE,
				'width' 			=> 928,
				'master_dim' 		=> 'width'
			);
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
		
			$slide->image   			= $image_data['file_name'];
		}
		
		$slide->title_ar   		= $_POST['title_ar'];
		$slide->title_en   		= $_POST['title_en'];			
		$slide->desc_ar   		= $_POST['desc_ar'];
		$slide->desc_en   		= $_POST['desc_en'];
		$slide->link_ar   		= $_POST['link_ar'];
		$slide->link_en   		= $_POST['link_en'];
		
		$this->db->update('slides', $slide, array('id' => $id));
	}
	
	
	
	function delete($id)
	{
		$this->db->delete('slides', array('id' => $id));
	}
	
	function get_slide_by_id($id)
    {
		$query = $this->db->get_where('slides', array('id' => $id), 1);
        return $query->row();
    }
}