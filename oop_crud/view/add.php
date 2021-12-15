<?php
/*error_reporting(0);

//Buat Koneksinya
$con = new mysqli("localhost","root", "","pendaftaran_siswa");
$tgl = date ('d F Y');
$query = mysqli_query($con, 'SELECT * FROM tbl_agama');*/

include'../controller/Siswa.php';
$ctrl = new Siswa();
/*$id=$_GET['id'];*/
/*$query = $ctrl->getAgamaData();*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran Siswa</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
</head>
<body>
	<script type="text/javascript">
		$(document).ready(function(){
			/*alert('test');*/
			show_agama();
			function show_agama(){
				$.ajax({
					type : 'GET',
					url : 'api.php',
					async : false,
					dataType : 'json',
					success : function(data){
						console.log(data);
						var html = '';
						var i;
						var no;
						for(i=0; i<data.length; i++){
							no = i + 1;
							html +=
								'<option value="'+data[i].id+'">'+data[i].agama+'</option>';
						}
						$('#Agama').html(html);
					},
					error:function(data){
						console.log(data);
					}
				});
			}
		});

	$('#btnSimpan').click(function(){
    // alert('button');
    	$('#ModalJenis').modal('hide');
		var dataForm = $('#formJenisSurat').serialize();
		$.ajax({
		type  : 'POST',
		url   : 'api.php',//Memanggil Controller/Function
		async : false,
		dataType : 'json',
		data : dataForm, 
		success:function(response){
		        if (response == 200) {
					Swal.fire({
					type: 'success',
					title: 'Berhasil di simpan!',
					text: 'Tunggu sejenak',
					timer: 1000,
					showCancelButton: false,
					showConfirmButton: false
					})
					.then (function() {
						show_jenis();
					});

		        } else {

		          	Swal.fire({
		            type: 'error',
		            title: 'Gagal menyimpan',
		            text: 'silahkan coba lagi!'
		          });

		        }

		        console.log(response);

		      },

		      error:function(response){

		          Swal.fire({
		            type: 'error',
		            title: 'Opps!',
		            text: 'server error!'
		          });

		          console.log(response);

		      }
		});

	});  
     

	</script>



	<div class="container">
	<row>
		<div class="card">
		<H2 align="center">Tambah Siswa</H2>
		<div class="card-body">
			<form class="row g-3" action="<?php echo $ctrl->simpanSiswa();?>" method="post" name="form1">
			  <div class="col-md-6">
			    <label for="nisn" class="form-label">NISN</label>
			    <input type="text" class="form-control" id="nisn" name="nisn" required>
			  </div>
			   <div class="col-12">
			    <label for="Nama" class="form-label">NAMA</label>
			    <input type="text" class="form-control" id="Nama" name="Nama" placeholder="Nama Lengkap" required>
			  </div>
			   <div class="col-12">
			    <label for="Alamat" class="form-label">ALAMAT</label>
			    <input type="text" class="form-control" id="Alamat" name="Alamat" placeholder="Alamat Lengkap" required>
			  </div>
			   <div class="col-12">
			    <label for="jnsKelamin" >JENIS KELAMIN</label>
			    <label><input type="radio"  id="jnsKelamin" name="jnsKelamin" value="Laki-laki" required>Laki-laki</label>
			    <label><input type="radio"  id="jnsKelamin" name="jnsKelamin" value="Perempuan" required>Perempuan</label>
			  </div>
			  <div class="col-md-6">
			    <label for="Agama" class="form-label">AGAMA</label>

			    <select id="Agama" name="Agama" class="form-select" required> 
			      <option selected>Silahkan Pilih...</option>
			    </select>
			    
			  </div>
			  <div align="left" class="col-md-6">
			  	<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Agama" title="Tambah"><i class="bi bi-plus"></i></a>
			  </div>
			
			  <div class="col-12">
			    <label for="SklhAsal" class="form-label">SEKOLAH ASAL</label>
			    <input type="text" class="form-control" id="SklhAsal" name="SklhAsal"  required>
			  </div>
			  
			  <div class="col-12">
			    <button type="submit" class="btn btn-primary" name="simpan">Daftar</button>
			    <a href="content.php" class="btn btn-danger">Batal</a>
			  </div>
			</form>
		</div>
		</div>
	</row>
	</div>
	
	<div class="example-modal">
    <div id="Agama" class="modal fade" role="dialog" style="display:none;">
      <div class="modal-dialog">
         <div class="modal-content">
            <form class="row g-3" id="formAgama">
              <div class="modal-header">
                <h3 class="modal-title">Tambah Agama</h3>
              </div>
               <div class="modal-body">
               	<label for="Agama" class="form-label">Agama</label>
           			<input type="text" class="form-control" id="Agama" name="Agama" placeholder="Agama ....">
          </div>
           <div class="modal-footer">
           <button  type="button" class="btn btn-primary btn-block" id="btnSimpan">Simpan</button> 
           <button  type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Cancel</button>
          </div>
            </form>
         </div>
      </div>
    </div>
  </div>
</body>
<script src="../assets/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>

