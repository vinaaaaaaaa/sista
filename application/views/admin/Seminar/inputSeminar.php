<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('admin/tools/header');
?>
<div class="main-content">
    <section class="section">


        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <?php $this->load->view('layouts/_alerts.php') ?>
                            <form action="<?= base_url('Admin/addSeminar') ?>" method="POST">
                                <div class="form-group">
                                    <label>Semester</label>
                                    <input type="text" name="semester" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Jam</label>
                                    <input type="time" name="jam" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>kategori</label>
                                    <select name="kategori_seminar_id" class="form-control">
                                        <?php foreach ($kategori as $kategoris) { ?>
                                            <option value="<?= $kategoris->id ?>"><?= $kategoris->nama ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>NIM</label>
                                    <input type="text" name="nim" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nama mahasiswa</label>
                                    <input type="text" name="nama_mahasiswa" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" name="judul" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <input type="text" name="lokasi" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Pembimbing</label>
                                    <select name="pembimbing_id" class="form-control">
                                        <?php foreach ($dosen as $dosens) { ?>
                                            <option value="<?= $dosens->id ?>"><?= $dosens->nama ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Penguji 1</label>
                                    <select name="penguji1_id" class="form-control">
                                        <?php foreach ($dosen as $dosens) { ?>
                                            <option value="<?= $dosens->id ?>"><?= $dosens->nama ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Penguji 2</label>
                                    <select name="penguji2_id" class="form-control">
                                        <?php foreach ($dosen as $dosens) { ?>
                                            <option value="<?= $dosens->id ?>"><?= $dosens->nama ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-primary" value="SUBMIT">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('admin/tools/footer'); ?>