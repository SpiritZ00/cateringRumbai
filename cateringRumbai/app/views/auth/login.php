<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Catering Rumbai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
    <div class="login-container shadow w-75">
        <div class="row g-0">
            <div class="col-md-5 d-none d-md-block login-image-side ">
                <img src="https://images.trvl-media.com/place/2812/37a71723-7e25-4d8b-bddd-ba9c8812548e.jpg" alt="Login Image" class="img-fluid h-100" style="height: 70px; width: 3––00px;">
            </div>
            <div class="col-md-7 login-form-side">
                <div class="mb-4">
                    <h3 class="fw-bold text-dark"><i class="bi bi-shop text-warning"></i> Catering Rumbai</h3>
                    <p class="text-muted small">Silakan login ke akun Anda untuk memulai pemesanan.</p>
                </div>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold text-secondary">Email</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                            <input type="email" class="form-control border-start-0" id="email" name="email" placeholder="apaaja@email.com" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold text-secondary">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-lock text-muted"></i></span>
                            <input type="password" class="form-control border-start-0" id="password" name="password" placeholder="Masukkan password" required>
                        </div>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary w-100 py-2.5 rounded-pill mb-3 fw-bold">
                        <i class="bi bi-box-arrow-in-right"></i> Sign In
                    </button>
                </form>
                <div class="text-center mt-4">
                    <span class="text-muted small">Belum punya akun? </span>
                    <a href="?aksi=register" class="text-decoration-none small fw-bold text-danger">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>