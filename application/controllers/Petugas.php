<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login') == FALSE) {
			redirect(base_url("login"));
		}
		$this->load->model('m_petugas');;
	}

	public function tampil()
	{
		$data['title'] = "Data Petugas - Harga Komoditas Pasar";
		$data['petugas'] = $this->m_petugas->tampil();

		$this->load->view('header', $data);
		$this->load->view('petugas/tampil_petugas');
		$this->load->view('footer');
	}

	public function tambah()
	{
		$data['title'] = "Tambah Petugas - Harga Komoditas Pasar";

		$this->load->view('header', $data);
		$this->load->view('petugas/tambah_petugas');
		$this->load->view('footer');
	}

	public function proses_tambah()
	{
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$no_telpon = $this->input->post('no_telpon');
		$level = $this->input->post('level');
		$password = $this->input->post('password');

		$data = array(
			'nip' => $nip,
			'nama_petugas' => ucwords($nama),
			'alamat' => $alamat,
			'no_telpon' => $no_telpon,
			'level' => $level,
			'password' => md5($password)
		);
		$this->m_petugas->tambah($data);

		$this->session->set_flashdata('sukses', 'Data dengan NIP ' . $nip . ' berhasil ditambahkan.');
		redirect(base_url('petugas/tampil/'));
	}

	public function edit($nip)
	{
		$data['title'] = "Edit Petugas - Harga Komoditas Pasar";
		$data['petugas'] = $this->m_petugas->edit($nip);

		$this->load->view('header', $data);
		$this->load->view('petugas/edit_petugas');
		$this->load->view('footer');
	}

	public function proses_edit()
	{
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$no_telpon = $this->input->post('no_telpon');

		$data = array(
			'nama_petugas' => ucwords($nama),
			'alamat' => $alamat,
			'no_telpon' => $no_telpon
		);
		$where = array(
			'nip' => $nip
		);
		$this->m_petugas->proses_edit($where, $data);

		$this->session->set_flashdata('sukses', 'Data dengan NIP ' . $nip . ' berhasil diedit.');
		redirect(base_url('petugas/tampil/' . $nip));
	}

	public function hapus($nip)
	{
		$this->m_petugas->hapus($nip);
		$this->session->set_flashdata('sukses', 'Data dengan NIP ' . $nip . ' berhasil dihapus.');
		redirect(base_url('petugas/tampil'));
	}
}