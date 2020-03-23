<div class="content-wrapper">
  <section class="content">
    <div class="box box-info">
      <div class="box-header">
        <h4 style="text-align:center"><b>TAMBAH DATA PETUGAS</b></h4><hr>
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

        <form action="<?php echo base_url('petugas/proses-tambah'); ?>" method="post">
          <div class="form-group">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control" required />
          </div>
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required />
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" rows="2" required ></textarea>
          </div>
          <div class="form-group">
            <label>No Telpon</label>
            <input type="text" name="no_telpon" class="form-control" required />
          </div>
          <div class="form-group">
            <label>Level</label>
            <select name="level" class="form-control" required>
              <option value="">--pilih level--</option>
              <option value="admin">Admin</option>
              <option value="petugas">Petugas</option>
              <option value="kasubag">Kasubag</option>
            </select>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required />
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
