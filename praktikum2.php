<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator OOP Statis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .calculator-card { max-width: 500px; margin: 50px auto; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .btn-custom { background-color: #d63384; color: white; border: none; }
        .btn-custom:hover { background-color: #b02a6b; color: white; }
    </style>
</head>
<body>

<?php
class Matematika {
    public static function tambah($a, $b) { return $a + $b; }
    public static function kurang($a, $b) { return $a - $b; }
    public static function kali($a, $b) { return $a * $b; }
    public static function bagi($a, $b) { 
        return ($b != 0) ? $a / $b : "Tidak bisa bagi 0!"; 
    }
    public static function luasPersegi($sisi) { return $sisi * $sisi; }
}

$hasil = null;
$bil1 = $bil2 = $operasi = "";

if (isset($_POST['hitung'])) {
    $bil1 = $_POST['bil1'];
    $bil2 = $_POST['bil2'];
    $operasi = $_POST['operasi'];

    switch ($operasi) {
        case 'tambah': $hasil = Matematika::tambah($bil1, $bil2); break;
        case 'kurang': $hasil = Matematika::kurang($bil1, $bil2); break;
        case 'kali':   $hasil = Matematika::kali($bil1, $bil2); break;
        case 'bagi':   $hasil = Matematika::bagi($bil1, $bil2); break;
        case 'luas':   $hasil = Matematika::luasPersegi($bil1); break;
    }
}
?>

<div class="container">
    <div class="card calculator-card overflow-hidden">
        <div class="card-header bg-dark text-white text-center py-3">
            <h4 class="mb-0">Tugas Praktikum 2</h4>
        </div>
        <div class="card-body p-4">
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Angka Pertama / Sisi</label>
                    <input type="number" step="any" name="bil1" class="form-control" value="<?= $bil1 ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Operasi</label>
                    <select name="operasi" class="form-select">
                        <option value="tambah" <?= ($operasi == 'tambah') ? 'selected' : '' ?>>Tambah (+)</option>
                        <option value="kurang" <?= ($operasi == 'kurang') ? 'selected' : '' ?>>Kurang (-)</option>
                        <option value="kali" <?= ($operasi == 'kali') ? 'selected' : '' ?>>Kali (x)</option>
                        <option value="bagi" <?= ($operasi == 'bagi') ? 'selected' : '' ?>>Bagi (:)</option>
                        <option value="luas" <?= ($operasi == 'luas') ? 'selected' : '' ?>>Luas Persegi</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Angka Kedua (Abaikan untuk Luas)</label>
                    <input type="number" step="any" name="bil2" class="form-control" value="<?= $bil2 ?>">
                </div>

                <button type="submit" name="hitung" class="btn btn-custom w-100 py-2 mt-2">Hitung Sekarang</button>
            </form>

            <?php if ($hasil !== null): ?>
                <div class="mt-4 p-3 bg-light border rounded text-center">
                    <small class="text-muted text-uppercase d-block">Hasil Akhir</small>
                    <h2 class="text-primary mb-0"><?= $hasil ?></h2>
                </div>
            <?php endif; ?>
        </div>
        <div class="card-footer text-center text-muted py-3">
            PHP Static Method Implementation
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
