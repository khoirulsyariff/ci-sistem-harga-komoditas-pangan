<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('login') == FALSE) {
      redirect(base_url("login"));
    }
    $this->load->library('pdf');
    $this->load->model(['m_laporan_makanan_pokok', 'm_pangan', 'm_pasar']);
    $this->load->helper('nama_bulan');
  }

  public function tampil_makanan_pokok()
  {
    $data['title'] = "Laporan - Harga Komoditas Pangan";

    $tanggal = $this->input->get('tanggal');
    $pasar = $this->input->get('pasar');
    $data['get_pasar'] = $this->input->get('pasar');

    if ($tanggal != "") {
      if ($data['get_pasar'] == "all") {
        $data['tanggal'] = $tanggal;
        $data['pasar'] = $this->m_pasar->tampil();
        $data['jumlah_pasar'] = $this->m_pasar->jumlah_pasar();
        $data['pangan'] = $this->m_pangan->tampil_pangan();
        $this->load->view('header', $data);
        $this->load->view('laporan/laporan_makanan_pokok_all');
        $this->load->view('footer');
      } else {
        $data['tanggal'] = $tanggal;
        $data['pasar'] = $this->m_pasar->tampil();
        $data['nama_pasar'] = $this->m_pasar->detail_pasar($this->input->get('pasar'));
        $data['pangan'] = $this->m_pangan->tampil_pangan();
        $this->load->view('header', $data);
        $this->load->view('laporan/laporan_makanan_pokok');
        $this->load->view('footer');
        //if($pasar == "all"){ $data['laporan'] = $this->m_laporan_makanan_pokok->laporan_all($tanggal); }else{ $data['laporan'] = $this->m_laporan_makanan_pokok->laporan($tanggal, $pasar); }
      }
    } else {
      //$data['laporan'] = FALSE;
      $data['pangan'] = $this->m_pangan->tampil_pangan();
      $data['pasar'] = $this->m_pasar->tampil();
      $this->load->view('header', $data);
      $this->load->view('laporan/laporan_makanan_pokok');
      $this->load->view('footer');
    }
  }


  //1
  public function cetak_makanan_pokok()
  {
    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->AddPage();
    $pdf->Image('assets/images/logo-karawang.png', 20, 10, 15, 18);
    $pdf->SetFont('Times', 'B', 14);
    $pdf->Cell(37);
    $pdf->Cell(130, 7, 'PEMERINTAH KABUPATEN KARAWANG', 0, 1, 'C');
    $pdf->SetFont('Times', 'B', 18);
    $pdf->Cell(37);
    $pdf->Cell(130, 6, 'DINAS PANGAN', 0, 1, 'C');
    $pdf->SetFont('Times', '', 10);
    $pdf->Cell(37);
    $pdf->Cell(130, 6, 'Jalan By Pass Tanjung Pura , No 01 Karawang Barat,  Jawa Barat 41316', 0, 1, 'C');
    $pdf->SetLineWidth(0.6);
    $pdf->Line(15, 30, 200, 30);
    $pdf->SetLineWidth(0.2);
    $pdf->Line(15, 31, 200, 31);
    $pdf->SetFont('Times', 'BU', 11);
    $pdf->Text(50, 40, 'LAPORAN RATA-RATA HARGA PANGAN KABUPATEN KARAWANG');

    //2

    //4
    $pdf->SetFont('Times', 'B', 8);
    $pdf->Text(15, 50, "Tanggal");
    $pdf->Text(150, 50, "Pasar");
    $tanggal = $_GET['tanggal'];
    $get_pasar = $_GET['pasar'];
    $nama_pasar = $this->m_pasar->detail_pasar($get_pasar);
    $tanggal_new = date_create($tanggal);
    $pdf->SetFont('Times', '', 8);
    $pdf->Text(40, 50, ": " . date_format($tanggal_new, 'd') . " " . bulan(date_format($tanggal_new, 'm')) . " " . date_format($tanggal_new, 'Y'));
    $pdf->Text(160, 50, ": " . $nama_pasar->nama_pasar);
    $pdf->ln(25);

    //5
    $pdf->SetFont('Times', 'B', 8);
    $pdf->setFillColor(218, 218, 218);
    $pdf->Cell(5);
    $start_awal = $pdf->GetX();
    $get_xxx = $pdf->GetX();
    $get_yyy = $pdf->GetY();
    $width_cell = 40;
    $height_cell = 7;
    $pdf->MultiCell($width_cell - 33, $height_cell, 'No', 1, 'C', 1);
    $get_xxx += $width_cell - 33;
    $pdf->SetXY($get_xxx, $get_yyy);
    $pdf->MultiCell($width_cell + 5, $height_cell, 'Komoditas', 1, 'C', 1);
    $get_xxx += $width_cell + 5;
    $pdf->SetXY($get_xxx, $get_yyy);
    $pdf->MultiCell($width_cell - 20, $height_cell, 'Satuan', 1, 'C', 1);
    $get_xxx += $width_cell - 20;
    $pdf->SetXY($get_xxx, $get_yyy);
    $pdf->MultiCell($width_cell - 15, $height_cell, 'Harga', 1, 'C', 1);
    $get_xxx += $width_cell - 15;
    $pdf->SetXY($get_xxx, $get_yyy);
    $pdf->MultiCell($width_cell + 3, $height_cell, 'Selisih Harga Kemarin', 1, 'C', 1);
    $get_xxx += $width_cell + 3;
    $pdf->SetXY($get_xxx, $get_yyy);
    $pdf->MultiCell($width_cell - 15, $height_cell, 'Status Harga', 1, 'C', 1);
    $get_xxx += $width_cell - 15;
    $pdf->SetXY($get_xxx, $get_yyy);
    $pdf->MultiCell($width_cell - 20, $height_cell, 'Persentase', 1, 'C', 1);
    $get_xxx += $width_cell - 20;

    //6
    $pangan = $this->m_pangan->tampil_pangan();
    $no = 1;
    foreach ($pangan as $data_pangan) :

      $tanggal_kemarin = date('Y-m-d', strtotime('-1 days', strtotime($tanggal)));
      $harga = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal, $get_pasar, $data_pangan->id_pangan)->row();
      if (empty($harga)) {
        $harga_sampel1 = 0;
        $harga_sampel2 = 0;
        $harga_sampel3 = 0;
      } else {
        $harga_sampel1 = $harga->harga_sampel1;
        $harga_sampel2 = $harga->harga_sampel2;
        $harga_sampel3 = $harga->harga_sampel3;
      }
      $harga_komoditas = ($harga_sampel1 + $harga_sampel2 + $harga_sampel3) / 3;
      $harga_kemarin = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_kemarin, $get_pasar, $data_pangan->id_pangan)->row();
      if (empty($harga_kemarin)) {
        $harga_sampel1_kemarin = 0;
        $harga_sampel2_kemarin = 0;
        $harga_sampel3_kemarin = 0;
      } else {
        $harga_sampel1_kemarin = $harga_kemarin->harga_sampel1;
        $harga_sampel2_kemarin = $harga_kemarin->harga_sampel2;
        $harga_sampel3_kemarin = $harga_kemarin->harga_sampel3;
      }
      $harga_komoditas_kemarin = ($harga_sampel1_kemarin + $harga_sampel2_kemarin + $harga_sampel3_kemarin) / 3;
      $selisih = $harga_komoditas - $harga_komoditas_kemarin;
      if ($selisih > 0) {
        $status = "Naik";
      } elseif ($selisih == 0) {
        $status = "Tetap";
      } else {
        $status = "Turun";
      }
      if ($selisih == 0) {
        $persentase = 0;
      } elseif ($harga_komoditas_kemarin == 0) {
        $persentase = 100;
      } else {
        $persentase = ($selisih / $harga_komoditas_kemarin) * 100;
      }

      $pdf->SetFont('Times', '', 8);
      $pdf->Cell(5);
      $start_awal = $pdf->GetX();
      $get_xxx = $pdf->GetX();
      $get_yyy = $pdf->GetY();
      $width_cell = 40;
      $height_cell = 7;
      $pdf->MultiCell($width_cell - 33, $height_cell, $no, 1, 'C');
      $get_xxx += $width_cell - 33;
      $pdf->SetXY($get_xxx, $get_yyy);
      $pdf->MultiCell($width_cell + 5, $height_cell, $data_pangan->nama_pangan, 1, 'L');
      $get_xxx += $width_cell + 5;
      $pdf->SetXY($get_xxx, $get_yyy);
      $pdf->MultiCell($width_cell - 20, $height_cell, $data_pangan->satuan, 1, 'C');
      $get_xxx += $width_cell - 20;
      $pdf->SetXY($get_xxx, $get_yyy);
      $pdf->MultiCell($width_cell - 15, $height_cell, 'Rp ' . number_format($harga_komoditas, 2, ',', '.'), 1, 'R');
      $get_xxx += $width_cell - 15;
      $pdf->SetXY($get_xxx, $get_yyy);
      $pdf->MultiCell($width_cell + 3, $height_cell, 'Rp ' . number_format($selisih, 2, ',', '.'), 1, 'R');
      $get_xxx += $width_cell + 3;
      $pdf->SetXY($get_xxx, $get_yyy);
      $pdf->MultiCell($width_cell - 15, $height_cell, $status, 1, 'C');
      $get_xxx += $width_cell - 15;
      $pdf->SetXY($get_xxx, $get_yyy);
      $pdf->MultiCell($width_cell - 20, $height_cell, number_format($persentase, 2, ',', '.'), 1, 'R');
      $get_xxx += $width_cell - 20;
      $no++;
    endforeach;

    //12
    $pdf->SetFont('Times', '', 8);
    $kasubag = $this->db->query("SELECT * FROM user WHERE level = 'kasubag'")->row();
    $pdf->Text(15, $get_yyy + 25, "Kepala Subbagian,");
    $pdf->Text(15, $get_yyy + 45, $kasubag->nama_petugas);
    $pdf->Text(15, $get_yyy + 50, "NIP. " . $kasubag->nip);
    $pdf->text(150, $get_yyy + 20, "Karawang, " . date('d') . " " . bulan(date('m')) . " " . date('Y'));
    $pdf->Text(150, $get_yyy + 25, "Staff Harga Komoditas Pangan,");
    $pdf->Text(150, $get_yyy + 45, $this->session->userdata('nama_petugas'));
    $pdf->Text(150, $get_yyy + 50, "NIP. " . $this->session->userdata('nip'));
    $pdf->Output();

    //13
  }

  public function cetak_makanan_pokok_all()
  {
    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->AddPage();
    $pdf->Image('assets/images/logo-karawang.png', 20, 10, 15, 18);
    $pdf->SetFont('Times', 'B', 14);
    $pdf->Cell(37);
    $pdf->Cell(130, 7, 'PEMERINTAH KABUPATEN KARAWANG', 0, 1, 'C');
    $pdf->SetFont('Times', 'B', 18);
    $pdf->Cell(37);
    $pdf->Cell(130, 6, 'DINAS PANGAN', 0, 1, 'C');
    $pdf->SetFont('Times', '', 10);
    $pdf->Cell(37);
    $pdf->Cell(130, 6, 'Jalan By Pass Tanjung Pura, Karawang Barat, Kabupaten Karawang, Jawa Barat 41316', 0, 1, 'C');
    $pdf->SetLineWidth(0.6);
    $pdf->Line(15, 30, 200, 30);
    $pdf->SetLineWidth(0.2);
    $pdf->Line(15, 31, 200, 31);
    $pdf->SetFont('Times', 'BU', 11);
    $pdf->Text(45, 40, 'LAPORAN RATA-RATA HARGA PANGAN KABUPATEN KARAWANG');

    //2

    //4
    $pdf->SetFont('Times', 'B', 8);
    $pdf->Text(15, 50, "Tanggal");
    $pdf->Text(150, 50, "Pasar");
    $tanggal = $_GET['tanggal'];
    $get_pasar = $_GET['pasar'];
    $tanggal_new = date_create($tanggal);
    $pdf->SetFont('Times', '', 8);
    $pdf->Text(40, 50, ": " . date_format($tanggal_new, 'd') . " " . bulan(date_format($tanggal_new, 'm')) . " " . date_format($tanggal_new, 'Y'));
    $pdf->Text(160, 50, ": Semua Pasar");
    $pdf->ln(25);

    //5
    $pdf->SetFont('Times', 'B', 8);
    $pdf->setFillColor(218, 218, 218);
    $pdf->Cell(5);
    $start_awal = $pdf->GetX();
    $get_xxx = $pdf->GetX();
    $get_yyy = $pdf->GetY();
    $width_cell = 40;
    $height_cell = 7;
    $pdf->MultiCell($width_cell - 33, $height_cell, 'No', 1, 'C', 1);
    $get_xxx += $width_cell - 33;
    $pdf->SetXY($get_xxx, $get_yyy);
    $pdf->MultiCell($width_cell + 5, $height_cell, 'Komoditas', 1, 'C', 1);
    $get_xxx += $width_cell + 5;
    $pdf->SetXY($get_xxx, $get_yyy);
    $pdf->MultiCell($width_cell - 20, $height_cell, 'Satuan', 1, 'C', 1);
    $get_xxx += $width_cell - 20;
    $pdf->SetXY($get_xxx, $get_yyy);
    $pdf->MultiCell($width_cell - 15, $height_cell, 'Harga', 1, 'C', 1);
    $get_xxx += $width_cell - 15;
    $pdf->SetXY($get_xxx, $get_yyy);
    $pdf->MultiCell($width_cell + 3, $height_cell, 'Selisih Harga Kemarin', 1, 'C', 1);
    $get_xxx += $width_cell + 3;
    $pdf->SetXY($get_xxx, $get_yyy);
    $pdf->MultiCell($width_cell - 15, $height_cell, 'Status Harga', 1, 'C', 1);
    $get_xxx += $width_cell - 15;
    $pdf->SetXY($get_xxx, $get_yyy);
    $pdf->MultiCell($width_cell - 20, $height_cell, 'Persentase', 1, 'C', 1);
    $get_xxx += $width_cell - 20;

    //6
    $pangan = $this->m_pangan->tampil_pangan();
    $no = 1;
    foreach ($pangan as $data_pangan) :
      $jumlah_pasar = $this->m_pasar->jumlah_pasar();
      $tanggal_kemarin = date('Y-m-d', strtotime('-1 days', strtotime($tanggal)));
      $harga = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal, $data_pangan->id_pangan)->row();
      if (empty($harga)) {
        $harga_sampel1 = 0;
        $harga_sampel2 = 0;
        $harga_sampel3 = 0;
      } else {
        $harga_sampel1 = $harga->h_sampel1;
        $harga_sampel2 = $harga->h_sampel2;
        $harga_sampel3 = $harga->h_sampel3;
      }
      $harga_komoditas = ($harga_sampel1 + $harga_sampel2 + $harga_sampel3) / 3;
      if ($harga_komoditas == 0) {
        $harga_komoditas_all = 0;
      } else {
        $harga_komoditas_all = $harga_komoditas / $jumlah_pasar;
      }
      $harga_kemarin = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_kemarin, $data_pangan->id_pangan)->row();
      if (empty($harga_kemarin)) {
        $harga_sampel1_kemarin = 0;
        $harga_sampel2_kemarin = 0;
        $harga_sampel3_kemarin = 0;
      } else {
        $harga_sampel1_kemarin = $harga_kemarin->h_sampel1;
        $harga_sampel2_kemarin = $harga_kemarin->h_sampel2;
        $harga_sampel3_kemarin = $harga_kemarin->h_sampel3;
      }
      $harga_komoditas_kemarin = ($harga_sampel1_kemarin + $harga_sampel2_kemarin + $harga_sampel3_kemarin) / 3;
      if ($harga_komoditas_kemarin == 0) {
        $harga_komoditas_all_kemarin = 0;
      } else {
        $harga_komoditas_all_kemarin = $harga_komoditas_kemarin / $jumlah_pasar;
      }
      $selisih = $harga_komoditas_all - $harga_komoditas_all_kemarin;
      if ($selisih > 0) {
        $status = "Naik";
      } elseif ($selisih == 0) {
        $status = "Tetap";
      } else {
        $status = "Turun";
      }
      if ($selisih == 0) {
        $persentase = 0;
      } elseif ($harga_komoditas_kemarin == 0) {
        $persentase = 100;
      } else {
        $persentase = ($selisih / $harga_komoditas_kemarin) * 100;
      }
      $pdf->SetFont('Times', '', 8);
      $pdf->Cell(5);
      $start_awal = $pdf->GetX();
      $get_xxx = $pdf->GetX();
      $get_yyy = $pdf->GetY();
      $width_cell = 40;
      $height_cell = 7;
      $pdf->MultiCell($width_cell - 33, $height_cell, $no, 1, 'C');
      $get_xxx += $width_cell - 33;
      $pdf->SetXY($get_xxx, $get_yyy);
      $pdf->MultiCell($width_cell + 5, $height_cell, $data_pangan->nama_pangan, 1, 'L');
      $get_xxx += $width_cell + 5;
      $pdf->SetXY($get_xxx, $get_yyy);
      $pdf->MultiCell($width_cell - 20, $height_cell, $data_pangan->satuan, 1, 'C');
      $get_xxx += $width_cell - 20;
      $pdf->SetXY($get_xxx, $get_yyy);
      $pdf->MultiCell($width_cell - 15, $height_cell, 'Rp ' . number_format($harga_komoditas_all, 2, ',', '.'), 1, 'R');
      $get_xxx += $width_cell - 15;
      $pdf->SetXY($get_xxx, $get_yyy);
      $pdf->MultiCell($width_cell + 3, $height_cell, 'Rp ' . number_format($selisih, 2, ',', '.'), 1, 'R');
      $get_xxx += $width_cell + 3;
      $pdf->SetXY($get_xxx, $get_yyy);
      $pdf->MultiCell($width_cell - 15, $height_cell, $status, 1, 'C');
      $get_xxx += $width_cell - 15;
      $pdf->SetXY($get_xxx, $get_yyy);
      $pdf->MultiCell($width_cell - 20, $height_cell, number_format($persentase, 2, ',', '.'), 1, 'R');
      $get_xxx += $width_cell - 20;
      $no++;
    endforeach;

    //12
    $pdf->SetFont('Times', '', 8);
    $kasubag = $this->db->query("SELECT * FROM user WHERE level = 'kasubag'")->row();
    $pdf->Text(15, $get_yyy + 25, "Kepala Subbagian,");
    $pdf->Text(15, $get_yyy + 45, $kasubag->nama_petugas);
    $pdf->Text(15, $get_yyy + 50, "NIP. " . $kasubag->nip);
    $pdf->text(150, $get_yyy + 20, "Karawang, " . date('d') . " " . bulan(date('m')) . " " . date('Y'));
    $pdf->Text(150, $get_yyy + 25, "Staff Harga Komoditas Pangan,");
    $pdf->Text(150, $get_yyy + 45, $this->session->userdata('nama_petugas'));
    $pdf->Text(150, $get_yyy + 50, "NIP. " . $this->session->userdata('nip'));
    $pdf->Output();

    //13
  }
}
