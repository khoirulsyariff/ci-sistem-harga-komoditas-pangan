<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login') == FALSE) {
			redirect(base_url("login"));
		}
		$this->load->model([ 'm_petugas', 'm_pasar','m_id_otomatis']);
	}

	public function tampil()
	{
		$data['title'] = "Data Pasar - Harga Komoditas Pasar";
		$data['pasar'] = $this->m_pasar->tampil();

		$this->load->view('header', $data);
		$this->load->view('pasar/tampil_pasar');
		$this->load->view('footer');
	}

	public function tambah()
	{
		$data['title'] = "Tambah Pasar - Harga Komoditas Pasar";
		$data['id_pasar'] = $this->m_id_otomatis->id_pasar();
		$data['petugas'] = $this->m_petugas->tampil();

		$this->load->view('header', $data);
		$this->load->view('pasar/tambah_pasar');
		$this->load->view('footer');
	}

	public function proses_tambah()
	{
		$id_pasar = $this->input->post('id_pasar');
		$nip = $this->input->post('nip');
		$nama_pasar = $this->input->post('nama_pasar');

		$data = array(
			'id_pasar' => $id_pasar,
			'nip' => $nip,
			'nama_pasar' => ucwords($nama_pasar)
		);
		$this->m_pasar->tambah($data);

		$this->session->set_flashdata('sukses', 'Data dengan ID ' . $id_pasar . ' berhasil ditambahkan.');
		redirect(base_url('pasar/tambah'));
	}

	public function edit($id_pasar)
	{
		$data['title'] = "Edit Pasar - Harga Komoditas Pasar";
		$data['pasar'] = $this->m_pasar->edit($id_pasar);
		$data['petugas'] = $this->m_petugas->tampil();

		$this->load->view('header', $data);
		$this->load->view('pasar/edit_pasar');
		$this->load->view('footer');
	}

	public function proses_edit()
	{
		$id_pasar = $this->input->post('id_pasar');
		$nip = $this->input->post('nip');
		$nama_pasar = $this->input->post('nama_pasar');

		$data = array(
			'nip' => $nip,
			'nama_pasar' => ucwords($nama_pasar)
		);
		$where = array(
			'id_pasar' => $id_pasar
		);
		$this->m_pasar->proses_edit($where, $data);

		$this->session->set_flashdata('sukses', 'Data dengan ID ' . $id_pasar . ' berhasil diedit.');
		redirect(base_url('pasar/edit/' . $id_pasar));
	}

	public function hapus($id_pasar)
	{
		$this->m_pasar->hapus($id_pasar);
		$this->session->set_flashdata('sukses', 'Data dengan ID ' . $id_pasar . ' berhasil dihapus.');
		redirect(base_url('pasar/tampil'));
	}
}