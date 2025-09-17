class Toko:
    def __init__(self, id_barang, nama, kategori, harga, stok):
        self.__id_barang = id_barang
        self.__nama = nama
        self.__kategori = kategori
        self.__harga = harga
        self.__stok = stok

    # Getter
    def get_id(self):
        return self.__id_barang

    def get_nama(self):
        return self.__nama

    def get_kategori(self):
        return self.__kategori

    def get_harga(self):
        return self.__harga

    def get_stok(self):
        return self.__stok

    # Setter
    def set_nama(self, nama):
        self.__nama = nama

    def set_kategori(self, kategori):
        self.__kategori = kategori

    def set_harga(self, harga):
        self.__harga = harga

    def set_stok(self, stok):
        self.__stok = stok

    def tampilkan(self):
        print(f"{self.__id_barang} | {self.__nama} | {self.__kategori} | Rp{int(self.__harga)} | Stok: {self.__stok}")

