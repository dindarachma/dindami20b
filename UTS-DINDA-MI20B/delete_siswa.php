<?php

$con = new mysqli("localhost","root", "","pendaftaran_siswa");

  if(isset($_POST['delete'])) {
      $id=$_POST['id'];
      

      //Insert user data info table
      $result = mysqli_query($con, "DELETE FROM `tbl_calon_siswa` WHERE `tbl_calon_siswa`.`id` = $id" ); 

      header("Location:list_siswa.php?pesan=success&&frm=del");
    }

  ?>