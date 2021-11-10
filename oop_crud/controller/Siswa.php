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
		
		$hasil = $this->model->tampil_data();

		return $hasil;
	}
}
?>