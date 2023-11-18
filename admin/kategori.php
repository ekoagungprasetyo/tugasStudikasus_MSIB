<?php
    require "session.php";
    require "navbar.php";
    require "../koneksi.php";

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori ");
    $jumlahKategori = mysqli_num_rows($queryKategori);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
   
</head>

<style>
    .no-decoration{
        text-decoration: none;
    }
</style>

<body>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="../admin" class="no-decoration text-muted">
                         <i class="fas fa-home"></i> Home
                    </a> 
                </li>

                <li class="breadcrumb-item active" aria-current="page">
                    <a href="kategori.php" class="no-decoration text-muted">
                        Kategori 
                    </a>
                </li>
            </ol>
        </nav>

        <div class="my-5 col-12 col-md-6">
            <h3>Tambah Kategori</h3>

            <form action="" method="post">
                <div>
                    <label for="kategori">Kategori</label>
                    <input type="text" id="kategori" name="kategori" placeholder="input nama kategori" class="form-control" autocomplete="off">

                </div>
                <div class="mt-3">
                    <button class="btn btn-primary" type="submit" name="simpan_kategori">Simpan</button>
                </div>
            </form>

            <?php
            if(isset($_POST['simpan_kategori'])){
                // Your existing code for processing form data
                $Kategori = htmlspecialchars($_POST['kategori']);

                $queryExist = mysqli_query($con, "SELECT nama FROM kategori WHERE nama='$Kategori'");
                $jumlahDataKategoriBaru = mysqli_num_rows($queryExist);
                
                if($jumlahDataKategoriBaru > 0){
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                            Kategori sudah ada
                    </div>
                    <?php
                }

                else{
                    $querySimpan = mysqli_query($con, "INSERT INTO kategori (nama) VALUES ('$Kategori')");
                    
                    if ($querySimpan) {
                        ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Kategori Berhasil
                        </div>
                        <meta http-equiv="refresh" content="1; url=kategori.php" />
                        <?php
                    }

                    if ($querySimpan) {}
                    else {
                        echo mysqli_error($con);
                    }
                        
            }
            }
            ?>

        </div>

        <div class="mt-3">
            <h2>List Kategori</h2>

            <div class="table-responsive mt-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                 if($jumlahKategori==0){
                            ?>

                                        <tr>
                                            <td colspan=3 class="text-center">Data kategori tidak tersedia</td>
                                        </tr>

                            <?php
                                    }
                                    else{
                                        $jumlah = 1;
                                        while($data=mysqli_fetch_array($queryKategori)){
                            ?>           <tr>                                                                                        
                                            <td><?php echo $jumlah;?></td>
                                            <td><?php echo $data['nama']?></td>
                                            <td>
                                                <a href="kategori-detail.php?p=<?php echo $data['id']; ?>" class="btn btn-info"><i class="fas fa-search"></i></a>
                                                
                                            </td>
                                        </tr>
                                        
                            
                            <?php  
                                     $jumlah++;          
                                    }
                                    
                                }
                                
                            ?>

                        </tbody>

                    </table>
                    
            </div>

        </div>
    </div>
    
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>

   
</body>

</html>