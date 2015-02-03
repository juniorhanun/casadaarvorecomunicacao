<?php

//include('../../funcoes.php');

$file = $_FILES['Filedata'];

$filename = $file['name'];

$path     = $file['tmp_name'];



$handle = opendir("../".$_POST['id'].$_GET['id']."/");
$indice = 0;
$contalinha=0;
$conta=0;
while (false !== ($file = readdir($handle))){
	$pathdata = pathinfo($file);
	if (!is_dir($file) && (strtolower($pathdata["extension"]) == "jpg")){
		$conta++;
	}
}


/* pega a ultima imagem */
$new_path = "../".$_POST['id'].$_GET['id']."/".($conta+1).".jpg";
move_uploaded_file($path, $new_path);


/* miniaturas * /
$wM=96;
$hM=96;
$imgM = NULL;
$imgM = imagecreatetruecolor($wM, $hM); 
imagealphablending($imgM,false);
$imM = imagecreatefromjpeg($new_path2);
$widM = 96;
$heiM = 96;
$wM = imagesx($imM);
$hM = imagesy($imM);
$w1M = $wM / $widM;
if ($heiM == 0){
	$h1M = $w1M;
	$heiM = $hM / $w1M;
}else{
	$h1M = $hM / $heiM;
}
$minM = min($w1M,$h1M);  
$xtM = $minM * $widM;
$x1M = ($wM - $xtM) / 2;
$x2M = $wM - $x1M;	  
$ytM = $minM * $heiM;
$y1M = ($hM - $ytM) / 2;
$y2M = $hM - $y1M;	  
$x1M = (int) $x1M;
$x2M = (int) $x2M;
$y1M = (int) $y1M;
$y2M = (int) $y2M;				
imagealphablending($imM,true);
imagecopyresampled($imgM,$imM,0,0,$x1M,$y1M,$widM,$heiM,$x2M-$x1M,$y2M-$y1M);	
imagesavealpha($imgM, true); 
imagepng($imgM, "../../".$_POST['id'].$_GET['id']."/p/".$novonomearquivo);
/* miniaturas */




	
	
	
	
	
	
	
	
	
	
	// fim :)

//redimenciona("../".$_POST['id'].$_GET['id']."/".strtolower($file['name']), strtolower($file['name']), "256", "../".$_POST['id'].$_GET['id']."/miniaturas/");
/*
// Vamos usar a biblioteca WideImage para o redimensionamento das imagens
require("lib/WideImage/WideImage.php");

// Carrega a imagem enviada
$original = WideImage::load($new_path);
// Redimensiona a imagem original para 1024x768 caso ela seja maior que isto e salva
$original->resize(1024, 768, 'inside', 'down')->saveToFile($new_path, null, 90);
*/
// Cria a miniatura
//$ext = end(explode(".", $new_path)); // Pega a extensão do arquivo
//$thumb = str_replace(".$ext", "_thumb.$ext", $new_path); // Substitui a extensão
//$original->resize(100, 75, 'inside', 'down')->saveToFile($thumb, null, 90); // Redimensiona e salva


echo '1';
?>
