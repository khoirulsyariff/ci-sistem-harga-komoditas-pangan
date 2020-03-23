<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pasar extends CI_Model
{
  public function tampil()
  {
    $this->db->join('user','pasar.nip = user.nip');
    return $this->db->order_by('id_pasar','ASC')->get('pasar')->result();
  }

  public function tambah($data)
  {
    return $this->db->insert('pasar',$data);
  }

  public function edit($id_pasar)
  {
    $this->db->where('id_pasar', $id_pasar);
    return $this->db->get('pasar')->row();
  }

  public function proses_edit($where, $data)
  {
    $this->db->where($where);
		return $this->db->update('pasar',$data);
  }

  public function hapus($id_pasar)
  {
    $this->db->where('id_pasar', $id_pasar);
    return $this->db->delete('pasar');
  }

  public function detail_pasar($id_pasar)
  {
    $this->db->where('id_pasar', $id_pasar);
    return $this->db->get('pasar')->row();
  }

  public function jumlah_pasar()
  {
   return $this->db->order_by('id_pasar','ASC')->get('pasar')->num_rows();
  }
}
