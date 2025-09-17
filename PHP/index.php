<?php
require_once "Toko.php";
session_start();

// Pastikan folder uploads ada
if (!file_exists("uploads")) {
    mkdir("uploads", 0777, true);
}

// Inisialisasi data session
if (!isset($_SESSION['produk'])) {
    $_SESSION['produk'] = [];
}

// Tambah / Update produk
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $gambar = "";
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
        $filename = uniqid() . "." . $ext;
        move_uploaded_file($_FILES['gambar']['tmp_name'], "uploads/" . $filename);
        $gambar = $filename;
    } else if (isset($_POST['gambar_lama'])) {
        // kalau update dan ga upload baru → tetap pakai gambar lama
        $gambar = $_POST['gambar_lama'];
    }

    if (isset($_POST['index']) && $_POST['index'] !== "") {
        // update
        $index = $_POST['index'];
        $_SESSION['produk'][$index] = new Toko($id, $nama, $kategori, $harga, $stok, $gambar);
    } else {
        // tambah baru
        $_SESSION['produk'][] = new Toko($id, $nama, $kategori, $harga, $stok, $gambar);
    }
    header("Location: index.php");
    exit;
}

// Hapus produk
if (isset($_GET['hapus'])) {
    $index = $_GET['hapus'];
    if (!empty($_SESSION['produk'][$index])) {
        $gambar = $_SESSION['produk'][$index]->getGambar();
        if ($gambar && file_exists("uploads/" . $gambar)) {
            unlink("uploads/" . $gambar);
        }
    }
    unset($_SESSION['produk'][$index]);
    $_SESSION['produk'] = array_values($_SESSION['produk']);
    header("Location: index.php");
    exit;
}

// Ambil data untuk edit
$editProduk = null;
$editIndex = "";
if (isset($_GET['edit'])) {
    $editIndex = $_GET['edit'];
    $editProduk = $_SESSION['produk'][$editIndex];
}

// Cari produk
$keyword = isset($_GET['keyword']) ? strtolower($_GET['keyword']) : "";
$filtered = [];

if (!empty($_SESSION['produk'])) {
    foreach ($_SESSION['produk'] as $i => $p) {
        if ($keyword === "" ||
            str_contains(strtolower($p->getId()), $keyword) ||
            str_contains(strtolower($p->getNama()), $keyword) ||
            str_contains(strtolower($p->getKategori()), $keyword)) {
            $filtered[$i] = $p;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Produk</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        form { margin-bottom: 20px; }
        input { margin: 5px; padding: 6px; }
        button { padding: 6px 12px; }
    </style>
</head>
<body>
    <h2><?= $editProduk ? "Edit Produk" : "Tambah Produk" ?></h2>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="index" value="<?= $editIndex ?>">
        <?php if ($editProduk): ?>
            <input type="hidden" name="gambar_lama" value="<?= $editProduk->getGambar() ?>">
        <?php endif; ?>
        <label>ID: <input type="text" name="id" value="<?= $editProduk?->getId() ?>"></label><br>
        <label>Nama: <input type="text" name="nama" value="<?= $editProduk?->getNama() ?>"></label><br>
        <label>Kategori: <input type="text" name="kategori" value="<?= $editProduk?->getKategori() ?>"></label><br>
        <label>Harga: <input type="number" step="0.01" name="harga" value="<?= $editProduk?->getHarga() ?>"></label><br>
        <label>Stok: <input type="number" name="stok" value="<?= $editProduk?->getStok() ?>"></label><br>
        <label>Gambar: <input type="file" name="gambar"></label>
        <?php if ($editProduk && $editProduk->getGambar()): ?>
            <br><small>Gambar sekarang: <img src="uploads/<?= $editProduk->getGambar() ?>" width="60"></small>
        <?php endif; ?>
        <br><br>
        <button type="submit"><?= $editProduk ? "Update" : "Tambah" ?></button>
        <?php if ($editProduk): ?>
            <a href="index.php">Batal</a>
        <?php endif; ?>
    </form>

    <h2>Daftar Produk</h2>
    <form method="get">
        <input type="text" name="keyword" placeholder="Cari ID/Nama/Kategori" value="<?= htmlspecialchars($keyword) ?>">
        <button type="submit">Cari</button>
        <a href="index.php">Reset</a>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php
        if (!empty($filtered)) {
            foreach ($filtered as $i => $p) {
                echo $p->tampilkanRow($i);
            }
        } else {
            echo "<tr><td colspan='7'>Tidak ada produk</td></tr>";
        }
        ?>
    </table>
</body>
</html>
