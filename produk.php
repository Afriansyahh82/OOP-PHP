<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok Barang</title>
</head>
<body>

<style>
    body {
        font-family: "Arial";
        background-color: antiquewhite;
    }

    input {
        background-color: aqua;
        padding: 10px; /* Increase padding for larger size */
        font-size: 1.2em; /* Increase font size */
        width: 200px; /* Set a fixed width */
    }

    button {
        border-radius: .5rem;
        background-color: white;
        padding: 10px 20px; /* Increase button size */
        font-size: 1.2em; /* Increase font size */
    }

    .info {
        margin: 10px 0;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
</style>

<h2>Form Pemesanan Barang</h2>

<div class="info">
    <strong>Harga per Item:</strong> Rp 5000
</div>

<div class="info">
    <strong>Saldo Awal:</strong> Rp <span id="saldo-awal">200,000</span>
</div>

<form method="post">
    <input type="number" name="jumlah" placeholder="Masukkan Jumlah Barang" required>
    <br><br>
    <button type="submit">Beli Sekarang</button>
</form>
<br>
<form method="post">
    <button type="submit" name="reset">Reset Stok</button>
</form>
<br>

<?php
session_start(); // Memulai session untuk menyimpan stok dan saldo

define('HARGA_PER_ITEM', 5000); // Harga per item

// Inisialisasi saldo awal
if (!isset($_SESSION['saldo'])) {
    $_SESSION['saldo'] = 200000; // Saldo awal
}

if (!isset($_SESSION['stok'])) {
    $_SESSION['stok'] = 95; // Stok awal
}

class Barang {
    public $jenis;
    public $merek;
    public $stok;

    public function pesanProduk($jumlah) {
        if ($this->stok >= $jumlah) {
            $this->stok -= $jumlah;
            return true; // Pesanan berhasil
        } else {
            return false; // Stok tidak cukup
        }
    }
}

$barang = new Produk;
$barang->stok = $_SESSION['stok']; // Mengambil stok dari session

$pesananDilakukan = false; // Flag untuk menandakan apakah pesanan telah dilakukan

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['reset'])) {
        $_SESSION['stok'] = 150; // Reset stok ke nilai awal
    } else {
        $jumlahPesan = (int)$_POST['jumlah'];
        $totalHarga = $jumlahPesan * HARGA_PER_ITEM; // Hitung total harga

        if ($_SESSION['saldo'] >= $totalHarga && $barang->pesanProduk($jumlahPesan)) {
            $_SESSION['stok'] = $barang->stok; // Update stok di session
            $_SESSION['saldo'] -= $totalHarga; // Kurangi saldo
            $pesananDilakukan = true; // Set flag pesanan dilakukan
            echo "<br>Pesanan berhasil! Total harga: Rp " . number_format($totalHarga, 0, ',', '.') . ". Stok tersisa setelah pemesanan: " . $barang->stok;
            echo "<br>Saldo tersisa: Rp " . number_format($_SESSION['saldo'], 0, ',', '.'); // Tampilkan saldo setelah pemesanan
        } else {
            echo "<br>Stok tidak cukup atau saldo tidak cukup. Stok saat ini: " . $barang->stok . ", Saldo saat ini: Rp " . number_format($_SESSION['saldo'], 0, ',', '.');
        }
    }
}

// Tampilkan pesan reset hanya setelah pesanan dilakukan
if ($_SERVER["REQUEST_METHOD"] == "POST" && $pesananDilakukan && isset($_POST['reset'])) {
    echo "<br>Stok telah di reset menjadi: " . $_SESSION['stok'];
}

// Tampilkan stok saat ini
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<br>Stok saat ini: " . $barang->stok;
}
?>

</body>
</html>
