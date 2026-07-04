<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'app/controllers/PesananController.php';
require_once 'app/controllers/AuthController.php';
require_once 'app/controllers/MenuController.php';

$pesananController = new PesananController();
$authController = new AuthController();
$menuController = new MenuController();

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'frontend';

if (
    $aksi == 'index' || $aksi == 'tambah' || $aksi == 'simpan' ||
    $aksi == 'edit' || $aksi == 'update' || $aksi == 'hapus' ||
    $aksi == 'list_user' || $aksi == 'edit_user' ||
    $aksi == 'update_user' || $aksi == 'hapus_user' || $aksi == 'list_menu' || $aksi == 'tambah_menu' ||
    $aksi == 'simpan_menu' || $aksi == 'edit_menu' || $aksi == 'update_menu' || $aksi == 'hapus_menu'
) {

    if (!isset($_SESSION['login'])) {
        header('Location: index.php?aksi=login');
        exit;
    }
}


switch ($aksi) {
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->prosesLogin();
        } else {
            $authController->login();
        }
        break;
    case 'prosesLogin':
        $authController->prosesLogin();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->prosesRegister();
        } else {
            $authController->register();
        }
        break;
    case 'prosesRegister':
        $authController->prosesRegister();
        break;
    case 'list_user':
        $authController->list_user();
        break;
    case 'edit_user':
        $authController->edit_user();
        break;
    case 'update_user':
        $authController->update_user();
        break;
    case 'hapus_user':
        $authController->hapus_user();
        break;

    case 'index':
        $pesananController->index();
        break;
    case 'tambah':
        $pesananController->tambah();
        break;
    case 'frontend':
        $pesananController->frontend();
        break;
    case 'simpan':
        $pesananController->simpan();
        break;
    case 'edit':
        $pesananController->edit();
        break;
    case 'update':
        $pesananController->update();
        break;
    case 'hapus':
        $pesananController->hapus();
        break;
    case 'about':
        $pesananController->about();
        break;

    case 'contact':
        $pesananController->contact();
        break;
    case 'list_menu':
        $menuController->index();
        break;
    case 'tambah_menu':
        $menuController->tambah();
        break;
    case 'simpan_menu':
        $menuController->simpan();
        break;
    case 'edit_menu':
        $menuController->edit();
        break;
    case 'update_menu':
        $menuController->update();
        break;
    case 'hapus_menu':
        $menuController->hapus();
        break;
    default:
        $pesananController->frontend();
        break;
}
