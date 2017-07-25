<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class header_widget extends Widget

{

	public function display()
	{	
		if (!in_array($this->uri->segment(1), array("ar","en"))) {
			$lang = "ar";
		}else{
			$lang = $this->uri->segment(1);
		}
		$this->load->model('games_model');	

		$data["categories"] = $this->games_model->categories($lang);

		$this->load->view('widgets/'.$lang.'/header',$data);	

	} 

}