<div class="content-wrapper">
  <section class="content">
    <div class="box box-info">
      <div class="box-header">
        <h4 style="text-align:center"><b>GRAFIK BAHAN MAKANAN POKOK</b></h4><hr>
      </div>
      <div class="box-body">
          <div class="row">
            <?php
            for($i=1;$i<=18;$i++){
            ?>
            <div class="col-lg-6">
              <center><h4>Harga Rata-Rata (Rp/Kg)</h4></center>
              <canvas id="myChart<?php echo $i; ?>" width="400" height="250"></canvas>
            </div>
            <div class="col-lg-6">
              <center><h4>Jumlah Distribusi (Kg)</h4></center>
              <canvas id="volumeRataan<?php echo $i; ?>" width="400" height="250"></canvas>
            </div>
            <?php
            }
            ?>
          </div>
          <br>
      </div>
    </div>
  </section>
</div>

<?php
$tahun = $_GET['tahun'];
$tahun = substr($tahun,2);
?>

<script src="<?php echo base_url(); ?>assets/chart/chart.js"></script>
<script>
//pangan urutan ke 1
var ctx = document.getElementById('myChart1').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Beras Premium'],
            data: [
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP001'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP001'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP001'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP001'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP001'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP001'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP001'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP001'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP001'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP001'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP001'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP001'")->row();
              echo $hr->harga_rata_rata;
              ?>
              ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

var ctx = document.getElementById('volumeRataan1').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Beras Premium'],
            data: [
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP001'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP001'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP001'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP001'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP001'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP001'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP001'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP001'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP001'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP001'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP001'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP001'")->row();
              echo $hr->jumlah_distribusi;
              ?>
            ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

//pangan urutan ke 2
var ctx = document.getElementById('myChart2').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Beras Medium'],
            data: [
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP002'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP002'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP002'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP002'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP002'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP002'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP002'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP002'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP002'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP002'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP002'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP002'")->row();
              echo $hr->harga_rata_rata;
              ?>
              ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

var ctx = document.getElementById('volumeRataan2').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Beras Premium'],
            data: [
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP002'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP002'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP002'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP002'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP002'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP002'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP002'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP002'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP002'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP002'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP002'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP002'")->row();
              echo $hr->jumlah_distribusi;
              ?>
            ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

//pangan urutan ke 3
var ctx = document.getElementById('myChart3').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Beras Khusus'],
            data: [
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP003'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP003'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP003'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP003'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP003'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP003'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP003'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP003'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP003'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP003'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP003'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP003'")->row();
              echo $hr->harga_rata_rata;
              ?>
              ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

var ctx = document.getElementById('volumeRataan3').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Beras Khusus'],
            data: [
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP003'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP003'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP003'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP003'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP003'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP003'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP003'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP003'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP003'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP003'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP003'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP003'")->row();
              echo $hr->jumlah_distribusi;
              ?>
            ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

//pangan urutan ke 4
var ctx = document.getElementById('myChart4').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Jagung Pipilan Kering'],
            data: [
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP004'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP004'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP004'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP004'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP004'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP004'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP004'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP004'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP004'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP004'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP004'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP004'")->row();
              echo $hr->harga_rata_rata;
              ?>
              ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

var ctx = document.getElementById('volumeRataan4').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Jagung Pipilan Kering'],
            data: [
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP004'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP004'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP004'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP004'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP004'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP004'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP004'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP004'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP004'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP004'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP004'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP004'")->row();
              echo $hr->jumlah_distribusi;
              ?>
            ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

//pangan urutan ke 5
var ctx = document.getElementById('myChart5').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Kedelai Biji Kering'],
            data: [
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP005'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP005'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP005'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP005'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP005'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP005'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP005'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP005'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP005'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP005'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP005'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP005'")->row();
              echo $hr->harga_rata_rata;
              ?>
              ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

var ctx = document.getElementById('volumeRataan5').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Kedelai Biji Kering'],
            data: [
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP005'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP005'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP005'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP005'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP005'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP005'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP005'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP005'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP005'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP005'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP005'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP005'")->row();
              echo $hr->jumlah_distribusi;
              ?>
            ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

//pangan urutan ke 6
var ctx = document.getElementById('myChart6').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Bawang Merah'],
            data: [
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP006'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP006'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP006'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP006'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP006'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP006'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP006'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP006'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP006'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP006'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP006'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP006'")->row();
              echo $hr->harga_rata_rata;
              ?>
              ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

var ctx = document.getElementById('volumeRataan6').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Bawang Merah'],
            data: [
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP006'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP006'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP006'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP006'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP006'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP006'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP006'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP006'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP006'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP006'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP006'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP006'")->row();
              echo $hr->jumlah_distribusi;
              ?>
            ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

//pangan urutan ke 7
var ctx = document.getElementById('myChart7').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Bawang Putih Bonggol'],
            data: [
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP007'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP007'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP007'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP007'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP007'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP007'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP007'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP007'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP007'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP007'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP007'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP007'")->row();
              echo $hr->harga_rata_rata;
              ?>
              ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

var ctx = document.getElementById('volumeRataan7').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Bawang Putih Bonggol'],
            data: [
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP007'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP007'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP007'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP007'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP007'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP007'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP007'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP007'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP007'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP007'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP007'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP007'")->row();
              echo $hr->jumlah_distribusi;
              ?>
            ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

//pangan urutan ke 8
var ctx = document.getElementById('myChart8').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Bawang Putih Cutting'],
            data: [
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP008'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP008'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP008'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP008'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP008'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP008'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP008'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP008'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP008'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP008'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP008'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP008'")->row();
              echo $hr->harga_rata_rata;
              ?>
              ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

var ctx = document.getElementById('volumeRataan8').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Bawang Putih Cutting'],
            data: [
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP008'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP008'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP008'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP008'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP008'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP008'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP008'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP008'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP008'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP008'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP008'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP008'")->row();
              echo $hr->jumlah_distribusi;
              ?>
            ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

//pangan urutan ke 9
var ctx = document.getElementById('myChart9').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Cabe Merah Kriting'],
            data: [
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP009'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP009'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP009'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP009'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP009'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP009'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP009'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP009'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP009'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP009'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP009'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP009'")->row();
              echo $hr->harga_rata_rata;
              ?>
              ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

var ctx = document.getElementById('volumeRataan9').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Cabe Merah Kriting'],
            data: [
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP009'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP009'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP009'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP009'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP009'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP009'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP009'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP009'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP009'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP009'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP009'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP009'")->row();
              echo $hr->jumlah_distribusi;
              ?>
            ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

//pangan urutan ke 10
var ctx = document.getElementById('myChart10').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Cabe Rawit Merah'],
            data: [
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP010'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP010'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP010'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP010'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP010'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP010'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP010'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP010'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP010'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP010'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP010'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP010'")->row();
              echo $hr->harga_rata_rata;
              ?>
              ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

var ctx = document.getElementById('volumeRataan10').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Cabe Rawit Merah'],
            data: [
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP010'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP010'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP010'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP010'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP010'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP010'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP010'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP010'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP010'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP010'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP010'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP010'")->row();
              echo $hr->jumlah_distribusi;
              ?>
            ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

//pangan urutan ke 11
var ctx = document.getElementById('myChart11').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Daging Sapi Lokal'],
            data: [
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP011'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP011'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP011'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP011'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP011'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP011'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP011'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP011'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP011'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP011'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP011'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP011'")->row();
              echo $hr->harga_rata_rata;
              ?>
              ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

var ctx = document.getElementById('volumeRataan11').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Daging Sapi Lokal'],
            data: [
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP011'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP011'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP011'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP011'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP011'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP011'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP011'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP011'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP011'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP011'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP011'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP011'")->row();
              echo $hr->jumlah_distribusi;
              ?>
            ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

//pangan urutan ke 12
var ctx = document.getElementById('myChart12').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Daging Sapi Beku'],
            data: [
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP012'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP012'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP012'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP012'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP012'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP012'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP012'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP012'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP012'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP012'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP012'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP012'")->row();
              echo $hr->harga_rata_rata;
              ?>
              ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

var ctx = document.getElementById('volumeRataan12').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Daging Sapi Beku'],
            data: [
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP012'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP012'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP012'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP012'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP012'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP012'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP012'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP012'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP012'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP012'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP012'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP012'")->row();
              echo $hr->jumlah_distribusi;
              ?>
            ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

//pangan urutan ke 13
var ctx = document.getElementById('myChart13').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Daging Ayam Ras'],
            data: [
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP013'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP013'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP013'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP013'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP013'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP013'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP013'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP013'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP013'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP013'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP013'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP013'")->row();
              echo $hr->harga_rata_rata;
              ?>
              ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

var ctx = document.getElementById('volumeRataan13').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Telur Ayam Ras'],
            data: [
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP013'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP013'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP013'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP013'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP013'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP013'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP013'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP013'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP013'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP013'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP013'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP013'")->row();
              echo $hr->jumlah_distribusi;
              ?>
            ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

//pangan urutan ke 14
var ctx = document.getElementById('myChart14').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Telur Ayam Ras'],
            data: [
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP014'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP014'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP014'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP014'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP014'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP014'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP014'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP014'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP014'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP014'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP014'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP014'")->row();
              echo $hr->harga_rata_rata;
              ?>
              ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

var ctx = document.getElementById('volumeRataan14').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Telur Ayam Ras'],
            data: [
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP014'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP014'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP014'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP014'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP014'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP014'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP014'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP014'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP014'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP014'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP014'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP014'")->row();
              echo $hr->jumlah_distribusi;
              ?>
            ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

//pangan urutan ke 15
var ctx = document.getElementById('myChart15').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Gula Pasir Lokal'],
            data: [
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP015'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP015'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP015'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP015'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP015'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP015'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP015'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP015'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP015'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP015'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP015'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP015'")->row();
              echo $hr->harga_rata_rata;
              ?>
              ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

var ctx = document.getElementById('volumeRataan15').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Gula Pasir Lokal'],
            data: [
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP015'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP015'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP015'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP015'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP015'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP015'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP015'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP015'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP015'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP015'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP015'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP015'")->row();
              echo $hr->jumlah_distribusi;
              ?>
            ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

//pangan urutan ke 16
var ctx = document.getElementById('myChart16').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Minyak Goreng'],
            data: [
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP016'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP016'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP016'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP016'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP016'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP016'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP016'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP016'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP016'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP016'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP016'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP016'")->row();
              echo $hr->harga_rata_rata;
              ?>
              ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

var ctx = document.getElementById('volumeRataan16').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Minyak Goreng'],
            data: [
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP016'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP016'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP016'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP016'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP016'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP016'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP016'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP016'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP016'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP016'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP016'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP016'")->row();
              echo $hr->jumlah_distribusi;
              ?>
            ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

//pangan urutan ke 17
var ctx = document.getElementById('myChart17').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Tepung Terigu'],
            data: [
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP017'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP017'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP017'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP017'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP017'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP017'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP017'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP017'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP017'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP017'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP017'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP017'")->row();
              echo $hr->harga_rata_rata;
              ?>
              ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

var ctx = document.getElementById('volumeRataan17').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Tepung Terigu'],
            data: [
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP017'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP017'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP017'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP017'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP017'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP017'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP017'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP017'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP017'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP017'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP017'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP017'")->row();
              echo $hr->jumlah_distribusi;
              ?>
            ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

//pangan urutan ke 18
var ctx = document.getElementById('myChart18').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Ikan'],
            data: [
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP018'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP018'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP018'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP018'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP018'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP018'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP018'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP018'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP018'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP018'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP018'")->row();
              echo $hr->harga_rata_rata;
              ?>,
              <?php
              $hr = $this->db->query("SELECT AVG(harga_satuan) AS harga_rata_rata FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP018'")->row();
              echo $hr->harga_rata_rata;
              ?>
              ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});

var ctx = document.getElementById('volumeRataan18').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: ['Ikan'],
            data: [
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '01$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP018'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '02$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP018'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '03$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP018'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '04$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP018'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '05$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP018'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '06$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP018'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '07$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP018'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '08$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP018'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '09$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP018'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '10$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP018'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '11$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP018'")->row();
              echo $hr->jumlah_distribusi;
              ?>,
              <?php
              $hr = $this->db->query("SELECT SUM(volume_distribusi) AS jumlah_distribusi FROM monitoring_pangan WHERE MID(id_monitoring_pangan,7,4) = '12$tahun' AND RIGHT(id_monitoring_pangan,6) = 'BMP018'")->row();
              echo $hr->jumlah_distribusi;
              ?>
            ],
            backgroundColor: '#f73939',
            borderColor: '',
            borderWidth: 1
        }]
    },
});
</script>
