<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('email') !== NULL) {
            $this->load->view('url-app/include/header.php');
            $this->load->view('url-app/url/index.php');
            $this->load->view('url-app/include/footer.php');
        } else {
            redirect('/url-app/account/login');
        }

    }
}