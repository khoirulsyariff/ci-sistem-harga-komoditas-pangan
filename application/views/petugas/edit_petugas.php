<div class="content-wrapper">
  <section class="content">
    <div class="box box-info">
      <div class="box-header">
        <h4 style="text-align:center"><b>EDIT DATA PETUGAS</b></h4><hr>
      </div>

      <div class="box-body">

        <?php
        if($this->session->flashdata('sukses')) {
          ?>
          <div class="callout callout-success">
            <p style="font-size:14px">
              <i class="fa fa-check"></i> <?php echo $this->session->flashdata('sukses'); ?>
            </p>
          </div>
          <?php
        }
        ?>

        <form action="<?php echo base_url('petugas/proses-edit'); ?>" method="post">
          <div class="form-group">
            <label>NIP</label>
            <input type="text" name="nip" value="<?php echo $petugas->nip; ?>"  class="form-control" readonly />
          </div>
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="<?php echo $petugas->nama_petugas; ?>" class="form-control" />
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" rows="2"><?php echo $petugas->alamat; ?></textarea>
          </div>
          <div class="form-group">
            <label>No Telpon</label>
            <input type="text" name="no_telpon" value="<?php echo $petugas->no_telpon; ?>" class="form-control" />
          </div>
          <div class="form-group">
            <button class="btn btn-success">Simpan</button>
            <a href="<?php echo base_url('petugas/tampil'); ?>" class="btn btn-danger">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
