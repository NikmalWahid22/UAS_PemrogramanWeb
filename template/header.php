<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>UAS Manajemen Barang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .sidebar {
            position: fixed;
            top: 56px;
            left: 0;
            width: 250px;
            height: calc(100vh - 56px);
            background-color: #212529;
            padding-top: 1rem;
            overflow-y: auto;
            transition: left 0.3s ease;
            z-index: 1050;
        }

        .main-content {
            margin-left: 250px;
            margin-top: 56px;
            padding: 24px;
            min-height: calc(100vh - 56px);
            transition: margin-left 0.3s ease;
        }


        /* MOBILE */
        @media (max-width: 768px) {
            .sidebar {
                left: -250px;
            }

            .sidebar.active {
                left: 0;
            }

            .main-content {
                margin-left: 0;
            }

            footer {
                margin-left: 250px;
            }
        }

    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm">
    <div class="container-fluid">

        <button class="btn btn-outline-light d-md-none" onclick="toggleSidebar()">
            <i class="bi bi-list"></i>
        </button>

        <a class="navbar-brand" href="index.php?path=<?= ($_SESSION['role'] ?? 'home') ?>/dashboard">
            <i class="bi bi-box-seam"></i> Manajemen Barang
        </a>
    </div>
</nav>

<?php
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    if ($_SESSION['role'] === 'admin') {
        require __DIR__ . '/sidebar_admin.php';
    } elseif ($_SESSION['role'] === 'user') {
        require __DIR__ . '/sidebar_user.php';
    }
}
?>
