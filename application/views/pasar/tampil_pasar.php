<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h4 style="text-align:center"><b>DATA PASAR</b></h4>
                <hr>
            </div>

            <div class="box-body table-responsive">

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

                <p>
                    <a href="<?php echo base_url('pasar/tambah'); ?>" class="btn btn-success">Tambah Pasar</a>
                </p>
                <table id="data" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr class="active">
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">ID</th>
                            <th style="text-align:center">Nama Pasar</th>
                            <th style="text-align:center">Petugas</th>
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
                            <td><?php echo $pasar->nama_petugas; ?></td>
                            <td style="text-align:center">
                                <a href="<?php echo base_url('pasar/edit/' . $pasar->id_pasar); ?>"
                                    class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                                <a href="<?php echo base_url('pasar/hapus/' . $pasar->id_pasar); ?>"
                                    class="btn btn-danger" onClick="return confirm('Yakin Akan Menghapus Data?');"><i
                                        class="fa fa-trash-o"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php
              $no++;
            }
            ?>
                    </tbody>
                </table>
            </div>
    </section>
</div>