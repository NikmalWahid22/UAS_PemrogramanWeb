<?php $path = $_GET['path'] ?? ''; ?>

<div class="sidebar text-white bg-dark">
    <h5 class="text-center mb-4">User Panel</h5>

    <ul class="nav flex-column px-2">
        <li class="nav-item mb-2">
            <a class="nav-link text-white <?= $path=='user/dashboard'?'active bg-secondary rounded':'' ?>" href="index.php?path=user/dashboard">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>

        <li class="nav-item mb-2">
            <a class="nav-link text-white <?= $path=='user/barang_list'?'active bg-secondary rounded':'' ?>" href="index.php?path=user/barang_list">
                <i class="bi bi-box-seam me-2"></i> Lihat Barang
            </a>
        </li>

        <li class="nav-item mb-2">
            <a class="nav-link text-white <?= $path=='user/profile'?'active bg-secondary rounded':'' ?>" href="index.php?path=user/profile">
                <i class="bi bi-person me-2"></i> Profil Saya
            </a>
        </li>


        <hr>
        <li class="nav-item">
            <a class="nav-link text-danger" href="index.php?path=auth/logout">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
            </a>
        </li>
    </ul>
</div>
