<?php $path = $_GET['path'] ?? ''; ?>

<div class="sidebar text-white bg-dark">
    <h5 class="text-center mb-4">Admin Panel</h5>

    <ul class="nav flex-column px-2">

        <li class="nav-item mb-2">
            <a class="nav-link text-white <?= $path == 'admin/dashboard' ? 'active bg-secondary rounded' : '' ?>"
               href="index.php?path=admin/dashboard">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>

        <li class="nav-item mb-2">
            <a class="nav-link text-white <?= $path == 'admin/barang_list' ? 'active bg-secondary rounded' : '' ?>"
               href="index.php?path=admin/barang_list">
                <i class="bi bi-box-seam me-2"></i> Data Barang
            </a>
        </li>

        <li class="nav-item mb-2">
            <a class="nav-link text-white <?= $path == 'admin/barang_add' ? 'active bg-secondary rounded' : '' ?>"
               href="index.php?path=admin/barang_add">
                <i class="bi bi-plus-circle me-2"></i> Tambah Barang
            </a>
        </li>

        <hr class="text-secondary">

        <li class="nav-item">
            <a class="nav-link text-danger" href="index.php?path=auth/logout">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
            </a>
        </li>

    </ul>
</div>