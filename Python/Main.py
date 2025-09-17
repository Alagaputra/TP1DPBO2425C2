from Class import Toko

daftar_produk = []

def tambah_data():
    id_barang = int(input("ID: "))
    nama = input("Nama: ")
    kategori = input("Kategori: ")
    harga = float(input("Harga: "))
    stok = int(input("Stok: "))

    daftar_produk.append(Toko(id_barang, nama, kategori, harga, stok))
    print("Produk berhasil ditambahkan!")

def tampilkan_data():
    if not daftar_produk:
        print("Tidak ada data!")
        return
    for p in daftar_produk:
        p.tampilkan()

def update_data():
    id_barang = int(input("Masukkan ID yang mau diupdate: "))
    for p in daftar_produk:
        if p.get_id() == id_barang:
            nama = input("Nama baru: ")
            kategori = input("Kategori baru: ")
            harga = float(input("Harga baru: "))
            stok = int(input("Stok baru: "))

            p.set_nama(nama)
            p.set_kategori(kategori)
            p.set_harga(harga)
            p.set_stok(stok)
            print("Data berhasil diupdate!")
            return
    print("Produk tidak ditemukan.")

def hapus_data():
    id_barang = int(input("Masukkan ID yang mau dihapus: "))
    for i, p in enumerate(daftar_produk):
        if p.get_id() == id_barang:
            del daftar_produk[i]
            print("Produk berhasil dihapus!")
            return
    print("Produk tidak ditemukan.")

def cari_data():
    id_barang = int(input("Masukkan ID yang mau dicari: "))
    for p in daftar_produk:
        if p.get_id() == id_barang:
            p.tampilkan()
            return
    print("Produk tidak ditemukan.")

def main():
    while True:
        print("\n=== Menu Toko Elektronik ===")
        print("1. Tambah Data")
        print("2. Tampilkan Data")
        print("3. Update Data")
        print("4. Hapus Data")
        print("5. Cari Data")
        print("0. Keluar")
        pilihan = input("Pilih: ")

        if pilihan == "1":
            tambah_data()
        elif pilihan == "2":
            tampilkan_data()
        elif pilihan == "3":
            update_data()
        elif pilihan == "4":
            hapus_data()
        elif pilihan == "5":
            cari_data()
        elif pilihan == "0":
            print("Keluar...")
            break
        else:
            print("Pilihan tidak valid")

if __name__ == "__main__":
    main()
