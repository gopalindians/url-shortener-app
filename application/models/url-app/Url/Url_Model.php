<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Url_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function checkIfUrlAlreadyExits($url)
    {

        $query = $this->db->get_where($_SERVER['CI_URL_APP_URLS'], [
            'original_url' => $url
        ]);

        if (count($query->result_array()) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function saveUrl($url, $userId)
    {
        date_default_timezone_set('UTC');
        $date = new DateTime();


        $randomString = random_string('alnum');

        $d = $date->format('Y-m-d\TH:i:s.u');
        $this->db->insert($_SERVER['CI_URL_APP_URLS'], [
            'original_url' => $url,
            'short_url' => $randomString,
            'user_id' => $userId,
            'created_at' => $d,
            'updated_at' => $d
        ]);

        $query = $this->db->get_where($_SERVER['CI_URL_APP_URLS'], [
            'original_url' => $url,
            'short_url' => $randomString,
            'user_id' => $userId,
        ]);
        return $query->result_array();
    }


    public function checkIfShortUrlExists($shortUrl)
    {

        $query = $this->db->get_where($_SERVER['CI_URL_APP_URLS'], [
            'short_url' => $shortUrl
        ]);

        if (count($query->result_array()) > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }


    }
}