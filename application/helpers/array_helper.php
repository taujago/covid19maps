<?php 


function flipdate($str){

	$x = explode("-",$str);

	if(count($x)<3) {
		return null;
	}
	else {
		return $x[2]."-".$x[1]."-".$x[0];
	}
}

function rupiah($angka) {
	return number_format($angka,0,',','.');
}

function angka_koma($number){
	return number_format((float)$number, 2, '.', '');
}

function angka_tanpa_koma($number){
	return number_format((float)$number, 0, '.', '');
}

function show_array($arr) {
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}





?>