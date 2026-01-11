<?php
$db = new Database();
$message = "";

if ($_POST) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
    $res = $db->query($sql);

    if ($res && $res->num_rows == 1) {
        $user = $res->fetch_assoc();

        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'admin') {
            header("Location: /uas_manajemen_barang/admin/dashboard");
        } else {
            header("Location: /uas_manajemen_barang/user/dashboard");
        }
        exit;
    } else {
        $message = "Username atau password salah!";
    }
}
?>

<div class="d-flex justify-content-center align-items-center" style="min-height:100vh; background:#f4f6f9;">
    <div class="card shadow-sm p-4" style="width:400px;">
        <h4 class="text-center mb-3">Login</h4>

        <form method="post">
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button class="btn btn-primary w-100">Login</button>
        </form>

        <div class="text-center mt-3 text-muted" style="font-size: 13px;">
            © 2026 Manajamen Gudang
        </div>
    </div>
</div>
