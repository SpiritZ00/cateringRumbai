<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun | Catering Rumbai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
    <div class="login-container shadow w-75">
        <div class="row g-0">
            <div class="col-md-5 d-none d-md-block">
                <img src="https://ik.imagekit.io/tvlk/blog/2025/05/ikon-kota-Pekanbaru-mobile.jpg" alt="Register Image" class="img-fluid h-100 w-100" style="object-fit: cover;">
            </div>
            <div class="col-md-7 login-form-side p-4">
                <div class="mb-4">
                    <h3 class="fw-bold text-dark"><i class="bi bi-person-plus text-warning"></i> Daftar Akun</h3>
                    <p class="text-muted small">Lengkapi data diri untuk membuat akun baru.</p>
                </div>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label fw-semibold text-secondary">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold text-secondary">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="nama@email.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold text-secondary">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Buat password minimal 6 karakter" required>
                    </div>
                    <input type="hidden" name="jabatan" value="user">
                    <button type="submit" name="register" class="btn btn-primary w-100 py-2 rounded-pill mb-3 fw-bold">
                        <i class="bi bi-check-circle"></i> Buat Akun
                    </button>
                </form>
                <div class="text-center mt-3">
                    <span class="text-muted small">Sudah punya akun? </span>
                    <a href="?aksi=login" class="text-decoration-none small fw-bold text-danger">Login di sini</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>