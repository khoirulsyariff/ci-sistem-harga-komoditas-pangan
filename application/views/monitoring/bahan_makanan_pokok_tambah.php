<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">

            <div class="box-header">
                <h4 style="text-align:center">
                    <b style="line-height:25px">
                        TAMBAH MONITORING HARGA KOMODITAS PANGAN<br>
                        <?php echo strtoupper($pasar->nama_pasar); ?>
                    </b>
                </h4>
                <hr>
            </div>
            <div class="box-body">
                <?php
                if ($this->session->flashdata('sukses')) {
                ?>
                <div class="callout callout-success">
                    <p style="font-size:14px">
                        <i class="fa fa-check"></i> <?php echo $this->session->flashdata('sukses'); ?>
                    </p>
                </div>
                <?php
                }
                ?>
                <?php
                if ($id_monitoring == false) {
                ?>
                <div class="callout callout-success"><i class="fa fa-check"></i> Semua Data Monitoring Telah
                    Terisi.
                </div>
                <a href="<?php echo base_url('monitoring_makanan_pokok/detail/' . $pasar->id_pasar); ?>"
                    class="btn btn-danger btn-custom">Kembali</a>
                <?php
                } else {
                ?>


                <form action="<?php echo base_url('monitoring-makanan-pokok/proses-tambah'); ?>" method="post">
                    <div class="row">
                        <!-- kolom ke-1 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>ID Monitoring</label>
                                <input type="text" name="id_monitoring" class="form-control"
                                    value="<?php echo $id_monitoring; ?>" readonly />
                            </div>
                            <div class="form-group">
                                <label>Pasar</label>
                                <input type="text" name="nama_pasar" class="form-control"
                                    value="<?php echo $pasar->nama_pasar; ?>" readonly />
                                <input type="hidden" name="id_pasar" class="form-control"
                                    value="<?php echo $pasar->id_pasar; ?>" readonly />
                            </div>
                            <div class="form-group">
                                <label>Petugas</label>
                                <input type="text" name="" class="form-control"
                                    value="<?php echo $this->session->userdata('nama_petugas'); ?>" readonly />
                                <input type="hidden" name="nip" class="form-control"
                                    value="<?php echo $this->session->userdata('nip'); ?>" readonly />
                            </div>
                            <div class="form-group">
                                <label>Nama Pangan</label>
                                <input type="text" name="nama_pangan" class="form-control"
                                    value="<?php echo $pangan->nama_pangan; ?>" readonly />
                                <input type="hidden" name="id_pangan" class="form-control"
                                    value="<?php echo $pangan->id_pangan; ?>" />
                            </div>
                        </div>
                        <!-- kolom ke-2 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Harga</label>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <input type="text" name="harga_sampel1" class="form-control"
                                            placeholder="Sample Harga 1" required />
                                    </div>

                                    <div class="col-xs-3">
                                        <input type="text" name="harga_sampel2" class="form-control"
                                            placeholder="Sample Harga 2" required />
                                    </div>

                                    <div class="col-xs-3">
                                        <input type="text" name="harga_sampel3" class="form-control"
                                            placeholder="Sample Harga 3" required />
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label>Keterangan</label>
                                <div class="row">
                                    <div class="col-xs-9">
                                        <input type="text" name="Keterangan" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <center>
                        <div class="form-group">
                            <button class="btn btn-success btn-custom">Simpan</button>
                            <a href="<?php echo base_url('monitoring_makanan_pokok/detail/' . $pasar->id_pasar); ?>"
                                class="btn btn-danger btn-custom">Batal</a>
                        </div>
                    </center>
                </form>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
</div>