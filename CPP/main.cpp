#include "class.cpp"

int main() {
    int pilihan;
    do {
        cout << "\n=== Menu Toko Elektronik ===\n";
        cout << "1. Tambah Data\n2. Tampilkan Data\n3. Update Data\n4. Hapus Data\n5. Cari Data\n0. Keluar\nPilih: ";
        cin >> pilihan;

        switch (pilihan) {
            case 1: tambahData(); break;
            case 2: tampilkanData(); break;
            case 3: updateData(); break;
            case 4: hapusData(); break;
            case 5: cariData(); break;
            case 0: cout << "Keluar...\n"; break;
            default: cout << "Pilihan tidak valid\n";
        }
    } while (pilihan != 0);

    return 0;
}