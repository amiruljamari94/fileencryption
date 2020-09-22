<?php

class Encryption_model
{
	
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

    public function addEncryptedFile($table1, $data)
	{
		$query = "INSERT INTO $table1 VALUES ('', :encrypted, :decrypted, :date) ";

		$this->db->query($query);
		$this->db->bind('encrypted', $data['encrypted']);
        $this->db->bind('decrypted', $data['decrypted']);
        $this->db->bind('date', $data['date']);
		$this->db->execute();
		return $this->db->rowCount();
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

public function processFile2($error, $password, $action, $file, $algorithm, $IV)
	{
		// echo 'test2<br>';
		// echo '$ext =' . $ext;
		if ($password === null) {$error .= 'Invalid Password<br>';}

		if ($action === null) {$error .= 'Invalid Action<br>';}

		if ($file === null) {$error .= 'Errors occurred while elaborating the file<br>';}

		if ($error === '') {
			
			$contenuto = '';
			$nomefile  = '';
		
			$contenuto = file_get_contents($file['tmp_name']);
			$filename  = $file['name'];
		
			switch ($action) {
			case 'c':
				$contenuto = openssl_encrypt($contenuto, $algorithm, $password, 0, $IV);
				$filename  = $filename . '.crypto';
				break;
			case 'd':
				$contenuto = openssl_decrypt($contenuto, $algorithm, $password, 0, $IV);
				$filename  = preg_replace('#\.crypto$#','',$filename);
				
				break;
			}
			
			if ($contenuto === false) {
			$error .= 'Errors occurred while encrypting/decrypting the file ';
			}
			
			if ($error === '') {
			
			header("Pragma: public");
			header("Pragma: no-cache");
			header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
			header("Cache-Control: post-check=0, pre-check=0", false);
			header("Expires: 0");
			header("Content-Type: application/octet-stream");
			header("Content-Disposition: attachment; filename=\"" . $filename . "\";");
			$size = strlen($contenuto);
			header("Content-Length: " . $size);
			echo $contenuto;    
			die;
			
			}
		
		}

	}

}