<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h4 style="text-align:center"><b>MONITORING HARGA KOMODITAS PANGAN</b></h4>
                <hr>
            </div>

            <div class="box-body table-responsive">

                <?php
                if (isset($status) && $status == "not_allow") {
                ?>
                <div class="callout callout-danger">
                    <p style="font-size:14px">
                        <i class="fa fa-warning"></i> Maaf anda tidak memiliki hak akses.
                    </p>
                </div>
                <?php
                } else {
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
                <table id="data" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr class="active ">
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">ID</th>
                            <th style="text-align:center">Nama Pasar</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($pasar as $pasar) {
                            ?>
                        <tr>
                            <td style="text-align:center"><?php echo $no; ?></td>
                            <td style="text-align:center"><?php echo $pasar->id_pasar; ?></td>
                            <td><?php echo $pasar->nama_pasar; ?></td>
                            <td style="text-align:center">
                                <a href="<?php echo base_url('monitoring-makanan-pokok/detail/' . $pasar->id_pasar); ?>"
                                    class="btn btn-info"><i class="fa fa-file-o"></i> Detail</a>

                                <a href="<?php echo base_url('monitoring-makanan-pokok/tambah/' . $pasar->id_pasar . '/'); ?>"
                                    class="btn btn-success item_mingguke">Tambah Monitoring</a>
                            </td>
                        </tr>
                        <?php
                                $no++;
                            }
                            ?>
                    </tbody>
                </table>
                <?php
                }
                ?>
            </div>
    </section>
</div>