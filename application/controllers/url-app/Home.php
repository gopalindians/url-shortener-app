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
            $this->load->view('url-app/home/index.php');
            $this->load->view('url-app/include/footer.php');
        } else {
            redirect('/url-app/account/login');
        }

    }


    public function getusers()
    {

        $date = new DateTime();
        $users = [
            0 => [
                'name' => 'Gopal',
                'age' => 26,
                'place' => 'Jammu',
                'created_at' => $date->format('Y-m-d H:i:s')
            ], 1 => [
                'name' => 'गोपाल',
                'age' => 25,
                'place' => 'Jammu',
                'created_at' => $date->format('Y-m-d H:i:s')
            ],
        ];

        header('Content-type:application/json; charset=UTF-8');
        echo json_encode($users);
    }
}