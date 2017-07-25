<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller{

	public function _remap($alias_category, $params = array())

	{

		if ($this->ion_auth->logged_in() || $this->ion_auth->is_admin())
			
		{
		
		}else
		{
			redirect('/en/account/#login', 'refresh'); 
		}


		if (empty($params) && $alias_category == "index")

		{
			show_404();
		}


		if (empty($params) || (!empty($params) && is_numeric($params[0])))

		{

			if (!empty($alias_category))

				{

				$this->load->model("games_model");

					if ($this->ion_auth->logged_in())
					{
						$user = $this->ion_auth->user()->row();

						$this->games_model->add_other_click_time($user->id);
					}

				$page = 1;

				if (!empty($params) && !empty($params[0]) && is_numeric($params[0]))

				{
					$page = $params[0];
				}

				$data["category"] = $this->games_model->category_by_slug("en", $alias_category);

				if (empty($data["category"]))

				{

					show_404();	

				}

				$total_rows 					= $this->games_model->games_count($data["category"]->slug );

				$config['uri_segment'] 			= 4;

				$config["constant_num_links"] 	= TRUE;

				$config["use_page_numbers"] 	= TRUE;

				$config["total_rows"] 			= $total_rows;

				$config["per_page"] 			= 16;

				$data["games"] 					= $this->games_model->get_games("en", $data["category"]->slug , $config["per_page"], (($config["per_page"] * $page) - $config["per_page"]));

				$config["last_link"] 			= false;

				$config["first_link"] 			= false;

				$config["base_url"] 			= base_url() . "en/games-category/" . $data["category"]->slug . "/";
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

				$config["prev_link"]			= 'Previous';

				$this->load->library("pagination");

				$this->pagination->initialize($config);

				$data["links"] = $this->pagination->create_links();

				$rel_next = $page + 1;

				$data["slider_category"] = $this->games_model->games_played_this_week("en", $data["category"]->slug, $limit = 9);


				$this->template->content->view("en/category", $data);

				$this->template->publish("en/template");

			}

			else

			{

			show_404();

			}

		  }

		  else

		  {

				$alias = $params[0];

				$this->load->model('games_model');

				$data["game"] = $this->games_model->get_game("en", $alias);

				if (!empty($data["game"]))

				{

					// $this->template->menu 				= 'game';

					$this->template->meta_title 		= $data["game"]->name." - ".$data["game"]->category_name;

					$this->template->meta_description 	= $data["game"]->name." - ".$data["game"]->category_name." - ".$data["game"]->description;

					if ($this->ion_auth->logged_in())
					{
						$user = $this->ion_auth->user()->row();
						$this->games_model->add_game_played($user->id,$data["game"]->game_id);
						$this->games_model->add_game_played_time($user->id,$data["game"]->game_id);
					}
					

					$data["games"] = $this->games_model->get_games_random("en", NULL, 16);

					$this->template->content->view("en/game", $data);

				}

				else

				{

				show_404();

				}

			}

	}


}