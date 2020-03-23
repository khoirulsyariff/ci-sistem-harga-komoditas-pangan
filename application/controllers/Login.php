<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('login') == TRUE) {
			redirect(base_url());
		}
		$this->load->library('form_validation');
		$this->load->model('m_login');
	}

	public function index() {
		$this->load->view('login');
	}

	public function auth() {
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() != false) {
			$data_login = array(
				'nip' => htmlspecialchars($this->input->post('nip', TRUE), ENT_QUOTES),
				'password' => md5(htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES)),
			);
			$user = $this->m_login->login($this->security->xss_clean($data_login));
			if ($user->num_rows() > 0) {
				$data = $user->row_array();
				$this->session->set_userdata('login', TRUE);
				$this->session->set_userdata('nip', $data['nip']);
				$this->session->set_userdata('nama_petugas', $data['nama_petugas']);
				$this->session->set_userdata('level', $data['level']);
				redirect(base_url());
			} else {
				$this->session->set_flashdata('gagal', 'NIP atau password salah!');
				redirect(base_url('login'));
			}
		}
	}
}
