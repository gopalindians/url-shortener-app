<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Account Handles User account related ops
 * login
 * Signup etc
 */
class Account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function login()
    {
        if ($this->session->userdata('email') !== NULL) {
            redirect('url-app/home/index');
        }
        $this->load->view('url-app/include/header.php');
        $this->load->view('url-app/account/login.php');
        $this->load->view('url-app/include/footer.php');
    }

    public function handleLogin()
    {
        if ($this->session->userdata('email') !== NULL) {
            redirect('url-app/home/index');
        }
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('g-recaptcha-response', 'reCAPTCHA', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('url-app/include/header.php');
            $this->load->view('url-app/account/login.php');
            $this->load->view('url-app/include/footer.php');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            if ($this->Account_Model->doLogin($email, $password)) {
                $newdata = array(
                    'email' => $email,
                );

                $this->session->set_userdata($newdata);
                redirect('/url-app/home/index');

            } else {

                $this->session->set_flashdata('login_error', 'Email or password is wrong');

                $this->load->view('url-app/include/header.php');
                $this->load->view('url-app/account/login.php');
                $this->load->view('url-app/include/footer.php');
            }
        }
    }

    public function signup()
    {
        if ($this->session->userdata('email') !== NULL) {
            redirect('url-app/home/index');
        }
        $this->load->view('url-app/include/header.php');
        $this->load->view('url-app/account/signup.php');
        $this->load->view('url-app/include/footer.php');
    }

    public function handleSignup()
    {
        if ($this->session->userdata('email') !== NULL) {
            redirect('url-app/home/index');
        }
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[users.email]');
        $this->form_validation->set_rules('email', 'Email', 'callback_email_check');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('passwordConfirm', 'Password Confirmation', 'required|trim');
        $this->form_validation->set_rules('g-recaptcha-response', 'reCAPTCHA', 'required|trim');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('url-app/include/header.php');
            $this->load->view('url-app/account/signup.php');
            $this->load->view('url-app/include/footer.php');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->Account_Model->doSignup($email, $password);


            $newdata = array(
                'email' => $email,
            );

            $this->session->set_userdata($newdata);


            $this->session->set_flashdata('signup_success', "Welcome $email, your signup is complete!");
            redirect('url-app/home/index');

        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/url-app/account/login');
    }


    public function email_check($email)
    {
        if ($this->Account_Model->checkEmail($email)) {
            $this->form_validation->set_message('email_check', "The {$email} is already occupied!");
            return FALSE;
        } else {
            return TRUE;
        }

    }


}