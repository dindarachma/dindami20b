<?php

class siswa_model {

	protected $db;
	function __construct($db){
		$this->db = $db;
	}
	
	function tampil_data()
	{
		$row = $this->db->prepare("SELECT * FROM `tbl_calon_siswa`");
		$row->execute();
		return $hasil = $row->fetchAll();
	}

	function getData($id)
	{
		$row = $this->db->prepare("SELECT * FROM `tbl_calon_siswa` where id = $id ");
		$row->execute();
		return $hasil = $row->fetch();
	}

	function getAgamaData()
	{
		$row = $this->db->prepare("SELECT * FROM `tbl_agama`");
		$row->execute();
		return $hasil = $row->fetchAll();
	}

	function simpanData($data)
	{
		//buat array untuk isi values 
		$rowsSQL = array();

		$toBind = array();

		$columnNames = array_keys($data[0]);

		foreach ($data as $arrayIndex => $row) {
			$param = ":".$columnNames.$arrayIndex;
			$params[] = $param;
			$toBind[$param] = $columnValue;
		}
		$rowsSQL[]="(".implode(", ", $params) . ")";
	
	$sql = "INSERT INTO tbl_calon_siswa(".implode(", ", $columnNames).")VALUES".implode (", ", $rowsSQL);
	$row = $this->db->prepare($sql);

	foreach ($toBind as $param => $val) {
		$row ->bindValue($param, $val);
	}
}

	function updateData($data, $id)
	{
		$setPart = array();
		foreach ($data as $key => $value) 
		{
			$setPart[] = $key. "=:".$key;
		}
		$sql = "UPDATE tbl_calon_siswa SET ".implode(', ', $setPart)."WHERE id= :id";
		$row -> bindValue(':id', $id);
		foreach ($data as $param => $val) 
		{
			$row ->bindValue($param, $val);
		}
		return $row ->execute();
	}

}

?>