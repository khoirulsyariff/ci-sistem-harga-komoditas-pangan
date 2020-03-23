<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pangan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct(); //Method ini yang akan dieksekusi pertama kali saat Controller diakses.
		if ($this->session->userdata('login') == FALSE) {
			redirect(base_url("login"));
		}
		$this->load->model([ 'm_pangan','m_id_otomatis']);
		//mengambil data dari model dengan memanggil method
	}

	public function tampil()
	{
		$data['title'] = "Data Bahan Pangan - Harga Komoditas Pangan";
		$data['pangan'] = $this->m_pangan->tampil_pangan();

		$this->load->view('header', $data);
		$this->load->view('pangan/tampil_pangan');
		$this->load->view('footer');
	}

	public function tambah()
	{
		$data['title'] = "Tambah Bahan Pangan - Harga Komoditas Pangan";
		$data['id_pangan'] = $this->m_id_otomatis->id_pangan();
		// variable $id_pangan merujuk ke file m_id_otomatis.php pada function id otomatis

		$this->load->view('header', $data);
		$this->load->view('pangan/tambah_pangan');
		$this->load->view('footer');
	}

	public function proses_tambah()
	{
		$id_pangan = $this->input->post('id_pangan');
		$nama_pangan = $this->input->post('nama_pangan');
		$satuan = $this->input->post('satuan');

		$data = array(
			'id_pangan' => $id_pangan,
			'nama_pangan' => ucwords($nama_pangan),
			'satuan' => ucwords($satuan)
		);
		$this->m_pangan->tambah($data);

		$this->session->set_flashdata('sukses', 'Data dengan ID ' . $id_pangan . ' berhasil ditambahkan.');
		redirect(base_url('pangan/tambah'));
	}

	public function edit($id_pangan)
	{
		$data['title'] = "Edit Bahan Pangan - Harga Komoditas Pangan";
		$data['pangan'] = $this->m_pangan->edit($id_pangan);

		$this->load->view('header', $data);
		$this->load->view('pangan/edit_pangan');
		$this->load->view('footer');
	}

	public function proses_edit()
	{
		$id_pangan = $this->input->post('id_pangan');
		$nama_pangan = $this->input->post('nama_pangan');
		$satuan = $this->input->post('satuan');

		$data = array(
			'nama_pangan' => ucwords($nama_pangan),
			'satuan' => ucwords($satuan)
		);
		$where = array(
			'id_pangan' => $id_pangan
		);
		$this->m_pangan->proses_edit($where, $data);

		$this->session->set_flashdata('sukses', 'Data dengan ID ' . $id_pangan . ' berhasil diedit.');
		redirect(base_url('pangan/tampil/' . $id_pangan));
	}

	public function hapus($id)
	{
		$this->m_pangan->hapus($id);
		$this->session->set_flashdata('sukses', 'Data dengan ID ' . $id . ' berhasil dihapus.');
		redirect(base_url('pangan/tampil'));
	}
}