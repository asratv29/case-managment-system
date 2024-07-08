@extends('app.acLayouts')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
       <div class="container-fluid">
          <div class="row mb-2">
             <div class="col-sm-6">
                <h1 class="m-0"><img src="../asset/img/dashboard.png" width="40"> Dashboard </h1>
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
             <div class="col-12 col-sm-4 col-md-4 offset-md-4 offset-sm-4">
                <div class="info-box">
                   <span class="info-box-icon text-success elevation-4 bg-3"><img src="../asset/img/complaint.png" width="50"></span>

                   <div class="info-box-content">
                      <span class="info-box-text">
                         <h5>Pending Complaints</h5>
                      </span>
                      <span class="info-box-number">
                         <h2>150</h2>
                      </span>
                   </div>
                </div>
             </div>
             <div class="col-12 col-sm-4 col-md-4 offset-md-2 offset-sm-2">
                <div class="info-box">
                   <span class="info-box-icon text-info elevation-4 bg-4"><img src="../asset/img/complaint.png" width="50"></span>

                   <div class="info-box-content">
                      <span class="info-box-text">
                         <h5>On-going Complaints</h5>
                      </span>
                      <span class="info-box-number">
                         <h2>260</h2>
                      </span>
                   </div>
                </div>
             </div>
             <div class="col-12 col-sm-4 col-md-4">
                <div class="info-box">
                   <span class="info-box-icon text-warning elevation-4 bg-5"><img src="../asset/img/complaint.png" width="50"></span>

                   <div class="info-box-content">
                      <span class="info-box-text">
                         <h5>Closed Complaints</h5>
                      </span>
                      <span class="info-box-number">
                         <h2>400</h2>
                      </span>
                   </div>
                </div>
             </div>

          </div>
       </div>
    </section>
 </div>
@endsection
