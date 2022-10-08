<?= $this->session->flashdata('pesan'); ?>
<?= $this->session->flashdata('pesan1'); ?>
<?= $this->session->flashdata('pesan2'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tabel History</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Jenis Roti</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Data Penjualan</th>
                            <th scope="col">Data Persediaan</th>
                            <th scope="col">Data Produksi</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($hasil as $dthistory) {
                        ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $dthistory['jenisroti'] ?></td>
                                <td><?= $dthistory['tgl'] ?></td>
                                <td><?= $dthistory['datapenjualan'] ?></td>
                                <td><?= $dthistory['datapersediaan'] ?></td>
                                <td><?= $dthistory['dataproduksi'] ?></td>
                                <td>
                                    <button data-toggle="modal" data-target="#edit<?= $dthistory['id_history'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>

                                    <a href="<?= base_url('history/datahistory/delete' . $dthistory['id_history']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                                </td>
                            <?php } ?>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Edit data Roti -->
<?php foreach ($hasil as $dthistory) { ?>
    <div class="modal fade" id="edit<?= $dthistory['id_history'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Roti</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open('history/datahistory/edit/' . $dthistory['id_history']); ?>
                    <div class="form-group">
                        <label for="Jenis Roti">Jenis Roti<span class="required">*</span></label>
                        <input id="jenistori" type="varchar" value="<?= $dthistory['jenisroti'] ?>" name="jtori" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tanggaljual">Penjualan<span class="required">*</span></label>
                        <input id="tgl" type="date" value="<?= $dthistory['tgl'] ?>" name="tanggal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="terjual">Data Penjualan<span class="required">*</span></label>
                        <input type="number" value="<?= $dthistory['datapenjualan'] ?>" min="0" class="form-control" name="terjual" required>
                    </div>
                    <div class="form-group">
                        <label for="tersedia">Data Penjualan<span class="required">*</span></label>
                        <input type="number" value="<?= $dthistory['datapersediaan'] ?>" min="0" class="form-control" name="tersedia" required>
                    </div>
                    <div class="form-group">
                        <label for="produksi">Data Penjualan<span class="required">*</span></label>
                        <input type="number" value="<?= $dthistory['dataproduksi'] ?>" min="0" class="form-control" name="produksi" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>