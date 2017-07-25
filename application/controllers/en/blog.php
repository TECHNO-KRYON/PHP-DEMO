<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Blog extends CI_Controller{







	public function _remap($alias_blog, $params = array())



	{
		if ($this->ion_auth->logged_in() || $this->ion_auth->is_admin())
			
		{
		
		}else
		{
			redirect('/en/account/#login', 'refresh'); 
		}
				$this->load->model('games_model');

					if ($this->ion_auth->logged_in())
					{
						$user = $this->ion_auth->user()->row();
						$this->games_model->add_other_click_time($user->id);
					}

		if (empty($params) && $alias_blog == "index" || $this->uri->segment(3) == "page")
		{



			$this->load->helper("url");
			$this->load->model("Blog_model");
			
			$page = $this->uri->segment(4);
	
			$total_rows = $this->Blog_model->record_count();
			$config = array();
			$config["base_url"] 			= base_url() . "/".$this->uri->segment(1)."/".$this->uri->segment(2)."/page/";
			$config["total_rows"] 			= $total_rows;
			$config["per_page"]   			= 3;
			$config["uri_segment"]			= 4;
			$config["constant_num_links"] 	= TRUE;
			$config["use_page_numbers"] 	= TRUE;
			$config["full_tag_open"] 		= "<ul>";
			$config["full_tag_close"] 		= "</ul>";
			$config["num_tag_open"] 		= "<li>";
			$config["num_tag_close"] 		= "</li>";
			$config["cur_tag_open"] 		= '<li class="active"><a href="#" class="active">';
			$config["next_tag_open"] 		= "<li>";
			$config["next_tagl_close"] 		= "</li>";
			$config["prev_tag_open"] 		= "<li>";
			$config["prev_tagl_close"] 		= "</li>";
			$config["first_tag_open"] 		= "<li>";
			$config["first_tagl_close"] 	= "</li>";
			$config["last_tag_open"] 		= "<li>";
			$config["last_tagl_close"] 		= "</li>";
			$config["next_link"]			= 'Next';
			$config["prev_link"]			= 'Prev';
			$config['first_link'] 			= 'First';
			$config['last_link'] 			= 'Last';
			
			$this->load->library("pagination");
			$this->pagination->initialize($config);
			$data["results"] = $this->Blog_model->get_blog_active($config["per_page"], $page,"en");
			$data["links"] 	 = $this->pagination->create_links();	
			$this->template->menu = 'blog';
			$this->template->content->view("en/blogs", $data);
			$this->template->publish("en/template-ss");



		}else{


			$this->load->model("games_model");



			$data["blog"] = $this->games_model->blog_by_slug("en", $alias_blog);

				if(!empty($data["blog"])){

					

				$this->template->menu 				= 'blog';

				$data["next_blog"] 		= $this->games_model->next_blog("en", $data["blog"]->id);
				$data["previous_blog"] 	= $this->games_model->previous_blog("en", $data["blog"]->id);

				$this->template->content->view("en/blog", $data);
				$this->template->publish("en/template");

			

			}else{

				show_404();	

			}

		



		}



	}



}	