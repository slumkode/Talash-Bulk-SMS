<?php

class Auth extends MY_Controller
{
    public function __construct()
    {
        /* Initialize the $id and $name variables to NULL */
        $this->id = null;
        $this->name = null;
        $this->authenticated = false;

        parent::__construct();
    }

    public function index()
    {
        redirect(base_url('auth/login'));
    }

    public function login()
    {
        $data['page_title'] = 'Login';
        $data["main_body"] = "links/auth/login";
        $this->load->view('includes/auth_template', $data);
    }

    public function register()
    {
        $data['page_title'] = 'Register';
        $data["main_body"] = "links/auth/register";
        $this->load->view('includes/auth_template', $data);
    }

    public function create()
    {
        $validator = array('success' => false, 'messages' => array());

        $validate_data = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|min_length[3]|max_length[12]|is_unique[users.username]',
                'errors' => array(
                    'required'      => 'You have not provided your "%s".',
                    'is_unique'     => 'This %s already exists.'
                )
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|is_unique[users.email]',
                'errors' => array(
                    'required'      => 'You have not provided your "%s".',
                    'is_unique'     => 'This %s already exists.'
                )
            ),

            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|matches[cpassword]|callback_valid_password',
                'errors' => array(
                    'required'      => 'You have not provided your "%s".',
                    'matches'       => 'Your password does not match with "Confirm Password"'
                )
            ),
            array(
                'field' => 'cpassword',
                'label' => 'Confirm Password',
                'rules' => 'required|matches[password]',
                'errors' => array(
                    'required'      => 'Please confirm your password.',
                    'matches'       => 'Your "Confirm Password" does not match with the "Password"'
                )
            )
        );

        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if ($this->form_validation->run() === true) {
            $this->db->trans_start();
            $date = date("Y-m-d H:i:s");
            /**
             * USERS
             * user_id
             * user_identifier
             * user_name
             * user_email
             * user_password
             * user_status
             * user_created_at
             * user_updated_at
             * user_deleted_at
             * user_created_by
             * user_updated_by
             * user_deleted_by
             *
             * ACCOUNT_SESSIONS
             * session_id
             * user_id
             * login_time
             */
            $user_data = [
                "user_name" => $this->input->post("username"),
                "user_email" => $this->input->post("email")
            ];
            $user_identifier = $this->fetch_identifier($this->input->post('email') . $date);
            $user_data["user_password"] = $this->encrypt_password($this->input->post('username') . $this->input->post('password'));
            $user_data["user_created_at"] = $date;
            $user_data["user_identifier"] = $user_identifier;
            $user_data['user_status'] = 'A';
            


            $user_id = $this->mdb->dbInsertReturn('users', $user_data);
            if ($this->db->trans_status() === false) {
                $this->db->trans_rollback();
                $validator = ['success' => false, 'messages' => "An error occured"];
            } else {
                $this->db->trans_commit();
                $validator = ['success' => true, 'messages' => "Your account was successfully created. Please go ahead and <a href='<?=base_url(`auth`)?>'>login</a>"];
            }
        } else {
            $validator['success'] = false;
            foreach ($_POST as $key => $value) {
                $validator['messages'][$key] = form_error($key);
            }
        } // /else

        echo json_encode($validator);
    }

    public function valid_password($password = '')
    {
        $password = trim($password);
        $regex_lowercase = '/[a-z]/';
        $regex_uppercase = '/[A-Z]/';
        $regex_number = '/[0-9]/';
        $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>à¸¢à¸‡~]/';
        if (empty($password)) {
            $this->form_validation->set_message('valid_password', 'The {field} field is required.');
            return false;
        }
        if (preg_match_all($regex_lowercase, $password) < 1) {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');
            return false;
        }
        if (preg_match_all($regex_uppercase, $password) < 1) {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');
            return false;
        }
        if (preg_match_all($regex_number, $password) < 1) {
            $this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');
            return false;
        }
        if (preg_match_all($regex_special, $password) < 1) {
            $this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>à¸¢à¸‡~'));
            return false;
        }
        if (strlen($password) < 8) {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least 8 characters in length.');
            return false;
        }
        if (strlen($password) > 32) {
            $this->form_validation->set_message('valid_password', 'The {field} field cannot exceed 32 characters in length.');
            return false;
        }
        return true;
    }
}
