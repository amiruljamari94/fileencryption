<?php

class Mahasiswa_model
{
	private $table = 'encryptFile';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}
	// private $dbh;
	// private $stmt;

	


	// private $mhs = [
	// 	[
	// 		"nama" => "Amirul Jamari",
	// 		"nrp" => "09018979",
	// 		"email" => "amirul@gmail.com",
	// 		"jurusan" => "Information Technology"
	// 	],

	// 	[
	// 		"nama" => "Ali Sulaiman",
	// 		"nrp" => "09656520",
	// 		"email" => "ali@gmail.com",
	// 		"jurusan" => "Information System"
	// 	],

	// 	[
	// 		"nama" => "Faiz Rahman",
	// 		"nrp" => "0905565979",
	// 		"email" => "faiz@gmail.com",
	// 		"jurusan" => "Computer Science"
	// 	],

	// 	[
	// 		"nama" => "Razif Jalaini",
	// 		"nrp" => "09018564489",
	// 		"email" => "razifl@gmail.com",
	// 		"jurusan" => "Cyber security"
	// 	],

	// ];

	public function getAllMahasiswa()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		// return $this->db->resultSet();
		// $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
		// $this->stmt->execute();
		// return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
		// return $this->mhs;
	}

	// public function getMahasiswaById($id)
	// {
	// 	$this->db->query(' SELECT * FROM ' . $this->table . ' WHERE id=:id ');
	// 	$this->db->bind('id', $id);
	// 	return $this->db->single();
	// }

	// public function tambahDataMahasiswa($data)
	// {
	// 	$query = "INSERT INTO mahasiswa VALUES ('', :nama, :nrp, :email, :jurusan) ";

	// 	$this->db->query($query);
	// 	$this->db->bind('nama', $data['nama']);
	// 	$this->db->bind('nrp', $data['nrp']);
	// 	$this->db->bind('email', $data['email']);
	// 	$this->db->bind('jurusan', $data['jurusan']);

	// 	$this->db->execute();

	// 	return $this->db->rowCount();
	// }

	// public function deleteDataMahasiswa($id)
	// {
	// 	$query = "DELETE FROM mahasiswa WHERE id = :id";
	// 	$this->db->query($query);
	// 	$this->db->bind('id', $id);

	// 	$this->db->execute();

	// 	return $this->db->rowCount();
	// }

	// public function ubahDataMahasiswa($data)
	// {
	// 	$query = " UPDATE mahasiswa SET 
	// 		nama = :nama,
	// 		nrp = :nrp,
	// 		email = :email,
	// 		jurusan - :jurusan
	// 		WHERE id = :id ";

	// 	$this->db->query($query);
	// 	$this->db->bind('nama', $data['nama']);
	// 	$this->db->bind('nrp', $data['nrp']);
	// 	$this->db->bind('email', $data['email']);
	// 	$this->db->bind('jurusan', $data['jurusan']);

	// 	$this->db->execute();

	// 	return $this->db->rowCount();
	// }

	// public function cariDataMahasiswa()
	// {
	// 	$keyword= $_POST['keyword'];
	// 	$query = " SELECT * FROM mahasiswa WHERE nama LIKE :keyword ";
	// 	$this->db->query($query);
	// 	$this->db->bind('keyword', "%$keyword%");
	// 	return $this->db->resultSet();
	// }

}