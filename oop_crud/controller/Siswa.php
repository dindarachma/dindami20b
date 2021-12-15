<?php
	//panggil file
	include '../Database.php';
	include '../model/siswa_model.php';

class Siswa{ 
		public function __construct(){
			$db = new Database();
			$conn = $db->DBConnect();
			$this->model = new siswa_model($conn);
		}

		function index(){
			session_start();
			if (!empty($_SESSION)) {
				$hasil = $this->model->tampil_data();
				return $hasil;
			}else{
				header("Location:login.php");
			}
			
		}
		function getData($id){
			$hasil = $this->model->getData($id);
			return $hasil;
		}

		function getAgamaData(){
			$hasil = $this->model->getAgamaData();

			echo json_encode($hasil);
			
		}

		function hapusSiswa(){
			if(isset($_POST['delete'])) {
      			$id=$_POST['id'];
    
			$result = $this->model->hapusData($id);

			if ($result) {
				header("Location:content.php?pesan=success&&frm=del");
			}else{
				header("Location:content.php?pesan=failed&&frm=del");
			}
		}
	}

		function simpanSiswa(){
			if(isset($_POST['simpan'])) {
				$NISN = $_POST['nisn'];
				$nama = $_POST['Nama'];
				$alamat = $_POST['Alamat'];
				$jenis_kelamin = $_POST['jnsKelamin'];
				$agama = $_POST['Agama'];
				$sekolah_asal = $_POST['SklhAsal'];

			$data[] = array(
						 'NISN'			=>$NISN,
						 'nama'		=>$nama,
						 'alamat'		=>$alamat,
						 'jenis_kelamin'=>$jenis_kelamin,
						 'agama'		=>$agama,
						 'sekolah_asal'	=>$sekolah_asal
			);

			$result = $this ->model->simpanData($data);

				if ($result) {
					header("Location:content.php?pesan=success&frm=add");
				}else{
					header("Location:content.php?pesan=failed&frm=add");
				}
			}
		}

		function simpanAgama(){
			$hasil = $_POST['Agama'];
			$data[]=array(
				'Agama'  =>$hasil,
			);
			$result = $this->model->simpanAgamaData($data);
			if ($result) {
				echo '200';
			}else{
				echo '300';
			}
		}

		function updateSiswa($id){
			if(isset($_POST['update'])) {
				/*$id=$_POST['id'];*/
				$NISN = $_POST['nisn'];
				$nama = $_POST['Nama'];
				$alamat = $_POST['Alamat'];
				$jenis_kelamin = $_POST['jnsKelamin'];
				$agama = $_POST['Agama'];
				$sekolah_asal = $_POST['SklhAsal'];

			$data = array(
						 'NISN'			=>$NISN,
						 'nama'			=>$nama,
						 'alamat'		=>$alamat,
						 'jenis_kelamin'=>$jenis_kelamin,
						 'agama'		=>$agama,
						 'sekolah_asal'	=>$sekolah_asal
			);

			$result = $this ->model->updateData($data,$id);
			if ($result) {
				header("Location:content.php?pesan=success&frm=edit");
			}else{
				header("Location:content.php?pesan=failed&frm=edit");
			}
		}
	}

	function Logout(){
		if (isset($_POST['logout'])) {
			session_start();
   			session_destroy();
    		header("Location:login.php?pesan=success&frm=logout");
		}
	}
}
?>