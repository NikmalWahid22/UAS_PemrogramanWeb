<?php
$totalBarang = Barang::count();
$barangTerbaru = Barang::latest(5);
?>

<div class="main-content">
    <h3 class="mb-4">Dashboard Admin</h3>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h6 class="text-muted">Total Barang</h6>
                    <h2><?= $totalBarang ?></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <h5 class="mb-3">Barang Terbaru</h5>
            <table class="table table-bordered">
                <tr><th>No</th><th>Nama</th><th>Stok</th></tr>
                <?php $no=1; while($b=$barangTerbaru->fetch_assoc()): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $b['nama'] ?></td>
                    <td><?= $b['stok'] ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</div>
