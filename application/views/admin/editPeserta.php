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
                            <form action="<?= base_url('Admin/updatePeserta/' . $peserta->id) ?>" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $peserta->id ?>">
                                <div class="form-group">
                                    <label>Kehadiran</label>
                                    <select name="kehadiran" class="form-control">
                                        <?php
                                        $kehadirans = ['Masuk', 'Alpa', 'Izin'];
                                        foreach ($kehadirans as $kehadiran) {
                                        ?>
                                            <option value="<?= $kehadiran ?>"><?= $kehadiran ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <a href="<?= base_url('Admin') ?>" class="btn btn-danger">Back</a>
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