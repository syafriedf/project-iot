<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>IoT Machine Monitoring</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
</head>
<body>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          
          <div class="brand-wrapper">
            <img src="{{asset('img')}}/logo.png" alt="logo" class="logo" style="width:30%;height: 100%;">
          </div><br>
          <h2><b>IoT Machine Monitoring ARPS</b></h2>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Log in</h1>
            <form method="POST" action="{{ route('login') }}">
            @csrf
              <div class="form-group">
                <label for="email">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>    
              <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your Passsword">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <input name="login" id="login" class="btn btn-block login-btn" type="submit" value="Login">
            </form>
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block" style="overflow:hidden;text-align:center;width:90%">
          <img src="{{asset('img')}}/1-min.jpg" style="position: relative; left: 100%; margin-left: -200%;" alt="login image" class="login-img">
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
