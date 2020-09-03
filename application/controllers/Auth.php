<?php

class Auth extends MY_Controller{
    public function __construct()
    {
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

    
}