<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Kucing</title>
</head>
<body>
<h1>Kucing Edan miiiAAAAAAW</h1>
<?php
class Kucing {
public $nama = "Ksatria";
public $warna = "oren";
public $ekor = "panjang";
public $umur = 2;
public $jenis_kelamin = "Jantan";
public $jenis_kucing = "Domestik";

public function suaraKucing () {
    return "miAWWWW";
 }
public function goyangEkor(){
 return "zigzag";
}
public function loncat() {
    return "jangkung";
}
}

$kucing = new Kucing;
echo "Nama Kucing: " .$kucing -> nama. "<br>";
echo "Warna Kucing: " .$kucing -> warna. "<br>";
echo "Warna Kucing: " .$kucing -> ekor. "<br>";
echo "Warna Kucing: " .$kucing -> umur ."<br>";
echo "Warna Kucing: " .$kucing -> jenis_kelamin. "<br>";
echo "Warna Kucing: " .$kucing -> jenis_kucing. "<br>";


echo "Suara Ksatria: " .$kucing -> suaraKucing(). "<br>" ;
echo "Goyang Ekor Ksatria: " .$kucing -> goyangEkor(). "<br>" ;
echo "Loncat si Ksatria: " .$kucing -> loncat(). "<br>" ;
?>
</body>
</html>