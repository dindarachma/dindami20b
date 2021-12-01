<?php
	//panggil file
	include '../Database.php';
	include '../model/Auth_model.php';

class Auth{ 
		public $model;

		function __construct(){
			$db = new Database();
			$conn = $db->DBConnect(); 
			$this->model = new Auth_model($conn);
		}

		function index(){
			/*$hasil = $this->model->tampil_data();
			return $hasil;*/
		}

		function Login(){
			if (isset($_POST['login'])) 
			{
				$user = strip_tags($_POST['user']);
				$pass = strip_tags($_POST['pass']);
				$result = $this->model->proses_login($user,$pass);

				if ($result == 'gagal') {
					header("Location:login.php");
				}else{
					session_start();
					$_SESSION['nama_pengguna'] = $result['nama_pengguna'];
					$_SESSION['username'] = $result['username'];
					header("Location:content.php");
			}
		}
	}
}