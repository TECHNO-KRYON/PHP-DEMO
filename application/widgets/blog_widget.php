<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_widget extends Widget

{

	public function display()

	{	
		if (!in_array($this->uri->segment(1), array("ar","en"))) {
			$lang = "ar";
		}else{
			$lang = $this->uri->segment(1);
		}
		$this->load->model('games_model');	

		$data["blog"] = $this->games_model->get_blogs($lang);

		

		$data["count"] 			= count($data["blog"]);

		$data["per_page"] 		= 4;

		$data["count_page"] 	= round(intval($data["count"]) / intval($data["per_page"])); 

		if(intval($data["count"]) % 4 != 0){

			$data["count_page"]++;

		}

		$this->template->js->view($lang."/blog_js", $data);

		$this->load->view('widgets/'.$lang.'/blog',$data);	

	} 

}