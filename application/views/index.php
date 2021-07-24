<?php $this->load->view('tools/header') ?>
<!--services start -->
<div class="about_main">
  <div class="container">
    <table class="table table-striped text-dark">
      <thead>
        <tr>
          <th>No</th>
          <th>Semester</th>
          <th>Tanggal</th>
          <th>Jam</th>
          <th>Kategori</th>
          <th>NIM</th>
          <th>Nama</th>
          <th>Judul Seminar</th>
          <th>Pembimbing</th>
          <th>Penguji 1</th>
          <th>Penguji 2</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $nomor = 1;
        foreach ($seminars as $seminar) {
        ?>
          <tr>
            <td><?php echo $nomor++; ?></td>
            <td><?php echo $seminar->semester ?></td>
            <td><?php echo $seminar->tanggal ?></td>
            <td><?php echo $seminar->jam ?></td>
            <td><?php echo $seminar->nama_kategori ?></td>
            <td><?php echo $seminar->nim ?></td>
            <td><?php echo $seminar->nama_mahasiswa ?></td>
            <td><?php echo $seminar->judul ?></td>
            <td><?php
                foreach ($dosen as $dosens) {
                  if ($dosens->id == $seminar->pembimbing_id) {
                    echo $dosens->nama;
                  }
                }
                ?>
            </td>
            <td><?php
                foreach ($dosen as $dosens) {
                  if ($dosens->id == $seminar->penguji1_id) {
                    echo $dosens->nama;
                  }
                }
                ?>
            </td>
            <td><?php
                foreach ($dosen as $dosens) {
                  if ($dosens->id == $seminar->penguji2_id) {
                    echo $dosens->nama;
                  }
                }
                ?>
            </td>

          </tr>

        <?php
          $nomor++;
        }
        ?>


      </tbody>
    </table>
  </div>
</div>

<!--Contact_section start -->
<?php $this->load->view('tools/footer') ?>