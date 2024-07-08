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
            <li class="nav-item" style="background: red">
               <a class="nav-link" href="#" role="button">
                {{ $data->username }}
                  <img src="../asset/img/user.png" class="img-circle" alt="User Image" width="40" style="margin-top: -8px;">
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
            <a href="index.html" class="brand-link pt-5 pb-5 mt-5 mb-5">
               <img src="../asset/img/CMS-logo.png" alt="DSMS Logo" width="200" style="margin-top:-30px;margin-bottom: -30px;">
         </a>
         <div class="sidebar">
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item">
                     <a href="admin-log" class="nav-link">
                        <img src="../asset/img/dashboard.png" width="30">
                        <p>
                           Dasboard
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="dean-user" class="nav-link">
                        <img src="../asset/img/staff.png" width="30">
                        <p>
                           Deans
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="chair-user" class="nav-link">
                        <img src="../asset/img/stakeholder.png" width="30">
                        <p>
                           Chairmans
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="instructor-user" class="nav-link">
                        <img src="../asset/img/department.png" width="30">
                        <p>
                           Instructors
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="student-user" class="nav-link">
                        <img src="../asset/img/bad-word.png" width="30">
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


      <div class="content-wrapper">
         <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0"><img src="../asset/img/dashboard.png" width="40"> Dashboard</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>


         <section class="content">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-12 col-sm-4 col-md-4">
                     <div class="info-box">
                        <span class="info-box-icon text-success elevation-4 bg-1"><img src="../asset/img/users.png" width="50"></span>

                        <div class="info-box-content">
                           <span class="info-box-text">
                              <h5>Total Account</h5>
                           </span>
                           <span class="info-box-number">
                              <h2>0</h2>
                           </span>
                        </div>
                     </div>

                  </div>
                  <div class="col-12 col-sm-4 col-md-4">
                     <div class="info-box">
                        <span class="info-box-icon text-info elevation-4 bg-2"><img src="../asset/img/stakeholder.png" width="50"></span>

                        <div class="info-box-content">
                           <span class="info-box-text">
                              <h5>Active Account</h5>
                           </span>
                           <span class="info-box-number">
                              <h2>0</h2>
                           </span>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-sm-4 col-md-4">
                     <div class="info-box">
                        <span class="info-box-icon text-info elevation-4 bg-2"><img src="../asset/img/stakeholder.png" width="50"></span>

                        <div class="info-box-content">
                           <span class="info-box-text">
                              <h5>Inactive Account</h5>
                           </span>
                           <span class="info-box-number">
                              <h2>0</h2>
                           </span>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-sm-4 col-md-4">
                     <div class="info-box">
                        <span class="info-box-icon text-success elevation-4 bg-3"><img src="../asset/img/complaint.png" width="50"></span>

                        <div class="info-box-content">
                           <span class="info-box-text">
                              <h5>Dean</h5>
                           </span>
                           <span class="info-box-number">
                              <h2>0</h2>
                           </span>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-sm-4 col-md-4">
                     <div class="info-box">
                        <span class="info-box-icon text-info elevation-4 bg-4"><img src="../asset/img/complaint.png" width="50"></span>

                        <div class="info-box-content">
                           <span class="info-box-text">
                              <h5>Chairman</h5>
                           </span>
                           <span class="info-box-number">
                              <h2>0</h2>
                           </span>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-sm-4 col-md-4">
                     <div class="info-box">
                        <span class="info-box-icon text-warning elevation-4 bg-5"><img src="../asset/img/complaint.png" width="50"></span>

                        <div class="info-box-content">
                           <span class="info-box-text">
                              <h5>Instructors</h5>
                           </span>
                           <span class="info-box-number">
                              <h2>0</h2>
                           </span>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-sm-4 col-md-4">
                    <div class="info-box">
                       <span class="info-box-icon text-warning elevation-4 bg-5"><img src="../asset/img/complaint.png" width="50"></span>

                       <div class="info-box-content">
                          <span class="info-box-text">
                             <h5>Students</h5>
                          </span>
                          <span class="info-box-number">
                             <h2>0</h2>
                          </span>
                       </div>
                    </div>
                 </div>

               </div>
            </div>
         </section>
      </div>
   </div>
   <!-- jQuery -->
   <script src="../asset/jquery/jquery.min.js"></script>
   <script src="../asset/js/adminlte.js"></script>
</body>

</html>
