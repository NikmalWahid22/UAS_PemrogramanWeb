# APLIKASI MANAHEMEN GUDANG 
## Deskripsi Aplikasi 

Aplikasi Manajemen Barang adalah aplikasi berbasis web yang dibuat menggunakan PHP Native dengan pendekatan Object Oriented Programming (OOP) dan Modular Programming, serta menerapkan Routing App menggunakan .htaccess. Aplikasi ini bertujuan untuk membantu pengelolaan data barang seperti pencatatan, pengelompokan kategori, pencarian, serta pengaturan stok barang dengan sistem login berbasis role (admin & user). Aplikasi dikembangkan sebagai pemenuhan tugas praktikum mata kuliah Pemrograman Web / OOP & Modular.

## Tujuan Pembuatan 

- Menerapkan konsep OOP dalam PHP
- Menerapkan struktur modular
- Mengimplementasikan routing tanpa framework
- Membuat sistem login multi-role
- Membuat tampilan responsive (mobile-first)
- Mengimplementasikan CRUD, Filter Pencarian, dan Pagination

## Konsep yang Digunakan 

- Konsep & Teknologi yang Digunakan
- PHP Native
- Object Oriented Programming (OOP)
- Modular Programming
- Routing menggunakan .htaccess
- MySQL (mysqli)
- Bootstrap 5 (Responsive Design)
- Session Authentication

## Struktur Folder Aplikasi 
```

│   .htaccess
│   config.php
│   index.php
│
├───class
│       auth.php
│       barang.php
│       database.php
│
├───modules
│   ├───admin
│   │       barang_add.php
│   │       barang_delete.php
│   │       barang_edit.php
│   │       barang_list.php
│   │       dashboard.php
│   │
│   ├───auth
│   │       login.php
│   │       logout.php
│   │
│   ├───home
│   │       index.php
│   │
│   └───user
│           barang_list.php
│           dashboard.php
│           profile.php
│
└───template
        assets.php
        footer.php
        header.php
        sidebar_admin.php
        sidebar_user.php
```

## Alur Program 

1.** User mengakses aplikasi melalui browser**
   Pengguna membuka URL aplikasi, baik halaman utama, login dashboard, maupun fitur lainnya
   
2. **Request diterima oleh index.php**        
   File index.php berfungsi sebagai controller yang menangani seluruh request aplikasi
   
3. **Routing diproses menggunakan .htaccess**
   URL yang diakses diterjemahkan menjadi parameter path agar menentukan module dan halaman yang akan dipanggil tanpa menampilkan file .php

4. **Penentuan module dan halaman**
   index.php memecah URL menjadi:
   - nama module
   - nama halaman
   - parameter tambahan (jika ada)

5. **Pengecekan file module**
   Sistem mengecek apakah file module yang dituju tersedia di folder modules.
   
6. **Load asset dan template**
   - assets.php dipanggil untuk memuat CSS & JavaScript
   - header.php dan footer.php dimuat (kecuali halaman tertentu seperti login)
   
7. **Pemrosesan data oleh class**
   - Database.php → koneksi dan query database
   - Auth.php → autentikasi, session, dan role user
   - Barang.php → CRUD, pencarian, dan pagination data barang
8. **Validasi login dan role user**
   Sistem memastikan user sudah login dan memiliki role yang sesuai (admin atau user).
   
9. **Tampilan halaman dirender**
    Sistem memastikan user sudah login dan memiliki role yang sesuai (admin atau user).
    
10. **Halaman ditampilkan ke user**
    User melihat hasil akhir halaman yang sudah responsif dan sesuai hak akses.



