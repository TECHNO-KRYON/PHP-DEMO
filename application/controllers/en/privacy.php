<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Privacy extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
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
		$this->template->content->view("en/privacy");
		$this->template->publish("en/template");
	}
	
}
