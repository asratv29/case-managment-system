@extends('app.secreteryLayout')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
       <div class="container-fluid">
          <div class="row mb-2">
             <div class="col-sm-6">
                <h5 class="m-0"><img src="../asset/img/dashboard.png" width="40"> Dashboard </h5>
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
                   <span class="info-box-icon text-success elevation-4 bg-3"><img src="../asset/img/complaint.png" width="50"></span>

                   <div class="info-box-content">
                      <span class="info-box-text">
                         <h5>Total Case</h5>
                      </span>
                      <span class="info-box-number">


                            <h2>{{ $cases}}</h2>

                      </span>
                   </div>
                </div>
             </div>
             <div class="col-12 col-sm-4 col-md-4 offset-md-2 offset-sm-2">
                <div class="info-box">
                   <span class="info-box-icon text-info elevation-4 bg-4"><img src="../asset/img/complaint.png" width="50"></span>

                   <div class="info-box-content">
                      <span class="info-box-text">
                         <h5>Pending Case</h5>
                      </span>
                      <span class="info-box-number">
                         <h2>{{ $pending }}</h2>
                      </span>
                   </div>
                </div>
             </div>
             <div class="col-12 col-sm-4 col-md-4">
                <div class="info-box">
                   <span class="info-box-icon text-warning elevation-4 bg-5"><img src="../asset/img/complaint.png" width="50"></span>

                   <div class="info-box-content">
                      <span class="info-box-text">
                         <h5>Closed Case</h5>
                      </span>
                      <span class="info-box-number">
                         <h2>{{ $compeleted }}</h2>
                      </span>
                   </div>
                </div>
             </div>

          </div>
       </div>
    </section>
 </div>

 <script src="../asset/jquery/jquery.min.js"></script>
 <script src="../asset/js/bootstrap.bundle.min.js"></script>
 <script src="../asset/js/adminlte.js"></script>
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
@endsection
