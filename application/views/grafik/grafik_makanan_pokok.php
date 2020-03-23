<div class="content-wrapper">
  <section class="content">
    <div class="box box-info">
      <div class="box-header">
        <h4 style="text-align:center"><b>GRAFIK BAHAN MAKANAN POKOK</b></h4><hr>
      </div>
      <div class="box-body">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<center><h3 class="label label-success">Beras Premium</label></center>
				<div class="chart" id="beras-premium" style="height: 100%; width: 100%;"></div>
			</div>
			<div class="col-lg-6 col-md-6">
				<center><h3 class="label label-success">Beras Medium</label></center>
				<div class="chart" id="beras-medium" style="height: 100%; width: 100%;"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<center><h3 class="label label-success">Beras Termurah</label></center>
				<div class="chart" id="beras-termurah" style="height: 100%; width: 100%;"></div>
			</div>
			<div class="col-lg-6 col-md-6">
				<center><h3 class="label label-success">Minyak Goreng Curah</label></center>
				<div class="chart" id="minyak-goreng-curah" style="height: 100%; width: 100%;"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<center><h3 class="label label-success">Minyak Goreng Kemasan</label></center>
				<div class="chart" id="minyak-goreng-kemasan" style="height: 100%; width: 100%;"></div>
			</div>
			<div class="col-lg-6 col-md-6">
				<center><h3 class="label label-success">Gula Pasir</label></center>
				<div class="chart" id="gula-pasir" style="height: 100%; width: 100%;"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<center><h3 class="label label-success">Terigu</label></center>
				<div class="chart" id="terigu" style="height: 100%; width: 100%;"></div>
			</div>
			<div class="col-lg-6 col-md-6">
				<center><h3 class="label label-success">Daging Sapi</label></center>
				<div class="chart" id="daging-sapi" style="height: 100%; width: 100%;"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<center><h3 class="label label-success">Daging Ayam</label></center>
				<div class="chart" id="daging-ayam" style="height: 100%; width: 100%;"></div>
			</div>
			<div class="col-lg-6 col-md-6">
				<center><h3 class="label label-success">Daging Ayam Ras</label></center>
				<div class="chart" id="daging-ayam-ras" style="height: 100%; width: 100%;"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<center><h3 class="label label-success">Cabe Keriting</label></center>
				<div class="chart" id="cabe-keriting" style="height: 100%; width: 100%;"></div>
			</div>
			<div class="col-lg-6 col-md-6">
				<center><h3 class="label label-success">Cabe Rawit</label></center>
				<div class="chart" id="cabe-rawit" style="height: 100%; width: 100%;"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<center><h3 class="label label-success">Bawang Merah</label></center>
				<div class="chart" id="bawang-merah" style="height: 100%; width: 100%;"></div>
			</div>
			<div class="col-lg-6 col-md-6">
				<center><h3 class="label label-success">Bawang Putih (Bongol)</label></center>
				<div class="chart" id="bawang-putih-bongol" style="height: 100%; width: 100%;"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<center><h3 class="label label-success">Kacang Kedelai</label></center>
				<div class="chart" id="kacang-kedelai" style="height: 100%; width: 100%;"></div>
			</div>
			<div class="col-lg-6 col-md-6">
				<center><h3 class="label label-success">Jagung</label></center>
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
  $(function () {
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
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal, $pasar, 'BMP001')->row();
			if(empty($harga)){ $harga_sampel1 = 0; $harga_sampel2=0; $harga_sampel3=0; }else{ $harga_sampel1=$harga->harga_sampel1; $harga_sampel2 = $harga->harga_sampel2; $harga_sampel3 = $harga->harga_sampel3; }
			$harga_komoditas = ($harga_sampel1 + $harga_sampel2 + $harga_sampel3)/3;
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_1, $pasar, 'BMP001')->row();
			if(empty($harga_1)){ $harga_sampel1_1 = 0; $harga_sampel2_1=0; $harga_sampel3_1=0; }else{ $harga_sampel1_1=$harga_1->harga_sampel1; $harga_sampel2_1 = $harga_1->harga_sampel2; $harga_sampel3_1 = $harga_1->harga_sampel3; }
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1)/3;
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_2, $pasar, 'BMP001')->row();
			if(empty($harga_2)){ $harga_sampel1_2 = 0; $harga_sampel2_2=0; $harga_sampel3_2=0; }else{ $harga_sampel1_2=$harga_2->harga_sampel1; $harga_sampel2_2 = $harga_2->harga_sampel2; $harga_sampel3_2 = $harga_2->harga_sampel3; }
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2)/3;
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_3, $pasar, 'BMP001')->row();
			if(empty($harga_3)){ $harga_sampel1_3 = 0; $harga_sampel2_3=0; $harga_sampel3_3=0; }else{ $harga_sampel1_3=$harga_3->harga_sampel1; $harga_sampel2_3 = $harga_3->harga_sampel2; $harga_sampel3_3 = $harga_3->harga_sampel3; }
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3)/3;
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_4, $pasar, 'BMP001')->row();
			if(empty($harga_4)){ $harga_sampel1_4 = 0; $harga_sampel2_4=0; $harga_sampel3_4=0; }else{ $harga_sampel1_4=$harga_4->harga_sampel1; $harga_sampel2_4 = $harga_4->harga_sampel2; $harga_sampel3_4 = $harga_4->harga_sampel3; }
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4)/3;
		?>
      element: 'beras-premium',
      resize: true,
      data: [
        {y: '<?php echo $tanggal; ?>', harga: '<?php echo $harga_komoditas; ?>'},
        {y: '<?php echo $tanggal_1; ?>', harga: '<?php echo $harga_komoditas_1; ?>'},
        {y: '<?php echo $tanggal_2; ?>', harga: '<?php echo $harga_komoditas_2; ?>'},
        {y: '<?php echo $tanggal_3; ?>', harga: '<?php echo $harga_komoditas_3; ?>'},
        {y: '<?php echo $tanggal_4; ?>', harga: '<?php echo $harga_komoditas_4; ?>'}
      ],
      xkey: 'y',
      ykeys: ['harga'],
      labels: ['Harga'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });
	var line = new Morris.Line({
		<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal, $pasar, 'BMP002')->row();
			if(empty($harga)){ $harga_sampel1 = 0; $harga_sampel2=0; $harga_sampel3=0; }else{ $harga_sampel1=$harga->harga_sampel1; $harga_sampel2 = $harga->harga_sampel2; $harga_sampel3 = $harga->harga_sampel3; }
			$harga_komoditas = ($harga_sampel1 + $harga_sampel2 + $harga_sampel3)/3;
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_1, $pasar, 'BMP002')->row();
			if(empty($harga_1)){ $harga_sampel1_1 = 0; $harga_sampel2_1=0; $harga_sampel3_1=0; }else{ $harga_sampel1_1=$harga_1->harga_sampel1; $harga_sampel2_1 = $harga_1->harga_sampel2; $harga_sampel3_1 = $harga_1->harga_sampel3; }
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1)/3;
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_2, $pasar, 'BMP002')->row();
			if(empty($harga_2)){ $harga_sampel1_2 = 0; $harga_sampel2_2=0; $harga_sampel3_2=0; }else{ $harga_sampel1_2=$harga_2->harga_sampel1; $harga_sampel2_2 = $harga_2->harga_sampel2; $harga_sampel3_2 = $harga_2->harga_sampel3; }
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2)/3;
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_3, $pasar, 'BMP002')->row();
			if(empty($harga_3)){ $harga_sampel1_3 = 0; $harga_sampel2_3=0; $harga_sampel3_3=0; }else{ $harga_sampel1_3=$harga_3->harga_sampel1; $harga_sampel2_3 = $harga_3->harga_sampel2; $harga_sampel3_3 = $harga_3->harga_sampel3; }
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3)/3;
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_4, $pasar, 'BMP002')->row();
			if(empty($harga_4)){ $harga_sampel1_4 = 0; $harga_sampel2_4=0; $harga_sampel3_4=0; }else{ $harga_sampel1_4=$harga_4->harga_sampel1; $harga_sampel2_4 = $harga_4->harga_sampel2; $harga_sampel3_4 = $harga_4->harga_sampel3; }
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4)/3;
		?>
      element: 'beras-medium',
      resize: true,
      data: [
        {y: '<?php echo $tanggal; ?>', harga: '<?php echo $harga_komoditas; ?>'},
        {y: '<?php echo $tanggal_1; ?>', harga: '<?php echo $harga_komoditas_1; ?>'},
        {y: '<?php echo $tanggal_2; ?>', harga: '<?php echo $harga_komoditas_2; ?>'},
        {y: '<?php echo $tanggal_3; ?>', harga: '<?php echo $harga_komoditas_3; ?>'},
        {y: '<?php echo $tanggal_4; ?>', harga: '<?php echo $harga_komoditas_4; ?>'}
      ],
      xkey: 'y',
      ykeys: ['harga'],
      labels: ['Harga'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });
	var line = new Morris.Line({
		<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal, $pasar, 'BMP003')->row();
			if(empty($harga)){ $harga_sampel1 = 0; $harga_sampel2=0; $harga_sampel3=0; }else{ $harga_sampel1=$harga->harga_sampel1; $harga_sampel2 = $harga->harga_sampel2; $harga_sampel3 = $harga->harga_sampel3; }
			$harga_komoditas = ($harga_sampel1 + $harga_sampel2 + $harga_sampel3)/3;
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_1, $pasar, 'BMP003')->row();
			if(empty($harga_1)){ $harga_sampel1_1 = 0; $harga_sampel2_1=0; $harga_sampel3_1=0; }else{ $harga_sampel1_1=$harga_1->harga_sampel1; $harga_sampel2_1 = $harga_1->harga_sampel2; $harga_sampel3_1 = $harga_1->harga_sampel3; }
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1)/3;
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_2, $pasar, 'BMP003')->row();
			if(empty($harga_2)){ $harga_sampel1_2 = 0; $harga_sampel2_2=0; $harga_sampel3_2=0; }else{ $harga_sampel1_2=$harga_2->harga_sampel1; $harga_sampel2_2 = $harga_2->harga_sampel2; $harga_sampel3_2 = $harga_2->harga_sampel3; }
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2)/3;
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_3, $pasar, 'BMP003')->row();
			if(empty($harga_3)){ $harga_sampel1_3 = 0; $harga_sampel2_3=0; $harga_sampel3_3=0; }else{ $harga_sampel1_3=$harga_3->harga_sampel1; $harga_sampel2_3 = $harga_3->harga_sampel2; $harga_sampel3_3 = $harga_3->harga_sampel3; }
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3)/3;
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_4, $pasar, 'BMP003')->row();
			if(empty($harga_4)){ $harga_sampel1_4 = 0; $harga_sampel2_4=0; $harga_sampel3_4=0; }else{ $harga_sampel1_4=$harga_4->harga_sampel1; $harga_sampel2_4 = $harga_4->harga_sampel2; $harga_sampel3_4 = $harga_4->harga_sampel3; }
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4)/3;
		?>
      element: 'beras-termurah',
      resize: true,
      data: [
        {y: '<?php echo $tanggal; ?>', harga: '<?php echo $harga_komoditas; ?>'},
        {y: '<?php echo $tanggal_1; ?>', harga: '<?php echo $harga_komoditas_1; ?>'},
        {y: '<?php echo $tanggal_2; ?>', harga: '<?php echo $harga_komoditas_2; ?>'},
        {y: '<?php echo $tanggal_3; ?>', harga: '<?php echo $harga_komoditas_3; ?>'},
        {y: '<?php echo $tanggal_4; ?>', harga: '<?php echo $harga_komoditas_4; ?>'}
      ],
      xkey: 'y',
      ykeys: ['harga'],
      labels: ['Harga'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });
	var line = new Morris.Line({
		<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal, $pasar, 'BMP004')->row();
			if(empty($harga)){ $harga_sampel1 = 0; $harga_sampel2=0; $harga_sampel3=0; }else{ $harga_sampel1=$harga->harga_sampel1; $harga_sampel2 = $harga->harga_sampel2; $harga_sampel3 = $harga->harga_sampel3; }
			$harga_komoditas = ($harga_sampel1 + $harga_sampel2 + $harga_sampel3)/3;
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_1, $pasar, 'BMP004')->row();
			if(empty($harga_1)){ $harga_sampel1_1 = 0; $harga_sampel2_1=0; $harga_sampel3_1=0; }else{ $harga_sampel1_1=$harga_1->harga_sampel1; $harga_sampel2_1 = $harga_1->harga_sampel2; $harga_sampel3_1 = $harga_1->harga_sampel3; }
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1)/3;
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_2, $pasar, 'BMP004')->row();
			if(empty($harga_2)){ $harga_sampel1_2 = 0; $harga_sampel2_2=0; $harga_sampel3_2=0; }else{ $harga_sampel1_2=$harga_2->harga_sampel1; $harga_sampel2_2 = $harga_2->harga_sampel2; $harga_sampel3_2 = $harga_2->harga_sampel3; }
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2)/3;
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_3, $pasar, 'BMP004')->row();
			if(empty($harga_3)){ $harga_sampel1_3 = 0; $harga_sampel2_3=0; $harga_sampel3_3=0; }else{ $harga_sampel1_3=$harga_3->harga_sampel1; $harga_sampel2_3 = $harga_3->harga_sampel2; $harga_sampel3_3 = $harga_3->harga_sampel3; }
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3)/3;
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_4, $pasar, 'BMP004')->row();
			if(empty($harga_4)){ $harga_sampel1_4 = 0; $harga_sampel2_4=0; $harga_sampel3_4=0; }else{ $harga_sampel1_4=$harga_4->harga_sampel1; $harga_sampel2_4 = $harga_4->harga_sampel2; $harga_sampel3_4 = $harga_4->harga_sampel3; }
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4)/3;
		?>
      element: 'minyak-goreng-curah',
      resize: true,
      data: [
        {y: '<?php echo $tanggal; ?>', harga: '<?php echo $harga_komoditas; ?>'},
        {y: '<?php echo $tanggal_1; ?>', harga: '<?php echo $harga_komoditas_1; ?>'},
        {y: '<?php echo $tanggal_2; ?>', harga: '<?php echo $harga_komoditas_2; ?>'},
        {y: '<?php echo $tanggal_3; ?>', harga: '<?php echo $harga_komoditas_3; ?>'},
        {y: '<?php echo $tanggal_4; ?>', harga: '<?php echo $harga_komoditas_4; ?>'}
      ],
      xkey: 'y',
      ykeys: ['harga'],
      labels: ['Harga'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });
	var line = new Morris.Line({
		<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal, $pasar, 'BMP005')->row();
			if(empty($harga)){ $harga_sampel1 = 0; $harga_sampel2=0; $harga_sampel3=0; }else{ $harga_sampel1=$harga->harga_sampel1; $harga_sampel2 = $harga->harga_sampel2; $harga_sampel3 = $harga->harga_sampel3; }
			$harga_komoditas = ($harga_sampel1 + $harga_sampel2 + $harga_sampel3)/3;
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_1, $pasar, 'BMP005')->row();
			if(empty($harga_1)){ $harga_sampel1_1 = 0; $harga_sampel2_1=0; $harga_sampel3_1=0; }else{ $harga_sampel1_1=$harga_1->harga_sampel1; $harga_sampel2_1 = $harga_1->harga_sampel2; $harga_sampel3_1 = $harga_1->harga_sampel3; }
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1)/3;
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_2, $pasar, 'BMP005')->row();
			if(empty($harga_2)){ $harga_sampel1_2 = 0; $harga_sampel2_2=0; $harga_sampel3_2=0; }else{ $harga_sampel1_2=$harga_2->harga_sampel1; $harga_sampel2_2 = $harga_2->harga_sampel2; $harga_sampel3_2 = $harga_2->harga_sampel3; }
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2)/3;
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_3, $pasar, 'BMP005')->row();
			if(empty($harga_3)){ $harga_sampel1_3 = 0; $harga_sampel2_3=0; $harga_sampel3_3=0; }else{ $harga_sampel1_3=$harga_3->harga_sampel1; $harga_sampel2_3 = $harga_3->harga_sampel2; $harga_sampel3_3 = $harga_3->harga_sampel3; }
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3)/3;
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_4, $pasar, 'BMP005')->row();
			if(empty($harga_4)){ $harga_sampel1_4 = 0; $harga_sampel2_4=0; $harga_sampel3_4=0; }else{ $harga_sampel1_4=$harga_4->harga_sampel1; $harga_sampel2_4 = $harga_4->harga_sampel2; $harga_sampel3_4 = $harga_4->harga_sampel3; }
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4)/3;
		?>
      element: 'minyak-goreng-kemasan',
      resize: true,
      data: [
        {y: '<?php echo $tanggal; ?>', harga: '<?php echo $harga_komoditas; ?>'},
        {y: '<?php echo $tanggal_1; ?>', harga: '<?php echo $harga_komoditas_1; ?>'},
        {y: '<?php echo $tanggal_2; ?>', harga: '<?php echo $harga_komoditas_2; ?>'},
        {y: '<?php echo $tanggal_3; ?>', harga: '<?php echo $harga_komoditas_3; ?>'},
        {y: '<?php echo $tanggal_4; ?>', harga: '<?php echo $harga_komoditas_4; ?>'}
      ],
      xkey: 'y',
      ykeys: ['harga'],
      labels: ['Harga'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });
	var line = new Morris.Line({
		<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal, $pasar, 'BMP006')->row();
			if(empty($harga)){ $harga_sampel1 = 0; $harga_sampel2=0; $harga_sampel3=0; }else{ $harga_sampel1=$harga->harga_sampel1; $harga_sampel2 = $harga->harga_sampel2; $harga_sampel3 = $harga->harga_sampel3; }
			$harga_komoditas = ($harga_sampel1 + $harga_sampel2 + $harga_sampel3)/3;
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_1, $pasar, 'BMP006')->row();
			if(empty($harga_1)){ $harga_sampel1_1 = 0; $harga_sampel2_1=0; $harga_sampel3_1=0; }else{ $harga_sampel1_1=$harga_1->harga_sampel1; $harga_sampel2_1 = $harga_1->harga_sampel2; $harga_sampel3_1 = $harga_1->harga_sampel3; }
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1)/3;
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_2, $pasar, 'BMP006')->row();
			if(empty($harga_2)){ $harga_sampel1_2 = 0; $harga_sampel2_2=0; $harga_sampel3_2=0; }else{ $harga_sampel1_2=$harga_2->harga_sampel1; $harga_sampel2_2 = $harga_2->harga_sampel2; $harga_sampel3_2 = $harga_2->harga_sampel3; }
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2)/3;
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_3, $pasar, 'BMP006')->row();
			if(empty($harga_3)){ $harga_sampel1_3 = 0; $harga_sampel2_3=0; $harga_sampel3_3=0; }else{ $harga_sampel1_3=$harga_3->harga_sampel1; $harga_sampel2_3 = $harga_3->harga_sampel2; $harga_sampel3_3 = $harga_3->harga_sampel3; }
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3)/3;
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_4, $pasar, 'BMP006')->row();
			if(empty($harga_4)){ $harga_sampel1_4 = 0; $harga_sampel2_4=0; $harga_sampel3_4=0; }else{ $harga_sampel1_4=$harga_4->harga_sampel1; $harga_sampel2_4 = $harga_4->harga_sampel2; $harga_sampel3_4 = $harga_4->harga_sampel3; }
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4)/3;
		?>
      element: 'gula-pasir',
      resize: true,
      data: [
        {y: '<?php echo $tanggal; ?>', harga: '<?php echo $harga_komoditas; ?>'},
        {y: '<?php echo $tanggal_1; ?>', harga: '<?php echo $harga_komoditas_1; ?>'},
        {y: '<?php echo $tanggal_2; ?>', harga: '<?php echo $harga_komoditas_2; ?>'},
        {y: '<?php echo $tanggal_3; ?>', harga: '<?php echo $harga_komoditas_3; ?>'},
        {y: '<?php echo $tanggal_4; ?>', harga: '<?php echo $harga_komoditas_4; ?>'}
      ],
      xkey: 'y',
      ykeys: ['harga'],
      labels: ['Harga'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });
	var line = new Morris.Line({
		<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal, $pasar, 'BMP007')->row();
			if(empty($harga)){ $harga_sampel1 = 0; $harga_sampel2=0; $harga_sampel3=0; }else{ $harga_sampel1=$harga->harga_sampel1; $harga_sampel2 = $harga->harga_sampel2; $harga_sampel3 = $harga->harga_sampel3; }
			$harga_komoditas = ($harga_sampel1 + $harga_sampel2 + $harga_sampel3)/3;
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_1, $pasar, 'BMP007')->row();
			if(empty($harga_1)){ $harga_sampel1_1 = 0; $harga_sampel2_1=0; $harga_sampel3_1=0; }else{ $harga_sampel1_1=$harga_1->harga_sampel1; $harga_sampel2_1 = $harga_1->harga_sampel2; $harga_sampel3_1 = $harga_1->harga_sampel3; }
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1)/3;
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_2, $pasar, 'BMP007')->row();
			if(empty($harga_2)){ $harga_sampel1_2 = 0; $harga_sampel2_2=0; $harga_sampel3_2=0; }else{ $harga_sampel1_2=$harga_2->harga_sampel1; $harga_sampel2_2 = $harga_2->harga_sampel2; $harga_sampel3_2 = $harga_2->harga_sampel3; }
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2)/3;
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_3, $pasar, 'BMP007')->row();
			if(empty($harga_3)){ $harga_sampel1_3 = 0; $harga_sampel2_3=0; $harga_sampel3_3=0; }else{ $harga_sampel1_3=$harga_3->harga_sampel1; $harga_sampel2_3 = $harga_3->harga_sampel2; $harga_sampel3_3 = $harga_3->harga_sampel3; }
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3)/3;
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_4, $pasar, 'BMP007')->row();
			if(empty($harga_4)){ $harga_sampel1_4 = 0; $harga_sampel2_4=0; $harga_sampel3_4=0; }else{ $harga_sampel1_4=$harga_4->harga_sampel1; $harga_sampel2_4 = $harga_4->harga_sampel2; $harga_sampel3_4 = $harga_4->harga_sampel3; }
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4)/3;
		?>
      element: 'terigu',
      resize: true,
      data: [
        {y: '<?php echo $tanggal; ?>', harga: '<?php echo $harga_komoditas; ?>'},
        {y: '<?php echo $tanggal_1; ?>', harga: '<?php echo $harga_komoditas_1; ?>'},
        {y: '<?php echo $tanggal_2; ?>', harga: '<?php echo $harga_komoditas_2; ?>'},
        {y: '<?php echo $tanggal_3; ?>', harga: '<?php echo $harga_komoditas_3; ?>'},
        {y: '<?php echo $tanggal_4; ?>', harga: '<?php echo $harga_komoditas_4; ?>'}
      ],
      xkey: 'y',
      ykeys: ['harga'],
      labels: ['Harga'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });
	var line = new Morris.Line({
		<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal, $pasar, 'BMP008')->row();
			if(empty($harga)){ $harga_sampel1 = 0; $harga_sampel2=0; $harga_sampel3=0; }else{ $harga_sampel1=$harga->harga_sampel1; $harga_sampel2 = $harga->harga_sampel2; $harga_sampel3 = $harga->harga_sampel3; }
			$harga_komoditas = ($harga_sampel1 + $harga_sampel2 + $harga_sampel3)/3;
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_1, $pasar, 'BMP008')->row();
			if(empty($harga_1)){ $harga_sampel1_1 = 0; $harga_sampel2_1=0; $harga_sampel3_1=0; }else{ $harga_sampel1_1=$harga_1->harga_sampel1; $harga_sampel2_1 = $harga_1->harga_sampel2; $harga_sampel3_1 = $harga_1->harga_sampel3; }
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1)/3;
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_2, $pasar, 'BMP008')->row();
			if(empty($harga_2)){ $harga_sampel1_2 = 0; $harga_sampel2_2=0; $harga_sampel3_2=0; }else{ $harga_sampel1_2=$harga_2->harga_sampel1; $harga_sampel2_2 = $harga_2->harga_sampel2; $harga_sampel3_2 = $harga_2->harga_sampel3; }
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2)/3;
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_3, $pasar, 'BMP008')->row();
			if(empty($harga_3)){ $harga_sampel1_3 = 0; $harga_sampel2_3=0; $harga_sampel3_3=0; }else{ $harga_sampel1_3=$harga_3->harga_sampel1; $harga_sampel2_3 = $harga_3->harga_sampel2; $harga_sampel3_3 = $harga_3->harga_sampel3; }
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3)/3;
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_4, $pasar, 'BMP008')->row();
			if(empty($harga_4)){ $harga_sampel1_4 = 0; $harga_sampel2_4=0; $harga_sampel3_4=0; }else{ $harga_sampel1_4=$harga_4->harga_sampel1; $harga_sampel2_4 = $harga_4->harga_sampel2; $harga_sampel3_4 = $harga_4->harga_sampel3; }
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4)/3;
		?>
      element: 'daging-sapi',
      resize: true,
      data: [
        {y: '<?php echo $tanggal; ?>', harga: '<?php echo $harga_komoditas; ?>'},
        {y: '<?php echo $tanggal_1; ?>', harga: '<?php echo $harga_komoditas_1; ?>'},
        {y: '<?php echo $tanggal_2; ?>', harga: '<?php echo $harga_komoditas_2; ?>'},
        {y: '<?php echo $tanggal_3; ?>', harga: '<?php echo $harga_komoditas_3; ?>'},
        {y: '<?php echo $tanggal_4; ?>', harga: '<?php echo $harga_komoditas_4; ?>'}
      ],
      xkey: 'y',
      ykeys: ['harga'],
      labels: ['Harga'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });
	var line = new Morris.Line({
		<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal, $pasar, 'BMP009')->row();
			if(empty($harga)){ $harga_sampel1 = 0; $harga_sampel2=0; $harga_sampel3=0; }else{ $harga_sampel1=$harga->harga_sampel1; $harga_sampel2 = $harga->harga_sampel2; $harga_sampel3 = $harga->harga_sampel3; }
			$harga_komoditas = ($harga_sampel1 + $harga_sampel2 + $harga_sampel3)/3;
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_1, $pasar, 'BMP009')->row();
			if(empty($harga_1)){ $harga_sampel1_1 = 0; $harga_sampel2_1=0; $harga_sampel3_1=0; }else{ $harga_sampel1_1=$harga_1->harga_sampel1; $harga_sampel2_1 = $harga_1->harga_sampel2; $harga_sampel3_1 = $harga_1->harga_sampel3; }
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1)/3;
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_2, $pasar, 'BMP009')->row();
			if(empty($harga_2)){ $harga_sampel1_2 = 0; $harga_sampel2_2=0; $harga_sampel3_2=0; }else{ $harga_sampel1_2=$harga_2->harga_sampel1; $harga_sampel2_2 = $harga_2->harga_sampel2; $harga_sampel3_2 = $harga_2->harga_sampel3; }
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2)/3;
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_3, $pasar, 'BMP009')->row();
			if(empty($harga_3)){ $harga_sampel1_3 = 0; $harga_sampel2_3=0; $harga_sampel3_3=0; }else{ $harga_sampel1_3=$harga_3->harga_sampel1; $harga_sampel2_3 = $harga_3->harga_sampel2; $harga_sampel3_3 = $harga_3->harga_sampel3; }
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3)/3;
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_4, $pasar, 'BMP009')->row();
			if(empty($harga_4)){ $harga_sampel1_4 = 0; $harga_sampel2_4=0; $harga_sampel3_4=0; }else{ $harga_sampel1_4=$harga_4->harga_sampel1; $harga_sampel2_4 = $harga_4->harga_sampel2; $harga_sampel3_4 = $harga_4->harga_sampel3; }
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4)/3;
		?>
      element: 'daging-ayam',
      resize: true,
      data: [
        {y: '<?php echo $tanggal; ?>', harga: '<?php echo $harga_komoditas; ?>'},
        {y: '<?php echo $tanggal_1; ?>', harga: '<?php echo $harga_komoditas_1; ?>'},
        {y: '<?php echo $tanggal_2; ?>', harga: '<?php echo $harga_komoditas_2; ?>'},
        {y: '<?php echo $tanggal_3; ?>', harga: '<?php echo $harga_komoditas_3; ?>'},
        {y: '<?php echo $tanggal_4; ?>', harga: '<?php echo $harga_komoditas_4; ?>'}
      ],
      xkey: 'y',
      ykeys: ['harga'],
      labels: ['Harga'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });
	var line = new Morris.Line({
		<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal, $pasar, 'BMP010')->row();
			if(empty($harga)){ $harga_sampel1 = 0; $harga_sampel2=0; $harga_sampel3=0; }else{ $harga_sampel1=$harga->harga_sampel1; $harga_sampel2 = $harga->harga_sampel2; $harga_sampel3 = $harga->harga_sampel3; }
			$harga_komoditas = ($harga_sampel1 + $harga_sampel2 + $harga_sampel3)/3;
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_1, $pasar, 'BMP010')->row();
			if(empty($harga_1)){ $harga_sampel1_1 = 0; $harga_sampel2_1=0; $harga_sampel3_1=0; }else{ $harga_sampel1_1=$harga_1->harga_sampel1; $harga_sampel2_1 = $harga_1->harga_sampel2; $harga_sampel3_1 = $harga_1->harga_sampel3; }
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1)/3;
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_2, $pasar, 'BMP010')->row();
			if(empty($harga_2)){ $harga_sampel1_2 = 0; $harga_sampel2_2=0; $harga_sampel3_2=0; }else{ $harga_sampel1_2=$harga_2->harga_sampel1; $harga_sampel2_2 = $harga_2->harga_sampel2; $harga_sampel3_2 = $harga_2->harga_sampel3; }
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2)/3;
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_3, $pasar, 'BMP010')->row();
			if(empty($harga_3)){ $harga_sampel1_3 = 0; $harga_sampel2_3=0; $harga_sampel3_3=0; }else{ $harga_sampel1_3=$harga_3->harga_sampel1; $harga_sampel2_3 = $harga_3->harga_sampel2; $harga_sampel3_3 = $harga_3->harga_sampel3; }
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3)/3;
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_4, $pasar, 'BMP010')->row();
			if(empty($harga_4)){ $harga_sampel1_4 = 0; $harga_sampel2_4=0; $harga_sampel3_4=0; }else{ $harga_sampel1_4=$harga_4->harga_sampel1; $harga_sampel2_4 = $harga_4->harga_sampel2; $harga_sampel3_4 = $harga_4->harga_sampel3; }
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4)/3;
		?>
      element: 'daging-ayam-ras',
      resize: true,
      data: [
        {y: '<?php echo $tanggal; ?>', harga: '<?php echo $harga_komoditas; ?>'},
        {y: '<?php echo $tanggal_1; ?>', harga: '<?php echo $harga_komoditas_1; ?>'},
        {y: '<?php echo $tanggal_2; ?>', harga: '<?php echo $harga_komoditas_2; ?>'},
        {y: '<?php echo $tanggal_3; ?>', harga: '<?php echo $harga_komoditas_3; ?>'},
        {y: '<?php echo $tanggal_4; ?>', harga: '<?php echo $harga_komoditas_4; ?>'}
      ],
      xkey: 'y',
      ykeys: ['harga'],
      labels: ['Harga'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });
	var line = new Morris.Line({
		<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal, $pasar, 'BMP011')->row();
			if(empty($harga)){ $harga_sampel1 = 0; $harga_sampel2=0; $harga_sampel3=0; }else{ $harga_sampel1=$harga->harga_sampel1; $harga_sampel2 = $harga->harga_sampel2; $harga_sampel3 = $harga->harga_sampel3; }
			$harga_komoditas = ($harga_sampel1 + $harga_sampel2 + $harga_sampel3)/3;
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_1, $pasar, 'BMP011')->row();
			if(empty($harga_1)){ $harga_sampel1_1 = 0; $harga_sampel2_1=0; $harga_sampel3_1=0; }else{ $harga_sampel1_1=$harga_1->harga_sampel1; $harga_sampel2_1 = $harga_1->harga_sampel2; $harga_sampel3_1 = $harga_1->harga_sampel3; }
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1)/3;
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_2, $pasar, 'BMP011')->row();
			if(empty($harga_2)){ $harga_sampel1_2 = 0; $harga_sampel2_2=0; $harga_sampel3_2=0; }else{ $harga_sampel1_2=$harga_2->harga_sampel1; $harga_sampel2_2 = $harga_2->harga_sampel2; $harga_sampel3_2 = $harga_2->harga_sampel3; }
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2)/3;
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_3, $pasar, 'BMP011')->row();
			if(empty($harga_3)){ $harga_sampel1_3 = 0; $harga_sampel2_3=0; $harga_sampel3_3=0; }else{ $harga_sampel1_3=$harga_3->harga_sampel1; $harga_sampel2_3 = $harga_3->harga_sampel2; $harga_sampel3_3 = $harga_3->harga_sampel3; }
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3)/3;
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_4, $pasar, 'BMP011')->row();
			if(empty($harga_4)){ $harga_sampel1_4 = 0; $harga_sampel2_4=0; $harga_sampel3_4=0; }else{ $harga_sampel1_4=$harga_4->harga_sampel1; $harga_sampel2_4 = $harga_4->harga_sampel2; $harga_sampel3_4 = $harga_4->harga_sampel3; }
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4)/3;
		?>
      element: 'cabe-keriting',
      resize: true,
      data: [
        {y: '<?php echo $tanggal; ?>', harga: '<?php echo $harga_komoditas; ?>'},
        {y: '<?php echo $tanggal_1; ?>', harga: '<?php echo $harga_komoditas_1; ?>'},
        {y: '<?php echo $tanggal_2; ?>', harga: '<?php echo $harga_komoditas_2; ?>'},
        {y: '<?php echo $tanggal_3; ?>', harga: '<?php echo $harga_komoditas_3; ?>'},
        {y: '<?php echo $tanggal_4; ?>', harga: '<?php echo $harga_komoditas_4; ?>'}
      ],
      xkey: 'y',
      ykeys: ['harga'],
      labels: ['Harga'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });
	var line = new Morris.Line({
		<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal, $pasar, 'BMP012')->row();
			if(empty($harga)){ $harga_sampel1 = 0; $harga_sampel2=0; $harga_sampel3=0; }else{ $harga_sampel1=$harga->harga_sampel1; $harga_sampel2 = $harga->harga_sampel2; $harga_sampel3 = $harga->harga_sampel3; }
			$harga_komoditas = ($harga_sampel1 + $harga_sampel2 + $harga_sampel3)/3;
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_1, $pasar, 'BMP012')->row();
			if(empty($harga_1)){ $harga_sampel1_1 = 0; $harga_sampel2_1=0; $harga_sampel3_1=0; }else{ $harga_sampel1_1=$harga_1->harga_sampel1; $harga_sampel2_1 = $harga_1->harga_sampel2; $harga_sampel3_1 = $harga_1->harga_sampel3; }
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1)/3;
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_2, $pasar, 'BMP012')->row();
			if(empty($harga_2)){ $harga_sampel1_2 = 0; $harga_sampel2_2=0; $harga_sampel3_2=0; }else{ $harga_sampel1_2=$harga_2->harga_sampel1; $harga_sampel2_2 = $harga_2->harga_sampel2; $harga_sampel3_2 = $harga_2->harga_sampel3; }
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2)/3;
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_3, $pasar, 'BMP012')->row();
			if(empty($harga_3)){ $harga_sampel1_3 = 0; $harga_sampel2_3=0; $harga_sampel3_3=0; }else{ $harga_sampel1_3=$harga_3->harga_sampel1; $harga_sampel2_3 = $harga_3->harga_sampel2; $harga_sampel3_3 = $harga_3->harga_sampel3; }
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3)/3;
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_4, $pasar, 'BMP012')->row();
			if(empty($harga_4)){ $harga_sampel1_4 = 0; $harga_sampel2_4=0; $harga_sampel3_4=0; }else{ $harga_sampel1_4=$harga_4->harga_sampel1; $harga_sampel2_4 = $harga_4->harga_sampel2; $harga_sampel3_4 = $harga_4->harga_sampel3; }
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4)/3;
		?>
      element: 'cabe-rawit',
      resize: true,
      data: [
        {y: '<?php echo $tanggal; ?>', harga: '<?php echo $harga_komoditas; ?>'},
        {y: '<?php echo $tanggal_1; ?>', harga: '<?php echo $harga_komoditas_1; ?>'},
        {y: '<?php echo $tanggal_2; ?>', harga: '<?php echo $harga_komoditas_2; ?>'},
        {y: '<?php echo $tanggal_3; ?>', harga: '<?php echo $harga_komoditas_3; ?>'},
        {y: '<?php echo $tanggal_4; ?>', harga: '<?php echo $harga_komoditas_4; ?>'}
      ],
      xkey: 'y',
      ykeys: ['harga'],
      labels: ['Harga'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });
	var line = new Morris.Line({
		<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal, $pasar, 'BMP013')->row();
			if(empty($harga)){ $harga_sampel1 = 0; $harga_sampel2=0; $harga_sampel3=0; }else{ $harga_sampel1=$harga->harga_sampel1; $harga_sampel2 = $harga->harga_sampel2; $harga_sampel3 = $harga->harga_sampel3; }
			$harga_komoditas = ($harga_sampel1 + $harga_sampel2 + $harga_sampel3)/3;
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_1, $pasar, 'BMP013')->row();
			if(empty($harga_1)){ $harga_sampel1_1 = 0; $harga_sampel2_1=0; $harga_sampel3_1=0; }else{ $harga_sampel1_1=$harga_1->harga_sampel1; $harga_sampel2_1 = $harga_1->harga_sampel2; $harga_sampel3_1 = $harga_1->harga_sampel3; }
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1)/3;
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_2, $pasar, 'BMP013')->row();
			if(empty($harga_2)){ $harga_sampel1_2 = 0; $harga_sampel2_2=0; $harga_sampel3_2=0; }else{ $harga_sampel1_2=$harga_2->harga_sampel1; $harga_sampel2_2 = $harga_2->harga_sampel2; $harga_sampel3_2 = $harga_2->harga_sampel3; }
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2)/3;
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_3, $pasar, 'BMP013')->row();
			if(empty($harga_3)){ $harga_sampel1_3 = 0; $harga_sampel2_3=0; $harga_sampel3_3=0; }else{ $harga_sampel1_3=$harga_3->harga_sampel1; $harga_sampel2_3 = $harga_3->harga_sampel2; $harga_sampel3_3 = $harga_3->harga_sampel3; }
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3)/3;
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_4, $pasar, 'BMP013')->row();
			if(empty($harga_4)){ $harga_sampel1_4 = 0; $harga_sampel2_4=0; $harga_sampel3_4=0; }else{ $harga_sampel1_4=$harga_4->harga_sampel1; $harga_sampel2_4 = $harga_4->harga_sampel2; $harga_sampel3_4 = $harga_4->harga_sampel3; }
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4)/3;
		?>
      element: 'bawang-merah',
      resize: true,
      data: [
        {y: '<?php echo $tanggal; ?>', harga: '<?php echo $harga_komoditas; ?>'},
        {y: '<?php echo $tanggal_1; ?>', harga: '<?php echo $harga_komoditas_1; ?>'},
        {y: '<?php echo $tanggal_2; ?>', harga: '<?php echo $harga_komoditas_2; ?>'},
        {y: '<?php echo $tanggal_3; ?>', harga: '<?php echo $harga_komoditas_3; ?>'},
        {y: '<?php echo $tanggal_4; ?>', harga: '<?php echo $harga_komoditas_4; ?>'}
      ],
      xkey: 'y',
      ykeys: ['harga'],
      labels: ['Harga'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });
	var line = new Morris.Line({
		<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal, $pasar, 'BMP014')->row();
			if(empty($harga)){ $harga_sampel1 = 0; $harga_sampel2=0; $harga_sampel3=0; }else{ $harga_sampel1=$harga->harga_sampel1; $harga_sampel2 = $harga->harga_sampel2; $harga_sampel3 = $harga->harga_sampel3; }
			$harga_komoditas = ($harga_sampel1 + $harga_sampel2 + $harga_sampel3)/3;
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_1, $pasar, 'BMP014')->row();
			if(empty($harga_1)){ $harga_sampel1_1 = 0; $harga_sampel2_1=0; $harga_sampel3_1=0; }else{ $harga_sampel1_1=$harga_1->harga_sampel1; $harga_sampel2_1 = $harga_1->harga_sampel2; $harga_sampel3_1 = $harga_1->harga_sampel3; }
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1)/3;
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_2, $pasar, 'BMP014')->row();
			if(empty($harga_2)){ $harga_sampel1_2 = 0; $harga_sampel2_2=0; $harga_sampel3_2=0; }else{ $harga_sampel1_2=$harga_2->harga_sampel1; $harga_sampel2_2 = $harga_2->harga_sampel2; $harga_sampel3_2 = $harga_2->harga_sampel3; }
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2)/3;
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_3, $pasar, 'BMP014')->row();
			if(empty($harga_3)){ $harga_sampel1_3 = 0; $harga_sampel2_3=0; $harga_sampel3_3=0; }else{ $harga_sampel1_3=$harga_3->harga_sampel1; $harga_sampel2_3 = $harga_3->harga_sampel2; $harga_sampel3_3 = $harga_3->harga_sampel3; }
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3)/3;
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_4, $pasar, 'BMP014')->row();
			if(empty($harga_4)){ $harga_sampel1_4 = 0; $harga_sampel2_4=0; $harga_sampel3_4=0; }else{ $harga_sampel1_4=$harga_4->harga_sampel1; $harga_sampel2_4 = $harga_4->harga_sampel2; $harga_sampel3_4 = $harga_4->harga_sampel3; }
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4)/3;
		?>
      element: 'bawang-putih-bongol',
      resize: true,
      data: [
        {y: '<?php echo $tanggal; ?>', harga: '<?php echo $harga_komoditas; ?>'},
        {y: '<?php echo $tanggal_1; ?>', harga: '<?php echo $harga_komoditas_1; ?>'},
        {y: '<?php echo $tanggal_2; ?>', harga: '<?php echo $harga_komoditas_2; ?>'},
        {y: '<?php echo $tanggal_3; ?>', harga: '<?php echo $harga_komoditas_3; ?>'},
        {y: '<?php echo $tanggal_4; ?>', harga: '<?php echo $harga_komoditas_4; ?>'}
      ],
      xkey: 'y',
      ykeys: ['harga'],
      labels: ['Harga'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });
	var line = new Morris.Line({
		<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal, $pasar, 'BMP015')->row();
			if(empty($harga)){ $harga_sampel1 = 0; $harga_sampel2=0; $harga_sampel3=0; }else{ $harga_sampel1=$harga->harga_sampel1; $harga_sampel2 = $harga->harga_sampel2; $harga_sampel3 = $harga->harga_sampel3; }
			$harga_komoditas = ($harga_sampel1 + $harga_sampel2 + $harga_sampel3)/3;
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_1, $pasar, 'BMP015')->row();
			if(empty($harga_1)){ $harga_sampel1_1 = 0; $harga_sampel2_1=0; $harga_sampel3_1=0; }else{ $harga_sampel1_1=$harga_1->harga_sampel1; $harga_sampel2_1 = $harga_1->harga_sampel2; $harga_sampel3_1 = $harga_1->harga_sampel3; }
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1)/3;
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_2, $pasar, 'BMP015')->row();
			if(empty($harga_2)){ $harga_sampel1_2 = 0; $harga_sampel2_2=0; $harga_sampel3_2=0; }else{ $harga_sampel1_2=$harga_2->harga_sampel1; $harga_sampel2_2 = $harga_2->harga_sampel2; $harga_sampel3_2 = $harga_2->harga_sampel3; }
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2)/3;
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_3, $pasar, 'BMP015')->row();
			if(empty($harga_3)){ $harga_sampel1_3 = 0; $harga_sampel2_3=0; $harga_sampel3_3=0; }else{ $harga_sampel1_3=$harga_3->harga_sampel1; $harga_sampel2_3 = $harga_3->harga_sampel2; $harga_sampel3_3 = $harga_3->harga_sampel3; }
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3)/3;
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_4, $pasar, 'BMP015')->row();
			if(empty($harga_4)){ $harga_sampel1_4 = 0; $harga_sampel2_4=0; $harga_sampel3_4=0; }else{ $harga_sampel1_4=$harga_4->harga_sampel1; $harga_sampel2_4 = $harga_4->harga_sampel2; $harga_sampel3_4 = $harga_4->harga_sampel3; }
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4)/3;
		?>
      element: 'kacang-kedelai',
      resize: true,
      data: [
        {y: '<?php echo $tanggal; ?>', harga: '<?php echo $harga_komoditas; ?>'},
        {y: '<?php echo $tanggal_1; ?>', harga: '<?php echo $harga_komoditas_1; ?>'},
        {y: '<?php echo $tanggal_2; ?>', harga: '<?php echo $harga_komoditas_2; ?>'},
        {y: '<?php echo $tanggal_3; ?>', harga: '<?php echo $harga_komoditas_3; ?>'},
        {y: '<?php echo $tanggal_4; ?>', harga: '<?php echo $harga_komoditas_4; ?>'}
      ],
      xkey: 'y',
      ykeys: ['harga'],
      labels: ['Harga'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });
	var line = new Morris.Line({
		<?php
			$harga = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal, $pasar, 'BMP016')->row();
			if(empty($harga)){ $harga_sampel1 = 0; $harga_sampel2=0; $harga_sampel3=0; }else{ $harga_sampel1=$harga->harga_sampel1; $harga_sampel2 = $harga->harga_sampel2; $harga_sampel3 = $harga->harga_sampel3; }
			$harga_komoditas = ($harga_sampel1 + $harga_sampel2 + $harga_sampel3)/3;
			$harga_1 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_1, $pasar, 'BMP016')->row();
			if(empty($harga_1)){ $harga_sampel1_1 = 0; $harga_sampel2_1=0; $harga_sampel3_1=0; }else{ $harga_sampel1_1=$harga_1->harga_sampel1; $harga_sampel2_1 = $harga_1->harga_sampel2; $harga_sampel3_1 = $harga_1->harga_sampel3; }
			$harga_komoditas_1 = ($harga_sampel1_1 + $harga_sampel2_1 + $harga_sampel3_1)/3;
			$harga_2 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_2, $pasar, 'BMP016')->row();
			if(empty($harga_2)){ $harga_sampel1_2 = 0; $harga_sampel2_2=0; $harga_sampel3_2=0; }else{ $harga_sampel1_2=$harga_2->harga_sampel1; $harga_sampel2_2 = $harga_2->harga_sampel2; $harga_sampel3_2 = $harga_2->harga_sampel3; }
			$harga_komoditas_2 = ($harga_sampel1_2 + $harga_sampel2_2 + $harga_sampel3_2)/3;
			$harga_3 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_3, $pasar, 'BMP016')->row();
			if(empty($harga_3)){ $harga_sampel1_3 = 0; $harga_sampel2_3=0; $harga_sampel3_3=0; }else{ $harga_sampel1_3=$harga_3->harga_sampel1; $harga_sampel2_3 = $harga_3->harga_sampel2; $harga_sampel3_3 = $harga_3->harga_sampel3; }
			$harga_komoditas_3 = ($harga_sampel1_3 + $harga_sampel2_3 + $harga_sampel3_3)/3;
			$harga_4 = $this->m_laporan_makanan_pokok->harga_komoditas($tanggal_4, $pasar, 'BMP016')->row();
			if(empty($harga_4)){ $harga_sampel1_4 = 0; $harga_sampel2_4=0; $harga_sampel3_4=0; }else{ $harga_sampel1_4=$harga_4->harga_sampel1; $harga_sampel2_4 = $harga_4->harga_sampel2; $harga_sampel3_4 = $harga_4->harga_sampel3; }
			$harga_komoditas_4 = ($harga_sampel1_4 + $harga_sampel2_4 + $harga_sampel3_4)/3;
		?>
      element: 'jagung',
      resize: true,
      data: [
        {y: '<?php echo $tanggal; ?>', harga: '<?php echo $harga_komoditas; ?>'},
        {y: '<?php echo $tanggal_1; ?>', harga: '<?php echo $harga_komoditas_1; ?>'},
        {y: '<?php echo $tanggal_2; ?>', harga: '<?php echo $harga_komoditas_2; ?>'},
        {y: '<?php echo $tanggal_3; ?>', harga: '<?php echo $harga_komoditas_3; ?>'},
        {y: '<?php echo $tanggal_4; ?>', harga: '<?php echo $harga_komoditas_4; ?>'}
      ],
      xkey: 'y',
      ykeys: ['harga'],
      labels: ['Harga'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });
  });
</script>