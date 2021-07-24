<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('admin/tools/header');
?>
<div class="main-content">
    <section class="section">


        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Kategori</h4>
                            <a href="<?= base_url('Admin/inputKategori') ?>" class="btn btn-primary">Tambah</a>
                        </div>
                        <div class="card-body">
                            <?php $this->load->view('layouts/_alerts.php') ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama Kategori</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kategori as $kategoris) { ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $kategoris->nama ?></td>
                                            <td>
                                                <a href="<?= base_url('Admin/deleteKategori/' . $kategoris->id) ?>" class="btn btn-danger">Delete</a>|
                                                <a href="<?= base_url('Admin/editKategori/' . $kategoris->id) ?>" class="btn btn-primary">Edit</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
<?php $this->load->view('admin/tools/footer'); ?>