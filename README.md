# TP1DPBO2425C2
Tugas Praktikum DPBO 1


/*saya Ajipati Alaga Putra dengan NIM 2409682
mengerjakan TP 1 dalam mata kuliah DPBO
untuk keberkahannya maka saya tidak akan melakukan kecurangan
sepertu yang telah di spesifikasikan Aamiin.*/


Atribut Setiap bahasa menggunakan kelas Toko dengan atribut:

id → identitas unik produk

nama → nama produk

kategori → kategori produk (makanan, minuman, pakaian, dll.)

harga → harga produk

stok → jumlah stok produk

gambar → path/file gambar produk (khusus PHP)

C++

Pada C++ Seluruh data produk disimpan dalam sebuah vector<Toko>, sehingga jumlah produk dapat bertambah atau berkurang secara dinamis. User pertama-tama memilih menu yang tersedia, seperti menambah, menampilkan, mencari, mengupdate, atau menghapus produk. Ketika user menambah produk, program akan membuat objek Toko baru dengan data yang diinput lalu menyimpannya ke dalam vector. Saat menampilkan produk, program melakukan iterasi pada vector dan memanggil metode tampilkan() untuk setiap produk. Proses pencarian dilakukan dengan membandingkan ID produk dalam vector. Untuk update, program mencari produk berdasarkan ID lalu mengubah nilainya menggunakan setter. Sedangkan proses hapus dilakukan dengan menghapus elemen vector yang sesuai dengan ID yang dimaksud.

Dokumentasi:https://www.youtube.com/watch?v=chBCVZkNQLg&list=PLGYb8K7YVgHwkT4JV6rfTO0wMs-uK5Xng

Java

Pada Java, alur program mirip dengan C++ tetapi menggunakan ArrayList<Toko> sebagai wadah penyimpanan. Interaksi dilakukan melalui console dengan bantuan kelas Scanner untuk input user. Setiap kali user memilih menu tambah, objek baru dibuat dan dimasukkan ke dalam ArrayList. Saat menampilkan, seluruh isi list diiterasi dengan for-each lalu dipanggil metode tampilkan. Pencarian dilakukan dengan loop sederhana pada list menggunakan ID. Update berjalan dengan cara mencari produk terlebih dahulu, lalu memanggil setter untuk memperbarui data. Sedangkan hapus dilakukan dengan memanfaatkan method remove() pada list untuk menghapus objek yang sesuai.

Dokumentasi:https://www.youtube.com/watch?v=DUuaJ7EDVtY&list=PLGYb8K7YVgHzw2PBM6KgpxHrI3mpvLd5N

Python

Di Python, program dijalankan lewat console dan data produk disimpan dalam sebuah list. Setiap kali user menambahkan produk, program membuat objek Toko dan menambahkannya ke dalam list. Untuk menampilkan semua produk, list diiterasi dengan loop for dan dipanggil dengan metode tampilkan pada setiap objek. Proses pencarian dilakukan dengan memeriksa ID dalam list, lalu menampilkan produk jika ditemukan. Update dilakukan dengan mengakses objek yang sesuai lalu memperbarui atribut melalui setter. Penghapusan produk memanfaatkan method remove() dari list, sehingga objek yang cocok langsung dihapus dari koleksi.

[![Dokumentasi Video](https://raw.githubusercontent.com/WhosG/TP1DPBO2425C2/main)](https://www.youtube.com/watch?v=euFViIGHVXI&list=PLGYb8K7YVgHxWf-rGBekzg2nPc-Z2c4JU)


PHP

Implementasi PHP berbeda karena berbasis web. Data produk tidak disimpan dalam list atau array biasa, melainkan menggunakan session ($_SESSION), sehingga data tetap tersedia selama sesi browser masih aktif. User berinteraksi melalui form HTML: ketika menambah produk, data input termasuk file gambar diproses oleh PHP, lalu objek Toko dibuat dan disimpan ke session. Produk ditampilkan dalam bentuk tabel HTML dengan data yang diambil dari session. Fitur pencarian dilakukan dengan memasukkan keyword, kemudian program memfilter produk berdasarkan nama atau kategori sebelum menampilkan tabel. Untuk update, user menekan tombol edit pada baris tabel, sehingga form terisi data lama; setelah perubahan disubmit, data produk di session diperbarui. Sedangkan hapus dilakukan dengan menekan tombol hapus pada tabel, dan PHP akan menghapus objek dari session.

[![Dokumentasi Video](https://raw.githubusercontent.com/WhosG/TP1DPBO2425C2/main)](https://www.youtube.com/watch?v=ONM0e3NvPl8&list=PLGYb8K7YVgHzqeGMJIOZU7QVNpBmKgTjZ)


