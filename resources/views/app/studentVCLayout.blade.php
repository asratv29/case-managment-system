
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Complaint-Management-System</title>
   <!-- Font Awesome -->
      <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="../asset/css/adminlte.min.css">
   <link rel="stylesheet" href="../asset/css/style.css">
   <link rel="stylesheet" href="../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="../asset/css/adminlte.min.css">
        <link rel="stylesheet" href="../asset/css/style.css">
        <link rel="stylesheet" href="../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">


   <link
   rel="stylesheet"
   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>

   <link rel="stylesheet" href="{{ asset('asset/css/profile.css') }}">
   <link rel="stylesheet" href="{{ asset('asset/css/registration.css') }}">
   <link rel="stylesheet" href="{{ asset('asset/css/upload.css') }}">

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
            <nav class="navbar">
                <div class="profile-dropdown">
                    <div class="profile-dropdown-btn" onclick="toggle()">
                        <div class="profile-img">
                            <i class="fa-solid fa-circle"></i>
                        </div>
                        <span>
                            {{ Session::get('sessionStudent') }}
                            <i class="fa-solid fa-angle"></i>
                        </span>
                    </div>

                    <ul class="profile-dropdown-list">
                        <li class="profile-dropdown-list-item">
                            <a href="/student/view/{{ Session::get('sessionStudent') }}" data-toggle="modal" data-target="#edit">
                                <i class="fa-regular fa-user"></i>
                                Edit Profile
                            </a>
                        </li>

                        <li class="profile-dropdown-list-item">
                            <a href="">
                                <i class="fa-regular fa-envelope"></i>
                                Inbox
                            </a>
                        </li>

                        <li class="profile-dropdown-list-item">
                            <a href="">
                                <i class="fa-solid fa-chart-line"></i>
                                Analytics
                            </a>
                        </li>

                        <li class="profile-dropdown-list-item">
                            <a href="">
                                <i class="fa-solid fa-sliders"></i>
                                Setting
                            </a>
                        </li>

                        <hr />

                        <li class="profile-dropdown-list-item">
                            <a href="">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <li class="nav-item mt-3">
               <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
               </a>
            </li>
            <li class="nav-item mt-3">
               <a class="nav-link" data-widget="fullscreen" href="{{ route('student.studentLogout') }}">
                  <i class="fas fa-sign-out-alt"></i>
               </a>
            </li>
         </ul>
      </nav>
      <aside class="main-sidebar sidebar-light-primary">
        <!-- Brand Logo -->
        <a href="index.html" class="brand-link">
     <img src="{{ asset('asset/img/CMS-logo.png') }}"   width="200px" alt="DSMS Logo" class="">
     </a>
     <div class="sidebar mt-5">
        <nav class="mt-2">
           <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
              data-accordion="false">
              <li class="nav-item">
                 <a href="/student/student-log" class="nav-link">
                    <img src="../asset/img/dashboard.png" width="30">
                    <p>
                       Dashboard
                    </p>
                 </a>
              </li>

              <li class="nav-item">
                 <a href="/student/submit-case" class="nav-link">
                    <img src="../asset/img/complaint.png" width="30">
                    <p>
                       Submit Case
                    </p>
                 </a>
              </li>
              <li class="nav-item">
                <a href="/student/{{ Session::get('sessionStudent') }}" class="nav-link">
                   <img src="../asset/img/complaint.png" width="30">
                   <p>
                      View Response
                   </p>
                </a>
             </li>
             <li class="nav-item">
                <a href="/student/{{ Session::get('sessionStudent') }}/profile" class="nav-link">
                   <img src="../asset/img/complaint.png" width="30">
                   <p>
                      Profile
                   </p>
                </a>
             </li>
           </ul>
        </nav>
     </div>
  </aside>
    <div class="content-wrapper">
        @yield('dashboard')


        @yield('section-content')
        @yield('content')
    </div>
   </div>





   <script src="{{ asset('asset/js/profile.js') }}"></script>

   <script src="{{ asset('asset/js/match.js') }}"></script>

      <!-- jQuery -->
      <script src="../asset/jquery/jquery.min.js"></script>
      <script src="../asset/js/bootstrap.bundle.min.js"></script>
      <script src="../asset/js/adminlte.js"></script>
      <script src="{{ asset('asset/js/match.js') }}"></script>
      <!-- DataTables  & Plugins -->
      <script src="../asset/tables/datatables/jquery.dataTables.min.js"></script>
      <script src="../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script src="../asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
      <script src="../asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
      <script>
         $(function () {
            $("#example1").DataTable();
         });
      </script>
</body>

</html>







