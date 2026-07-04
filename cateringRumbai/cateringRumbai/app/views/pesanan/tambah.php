<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Pesanan | Catering Rumbai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
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
    </style>
</head>

<body class="bg-light">
    <div class="container py-4 col-lg-8 mx-auto">
        <div class="mb-4">
            <h1 class="h3 mb-0"><i class="bi bi-cart-plus"></i> Form Tambah Pesanan</h1>
        </div>
        <div class="card border-0 shadow-sm p-4">
            <form action="?aksi=simpan" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Pemesan</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Tanggal Pesan</label>
                        <input type="date" name="tanggal_pesan" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Jumlah Porsi</label>
                        <input type="number" name="jumlah_porsi" id="jumlah_porsi" class="form-control" min="1" required oninput="hitungTotal()">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Jenis Konsumsi (Paket)</label>
                        <select name="jenis_konsumsi" id="jenis_konsumsi" class="form-control" required onchange="hitungTotal()">
                            <option value="">-- Pilih Paket --</option>
                            <?php while ($m = mysqli_fetch_assoc($menu)): ?>
                                <option value="<?= htmlspecialchars($m['nama_paket']); ?>"
                                    data-harga="<?= $m['harga']; ?>">
                                    <?= htmlspecialchars($m['nama_paket']); ?>
                                    (Rp <?= number_format($m['harga'], 0, ',', '.'); ?> / <?= htmlspecialchars($m['satuan']); ?>)
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">No Telepon / WA</label>
                        <input type="text" name="nomor_telepon" class="form-control" required>
                    </div>
                </div>
                <div class="total-box mb-3">
                    <div class="d-flex justify-content-between">
                        <span>Harga Satuan:</span>
                        <span id="harga_satuan">Rp 0</span>
                    </div>
                    <hr class="my-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold">Total Harga:</span>
                        <span class="total-nominal" id="tampil_total">Rp 0</span>
                    </div>
                    <input type="hidden" name="total_harga" id="total_harga" value="0">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Tempat / Alamat Acara</label>
                    <input type="text" name="tempat" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-bold">Catatan Tambahan</label>
                    <textarea name="catatan" class="form-control" rows="3" placeholder="Misal: Jangan terlalu pedas, tambah kerupuk, dll"></textarea>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Pesanan</button>
                    <a href="?aksi=index" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
    <script>
        function hitungTotal() {
            const select = document.getElementById('jenis_konsumsi');
            const porsi = parseInt(document.getElementById('jumlah_porsi').value) || 0;
            const option = select.options[select.selectedIndex];
            const harga = parseInt(option.getAttribute('data-harga')) || 0;
            const total = harga * porsi;
            document.getElementById('harga_satuan').textContent = 'Rp ' + harga.toLocaleString('id-ID');
            document.getElementById('tampil_total').textContent = 'Rp ' + total.toLocaleString('id-ID');
            document.getElementById('total_harga').value = total;
        }
        window.onload = function() {
            hitungTotal();
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html>