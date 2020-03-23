<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Harga Komoditas Pangan";
        $this->load->view('Homepage');
    }
}