<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('user/tools/header');
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
                                        <th scope="col">NIM</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Kehadiran</th>
                                        <th scope="col">Kode Tiket</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1; ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><?= $this->session->userdata('nim') ?></td>
                                        <td><?= $this->session->userdata('nama') ?></td>
                                        <td><?= $this->session->userdata('email') ?></td>
                                        <td><?= $this->session->userdata('kehadiran') ?></td>
                                        <td>
                                            <?= $this->session->userdata('tiket') ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
<?php $this->load->view('user/tools/footer'); ?>