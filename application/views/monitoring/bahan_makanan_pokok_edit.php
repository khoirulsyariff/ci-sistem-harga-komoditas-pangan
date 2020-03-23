<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h4 style="text-align:center">
                    <b style="line-height:25px">
                        EDIT MONITORING HARGA KOMODITAS PANGAN<br>
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

                <form
                    action="<?php echo base_url('monitoring-makanan-pokok/proses-edit/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7)); ?>"
                    method="post">
                    <div class="row">
                        <!-- kolom ke-1 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>ID Monitoring</label>
                                <input type="text" name="id_monitoring" class="form-control"
                                    value="<?php echo $monitoring->id_monitoring_pangan; ?>" readonly />
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
                                    value="<?php echo $monitoring->nama_petugas; ?>" readonly />
                                <input type="hidden" name="nip" class="form-control"
                                    value="<?php echo $monitoring->nip; ?>" readonly />
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
                                            value="<?php echo $monitoring->harga_sampel1; ?>" required />
                                    </div>

                                    <div class="col-xs-3">
                                        <input type="text" name="harga_sampel2" class="form-control"
                                            value="<?php echo $monitoring->harga_sampel2; ?>" required />
                                    </div>

                                    <div class="col-xs-3">
                                        <input type="text" name="harga_sampel3" class="form-control"
                                            value="<?php echo $monitoring->harga_sampel3; ?>" required />
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label>Keterangan</label>
                                <div class="row">
                                    <div class="col-xs-9">
                                        <input type="text" name="keterangan" class="form-control"
                                            value="<?php echo $monitoring->keterangan; ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <center>
                        <div class="form-group">
                            <button class="btn btn-success btn-custom">Simpan</button>
                            <a href="<?php echo base_url('monitoring_makanan_pokok/detail/' . $pasar->id_pasar . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7)); ?>"
                                class="btn btn-danger btn-custom">Batal</a>
                        </div>
                    </center>
                </form>

            </div>
    </section>
</div>