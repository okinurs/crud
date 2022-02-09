<?php
require 'functions.php';

$book = query("SELECT * FROM tb_book ORDER BY id DESC");

if (isset($_POST["search"])){
    $book = search($_POST["keyword"]);
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            
            <div class="card-header">
                
                <h2 class="text-center">PERPUSTAKAAN ONLINE | DAFTAR BUKU</h2>
            </div>
            <div class="card-body">
            <form action="" method="post">   
                <div class="container">
                    <input  type="text" name="keyword" size="40" autofocus placeholder="search..." autocomplete="off">
                    <button type="submit" class="btn btn-primary" name="search"><i class="bi bi-search"></i></button>

                </div> 
            </form>    
                <a href="add.php" class="btn btn-success mb-3" style="float: right;"><i class="bi bi-folder-plus">  Add Book</i> </a>
                <table class="table table-bordered"> 
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Judul Buku</td>
                            <td>Cover</td>
                            <td>Penulis</td>
                            <td>Penerbit</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;?>
                        <?php foreach($book as $item) { ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $item["judul_buku"]; ?></td>
                            <td><img src="img/<?= $item["cover"]; ?>" width="50"></td>
                            <td><?= $item["penulis"]; ?></td>
                            <td><?= $item["penerbit"]; ?></td>
                            <td>
                                <a href="show.php?id=<?= $item["id"]; ?>" class="btn btn-secondary"><i class="bi bi-eye-slash"></i></a>
                                <a href="update.php?id=<?= $item["id"]; ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                <a href="delete.php?id=<?= $item["id"]; ?>" class="btn btn-danger" onclick="return confirm('Are You Sure?')"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>




