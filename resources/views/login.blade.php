<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
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
                    <div class="col-md-3 mx-auto bg-white mb-4" id="logo">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="" width="150px">
                        <p class="fs-4 fw-bold mt-2"><span>WEB UJIAN</span> SISTEM INFORMASI</p>
                    </div>
                </div>
                <div class="col-md-6 mx-auto">
                    <div class="card p-4 border-0">
                        @if (session('pesan-danger'))
                            <p class="alert alert-danger">{{ session('pesan-danger') }}</p>
                        @endif
                        @if (session('pesan-berhasil'))
                            <p class="alert alert-success">{{ session('pesan-berhasil') }}</p>
                        @endif
                        <form action="{{ route('login.action') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">NIM</label>
                                <input type="text" name="username" id="username"
                                    class="border-1 py-3 ps-4 form-control" placeholder="Masukkan NIM">
                            </div>
                            <label for="pass" class="form-label">Password</label>
                            <div class="input-group mb-3">
                                <input type="password" name="password" id="pass"
                                    class="border-1 py-3 ps-4 form-control" placeholder="Masukkan Password">
                                <span id="mybutton" onclick="lihat()" class="input-group-text" style="cursor:pointer;">
                                    <i class="bi bi-eye-fill"></i>
                                </span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Belum Punya Akun? <a href="{{ url('/register') }}">Register</a></p>
                                <button class="btn px-4 py-2 btn-primary">Login</button>
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
