<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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


    public function getUrlHistory($userId, $limit = 5, $offset = 0)
    {
        $query = $this->db
            ->order_by('updated_at', 'DESC')
            ->get_where($_SERVER['CI_URL_APP_URLS'], [
                'user_id' => $userId
            ], $limit, $offset);
        if (count($query->result_array()) > 0) {

            $result = $query->result_array();

            foreach ($result as $key => $item) {
                unset($result[$key]['user_id'], $result[$key]['url_id']);
            }
            return $result;
        } else {
            return FALSE;
        }
    }


}