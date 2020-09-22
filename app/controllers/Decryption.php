<?php

class Decryption extends Controller
{
	public function index()
	{
		$data['judul'] = 'Daftar Mahasiswa';
		$this->view('templates/header', $data);
		$this->view('templates/user/decryption', $data);
		$this->view('templates/footer');
	}

	public function index2()
	{
		$data['judul'] = 'Decrypt Data';
		$this->view('templates/header', $data);
		$this->view('templates/user/decryption2', $data);
		$this->view('templates/footer');
	}

	public function process()
	{
		echo '<pre>';print_r($_POST);echo '</pre>';
		# process encrypt data
		$inputText = $_POST['decrypted'];
		$inputKey = $_POST['inputKey'];
		$blockSize = 256;
		$aes = new AES($inputText, $inputKey, $blockSize);
		$dec=$aes->decrypt();
		echo "After decryption: ".$dec."<br/>";
	}

	public function processFile()
	{
		$error = '';
		//echo '<pre>';print_r($_POST);echo '</pre>';
		
			$algorithm = ALGORITHM1;
			$IV = IV1;

		if (isset($_POST) && isset($_POST['action'])) 
		{
			///echo 'test1<br>';
			$password   = isset($_POST['password']) && $_POST['password']!='' ? $_POST['password'] : null;
			$action = isset($_POST['action']) && in_array($_POST['action'],array('c','d')) ? $_POST['action'] : null;
			$file     = isset($_FILES) && isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK ? $_FILES['file'] : null;
			
			$this->processFile2($error, $password, $action, $file, $algorithm, $IV) ;		
			
		}
		
	}
	
	public function processFile2($error, $password, $action, $file, $algorithm, $IV)
	{
		// echo 'test2<br>';
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