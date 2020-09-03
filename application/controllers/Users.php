<?php

class Users extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['page_title'] = 'Users';
        $data["main_body"] = "links/settings/users/index";
        $this->render_template($data);
    }
}
