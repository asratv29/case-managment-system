<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Case-Management-System</title>
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="asset/css/adminlte.min.css">
   </head>
   <body class="hold-transition login-page">
      <div class="login-box">
         <!-- /.login-logo -->
         <div class="card card-outline card-warning">
            <div class="card-header text-center">
               <a href="index.html" class="brand-link">
               <img src="asset/img/CMS-logo.png" width="200">
               </a>
            </div>
            <div class="card-body" >
                @if(session()->has('authFail'))
                    <div class="alert alert-danger">
                        {{ session()->get('authFail') }}
                    </div>
                @endif

                @if(session()->has('sessionFailed'))
                    <div class="alert alert-danger">
                        {{ session()->get('sessionFailed') }}
                    </div>
                @endif

                @if (session()->has('authRegisterFirst'))
                    <div class="alert alert-warning">
                        {{ session()->get('authRegisterFirst') }}
                    </div>
                @endif
               <form action="{{ route('login.post') }}" method="POST" class="mb-3">

                @csrf

                  <div class="input-group mb-2">
                     <input type="text" name="username" value="{{ old('username') }}" class="form-control" placeholder="Username" required>
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-user"></span>
                        </div>
                     </div>

                     @error('username')
                        <div class="alert alert-warning">
                            {{ $message }}
                        </div>
                     @enderror
                  </div>
                  <div class="input-group mb-2">
                     <input type="password" name="password" class="form-control" placeholder="Password" required>
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-lock"></span>
                        </div>
                     </div>


                  </div>
                  @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                     @enderror
                  <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-block btn-secondary">Login</button>
                    </div>
                <!--    <div class="col-12">
                        <button type="submit" class="btn btn-block btn-primary mt-2">Register</button>
                    </div> -->
                  </div>
               </form>
               <a href="forgotPassword" class="text-center ts-15">forgot password</a>
               <a href="register" class="text-center float-right">Register</a>
            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->
      </div>
      <!-- /.login-box -->
     
   </body>
</html>
