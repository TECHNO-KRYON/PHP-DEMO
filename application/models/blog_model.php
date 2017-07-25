<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Blog_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function get_all_blog()
    {
		$this->db->select("*");
		$this->db->from('blog');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result();
    }
	
	function get_blog_active($limit, $starts,$lang = "ar")
    {
    	$start = $starts * $limit;
		$title = "blog.title_" . $lang . " as title";
		$alias = "blog.alias_" . $lang . " as alias";
		$meta_desc = "blog.meta_desc_" . $lang . " as meta_desc";
		$intro = "blog.intro_" . $lang . " as intro";
		$text = "blog.text_" . $lang . " as text";
		$this->db->select("" . $title . "," . $alias . "," . $meta_desc . "," . $intro . "," . $text . ",image");
		$this->db->from('blog');
	
		$this->db->order_by("id", "desc");
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result();
    }
	
	public function record_count() {
		return $this->db->count_all("blog");
    }
	
	function add() {
		
		$path 		= realpath(APPPATH . '../images/blog/');
		$path_url 	= base_url().'/images/blog/';
		$blog 		= new stdClass();
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $path,
			'max_size' => 6000,
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
				'width' 			=> 580,
				'master_dim' 		=> 'width'
			);
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
		
			$blog->image   			= $image_data['file_name'];
		}
		
		
		$blog->title_ar   		= $_POST['title_ar'];
		$blog->title_en   		= $_POST['title_en'];			
		$blog->alias_ar   		= urlencode($this->Slug($_POST['alias_ar']));
		$blog->alias_en   		= urlencode($this->Slug($_POST['alias_en']));
		$blog->intro_ar   		= $_POST['intro_ar'];
		$blog->intro_en   		= $_POST['intro_en'];
		$blog->text_ar   		= $_POST['text_ar'];
		$blog->text_en   		= $_POST['text_en'];
		$blog->active   		= $_POST['active'];
		$blog->meta_desc_ar   	= $_POST['meta_desc_ar'];
		$blog->meta_desc_en   	= $_POST['meta_desc_en'];
		$blog->video   			= $_POST['video'];
		
		$this->db->insert('blog', $blog);
	}
	
	
	function edit($id) {
		
		$path 		= realpath(APPPATH . '../images/blog/');
		$path_url 	= base_url().'/images/blog/';
		$blog 		= new stdClass();
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $path,
			'max_size' => 6000,
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
				'width' 			=> 580,
				'master_dim' 		=> 'width'
			);
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
		
			$blog->image   			= $image_data['file_name'];
		}
		
		
		$blog->title_ar   		= $_POST['title_ar'];
		$blog->title_en   		= $_POST['title_en'];			
		$blog->alias_ar   		= urlencode($_POST['alias_ar']);
		$blog->alias_en   		= urlencode($this->Slug($_POST['alias_en']));
		$blog->intro_ar   		= $_POST['intro_ar'];
		$blog->intro_en   		= $_POST['intro_en'];
		$blog->text_ar   		= $_POST['text_ar'];
		$blog->text_en   		= $_POST['text_en'];
		$blog->active   		= $_POST['active'];
		$blog->meta_desc_ar   	= $_POST['meta_desc_ar'];
		$blog->meta_desc_en   	= $_POST['meta_desc_en'];
		$blog->video   			= $_POST['video'];
		
		$this->db->update('blog', $blog, array('id' => $id));
	}
	
	
	
	function delete($id)
	{
		$this->db->delete('blog', array('id' => $id));
	}
	
	function get_blog_by_id($id)
    {
		$query = $this->db->get_where('blog', array('id' => $id), 1);
        return $query->row();
    }
	
	function remove_accent($str)
   {
	  $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð',
					'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã',
					'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ',
					'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ',
					'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę',
					'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī',
					'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ',
					'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ',
					'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 
					'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 
					'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ',
					'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ',"'"); 
	
	  $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O',
					'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c',
					'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u',
					'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D',
					'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g',
					'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K',
					'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o',
					'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S',
					's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W',
					'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i',
					'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o', '');
	  return str_replace($a, $b, $str);
	}
	
	function Slug($str){
		
	  $str  = trim(strtolower($str));
	  $str  = str_replace(' ', '', $str);
	  $str  = str_replace(')', '', $str);
	  $str  = str_replace('(', '', $str);
	  $str = str_replace('-br-', '-', $str);
	  $str = str_replace('<br>', '-', $str);
	  return mb_strtolower(preg_replace(array('/[^a-zA-Z0-9 \'-]/', '/[ -\']+/', '/^-|-$/'),
	  array('', '-', ''), $this->remove_accent($str)));
	}
	
}