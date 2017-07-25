<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class games_model extends CI_Model
{

	function __construct()
	{

	parent::__construct();

	}

	function categories($lang)
	{

		$name = "name_" . $lang;
	
		$this->db->select("id," . $name . " as name,slug");
	
		$this->db->from('category');
	
		$this->db->limit(8);
	
		$query = $this->db->get();
	
		return $query->result();

	}
	
	function category_by_slug($lang, $slug)

		{

		$name = "name_" . $lang;

		$description = "meta_description_" . $lang;

		$this->db->select("id," . $name . " as name," . $description . " as meta_description,slug");

		$this->db->from('category');

		$this->db->where('slug =', $slug);

		$query = $this->db->get();

		return $query->row();

		}



	function games_played_this_week($lang, $slug = NULL, $limit = 4)

		{

		$name = "games.name_" . $lang . " as name";

		$name_cat = "category.name_" . $lang . " as category_name";

		$desc = "games.desc_" . $lang . " as description";

		$slug_cat = "category.slug as slug_cat";

		$this->db->select("" . $name . "," . $desc . "," . $name_cat . "," . $slug_cat . ",games.slug,note,src_type,add_date,file_ftp,games.extension as extension");

		$this->db->join('category', 'category.id = games.category');

		$this->db->from('games');

		if (!empty($slug))

			{

			$this->db->where('category.slug =', $slug);

			}



		$this->db->limit($limit);

		$this->db->order_by('games.id', 'desc');

		$query = $this->db->get();

		return $query->result();

		}



	function get_games($lang, $slug = NULL, $limit = 10, $start = NULL,$search = NULL)

		{

		$game_name = "games.name_" . $lang;

		$name = "games.name_" . $lang . " as name";

		$name_cat = "category.name_" . $lang . " as category_name";

		$desc = "games.desc_" . $lang . " as description";

		$slug_cat = "category.slug as slug_cat";

		$this->db->select("" . $name . "," . $desc . "," . $name_cat . "," . $slug_cat . ",games.slug,note,src_type,add_date,file_ftp,games.extension as extension,games.code");

		$this->db->join('category', 'category.id = games.category');

		$this->db->from('games');

		if (!empty($slug))

			{

			$this->db->where('category.slug =', $slug);

			}



		if (!empty($start))

			{

			$this->db->limit($limit, $start);

			}

		  else

			{

			$this->db->limit($limit);

			}
		if (!empty($search))
		{
			$this->db->like("games.name_ar", $search, 'both'); 
			$this->db->or_like("games.name_en", $search, 'both'); 
		}


		$this->db->order_by("games.id", "desc");

		$query = $this->db->get();

		return $query->result();

		}



	function get_games_random($lang, $slug = NULL, $limit = 20, $start = NULL)

		{

		$name = "games.name_" . $lang . " as name";

		$name_cat = "category.name_" . $lang . " as category_name";

		$desc = "games.desc_" . $lang . " as description";

		$slug_cat = "category.slug as slug_cat";

		$this->db->select("" . $name . "," . $desc . "," . $name_cat . "," . $slug_cat . ",games.slug,note,src_type,add_date,file_ftp,games.extension as extension");

		$this->db->join('category', 'category.id = games.category');

		$this->db->from('games');

		if (!empty($slug))

			{

			$this->db->where('slug =', $slug);

			}



		if (!empty($start))

			{

			$this->db->limit($limit, $start);

			}

		  else

			{

			$this->db->limit($limit);

			}



		$this->db->order_by("games.id", "RANDOM");

		$query = $this->db->get();

		return $query->result();

		}



	public



	function games_count($slug = NULL,$search = NULL)
	{

		if (!empty($slug))
		{
			$this->db->where('category.slug =', $slug);
			$this->db->join('category', 'category.id = games.category');
			return $this->db->count_all_results('games');

		}elseif (!empty($search)) {

			$this->db->like("games.name_ar", $search, 'both'); 
			$this->db->or_like("games.name_en", $search, 'both'); 
			return $this->db->count_all_results('games');

		 }else{

			return $this->db->count_all("games");
		}

	}



	function get_blogs($lang)

		{

		$title = "blog.title_" . $lang . " as title";

		$alias = "blog.alias_" . $lang . " as alias";

		$meta_desc = "blog.meta_desc_" . $lang . " as meta_desc";

		$intro = "blog.intro_" . $lang . " as intro";

		$text = "blog.text_" . $lang . " as text";

		$this->db->select("" . $title . "," . $alias . "," . $meta_desc . "," . $intro . "," . $text . ",image");

		$this->db->from('blog');

		$this->db->where('active =', 1);

		$this->db->order_by("id", "desc");

		$this->db->limit(100);

		$query = $this->db->get();

		return $query->result();

		}



	function get_slides($lang)

		{

		$title = "title_" . $lang . " as title";

		$desc = "desc_" . $lang . " as description";
		
		$link = "link_" . $lang . " as link";

		$this->db->select($title . "," . $desc ."," . $link . ",image");

		$this->db->from('slides');

		$this->db->order_by("id", "desc");

		$this->db->limit(25);

		$query = $this->db->get();

		return $query->result();

		}



	function get_blogs_rand($lang, $limit = 3)

		{

		$title = "blog.title_" . $lang . " as title";

		$alias = "blog.alias_" . $lang . " as alias";

		$meta_desc = "blog.meta_desc_" . $lang . " as meta_desc";

		$intro = "blog.intro_" . $lang . " as intro";

		$text = "blog.text_" . $lang . " as text";

		$this->db->select("" . $title . "," . $alias . "," . $meta_desc . "," . $intro . "," . $text . ",image");

		$this->db->from('blog');

		$this->db->where('active =', 1);

		$this->db->limit($limit);

		$this->db->order_by("id", "RANDOM");

		$query = $this->db->get();

		return $query->result();

		}



	function categories_games($lang)

	{

		$name = "name_" . $lang;

		$this->db->select("id," . $name . " as name,slug");

		$this->db->from('category');

		$this->db->limit(8);

		$query = $this->db->get();

		$query = $query->result();

		foreach($query as $q)

		{

			$q->games = $this->get_games_random($lang, $slug = NULL, $limit = 10, $start = NULL);

			

		}

	

		return $query; 

	}



	function get_game($lang, $slug)

	{

		$name = "games.name_" . $lang . " as name";

		$name_cat = "category.name_" . $lang . " as category_name";

		$desc = "games.desc_" . $lang . " as description";

		$this->db->select("games.id as game_id," . $name . "," . $desc . "," . $name_cat . ",games.slug,note,src_type,add_date,file_ftp,games.extension as extension,games.code");

		$this->db->join('category', 'category.id = games.category');

		$this->db->from('games');

		$this->db->where('games.slug =', $slug);

		$this->db->order_by("games.id", "desc");

		$query = $this->db->get();

		return $query->row();

	}



	function blog_by_slug($lang, $slug)

	{

		$title = "title_" . $lang;

		$alias = "alias_" . $lang;

		$meta_desc = "meta_desc_" . $lang;

		$intro = "intro_" . $lang;

		$text = "text_" . $lang;

		$this->db->select("id," . $title . " as title," . $alias . " as alias," . $meta_desc . " as meta_desc," . $intro . " as intro," . $text . " as text,image,video");

		$this->db->from('blog');

		$this->db->like($alias, $slug);

		$query = $this->db->get();

		return $query->row();

	}



	function next_blog($lang, $id)

		{

		$title = "title_" . $lang;

		$alias = "alias_" . $lang;

		$meta_desc = "meta_desc_" . $lang;

		$intro = "intro_" . $lang;

		$text = "text_" . $lang;

		$this->db->select("id," . $title . " as title," . $alias . " as alias," . $meta_desc . " as meta_desc," . $intro . " as intro," . $text . " as text,image,video");

		$this->db->from('blog');

		$this->db->where('blog.id >', $id);

		$this->db->where('blog.active =', 1);

		$query = $this->db->get();

		return $query->row();

		}



	function previous_blog($lang, $id)
	{

	$title = "title_" . $lang;

	$alias = "alias_" . $lang;

	$meta_desc = "meta_desc_" . $lang;

	$intro = "intro_" . $lang;

	$text = "text_" . $lang;

	$this->db->select("id," . $title . " as title," . $alias . " as alias," . $meta_desc . " as meta_desc," . $intro . " as intro," . $text . " as text,image,video");

	$this->db->from('blog');

	$this->db->where('blog.id <', $id);

	$this->db->where('blog.active =', 1);

	$query = $this->db->get();

	return $query->row();

	}
	
	function add_game_played($user_id,$game_id)
	{
		$this->db->where('games_played.ref_user =', $user_id);
		$this->db->where('games_played.ref_game =', $game_id);
		$this->db->from('games_played');
		$count = $this->db->count_all_results();
		if($count == 0){
			$this->db->insert('games_played', array("ref_user" => $user_id, "ref_game" => $game_id)); 
		}
	}
	
	function add_game_played_time($user_id,$game_id)
	{
			$this->db->select('games_played_time.games_played_time_id');
		    $this->db->where('games_played_time.ref_user =', $user_id);
		    $this->db->order_by("games_played_time.games_played_time_id", "DESC");
		    $this->db->limit(1);
		    $this->db->from('games_played_time');
		    $query = $this->db->get();

		    if ( $query->num_rows() > 0 )
    		{
		        $row = $query->row();
		        $games_played_time_id = $row->games_played_time_id;
		        $end_time = date("Y-m-d H:i:s");
		        $data_time = array('end_time'  =>  $end_time);

		     $this->db->where('games_played_time.games_played_time_id =', $games_played_time_id);
		     $this->db->update('games_played_time', $data_time);
    		}

			$this->db->insert('games_played_time', array("ref_user" => $user_id, "ref_game" => $game_id, "start_time" => date("Y-m-d H:i:s"))); 


	}

	function add_other_click_time($user_id)
	{
			$this->db->select('games_played_time.games_played_time_id');
		    $this->db->where('games_played_time.ref_user =', $user_id);
		    $this->db->order_by("games_played_time.games_played_time_id", "DESC");
		    $this->db->limit(1);
		    $this->db->from('games_played_time');
		    $query = $this->db->get();

		    if ( $query->num_rows() > 0 )
    		{
		        $row = $query->row();
		        $games_played_time_id = $row->games_played_time_id;
		        $end_time = date("Y-m-d H:i:s");


		        $data_time = array('end_time'  =>  $end_time);

		     $this->db->where('games_played_time.games_played_time_id =', $games_played_time_id);
		     $this->db->update('games_played_time', $data_time);
    		}

		$this->db->insert('games_played_time', array("ref_user" => $user_id, "start_time" => date("Y-m-d H:i:s"))); 

	}

	function calculate_game_playing_time($user_id)
	{



			$this->db->select('*');
		    $this->db->where('games_played_time.ref_user =', $user_id);
		    $this->db->where('games_played_time.ref_game != ""');	
		    $this->db->where('games_played_time.end_time != ""');	    
		 //   $this->db->order_by("games_played_time.games_played_time_id", "ASC");
		    $this->db->from('games_played_time');

		    $query = $this->db->get();

		    if ( $query->num_rows() > 0 )
    		{

		    foreach ($query->result() as $row)
    		{
		        $ref_user = $row->ref_user;
		        $ref_game= $row->ref_game;		        
		        $start_time = $row->start_time;
		        $end_time = $row->end_time;

		        //$played_time = $this->time_difference($end_time, $start_time);
		        $to_time = strtotime($end_time);
                $from_time = strtotime($start_time);
                $played_time = round(abs($to_time - $from_time) / 60,2);

                if($played_time > 29)
                {
                	$points = 1 ;	
                }else{
                	$points = 0 ;	
                }


				$this->db->insert('users_points', array("point" => $points,"ref_user" => $ref_user,"ref_game" => $ref_game, "time_played" => $played_time));
    		}

    	}
				$this->db->where('ref_user', $user_id);
                $this->db->delete('games_played_time');
	}
	
// 	function time_difference($from_time=0, $to_time=null) {
    
//     //If not set - use current time
//     if(!$to_time) { $to_time= time(); }
    
//     //timestamp difference
//     $difference = round(abs($to_time - $from_time));
    
//     //Try seconds first
//     if ($difference <= 60) {
//         return $difference. ' seconds';
//     }
    
//     //Time Types (you can add to this)
//     $times = array(
//         'minute'    => 60,
//         'hour'        => 60,
//         'day'        => 24,
//         'week'        => 7,
//         'month'        => 4,
//         'year'        => 12
//     );
    
    
//     //Try each type of time
//     foreach($times as $type => $value) {
    
//         //Find number of minutes
//         $difference = round($difference / $value);
    
//         if ($difference <= $value) {
//             return $difference. ' '. $type. ($difference > 1 ? 's' : '');
//         }
//     }
// }
	
    function get_points_by_user($lang,$user_id)
    {
		$this->db->select('point');
		$this->db->where('users_points.ref_user =', $user_id);		
		$this->db->from('users_points');
		$query = $this->db->get();

		if ( $query->num_rows() > 0 )
    	{
		    $points = 0;
			foreach ($query->result() as $row)
    		{
		        $points += $row->point;

	    	}
		$this->db->select('gift_points');
		$this->db->where('users_orders.ref_user =', $user_id);
		$this->db->where('users_orders.status !="Rejected"');							
		$this->db->from('users_orders');
		$queries = $this->db->get();
		if ( $queries->num_rows() > 0 )
		{
		    $giftpoints= 0;
			foreach ($queries->result() as $row)
    		{
		        $giftpoints += $row->gift_points;
	    	}
	    $points = $points -	$giftpoints;
	    return $points ;	    	    
		}
		else
		{
	   		 return $points ;
		}
	}
}

    function reset_user_points_played_games($user_id)
    {
		$this->db->where('ref_user', $user_id);
		$this->db->where('point', 0);	
		$this->db->order_by("users_points.id", "ASC");
		$this->db->delete('users_points'); 
    }
    function reset_user_points_and_played_games($points,$user_id)
    {
		
		$this->db->where('ref_user', $user_id);
		$this->db->where('point', 1);
		$this->db->order_by("users_points.id", "ASC");
		$this->db->limit($points);
		$this->db->delete('users_points'); 


    }

    function get_points_by_user_table($user_id)
    {

            $this->db->select('*');
            $this->db->from('users_points a'); 
            $this->db->join('games b', 'b.id=a.ref_game', 'left');	
			$this->db->where('a.time_played >', 1);				
			$this->db->where('a.ref_user =', $user_id);	
			$query = $this->db->get();
			return $query->result();	

    }
 //    function get_points_by_game($lang, $user_id)
 //    {
	// 	//$this->db->select_sum('point');
	// 	$points = array();
	// 	$this->db->select('ref_game');
	// 	$this->db->where('users_points.ref_user =', $user_id);		
	// 	$this->db->from('users_points');
	// 	$query = $this->db->get();
	// 	$query = $query->result();

	// 		foreach ($query->result() as $row)
 //    		{
	// 	        $point = $row->ref_game;
	// 	        $points = $this->get_game_by_points($lang, $point);
	//     	}

	// }
			//return $points = $data->point;
// function get_game_by_points($lang, $id)
// {
// 		$name = "games.name_" . $lang . " as name";

// 		$name_cat = "category.name_" . $lang . " as category_name";

// 		$desc = "games.desc_" . $lang . " as description";

// 		$slug_cat = "category.slug as slug_cat";

// 		$this->db->select("" . $name . "," . $desc . "," . $name_cat . "," . $slug_cat . ",games.slug,note,src_type,add_date,file_ftp,games.extension as extension");

// 		$this->db->join('users_points', 'users_points.id = games.id');
// 		$this->db->where('users_points.point = 1');
// 		$this->db->from('games');
// 		$this->db->order_by('games.id', 'desc');

// 		$query = $this->db->get();

// 		return $query->result();
// }


	
	function get_games_by_user($lang,$user_id,$limit = 20, $start = NULL)
	{

		$name 		= "games.name_" . $lang . " as name";
		$name_cat 	= "category.name_" . $lang . " as category_name";
		$desc 		= "games.desc_" . $lang . " as description";
		$slug_cat 	= "category.slug as slug_cat";

		$this->db->select("" . $name . "," . $desc . "," . $name_cat . "," . $slug_cat . ",games.slug,note,src_type,add_date,file_ftp,games.extension as extension");
		$this->db->from('games_played');
		$this->db->join('games', 'games.id = games_played.ref_game');
		$this->db->join('category', 'category.id = games.category');
		$this->db->where('games_played.ref_user =', $user_id);
		$this->db->where('games_played.reset =', 0);
		if (!empty($start))
		{
			$this->db->limit($limit, $start);
		}
		else
		{
			$this->db->limit($limit);
		}
		$this->db->order_by("games.id", "desc");
		$query = $this->db->get();
		return $query->result();

	}
	
	public function update_photo($id) {
		
		if (!file_exists(realpath(APPPATH . '../images/profil/')."/".$id."/")) {
			mkdir(realpath(APPPATH . '../images/profil/')."/".$id."/", 0755);
		}
		
		if (!file_exists(realpath(APPPATH . '../images/profil/')."/".$id."/thumbs/")) {
			mkdir(realpath(APPPATH . '../images/profil/')."/".$id."/thumbs/", 0755);
		}
		$path = realpath(APPPATH . '../images/profil/'.$id.'/');
		
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' 	=> $path,
			'max_size' 		=> 6000,
		);
		$this->load->library('upload');
		$this->upload->initialize($config);
		
		if($this->upload->do_upload('photo')) {

			$image_data = $this->upload->data();

			$config = array(
				'source_image' 	 => $image_data['full_path'],
				'new_image' 	 => $path . '/thumbs',
				'maintain_ratio' => true,
				'width' 		 => 169,
				'master_dim' 	 => 'width'
			);

			$this->load->library('image_lib', $config);
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$this->image_lib->clear();

			if(!empty($image_data['file_name'])){
				$data_user = array('photo' => $image_data['file_name']);
				$this->db->update('users', $data_user, array('id' => $id));
			}
		}
	}
	
	function count_played_game($ref_user){
		
		$this->db->distinct("ref_game");
		$this->db->where('ref_user =', $ref_user);
		$this->db->where('reset =', 0);
		$this->db->from('games_played');
 		return $this->db->count_all_results();	
	}
	
	function top_players($lang = "ar")
	{
		
		$this->db->select("users.id as id,username,first_name,last_name,count(games_played.ref_game) as count_played_game,photo,gender");
		$this->db->from('users');
		$this->db->join("games_played","games_played.ref_user = users.id");
		$this->db->join("users_groups","users_groups.user_id = users.id");
		$this->db->where('reset =', 0);
		$this->db->where('group_id !=', 1);
		$this->db->group_by("ref_user");
		$this->db->limit(10);
		$this->db->order_by("count_played_game","desc");
		$query = $this->db->get();
		$query = $query->result();

		foreach ($query as $key => $value) {

			$name = "games.name_" . $lang . " as name";
			$name_cat = "category.name_" . $lang . " as category_name";
			$desc = "games.desc_" . $lang . " as description";
			$slug_cat = "category.slug as slug_cat";
			$this->db->select("" . $name . "," . $desc . "," . $name_cat . "," . $slug_cat . ",games.slug,note,src_type,add_date,file_ftp,games.extension as extension");
			$this->db->from('games_played');
			$this->db->join('games', 'games.id = games_played.ref_game');
			$this->db->join('category', 'category.id = games.category');
			$this->db->where('ref_user =', $value->id);
			$this->db->limit(4);
			$this->db->order_by('games.id', 'RANDOM');
			$query2 = $this->db->get();
			$value->games = $query2->result();
		}
		return $query;
	}
}
	
	