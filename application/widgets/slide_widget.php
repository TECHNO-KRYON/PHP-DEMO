<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class slide_widget extends Widget

{

	public function display()

	{	
		if (!in_array($this->uri->segment(1), array("ar","en"))) {
			$lang = "ar";
		}else{
			$lang = $this->uri->segment(1);
		}
		$this->load->model('games_model');	

		$data["slides"] = $this->games_model->get_slides($lang);

		$this->load->view('widgets/'.$lang.'/slide',$data);	

	} 

}