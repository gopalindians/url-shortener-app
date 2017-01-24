<?php

/**
 * Created by PhpStorm.
 * User:
 * Date: 19-01-2017
 * Time: 17:00
 */
class History extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('email') === NULL) {
            redirect('url-app/account/login');
        }

    }

    public function index()
    {

        $userEmail = $this->session->userdata('email');
        $userData = $this->Account_Model->getUserData($userEmail);
        $userId = $userData[0]['id'];
        $urlHistory = $this->History_Model->getUrlHistory($userId);


        if ($urlHistory === false) {
            $urlHistory = [];
        }

        $this->load->view('url-app/include/header.php');
        $this->load->view('url-app/history/index.php', ['urlHistory' => $urlHistory]);
        $this->load->view('url-app/include/footer.php');

    }

    public function getMore()
    {
        if (!$this->input->is_ajax_request()) {
            $result = ['error' => 'Not allowed'];
            header('Content-Type:application/json');
            echo json_encode($result);
            return;
        }


        if (!is_int(abs($this->input->get('offset')))) {
            $result = ['error' => 'Not allowed'];
            header('Content-Type:application/json');
            echo json_encode($result);
            return;
        }


        $offset = abs(trim($this->input->get('offset')));
        $userEmail = $this->session->userdata('email');
        $userData = $this->Account_Model->getUserData($userEmail);
        $userId = $userData[0]['id'];

        $urlHistory = $this->History_Model->getUrlHistory($userId, 5, $offset);
        header('Content-Type:application/json');
        echo json_encode($urlHistory);

    }

}