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
cp .env.example .env
```

```sh
docker-compose build
docker-compose up -d
```

Website akan dapat diakses dengan link berikut:

```go
localhost:8000
```

Untuk melakukan chroot pada container, lakukan:

```sh
docker exec -it KarawangiSejahtera-app fish
```
