<?php

include_once('config.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Tabel Mahasiswa</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Daftar Mahasiswa</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" href="tabel_mahasiswa.php">Tabel mahasiswa <span class="sr-only">(current)</span></a>

            </div>
        </div>
    </nav>
    <br>
    <h3 class="container-sm col-lg-2">TABEL_MAHASISWA</h3>




    <table class="table table-striped">
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" style="margin-left: 20px; " data-target="#newMahasiswa">Tambah Mahsiswa</a>


        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NIM</th>
                <th scope="col">NAMA</th>
                <th scope="col">JURUSAN</th>
                <th scope="col">EDIT</th>
                <th scope="col">DELETE</th>


            </tr>
        </thead>
        <tbody>

            <?php $no = 0;

            $mahasiswa = mysqli_query($conn, "SELECT * from `tabel_mahasiswa` ");
            while ($row = mysqli_fetch_array($mahasiswa)) {


                $no = $no + 1;


                echo "<tr>
                    <td>$no</td>
                    <td>$row[Nim]</td>
                    <td>$row[Nama]</td>
                    <td>$row[Jurusan] </td>
                   
                    <td> <a href='edit.php?id=$row[id]'><i class='fa fa-pencil-square-o btn btn-warning'</i></a></td>
                    <td> <a href='?id=$row[id]'><i class='fa fa-trash-o btn btn-danger'</i></a></td>
                  
                    
                 
                    <tr>";
            }

            ?>



    </table>

    <?php
    if (isset($_GET['id'])) {
        mysqli_query($conn, "delete from tabel_mahasiswa where id ='$_GET[id]'");


        echo "<meta http-equev=refresh content=2;URL= 'tabel_mahasiswa.php'>";
    }

    ?>

    <div class="modal fade" id="newMahasiswa" tabindex="-1" role="dialog" aria-labelledby="newMahasiswaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newMahasiswaLabel">Tambah Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="id" name="id" placeholder="ID" readonly>
                            <input type="text" class="form-control" id="Nim" name="Nim" placeholder="NIM">
                            <input type="text" class="form-control" id="Nama" name="Nama" placeholder="NAMA">
                            <input type="text" class="form-control" id="Jurusan" name="Jurusan" placeholder="JURUSAN">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="simpan" class=" btn btn-primary">Tambah</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
    <?php
    include "config.php";
    if (isset($_POST['simpan'])) {
        mysqli_query($conn, "insert into tabel_mahasiswa set 
        Nama = '$_POST[Nama]',
        Nim = '$_POST[Nim]',
        Jurusan = '$_POST[Jurusan]' ");

        echo "<a style='margin-left:20px'>Berhasil di Tamba, Silahkan di Refresh</a>";
        echo "<a style='margin-left:20px' href ='tabel_mahasiswa.php'><i class='fa fa-refresh' aria-hidden='true'></i></a>";
    }


    ?>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>