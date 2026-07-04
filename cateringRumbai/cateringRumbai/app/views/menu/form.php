<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Menu | Catering Rumbai Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>
    <div class="wrapper">
        <nav class="sidebar">
            <div class="brand">
                <i class="bi bi-shop"></i> Catering Rumbai
                <div style="font-size: 0.75rem; color: var(--oren-terang);">Admin Panel</div>
            </div>
            <div class="nav flex-column nav-pills">
                <a class="nav-link" href="?aksi=index"><i class="bi bi-journal-text"></i> Data Pesanan</a>
                <?php if (isset($_SESSION['jabatan']) && $_SESSION['jabatan'] === 'admin'): ?>
                    <a class="nav-link" href="?aksi=list_user"><i class="bi bi-people"></i> Data User</a>
                <?php endif; ?>
                <a class="nav-link active" href="?aksi=list_menu"><i class="bi bi-card-list"></i> Kelola Menu</a>
                <a class="nav-link" href="?aksi=frontend"><i class="bi bi-globe"></i> Lihat Website</a>
                <hr style="border-color: rgba(255,255,255,0.1);">
                <a class="nav-link text-danger" href="?aksi=logout" onclick="return confirm('Yakin keluar?')">
                    <i class="bi bi-box-arrow-left"></i> Logout
                </a>
            </div>
        </nav>

        <main class="main-content">

            <div class="card border-0 shadow-sm p-4" style="max-width: 600px;">
                <h3 class="fw-bold mb-4">
                    <?= isset($menu['id']) ? 'Edit Menu' : 'Tambah Menu'; ?>
                </h3>

                <form method="POST" action="?aksi=<?= isset($menu['id']) ? 'update_menu' : 'simpan_menu'; ?>">
                    <?php if (isset($menu['id'])): ?>
                        <input type="hidden" name="id" value="<?= $menu['id']; ?>">
                    <?php endif; ?>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Paket</label>
                        <input type="text" name="nama_paket" class="form-control"
                            value="<?= isset($menu['nama_paket']) ? htmlspecialchars($menu['nama_paket']) : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3"><?= isset($menu['deskripsi']) ? htmlspecialchars($menu['deskripsi']) : ''; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Harga</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="harga" class="form-control"
                                value="<?= isset($menu['harga']) ? $menu['harga'] : ''; ?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Satuan</label>
                        <input type="text" name="satuan" class="form-control"
                            placeholder="cth: Porsi, Kotak, Box"
                            value="<?= isset($menu['satuan']) ? htmlspecialchars($menu['satuan']) : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">URL Gambar</label>
                        <input type="text" name="gambar" class="form-control"
                            placeholder="https://..."
                            value="<?= isset($menu['gambar']) ? htmlspecialchars($menu['gambar']) : ''; ?>">
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary fw-bold">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                        <a href="?aksi=list_menu" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>