<?php
// Pastikan ambil dari router (index.php)
$id = $id ?? ($_GET['id'] ?? null);

if (!$id) {
    echo "<div class='alert alert-danger'>ID tidak dikirim.</div>";
    exit;
}

$data = Barang::find($id);

if (!$data) {
    echo "<div class='alert alert-danger'>Data barang tidak ditemukan.</div>";
    exit;
}

$db = new Database();
$kategoriList = $db->query("SELECT * FROM kategori ORDER BY nama ASC");

if ($_POST) {
    Barang::update($id, $_POST);
    header("Location: /uas_manajemen_barang/admin/barang_list");
    exit;
}
?>

<div class="main-content">
<div class="container mt-4">
    <h3>Edit Barang</h3>

    <form method="post" class="card p-4 shadow">

        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                <?php while($k = $kategoriList->fetch_assoc()): ?>
                    <option value="<?= $k['id'] ?>" <?= $k['id'] == $data['kategori_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($k['nama']) ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Harga Beli</label>
            <input type="number" name="harga_beli" value="<?= $data['harga_beli'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Harga Jual</label>
            <input type="number" name="harga_jual" value="<?= $data['harga_jual'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" value="<?= $data['stok'] ?>" class="form-control" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="/uas_manajemen_barang/admin/barang_list" class="btn btn-secondary">Batal</a>
    </form>
</div>
</div>
