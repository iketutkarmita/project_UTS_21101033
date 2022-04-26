<?php

include "config.php";


$mahasiswaEdit = mysqli_query($conn, "SELECT * FROM `tabel_mahasiswa` WHERE `id` = '$_GET[id];'");
$data = mysqli_fetch_array($mahasiswaEdit);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Edit Mahasiswa</title>
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

    <h3 style="margin-left: 50px;">EDIT MAHASISWA</h3><br>
    <form method="POST" action="" style="margin-left: 20px;">

        <table>


            <tr>


                <td class="text-center">ID</td>
                <td></td>
                <td><input class="form-control" type="text" name="id" value="<?php echo $data['id']; ?>" placeholder="id" readonly>
                </td>

            </tr>

            <tr>
                <td class="text-center">NAMA</td>
                <td></td>
                <td><input class="form-control" type="text" name="Nama" value="<?php echo $data['Nama']; ?>" placeholder="Nama">
                </td>
                <td></td>
            </tr>
            <tr>
                <td class="text-center">NIM</td>
                <td></td>
                <td><input class="form-control" type="text" name="Nim" value="<?php echo $data['Nim']; ?>" placeholder="Nim">
                </td>
                <td></td>
            </tr>

            <tr>
                <td class="text-center">JURUSAN</td>
                <td></td>
                <td><input class="form-control" type="text" name="Jurusan" value="<?php echo $data['Jurusan']; ?>" placeholder="Jurusan">
                </td>
                <td></td>
            </tr>

            <tr>
                <td colspan="3"><input type="submit" value="EDIT" name="updatebtn" class="btn btn-primary mb-3" style="margin-left:75px"></input></td>
            </tr>

        </table>
    </form>

    <?php

    include "config.php";
    if (isset($_POST['updatebtn'])) {
        mysqli_query($conn, "update tabel_mahasiswa set 
        Nama = '$_POST[Nama]',
        Nim = '$_POST[Nim]',
        Jurusan = '$_POST[Jurusan]' 
        where id = '$_GET[id]'
        ");
        echo "<a style='margin-left:20px'>Berhasil di Ubah, Silahkan di Refresh</a>";
        echo "<a style='margin-left:20px' href ='tabel_mahasiswa.php'><i class='fa fa-refresh' aria-hidden='true'></i></a>";
    }






    ?>

    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>