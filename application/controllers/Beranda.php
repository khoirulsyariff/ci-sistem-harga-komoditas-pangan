<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login') == FALSE) {
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$data['title'] = "Harga Komoditas Pangan";

		$this->load->view('header', $data);
		$this->load->view('beranda');
		$this->load->view('footer');
	}
}