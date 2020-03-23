<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h4 style="text-align:center"><b>DATA KOMODITAS PANGAN</b></h4>
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
                    <a href="<?php echo base_url('pangan/tambah'); ?>" class="btn btn-success">Tambah Komoditas Pangan</a>
                </p>
                <table id="data" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr class="active">
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">ID</th>
                            <th style="text-align:center">Nama Bahan Pangan</th>
                            <th style="text-align:center">Satuan</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
            $no = 1;
            foreach ($pangan as $pangan) {
            ?>
                        <tr>
                            <td style="text-align:center"><?php echo $no; ?></td>
                            <td style="text-align:center"><?php echo $pangan->id_pangan; ?></td>
                            <td><?php echo $pangan->nama_pangan; ?></td>
                            <td><?php echo $pangan->satuan; ?></td>
                            <td style="text-align:center">
                                <a href="<?php echo base_url('pangan/edit/' . $pangan->id_pangan); ?>"
                                    class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                                <a href="<?php echo base_url('pangan/hapus/' . $pangan->id_pangan); ?>"
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