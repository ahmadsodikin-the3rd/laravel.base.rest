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
- Atur koneksi database di file `.env` dan pastikan koneksi tersebut mempunyai akses untuk create table
- Setelah itu jalankan command berikut
```sh
$ php artisan migrate
$ php artisan db:seed
$ php artisan serve
```
- Setelah proses selesai, buka browser dengan alamat http://127.0.0.1:8000/
- Untuk login bisa diakses dengan user:password => admin:admin12345