

@if($auth == 1)
@extends('app.studentVCLayout')

@section('dashboard')
<div class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">
             <h1 class="m-0"><img src="../asset/img/dashboard.png" width="40">
                Dashboard
            </h1>
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


@section('content')
<section class="content">
    <div class="container-fluid">
       <div class="row">
        <div class="col-12 col-sm-4 col-md-4 offset-md-2 offset-sm-2">
            <div class="info-box">
               <span class="info-box-icon text-success elevation-4 bg-3"><img src="../asset/img/complaint.png" width="50"></span>

               <div class="info-box-content">
                  <span class="info-box-text">
                     <h5>Total submitted Case</h5>
                  </span>
                  <span class="info-box-number">
                     <h2>{{ $t }}</h2>
                  </span>
               </div>
            </div>
         </div>
          <div class="col-12 col-sm-4 col-md-4">
             <div class="info-box">
                <span class="info-box-icon text-success elevation-4 bg-3"><img src="../asset/img/complaint.png" width="50"></span>

                <div class="info-box-content">
                   <span class="info-box-text">
                      <h5>Pending Case</h5>
                   </span>
                   <span class="info-box-number">
                      <h2>{{ $p }}</h2>
                   </span>
                </div>
             </div>
          </div>
          <div class="col-12 col-sm-4 col-md-4 offset-md-2 offset-sm-2">
             <div class="info-box">
                <span class="info-box-icon text-info elevation-4 bg-4"><img src="../asset/img/complaint.png" width="50"></span>

                <div class="info-box-content">
                   <span class="info-box-text">
                      <h5>On-going Case</h5>
                   </span>
                   <span class="info-box-number">
                      <h2>{{ $o }}</h2>
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
                      <h2>{{ $c }}</h2>
                   </span>
                </div>
             </div>
          </div>

       </div>
    </div>


   <div id="edit" class="modal animated rubberBand delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
     <div class="modal-content">
        <div class="modal-body text-center">
           <form>
              <div class="card-body">
                 <div class="row">
                    <div class="col-md-12">
                       <div class="card-header text-center">
                          <div class="upload">
                            <img src="../asset/img/user.png" width="100">
                            <div class="round">
                              <input type="file">
                              <i class = "fa fa-camera" style = "color: #fff;"></i>
                            </div>
                          </div>
                       </div>
                       <div class="row">
                          <div class="col-md-4">
                             <div class="form-group">
                                <label class="float-left">First Name</label>
                                <input type="text" class="form-control" placeholder="First Name">
                             </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                                <label class="float-left">Middle Name</label>
                                <input type="text" class="form-control" placeholder="Middle Name">
                             </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                                <label class="float-left">Last Name</label>
                                <input type="text" class="form-control" placeholder="Last Name">
                             </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                                <label class="float-left">Role</label>
                                <select class="form-control">
                                   <option>Dean</option>
                                   <option>Chairman</option>
                                   <option>Instructor</option>
                                   <option>Student</option>
                                </select>
                             </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                               <label class="float-left">Gender</label>
                               <select class="form-control">
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                               </select>
                            </div>
                         </div>
                          <div class="col-md-4">
                             <div class="form-group">
                                <label class="float-left">Contact</label>
                                <input type="text" class="form-control" placeholder="Phone number">
                             </div>
                          </div>

                          <div class="col-md-4">
                             <div class="form-group">
                                <label class="float-left">Email</label>
                                <input type="text" class="form-control" placeholder="Email">
                             </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                                <label class="float-left">Username</label>
                                <input type="text" class="form-control" placeholder="Username">
                             </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                                <label class="float-left">Password</label>
                                <input type="password" class="form-control" placeholder="**********">
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                 <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
                 <button type="submit" class="btn btn-save">Save Changes</button>
              </div>
           </form>
        </div>
     </div>
    </div>
    </div>


 </section>
@endsection

@endif
@if($auth == 0)
@section('dashboard')
<div class="alert alert-warning text-center h1 text-white" style="font-family: monospace;">The Account is Inactive</div>
@endsection
@endif
