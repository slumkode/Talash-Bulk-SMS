<?php

class Dashboard extends MY_Controller
{
    public function __construction()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['page_title'] = 'Dashboard';
        $data["main_body"] = "links/dashboard/index";
        $this->render_template($data);
    }
}