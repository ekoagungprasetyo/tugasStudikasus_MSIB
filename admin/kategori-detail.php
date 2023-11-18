<?php
    require "session.php";
    require "navbar.php";
    require "../koneksi.php";

    $id = $_GET['p'];


    $query = mysqli_query($con, "SELECT * FROM kategori WHERE id='$id'");
    $data = mysqli_fetch_array($query);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kategori</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
</head>
<body>
        <div class="container">
           <h2>Detail Kategori</h2>
        
            <div class="col-12 col-md-6">
                    <form action="" method="post">
                        <label for="kategori">Kategori</label>
                        <input type="text" name="kategori" id="kategori" class="form-control" value="<?php echo $data['nama']; ?>">

                        <div class="mt-5">
                                <button type="submit" class="btn btn-primary" name="editBtn">Simpan</button>
                                <button type="submit" class="btn btn-danger" name="deleteBtn">Hapus</button>
                                
                        </div>
                    </form>

                    <?php
                        if(isset($_POST['editBtn'])){
                            $Kategori = htmlspecialchars($_POST['kategori']);

                            if ($data['nama']==$Kategori){
                                ?>
                                    <meta http-equiv="refresh" content="0; url=kategori.php" />
                                <?php
                            }
                            else{
                                $query = mysqli_query($con, "SELECT * FROM kategori WHERE nama='$Kategori'");
                                $jumlahData = mysqli_num_rows($query);
                                if ($jumlahData > 0){
                                    ?>
                                        <div class="alert alert-warning mt-3" role="alert">
                                            Kategori sudah ada
                                        </div>
                                    <?php
                                }

                                else{

                                    $querySimpan = mysqli_query($con, "UPDATE kategori SET nama='$Kategori' WHERE id='$id'");
                    
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
                        }

                        if(isset($_POST['deleteBtn'])){

                            $queryCheck = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$id'");
                            $dataCount = mysqli_num_rows($queryCheck);

                            if($dataCount>0){
                                ?>
                                            <div class="alert alert-warning mt-3" role="alert">
                                                Kategori tidak bisa dihapus karena sudah digunakan produk
                                            </div>
                                <?php
                                die();
                            }
                            $queryDelete = mysqli_query($con, "DELETE FROM kategori WHERE id='$id'");

                            if ($queryDelete){
                                ?>
                                    <div class="alert alert-primary mt-3" role="alert">
                                        Kategori Berhasil Dihapus
                                    </div>

                                    <meta http-equiv="refresh" content="1; url=kategori.php" />
                                 <?php

                            }
                            else {
                                echo mysqli_error($con);
                            }
                        }
                    ?>
            </div>
        </div>    

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>