<?php
$db = new Database();
$total = Barang::count();

$barang = $db->query("
    SELECT barang.*, kategori.nama AS nama_kategori
    FROM barang
    LEFT JOIN kategori ON barang.kategori_id = kategori.id
    ORDER BY barang.id DESC
    LIMIT 5
");
?>

<div class="main-content">
    <h3 class="mb-4">Dashboard User</h3>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h5>Total Barang</h5>
                    <h2><?= $total ?></h2>
                </div>
            </div>
        </div>
    </div>

    <h5>Barang Terbaru</h5>

    <div class="card shadow">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <tr class="table-dark">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                </tr>

                <?php $no=1; while($row = $barang->fetch_assoc()): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['nama_kategori'] ?></td>
                    <td>Rp <?= number_format($row['harga_jual']) ?></td>
                    <td><?= $row['stok'] ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</div>
