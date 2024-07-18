

# Warehouse Web

Warehouse Web adalah aplikasi pencatatan stok berbasis website yang dirancang untuk meningkatkan aksesibilitas dan efisiensi pengelolaan stok .

## Struktur File

### 1. Controller

Berikut adalah berbagai controller dalam aplikasi yang dibangun untuk mengelola fungsi-fungsi spesifik yang mendukung operasional dan pemeliharaan data stok barang serta pemrosesan dokumen.

- **StockController**: Mengelola berbagai operasi terkait data stok, termasuk menampilkan tabel data stok, tabel data stok masuk, dan tabel data stok keluar. Selain itu, controller ini memiliki fungsi pencarian data berdasarkan tanggal, menampilkan riwayat penghapusan data, serta menghapus entry data stok masuk dan keluar, dan melakukan valuasi nilai terhadap stok yang ada.

- **StockInController**: Mengupdate data stok dan tabel data stok masuk setiap kali ada barang yang masuk, memastikan bahwa data stok dalam sistem selalu diperbarui.

- **StockOutController**: Mengupdate data stok dan tabel data stok keluar saat ada barang yang keluar, menjaga akurasi stok dalam sistem.

- **PDFController**: Memproses seluruh file PDF dalam sistem, termasuk pembuatan, pembacaan, dan konversi file PDF.

- **NewItemController**: Menambahkan jenis barang baru ke dalam sistem dengan menyediakan form input untuk detail barang baru yang kemudian disimpan dalam database, memperbarui jenis barang yang tersedia.

### 2. View

Berikut adalah berbagai view dalam aplikasi yang dibangun untuk memfasilitasi interaksi pengguna dengan aplikasi melalui antarmuka yang intuitif dan fungsional.

- **Folder `auth`**
  - `login.blade.php`: Digunakan untuk login, di mana pengguna memasukkan kredensial untuk mengakses sistem.

- **Folder `layouts`**
  - `app.blade.php`: Berisi navbar untuk navigasi dalam sistem, memberikan akses cepat ke berbagai bagian aplikasi.

- **Folder `newitem`**
  - `create.blade.php`: Digunakan untuk menginput jenis barang baru melalui formulir yang disediakan.

- **Folder `stock`**
  - `current.blade.php`: Dashboard utama.
  - `in.blade.php`: Untuk menginput stok masuk.
  - `incoming_log.blade.php`: Untuk melihat tabel data barang masuk.
  - `out.blade.php`: Untuk menginput stok keluar.
  - `outgoing_log.blade.php`: Untuk melihat tabel data barang keluar.
  - `valuation.blade.php`: Untuk melakukan valuasi nilai stok.

- **Folder `delete_history`**
  - `index.blade.php`: Untuk melihat tabel riwayat penghapusan data stok.

- **Folder `pdf`**
  - `current_stock.blade.php`: Tabel data stok saat ini.
  - `in_invoice.blade.php`: Kwitansi pembelian.
  - `incoming_log.blade.php`: Tabel data barang masuk.
  - `out_invoice.blade.php`: Kwitansi penjualan.
  - `outgoing_log.blade.php`: Tabel data barang keluar.

Masing-masing view ini dirancang untuk memberikan antarmuka yang jelas dan terstruktur, memungkinkan pengguna untuk berinteraksi dengan sistem dengan mudah.

## Cara Install

1. Clone repositori ini:
    ```bash
    git clone https://github.com/username/warehouse-web.git
    ```

2. Masuk ke direktori project:
    ```bash
    cd warehouse-web
    ```

3. Install dependencies:
    ```bash
    composer install
    npm install
    ```

4. Copy file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database:
    ```bash
    cp .env.example .env
    ```

5. Generate application key:
    ```bash
    php artisan key:generate
    ```

6. Migrate database:
    ```bash
    php artisan migrate
    ```

7. Jalankan aplikasi:
    ```bash
    php artisan serve
    ```

## Kontribusi

Silakan buka issue atau buat pull request untuk berkontribusi pada proyek ini.

## Lisensi

Aplikasi ini dilisensikan di bawah [MIT License](LICENSE).
