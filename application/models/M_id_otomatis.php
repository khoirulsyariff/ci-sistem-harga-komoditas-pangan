<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_id_otomatis extends CI_Model {
	public function id_pangan() {
		$this->db->select('RIGHT(pangan.id_pangan,3) as kode', FALSE);
		// pangan adalah adalah nama tabel nya . id_pangan adalah adalah nama kolomnya
		$this->db->order_by('id_pangan', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('pangan'); //cek dulu apakah ada sudah ada kode di tabel.
		if ($query->num_rows() != 0) {
			//jika kode ternyata sudah ada.
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada
			$kode = 1;
		}
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 3 menunjukkan jumlah digit angka 0
		$kodejadi = "BMP" . $kodemax; // hasilnya BMP001 dst.
		return $kodejadi;
	}

	public function id_pasar() {
		$this->db->select('RIGHT(pasar.id_pasar,2) as kode', FALSE);
		$this->db->order_by('id_pasar', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('pasar'); //cek dulu apakah ada sudah ada kode di tabel.
		if ($query->num_rows() != 0) {
			//jika kode ternyata sudah ada.
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada
			$kode = 1;
		}
		$kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT); // angka 3 menunjukkan jumlah digit angka 0
		$kodejadi = "PS" . $kodemax; // hasilnya PS001 dst.
		return $kodejadi;
	}

	public function id_monitoring_pangan($id_pasar) {
		$jumlah_pangan = $this->db->get('pangan')->num_rows();
		$this->db->select('RIGHT(monitoring_pangan.id_monitoring_pangan,3) as kode', FALSE);
		$this->db->order_by('id_monitoring_pangan', 'DESC');
		$this->db->limit(1);
		$this->db->where('LEFT(monitoring_pangan.id_monitoring_pangan,11)', 'M' . $id_pasar . date('d') . date('m') . date('y'));
		$query = $this->db->get('monitoring_pangan');
		if ($query->num_rows() != 0) {
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			$kode = 1;
		}
		if ($kode > $jumlah_pangan) {
			return false;
		} else {
			$kodemax = "BMP" . str_pad($kode, 3, "0", STR_PAD_LEFT);
			$kodejadi = "M" . $id_pasar . date('d') . date('m') . date('y') . $kodemax;
			return $kodejadi;
		}
	}
}
