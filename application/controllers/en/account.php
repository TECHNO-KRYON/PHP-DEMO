<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Account extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->lang->is_loaded     = array();
        $this->lang->language      = array();
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth') , $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->config->set_item('language', 'english');
        $this->lang->load('form_validation', 'english');
        $this->lang->load('ion_auth', 'english');
        
    }

    // redirect if needed, otherwise display the user list

    function index()
        {

        
        if (!$this->ion_auth->logged_in())
            
      {
          $data["type"] = "login";

            if (isset($_POST['password_confirm']))
               
            {
                $data["type"] = "registration";
                $tables = $this->config->item('tables', 'ion_auth');
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('birthdate', 'Date of birth', 'required');
                $this->form_validation->set_rules('gender', 'Gender', 'required');
                $this->form_validation->set_rules('first_name', 'First name', 'required');
                $this->form_validation->set_rules('last_name', 'Last name', 'required');
                $this->form_validation->set_rules('email', "Email", 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
                $this->form_validation->set_rules('password_confirm', 'Password confirmation', 'required');
                }
              else
                {
                    $data["type"] = "login";
                    $this->form_validation->set_rules('identity', 'Email', 'required|valid_email');
                    $this->form_validation->set_rules('password_identity', 'Password', 'required');
                }

            if ($this->form_validation->run() == true)
                {
                if (isset($_POST['password_confirm']))
                    {
                    $username    = str_replace(' ', '', $this->input->post('username'));
                    $email       = strtolower($this->input->post('email'));
                    $password    = $this->input->post('password');
                    $birthdate   = date("Y-m-d", strtotime($this->input->post('birthdate')));
                    $additional_data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name'  => $this->input->post('last_name'),
                        'birthdate'  => $birthdate,
                        'gender'     => $this->input->post('gender')
                    );
                    if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data))
                    {
                        $this->send_email_registration($email);
                        $this->session->set_flashdata('success', $this->ion_auth->messages());
                        redirect("en/account", 'refresh');
                    }

                  }
                  else
                    {

                    // check to see if the user is logging in
                    // check for "remember me"

                    $remember = (bool)$this->input->post('remember');
                    if ($this->ion_auth->login($this->input->post('identity') , $this->input->post('password_identity') , $remember))
                        {

                        // if the login is successful
                        // redirect them back to the home page

                        $this->session->set_flashdata('success', $this->ion_auth->messages());
                        redirect('/en/', 'refresh');
                        }
                      else
                        {

                        // if the login was un-successful
                        // redirect them back to the login page

                        $this->session->set_flashdata('message', $this->ion_auth->errors());
                        redirect('/en/account', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
                        }
                    }
                }
              else
                {
                $this->template->content->view('en/account/not_logged', $data);
                $this->template->publish("en/template");
                }
    

      }  else {

            if ($this->ion_auth->logged_in() && is_numeric($this->uri->segment(4))) 
            
                {
                    $this->load->model('gift_model');     
                    $data["user"] = $user = $this->gift_model->userdetails($this->uri->segment(4));
                }

            else       
            
                {
                    $data["user"] = $user = $this->ion_auth->user()->row();
                }

        $data["user"] = $user = $this->ion_auth->user()->row();
            if (isset($_POST['password_confirm']))
                {
                $data["type"] = "edit_profil";
                $tables = $this->config->item('tables', 'ion_auth');
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('first_name', 'First name', 'required');
                $this->form_validation->set_rules('last_name', 'Last name', 'required');
				$this->form_validation->set_rules('birthdate', 'Date of birth', 'required');
                $this->form_validation->set_rules('gender', 'Gender', 'required');
                if ($this->input->post('email') != $user->email)
                    {
                    $this->form_validation->set_rules('email', "Email", 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
                    }

                if ($this->input->post('password_confirm'))
                    {
                    $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
                    $this->form_validation->set_rules('password_confirm', 'Password confirmation', 'required');
                    }

                if ($this->form_validation->run() == true)
                    {
						
					$birthdate 	= date("Y-m-d", strtotime($this->input->post('birthdate')));
                    $data_user = array(
                        'username' => $this->input->post('username') ,

                        // 'email'      => $this->input->post('email'),

                        'first_name' => $this->input->post('first_name') ,
                        'last_name' => $this->input->post('last_name'),
						'gender'  	 => $this->input->post('gender'),
						'birthdate'  => $birthdate,
                    );
                    if ($this->input->post('password'))
                        {
                        $data_user['password'] = $this->input->post('password');
                        }

                    if ($this->ion_auth->update($user->id, $data_user))
                    {
                        $this->load->model('games_model');
						$this->games_model->update_photo($user->id);
						$this->session->set_flashdata('success', $this->ion_auth->messages());
                        redirect('en/account', 'refresh');
                    }
                      else
                        {
                        $this->session->set_flashdata('message', $this->ion_auth->errors());
                        }

                    }
                }

            $this->load->model('games_model');    
            $this->games_model->add_other_click_time($user->id);         
            $this->games_model->calculate_game_playing_time($user->id);                         
            $data["games"] = $this->games_model->get_games_by_user("en", $user->id, 16, NULL);





            $this->template->content->view('en/account/logged', $data);
            $this->template->publish("en/template");
      }
 }

public function logout()
        {

        $this->load->model("games_model");

            if ($this->ion_auth->logged_in())
            
            {
                $user = $this->ion_auth->user()->row();
                $this->games_model->add_other_click_time($user->id);           
            }



        $logout = $this->ion_auth->logout();

        // redirect them to the login page
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect('en/account/', 'refresh');
        }

    // forgot password

    function forgot_password()
        {

        $this->template->meta_title = "Forgot password ?";
        $this->template->meta_description = "Please enter your email address so we can send you a confirmation email to reset password.";

        // setting validation rules by checking wheather identity is username or email

        if ($this->config->item('identity', 'ion_auth') == 'username')
            {
            $this->form_validation->set_rules('email', "email", 'required');
            }
          else
            {
            $this->form_validation->set_rules('email', "email", 'required|valid_email');
            }

        if ($this->form_validation->run() == false)
            {
            $this->data['email'] = array(
                'name' => 'email',
                'id' => 'email'
            );
            if ($this->config->item('identity', 'ion_auth') == 'username')
                {
                $this->data['identity_label'] = $this->lang->line('forgot_password_username_identity_label');
                }
              else
                {
                $this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
                }

            // set any errors and display the form

            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->template->content->view('en/account/forgot_password', $this->data);
            $this->template->publish("en/template");
            }
          else
            {
           
            // get identity from username or email

            if ($this->config->item('identity', 'ion_auth') == 'username')
            {
                $identity = $this->ion_auth->where('username', strtolower($this->input->post('email')))->users()->row();
            }
            else
            {
                $identity = $this->ion_auth->where('email', strtolower($this->input->post('email')))->users()->row();
            }

            if (empty($identity))
            {
                if ($this->config->item('identity', 'ion_auth') == 'username')
                {
                    $this->ion_auth->set_message('forgot_password_username_not_found');
                }
                else
                {
                    $this->ion_auth->set_message('forgot_password_email_not_found');
                }

                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("en/account/forgot_password", 'refresh');
            }

            // run the forgotten password method to email an activation code to the user

               $forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')},$lang = "en");
	           if ($forgotten)
                    {

                    // if there were no errors
					$this->send_forgotten_password($forgotten);
                    $this->session->set_flashdata('success', "Your password is reset please check your inbox email");
					redirect("en/account/forgot_password", 'refresh'); //we should display a confirmation page here instead of the login page

                    }
                  else
                    {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
					redirect("en/account/forgot_password", 'refresh');

                    }
                }
            }
		
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{
			//if the code is valid then display the password reset form
			$this->form_validation->set_rules('new', "new password", 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');

			$this->form_validation->set_rules('new_confirm', "Confirm password", 'required');
			if ($this->form_validation->run() == false)
			{
				//display the form
				//set the flash data error message if there is one
				$this->data['message'] = $this->session->flashdata('message');
				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = array(
					'name' => 'new',
					'id'   => 'new',
					'type' => 'password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);

				$this->data['new_password_confirm'] = array(
					'name' => 'new_confirm',
					'id'   => 'new_confirm',
					'type' => 'password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['user_id'] = array(
					'name'  => 'user_id',
					'id'    => 'user_id',
					'type'  => 'hidden',
					'value' => $user->id,
				);

				$this->data['code'] = $code;
	
				$this->template->content->view('en/account/reset_password', $this->data);
           	 	$this->template->publish("en/template");

			}
			else
			{
				// do we have a valid request?
				if ($user->id != $this->input->post('user_id'))
				{
					//something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($code);
					show_error($this->lang->line('error_csrf'));
				}
				else
				{
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'ion_auth')};
					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));
					if ($change)
					{
						//if the password was successfully changed
						$this->session->set_flashdata('success', $this->ion_auth->messages());
						$this->logout();
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('en/account/reset_password' . $code, 'refresh');
					}

				}
			}
		}
		else
		{
			//if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("en/account/", 'refresh');
		}
	}
		


        private function identity_show($identity = '')
        {
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where("email", $identity);
            $query = $this->db->get();
            return $query->row();
            }
        }
		
