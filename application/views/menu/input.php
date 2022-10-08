<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('msg') ?>
    <?= form_open('menu/tambahroti') ?>
    <div class="mb-3">
        <label for="Jenis Roti" class="form-label">Jenis Roti</label>
        <select onchange="data_roti()" class="form-control" id="jenis-roti" name="jenisroti" required>
            <option value="">- PILIH JENIS ROTI -</option>
            <!-- perulangan untuk memanggil Data Roti -->
            <?php foreach ($name as $dt) : ?>
                <option value="<?= $dt ?>"><?= $dt ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="Waktu" class="form-label">Waktu</label>
        <input type="date" class="form-control" id="tgl" name="tgl">
    </div>
    <div class="mb-3">
        <label for="Data Penjualan" class="form-label">Data Penjualan</label>
        <input type="number" class="form-control" id="data-penjualan" name="datapenjualan" min="0">
    </div>
    <div class="mb-3">
        <label for="Data Persediaan" class="form-label">Data Persediaan</label>
        <input type="number" class="form-control" id="data-persediaan" name="datapersediaan" min="0">
    </div>
    <div class="mb-3">
        <label for="Data Produksi" class="form-label">Data Produksi</label>
        <input type="number" class="form-control" id="data-produksi" name="dataproduksi" min="0">
    </div>
    <input type="submit" name="Prediksi" value="Submit" class="btn btn-primary">
    <?= form_close() ?>

    <?php
    if (!empty($_POST)) {
        $jenisroti = $_POST['jenisroti'];
        $tgl = $_POST['tgl'];
        $datapenjualan = $_POST['datapenjualan'];
        $datapersediaan = $_POST['datapersediaan'];
        $dataproduksi = $_POST['dataproduksi'];
    ?>
    <?php
    }
    ?>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->