# Laravel Base Restful CRUD

## Spesifikasi
- Apache
- PHP v.7.2.8 
- Laravel v.6.5.0 


## Instalasi

### Artisan
- Clone repository ini
- Masuk ke directory repository ini dan jalankan command berikut
```sh
$ composer install
```
- Copy file `.env.example` menjadi `.env`
- Atur koneksi database di file `.env` dan pastikan koneksi tersebut mempunyai akses untuk create table
- Setelah itu jalankan command berikut
```sh
$ php artisan key:generate
$ php artisan migrate
$ php artisan db:seed
```
- Setelah proses selesai, buka browser dengan alamat sesuai dengan lokasi repository tersebut (ex. http://localhost/nama_repository/public)
- Untuk login bisa diakses dengan user:password => admin:admin12345