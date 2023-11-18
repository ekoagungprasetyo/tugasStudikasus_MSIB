<?php
        require "navbar.php";
        session_start();
    

    // Jika tidak ada sesi login, arahkan ke halaman login
    if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
        header('location: login.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container-fluid banner d-flex align-items-center">
       
        <div class="container text-center text-white">
                    <h1>Toko Online Fashion</h1>
                    <h3>Mau cari apa?</h3>
                    <div class="col-8 offset-2">
                        <form method="get" action="produk.php">
                            <div class="input-group input-grup-lg my-4">
                                <input type="text" class="form-control" placeholder="Cari Barang" aria-label="Reciptient's username" aria-describedy="basic-addon2" name="keyword">
                                <button type="submit" class="btn warna2 text-white">Telusuri</button>
                            </div>
                        </form>
                    </div>
        
        </div>

    </div>
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Kategori Terlaris</h3>
            <div class="row mt-5">
                <div class="col-4">
                    <div class="highlighted-kategori kategori-baju-pria d-flex justify-content-center align-items-center">
                        <h4 class="text-white">Baju Pria</h4>
                    </div>
                </div>
                <div class="col-4">
                <div class="highlighted-kategori kategori-baju-wanita d-flex justify-content-center align-items-center">
                        <h4 class="text-white">Baju Wanita</h4>
                    </div>
                </div>
                <div class="col-4">
                <div class="highlighted-kategori kategori-sepatu d-flex justify-content-center align-items-center">
                        <h4 class="text-white">Sepatu</h4>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>


    
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>