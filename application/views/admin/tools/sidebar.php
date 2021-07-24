<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand sidebar-gone-show"><a href="<?php echo base_url(); ?>">Stisla</a></div>
        <ul class="sidebar-menu">
            <li><a class="nav-link" href="<?php echo base_url('Admin'); ?>"><i class="fas fa-pencil-ruler"></i> <span>Dashboard</span></a></li>
            <li><a class="nav-link" href="<?php echo base_url('Admin/Penilaian'); ?>"><i class="far fa-square"></i> <span>Penilaian</span></a></li>
            <li><a class="nav-link" href="<?php echo base_url('Admin/Kategori'); ?>"><i class="fas fa-pencil-ruler"></i> <span>Kategori Seminar</span></a></li>
            <li><a class="nav-link" href="<?php echo base_url('Admin/Dosen'); ?>"><i class="far fa-square"></i> <span>Dosen</span></a></li>
            <li><a class="nav-link" href="<?php echo base_url('Admin/Seminar'); ?>"><i class="fas fa-pencil-ruler"></i> <span>Seminar</span></a></li>
        </ul>

    </aside>
</div>