<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Url extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $this->load->view('url-app/include/header.php');
        $this->load->view('url-app/url/index.php');
        $this->load->view('url-app/include/footer.php');
    }

    public function handleUrl()
    {

        $this->form_validation->set_rules('url', 'Url', 'required|trim|valid_url|max_length[1500]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('url-app/include/header.php');
            $this->load->view('url-app/url/index.php');
            $this->load->view('url-app/include/footer.php');
        } else {
            $url = $this->input->post('url');
            if (count($this->Url_Model->checkIfUrlAlreadyExits($url)) === TRUE) {
                //return the existing short url
            } else {
                //save the url in db
                $userData = $this->Account_Model->getUserData($this->session->userdata('email'));

                $userId = $userData[0]['id'];

                $urlData = $this->Url_Model->saveUrl($url, $userId);

                $this->session->set_flashdata('url_success', $urlData[0]['short_url']);
                redirect('url-app/url/index');
            }

        }
    }


    /**
     * used to redirect the users to
     * form short url to its original url
     */
    public function r()
    {
        $shortUrl = $this->uri->segment(4, 0);
        if ($this->Url_Model->checkIfShortUrlExists($shortUrl) == FALSE) {
            $this->session->set_flashdata('url_error', 'Wrong url supplied!');
            redirect('url-app/url/index');
        } else {
            $originalUrl = $this->Url_Model->checkIfShortUrlExists($shortUrl)[0]['original_url'];
            redirect($originalUrl);
        }


    }
}