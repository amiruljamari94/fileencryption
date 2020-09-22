<?php

class Controller
{
	public function view($view, $data = [])
	{
		require_once '../app/views/' . $view . '.php';
	}	

	public function model($model)
	{
		require_once '../app/models/' . $model . '.php';
		return new $model;
		
	}

	public function semakPembolehUbah($senarai, $jadual,$p='0')
	{
		echo '<pre>$' . $jadual . '=><br>';
		if($p == '0') print_r($senarai);
		if($p == '0') var_export($senarai);
		if($p == '0') var_dump($senarai);
		echo '</pre>';
	}
}