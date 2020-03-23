<div class="content-wrapper">
  <section class="content">
    <div class="box box-info">
      <div class="box-header">
        <h4 style="text-align:center"><b>TAMBAH DATA BAHAN MAKANAN POKOK</b></h4><hr>
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

        <form action="<?php echo base_url('pangan/proses-tambah'); ?>" method="post">
          <div class="form-group">
            <label>ID</label>
            <input type="text" name="id_pangan" class="form-control" value="<?php echo $id_pangan; ?>" readonly />
          </div>
          <div class="form-group">
            <label>Bahan Pangan</label>
            <input type="text" name="nama_pangan" class="form-control" required />
          </div>
          <div class="form-group">
            <label>Satuan</label>
            <input type="text" name="satuan" class="form-control" required />
          </div>
          <div class="form-group">
            <button class="btn btn-success">Simpan</button>
            <a href="<?php echo base_url('pangan/tampil'); ?>" class="btn btn-danger">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
