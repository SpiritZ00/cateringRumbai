<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pesanan | Catering Rumbai Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
            <a class="nav-link active " href="?aksi=index"><i class="bi bi-journal-text"></i> Data Pesanan</a>
            <?php if (isset($_SESSION['jabatan']) && $_SESSION['jabatan'] === 'admin'): ?>
                <a class="nav-link .bg-primary" href="?aksi=list_user"><i class="bi bi-people"></i> Data User</a>
                <a class="nav-link" href="?aksi=list_menu"><i class="bi bi-card-list"></i> Kelola Menu</a>
            <?php endif; ?>
            <a class="nav-link .bg-primary" href="?aksi=frontend"><i class="bi bi-globe"></i> Lihat Menu</a>
            <hr style="border-color: rgba(255,255,255,0.1);">
            <a class="nav-link text-light mt-auto bg-danger" href="?aksi=logout" onclick="return confirm('Yakin keluar?')"><i class="bi bi-box-arrow-left"></i> Logout</a>
        </div>
        </nav>

        <main class="main-content">
            <div class="top-navbar d-flex justify-content-between align-items-center ">
                <span class="fw-bold text-secondary">Selamat Datang, <?= htmlspecialchars($_SESSION['nama'] ?? 'Pengguna'); ?>!</span>
            </div>

            <div class="card border-0 shadow-sm p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold mb-0 text-dark">Pesanan Masuk</h3>
                    <a href="?aksi=tambah" class="btn btn-primary fw-bold"><i class="bi bi-plus-lg"></i> Tambah Pesanan</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle table-custom">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Pemesan</th>
                                <th>Tanggal</th>
                                <th>Porsi</th>
                                <th>Jenis Paket</th>
                                <th>Tempat Acara</th>
                                <th>Catatan</th>
                                <th>Telepon</th>
                                <th width="12%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if (isset($pesanan) && mysqli_num_rows($pesanan) > 0) {
                                while ($row = mysqli_fetch_assoc($pesanan)) :
                            ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td class="fw-bold"><?= htmlspecialchars($row['nama']); ?></td>
                                        <td><?= date('d M Y', strtotime($row['tanggal_pesan'])); ?></td>
                                        <td><span class="badge bg-secondary"><?= htmlspecialchars($row['jumlah_porsi']); ?> Porsi</span></td>
                                        <td><?= htmlspecialchars($row['jenis_konsumsi']); ?></td>
                                        <td><i class="bi bi-geo-alt-fill text-danger"></i> <?= htmlspecialchars($row['tempat']); ?></td>
                                        <td><span class="text-muted"><?= htmlspecialchars($row['catatan']); ?></span></td>
                                        <td><?= htmlspecialchars($row['nomor_telepon']); ?></td>
                                        <td class="text-center">
                                            <a href="?aksi=edit&id=<?= $row['id']; ?>" class="btn btn-warning btn-sm text-white"><i class="bi bi-pencil-square"></i></a>
                                            <a href="?aksi=hapus&id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')"><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                            <?php
                                endwhile;
                            } else {
                                echo '<tr><td colspan="9" class="text-center text-muted">Belum ada data pesanan masuk.</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>