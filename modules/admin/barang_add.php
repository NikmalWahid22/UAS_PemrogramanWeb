<?php
if ($_POST) {
    Barang::insert($_POST);
    header("Location: /uas_manajemen_barang/admin/barang_list");
    exit;
}

$db = new Database();
$kategori = $db->query("SELECT * FROM kategori");
?>

<div class="main-content">
<div class="container mt-4">
    <h3>Tambah Barang</h3>

    <form method="post" class="card p-4 shadow">
        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                <?php while ($k = $kategori->fetch_assoc()): ?>
                    <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Harga Beli</label>
            <input type="number" name="harga_beli" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Harga Jual</label>
            <input type="number" name="harga_jual" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="/uas_manajemen_barang/admin/barang_list" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</div>
