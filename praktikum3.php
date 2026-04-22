<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Produk Sederhana - Praktikum 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card-custom { border-radius: 15px; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .header-bg { background: linear-gradient(135deg, #6610f2, #6f42c1); color: white; border-radius: 15px 15px 0 0; }
        .product-item { border-left: 4px solid #6f42c1; background: #fff; margin-bottom: 10px; padding: 15px; border-radius: 5px; }
        .receipt-box { background: #fffdf5; border: 1px dashed #ffc107; padding: 20px; border-radius: 10px; }
    </style>
</head>
<body>

<?php
// --- CLASS PRODUK ---
class Produk {
    public static $jumlahProduk = 0; // static $jumlahProduk
    public $namaProduk;
    public $harga;

    public function __construct($nama, $harga) {
        $this->namaProduk = $nama;
        $this->harga = $harga;
        // Panggil method tambahProduk() saat objek dibuat
        $this->tambahProduk();
    }

    // method tambahProduk()
    public function tambahProduk() {
        self::$jumlahProduk++;
    }
}

// --- CLASS TRANSAKSI ---
class Transaksi extends Produk {
    // final method prosesTransaksi()
    final public function prosesTransaksi($qty) {
        $total = $this->harga * $qty;
        return [
            'nama' => $this->namaProduk,
            'qty' => $qty,
            'total' => $total
        ];
    }
}

// 1 & 2. Tambahkan nama produk, harga & Buat minimal 3 produk
$produk1 = new Transaksi("iPhone 15 Pro", 21000000);
$produk2 = new Transaksi("MacBook Air M3", 18500000);
$produk3 = new Transaksi("iPad Pro Gen 6", 14000000);
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-custom">
                <div class="header-bg p-4 text-center">
                    <h3 class="mb-0">Manajemen Produk & Transaksi</h3>
                    <p class="mb-0 opacity-75">Tugas Praktikum 3 - Digital Business</p>
                </div>
                
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <h5 class="border-bottom pb-2 mb-3">Daftar Produk Terdaftar</h5>
                            <div class="product-item">
                                <strong><?= $produk1->namaProduk ?></strong><br>
                                <span class="text-muted">Rp <?= number_format($produk1->harga, 0, ',', '.') ?></span>
                            </div>
                            <div class="product-item">
                                <strong><?= $produk2->namaProduk ?></strong><br>
                                <span class="text-muted">Rp <?= number_format($produk2->harga, 0, ',', '.') ?></span>
                            </div>
                            <div class="product-item">
                                <strong><?= $produk3->namaProduk ?></strong><br>
                                <span class="text-muted">Rp <?= number_format($produk3->harga, 0, ',', '.') ?></span>
                            </div>
                            
                            <div class="alert alert-primary mt-3 text-center">
                                <strong>Total Produk Tersedia: <?= Produk::$jumlahProduk ?></strong>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h5 class="border-bottom pb-2 mb-3">4. Simulasi Transaksi</h5>
                            <div class="receipt-box">
                                <?php 
                                // Simulasi transaksi produk 1 dan 3
                                $trx1 = $produk1->prosesTransaksi(2);
                                $trx2 = $produk3->prosesTransaksi(1);
                                ?>
                                
                                <div class="mb-3">
                                    <small class="text-uppercase text-muted">Item 1</small>
                                    <div class="d-flex justify-content-between">
                                        <span><?= $trx1['nama'] ?> (x<?= $trx1['qty'] ?>)</span>
                                        <span class="fw-bold">Rp <?= number_format($trx1['total'], 0, ',', '.') ?></span>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <small class="text-uppercase text-muted">Item 2</small>
                                    <div class="d-flex justify-content-between">
                                        <span><?= $trx2['nama'] ?> (x<?= $trx2['qty'] ?>)</span>
                                        <span class="fw-bold">Rp <?= number_format($trx2['total'], 0, ',', '.') ?></span>
                                    </div>
                                </div>

                                <hr>
                                <div class="d-flex justify-content-between text-danger fw-bold h5">
                                    <span>GRAND TOTAL</span>
                                    <span>Rp <?= number_format($trx1['total'] + $trx2['total'], 0, ',', '.') ?></span>
                                </div>
                            </div>
                            
                            <div class="mt-4 small p-3 bg-light rounded border">
                                <span class="badge bg-dark mb-2">Konsep OOP</span><br>
                                • <strong>Static:</strong> Counter produk tetap sinkron antar objek.<br>
                                • <strong>Final:</strong> Method transaksi dikunci demi keamanan data.
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer bg-white text-center py-3">
                    <button class="btn btn-sm btn-outline-secondary" onclick="window.print()">Cetak Nota Transaksi</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
