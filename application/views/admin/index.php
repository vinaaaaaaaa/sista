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
                            <h4>User</h4>
                        </div>
                        <div class="card-body">
                            <?php $this->load->view('layouts/_alerts.php') ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama Peserta</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Seminar ID</th>
                                        <th scope="col">Kehadiran</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($peserta_seminars as $peserta_seminar) { ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $peserta_seminar->nama ?></td>
                                            <td><?= $peserta_seminar->email ?></td>
                                            <td><?= $peserta_seminar->seminar_id ?></td>
                                            <td><?= $peserta_seminar->kehadiran ?></td>
                                            <td>
                                                <a href="<?= base_url('Admin/editPeserta/' . $peserta_seminar->id) ?>" class="btn btn-primary">Edit</a>
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