<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Menu | Catering Rumbai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            background-color: #f8f9fa;
        }

        .card {
            border-radius: 12px;
        }

        .total-box {
            background-color: #fff3e0;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #ff9800;
        }

        .total-nominal {
            font-size: 1.25rem;
            font-weight: bold;
            color: #e65100;
        }

        .btn-primary {
            background-color: #e65100 !important;
            border-color: #e65100 !important;
            color: white !important;
        }

        .btn-primary:hover {
            background-color: #ff9800 !important;
            border-color: #ff9800 !important;
        }

        .hero-section {
            background-color: #E31837;
            color: white;
            padding: 60px 0;
            text-align: center;
            margin-bottom: 40px;
        }

        .menu-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        .menu-card:hover {
            transform: translateY(-5px);
        }

        .badge-harga {
            background-color: #28a745;
            color: white;
            font-size: 1.1rem;
            padding: 8px 15px;
            border-radius: 20px;
            display: block;
            text-align: center;
            margin-bottom: 10px;
        }

        .stat-box {
            background: #fff3e0;
            padding: 1rem;
            border-radius: 8px;
        }

        .stat-number {
            font-weight: bold;
            color: #e65100;
        }
    </style>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #0066CC;">
        <a class="navbar-brand fw-bold text-white" href="?aksi=frontend">
            <i class="bi bi-shop"></i> Catering Rumbai
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="#about">
                        <i class="bi bi-person-circle"></i> About Us
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="#contact">
                        <i class="bi bi-envelope"></i> Contact
                    </a>
                </li>
            </ul>

            <div class="d-flex align-items-center gap-2">
                <?php if (isset($_SESSION['login'])): ?>
                    <span class="text-white ms-2">Halo, <?= htmlspecialchars($_SESSION['nama']); ?>!</span>
                    <a href="?aksi=tambah" class="btn btn-success btn-sm fw-bold">
                        <i class="bi bi-cart-plus"></i> Buat Pesanan
                    </a>
                    <a href="?aksi=index" class="btn btn-primary btn-sm fw-bold">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                <?php else: ?>
                    <a href="?aksi=login" class="btn btn-warning btn-sm fw-bold">
                        <i class="bi bi-box-arrow-in-right"></i> Login / Daftar
                    </a>
                <?php endif; ?>
            </div>
        </div>
        </div>
    </nav>
    <div class="hero-section">
        <div class="container">
            <h1 class="fw-bold display-4">Selamat Datang di Catering Rumbai</h1>
            <p class="lead">Menyediakan hidangan lezat dan berkualitas untuk setiap momen spesial Anda.</p>
        </div>
    </div>
    <div class="container pb-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold"><i class="bi bi-book"></i> Pilihan Paket Menu</h2>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
            <?php while ($m = mysqli_fetch_assoc($menu)): ?>
                <div class="col">
                    <div class="card menu-card h-100">
                        <img src="<?= htmlspecialchars($m['gambar']); ?>"
                            class="card-img-top" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title fw-bold"><?= htmlspecialchars($m['nama_paket']); ?></h5>
                            <p class="card-text text-secondary"><?= htmlspecialchars($m['deskripsi']); ?></p>
                        </div>
                        <div class="card-footer bg-white border-0 text-center pb-4">
                            <span class="badge-harga">
                                Mulai Rp <?= number_format($m['harga'], 0, ',', '.'); ?> / <?= htmlspecialchars($m['satuan']); ?>
                            </span>
                            <a href="?aksi=tambah" class="btn btn-success w-100 fw-bold">
                                <i class="bi bi-cart"></i> Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <hr class="mb-5">
        <h2 class="mb-4 fw-bold"><i class="bi bi-clock-history"></i> Daftar Pesanan Terbaru</h2>
        <p class="text-muted">Beberapa pesanan yang sedang kami proses hari ini (Data Real-time dari Database).</p>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php
            if (isset($pesanan) && mysqli_num_rows($pesanan) > 0) {
                while ($row = mysqli_fetch_assoc($pesanan)):
            ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0 border-start border-4 border-warning">
                            <div class="card-body">
                                <small class="text-muted d-block mb-2">
                                    <i class="bi bi-calendar3"></i> <?= date('d M Y', strtotime($row['tanggal_pesan'])); ?>
                                </small>
                                <h5 class="card-title fw-bold"><?= htmlspecialchars($row['nama']); ?></h5>
                                <p class="card-text text-secondary mb-1">
                                    <strong><i class="bi bi-box"></i> Paket:</strong> <?= htmlspecialchars($row['jenis_konsumsi']); ?>
                                </p>
                                <p class="card-text text-secondary mb-1">
                                    <strong><i class="bi bi-people"></i> Porsi:</strong> <?= htmlspecialchars($row['jumlah_porsi']); ?> Porsi
                                </p>
                                <?php if (!empty($row['total_harga'])): ?>
                                    <div class="total-box mt-3">
                                        <div class="small text-muted">Total Pembayaran:</div>
                                        <div class="total-nominal">Rp <?= number_format($row['total_harga'], 0, ',', '.'); ?></div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
            } else {
                echo '<div class="col-12"><p class="text-muted">Belum ada data pesanan.</p></div>';
            }
            ?>
        </div>
    </div>

    <hr>

    <div id="about" class="py-5" style="background-color: #fff;">
        <div class="container">
            <h2 class="fw-bold mb-4"><i class="bi bi-people-fill"></i> Tentang Kami</h2>
            <div class="row align-items-center g-4">
                <div class="col-md-6">
                    <img src="https://www.cakaplah.com/assets/article/16032023/cakaplah_r36mm_12083.jpg"
                        class="img-fluid rounded-4 shadow" alt="Tim Catering Rumbai">
                </div>
                <div class="col-md-6">
                    <p class="text-muted">
                        <strong>Catering Rumbai</strong> adalah usaha kuliner yang berdiri sejak 1945,
                        berada di Rumbai, Pekanbaru. Kami meemberikan catering dariberbagai tempat di pekanbaru.
                        Kami menjamin hidangan lezat, higienis, dan terjangkau untuk berbagai acara.

                    </p>

                    <div class="row mt-3 text-center">
                        <div class="col-4">
                            <div class="stat-box">
                                <h3 class="stat-number">81</h3>
                                <small class="text-muted">Tahun Berpengalaman</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stat-box">
                                <h3 class="stat-number">999+</h3>
                                <small class="text-muted">Pesanan Selesai</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stat-box">
                                <h3 class="stat-number">5+</h3>
                                <small class="text-muted">Paket Menu</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div id="contact" class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <h2 class="fw-bold mb-4"><i class="bi bi-envelope-fill"></i> Hubungi Kami</h2>
            <ul class="list-unstyled">
                <li class="mb-3 d-flex gap-3 align-items-start">
                    <i class="bi bi-geo-alt-fill fs-4" style="color:#e65100;"></i>
                    <div>
                        <strong>Alamat</strong><br>
                        <span class="text-muted">Jl. Umban Sari, Pekanbaru, Riau</span>
                    </div>
                </li>
                <li class="mb-3 d-flex gap-3 align-items-start">
                    <i class="bi bi-telephone-fill fs-4" style="color:#e65100;"></i>
                    <div>
                        <strong>Telepon / WhatsApp</strong><br>
                        <span class="text-muted">+62895233585277</span>
                    </div>
                </li>
                <li class="mb-3 d-flex gap-3 align-items-start">
                    <i class="bi bi-envelope-fill fs-4" style="color:#e65100;"></i>
                    <div>
                        <strong>Email</strong><br>
                        <span class="text-muted">salman@cateringrumbai.com</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>