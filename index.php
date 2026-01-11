<?php
session_start();
include "config.php";
include "class/Database.php";
include "class/Auth.php";
include "class/Barang.php";

$path = $_GET['path'] ?? 'home/index';
$segments = explode('/', trim($path, '/'));

$mod  = $segments[0] ?? 'home';
$page = $segments[1] ?? 'index';
$id   = $segments[2] ?? null;

$file = "modules/$mod/$page.php";

if (file_exists($file)) {

    include "template/assets.php";

    $noLayout = [
    'auth/login',
    'home/index'
    ];


    if (!in_array("$mod/$page", $noLayout)) {
        include "template/header.php";
    }

    include $file;

    if (!in_array("$mod/$page", $noLayout)) {
        include "template/footer.php";
    }

} else {
    echo "<h3 class='text-danger text-center mt-5'>404 Page</h3>";
}
