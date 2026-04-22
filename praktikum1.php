<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 1 - Static Counter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .main-card { max-width: 600px; margin: 80px auto; border: none; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.1); }
        .header-gradient { background: linear-gradient(45deg, #6a11cb 0%, #2575fc 100%); color: white; border-radius: 20px 20px 0 0; padding: 25px; }
        .counter-box { background: #ffffff; border: 2px dashed #6a11cb; border-radius: 15px; padding: 30px; margin: 20px 0; }
        .number-display { font-size: 5rem; font-weight: bold; color: #6a11cb; line-height: 1; }
        .badge-static { background-color: #e9ecef; color: #495057; font-weight: 600; padding: 8px 15px; border-radius: 50px; }
    </style>
</head>
<body>

<?php
class Counter {
    public static $jumlah = 0;

    public function tambah() {
        self::$jumlah++;
    }
}

// Inisialisasi Objek
$c1 = new Counter();
$c2 = new Counter();

// Simulasi Penambahan
$c1->tambah();
$c2->tambah();
?>

<div class="container">
    <div class="card main-card">
        <div class="header-gradient text-center">
            <h2 class="mb-0">Latihan 1: Static Property</h2>
            <p class="mb-0 opacity-75">Pemrograman Berorientasi Objek (PHP)</p>
        </div>
        
        <div class="card-body p-5 text-center">
            <span class="badge-static mb-3">Shared Value Across Objects</span>
            
            <div class="counter-box">
                <small class="text-muted d-block mb-2">OUTPUT COUNTER</small>
                <div class="number-display">
                    <?= Counter::$jumlah; ?>
                </div>
            </div>

            <div class="row text-start mt-4">
                <div class="col-md-6">
                    <div class="p-3 border rounded mb-2 bg-light">
                        <strong>Objek 1 ($c1)</strong><br>
                        <small class="text-success">Menjalankan tambah()</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 border rounded mb-2 bg-light">
                        <strong>Objek 2 ($c2)</strong><br>
                        <small class="text-success">Menjalankan tambah()</small>
                    </div>
                </div>
            </div>

            <div class="alert alert-info mt-4" role="alert">
                <small>
                    <b>Penjelasan:</b> Properti <code>$jumlah</code> bersifat statis, sehingga meskipun ada dua objek berbeda, mereka berbagi satu nilai yang sama di memori.
                </small>
            </div>
        </div>
        
        <div class="card-footer text-center py-3 bg-white border-0">
            <a href="https://github.com" class="btn btn-outline-primary btn-sm rounded-pill px-4">Push to GitHub</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
