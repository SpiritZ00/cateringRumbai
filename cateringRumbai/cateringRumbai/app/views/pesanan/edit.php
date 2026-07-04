<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Pesanan | Catering Rumbai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>
    <div class="admin-shell">

        <div class="admin-main">
            <main class="dashboard-content p-4">
                <div class="mb-4">
                    <h2>Edit Pesanan Catering</h2>
                    <p class="text-muted">Perbarui data pesanan pelanggan di bawah ini.</p>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form action="?aksi=update" method="POST">

                            <input type="hidden" name="id" value="<?= $pesanan['id']; ?>">

                            <div class="mb-3">
                                <label class="form-label">Nama Pemesan</label>
                                <input type="text" class="form-control" name="nama" value="<?= htmlspecialchars($pesanan['nama']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal Pesan</label>
                                <input type="date" class="form-control" name="tanggal_pesan" value="<?= $pesanan['tanggal_pesan']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jumlah Porsi</label>
                                <input type="number" class="form-control" name="jumlah_porsi" value="<?= $pesanan['jumlah_porsi']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Pilihan Paket Menu</label>
                                <select class="form-select" name="jenis_konsumsi" required>
                                    <option value="Paket Prasmanan" <?= ($pesanan['jenis_konsumsi'] == 'Paket Prasmanan') ? 'selected' : ''; ?>>Paket Prasmanan</option>
                                    <option value="Paket Nasi Kotak" <?= ($pesanan['jenis_konsumsi'] == 'Paket Nasi Kotak') ? 'selected' : ''; ?>>Paket Nasi Kotak</option>
                                    <option value="Paket Snack Box" <?= ($pesanan['jenis_konsumsi'] == 'Paket Snack Box') ? 'selected' : ''; ?>>Paket Snack Box</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tempat / Lokasi Pengantaran</label>
                                <input type="text" class="form-control" name="tempat" value="<?= htmlspecialchars($pesanan['tempat']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nomor Telepon (WhatsApp)</label>
                                <input type="text" class="form-control" name="nomor_telepon" value="<?= $pesanan['nomor_telepon']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Catatan Tambahan</label>
                                <textarea class="form-control" name="catatan" rows="3"><?= htmlspecialchars($pesanan['catatan']); ?></textarea>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Perubahan</button>
                                <a href="?aksi=index" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>