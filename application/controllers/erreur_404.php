<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class erreur_404 extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		if (!in_array($this->uri->segment(1), array("game"))) {
			$lang = "game";
		}else{
			$lang = $this->uri->segment(1);
		}
		$this->template->menu = "404";
		$this->output->set_status_header('404');
		$this->template->meta_title = "404 File Not Found";
		$this->template->content->view($lang.'/404');	
		$this->template->publish($lang."/template");
		
	}
	
}