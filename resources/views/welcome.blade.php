<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="/img/logo.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <title>SiMAGANG</title>
  </head>
  <body>
  <div class="container">

        <!-- <ul class="nav justify-content-end">
      
                @if (Route::has('login'))
                                @auth
                                <li class="nav-item">
                                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Login</a>
                                </li>
                                    @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                    </li>
                                    @endif
                                @endauth
                        @endif
        </ul> -->
    <!-- Three columns of text below the carousel -->
    <div class="row">

        <div class="col-sm-1">
            <img src="/img/logo.png" alt="Flowers in Chania" style="width:100px;height:100px;">
        </div>

        <div class="col-xl-5">
            <h1>Sistem Informasi Magang <br> Universitas Negeri Jakarta</h1>
        </div>
    </div><!-- /.row -->

    <!-- START THE FEATURETTES -->
    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <table class="table table-bordered">
        <thead class="table-success">
                <tr>
                <th scope="col">Kegiatan</th>
                <th scope="col">Jadwal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>Mark</td>
                <td>Otto</td>
                </tr>
                <tr>
                <td>Jacob</td>
                <td>Thornton</td>
                </tr>
                
            </tbody>
        </table>
        
        <div class="card text-dark bg-light mb-3" style="max-width: 37rem;">
            <div class="card-header" style="text-align: center;">Panduan Pembayaran UKT</div>
            <div class="card-body">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/8fv3jV5pC7E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

      </div>
      <div class="col-md-5">
        <div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
            <div class="card-body">
                <h5 class="card-title">PERHTIAN!</h5>
                <p class="card-text">Untuk seluruh form isian dengan benar.
                    <br>
                    Kesalahan pengisian data akan mempengaruhi Besarnya UKT yang akan keluar.
                </p>
            </div>
        </div>
                <div class="card text-dark bg-warning mb-3" style="max-width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title">BANTUAN</h5>
                        <p class="card-text"> 
                        <i class="fas fa-envelope-square"></i>    
                            cs.pendaftaran@unj.ac.id
                            <br>
                            <i class="fab fa-twitter"></i>
                            @UPTTIKUNJ
                            <br>
                            Hanya Melayani Pukul 09.00 - 17.00 WIB
                        </p>
                </div>
      </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('NIM') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      
  </div><!-- /.container -->
  </body>
</html>