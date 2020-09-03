<?php
error_reporting(0);

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render_template($data = array())
    {
        $this->load->view('includes/template', $data);
    }
}
