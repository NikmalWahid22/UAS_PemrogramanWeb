<?php
if (!isset($id)) {
    echo "<script>alert('ID tidak ditemukan');history.back();</script>";
    exit;
}

$db = new Database();

$sql = "DELETE FROM barang WHERE id = $id";
$db->query($sql);

header("Location: /uas_manajemen_barang/admin/barang_list");
exit;
