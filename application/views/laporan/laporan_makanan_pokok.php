<div class="content-wrapper">
  <section class="content">
    <div class="box box-info">
      <div class="box-header">
        <h4 style="text-align:center"><b>LAPORAN HARGA KOMODITAS PANGAN</b></h4><hr>
      </div>
      <div class="box-body">
		  <form action="<?php echo base_url('laporan/tampil-makanan-pokok'); ?>" method="get">
              <div class="col-sm-4">
                <input type="text" name="tanggal" class="form-control" id="datepicker" placeholder="Pilih Tanggal" required>
              </div>
              <div class="col-sm-4">
                <select name="pasar" class="form-control" required>
					<option value="all">Semua Pasar</option>
					<?php foreach ($pasar as $data_pasar): ?>
					<option value="<?php echo $data_pasar->id_pasar; ?>"><?php echo $data_pasar->nama_pasar; ?></option>
					<?php endforeach;?>
				</select>
              </div>
              <div class="col-sm-4">
                <button class="btn btn-success btn-block">Tampil</button>
              </div>
              </form><br /><br /><br />

        <?php
if (isset($_GET['tanggal'])) {
	?>
            <div class="box-body table-responsive">
				Tanggal : <?php $tanggal_new = date_create($tanggal);
	echo date_format($tanggal_new, 'd') . " " . bulan(date_format($tanggal_new, 'm')) . " " . date_format($tanggal_new, 'Y');?>
				<div class="pull-right">Pasar: <?php echo $nama_pasar->nama_pasar; ?> </div>
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr class=>
					  <th style="text-align:center">No</th>
                    <th style="text-align:center">Komoditas</th>
                    <th style="text-align:center">Satuan</th>
                    <th style="text-align:center">Harga</th>
                    <th style="text-align:center">Selisih Harga Kemarin</th>
                    <th style="text-align:center">Status Harga</th>
                    <th style="text-align:center">Persentase</th>
                  </tr>
                </thead>
                <tbody>
                <?php
$no = 1;
	foreach ($pangan as $data_pangan):
		$tanggal_kemarin = date('Y-m-d', strtotime('-1 days', strtotime($tanggal)));
		$harga = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal, $get_pasar, $data_pangan->id_pangan)->row();
		if (empty($harga)) {
			$harga_sampel1 = 0;
			$harga_sampel2 = 0;
			$harga_sampel3 = 0;} else {
			$harga_sampel1 = $harga->harga_sampel1;
			$harga_sampel2 = $harga->harga_sampel2;
			$harga_sampel3 = $harga->harga_sampel3;}
		$harga_komoditas = ($harga_sampel1 + $harga_sampel2 + $harga_sampel3) / 3;
		$harga_kemarin = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_kemarin, $get_pasar, $data_pangan->id_pangan)->row();
		if (empty($harga_kemarin)) {
			$harga_sampel1_kemarin = 0;
			$harga_sampel2_kemarin = 0;
			$harga_sampel3_kemarin = 0;} else {
			$harga_sampel1_kemarin = $harga_kemarin->harga_sampel1;
			$harga_sampel2_kemarin = $harga_kemarin->harga_sampel2;
			$harga_sampel3_kemarin = $harga_kemarin->harga_sampel3;}
		$harga_komoditas_kemarin = ($harga_sampel1_kemarin + $harga_sampel2_kemarin + $harga_sampel3_kemarin) / 3;
		$selisih = $harga_komoditas - $harga_komoditas_kemarin;
		if ($selisih > 0) {
			$status = "Naik";
		} elseif ($selisih == 0) {
		$status = "Tetap";
	} else {
		$status = "Turun";
	}
	if ($selisih == 0) {$persentase = 0;} elseif ($harga_komoditas_kemarin == 0) {$persentase = 100;} else { $persentase = ($selisih / $harga_komoditas_kemarin) * 100;}
	?>
				<tr>
                    <td style="text-align:center"><?php echo $no; ?></td>
                    <td><?php echo $data_pangan->nama_pangan; ?></td>
                    <td><?php echo $data_pangan->satuan; ?></td>
					<td><?php echo number_format($harga_komoditas, 2, ',', '.'); ?></td>
                    <td><?php echo number_format($selisih, 2, ',', '.'); ?></td>
                    <td><?php echo $status; ?></td>
                    <td><?php echo number_format($persentase, 2, ',', '.'); ?> %</td>
                  </tr>
<?php
$no++;
	endforeach;
	?>
                </tbody>
              </table><br>

<?php
if ($this->session->userdata('level') == 'admin') {
		?>
                  <a target="_blank" href="<?php echo base_url('laporan/cetak-makanan-pokok?tanggal=' . $_GET['tanggal'] . '&pasar=' . $_GET['pasar']); ?>" target="_blank">
                    <button class="btn btn-warning btn-custom-cetak-export"><i class="fa fa-print"></i> <span>Cetak</span></button>
                  </a>
                  <a href="<?php echo base_url('grafik/grafik-makanan-pokok?tanggal=' . $_GET['tanggal'] . '&pasar=' . $_GET['pasar']); ?>" target="_blank">
                    <button class="btn btn-primary btn-custom-cetak-export"><i class="fa fa-bar-chart"></i> <span>Grafik</span></button>
                  </a>
                <?php
}
	?>

            </div>
            <?php
}
?>

      </div>

    </div>
  </section>
</div>