<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Account_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $email  Email supplied by the user
     * @param $password Password Supplied by the user
     * @return bool
     */
    public function doSignup($email, $password)
    {
        date_default_timezone_set('UTC');
        $date = new DateTime();

        $d = $date->format('Y-m-d\TH:i:s.u');
        $this->db->insert($_SERVER['CI_URL_APP_USERS'], [
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'created_at' => $d,
            'updated_at' => $d
        ]);

        return true;
    }


    public function doLogin($email, $password)
    {

        $query = $this->db->get_where($_SERVER['CI_URL_APP_USERS'], [
            'email' => $email
        ]);

        if (count($query->result_array()) > 0) {


            $hash = $query->result_array()[0]['password'];

            if (password_verify($password, $hash)) {


                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }

    public function checkEmail($email)
    {
        $query = $this->db->get_where($_SERVER['CI_URL_APP_USERS'], [
            'email' => $email
        ]);

        if (count($query->result_array()) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getUserData($email)
    {

        $query = $this->db->get_where($_SERVER['CI_URL_APP_USERS'], [
            'email' => $email
        ]);

        if (count($query->result_array()) > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }
}