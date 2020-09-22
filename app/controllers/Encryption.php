<?php

class Encryption extends Controller
{
	public function index()
	{
		$data['judul'] = 'Daftar Mahasiswa';
		$data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
		$this->view('templates/header', $data);
		$this->view('templates/user/encryption', $data);
		$this->view('templates/footer');
	}

	public function index2()
	{
		
		$data['judul'] = 'Encryption Text';
		$this->view('templates/header', $data);
		$this->view('templates/user/encryption2', $data);
		$this->view('templates/footer');
		
	}
	
	public function process()
	{
		
		//echo '<pre>';print_r($_POST);echo '</pre>';
		# process encrypt data
		$inputText = $_POST['encrypted'];
		$inputKey = $_POST['inputKey'];
		$blockSize = 256;
		$aes = new AES($inputText, $inputKey, $blockSize);
		$enc = $aes->encrypt();
		$aes->setData($enc);
		$dec=$aes->decrypt();
		// echo "After encryption: ".$enc."<br/>";
		// echo "After decryption: ".$dec."<br/>";

		# process to database
		$table1 = 'securecode';
		$data['encrypted'] = $enc;
		$data['decrypted'] = $dec;
		$data['date'] = date("Y-m-d h:i:sa"); 

		# sql insert
		$this->model('Encryption_model')->addEncryptedFile($table1, $data);
		//$this->log_sql($jadual, $medan, $posmen);

		# Pergi papar kandungan
		//echo '<br>location: ' . URL . '';
		header('location: ' . URL . 'decryption'); //*/
	}

	public function processFile()
	{
		$error = '';
		// echo '<pre>';print_r($_POST);echo '</pre>';
			$algorithm = ALGORITHM1;
			$IV = IV1;
			
		if (isset($_POST) && isset($_POST['action'])) 
		{
			///echo 'test1<br>';
			$password   = isset($_POST['password']) && $_POST['password']!='' ? $_POST['password'] : null;
			$action = isset($_POST['action']) && in_array($_POST['action'],array('c','d')) ? $_POST['action'] : null;
			$file     = isset($_FILES) && isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK ? $_FILES['file'] : null;
			
			$this->model('Encryption_model')->processFile2($error, $password, $action, $file, $algorithm, $IV);		
			
		}
		
	}
	
	

	function logout()
	{
		//echo '<pre>sebelum:'; print_r($_SESSION); echo '</pre>';
		unset($_SESSION);
		session_destroy();
		header('location: ' . URL);
		//exit;
	}


}