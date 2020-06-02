<?php 

	function kode_bar($length){
		$data = '1234567890';
		$string = 'M-';

		for ($i=0; $i < $length; $i++) { 
			$angka = rand(0, strlen($data)-1);
			$string .= $data{$angka};
		}

		return $string;
	}

	$kode = kode_bar(10);


 ?>