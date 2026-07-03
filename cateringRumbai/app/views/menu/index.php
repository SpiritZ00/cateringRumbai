<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Menu | Catering Rumbai Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>
    <div class="wrapper">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="https://1000logos.net/wp-content/uploads/2017/12/Chevron-Logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                    Catering Rumbai
                </a>
            </div>
        </nav>
        <div class="nav flex-column nav-pills ">
            <a class="nav-link " href="?aksi=index"><i class="bi bi-journal-text"></i> Data Pesanan</a>
            <?php if (isset($_SESSION['jabatan']) && $_SESSION['jabatan'] === 'admin'): ?>
                <a class="nav-link" href="?aksi=list_user"><i class="bi bi-people"></i> Data User</a>
                <a class="nav-link active" href="?aksi=list_menu"><i class="bi bi-card-list"></i> Kelola Menu</a>
            <?php endif; ?>
            <a class="nav-link .bg-primary" href="?aksi=frontend"><i class="bi bi-globe"></i> Lihat Menu</a>
            <hr style="border-color: rgba(255,255,255,0.1);">
            <a class="nav-link text-light mt-auto bg-danger" href="?aksi=logout" onclick="return confirm('Yakin keluar?')"><i class="bi bi-box-arrow-left"></i> Logout</a>
        </div>
        </nav>

        <main class="main-content">


            <div class="card border-0 shadow-sm p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold mb-0 text-dark">Kelola Menu</h3>
                    <a href="?aksi=tambah_menu" class="btn btn-primary fw-bold">
                        <i class="bi bi-plus-lg"></i> Tambah Menu
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle table-secondary">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Gambar</th>
                                <th>Nama Paket</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Satuan</th>
                                <th width="12%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if (isset($menu) && mysqli_num_rows($menu) > 0) {
                                while ($row = mysqli_fetch_assoc($menu)):
                            ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>
                                            <img src="<?= htmlspecialchars($row['gambar']); ?>"
                                                width="80" height="60"
                                                style="object-fit:cover; border-radius:8px;">
                                        </td>
                                        <td class="fw-bold"><?= htmlspecialchars($row['nama_paket']); ?></td>
                                        <td><span class="text-muted"><?= htmlspecialchars($row['deskripsi']); ?></span></td>
                                        <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                                        <td><?= htmlspecialchars($row['satuan']); ?></td>
                                        <td class="text-center">
                                            <a href="?aksi=edit_menu&id=<?= $row['id']; ?>"
                                                class="btn btn-warning btn-sm text-white">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="?aksi=hapus_menu&id=<?= $row['id']; ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin hapus menu ini?')">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                            <?php
                                endwhile;
                            } else {
                                echo '<tr><td colspan="7" class="text-center text-muted">Belum ada data menu.</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>