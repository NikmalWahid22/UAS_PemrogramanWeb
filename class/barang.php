<?php
class Barang {

    // Ambil semua barang (untuk admin & user)
    public static function all() {
        $db = new Database();
        return $db->query("
            SELECT barang.*, kategori.nama AS nama_kategori
            FROM barang
            LEFT JOIN kategori ON barang.kategori_id = kategori.id
            ORDER BY barang.id DESC
        ");
    }

    // Ambil 1 barang berdasarkan ID
    public static function find($id) {
        $db = new Database();
        $id = (int)$id;
        return $db->fetch("
            SELECT barang.*, kategori.nama AS nama_kategori
            FROM barang
            LEFT JOIN kategori ON barang.kategori_id = kategori.id
            WHERE barang.id = $id
        ");
    }

    // Search + Filter barang
    public static function filter($q = '', $kategori = '', $limit = 10, $offset = 0) {
    $db = new Database();
    $where = [];

    if ($q !== '') {
        $q = $db->escape($q);
        $where[] = "barang.nama LIKE '%$q%'";
    }

    if ($kategori !== '') {
        $kategori = (int)$kategori;
        $where[] = "barang.kategori_id = $kategori";
    }

    $sql = "
        SELECT barang.*, kategori.nama AS nama_kategori
        FROM barang
        LEFT JOIN kategori ON barang.kategori_id = kategori.id
    ";

    if ($where) {
        $sql .= " WHERE " . implode(' AND ', $where);
    }

    $sql .= " ORDER BY barang.id DESC LIMIT $limit OFFSET $offset";

    return $db->query($sql);
}

public static function countFiltered($q = '', $kategori = '') {
    $db = new Database();
    $where = [];

    if ($q !== '') {
        $q = $db->escape($q);
        $where[] = "barang.nama LIKE '%$q%'";
    }

    if ($kategori !== '') {
        $kategori = (int)$kategori;
        $where[] = "barang.kategori_id = $kategori";
    }

    $sql = "SELECT COUNT(*) as total FROM barang";

    if ($where) {
        $sql .= " WHERE " . implode(' AND ', $where);
    }

    $row = $db->fetch($sql);
    return $row['total'];
}

    // Tambah barang
    public static function insert($d) {
        $db = new Database();

        return $db->query("
            INSERT INTO barang (nama, kategori_id, harga_beli, harga_jual, stok)
            VALUES (
                '{$db->escape($d['nama'])}',
                '{$db->escape($d['kategori_id'])}',
                '{$db->escape($d['harga_beli'])}',
                '{$db->escape($d['harga_jual'])}',
                '{$db->escape($d['stok'])}'
            )
        ");
    }

    // Update barang
    public static function update($id, $d) {
        $db = new Database();
        $id = (int)$id;

        return $db->query("
            UPDATE barang SET
                nama        = '{$db->escape($d['nama'])}',
                kategori_id = '{$db->escape($d['kategori_id'])}',
                harga_beli  = '{$db->escape($d['harga_beli'])}',
                harga_jual  = '{$db->escape($d['harga_jual'])}',
                stok        = '{$db->escape($d['stok'])}'
            WHERE id = $id
        ");
    }

    // Hapus barang
    public static function delete($id) {
        $db = new Database();
        $id = (int)$id;
        return $db->query("DELETE FROM barang WHERE id = $id");
    }

    // Hitung total barang
    public static function count() {
        $db = new Database();
        $result = $db->query("SELECT COUNT(*) AS total FROM barang");
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    // Hitung stok habis
    public static function countHabis() {
        $db = new Database();
        $result = $db->query("SELECT COUNT(*) AS total FROM barang WHERE stok = 0");
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    // Hitung stok menipis (<=5)
    public static function countMenipis() {
        $db = new Database();
        $result = $db->query("SELECT COUNT(*) AS total FROM barang WHERE stok <= 5");
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    // Ambil barang terbaru
    public static function latest($limit = 5) {
    $db = new Database();
    $limit = (int)$limit;

    return $db->query("
        SELECT barang.*, kategori.nama AS nama_kategori
        FROM barang
        LEFT JOIN kategori ON barang.kategori_id = kategori.id
        ORDER BY barang.id DESC
        LIMIT $limit
    ");
}

}
