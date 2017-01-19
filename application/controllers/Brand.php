<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Brand  extends CI_Controller
{

    public function index()
    {
        $this->load->view('brand_index');
    }
}