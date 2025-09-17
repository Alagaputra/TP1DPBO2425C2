
import java.util.ArrayList;
import java.util.Scanner;

public class Main {
    static ArrayList<Toko> daftarProduk = new ArrayList<>();
    static Scanner sc = new Scanner(System.in);

    public static void tambahData() {
        System.out.print("ID: ");
        int id = sc.nextInt();
        sc.nextLine();
        System.out.print("Nama: ");
        String nama = sc.nextLine();
        System.out.print("Kategori: ");
        String kategori = sc.nextLine();
        System.out.print("Harga: ");
        double harga = sc.nextDouble();
        System.out.print("Stok: ");
        int stok = sc.nextInt();

        daftarProduk.add(new Toko(id, nama, kategori, harga, stok));
        System.out.println("Produk berhasil ditambahkan!");
    }

    public static void tampilkanData() {
        if (daftarProduk.isEmpty()) {
            System.out.println("Tidak ada data!");
            return;
        }
        for (Toko p : daftarProduk) {
            p.tampilkan();
        }
    }

    public static void updateData() {
        System.out.print("Masukkan ID yang mau diupdate: ");
        int id = sc.nextInt();
        sc.nextLine();

        for (Toko p : daftarProduk) {
            if (p.getId() == id) {
                System.out.print("Nama baru: ");
                String nama = sc.nextLine();
                System.out.print("Kategori baru: ");
                String kategori = sc.nextLine();
                System.out.print("Harga baru: ");
                double harga = sc.nextDouble();
                System.out.print("Stok baru: ");
                int stok = sc.nextInt();

                p.setNama(nama);
                p.setKategori(kategori);
                p.setHarga(harga);
                p.setStok(stok);

                System.out.println("Data berhasil diupdate!");
                return;
            }
        }
        System.out.println("Produk tidak ditemukan.");
    }

    public static void hapusData() {
        System.out.print("Masukkan ID yang mau dihapus: ");
        int id = sc.nextInt();

        for (int i = 0; i < daftarProduk.size(); i++) {
            if (daftarProduk.get(i).getId() == id) {
                daftarProduk.remove(i);
                System.out.println("Produk berhasil dihapus!");
                return;
            }
        }
        System.out.println("Produk tidak ditemukan.");
    }

    public static void cariData() {
        System.out.print("Masukkan ID yang mau dicari: ");
        int id = sc.nextInt();

        for (Toko p : daftarProduk) {
            if (p.getId() == id) {
                p.tampilkan();
                return;
            }
        }
        System.out.println("Produk tidak ditemukan.");
    }

    public static void main(String[] args) {
        int pilihan;
        do {
            System.out.println("\n=== Menu Toko Elektronik ===");
            System.out.println("1. Tambah Data");
            System.out.println("2. Tampilkan Data");
            System.out.println("3. Update Data");
            System.out.println("4. Hapus Data");
            System.out.println("5. Cari Data");
            System.out.println("0. Keluar");
            System.out.print("Pilih: ");
            pilihan = sc.nextInt();

            switch (pilihan) {
                case 1: tambahData(); break;
                case 2: tampilkanData(); break;
                case 3: updateData(); break;
                case 4: hapusData(); break;
                case 5: cariData(); break;
                case 0: System.out.println("Keluar..."); break;
                default: System.out.println("Pilihan tidak valid");
            }
        } while (pilihan != 0);
    }
}
