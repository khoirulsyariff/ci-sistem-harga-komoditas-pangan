<div class="content-wrapper">
  <section class="content">
    <div class="box box-info">
      <div class="box-header">
        <h4 style="text-align:center">
          <b style="line-height:25px">
            MONITORING HARGA KOMODITAS PANGAN<br>
            <?php echo strtoupper($pasar->nama_pasar); ?>
          </b>
        </h4><hr>
      </div>

      <div class="box-body table-responsive">

        <table>
          <tr>
            <th width="100px" height="30px">Tanggal</th>
            <td>: <?php echo $this->uri->segment('4')." ".bulan($this->uri->segment('5'))." ".$this->uri->segment('6'); ?></td>
          </tr>
        </table>
        <hr>

        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr class="active">
              <th style="text-align:center">No</th>
              <th style="text-align:center">Komoditas</th>
              <th style="text-align:center">Harga Sampel 1</th>
              <th style="text-align:center">Harga Sampel 2</th>
              <th style="text-align:center">Harga Sampel 3</th>
              <th style="text-align:center">Ket</th>
              <th style="text-align:center">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $no = 1;
          foreach($monitoring as $monitoring) {
            ?>
            <tr>
              <td style="text-align:center"><?php echo $no; ?></td>
              <td><?php echo $monitoring->nama_pangan; ?></td>
              <td style="text-align:right"><?php echo "Rp " . number_format($monitoring->harga_sampel1,2,',','.'); ?>/<?php echo $monitoring->satuan; ?></td>
              <td style="text-align:right"><?php echo "Rp " . number_format($monitoring->harga_sampel2,2,',','.'); ?>/<?php echo $monitoring->satuan; ?></td>
              <td style="text-align:right"><?php echo "Rp " . number_format($monitoring->harga_sampel3,2,',','.'); ?>/<?php echo $monitoring->satuan; ?></td>
              <td><?php echo $monitoring->keterangan; ?></td>
              <td>
                <a href="<?php echo base_url('monitoring-makanan-pokok/edit/'.$pasar->id_pasar.'/'.$monitoring->id_monitoring_pangan.'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6)); ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
              </td>
            </tr>
            <?php
            $no++;
          }
          ?>
          </tbody>
        </table><br>
        <a href="<?php echo base_url('monitoring-makanan-pokok/detail/'.$pasar->id_pasar); ?>" class="btn btn-danger">Kembali</a>
      </div>
  </section>
</div>

<!--MODAL DETAIL-->
<div class="modal fade" id="Modal_Mingguke" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal-header-custom">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <center><h4 class="modal-title"><b>MONITORING MINGGU KE</b></h4></center>
      </div>

      <div class="modal-body">
        <center>
          <a href="<?php echo base_url('monitoring-makanan-pokok/tambah/' . $pasar->id_pasar . '/1'); ?>" class="btn btn-app" style="font-size:20px;font-weight:bold">1</a>
          <a href="<?php echo base_url('monitoring-makanan-pokok/tambah/' . $pasar->id_pasar . '/2'); ?>" class="btn btn-app" style="font-size:20px;font-weight:bold">2</a>
          <a href="<?php echo base_url('monitoring-makanan-pokok/tambah/' . $pasar->id_pasar . '/3'); ?>" class="btn btn-app" style="font-size:20px;font-weight:bold">3</a>
          <a href="<?php echo base_url('monitoring-makanan-pokok/tambah/' . $pasar->id_pasar . '/4'); ?>" class="btn btn-app" style="font-size:20px;font-weight:bold">4</a>
        </center>
      </div>
    </div>
  </div>
</div>
<!--END MODAL DETAIL -->

<script>
$(document).ready(function(){
  $('p').on('click','.item_mingguke',function(){
    $('#Modal_Mingguke').modal('show');
  });
});
</script>
