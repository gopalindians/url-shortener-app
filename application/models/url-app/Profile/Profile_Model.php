<?php

/**
 * Created by PhpStorm.
 * User:
 * Date: 20-01-2017
 * Time: 15:37
 */
class Profile_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getUrlCount($userId)
    {
        $query = $this->db
            ->order_by('updated_at', 'DESC')
            ->get_where($_SERVER['CI_URL_APP_URLS'], [
                'user_id' => $userId
            ]);
        return count($query->result_array());
    }


    /**
     * @param $userId
     * @param $profileImage
     * @return bool
     */
    public function updateImage($userId, $profileImage)
    {
        date_default_timezone_set('UTC');
        $date = new DateTime();

        $data = array(
            'profile_image' => $profileImage,
            'updated_at' => $date->format('Y-m-d H:i:s')
        );

        $this->db->where('id', $userId);
        $this->db->update('users', $data);

        return TRUE;
    }

}