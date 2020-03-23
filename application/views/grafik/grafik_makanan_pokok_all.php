<div class="content-wrapper">
	<section class="content">
		<div class="box box-info">
			<div class="box-header">
				<h4 style="text-align:center"><b>GRAFIK BAHAN MAKANAN POKOK</b></h4>
				<hr>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<center>
							<h3 class="label label-success">Beras Premium</label>
						</center>
						<div class="chart" id="beras-premium" style="height: 100%; width: 100%;"></div>
					</div>
					<div class="col-lg-6 col-md-6">
						<center>
							<h3 class="label label-success">Beras Medium</label>
						</center>
						<div class="chart" id="beras-medium" style="height: 100%; width: 100%;"></div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<center>
							<h3 class="label label-success">Beras Termurah</label>
						</center>
						<div class="chart" id="beras-termurah" style="height: 100%; width: 100%;"></div>
					</div>
					<div class="col-lg-6 col-md-6">
						<center>
							<h3 class="label label-success">Minyak Goreng Curah</label>
						</center>
						<div class="chart" id="minyak-goreng-curah" style="height: 100%; width: 100%;"></div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<center>
							<h3 class="label label-success">Minyak Goreng Kemasan</label>
						</center>
						<div class="chart" id="minyak-goreng-kemasan" style="height: 100%; width: 100%;"></div>
					</div>
					<div class="col-lg-6 col-md-6">
						<center>
							<h3 class="label label-success">Gula Pasir</label>
						</center>
						<div class="chart" id="gula-pasir" style="height: 100%; width: 100%;"></div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<center>
							<h3 class="label label-success">Terigu</label>
						</center>
						<div class="chart" id="terigu" style="height: 100%; width: 100%;"></div>
					</div>
					<div class="col-lg-6 col-md-6">
						<center>
							<h3 class="label label-success">Daging Sapi</label>
						</center>
						<div class="chart" id="daging-sapi" style="height: 100%; width: 100%;"></div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<center>
							<h3 class="label label-success">Daging Ayam</label>
						</center>
						<div class="chart" id="daging-ayam" style="height: 100%; width: 100%;"></div>
					</div>
					<div class="col-lg-6 col-md-6">
						<center>
							<h3 class="label label-success">Daging Ayam Ras</label>
						</center>
						<div class="chart" id="daging-ayam-ras" style="height: 100%; width: 100%;"></div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<center>
							<h3 class="label label-success">Cabe Keriting</label>
						</center>
						<div class="chart" id="cabe-keriting" style="height: 100%; width: 100%;"></div>
					</div>
					<div class="col-lg-6 col-md-6">
						<center>
							<h3 class="label label-success">Cabe Rawit</label>
						</center>
						<div class="chart" id="cabe-rawit" style="height: 100%; width: 100%;"></div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<center>
							<h3 class="label label-success">Bawang Merah</label>
						</center>
						<div class="chart" id="bawang-merah" style="height: 100%; width: 100%;"></div>
					</div>
					<div class="col-lg-6 col-md-6">
						<center>
							<h3 class="label label-success">Bawang Putih (Bongol)</label>
						</center>
						<div class="chart" id="bawang-putih-bongol" style="height: 100%; width: 100%;"></div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<center>
							<h3 class="label label-success">Kacang Kedelai</label>
						</center>
						<div class="chart" id="kacang-kedelai" style="height: 100%; width: 100%;"></div>
					</div>
					<div class="col-lg-6 col-md-6">
						<center>
							<h3 class="label label-success">Jagung</label>
						</center>
						<div class="chart" id="jagung" style="height: 100%; width: 100%;"></div>
					</div>
				</div>
			</div>
		</div>
</div>
</div>
</section>
</div>
<script>
	$(function() {
		"use strict";

		<?php
		$tanggal_4 = date('Y-m-d', strtotime('-4 days', strtotime($tanggal)));
		$tanggal_3 = date('Y-m-d', strtotime('-3 days', strtotime($tanggal)));
		$tanggal_2 = date('Y-m-d', strtotime('-2 days', strtotime($tanggal)));
		$tanggal_1 = date('Y-m-d', strtotime('-1 days', strtotime($tanggal)));
		?>
		// LINE CHART
		var line = new Morris.Line({
			<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal, 'BMP001')->row();
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
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_1, 'BMP001')->row();
			if (empty($harga_1)) {
				$harga_sampel1_1 = 0;
				$harga_sampel2_1 = 0;
				$harga_sampel3_1 = 0;
			} else {
				$harga_sampel1_1 = $harga_1->h_sampel1;
				$harga_sampel2_1 = $harga_1->h_sampel2;
				$harga_sampel3_1 = $harga_1->h_sampel3;
			}
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1) / 3;
			if ($harga_komoditas_1 == 0) {
				$harga_komoditas_all_1 = 0;
			} else {
				$harga_komoditas_all_1 = $harga_komoditas_1 / $jumlah_pasar;
			}
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_2, 'BMP001')->row();
			if (empty($harga_2)) {
				$harga_sampel1_2 = 0;
				$harga_sampel2_2 = 0;
				$harga_sampel3_2 = 0;
			} else {
				$harga_sampel1_2 = $harga_2->h_sampel1;
				$harga_sampel2_2 = $harga_2->h_sampel2;
				$harga_sampel3_2 = $harga_2->h_sampel3;
			}
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2) / 3;
			if ($harga_komoditas_2 == 0) {
				$harga_komoditas_all_2 = 0;
			} else {
				$harga_komoditas_all_2 = $harga_komoditas_2 / $jumlah_pasar;
			}
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_3, 'BMP001')->row();
			if (empty($harga_3)) {
				$harga_sampel1_3 = 0;
				$harga_sampel2_3 = 0;
				$harga_sampel3_3 = 0;
			} else {
				$harga_sampel1_3 = $harga_3->h_sampel1;
				$harga_sampel2_3 = $harga_3->h_sampel2;
				$harga_sampel3_3 = $harga_3->h_sampel3;
			}
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3) / 3;
			if ($harga_komoditas_3 == 0) {
				$harga_komoditas_all_3 = 0;
			} else {
				$harga_komoditas_all_3 = $harga_komoditas_3 / $jumlah_pasar;
			}
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_4, 'BMP001')->row();
			if (empty($harga_4)) {
				$harga_sampel1_4 = 0;
				$harga_sampel2_4 = 0;
				$harga_sampel3_4 = 0;
			} else {
				$harga_sampel1_4 = $harga_4->h_sampel1;
				$harga_sampel2_4 = $harga_4->h_sampel2;
				$harga_sampel3_4 = $harga_4->h_sampel3;
			}
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4) / 3;
			if ($harga_komoditas_4 == 0) {
				$harga_komoditas_all_4 = 0;
			} else {
				$harga_komoditas_all_4 = $harga_komoditas_4 / $jumlah_pasar;
			}
			?>
			element: 'beras-premium',
			resize: true,
			data: [{
					y: '<?php echo $tanggal; ?>',
					harga: '<?php echo number_format($harga_komoditas_all, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_1; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_1, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_2; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_2, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_3; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_3, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_4; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_4, 2, ',', '.'); ?>'
				}
			],
			xkey: 'y',
			ykeys: ['harga'],
			labels: ['Harga'],
			lineColors: ['#3c8dbc'],
			hideHover: 'auto'
		});
		var line = new Morris.Line({
			<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal, 'BMP002')->row();
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
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_1, 'BMP002')->row();
			if (empty($harga_1)) {
				$harga_sampel1_1 = 0;
				$harga_sampel2_1 = 0;
				$harga_sampel3_1 = 0;
			} else {
				$harga_sampel1_1 = $harga_1->h_sampel1;
				$harga_sampel2_1 = $harga_1->h_sampel2;
				$harga_sampel3_1 = $harga_1->h_sampel3;
			}
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1) / 3;
			if ($harga_komoditas_1 == 0) {
				$harga_komoditas_all_1 = 0;
			} else {
				$harga_komoditas_all_1 = $harga_komoditas_1 / $jumlah_pasar;
			}
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_2, 'BMP002')->row();
			if (empty($harga_2)) {
				$harga_sampel1_2 = 0;
				$harga_sampel2_2 = 0;
				$harga_sampel3_2 = 0;
			} else {
				$harga_sampel1_2 = $harga_2->h_sampel1;
				$harga_sampel2_2 = $harga_2->h_sampel2;
				$harga_sampel3_2 = $harga_2->h_sampel3;
			}
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2) / 3;
			if ($harga_komoditas_2 == 0) {
				$harga_komoditas_all_2 = 0;
			} else {
				$harga_komoditas_all_2 = $harga_komoditas_2 / $jumlah_pasar;
			}
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_3, 'BMP002')->row();
			if (empty($harga_3)) {
				$harga_sampel1_3 = 0;
				$harga_sampel2_3 = 0;
				$harga_sampel3_3 = 0;
			} else {
				$harga_sampel1_3 = $harga_3->h_sampel1;
				$harga_sampel2_3 = $harga_3->h_sampel2;
				$harga_sampel3_3 = $harga_3->h_sampel3;
			}
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3) / 3;
			if ($harga_komoditas_3 == 0) {
				$harga_komoditas_all_3 = 0;
			} else {
				$harga_komoditas_all_3 = $harga_komoditas_3 / $jumlah_pasar;
			}
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_4, 'BMP002')->row();
			if (empty($harga_4)) {
				$harga_sampel1_4 = 0;
				$harga_sampel2_4 = 0;
				$harga_sampel3_4 = 0;
			} else {
				$harga_sampel1_4 = $harga_4->h_sampel1;
				$harga_sampel2_4 = $harga_4->h_sampel2;
				$harga_sampel3_4 = $harga_4->h_sampel3;
			}
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4) / 3;
			if ($harga_komoditas_4 == 0) {
				$harga_komoditas_all_4 = 0;
			} else {
				$harga_komoditas_all_4 = $harga_komoditas_4 / $jumlah_pasar;
			}
			?>
			element: 'beras-medium',
			resize: true,
			data: [{
					y: '<?php echo $tanggal; ?>',
					harga: '<?php echo number_format($harga_komoditas_all, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_1; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_1, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_2; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_2, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_3; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_3, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_4; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_4, 2, ',', '.'); ?>'
				}
			],
			xkey: 'y',
			ykeys: ['harga'],
			labels: ['Harga'],
			lineColors: ['#3c8dbc'],
			hideHover: 'auto'
		});
		var line = new Morris.Line({
			<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal, 'BMP003')->row();
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
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_1, 'BMP003')->row();
			if (empty($harga_1)) {
				$harga_sampel1_1 = 0;
				$harga_sampel2_1 = 0;
				$harga_sampel3_1 = 0;
			} else {
				$harga_sampel1_1 = $harga_1->h_sampel1;
				$harga_sampel2_1 = $harga_1->h_sampel2;
				$harga_sampel3_1 = $harga_1->h_sampel3;
			}
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1) / 3;
			if ($harga_komoditas_1 == 0) {
				$harga_komoditas_all_1 = 0;
			} else {
				$harga_komoditas_all_1 = $harga_komoditas_1 / $jumlah_pasar;
			}
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_2, 'BMP003')->row();
			if (empty($harga_2)) {
				$harga_sampel1_2 = 0;
				$harga_sampel2_2 = 0;
				$harga_sampel3_2 = 0;
			} else {
				$harga_sampel1_2 = $harga_2->h_sampel1;
				$harga_sampel2_2 = $harga_2->h_sampel2;
				$harga_sampel3_2 = $harga_2->h_sampel3;
			}
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2) / 3;
			if ($harga_komoditas_2 == 0) {
				$harga_komoditas_all_2 = 0;
			} else {
				$harga_komoditas_all_2 = $harga_komoditas_2 / $jumlah_pasar;
			}
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_3, 'BMP003')->row();
			if (empty($harga_3)) {
				$harga_sampel1_3 = 0;
				$harga_sampel2_3 = 0;
				$harga_sampel3_3 = 0;
			} else {
				$harga_sampel1_3 = $harga_3->h_sampel1;
				$harga_sampel2_3 = $harga_3->h_sampel2;
				$harga_sampel3_3 = $harga_3->h_sampel3;
			}
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3) / 3;
			if ($harga_komoditas_3 == 0) {
				$harga_komoditas_all_3 = 0;
			} else {
				$harga_komoditas_all_3 = $harga_komoditas_3 / $jumlah_pasar;
			}
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_4, 'BMP003')->row();
			if (empty($harga_4)) {
				$harga_sampel1_4 = 0;
				$harga_sampel2_4 = 0;
				$harga_sampel3_4 = 0;
			} else {
				$harga_sampel1_4 = $harga_4->h_sampel1;
				$harga_sampel2_4 = $harga_4->h_sampel2;
				$harga_sampel3_4 = $harga_4->h_sampel3;
			}
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4) / 3;
			if ($harga_komoditas_4 == 0) {
				$harga_komoditas_all_4 = 0;
			} else {
				$harga_komoditas_all_4 = $harga_komoditas_4 / $jumlah_pasar;
			}
			?>
			element: 'beras-termurah',
			resize: true,
			data: [{
					y: '<?php echo $tanggal; ?>',
					harga: '<?php echo number_format($harga_komoditas_all, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_1; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_1, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_2; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_2, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_3; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_3, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_4; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_4, 2, ',', '.'); ?>'
				}
			],
			xkey: 'y',
			ykeys: ['harga'],
			labels: ['Harga'],
			lineColors: ['#3c8dbc'],
			hideHover: 'auto'
		});
		var line = new Morris.Line({
			<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal, 'BMP004')->row();
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
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_1, 'BMP004')->row();
			if (empty($harga_1)) {
				$harga_sampel1_1 = 0;
				$harga_sampel2_1 = 0;
				$harga_sampel3_1 = 0;
			} else {
				$harga_sampel1_1 = $harga_1->h_sampel1;
				$harga_sampel2_1 = $harga_1->h_sampel2;
				$harga_sampel3_1 = $harga_1->h_sampel3;
			}
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1) / 3;
			if ($harga_komoditas_1 == 0) {
				$harga_komoditas_all_1 = 0;
			} else {
				$harga_komoditas_all_1 = $harga_komoditas_1 / $jumlah_pasar;
			}
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_2, 'BMP004')->row();
			if (empty($harga_2)) {
				$harga_sampel1_2 = 0;
				$harga_sampel2_2 = 0;
				$harga_sampel3_2 = 0;
			} else {
				$harga_sampel1_2 = $harga_2->h_sampel1;
				$harga_sampel2_2 = $harga_2->h_sampel2;
				$harga_sampel3_2 = $harga_2->h_sampel3;
			}
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2) / 3;
			if ($harga_komoditas_2 == 0) {
				$harga_komoditas_all_2 = 0;
			} else {
				$harga_komoditas_all_2 = $harga_komoditas_2 / $jumlah_pasar;
			}
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_3, 'BMP004')->row();
			if (empty($harga_3)) {
				$harga_sampel1_3 = 0;
				$harga_sampel2_3 = 0;
				$harga_sampel3_3 = 0;
			} else {
				$harga_sampel1_3 = $harga_3->h_sampel1;
				$harga_sampel2_3 = $harga_3->h_sampel2;
				$harga_sampel3_3 = $harga_3->h_sampel3;
			}
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3) / 3;
			if ($harga_komoditas_3 == 0) {
				$harga_komoditas_all_3 = 0;
			} else {
				$harga_komoditas_all_3 = $harga_komoditas_3 / $jumlah_pasar;
			}
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_4, 'BMP004')->row();
			if (empty($harga_4)) {
				$harga_sampel1_4 = 0;
				$harga_sampel2_4 = 0;
				$harga_sampel3_4 = 0;
			} else {
				$harga_sampel1_4 = $harga_4->h_sampel1;
				$harga_sampel2_4 = $harga_4->h_sampel2;
				$harga_sampel3_4 = $harga_4->h_sampel3;
			}
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4) / 3;
			if ($harga_komoditas_4 == 0) {
				$harga_komoditas_all_4 = 0;
			} else {
				$harga_komoditas_all_4 = $harga_komoditas_4 / $jumlah_pasar;
			}
			?>
			element: 'minyak-goreng-curah',
			resize: true,
			data: [{
					y: '<?php echo $tanggal; ?>',
					harga: '<?php echo number_format($harga_komoditas_all, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_1; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_1, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_2; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_2, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_3; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_3, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_4; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_4, 2, ',', '.'); ?>'
				}
			],
			xkey: 'y',
			ykeys: ['harga'],
			labels: ['Harga'],
			lineColors: ['#3c8dbc'],
			hideHover: 'auto'
		});
		var line = new Morris.Line({
			<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal, 'BMP005')->row();
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
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_1, 'BMP005')->row();
			if (empty($harga_1)) {
				$harga_sampel1_1 = 0;
				$harga_sampel2_1 = 0;
				$harga_sampel3_1 = 0;
			} else {
				$harga_sampel1_1 = $harga_1->h_sampel1;
				$harga_sampel2_1 = $harga_1->h_sampel2;
				$harga_sampel3_1 = $harga_1->h_sampel3;
			}
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1) / 3;
			if ($harga_komoditas_1 == 0) {
				$harga_komoditas_all_1 = 0;
			} else {
				$harga_komoditas_all_1 = $harga_komoditas_1 / $jumlah_pasar;
			}
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_2, 'BMP005')->row();
			if (empty($harga_2)) {
				$harga_sampel1_2 = 0;
				$harga_sampel2_2 = 0;
				$harga_sampel3_2 = 0;
			} else {
				$harga_sampel1_2 = $harga_2->h_sampel1;
				$harga_sampel2_2 = $harga_2->h_sampel2;
				$harga_sampel3_2 = $harga_2->h_sampel3;
			}
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2) / 3;
			if ($harga_komoditas_2 == 0) {
				$harga_komoditas_all_2 = 0;
			} else {
				$harga_komoditas_all_2 = $harga_komoditas_2 / $jumlah_pasar;
			}
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_3, 'BMP005')->row();
			if (empty($harga_3)) {
				$harga_sampel1_3 = 0;
				$harga_sampel2_3 = 0;
				$harga_sampel3_3 = 0;
			} else {
				$harga_sampel1_3 = $harga_3->h_sampel1;
				$harga_sampel2_3 = $harga_3->h_sampel2;
				$harga_sampel3_3 = $harga_3->h_sampel3;
			}
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3) / 3;
			if ($harga_komoditas_3 == 0) {
				$harga_komoditas_all_3 = 0;
			} else {
				$harga_komoditas_all_3 = $harga_komoditas_3 / $jumlah_pasar;
			}
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_4, 'BMP005')->row();
			if (empty($harga_4)) {
				$harga_sampel1_4 = 0;
				$harga_sampel2_4 = 0;
				$harga_sampel3_4 = 0;
			} else {
				$harga_sampel1_4 = $harga_4->h_sampel1;
				$harga_sampel2_4 = $harga_4->h_sampel2;
				$harga_sampel3_4 = $harga_4->h_sampel3;
			}
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4) / 3;
			if ($harga_komoditas_4 == 0) {
				$harga_komoditas_all_4 = 0;
			} else {
				$harga_komoditas_all_4 = $harga_komoditas_4 / $jumlah_pasar;
			}
			?>
			element: 'minyak-goreng-kemasan',
			resize: true,
			data: [{
					y: '<?php echo $tanggal; ?>',
					harga: '<?php echo number_format($harga_komoditas_all, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_1; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_1, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_2; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_2, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_3; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_3, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_4; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_4, 2, ',', '.'); ?>'
				}
			],
			xkey: 'y',
			ykeys: ['harga'],
			labels: ['Harga'],
			lineColors: ['#3c8dbc'],
			hideHover: 'auto'
		});
		var line = new Morris.Line({
			<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal, 'BMP006')->row();
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
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_1, 'BMP006')->row();
			if (empty($harga_1)) {
				$harga_sampel1_1 = 0;
				$harga_sampel2_1 = 0;
				$harga_sampel3_1 = 0;
			} else {
				$harga_sampel1_1 = $harga_1->h_sampel1;
				$harga_sampel2_1 = $harga_1->h_sampel2;
				$harga_sampel3_1 = $harga_1->h_sampel3;
			}
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1) / 3;
			if ($harga_komoditas_1 == 0) {
				$harga_komoditas_all_1 = 0;
			} else {
				$harga_komoditas_all_1 = $harga_komoditas_1 / $jumlah_pasar;
			}
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_2, 'BMP006')->row();
			if (empty($harga_2)) {
				$harga_sampel1_2 = 0;
				$harga_sampel2_2 = 0;
				$harga_sampel3_2 = 0;
			} else {
				$harga_sampel1_2 = $harga_2->h_sampel1;
				$harga_sampel2_2 = $harga_2->h_sampel2;
				$harga_sampel3_2 = $harga_2->h_sampel3;
			}
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2) / 3;
			if ($harga_komoditas_2 == 0) {
				$harga_komoditas_all_2 = 0;
			} else {
				$harga_komoditas_all_2 = $harga_komoditas_2 / $jumlah_pasar;
			}
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_3, 'BMP006')->row();
			if (empty($harga_3)) {
				$harga_sampel1_3 = 0;
				$harga_sampel2_3 = 0;
				$harga_sampel3_3 = 0;
			} else {
				$harga_sampel1_3 = $harga_3->h_sampel1;
				$harga_sampel2_3 = $harga_3->h_sampel2;
				$harga_sampel3_3 = $harga_3->h_sampel3;
			}
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3) / 3;
			if ($harga_komoditas_3 == 0) {
				$harga_komoditas_all_3 = 0;
			} else {
				$harga_komoditas_all_3 = $harga_komoditas_3 / $jumlah_pasar;
			}
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_4, 'BMP006')->row();
			if (empty($harga_4)) {
				$harga_sampel1_4 = 0;
				$harga_sampel2_4 = 0;
				$harga_sampel3_4 = 0;
			} else {
				$harga_sampel1_4 = $harga_4->h_sampel1;
				$harga_sampel2_4 = $harga_4->h_sampel2;
				$harga_sampel3_4 = $harga_4->h_sampel3;
			}
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4) / 3;
			if ($harga_komoditas_4 == 0) {
				$harga_komoditas_all_4 = 0;
			} else {
				$harga_komoditas_all_4 = $harga_komoditas_4 / $jumlah_pasar;
			}
			?>
			element: 'gula-pasir',
			resize: true,
			data: [{
					y: '<?php echo $tanggal; ?>',
					harga: '<?php echo number_format($harga_komoditas_all, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_1; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_1, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_2; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_2, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_3; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_3, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_4; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_4, 2, ',', '.'); ?>'
				}
			],
			xkey: 'y',
			ykeys: ['harga'],
			labels: ['Harga'],
			lineColors: ['#3c8dbc'],
			hideHover: 'auto'
		});
		var line = new Morris.Line({
			<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal, 'BMP007')->row();
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
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_1, 'BMP007')->row();
			if (empty($harga_1)) {
				$harga_sampel1_1 = 0;
				$harga_sampel2_1 = 0;
				$harga_sampel3_1 = 0;
			} else {
				$harga_sampel1_1 = $harga_1->h_sampel1;
				$harga_sampel2_1 = $harga_1->h_sampel2;
				$harga_sampel3_1 = $harga_1->h_sampel3;
			}
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1) / 3;
			if ($harga_komoditas_1 == 0) {
				$harga_komoditas_all_1 = 0;
			} else {
				$harga_komoditas_all_1 = $harga_komoditas_1 / $jumlah_pasar;
			}
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_2, 'BMP007')->row();
			if (empty($harga_2)) {
				$harga_sampel1_2 = 0;
				$harga_sampel2_2 = 0;
				$harga_sampel3_2 = 0;
			} else {
				$harga_sampel1_2 = $harga_2->h_sampel1;
				$harga_sampel2_2 = $harga_2->h_sampel2;
				$harga_sampel3_2 = $harga_2->h_sampel3;
			}
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2) / 3;
			if ($harga_komoditas_2 == 0) {
				$harga_komoditas_all_2 = 0;
			} else {
				$harga_komoditas_all_2 = $harga_komoditas_2 / $jumlah_pasar;
			}
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_3, 'BMP007')->row();
			if (empty($harga_3)) {
				$harga_sampel1_3 = 0;
				$harga_sampel2_3 = 0;
				$harga_sampel3_3 = 0;
			} else {
				$harga_sampel1_3 = $harga_3->h_sampel1;
				$harga_sampel2_3 = $harga_3->h_sampel2;
				$harga_sampel3_3 = $harga_3->h_sampel3;
			}
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3) / 3;
			if ($harga_komoditas_3 == 0) {
				$harga_komoditas_all_3 = 0;
			} else {
				$harga_komoditas_all_3 = $harga_komoditas_3 / $jumlah_pasar;
			}
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_4, 'BMP007')->row();
			if (empty($harga_4)) {
				$harga_sampel1_4 = 0;
				$harga_sampel2_4 = 0;
				$harga_sampel3_4 = 0;
			} else {
				$harga_sampel1_4 = $harga_4->h_sampel1;
				$harga_sampel2_4 = $harga_4->h_sampel2;
				$harga_sampel3_4 = $harga_4->h_sampel3;
			}
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4) / 3;
			if ($harga_komoditas_4 == 0) {
				$harga_komoditas_all_4 = 0;
			} else {
				$harga_komoditas_all_4 = $harga_komoditas_4 / $jumlah_pasar;
			}
			?>
			element: 'terigu',
			resize: true,
			data: [{
					y: '<?php echo $tanggal; ?>',
					harga: '<?php echo number_format($harga_komoditas_all, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_1; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_1, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_2; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_2, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_3; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_3, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_4; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_4, 2, ',', '.'); ?>'
				}
			],
			xkey: 'y',
			ykeys: ['harga'],
			labels: ['Harga'],
			lineColors: ['#3c8dbc'],
			hideHover: 'auto'
		});
		var line = new Morris.Line({
			<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal, 'BMP008')->row();
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
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_1, 'BMP008')->row();
			if (empty($harga_1)) {
				$harga_sampel1_1 = 0;
				$harga_sampel2_1 = 0;
				$harga_sampel3_1 = 0;
			} else {
				$harga_sampel1_1 = $harga_1->h_sampel1;
				$harga_sampel2_1 = $harga_1->h_sampel2;
				$harga_sampel3_1 = $harga_1->h_sampel3;
			}
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1) / 3;
			if ($harga_komoditas_1 == 0) {
				$harga_komoditas_all_1 = 0;
			} else {
				$harga_komoditas_all_1 = $harga_komoditas_1 / $jumlah_pasar;
			}
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_2, 'BMP008')->row();
			if (empty($harga_2)) {
				$harga_sampel1_2 = 0;
				$harga_sampel2_2 = 0;
				$harga_sampel3_2 = 0;
			} else {
				$harga_sampel1_2 = $harga_2->h_sampel1;
				$harga_sampel2_2 = $harga_2->h_sampel2;
				$harga_sampel3_2 = $harga_2->h_sampel3;
			}
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2) / 3;
			if ($harga_komoditas_2 == 0) {
				$harga_komoditas_all_2 = 0;
			} else {
				$harga_komoditas_all_2 = $harga_komoditas_2 / $jumlah_pasar;
			}
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_3, 'BMP008')->row();
			if (empty($harga_3)) {
				$harga_sampel1_3 = 0;
				$harga_sampel2_3 = 0;
				$harga_sampel3_3 = 0;
			} else {
				$harga_sampel1_3 = $harga_3->h_sampel1;
				$harga_sampel2_3 = $harga_3->h_sampel2;
				$harga_sampel3_3 = $harga_3->h_sampel3;
			}
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3) / 3;
			if ($harga_komoditas_3 == 0) {
				$harga_komoditas_all_3 = 0;
			} else {
				$harga_komoditas_all_3 = $harga_komoditas_3 / $jumlah_pasar;
			}
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_4, 'BMP008')->row();
			if (empty($harga_4)) {
				$harga_sampel1_4 = 0;
				$harga_sampel2_4 = 0;
				$harga_sampel3_4 = 0;
			} else {
				$harga_sampel1_4 = $harga_4->h_sampel1;
				$harga_sampel2_4 = $harga_4->h_sampel2;
				$harga_sampel3_4 = $harga_4->h_sampel3;
			}
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4) / 3;
			if ($harga_komoditas_4 == 0) {
				$harga_komoditas_all_4 = 0;
			} else {
				$harga_komoditas_all_4 = $harga_komoditas_4 / $jumlah_pasar;
			}
			?>
			element: 'daging-sapi',
			resize: true,
			data: [{
					y: '<?php echo $tanggal; ?>',
					harga: '<?php echo number_format($harga_komoditas_all, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_1; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_1, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_2; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_2, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_3; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_3, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_4; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_4, 2, ',', '.'); ?>'
				}
			],
			xkey: 'y',
			ykeys: ['harga'],
			labels: ['Harga'],
			lineColors: ['#3c8dbc'],
			hideHover: 'auto'
		});
		var line = new Morris.Line({
			<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal, 'BMP009')->row();
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
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_1, 'BMP009')->row();
			if (empty($harga_1)) {
				$harga_sampel1_1 = 0;
				$harga_sampel2_1 = 0;
				$harga_sampel3_1 = 0;
			} else {
				$harga_sampel1_1 = $harga_1->h_sampel1;
				$harga_sampel2_1 = $harga_1->h_sampel2;
				$harga_sampel3_1 = $harga_1->h_sampel3;
			}
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1) / 3;
			if ($harga_komoditas_1 == 0) {
				$harga_komoditas_all_1 = 0;
			} else {
				$harga_komoditas_all_1 = $harga_komoditas_1 / $jumlah_pasar;
			}
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_2, 'BMP009')->row();
			if (empty($harga_2)) {
				$harga_sampel1_2 = 0;
				$harga_sampel2_2 = 0;
				$harga_sampel3_2 = 0;
			} else {
				$harga_sampel1_2 = $harga_2->h_sampel1;
				$harga_sampel2_2 = $harga_2->h_sampel2;
				$harga_sampel3_2 = $harga_2->h_sampel3;
			}
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2) / 3;
			if ($harga_komoditas_2 == 0) {
				$harga_komoditas_all_2 = 0;
			} else {
				$harga_komoditas_all_2 = $harga_komoditas_2 / $jumlah_pasar;
			}
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_3, 'BMP009')->row();
			if (empty($harga_3)) {
				$harga_sampel1_3 = 0;
				$harga_sampel2_3 = 0;
				$harga_sampel3_3 = 0;
			} else {
				$harga_sampel1_3 = $harga_3->h_sampel1;
				$harga_sampel2_3 = $harga_3->h_sampel2;
				$harga_sampel3_3 = $harga_3->h_sampel3;
			}
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3) / 3;
			if ($harga_komoditas_3 == 0) {
				$harga_komoditas_all_3 = 0;
			} else {
				$harga_komoditas_all_3 = $harga_komoditas_3 / $jumlah_pasar;
			}
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_4, 'BMP009')->row();
			if (empty($harga_4)) {
				$harga_sampel1_4 = 0;
				$harga_sampel2_4 = 0;
				$harga_sampel3_4 = 0;
			} else {
				$harga_sampel1_4 = $harga_4->h_sampel1;
				$harga_sampel2_4 = $harga_4->h_sampel2;
				$harga_sampel3_4 = $harga_4->h_sampel3;
			}
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4) / 3;
			if ($harga_komoditas_4 == 0) {
				$harga_komoditas_all_4 = 0;
			} else {
				$harga_komoditas_all_4 = $harga_komoditas_4 / $jumlah_pasar;
			}
			?>
			element: 'daging-ayam',
			resize: true,
			data: [{
					y: '<?php echo $tanggal; ?>',
					harga: '<?php echo number_format($harga_komoditas_all, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_1; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_1, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_2; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_2, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_3; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_3, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_4; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_4, 2, ',', '.'); ?>'
				}
			],
			xkey: 'y',
			ykeys: ['harga'],
			labels: ['Harga'],
			lineColors: ['#3c8dbc'],
			hideHover: 'auto'
		});
		var line = new Morris.Line({
			<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal, 'BMP010')->row();
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
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_1, 'BMP010')->row();
			if (empty($harga_1)) {
				$harga_sampel1_1 = 0;
				$harga_sampel2_1 = 0;
				$harga_sampel3_1 = 0;
			} else {
				$harga_sampel1_1 = $harga_1->h_sampel1;
				$harga_sampel2_1 = $harga_1->h_sampel2;
				$harga_sampel3_1 = $harga_1->h_sampel3;
			}
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1) / 3;
			if ($harga_komoditas_1 == 0) {
				$harga_komoditas_all_1 = 0;
			} else {
				$harga_komoditas_all_1 = $harga_komoditas_1 / $jumlah_pasar;
			}
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_2, 'BMP010')->row();
			if (empty($harga_2)) {
				$harga_sampel1_2 = 0;
				$harga_sampel2_2 = 0;
				$harga_sampel3_2 = 0;
			} else {
				$harga_sampel1_2 = $harga_2->h_sampel1;
				$harga_sampel2_2 = $harga_2->h_sampel2;
				$harga_sampel3_2 = $harga_2->h_sampel3;
			}
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2) / 3;
			if ($harga_komoditas_2 == 0) {
				$harga_komoditas_all_2 = 0;
			} else {
				$harga_komoditas_all_2 = $harga_komoditas_2 / $jumlah_pasar;
			}
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_3, 'BMP010')->row();
			if (empty($harga_3)) {
				$harga_sampel1_3 = 0;
				$harga_sampel2_3 = 0;
				$harga_sampel3_3 = 0;
			} else {
				$harga_sampel1_3 = $harga_3->h_sampel1;
				$harga_sampel2_3 = $harga_3->h_sampel2;
				$harga_sampel3_3 = $harga_3->h_sampel3;
			}
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3) / 3;
			if ($harga_komoditas_3 == 0) {
				$harga_komoditas_all_3 = 0;
			} else {
				$harga_komoditas_all_3 = $harga_komoditas_3 / $jumlah_pasar;
			}
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_4, 'BMP010')->row();
			if (empty($harga_4)) {
				$harga_sampel1_4 = 0;
				$harga_sampel2_4 = 0;
				$harga_sampel3_4 = 0;
			} else {
				$harga_sampel1_4 = $harga_4->h_sampel1;
				$harga_sampel2_4 = $harga_4->h_sampel2;
				$harga_sampel3_4 = $harga_4->h_sampel3;
			}
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4) / 3;
			if ($harga_komoditas_4 == 0) {
				$harga_komoditas_all_4 = 0;
			} else {
				$harga_komoditas_all_4 = $harga_komoditas_4 / $jumlah_pasar;
			}
			?>
			element: 'daging-ayam-ras',
			resize: true,
			data: [{
					y: '<?php echo $tanggal; ?>',
					harga: '<?php echo number_format($harga_komoditas_all, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_1; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_1, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_2; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_2, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_3; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_3, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_4; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_4, 2, ',', '.'); ?>'
				}
			],
			xkey: 'y',
			ykeys: ['harga'],
			labels: ['Harga'],
			lineColors: ['#3c8dbc'],
			hideHover: 'auto'
		});
		var line = new Morris.Line({
			<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal, 'BMP011')->row();
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
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_1, 'BMP011')->row();
			if (empty($harga_1)) {
				$harga_sampel1_1 = 0;
				$harga_sampel2_1 = 0;
				$harga_sampel3_1 = 0;
			} else {
				$harga_sampel1_1 = $harga_1->h_sampel1;
				$harga_sampel2_1 = $harga_1->h_sampel2;
				$harga_sampel3_1 = $harga_1->h_sampel3;
			}
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1) / 3;
			if ($harga_komoditas_1 == 0) {
				$harga_komoditas_all_1 = 0;
			} else {
				$harga_komoditas_all_1 = $harga_komoditas_1 / $jumlah_pasar;
			}
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_2, 'BMP011')->row();
			if (empty($harga_2)) {
				$harga_sampel1_2 = 0;
				$harga_sampel2_2 = 0;
				$harga_sampel3_2 = 0;
			} else {
				$harga_sampel1_2 = $harga_2->h_sampel1;
				$harga_sampel2_2 = $harga_2->h_sampel2;
				$harga_sampel3_2 = $harga_2->h_sampel3;
			}
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2) / 3;
			if ($harga_komoditas_2 == 0) {
				$harga_komoditas_all_2 = 0;
			} else {
				$harga_komoditas_all_2 = $harga_komoditas_2 / $jumlah_pasar;
			}
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_3, 'BMP011')->row();
			if (empty($harga_3)) {
				$harga_sampel1_3 = 0;
				$harga_sampel2_3 = 0;
				$harga_sampel3_3 = 0;
			} else {
				$harga_sampel1_3 = $harga_3->h_sampel1;
				$harga_sampel2_3 = $harga_3->h_sampel2;
				$harga_sampel3_3 = $harga_3->h_sampel3;
			}
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3) / 3;
			if ($harga_komoditas_3 == 0) {
				$harga_komoditas_all_3 = 0;
			} else {
				$harga_komoditas_all_3 = $harga_komoditas_3 / $jumlah_pasar;
			}
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_4, 'BMP011')->row();
			if (empty($harga_4)) {
				$harga_sampel1_4 = 0;
				$harga_sampel2_4 = 0;
				$harga_sampel3_4 = 0;
			} else {
				$harga_sampel1_4 = $harga_4->h_sampel1;
				$harga_sampel2_4 = $harga_4->h_sampel2;
				$harga_sampel3_4 = $harga_4->h_sampel3;
			}
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4) / 3;
			if ($harga_komoditas_4 == 0) {
				$harga_komoditas_all_4 = 0;
			} else {
				$harga_komoditas_all_4 = $harga_komoditas_4 / $jumlah_pasar;
			}
			?>
			element: 'cabe-keriting',
			resize: true,
			data: [{
					y: '<?php echo $tanggal; ?>',
					harga: '<?php echo number_format($harga_komoditas_all, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_1; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_1, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_2; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_2, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_3; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_3, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_4; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_4, 2, ',', '.'); ?>'
				}
			],
			xkey: 'y',
			ykeys: ['harga'],
			labels: ['Harga'],
			lineColors: ['#3c8dbc'],
			hideHover: 'auto'
		});
		var line = new Morris.Line({
			<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal, 'BMP012')->row();
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
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_1, 'BMP012')->row();
			if (empty($harga_1)) {
				$harga_sampel1_1 = 0;
				$harga_sampel2_1 = 0;
				$harga_sampel3_1 = 0;
			} else {
				$harga_sampel1_1 = $harga_1->h_sampel1;
				$harga_sampel2_1 = $harga_1->h_sampel2;
				$harga_sampel3_1 = $harga_1->h_sampel3;
			}
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1) / 3;
			if ($harga_komoditas_1 == 0) {
				$harga_komoditas_all_1 = 0;
			} else {
				$harga_komoditas_all_1 = $harga_komoditas_1 / $jumlah_pasar;
			}
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_2, 'BMP012')->row();
			if (empty($harga_2)) {
				$harga_sampel1_2 = 0;
				$harga_sampel2_2 = 0;
				$harga_sampel3_2 = 0;
			} else {
				$harga_sampel1_2 = $harga_2->h_sampel1;
				$harga_sampel2_2 = $harga_2->h_sampel2;
				$harga_sampel3_2 = $harga_2->h_sampel3;
			}
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2) / 3;
			if ($harga_komoditas_2 == 0) {
				$harga_komoditas_all_2 = 0;
			} else {
				$harga_komoditas_all_2 = $harga_komoditas_2 / $jumlah_pasar;
			}
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_3, 'BMP012')->row();
			if (empty($harga_3)) {
				$harga_sampel1_3 = 0;
				$harga_sampel2_3 = 0;
				$harga_sampel3_3 = 0;
			} else {
				$harga_sampel1_3 = $harga_3->h_sampel1;
				$harga_sampel2_3 = $harga_3->h_sampel2;
				$harga_sampel3_3 = $harga_3->h_sampel3;
			}
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3) / 3;
			if ($harga_komoditas_3 == 0) {
				$harga_komoditas_all_3 = 0;
			} else {
				$harga_komoditas_all_3 = $harga_komoditas_3 / $jumlah_pasar;
			}
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_4, 'BMP012')->row();
			if (empty($harga_4)) {
				$harga_sampel1_4 = 0;
				$harga_sampel2_4 = 0;
				$harga_sampel3_4 = 0;
			} else {
				$harga_sampel1_4 = $harga_4->h_sampel1;
				$harga_sampel2_4 = $harga_4->h_sampel2;
				$harga_sampel3_4 = $harga_4->h_sampel3;
			}
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4) / 3;
			if ($harga_komoditas_4 == 0) {
				$harga_komoditas_all_4 = 0;
			} else {
				$harga_komoditas_all_4 = $harga_komoditas_4 / $jumlah_pasar;
			}
			?>
			element: 'cabe-rawit',
			resize: true,
			data: [{
					y: '<?php echo $tanggal; ?>',
					harga: '<?php echo number_format($harga_komoditas_all, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_1; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_1, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_2; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_2, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_3; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_3, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_4; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_4, 2, ',', '.'); ?>'
				}
			],
			xkey: 'y',
			ykeys: ['harga'],
			labels: ['Harga'],
			lineColors: ['#3c8dbc'],
			hideHover: 'auto'
		});
		var line = new Morris.Line({
			<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal, 'BMP013')->row();
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
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_1, 'BMP013')->row();
			if (empty($harga_1)) {
				$harga_sampel1_1 = 0;
				$harga_sampel2_1 = 0;
				$harga_sampel3_1 = 0;
			} else {
				$harga_sampel1_1 = $harga_1->h_sampel1;
				$harga_sampel2_1 = $harga_1->h_sampel2;
				$harga_sampel3_1 = $harga_1->h_sampel3;
			}
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1) / 3;
			if ($harga_komoditas_1 == 0) {
				$harga_komoditas_all_1 = 0;
			} else {
				$harga_komoditas_all_1 = $harga_komoditas_1 / $jumlah_pasar;
			}
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_2, 'BMP013')->row();
			if (empty($harga_2)) {
				$harga_sampel1_2 = 0;
				$harga_sampel2_2 = 0;
				$harga_sampel3_2 = 0;
			} else {
				$harga_sampel1_2 = $harga_2->h_sampel1;
				$harga_sampel2_2 = $harga_2->h_sampel2;
				$harga_sampel3_2 = $harga_2->h_sampel3;
			}
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2) / 3;
			if ($harga_komoditas_2 == 0) {
				$harga_komoditas_all_2 = 0;
			} else {
				$harga_komoditas_all_2 = $harga_komoditas_2 / $jumlah_pasar;
			}
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_3, 'BMP013')->row();
			if (empty($harga_3)) {
				$harga_sampel1_3 = 0;
				$harga_sampel2_3 = 0;
				$harga_sampel3_3 = 0;
			} else {
				$harga_sampel1_3 = $harga_3->h_sampel1;
				$harga_sampel2_3 = $harga_3->h_sampel2;
				$harga_sampel3_3 = $harga_3->h_sampel3;
			}
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3) / 3;
			if ($harga_komoditas_3 == 0) {
				$harga_komoditas_all_3 = 0;
			} else {
				$harga_komoditas_all_3 = $harga_komoditas_3 / $jumlah_pasar;
			}
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_4, 'BMP013')->row();
			if (empty($harga_4)) {
				$harga_sampel1_4 = 0;
				$harga_sampel2_4 = 0;
				$harga_sampel3_4 = 0;
			} else {
				$harga_sampel1_4 = $harga_4->h_sampel1;
				$harga_sampel2_4 = $harga_4->h_sampel2;
				$harga_sampel3_4 = $harga_4->h_sampel3;
			}
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4) / 3;
			if ($harga_komoditas_4 == 0) {
				$harga_komoditas_all_4 = 0;
			} else {
				$harga_komoditas_all_4 = $harga_komoditas_4 / $jumlah_pasar;
			}
			?>
			element: 'bawang-merah',
			resize: true,
			data: [{
					y: '<?php echo $tanggal; ?>',
					harga: '<?php echo number_format($harga_komoditas_all, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_1; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_1, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_2; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_2, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_3; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_3, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_4; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_4, 2, ',', '.'); ?>'
				}
			],
			xkey: 'y',
			ykeys: ['harga'],
			labels: ['Harga'],
			lineColors: ['#3c8dbc'],
			hideHover: 'auto'
		});
		var line = new Morris.Line({
			<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal, 'BMP014')->row();
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
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_1, 'BMP014')->row();
			if (empty($harga_1)) {
				$harga_sampel1_1 = 0;
				$harga_sampel2_1 = 0;
				$harga_sampel3_1 = 0;
			} else {
				$harga_sampel1_1 = $harga_1->h_sampel1;
				$harga_sampel2_1 = $harga_1->h_sampel2;
				$harga_sampel3_1 = $harga_1->h_sampel3;
			}
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1) / 3;
			if ($harga_komoditas_1 == 0) {
				$harga_komoditas_all_1 = 0;
			} else {
				$harga_komoditas_all_1 = $harga_komoditas_1 / $jumlah_pasar;
			}
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_2, 'BMP014')->row();
			if (empty($harga_2)) {
				$harga_sampel1_2 = 0;
				$harga_sampel2_2 = 0;
				$harga_sampel3_2 = 0;
			} else {
				$harga_sampel1_2 = $harga_2->h_sampel1;
				$harga_sampel2_2 = $harga_2->h_sampel2;
				$harga_sampel3_2 = $harga_2->h_sampel3;
			}
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2) / 3;
			if ($harga_komoditas_2 == 0) {
				$harga_komoditas_all_2 = 0;
			} else {
				$harga_komoditas_all_2 = $harga_komoditas_2 / $jumlah_pasar;
			}
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_3, 'BMP014')->row();
			if (empty($harga_3)) {
				$harga_sampel1_3 = 0;
				$harga_sampel2_3 = 0;
				$harga_sampel3_3 = 0;
			} else {
				$harga_sampel1_3 = $harga_3->h_sampel1;
				$harga_sampel2_3 = $harga_3->h_sampel2;
				$harga_sampel3_3 = $harga_3->h_sampel3;
			}
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3) / 3;
			if ($harga_komoditas_3 == 0) {
				$harga_komoditas_all_3 = 0;
			} else {
				$harga_komoditas_all_3 = $harga_komoditas_3 / $jumlah_pasar;
			}
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_4, 'BMP014')->row();
			if (empty($harga_4)) {
				$harga_sampel1_4 = 0;
				$harga_sampel2_4 = 0;
				$harga_sampel3_4 = 0;
			} else {
				$harga_sampel1_4 = $harga_4->h_sampel1;
				$harga_sampel2_4 = $harga_4->h_sampel2;
				$harga_sampel3_4 = $harga_4->h_sampel3;
			}
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4) / 3;
			if ($harga_komoditas_4 == 0) {
				$harga_komoditas_all_4 = 0;
			} else {
				$harga_komoditas_all_4 = $harga_komoditas_4 / $jumlah_pasar;
			}
			?>
			element: 'bawang-putih-bongol',
			resize: true,
			data: [{
					y: '<?php echo $tanggal; ?>',
					harga: '<?php echo number_format($harga_komoditas_all, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_1; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_1, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_2; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_2, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_3; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_3, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_4; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_4, 2, ',', '.'); ?>'
				}
			],
			xkey: 'y',
			ykeys: ['harga'],
			labels: ['Harga'],
			lineColors: ['#3c8dbc'],
			hideHover: 'auto'
		});
		var line = new Morris.Line({
			<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal, 'BMP015')->row();
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
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_1, 'BMP015')->row();
			if (empty($harga_1)) {
				$harga_sampel1_1 = 0;
				$harga_sampel2_1 = 0;
				$harga_sampel3_1 = 0;
			} else {
				$harga_sampel1_1 = $harga_1->h_sampel1;
				$harga_sampel2_1 = $harga_1->h_sampel2;
				$harga_sampel3_1 = $harga_1->h_sampel3;
			}
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1) / 3;
			if ($harga_komoditas_1 == 0) {
				$harga_komoditas_all_1 = 0;
			} else {
				$harga_komoditas_all_1 = $harga_komoditas_1 / $jumlah_pasar;
			}
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_2, 'BMP015')->row();
			if (empty($harga_2)) {
				$harga_sampel1_2 = 0;
				$harga_sampel2_2 = 0;
				$harga_sampel3_2 = 0;
			} else {
				$harga_sampel1_2 = $harga_2->h_sampel1;
				$harga_sampel2_2 = $harga_2->h_sampel2;
				$harga_sampel3_2 = $harga_2->h_sampel3;
			}
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2) / 3;
			if ($harga_komoditas_2 == 0) {
				$harga_komoditas_all_2 = 0;
			} else {
				$harga_komoditas_all_2 = $harga_komoditas_2 / $jumlah_pasar;
			}
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_3, 'BMP015')->row();
			if (empty($harga_3)) {
				$harga_sampel1_3 = 0;
				$harga_sampel2_3 = 0;
				$harga_sampel3_3 = 0;
			} else {
				$harga_sampel1_3 = $harga_3->h_sampel1;
				$harga_sampel2_3 = $harga_3->h_sampel2;
				$harga_sampel3_3 = $harga_3->h_sampel3;
			}
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3) / 3;
			if ($harga_komoditas_3 == 0) {
				$harga_komoditas_all_3 = 0;
			} else {
				$harga_komoditas_all_3 = $harga_komoditas_3 / $jumlah_pasar;
			}
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_4, 'BMP015')->row();
			if (empty($harga_4)) {
				$harga_sampel1_4 = 0;
				$harga_sampel2_4 = 0;
				$harga_sampel3_4 = 0;
			} else {
				$harga_sampel1_4 = $harga_4->h_sampel1;
				$harga_sampel2_4 = $harga_4->h_sampel2;
				$harga_sampel3_4 = $harga_4->h_sampel3;
			}
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4) / 3;
			if ($harga_komoditas_4 == 0) {
				$harga_komoditas_all_4 = 0;
			} else {
				$harga_komoditas_all_4 = $harga_komoditas_4 / $jumlah_pasar;
			}
			?>
			element: 'kacang-kedelai',
			resize: true,
			data: [{
					y: '<?php echo $tanggal; ?>',
					harga: '<?php echo number_format($harga_komoditas_all, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_1; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_1, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_2; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_2, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_3; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_3, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_4; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_4, 2, ',', '.'); ?>'
				}
			],
			xkey: 'y',
			ykeys: ['harga'],
			labels: ['Harga'],
			lineColors: ['#3c8dbc'],
			hideHover: 'auto'
		});
		var line = new Morris.Line({
			<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal, 'BMP016')->row();
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
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_1, 'BMP016')->row();
			if (empty($harga_1)) {
				$harga_sampel1_1 = 0;
				$harga_sampel2_1 = 0;
				$harga_sampel3_1 = 0;
			} else {
				$harga_sampel1_1 = $harga_1->h_sampel1;
				$harga_sampel2_1 = $harga_1->h_sampel2;
				$harga_sampel3_1 = $harga_1->h_sampel3;
			}
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1) / 3;
			if ($harga_komoditas_1 == 0) {
				$harga_komoditas_all_1 = 0;
			} else {
				$harga_komoditas_all_1 = $harga_komoditas_1 / $jumlah_pasar;
			}
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_2, 'BMP016')->row();
			if (empty($harga_2)) {
				$harga_sampel1_2 = 0;
				$harga_sampel2_2 = 0;
				$harga_sampel3_2 = 0;
			} else {
				$harga_sampel1_2 = $harga_2->h_sampel1;
				$harga_sampel2_2 = $harga_2->h_sampel2;
				$harga_sampel3_2 = $harga_2->h_sampel3;
			}
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2) / 3;
			if ($harga_komoditas_2 == 0) {
				$harga_komoditas_all_2 = 0;
			} else {
				$harga_komoditas_all_2 = $harga_komoditas_2 / $jumlah_pasar;
			}
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_3, 'BMP016')->row();
			if (empty($harga_3)) {
				$harga_sampel1_3 = 0;
				$harga_sampel2_3 = 0;
				$harga_sampel3_3 = 0;
			} else {
				$harga_sampel1_3 = $harga_3->h_sampel1;
				$harga_sampel2_3 = $harga_3->h_sampel2;
				$harga_sampel3_3 = $harga_3->h_sampel3;
			}
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3) / 3;
			if ($harga_komoditas_3 == 0) {
				$harga_komoditas_all_3 = 0;
			} else {
				$harga_komoditas_all_3 = $harga_komoditas_3 / $jumlah_pasar;
			}
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas_all($tanggal_4, 'BMP016')->row();
			if (empty($harga_4)) {
				$harga_sampel1_4 = 0;
				$harga_sampel2_4 = 0;
				$harga_sampel3_4 = 0;
			} else {
				$harga_sampel1_4 = $harga_4->h_sampel1;
				$harga_sampel2_4 = $harga_4->h_sampel2;
				$harga_sampel3_4 = $harga_4->h_sampel3;
			}
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4) / 3;
			if ($harga_komoditas_4 == 0) {
				$harga_komoditas_all_4 = 0;
			} else {
				$harga_komoditas_all_4 = $harga_komoditas_4 / $jumlah_pasar;
			}
			?>
			element: 'jagung',
			resize: true,
			data: [{
					y: '<?php echo $tanggal; ?>',
					harga: '<?php echo number_format($harga_komoditas_all, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_1; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_1, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_2; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_2, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_3; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_3, 2, ',', '.'); ?>'
				},
				{
					y: '<?php echo $tanggal_4; ?>',
					harga: '<?php echo number_format($harga_komoditas_all_4, 2, ',', '.'); ?>'
				}
			],
			xkey: 'y',
			ykeys: ['harga'],
			labels: ['Harga'],
			lineColors: ['#3c8dbc'],
			hideHover: 'auto'
		});
	});
</script>