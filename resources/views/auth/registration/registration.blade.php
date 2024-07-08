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
            <p class="text-center mt-2">Only for student</p>
            <div class="card-body" >

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if(session()->has('fail'))
                    <div class="alert alert-danger">
                        {{ session()->get('fail') }}
                    </div>
                 @endif

                 @if(session()->has('password'))
                    <div class="alert alert-warning">
                        {{ session()->get('password') }}
                    </div>
                 @endif

               <form action="/stundentSave" method="post" class="mb-3">
                @csrf
                  <div class="input-group mb-2">
                     <input type="text" name="username" value="{{ old('username') }}" class="form-control" placeholder="Username" required>
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-user"></span>
                        </div>
                     </div>

                     @error('username')
                        <div class="alert alert-danger mt-2">
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
                     @error('password')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>

                  <div class="input-group mb-2">
                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                    <div class="input-group-append">
                       <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                       </div>
                    </div>
                    @error('confirm_password')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                 @enderror
                 </div>

                  <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-block btn-secondary">Register</button>
                    </div>

                  </div>
               </form>
               <a href="/" class="text-center float-right">login</a>
            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->
      </div>
      <!-- /.login-box -->

   </body>
</html>
