<?php
$data = Barang::all();
?>
<div class="main-content">


<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h3>Data Barang</h3>
        <a href="/uas_manajemen_barang/admin/barang_add" class="btn btn-primary">+ Tambah Barang</a>
    </div>

    <div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr class="table-dark">
            <th>No</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
            <th>Status</th>
        </tr>

        <?php $no=1; while($row = $data->fetch_assoc()): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['nama_kategori'] ?></td>
            <td>
                Beli: <?= number_format($row['harga_beli']) ?><br>
                Jual: <?= number_format($row['harga_jual']) ?>
            </td>
            <td><?= $row['stok'] ?></td>
            <td>
               <a href="/uas_manajemen_barang/admin/barang_edit/<?= $row['id'] ?>" class="btn btn-warning btn-sm">
                Edit
            </a>


                <a href="/uas_manajemen_barang/admin/barang_delete/<?= $row['id'] ?>" 
                onclick="return confirm('Yakin hapus data?')" 
                class="btn btn-danger btn-sm">Hapus</a>
            </td>
            <td>
                <?php
                if ($row['stok'] == 0) {
                    echo "<span class='badge bg-danger'>Habis</span>";
                } elseif ($row['stok'] <= 10) {
                    echo "<span class='badge bg-warning text-dark'>Menipis</span>";
                } elseif ($row['stok'] <= 50) {
                    echo "<span class='badge bg-info text-dark'>Cukup</span>";
                } else {
                    echo "<span class='badge bg-success'>Aman</span>";
                }

                ?>
            </td>

        </tr>

        <?php endwhile; ?>
    </table>
    </div>
</div>
</div>
