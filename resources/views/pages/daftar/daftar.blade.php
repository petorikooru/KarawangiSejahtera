<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ url('/images/svg/logo.svg') }}">
    @vite(['resources/css/daftar.css', 'resources/js/app.js'])

    <title>Daftar Akun — Karangwangi</title>
</head>

<body>
        <div class="daftar-user">
            <div class="daftar-user__sidebar">
                <h2 class="hero__title">Bersama <strong>Karangwangi</strong> Wujudkan Kesejahteraan. 
                <p class="hero__text">Dapatkan informasi terbaru dan akses berbagai layanan desa dalam satu tempat</p></h2>
                </div>

            <div class="daftar-user__container">
                <h1 class="daftar-user__title">Daftar Akun</h1>

                <main class="daftar-user__form" aria-label="Form pendaftaran">
                    <div class="form-group">
                        <label class="form-input" for="fullname">
                            <span class="form-input__icon"> <img src="{{'/images/png/user.png'}}" width="15px" height="15px" alt="Akun"></span>
                            <input type="text" id="fullname" placeholder="Nama Lengkap" class="form-input__field" />
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Tanggal Lahir</label>
                        <div class="form-date">
                            <select class="form-date__input" aria-label="Hari">
                                <option>Hari</option>
                            </select>
                            <select class="form-date__input" aria-label="Bulan">
                                <option>Bulan</option>
                            </select>
                            <select class="form-date__input" aria-label="Tahun">
                                <option>Tahun</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Jenis Kelamin</label>
                        <div class="form-gender">
                            <label class="form-radio">
                                <input type="radio" name="gender" value="male" />
                                <span>Laki-laki</span>
                            </label>
                            <label class="form-radio">
                                <input type="radio" name="gender" value="female" />
                                <span>Perempuan</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Alamat Tempat Tinggal</label>
                        <input type="text" placeholder="Masukan alamat anda" class="form-textarea" />
                    </div>

                    <div class="form-group">
                        <label class="form-label">Nomor Telepon</label>
                        <input type="tel" placeholder="Masukan nomor telepon anda" class="form-textarea" />
                    </div>

                    <button type="submit" class="btn-submit">Selanjutnya</button>
                </main>

                <img class="daftar-user__logo" src="{{'/images/png/logo.png'}}" alt="Logo Karangwangi Sejahtera" />
            </div>
        </div>
    </body>