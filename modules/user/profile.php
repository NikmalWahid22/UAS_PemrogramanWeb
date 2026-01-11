<?php
$db = new Database();

$user_id = $_SESSION['user_id'];

$user = $db->query(
    "SELECT username, nama, role FROM users WHERE id='$user_id'"
)->fetch_assoc();

if ($_POST) {
    $username = $_POST['username'];
    $nama     = $_POST['nama'];

    if (!empty($_POST['password'])) {
        $password = md5($_POST['password']); // SESUAI LOGIN LU
        $db->query("
            UPDATE users SET
            username='$username',
            nama='$nama',
            password='$password'
            WHERE id='$user_id'
        ");
    } else {
        $db->query("
            UPDATE users SET
            username='$username',
            nama='$nama'
            WHERE id='$user_id'
        ");
    }

    $_SESSION['username'] = $username;

    header("Location: index.php?path=user/profile");
    exit;
}
?>

<div class="main-content">
    <h3 class="mb-4">Profil Saya</h3>

    <form method="post" class="card p-4 shadow" style="max-width:500px;">
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control"
                   value="<?= $user['username'] ?>" required>
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control"
                   value="<?= $user['nama'] ?>" required>
        </div>

        <div class="mb-3">
            <label>Password Baru (opsional)</label>
            <input type="password" name="password" class="form-control">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti password</small>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
