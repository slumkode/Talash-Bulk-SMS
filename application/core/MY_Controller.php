<?php
error_reporting(0);

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        date_default_timezone_get('Africa/Nairobi');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        parent::__construct();
    }

    public function isLoggedIn()
    {
        if ($this->session->userdata('logged_in') === true) {
            redirect(base_url('dashboard'), 'refresh');
        }
    }

    public function isNotLoggedIn()
    {
        if ($this->session->userdata('logged_in') !== true) {
            redirect(base_url('auth'), 'refresh');
        }
    }

    public function render_template($data = array())
    {
        $this->isNotLoggedIn();

        $this->load->view('includes/template', $data);
    }

    public function fetch_identifier($identifier)
    {
        $encryption_key = $this->config->item('encryption_key');
        $salt = $this->config->item("encryption_salt");
        $result = md5($encryption_key . $identifier . $salt);
        return $result;
    }

    public function encrypt_password($password)
    {
        $encryption_key = $this->config->item('encryption_key');
        $salt = $this->config->item("encryption_salt");
        $encrypted_password = sha1($encryption_key . $password . $salt);
        return $encrypted_password;
    }
}
