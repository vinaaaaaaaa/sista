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
                            <h4>Seminar</h4>
                            <a href="<?= base_url('Admin/inputSeminar') ?>" class="btn btn-primary">Tambah</a>
                        </div>
                        <div class="card-body">
                            <?php $this->load->view('layouts/_alerts.php') ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Jam</th>
                                        <th scope="col">Kategori Seminar</th>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Nama Mahasiswa</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Lokasi</th>
                                        <th scope="col">Nama Dosen Pembimbing</th>
                                        <th scope="col">Penguji 1</th>
                                        <th scope="col">Penguji 2</th>
                                        <th scope="col">Nilai Pembimbing</th>
                                        <th scope="col">Nilai Penguji 1</th>
                                        <th scope="col">Nilai Penguji 2</th>
                                        <th scope="col">Nilai Akhir</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($seminar as $seminars) { ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $seminars->semester ?></td>
                                            <td><?= $seminars->tanggal ?></td>
                                            <td><?= $seminars->jam ?></td>
                                            <td><?= $seminars->nama_kategori ?></td>
                                            <td><?= $seminars->nim ?></td>
                                            <td><?= $seminars->nama_mahasiswa ?></td>
                                            <td><?= $seminars->judul ?></td>
                                            <td><?= $seminars->lokasi ?></td>
                                            <td>
                                                <?php
                                                foreach ($dosen as $dosens) {
                                                    if ($dosens->id == $seminars->pembimbing_id) {
                                                        echo $dosens->nama;
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                foreach ($dosen as $dosens) {
                                                    if ($dosens->id == $seminars->penguji1_id) {
                                                        echo $dosens->nama;
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                foreach ($dosen as $dosens) {
                                                    if ($dosens->id == $seminars->penguji2_id) {
                                                        echo $dosens->nama;
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td><?= $seminars->nilai_pembimbing ?></td>
                                            <td><?= $seminars->nilai_penguji1 ?></td>
                                            <td><?= $seminars->nilai_penguji2 ?></td>
                                            <td><?php
                                                if (!$seminars->nilai_pembimbing) {
                                                    echo "Nilai Belum Lengkap";
                                                } else {
                                                    echo $seminars->nilai_akhir;
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('Admin/nilaiSeminar/' . $seminars->id) ?>" class="btn btn-success">Nilai</a>
                                                <a href="<?= base_url('Admin/deleteSeminar/' . $seminars->id) ?>" class="btn btn-danger">Delete</a>|
                                                <a href="<?= base_url('Admin/editSeminar/' . $seminars->id) ?>" class="btn btn-primary">Edit</a>
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