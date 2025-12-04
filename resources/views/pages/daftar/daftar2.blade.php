<!doctype html>
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
                            <span class="form-input__icon"> <img src="{{'/images/png/email.png'}}" width="15px" height="15px" alt="Akun"></span>
                            <input type="text" id="fullname" placeholder="Email" class="form-input__field" />
                        </label>
                    </div>

                <main class="daftar-user__form" aria-label="Form pendaftaran">
                    <div class="form-group">
                        <label class="form-input" for="Password">
                            <span class="form-input__icon"> <img src="{{'/images/png/lock.png'}}" width="15px" height="15px" alt="Akun"></span>
                            <input type="text" id="Password" placeholder="Password" class="form-input__field" />
                        </label>
                    </div>


                <main class="daftar-user__form" aria-label="Form pendaftaran">
                    <div class="form-group">
                        <label class="form-input" for="Confirm Password">
                            <span class="form-input__icon"> <img src="{{'/images/png/lock.png'}}" width="15px" height="15px" alt="Akun"></span>
                            <input type="text" id=" ConfirmPassword" placeholder="Konfirmasi Password" class="form-input__field" />
                        </label>
                    </div>

                    <button type="submit" class="btn-submit">Daftar</button>
                </main>

                <div class="form-footer">
                    <p class="form-footer__text">Sudah punya Akun? <a href="#" class="form-footer__link">Login</a></p>
                    <p class="form-footer__divider">- Atau -</p>
                </div>

                <div class="social-login">
                    <button class="social-button" aria-label="Login dengan Google">
                        <img src="{{'/images/png/google.png'}}" alt="Google" />
                    </button>
                    <button class="social-button" aria-label="Login dengan Facebook">
                        <img src="{{'/images/png/facebook.png'}}" alt="Facebook" />
                    </button>
                </div>

                <img class="daftar-user__logo" src="{{'/images/png/logo.png'}}" alt="Logo Karangwangi Sejahtera" />
            </div>
        </div>
    </body>
</html>