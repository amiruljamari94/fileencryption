<?php

class Login_model
{
	private $table = 'registration';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}
	// private $dbh;
    // private $stmt;
    function semakData($a, $b)
	{
		echo '<pre>' . $a . ":";
		print_r($b);
		echo '</pre>';
    }
    
    function bersih($papar)
    {
        # lepas lari aksara khas dalam SQL
        //$papar = mysql_real_escape_string($papar);
        # buang ruang kosong (atau aksara lain) dari mula & akhir
        $papar = trim($papar);

        return $papar;
    }
    
    function ubahsuaiPostBaru($myTable)
	{
        // echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		$posmen = array();
		foreach ($_POST as $kekunci => $papar):
            // echo '$papar=' . $papar;
            // echo '$kekunci=' . $kekunci;
            @$posmen[$myTable][$kekunci] = $this->bersih($papar);
		endforeach;
        # semak data
        //$this->semakData('myTable', $myTable);
        //$this->semakData('posmen', $posmen);
        $posmen = $this->semaKataLaluan($myTable, $posmen);
        // $this->semakData('posmen1', $posmen);
        $posmen = $this->kataLaluanX($myTable, $posmen);
        // $this->semakData('posmen2', $posmen);

		return $posmen;
	}
#---------------------------------------------------------------------------------------------------#
	public function semaKataLaluan($myTable, $posmen)
	{
        // echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		if(isset($posmen[$myTable]['password']))
			if($posmen[$myTable]['password'] == $posmen[$myTable]['confirmPassword']):
				$pass = $posmen[$myTable]['password'];
				$garam = $this->cincang($pass);
				$posmen[$myTable]['password'] = $garam;
            else: 
                echo 'tak berjaya';
			endif;

		return $posmen; # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	public function kataLaluanX($myTable, $posmen)
	{
        //echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		$surat = array('kataLaluan');
		foreach ($surat as $kekunci)
		if(isset($posmen[$myTable]['confirmPassword']))
			if(empty($posmen[$myTable]['confirmPassword'])):
				unset($posmen[$myTable]['confirmPassword']);
			else:
				$posmen[$myTable]['confirmPassword'] = 'user';
				$posmen[$myTable] = $this->replace_key
					($posmen[$myTable],'confirmPassword', 'level');
			endif;

		return $posmen; # pulangkan nilai
    }
    
    #---------------------------------------------------------------------------------------------------#
	function replace_key($arr, $oldkey, $newkey)
	{
		# https://fellowtuts.com/php/change-array-key-without-changing-order/
		if(array_key_exists( $oldkey, $arr))
		{
			$keys = array_keys($arr);
			$keys[array_search($oldkey, $keys)] = $newkey;
			return array_combine($keys, $arr);
		}

		return $arr;
	}
#---------------------------------------------------------------------------------------------------#

    public function cincang($data)
	{
		if (function_exists('password_hash'))
        {# php >= 5.5
            $options = ['cost' => 12,];
			$cincang = password_hash($data, PASSWORD_DEFAULT, $options);
		}
		else
		{
			$garam = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
			$garam = base64_encode($garam);
			$garam = str_replace('+', '.', $garam);
			$cincang = crypt($data, '$2y$18$' . $garam . '$');
		}

		return $cincang;
    }
    
    public function addUser($table1, $data)
	{
		$query = "INSERT INTO $table1 VALUES ('', :name, :email, :password, :level) ";

		$this->db->query($query);
		$this->db->bind('name', $data['name']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('password', $data['password']);
		$this->db->bind('level', $data['level']);
		$this->db->execute();
		return $this->db->rowCount();
	}


    function loginid()
	{
		echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		# semak data $_POST
		$email = $this->bersih($_POST['email']);
		$passwordAsal = $this->bersih($_POST['password']);
		# semak database
            $query = " SELECT * FROM $this->table WHERE email LIKE :email ";
            $this->db->query($query);
            $this->db->bind('email', $email); 
            $result = $this->db->resultSet();	
            $password = $result[0]['password'];
            $sahkan = $this->sahkan($passwordAsal, $password);
            
		# semak pembolehubah
        $this->semakData('result', $result);
        $this->semakData('sahkan', $sahkan);
        return array($sahkan, $result);
		// $this->kunciPintu($kira, $cariNama); # pilih pintu masuk
	}
#------------------------------------------------------------------------------------------
#---------------------------------------------------------------------------------------------
public static function sahkan($data, $cincang)
{
    if (function_exists('password_verify'))
    {# php >= 5.5
        $pisau = password_verify($data, $cincang);
    }
    else
    {
        $lumat = crypt($data, $cincang);
        $pisau = $cincang == $lumat;
    }

    return $pisau;
}
#---------------------------------------------------------------------------------------------
	


	

	public function getAllMahasiswa()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		// return $this->db->resultSet();
		// $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
		// $this->stmt->execute();
		// return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
		// return $this->mhs;
	}

	public function getMahasiswaById($id)
	{
		$this->db->query(' SELECT * FROM ' . $this->table . ' WHERE id=:id ');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function tambahDataMahasiswa($data)
	{
		$query = "INSERT INTO mahasiswa VALUES ('', :nama, :nrp, :email, :jurusan) ";

		$this->db->query($query);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('nrp', $data['nrp']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('jurusan', $data['jurusan']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteDataMahasiswa($id)
	{
		$query = "DELETE FROM mahasiswa WHERE id = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function ubahDataMahasiswa($data)
	{
		$query = " UPDATE mahasiswa SET 
			nama = :nama,
			nrp = :nrp,
			email = :email,
			jurusan - :jurusan
			WHERE id = :id ";

		$this->db->query($query);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('nrp', $data['nrp']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('jurusan', $data['jurusan']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariDataMahasiswa()
	{
		$keyword= $_POST['keyword'];
		$query = " SELECT * FROM mahasiswa WHERE nama LIKE :keyword ";
		$this->db->query($query);
		$this->db->bind('keyword', "%$keyword%");
		return $this->db->resultSet();
	}

}