<?php

class PostModel {

	public $servername = "localhost";
	public $user = "root";
	public $pass = "";
	public $data = "quanlycongty";
	public $conn;

	public function getPost()
	{
		$this->conn= new mysqli($this->servername,$this->user,$this->pass,$this->data);
		if(!$this->conn){
			echo "Kết nối thất bại";
			exit();
		}else{
			mysqli_set_charset($this->conn,'utf-8');
		}
		return $this->conn;
	}

	public function getAllData()
	{
		$sql = "SELECT * FROM thongtinnhanvien";
		$result = $this->conn->query($sql);
		$rows = array();
		if($result->num_rows>0){
			while ($row = mysqli_fetch_assoc($result)) {
				$rows[] = $row;
			}
		}

		return $rows;
	}

	public function add($fullname,$gioitinh,$ngaysinh,$diachi,$email,$sdt){
		$sql = "INSERT INTO thongtinnhanvien(fullname,gioitinh,ngaysinh,diachi,email,sdt) VALUES ('$fullname','$gioitinh','$ngaysinh','$diachi','$email','$sdt')";
		$result = mysqli_query($this->conn, $sql);
		return $result;
	}

	public function update($id,$fullname,$gioitinh,$ngaysinh,$diachi,$email,$sdt){
		$sql = "UPDATE thongtinnhanvien SET fullname = '$fullname',gioitinh = '$gioitinh',ngaysinh = '$ngaysinh',diachi = '$diachi',email = '$email',sdt='$sdt' WHERE id ='$id'";
		$result = mysqli_query($this->conn, $sql);
		return $result;
	}

	public function getData($id){
		$sql = "SELECT * FROM thongtinnhanvien WHERE id = $id";
		$result = mysqli_query($this->conn,$sql);
		$rows = mysqli_fetch_array($result);
		return $rows;
	}

	public function delete($id){
		$sql = "DELETE FROM thongtinnhanvien WHERE id = $id";
		$result = mysqli_query($this->conn,$sql);
		return $result;
	}
}

?>