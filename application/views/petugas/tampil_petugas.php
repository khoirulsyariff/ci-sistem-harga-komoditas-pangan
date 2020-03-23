<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h4 style="text-align:center"><b>DATA PETUGAS MONITORING</b></h4>
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
                    <a href="<?php echo base_url('petugas/tambah'); ?>" class="btn btn-success">Tambah Petugas
                        Monitoring</a>
                </p>
                <table id="data" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr class="active">
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">NIP</th>
                            <th style="text-align:center">Nama</th>
                            <th style="text-align:center">Alamat</th>
                            <th style="text-align:center">No Telpon</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
            $no = 1;
            foreach ($petugas as $petugas) {
            ?>
                        <tr>
                            <td style="text-align:center"><?php echo $no; ?></td>
                            <td><?php echo $petugas->nip; ?></td>
                            <td><?php echo $petugas->nama_petugas; ?></td>
                            <td><?php echo $petugas->alamat; ?></td>
                            <td><?php echo $petugas->no_telpon; ?></td>
                            <td style="text-align:center">
                                <a href="<?php echo base_url('petugas/edit/' . $petugas->nip); ?>"
                                    class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                                <a href="<?php echo base_url('petugas/hapus/' . $petugas->nip); ?>"
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