# CRUD Category Laravel

## Deskripsi
Project ini merupakan lanjutan dari modul sebelumnya dengan menambahkan fitur **CRUD Category** pada Laravel.

Pada tugas ini dibuat:
- CRUD Category
- relasi antara **Product** dan **Category**
- tampilan **total product** pada setiap category
- perubahan form **Add Product** agar dapat memilih category
- gate akses untuk halaman **Category**
- tampilan **role user** pada halaman dashboard

---

## Fitur
- Menampilkan daftar category
- Menambah category
- Mengedit category
- Menghapus category
- Menampilkan total product pada setiap category
- Relasi category pada product
- Dropdown category pada form add product
- Gate akses category hanya untuk admin
- Role user tampil pada dashboard

---

## Alur Project

### 1. Menambahkan relasi category ke product
Kolom `category_id` ditambahkan ke tabel `products` agar setiap product dapat terhubung ke satu category.

### 2. Membuat CRUD Category
Fitur CRUD Category dibuat menggunakan:
- `CategoryController`
- route resource
- view category

### 3. Menampilkan total product
Pada halaman category digunakan relasi Laravel untuk menampilkan jumlah product pada setiap category.

### 4. Mengubah form Add Product
Form tambah product diubah agar user dapat memilih category melalui dropdown.

### 5. Menambahkan gate akses
Gate ditambahkan agar hanya admin yang dapat mengakses menu dan halaman category.

### 6. Menampilkan role di dashboard
Role user yang sedang login ditampilkan di halaman dashboard:
- `Role: Admin`
- `Role: User`

---

## Struktur File Utama
```bash
app/
├── Http/
│   ├── Controllers/
│   │   ├── CategoryController.php
│   │   └── ProductController.php
│   └── Requests/
│       ├── StoreProductRequest.php
│       └── UpdateProductRequest.php
├── Models/
│   ├── Category.php
│   └── Product.php
├── Providers/
│   └── AppServiceProvider.php

resources/
└── views/
    ├── category/
    │   ├── index.blade.php
    │   ├── create.blade.php
    │   └── edit.blade.php
    ├── product/
    │   ├── create.blade.php
    │   └── edit.blade.php
    ├── layouts/
    │   └── navigation.blade.php
    └── dashboard.blade.php

routes/
└── web.php
```


| Deskripsi | Dokumentasi UCP1 |
|---|---|
|dashboard admin|<img width="1919" height="1026" alt="image" src="https://github.com/user-attachments/assets/2f84aa52-5c87-4515-8503-10d1f82023db" />|
|dashboard user|<img width="1918" height="1009" alt="image" src="https://github.com/user-attachments/assets/b9d90dc1-ca38-4db6-a329-89961085bbae" />|
|halaman kategory|<img width="1919" height="1015" alt="image" src="https://github.com/user-attachments/assets/346bbedf-d259-4fb2-bd8b-d8c4fece4bab" />|
|insert kategory|<img width="1919" height="1014" alt="image" src="https://github.com/user-attachments/assets/b1a10beb-9484-418a-afde-fc68424dc55e" />|
|berhasil menambahkan kategori|<img width="1919" height="1012" alt="image" src="https://github.com/user-attachments/assets/4a1c6a0f-81ea-48f9-9221-b2ccc3e5448e" />|
|edit kategori|<img width="1919" height="1019" alt="image" src="https://github.com/user-attachments/assets/35a907b2-1424-45cd-8b11-869a8527d337" />|
|berhasil edit kategori|<img width="1919" height="1012" alt="image" src="https://github.com/user-attachments/assets/2916efce-5b07-496a-805f-c350288d92ed" />|
|hapus kategori|<img width="1919" height="1018" alt="image" src="https://github.com/user-attachments/assets/cc9323c4-c162-4e82-bf68-88730670327f" />|
|berhasil hapus kategori|<img width="1919" height="1010" alt="image" src="https://github.com/user-attachments/assets/c81b6f66-abf9-4b86-b847-0f55601c4f79" />|
|add product|<img width="1919" height="1009" alt="image" src="https://github.com/user-attachments/assets/5afd37c4-4232-4e93-b430-65153b6d296b" />|
|berhasil tambah produk|<img width="1919" height="1020" alt="image" src="https://github.com/user-attachments/assets/99553065-cd7f-4146-9fee-37d0cd937d58" />|





































