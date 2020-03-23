<div class="content-wrapper">
  <section class="content">
    <div class="box box-info">
      <div class="box-header">
        <h4 style="text-align:center"><b>EDIT DATA PASAR</b></h4><hr>
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

        <form action="<?php echo base_url('pasar/proses-edit'); ?>" method="post">
          <div class="form-group">
            <label>ID</label>
            <input type="text" name="id_pasar" class="form-control" value="<?php echo $pasar->id_pasar; ?>" readonly />
          </div>
          <div class="form-group">
            <label>Nama Pasar</label>
            <input type="text" name="nama_pasar" class="form-control" value="<?php echo $pasar->nama_pasar; ?>" required />
          </div>
          <div class="form-group">
            <label>Petugas</label>
            <select name="nip" class="form-control" required>              
              <?php
              foreach($petugas as $petugas){
              ?>
              <option value="<?php echo $petugas->nip; ?>" <?php echo $petugas->nip == $pasar->nip ? "selected" : ""; ?>><?php echo $petugas->nama_petugas; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <button class="btn btn-success">Simpan</button>
            <a href="<?php echo base_url('pasar/tampil'); ?>" class="btn btn-danger">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
