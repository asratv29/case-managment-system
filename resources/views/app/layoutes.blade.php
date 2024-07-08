<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Complaint-Management-System</title>
   <!-- Font Awesome -- ../asset/fontawesome/css/all.min.css>  -->
   <link rel="stylesheet" href="{{ asset('asset/fontawesome/css/all.min.css') }}">
   <link rel="stylesheet" href="{{ asset('asset/css/adminlte.min.css') }}">
   <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">

   <link rel="stylesheet" href="{{ asset('asset/css/profile.css') }}">
   <link rel="stylesheet" href="{{ asset('asset/css/registration.css') }}">

   <style type="text/css">
    table tr td {
       padding: 0.3rem !important;
    }
    table tr td p{
       margin-top: -0.8rem !important;
       margin-bottom: -0.8rem !important;
       font-size: 0.9rem;
    }
    td a.btn{
       font-size: 0.7rem;
    }
 </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
      <nav class="main-header navbar navbar-expand navbar-light">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
         </ul>
         <ul class="navbar-nav ml-auto">
            <li class="nav-item">
               <a class="nav-link" href="#" role="button">
                    {{ Session::get('sessionAdmin') }}
                  <img src="{{ asset('asset/file/aaaaaa.jpg') }}" class="img-circle" alt="User Image" width="40" style="margin-top: -8px;">
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-widget="fullscreen" href="{{ route('admin.adminLogout') }}">
                  <i class="fas fa-sign-out-alt"></i>
               </a>
            </li>
         </ul>
      </nav>
      <aside class="main-sidebar sidebar-light-secondary">
            <!-- Brand Logo -->
            <a href="index.html" class="brand-link pt-5 pb-5 mt-5 mb-2">
               <img src="{{ asset('asset/img/CMS-logo.png') }}" alt="DSMS Logo" width="200" style="margin-top:-30px;margin-bottom: -30px;">
         </a>
         <div class="sidebar">
            <nav>
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item">
                     <a href="/admin/admin-log" class="nav-link">
                        <img src="{{ asset('asset/img/dashboard.png') }}" width="30">
                        <p>
                           Dashboard
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/admin" class="nav-link">
                       <img src="{{ asset('asset/img/staff.png') }}" width="30">
                       <p>
                          Admin
                       </p>
                    </a>
                 </li>
                  <li class="nav-item">
                    <a href="/admin/registral" class="nav-link">
                       <img src="{{ asset('asset/img/staff.png') }}" width="30">
                       <p>
                          Registral
                       </p>
                    </a>
                 </li>

                  <li class="nav-item">
                     <a href="/admin/dean" class="nav-link">
                        <img src="{{ asset('asset/img/staff.png') }}" width="30">
                        <p>
                           Deans
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="/admin/chair" class="nav-link">
                        <img src="{{ asset('asset/img/stakeholder.png') }}" width="30">
                        <p>
                           Chairmans
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="/admin/instructor" class="nav-link">
                        <img src="{{ asset('asset/img/department.png') }}" width="30">
                        <p>
                           Instructors
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/secretery" class="nav-link">
                       <img src="{{ asset('asset/img/bad-word.png') }}" width="30">
                       <p>
                          Secretery
                       </p>
                    </a>
                 </li>
                  <li class="nav-item">
                     <a href="/admin/student" class="nav-link">
                        <img src="{{ asset('asset/img/bad-word.png') }}" width="30">
                        <p>
                           Students
                        </p>
                     </a>
                  </li>
                        </ul>
                  </li>
               </ul>
            </nav>
         </div>
      </aside>


      @yield('content')

         <section class="content">
            @yield('contents')
         </section>
      </div>
   </div>



   <script src="{{ asset('asset/tables/datatables/jquery.dataTables.min.js') }}"></script>

   <script src="{{ asset('asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
   <script src="{{ asset('asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
   <script src="{{  asset('asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
   <script>
      $(function () {
         $("#example1").DataTable();
      });
   </script>

</body>

</html>
