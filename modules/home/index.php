<div class="container">
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow text-center">
                <div class="card-body p-4">
                    <h2 class="mb-3">Selamat Datang</h2>
                    <p class="text-muted">
                        Silahkan Klik tombol <strong>Login</strong> Untuk melanjutkan.
                    </p>

                    <?php if (!isset($_SESSION['user'])): ?>
                        <a href="/uas_manajemen_barang/auth/login" class="btn btn-primary mt-2">
                            Login
                        </a>
                    <?php else: ?>
                        <a href="/uas_manajemen_barang/<?= $_SESSION['user']['role'] ?>/dashboard"
                           class="btn btn-success mt-2">
                            Masuk Dashboard
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
