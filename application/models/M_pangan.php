<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pangan extends CI_Model
{
  public function tampil_pangan()
  {
    return $this->db->get('pangan')->result();  //Result : Fungsi untuk mengambil semua data hasil query
  } //Sama seperti select FROM pangan

  public function detail_pangan($id_pangan)
  {
    $this->db->where('id_pangan', $id_pangan);
    return $this->db->get('pangan')->row(); //row : Fungsi untuk mengambil SATU data hasil query
  }
  
  public function tambah($data)
  {
    return $this->db->insert('pangan',$data);
  }

  public function edit($id_pangan)
  {
    $this->db->where('id_pangan', $id_pangan);
    return $this->db->get('pangan')->row();
  }

  public function proses_edit($where, $data)
  {
    $this->db->where($where);
		return $this->db->update('pangan',$data);
  }

  public function hapus($id)
  {
    $this->db->where('id_pangan', $id);
    return $this->db->delete('pangan');
  }

  public function jumlah_pangan()
  {
    return $this->db->count_all('pangan');
  }
}
