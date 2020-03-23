<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_petugas extends CI_Model
{
  public function tampil()
  {
    return $this->db->get('user')->result();
  }

  public function cari($nip)
  {
    $this->db->where('nip', $nip);
    $query = $this->db->get('user');
    if($query->num_rows() > 0) {
      return false;
    } else {
      return true;
    }
  }

  public function tambah($data)
  {
    return $this->db->insert('user',$data);
  }

  public function edit($nip)
  {
    $this->db->where('nip', $nip);
    return $this->db->get('user')->row();
  }

  public function proses_edit($where, $data)
  {
    $this->db->where($where);
		return $this->db->update('user',$data);
  }

  public function hapus($nip)
  {
    $this->db->where('nip', $nip);
    return $this->db->delete('user');
  }
}
