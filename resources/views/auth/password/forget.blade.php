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
               forget
            </div>
            <div class="card-body" >
                 @if(session()->has('notFound'))
               <div class="alert alert-danger">
                   {{ session()->get('notFound') }}
               </div>
           @endif
               <form action="checkEmailOrUsername" method="post">
                @csrf
                  <div class="input-group mb-3">
                     <input type="text" name="username" class="form-control" placeholder="Username">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-user"></span>
                        </div>
                     </div>
                  </div>

                  <div class="row">
                    <div class="col-12">
                            <button type="submit" class="btn btn-block btn-secondary">Submit</button>
                    </div>
                <!--    <div class="col-12">
                        <button type="submit" class="btn btn-block btn-primary mt-2">Register</button>
                    </div> -->
                  </div>
               </form>

            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->
      </div>
      <!-- /.login-box -->
      <a href="/her">Click nlp</a>
   </body>
</html>
