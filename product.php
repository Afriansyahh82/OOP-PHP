<?php
class Produk{
public $namaProduk;
public $jenisProduk;
public $jumlahroduk;
public $stok;
public $pembelian;

// constructor untuk inisialisasi properties/atribut
public function __construct($namaProduk = '', $jenisProduk = '', $jumlahProduk = 0, $stok = 0, $pembelian = 0){

    $this->np = $namaProduk;
    $this->jp = $jenisProduk;
    $this->jm = $jumlahProduk;
    $this->stok = $stok;
    $this->pembelian = $pembelian;
}

public function stokAkhirProduk(){
    // Menghitung hasil akhir stok
    $this->stok = ($this->stok - $this->pembelian);
    return $this->stok;
}
}

// inisialisasi variabel untuk perhtungan setok
$stokakhir = null;

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Membentuk instance / objek baru dari class produk
    $panggilProduk = new Produk();
    $panggilProduk->stok = intval($_POST['stok']);
    $panggilProduk->pembelian = intval($_POST['pembelian']);

    // Perhitungan akhir sebuah produk
    $Stokakhir = $panggilProduk->stokAkhirProduk();
}
?>