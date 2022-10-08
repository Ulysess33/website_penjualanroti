<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?= $this->session->flashdata('message'); ?>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahrotiModal">
                <i class="fas fa-plus "></i> Tambah Jenis Roti
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Jenis Roti</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($menu as $m) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?> </th>
                                <td><?= $m['name']; ?></td>
                                <td>
                                    <button data-toggle="modal" data-target="#edit<?= $m['id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>

                                    <a href="<?= base_url('menu/delete/' . $m['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- tambah data roti -->
<!-- Modal Tambah Data Roti -->
<div class="modal fade" id="tambahrotiModal" tabindex="-1" aria-labelledby="tambahrotiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahrotiModalLabel">Tambah Data Roti</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('menu/roti'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Masukan Nama Roti</label>
                            <input type="text" class="form-control" id="menu" name="menu" placeholder="Roti Tawar, Roti Manis, Etc">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Edit data Roti -->
<?php foreach ($menu as $m) : ?>
    <div class="modal fade" id="edit<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Roti</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open('menu/edit/' . $m['id']); ?>
                    <input type="hidden" value="<?= $m['id'] ?>" name="id">
                    <div class="form-group">
                        <label for="model">Jenis Roti<span class="required">*</span></label>
                        <input type="text" value="<?= $m['name'] ?>" class=" form-control" name="name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>

                <?= form_close() ?>
            </div>
        </div>
    </div>
<?php endforeach ?>