

class Toko {
    private int idBarang;
    private String nama;
    private String kategori;
    private double harga;
    private int stok;

    public Toko(int idBarang, String nama, String kategori, double harga, int stok) {
        this.idBarang = idBarang;
        this.nama = nama;
        this.kategori = kategori;
        this.harga = harga;
        this.stok = stok;
    }

    // Getter
    public int getId() {
        return idBarang;
    }

    public String getNama() {
        return nama;
    }

    public String getKategori() {
        return kategori;
    }

    public double getHarga() {
        return harga;
    }

    public int getStok() {
        return stok;
    }

    // Setter
    public void setNama(String nama) {
        this.nama = nama;
    }

    public void setKategori(String kategori) {
        this.kategori = kategori;
    }

    public void setHarga(double harga) {
        this.harga = harga;
    }

    public void setStok(int stok) {
        this.stok = stok;
    }

    public void tampilkan() {
        System.out.println(idBarang + " | " + nama + " | " + kategori +
                " | Rp" + harga + " | Stok: " + stok);
    }
}

