<?php

$file = $_FILES['Filedata'];

$filename = $file['name'];

$path     = $file['tmp_name'];
//$new_path = "../../".$_POST['id'].$_GET['id']."/".strtolower($file['name']);


/* pega a ultima imagem */
$handle = opendir("../../".$_POST['id'].$_GET['id']."/");
while (false !== ($file = readdir($handle))){
	$pathdata = pathinfo($file);
	if (!is_dir($file)){
		if(strtolower($pathdata["extension"]) == strtolower("jpg") or strtolower($pathdata["extension"]) == strtolower("jpeg")){
			$resultado[strtolower($file)]=$file;
			$conta++;
		}
	}
}
$ultima='';
if($conta){
	natsort($resultado);
	foreach($resultado as $valor) {
		$ultima=$valor;
	}
}
$codigo=date('YmdHis').str_pad(rand(0,999),3,"0",STR_PAD_LEFT);
if($ultima){
	$novonomearquivo=str_pad((substr($ultima,0,3)+1),3,"0",STR_PAD_LEFT)."_".$codigo.".jpg";
}else{
	$novonomearquivo="001_".$codigo.".jpg";
}

$new_path = "../../".$_POST['id'].$_GET['id']."/temp_".$novonomearquivo;

move_uploaded_file($path, $new_path);



/* miniaturas */
$w=96;
$h=96;
$img = NULL;
$img = imagecreatetruecolor($w, $h); 
imagealphablending($img,false);
$im = imagecreatefromjpeg($new_path);
$wid = 96;
$hei = 96;
$w = imagesx($im);
$h = imagesy($im);
$w1 = $w / $wid;
if ($hei == 0){
	$h1 = $w1;
	$hei = $h / $w1;
}else{
	$h1 = $h / $hei;
}
$min = min($w1,$h1);  
$xt = $min * $wid;
$x1 = ($w - $xt) / 2;
$x2 = $w - $x1;	  
$yt = $min * $hei;
$y1 = ($h - $yt) / 2;
$y2 = $h - $y1;	  
$x1 = (int) $x1;
$x2 = (int) $x2;
$y1 = (int) $y1;
$y2 = (int) $y2;				
imagealphablending($im,true);
imagecopyresampled($img,$im,0,0,$x1,$y1,$wid,$hei,$x2-$x1,$y2-$y1);	
imagesavealpha($img, true); 
imagepng($img, "../../".$_POST['id'].$_GET['id']."/p/".$novonomearquivo);
/* miniaturas */


/* miniaturas */

$i=getimagesize($new_path);
if($i[0]>$i[1]){
	$w=696;
	$h=522;
	$wid = 696;
	$hei = 522;
}else{
	$w=392;
	$h=522;
	$wid = 392;
	$hei = 522;
}


/* miniaturas */

$img = NULL;
$img = imagecreatetruecolor($w, $h); 
imagealphablending($img,false);
$im = imagecreatefromjpeg($new_path);

$w = imagesx($im);
$h = imagesy($im);
$w1 = $w / $wid;
if ($hei == 0){
	$h1 = $w1;
	$hei = $h / $w1;
}else{
	$h1 = $h / $hei;
}
$min = min($w1,$h1);  
$xt = $min * $wid;
$x1 = ($w - $xt) / 2;
$x2 = $w - $x1;	  
$yt = $min * $hei;
$y1 = ($h - $yt) / 2;
$y2 = $h - $y1;	  
$x1 = (int) $x1;
$x2 = (int) $x2;
$y1 = (int) $y1;
$y2 = (int) $y2;				
imagealphablending($im,true);
imagecopyresampled($img,$im,0,0,$x1,$y1,$wid,$hei,$x2-$x1,$y2-$y1);	
imagesavealpha($img, true); 
imagepng($img, "../../".$_POST['id'].$_GET['id']."/".$novonomearquivo);
/* miniaturas */



/*

$i=getimagesize($new_path);

if($i[0]>$i[1]){
	$w=696;
	$h=522;
}else{
	$w=392;
	$h=522;
}


		
	//$largura=900;
	$img = imagecreatefromjpeg($new_path);
	$x = imagesx($img);
	$y = imagesy($img);
	//$altura = ($largura * $y)/$x;
	$largura=$w;
	$altura=$h;
	$nova = imagecreatetruecolor($largura, $altura);
	imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $altura, $x, $y);
	imagejpeg($nova, $new_path);
	imagedestroy($img);
	imagedestroy($nova);
	/* redimensiona* /
	
	$foto= imagecreatefromjpeg("../../".$_POST['id'].$_GET['id']."/".$novonomearquivo); // não esquecer de verificar o nome do arquivo
	
	if($x>$y){
		$marca=imagecreatefrompng("../../conteudo/fotos/moldura_horizontal.png");     // não esquecer de verificar o nome do arquivo
	}else{
		$marca=imagecreatefrompng("../../conteudo/fotos/moldura_vertical.png");     // não esquecer de verificar o nome do arquivo
	}
	
	
	// pega as dimensoes da marca d'agua
	$marca_larg=imagesx($marca);
	$marca_alt= imagesy($marca);
	// insere a marca na imagem
	imagecopyresampled($foto,$marca,0,0,0,0,$marca_larg,$marca_alt,$marca_larg,$marca_alt);
	// exibe a imagem
	imagejpeg($foto,"../../".$_POST['id'].$_GET['id']."/".$novonomearquivo,100);
	// fim :)

*/


	







//redimenciona("../".$_POST['id'].$_GET['id']."/".$novonomearquivo, $novonomearquivo, "256", "../".$_POST['id'].$_GET['id']."/miniaturas/");

// Vamos usar a biblioteca WideImage para o redimensionamento das imagens
require("lib/WideImage/WideImage.php");

// Carrega a imagem enviada
$original = WideImage::load($new_path);
// Redimensiona a imagem original para 1024x768 caso ela seja maior que isto e salva
$original->resize(1024, 768, 'inside', 'down')->saveToFile($new_path, null, 90);

// Cria a miniatura
//$ext = end(explode(".", $new_path)); // Pega a extensão do arquivo
//$thumb = str_replace(".$ext", "_thumb.$ext", $new_path); // Substitui a extensão
//$original->resize(100, 75, 'inside', 'down')->saveToFile($thumb, null, 90); // Redimensiona e salva


echo '1';
?>
