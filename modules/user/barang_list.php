<?php
$limit = 5; // jumlah data per halaman
$page  = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page  = $page < 1 ? 1 : $page;
$offset = ($page - 1) * $limit;

$q = $_GET['q'] ?? '';
$kategori = $_GET['kategori'] ?? '';

$totalData = Barang::countFiltered($q, $kategori);
$totalPage = ceil($totalData / $limit);

$data = Barang::filter($q, $kategori, $limit, $offset);
?>

<div class="main-content">
<div class="container mt-4">
    <h3>Daftar Barang</h3>

    <!-- Search -->
    <form method="get" class="row g-2 mb-3">
        <input type="hidden" name="path" value="user/barang_list">

        <div class="col-md-4">
            <input type="text" name="q" class="form-control" placeholder="Cari nama..." value="<?= htmlspecialchars($q) ?>">
        </div>

        <div class="col-md-3">
            <select name="kategori" class="form-select">
                <option value="">-- Semua Kategori --</option>
                <option value="1" <?= $kategori=='1'?'selected':'' ?>>Elektornik</option>
                <option value="2" <?= $kategori=='2'?'selected':'' ?>>ATK</option>
                <option value="3" <?= $kategori=='3'?'selected':'' ?>>Makanan</option>
                <option value="4" <?= $kategori=='4'?'selected':'' ?>>Minuman</option>
            </select>
        </div>

        <div class="col-md-2">  
            <button class="btn btn-primary w-100">Filter</button>
        </div>
    </form>

    <!-- Table -->
    <div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr class="table-dark">
            <th>No</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Status</th>
        </tr>

        <?php $no = $offset + 1; while($row = $data->fetch_assoc()): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['nama_kategori']) ?></td>
            <td>Rp <?= number_format($row['harga_jual']) ?></td>
            <td><?= $row['stok'] ?></td>
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

    <!-- Pagination -->
    <nav>
        <ul class="pagination justify-content-center">

            <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="?path=user/barang_list&page=<?= $page-1 ?>&q=<?= urlencode($q) ?>&kategori=<?= $kategori ?>">«</a>
            </li>

            <?php for ($i=1; $i <= $totalPage; $i++): ?>
                <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                    <a class="page-link" href="?path=user/barang_list&page=<?= $i ?>&q=<?= urlencode($q) ?>&kategori=<?= $kategori ?>">
                        <?= $i ?>
                    </a>
                </li>
            <?php endfor; ?>

            <li class="page-item <?= $page >= $totalPage ? 'disabled' : '' ?>">
                <a class="page-link" href="?path=user/barang_list&page=<?= $page+1 ?>&q=<?= urlencode($q) ?>&kategori=<?= $kategori ?>">»</a>
            </li>

        </ul>
    </nav>

</div>
</div>
