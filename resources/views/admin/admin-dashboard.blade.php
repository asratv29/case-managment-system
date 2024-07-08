@extends('app.layoutes')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
       <div class="container-fluid">
          <div class="row mb-2">
             <div class="col-sm-6">
                <h3 class="m-0"><img src="../asset/img/dashboard.png" width="40"> Dashboard</h3>
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

@endsection

@section('contents')
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
                   <h2>{{ $all }}</h2>
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
                 <h5>{{ $reg }}</h5>
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
                 <h5>Secretery</h5>
              </span>
              <span class="info-box-number">
                 <h2>{{ $sec }}</h2>
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
                   <h2>{{ $den }}</h2>
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
                   <h2>{{ $Chair }}</h2>
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
                   <h2>{{ $inst }}</h2>
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
                  <h2>{{ $stud }}</h2>
               </span>
            </div>
         </div>
      </div>

    </div>
 </div>
</div>
@endsection
