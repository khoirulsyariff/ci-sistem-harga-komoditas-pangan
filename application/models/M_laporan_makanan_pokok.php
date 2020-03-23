<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan_makanan_pokok extends CI_Model
{
  public function harga_komoditas($tanggal, $pasar, $pangan)
  {
    return $this->db->query("SELECT * FROM `monitoring_pangan` WHERE `tanggal` = '$tanggal' AND id_pasar='$pasar' AND id_pangan='$pangan' GROUP BY monitoring_pangan.id_pangan ORDER BY monitoring_pangan.id_monitoring_pangan DESC");
  }
  
  public function harga_komoditas_all($tanggal, $pangan)
  {
    return $this->db->query("SELECT SUM(harga_sampel1) as h_sampel1, SUM(harga_sampel2) as h_sampel2, SUM(harga_sampel3) as h_sampel3 FROM `monitoring_pangan` WHERE `tanggal` = '$tanggal' AND id_pangan='$pangan' GROUP BY monitoring_pangan.id_pangan ORDER BY monitoring_pangan.id_monitoring_pangan DESC");
  }
}
