<?php
// class Listfile_model
// {
	
// 	public function __construct()
// 	{
// 		$this->db = new Database;
// 	}
// 	// private $dbh;
//     // private $stmt;
//     function semakData($a, $b)
// 	{
// 		echo '<pre>' . $a . ":";
// 		print_r($b);
// 		echo '</pre>';
//     }
    
//     function bersih($papar)
//     {
//         # lepas lari aksara khas dalam SQL
//         //$papar = mysql_real_escape_string($papar);
//         # buang ruang kosong (atau aksara lain) dari mula & akhir
//         $papar = trim($papar);

//         return $papar;

//     }

//     public function getAllData($table, $field = '*')
//     {
//         $this->db->query('SELECT '. $field .' FROM ' . $table);
// 		return $this->db->resultSet();
// 		// $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
// 		// $this->stmt->execute();
// 		// return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
// 		// return $this->mhs;
//     }
// }