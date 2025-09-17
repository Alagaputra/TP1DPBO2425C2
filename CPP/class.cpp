#include <iostream>
#include <string>
#include <vector>

using namespace std;

class Toko{

    private:

    int idBarang;
    string nama;
    string kategori;
    double harga;
    int stok;
    
    public:

    Toko(int idBarang, string nama, string kategori, double harga, int stok){
        this->idBarang = idBarang;
        this->nama = nama;
        this->kategori = kategori;
        this->harga = harga;
        this->stok = stok;

    }

    // Getter
    int getId(){
        return idBarang; 
    }

    string getNama(){
        return nama;
    }

    string getKategori(){
        return kategori;
    }

    double getHarga(){ 
        return harga;
    }

    int getStok(){ 
        return stok;
    }

     // Setter
    void setId(string idBarang) {
        idBarang = idBarang;
    }
    void setNama(string namaBaru) {
        nama = namaBaru;
    }
    void setKategori(string kategoriBaru) {
        kategori = kategoriBaru;
    }
    void setHarga(double hargaBaru) {
        harga = hargaBaru;
    }
    void setStok(int stokBaru) {
        stok = stokBaru;
    }

    void tampilkan() {
        cout << idBarang << " | " << nama << " | " << kategori
             << " | Rp" << harga << " | Stok: " << stok << endl;
    }


};

vector<Toko> daftarProduk;

void tambahData() {
    int id, stok;
    string nama, kategori;
    double harga;

    cout << "ID: ";
    cin >> id;
    cin.ignore();
    cout << "Nama: ";
    getline(cin, nama);
    cout << "Kategori: ";
    getline(cin, kategori);
    cout << "Harga: ";
    cin >> harga;
    cout << "Stok: ";
    cin >> stok;

    daftarProduk.push_back(Toko(id, nama, kategori, harga, stok));
    cout << "Produk berhasil ditambahkan!\n";
}

void tampilkanData() {
    if (daftarProduk.empty()) {
        cout << "Tidak ada data!\n";
        return;
    }
    for (auto &p : daftarProduk) {
        p.tampilkan();
    }
}

void updateData() {
    int id;
    cout << "Masukkan ID yang mau diupdate: ";
    cin >> id;
    for (auto &p : daftarProduk) {
        if (p.getId() == id) {
            string nama, kategori;
            double harga;
            int stok;

            cin.ignore();
            cout << "Nama baru: ";
            getline(cin, nama);
            cout << "Kategori baru: ";
            getline(cin, kategori);
            cout << "Harga baru: ";
            cin >> harga;
            cout << "Stok baru: ";
            cin >> stok;

            p.setNama(nama);
            p.setKategori(kategori);
            p.setHarga(harga);
            p.setStok(stok);

            cout << "Data berhasil diupdate!\n";
            return;
        }
    }
    cout << "Produk tidak ditemukan.\n";
}

void hapusData() {
    int id;
    cout << "Masukkan ID yang mau dihapus: ";
    cin >> id;
    for (size_t i = 0; i < daftarProduk.size(); i++) {
        if (daftarProduk[i].getId() == id) {
            daftarProduk.erase(daftarProduk.begin() + i);
            cout << "Produk berhasil dihapus!\n";
            return;
        }
    }
    cout << "Produk tidak ditemukan.\n";
}

void cariData() {
    int id;
    cout << "Masukkan ID yang mau dicari: ";
    cin >> id;
    for (auto &p : daftarProduk) {
        if (p.getId() == id) {
            p.tampilkan();
            return;
        }
    }
    cout << "Produk tidak ditemukan.\n";
}
