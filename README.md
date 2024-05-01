# TP3DPBO2024C1

Saya Muhamad Sabil Fausta NIM 2210142 mengerjakan Tugas Praktikum 3 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# Desain Program

Program ini dirancang untuk mengelola data langganan dalam suatu institusi pendidikan dengan menggunakan konsep pemrograman berorientasi objek. Berikut adalah atribut yang digunakan dalam program ini:

- **member_id**: Atribut ini merupakan pengidentifikasi unik untuk setiap anggota. Ini adalah integer yang merepresentasikan ID yang unik untuk setiap anggota di database.
- **subscription_type**: Atribut ini menyimpan jenis langganan yang diambil oleh anggota. Ini adalah string yang menjelaskan jenis langganan seperti "Bulanan", "Tahunan", atau "Semester".
- **start_date**: Atribut ini menunjukkan tanggal mulai langganan. Ini adalah date yang merepresentasikan kapan langganan dimulai.
- **end_date**: Atribut ini menunjukkan tanggal berakhirnya langganan. Ini adalah date yang merepresentasikan kapan langganan berakhir.
- **status**: Atribut ini menyimpan status langganan saat ini. Ini adalah string yang bisa berisi "Aktif", "Kadaluarsa", atau "Dibatalkan".

# Integrasi dengan Database

Program ini menggunakan konektor database MySQL untuk memungkinkan interaksi dengan basis data. Konektor database bertindak sebagai jembatan antara aplikasi Java dan database, memfasilitasi eksekusi query SQL dari kode Java. Operasi CRUD (Create, Read, Update, Delete) pada data langganan yang disimpan dalam database dilakukan melalui metode yang telah didefinisikan dalam kelas model.

# Alur Program dan Screenshots

Screenshots aplikasi dalam berbagai skenario penggunaan:

## Menambahkan Data Langganan Baru

![Menambahkan Langganan](https://github.com/sabilfaustaa/TP2DPBO2024C1/assets/61264687/ac6076d6-90b7-4877-a439-0f725fcde63f)

## Mengedit Data Langganan

![Mengedit Langganan](https://github.com/sabilfaustaa/TP2DPBO2024C1/assets/61264687/567fa393-1673-4400-a18c-d5668f2daab3)

1. Pilih langganan dari tabel yang ingin diubah.
2. Edit informasi pada form yang tersedia.
3. Klik tombol Update untuk menyimpan perubahan.

## Menghapus Data Langganan

1. Pilih langganan dari tabel yang ingin dihapus.
2. Klik tombol Delete.
3. Konfirmasi penghapusan dengan memilih Yes pada dialog konfirmasi yang muncul.

![Menghapus Langganan](https://github.com/sabilfaustaa/TP2DPBO2024C1/assets/61264687/delete-confirmation)

Aplikasi ini dirancang untuk memudahkan pengelolaan data langganan dalam suatu institusi pendidikan, menyediakan antarmuka yang mudah digunakan untuk melakukan operasi data yang efisien dan efektif.
