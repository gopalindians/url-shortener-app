<?php

/**
 * Created by PhpStorm.
 * User:
 * Date: 19-01-2017
 * Time: 17:03
 */
class History_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }


    public function getUrlHistory($userId)
    {
        $query = $this->db->get_where('urls', [
            'user_id' => $userId
        ]);
        if (count($query->result_array()) > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }


    }


}