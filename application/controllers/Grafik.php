<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('login') == FALSE) {
			redirect(base_url("login"));
		}
		$this->load->library('pdf');
		$this->load->model(['m_laporan_makanan_pokok', 'm_pangan', 'm_pasar']);
		$this->load->helper('nama_bulan');
	}

	public function index() {
		$data['title'] = "Grafik - Harga Komoditas Pangan";
		$data['tanggal'] = date('Y-m-d');
		$data['jumlah_pasar'] = $this->m_pasar->jumlah_pasar();
		$this->load->view('header', $data);
		$this->load->view('grafik/grafik_makanan_pokok_all');
		$this->load->view('footer');
	}
	public function grafik_makanan_pokok()
  {
    $data['title'] = "Grafik - Harga Komoditas Pangan";
    $data['tanggal'] = $_GET['tanggal'];
    $data['pasar'] = $_GET['pasar'];
    $this->load->view('header', $data);
    $this->load->view('grafik/grafik_makanan_pokok');
    $this->load->view('footer');
  }

  public function grafik_makanan_pokok_all()
  {
    $data['title'] = "Grafik - Harga Komoditas Pangan";
    $data['tanggal'] = $_GET['tanggal'];
    $data['pasar'] = $_GET['pasar'];
    $data['jumlah_pasar'] = $this->m_pasar->jumlah_pasar();
    $this->load->view('header', $data);
    $this->load->view('grafik/grafik_makanan_pokok_all');
    $this->load->view('footer');
  }
}
