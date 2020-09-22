<?php

class Login extends Controller
{

	function semakData($a, $b)
	{
		echo '<pre>' . $a . ":";
		print_r($b);
		echo '</pre>';
	}

	public function index()
	{
		$data['judul'] = 'Daftar Mahasiswa';
		$data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
		$this->view('templates/header', $data);
		$this->view('templates/user/login', $data);
		$this->view('templates/footer');
	}

	public function registerUser()
	{
		// echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		//$this->semakData('_POST', $_POST);	
		// $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id)
		$posmen = $this->model('Login_model')->ubahsuaiPostBaru('registration');
		$this->semakData('posmen', $posmen);

		# sql insert
		$this->model('Login_model')->addUser('registration', $posmen['registration']);
		//$this->log_sql($jadual, $medan, $posmen);

		# Pergi papar kandungan
		//echo '<br>location: ' . URL . '';
		header('location: ' . URL . ''); //*/
	}

	public function registerAdmin()
	{
		echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		$this->semakData('_POST', $_POST);	
	}

	public function loginUser()
	{
		echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		$this->semakData('_POST', $_POST);	
		list($kira, $data) = $this->model('Login_model')->loginId();
		$this->kunciPintu($kira, $data);

	}

	public function loginAdmin()
	{
		echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		$this->semakData('_POST', $_POST);	
		
	}

	#------------------------------------------------------------------------------------------
	
	function kunciPintu($kira, $data)// SEMAK DATA BETUL ATAU TIDAK
	{
		/*echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		echo "<pre>\$kira=$kira | \$data =>"; print_r($data); echo '</pre>';//*/
		if ($kira == true)
		{	# login berjaya
			$_SESSION['name'] = $data[0]['name'];
			$_SESSION['email'] = $data[0]['email'];
			$_SESSION['level'] = $data[0]['level'];
			$_SESSION['loggedIn'] = true;
			//echo '<hr>Berjaya';
			$this->levelPengguna($data[0]['level']);
		}
		else # login gagal
		{	//echo '<hr>Tidak Berjaya';
			header('location:' . URL);
		}//*/
	}
#------------------------------------------------------------------------------------------
	function levelPengguna($level)
	{
		/*echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		echo "<pre>\$level = $level </pre>";//*/
		//header('location:' . URL . 'ruangtamu');
		if(in_array($level,array('user')))
			header('location:' . URL . 'encryption');
		elseif(in_array($level,array('admin')))
			header('location:' . URL . 'admin');
		
		else
			header('location:' . URL . '');//*/
	}
#------------------------------------------------------------------------------------------
}