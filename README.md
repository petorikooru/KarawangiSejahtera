# KarawangiSejahtera

> [!Note]
> This website is still in heavy development, so expect some bug ig

Selamat datang di KarawangiSejahtera, website dimana para warga di Karawangi dapat meningkatkan kesejahteraan hanya dalam modal website.

Adapun fitur yang akan dapat dirasakan oleh warga Karawangi dengan menggunakan website ini adalah sebagai berikut:
- Daftar Kegiatan & Pelatihan Keahlian
- Form Pendaftaran Peserta Kesejahteraan Online
- Informasi Bantuan UMKM
- Pengumuman Kegiatan Desa & Testimoni Peserta
- Portal berita lokal terkait program kesejahteraan

Untuk menjalankan website ini, pastikan anda telah menginstall docker terlebih dahulu, lalu jalankan:
```sh
docker-compose build
docker-compose up -d
```
Setelah itu, buat key dari website tersebut dengan:
```sh
docker-compose exec php php artisan key:generate
docker-compose exec php php artisan migrate
```
