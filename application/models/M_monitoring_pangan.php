<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_monitoring_pangan extends CI_Model
{
  public function tampil_detail($id_pasar)
  {
    return $this->db->query("SELECT tanggal, nama_petugas, nama_pasar, COUNT(id_pangan) AS jumlah FROM monitoring_pangan JOIN user ON monitoring_pangan.nip=user.nip JOIN pasar ON monitoring_pangan.id_pasar=pasar.id_pasar WHERE monitoring_pangan.id_pasar = '$id_pasar' GROUP BY tanggal ORDER BY tanggal DESC")->result();
  }

  public function tampil_detail_monitoring($id_pasar, $tanggal, $bulan, $tahun)
  {
    $this->db->select('m.id_monitoring_pangan, p.nama_pangan, p.satuan, m.harga_sampel1, m.harga_sampel2, m.harga_sampel3, m.keterangan');
    $this->db->from('monitoring_pangan as m');
    $this->db->join('pangan as p', 'm.id_pangan = p.id_pangan');
    $this->db->where('id_pasar', $id_pasar);
    $this->db->where('MID(tanggal,9,2)', $tanggal);
    $this->db->where('MID(tanggal,6,2)', $bulan);
    $this->db->where('LEFT(tanggal,4)', $tahun); // 2020-01-03
    return $this->db->get()->result();
  }

  public function tambah($data = array())
  {
    return $this->db->insert('monitoring_pangan', $data);
  }

  public function edit($id_monitoring)
  {
    $this->db->join('user', 'monitoring_pangan.nip = user.nip');
    $this->db->where('id_monitoring_pangan', $id_monitoring);
    return $this->db->get('monitoring_pangan')->row();
  }

  public function proses_edit($where, $data)
  {
    $this->db->where($where);
    return $this->db->update('monitoring_pangan', $data);
  }
}