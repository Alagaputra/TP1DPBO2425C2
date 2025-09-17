<?php
class Toko {
    private $id;
    private $nama;
    private $kategori;
    private $harga;
    private $stok;
    private $gambar; // nama file gambar

    public function __construct($id, $nama, $kategori, $harga, $stok = 0, $gambar = "") {
        $this->id = $id;
        $this->nama = $nama;
        $this->kategori = $kategori;
        $this->harga = (float)$harga;   // selalu float
        $this->stok = (int)$stok;       // selalu int
        $this->gambar = $gambar;
    }

    // Getter
    public function getId() { return $this->id; }
    public function getNama() { return $this->nama; }
    public function getKategori() { return $this->kategori; }
    public function getHarga() { return $this->harga; }
    public function getStok() { return $this->stok; }
    public function getGambar() { return $this->gambar; }

    // Setter
    public function setNama($nama) { $this->nama = $nama; }
    public function setKategori($kategori) { $this->kategori = $kategori; }
    public function setHarga($harga) { $this->harga = (float)$harga; }
    public function setStok($stok) { $this->stok = (int)$stok; }
    public function setGambar($gambar) { $this->gambar = $gambar; }

    // Tampilkan baris tabel HTML
    public function tampilkanRow($index) {
        $gambarTag = $this->gambar ? "<img src='uploads/{$this->gambar}' width='60'>" : "-";
        return "<tr>
            <td>{$this->id}</td>
            <td>{$this->nama}</td>
            <td>{$this->kategori}</td>
            <td>Rp " . number_format((float)$this->harga, 0, ',', '.') . "</td>
            <td>{$this->stok}</td>
            <td>{$gambarTag}</td>
            <td>
                <a href='?edit={$index}'>Edit</a> | 
                <a href='?hapus={$index}' onclick=\"return confirm('Hapus produk ini?')\">Hapus</a>
            </td>
        </tr>";
    }
}
