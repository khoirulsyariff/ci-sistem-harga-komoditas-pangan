<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h4 style="text-align:center">
                    <b style="line-height:25px">
                        MONITORING HARGA KOMODITAS PANGAN<br>
                        <?php echo strtoupper($pasar->nama_pasar); ?>
                    </b>
                </h4>
                <hr>
            </div>

            <div class="box-body table-responsive">

                <?php
                if ($this->session->flashdata('sukses')) {
                ?>
                <div class="callout callout-info">
                    <p style="font-size:14px">
                        <i class="fa fa-check"></i> <?php echo $this->session->flashdata('sukses'); ?>
                    </p>
                </div>
                <?php
                }
                ?>

                <p>
                    <a href="<?php echo base_url('monitoring-makanan-pokok/tambah/' . $pasar->id_pasar . '/'); ?>"
                        class="btn btn-success item_mingguke">Tambah Data Monitoring</a>
                </p>
                <table id="data" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr class="active">
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">Tanggal</th>
                            <th style="text-align:center">Petugas</th>
                            <th style="text-align:center">Pasar</th>
                            <th style="text-align:center">Status</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($monitoring as $monitoring) {
                        ?>
                        <tr>
                            <td style="text-align:center"><?php echo $no; ?></td>
                            <td style="text-align:center">
                                <?php
                                    $tanggal = date_create($monitoring->tanggal);
                                    echo date_format($tanggal, 'd') . " " . bulan(date_format($tanggal, 'm')) . " " . date_format($tanggal, 'Y');
                                    ?>
                            </td>
                            <td style="text-align:center"><?php echo $monitoring->nama_petugas; ?></td>
                            <td style="text-align:center"><?php echo $monitoring->nama_pasar; ?></td>
                            <td style="text-align:center">
                                <?php
                                    if ($monitoring->jumlah == $jumlah_pangan) {
                                        $label = "label-info";
                                        $status = "Lengkap";
                                    } else {
                                        $label = "label-warning";
                                        $status = "Belum Lengkap";
                                    }
                                    ?>
                                <span class="label <?php echo $label; ?>">
                                    <?php echo $status; ?>
                                </span>
                            </td>
                            <td style="text-align:center">
                                <a href="<?php echo base_url('monitoring-makanan-pokok/detail/' . $pasar->id_pasar . '/' . date_format($tanggal, 'd') . '/' . date_format($tanggal, 'm') . '/' . date_format($tanggal, 'Y')); ?>"
                                    class="btn btn-info"><i class="fa fa-file-o"></i> Detail</a>
                            </td>
                        </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                if ($this->session->userdata('level') == "admin") {
                ?>
                <p>
                    <a href="<?php echo base_url('monitoring-makanan-pokok/tampil'); ?>"
                        class="btn btn-danger">Kembali</a>
                </p>
                <?php
                }
                ?>
            </div>
    </section>
</div>