<?php 
class Produk{
 public $nama = "Nuvo";
 public $harga = 3000;
 public $jumlah = 10; 

 public function pemesanan () {
 return "Pesanan Sudah Diterima";
 }
}
 $sabun = new Produk();
 echo "Nama Sabun: " .$sabun -> nama ."<br>";
 echo "Harga: " .$sabun -> harga. "<br>" ;
 echo "Jumlah Stock: " .$sabun -> jumlah. "<br>" ;
 
 echo "Status Pemesanan: " .$sabun -> pemesanan();
?>