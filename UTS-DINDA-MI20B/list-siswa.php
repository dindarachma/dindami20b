<?php
error_reporting(0);
//Buat Koneksinya
$con = new mysqli("localhost","root", "","pendaftaran_siswa");
$tgl = date ('d F Y');

$sql = "SELECT * FROM tbl_calon_siswa";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>LIST SISWA</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <?php
    $pesan = $_GET['pesan'];
    $frm = $_GET['frm'];
    /*echo $pesan;*/
    if ($pesan =='success' && $frm == 'add'){
    ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
      <strong>Berhasil!</strong> Selamat Anda Berhasil Menambahkan Data Surat...
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }else if ($pesan=='success' && $frm=='del'){
      ?>
       <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Berhasil!</strong> Anda Berhasil Menghapus...
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }else if ($pesan=='success' && $frm=='edit'){
      ?>
       <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Berhasil!</strong> Anda Berhasil Merubah Data...
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
  <h1><center><b>LIST SISWA</b></center></h1>

  <table class="table table-bordered table-striped">
    <thead class="table-secondary text-center">
      <tr>
        <th>NISN</th>
        <th>NAMA</th>
        <th>ALAMAT</th>
        <th>JENIS KELAMIN</th>
        <th>AGAMA</th>
        <th>SEKOLAH ASAL</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
<?php

  foreach ($result as $isi){
    
    ?>
  <tr>
    <td><?php echo $isi['NISN'];?></td>
    <td><?php echo $isi['nama'];?></td>
    <td><?php echo $isi['alamat'];?></td>
    <td><?php echo $isi['jenis_kelamin'];?></td>
    <td><?php echo $isi['agama'];?></td>
    <td><?php echo $isi['sekolah_asal'];?></td>
    <td><center><a href ="edit-siswa.php?id=<?php echo $isi['id'];?>"><button class="btn btn-warning btn-sm">Edit</a></button></center></td>
    <td><center><a href="#" data-bs-toggle="modal" data-bs-target="#deletesiswa<?php echo $isi ['id'];?>"><button class="btn btn-danger btn-sm">Delete</a></button></center></td>
  </tr>
  <div class="example-modal">
    <div id="deletesiswa<?php echo $isi ['id'];?>" class="modal fade" role="dialog" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class ="close" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Konfirmasi Delete Data Surat</h3>
          </div>
          <form class="row g-3" action="delete-siswa.php" method="post" name="form1">
          <div class="modal-body">
              <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $isi ['id'];?>" required>
            <h4 align="center">Apakah Anda Yakin Ingin Menghapus No Surat? <?php echo $isi ['NISN'];?><strong><span class="grt"></span></strong></h4>
          </div>
          <div class="modal-footer">
           <button id="nodelete" type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Cancel</button> 
           <button type="submit" class="btn btn-primary" name="delete">Delete</button>
          </div>
          </form>
          </div>
        </div>
      </div>
     </div>

    <?php
    }
    ?>
    <p><a href="form_daftar.php">Daftar Siswa</a></p>
    </div>
</body>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>