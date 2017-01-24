<?php

/**
 * Created by PhpStorm.
 * User:
 * Date: 20-01-2017
 * Time: 15:32
 */
class Profile extends CI_Controller
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
        $profileImage = $userData[0]['profile_image'];

        $urlCount = $this->Profile_Model->getUrlCount($userId);
        $this->load->view('url-app/include/header.php');
        $this->load->view('url-app/profile/index.php', [
            'urlCount' => $urlCount,
            'profileImage' => $profileImage
        ]);
        $this->load->view('url-app/include/footer.php');
    }

    public function editImage()
    {

        $this->load->view('url-app/include/header.php');
        $this->load->view('url-app/profile/editImage.php');
        $this->load->view('url-app/include/footer.php');


    }

    public function do_upload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|webp';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());

            $this->session->set_flashdata('upload_error', $error['error']);
            redirect('url-app/profile/');
        } else {

            $data = array('upload_data' => $this->upload->data());

            $userEmail = $this->session->userdata('email');
            $userData = $this->Account_Model->getUserData($userEmail);
            $userId = $userData[0]['id'];

            $this->Profile_Model->updateImage($userId, $data['upload_data']['file_name']);
            $this->session->set_flashdata('upload_success', 'Profile picture uploaded successfully!');
            redirect('url-app/profile/');

        }

    }

}