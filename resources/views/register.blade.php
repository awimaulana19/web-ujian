<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mt-4">
                    <div class="col-3 mx-auto bg-white mb-4">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="" width="150px">
                        <p class="fs-4 fw-bold mt-2"><span>WEB UJIAN</span> SISTEM INFORMASI</p>
                    </div>
                </div>
                <div class="col-md-6 mx-auto">
                    <div class="card p-4 border-0">
                        @if (session('pesan-danger'))
                            <p class="alert alert-danger">{{ session('pesan-danger') }}</p>
                        @endif
                        <form enctype="multipart/form-data" action="{{ url('/register') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama
                                    Lengkap</label>
                                <input type="text" name="nama" id="nama"
                                    class="border-1 py-3 ps-4 form-control @error('nama') is-invalid @enderror"
                                    placeholder="Masukkan Nama Lengkap" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">NIM</label>
                                <input type="text" name="username" id="username"
                                    class="border-1 py-3 ps-4 form-control @error('username') is-invalid @enderror"
                                    placeholder="Masukkan NIM" value="{{ old('username') }}">
                                @error('username')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jk" class="form-label">Jenis
                                    Kelamin</label>
                                <select class="form-select @error('jk') is-invalid @enderror" name="jk"
                                    id="basicSelect">
                                    <option value="" selected>Pilh Jenis Kelamin</option>
                                    <option value="Laki Laki" @if (old('jk') == 'Laki Laki') selected @endif>Laki Laki</option>
                                    <option value="Perempuan" @if (old('jk') == 'Perempuan') selected @endif>Perempuan</option>
                                </select>
                                @error('jk')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" name="foto" id="foto"
                                    class="border-1 py-3 ps-4 form-control  @error('foto') is-invalid @enderror">
                                @error('foto')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <label for="pass" class="form-label">Password</label>
                            <div class="input-group mb-3">
                                <input type="password" name="password" id="pass"
                                    class="border-1 py-3 ps-4 form-control @error('password') is-invalid @enderror"
                                    placeholder="Masukkan Password">
                                <span id="mybutton" onclick="lihat()" class="input-group-text" style="cursor:pointer;">
                                    <i class="bi bi-eye-fill"></i>
                                </span>
                                @error('password')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Sudah Punya Akun? <a href="{{ url('/') }}">Login</a></p>
                                <button class="btn px-4 py-2 btn-primary">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function lihat() {
            var x = document.getElementById('pass').type;

            if (x == 'password') {
                document.getElementById('pass').type = 'text';

                document.getElementById('mybutton').innerHTML = `<i class="bi bi-eye-slash-fill"></i>`;
            } else {
                document.getElementById('pass').type = 'password';

                document.getElementById('mybutton').innerHTML = `<i class="bi bi-eye-fill"></i>`;
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
