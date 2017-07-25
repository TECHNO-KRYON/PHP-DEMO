<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");



class Home extends CI_Controller {
	
	
	

	public function _remap($alias,$params) {


		$this->load->model('games_model');

		if ($this->ion_auth->logged_in())
			{
				$user = $this->ion_auth->user()->row();
				$this->games_model->add_other_click_time($user->id);
			}

		if($this->uri->segment(2) == "search"){
			
			if($this->input->get('game')){
				$data["game"] = urldecode($this->input->get('game'));
			}else{
				$data["game"] = NULL;
			}

	
			$page = 1;
	
			if($alias != "index" && is_numeric($alias)){
	
				$page = $alias; 	
	
			}
	
			$total_rows						= $this->games_model->games_count(); 
	
			$config["constant_num_links"] 	= TRUE;			
	
			$config["use_page_numbers"] 	= TRUE;
	
			$config["total_rows"] 	    	= $total_rows;
	
			$config["per_page"] 			= 24;
			
			$data["games"] 					= $this->games_model->get_games("en",NULL,$config["per_page"],(($config["per_page"] * $page) - $config["per_page"]),$data["game"]);
	
			$config["last_link"]			= false;
	
			$config["first_link"]			= false; 
	
			$config["base_url"] 			= base_url() . "en/search/";
	
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
	
			$config["next_link"]			 = 'Next';
	
			$config["prev_link"]			 = 'Previous';
	
	
	
			$this->load->library("pagination");
	
			$this->pagination->initialize($config);
	
			$data["links"]   = $this->pagination->create_links();
	
			$this->template->menu = "home";
	
			$this->template->content->view("en/search", $data);	
	
			$this->template->publish("en/template");
			
		}else{
			
			$this->load->model("games_model");	
	
			
	
			$page = 1;
	
			if($alias != "index" && is_numeric($alias)){
	
				$page = $alias; 	
	
			}
	
			$total_rows						= $this->games_model->games_count(); 
	
			$config["constant_num_links"] 	= TRUE;			
	
			$config["use_page_numbers"] 	= TRUE;
	
			$config["total_rows"] 	    	= $total_rows;
	
			$config["per_page"] 			= 12;
	
			$data["games"] 					= $this->games_model->get_games("en",NULL,$config["per_page"],(($config["per_page"] * $page) - $config["per_page"]));
	
			$config["last_link"]			= false;
	
			$config["first_link"]			= false; 
	
			$config["base_url"] 			= base_url() . "en/games/";
	
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
	
			$config["next_link"]			 = 'Next';
	
			$config["prev_link"]			 = 'Previous';
	
			$this->load->library("pagination");
	
			$this->pagination->initialize($config);
	
			$data["links"]   = $this->pagination->create_links();
	
			$this->template->menu = "home";
	
			$this->template->content->view("en/home", $data);	
	
			$this->template->publish("en/template");
		}

	}

}



