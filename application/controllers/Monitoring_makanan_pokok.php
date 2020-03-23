<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring_makanan_pokok extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('login') == FALSE) {
			redirect(base_url("login"));
		}
		$this->load->model([ 'm_pangan', 'm_pasar','m_monitoring_pangan','m_id_otomatis']);
		$this->load->helper('nama_bulan_helper');

		//mengecek pasar yang dimonitoring oleh petugas
		$petugas = $this->session->userdata('nip');
		$this->pasar = $this->db->query("SELECT id_pasar FROM pasar WHERE nip = '$petugas'")->row();
	}

	public function tampil() {
		$data['title'] = "Monitoring Harga Kommoditas Pangan - Harga Komoditas Pangan";
		$data['pasar'] = $this->m_pasar->tampil();

		if ($this->session->userdata('level') == "admin") {
			$this->load->view('header', $data);
			$this->load->view('monitoring/bahan_makanan_pokok');
			$this->load->view('footer');
		} else {
			if ($this->pasar != "") {
				redirect(base_url('monitoring-makanan-pokok/detail/' . $this->pasar->id_pasar));
			} else {
				$data['status'] = "not_allow";
				$this->load->view('header', $data);
				$this->load->view('monitoring/bahan_makanan_pokok');
				$this->load->view('footer');
			}
		}
	}

	public function detail($id_pasar, $tanggal = null, $bulan = null, $tahun = null) {
		if ($this->session->userdata('level') != "admin") {
			if ($this->pasar == "" || $this->pasar->id_pasar != $id_pasar) {
				//mengecek apakah memiliki hak akses
				redirect(base_url('monitoring-makanan-pokok/tampil'));
			}
		}

		$data['title'] = "Monitoring Harga Kommoditas Pangan - Harga Komoditas Pangan";
		$data['pasar'] = $this->m_pasar->detail_pasar($id_pasar);

		if ($tanggal != null && $bulan != null && $tahun != null) {
			$data['monitoring'] = $this->m_monitoring_pangan->tampil_detail_monitoring($id_pasar, $tanggal, $bulan, $tahun);

			$this->load->view('header', $data);
			$this->load->view('monitoring/bahan_makanan_pokok_detail_monitoring');
			$this->load->view('footer');
		} else {
			$data['monitoring'] = $this->m_monitoring_pangan->tampil_detail($id_pasar);
			$data['jumlah_pangan'] = $this->m_pangan->jumlah_pangan();

			$this->load->view('header', $data);
			$this->load->view('monitoring/bahan_makanan_pokok_detail');
			$this->load->view('footer');
		}
	}

	public function tambah($id_pasar) {
		if ($this->session->userdata('level') != "admin") {
			if ($this->pasar == "" || $this->pasar->id_pasar != $id_pasar) {
				//mengecek apakah memiliki hak akses
				redirect(base_url('monitoring-makanan-pokok/tampil'));
			}
		}

		$data['title'] = "Monitoring Harga Kommoditas Pangan - Harga Komoditas Pangan";

		$data['pasar'] = $this->m_pasar->detail_pasar($id_pasar);
		$id_monitoring = $this->m_id_otomatis->id_monitoring_pangan($id_pasar);
		// variable $id_pangan merujuk ke file m_id_otomatis.php pada function id otomatis
		$data['id_monitoring'] = $id_monitoring;

		$id_pangan = substr($id_monitoring, -6);
		$data['pangan'] = $this->m_pangan->detail_pangan($id_pangan);

		$this->load->view('header', $data);
		$this->load->view('monitoring/bahan_makanan_pokok_tambah');
		$this->load->view('footer');
	}

	public function proses_tambah() {
		$id_monitoring = $this->input->post('id_monitoring');
		$id_pasar = $this->input->post('id_pasar');
		$id_pangan = $this->input->post('id_pangan');
		$nip = $this->input->post('nip');
		$tanggal = $this->input->post('tanggal');
		$harga_sampel_1 = $this->input->post('harga_sampel1');
		$harga_sampel_2 = $this->input->post('harga_sampel2');
		$harga_sampel_3 = $this->input->post('harga_sampel3');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'id_monitoring_pangan' => $id_monitoring,
			'id_pasar' => $id_pasar,
			'id_pangan' => $id_pangan,
			'nip' => $nip,
			'tanggal' => date('Y-m-d'),
			'harga_sampel1' => $harga_sampel_1,
			'harga_sampel2' => $harga_sampel_2,
			'harga_sampel3' => $harga_sampel_3,
			'keterangan' => $keterangan,
		);
		$this->m_monitoring_pangan->tambah($data);

		$this->session->set_flashdata('sukses', 'Data dengan ID ' . $id_monitoring . ' berhasil disimpan.');
		redirect(base_url('monitoring_makanan_pokok/tambah/' . $id_pasar . '/'));
	}

	public function edit($id_pasar, $id_monitoring) {
		if ($this->session->userdata('level') != "admin") {
			if ($this->pasar == "" || $this->pasar->id_pasar != $id_pasar) {
				//mengecek apakah memiliki hak akses
				redirect(base_url('monitoring-makanan-pokok/tampil'));
			}
		}
		$data['title'] = "Monitoring Harga Kommoditas Pangan - Harga Komoditas Pangan";
		$data['monitoring'] = $this->m_monitoring_pangan->edit($id_monitoring);
		$data['pangan'] = $this->m_pangan->detail_pangan($data['monitoring']->id_pangan);
		$data['pasar'] = $this->m_pasar->detail_pasar($id_pasar);

		$this->load->view('header', $data);
		$this->load->view('monitoring/bahan_makanan_pokok_edit');
		$this->load->view('footer');
	}

	public function proses_edit($tanggal, $bulan, $tahun) {
		$id_monitoring = $this->input->post('id_monitoring');
		$id_pasar = $this->input->post('id_pasar');
		$id_pangan = $this->input->post('id_pangan');
		$nip = $this->input->post('nip');
		$tanggal = $this->input->post('tanggal');
		$harga_sampel_1 = $this->input->post('harga_sampel1');
		$harga_sampel_2 = $this->input->post('harga_sampel2');
		$harga_sampel_3 = $this->input->post('harga_sampel3');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'harga_sampel1' => $harga_sampel_1,
			'harga_sampel2' => $harga_sampel_2,
			'harga_sampel3' => $harga_sampel_3,
			'keterangan' => $keterangan,
		);
		$where = array(
			'id_monitoring_pangan' => $id_monitoring,
		);
		$this->m_monitoring_pangan->proses_edit($where, $data);

		$this->session->set_flashdata('sukses', 'Data dengan ID ' . $id_monitoring . ' berhasil diedit.');
		redirect(base_url('monitoring-makanan-pokok/detail/' . $id_pasar . '/' . $tanggal . '/' . $bulan . '/' . $tahun));
	}
}