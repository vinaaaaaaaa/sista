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
                            <form action="<?= base_url('Admin/addDosen') ?>" method="POST">
                                <div class="form-group">
                                    <label>NIDN</label>
                                    <input type="text" name="nidn" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control">
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