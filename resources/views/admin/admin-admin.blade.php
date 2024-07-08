@extends('app.layoutes')

@section('content')
      <div class="content-wrapper">
         <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0"><img src="../asset/img/user.png" width="40">Admin</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Admin</li>
                     </ol>
                  </div><br>
                  <a class="btn btn-sm btn-info elevation-4" href="#" data-toggle="modal" data-target="#add" style="margin-left: 7px;"><i
                        class="fa fa-plus-square"></i>
                     Add New Admin</a>
               </div>
            </div>
         </div>
         @if(Session::has('success'))
         <div class="alert alert-success">{{ Session::get('success') }}</div>
     @endif

     @if(Session::has('fail'))
         <div class="alert alert-success">{{ Session::get('fail') }}</div>
     @endif

     @if(Session::has('exists'))
         <div class="alert alert-success">{{ Session::get('exists') }}</div>
     @endif

         @error('email')
         <p class="text-warning text-center">{{ $message }}</p>
         @enderror
         @error('username')
         <p class="text-warning text-center">{{ $message }}</p>

         @enderror
         @error('password')
         <p class="text-warning text-center">{{ $message }}</p>

         @enderror
         @error('cpassword')
         <p class="text-warning text-center">{{ $message }}</p>

         @enderror
@endsection

@section('contents')

 <!--Add account -->

   <div id="add" class="modal animated rubberBand delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
       <div class="modal-content">
          <div class="modal-body text-center">
              <form action="/admin/a/store" method="post">


                  @csrf
                    <div class="card-body">
                       <div class="row">
                          <div class="col-md-12">
                             <div class="card-header">
                                <h5><img src="../asset/img/user.png" width="40"> Add Admin Information</h5>
                             </div>
                             <div class="row">
                                <div class="col-md-4">
                                   <div class="form-group">
                                      <label class="float-left">First Name</label>
                                      <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                                   </div>
                                </div>
                                <div class="col-md-4">
                                   <div class="form-group">
                                      <label class="float-left">Middle Name</label>
                                      <input type="text" name="mname" class="form-control" placeholder="Middle Name" required>
                                   </div>
                                </div>
                                <div class="col-md-4">
                                   <div class="form-group">
                                      <label class="float-left">Last Name</label>
                                      <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                                   </div>
                                </div>
                                <div class="col-md-4">
                                   <div class="form-group">
                                      <label class="float-left">Role</label>
                                      <select name="role" class="form-control">
                                        <option value="Admin" selected>Admin</option>
                                         <option value="Dean">Dean</option>
                                         <option value="Chair">Chairman</option>
                                         <option value="Instructor">Instructor</option>
                                         <option value="Student">Student</option>
                                      </select>
                                   </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                     <label class="float-left">Gender</label>
                                     <select name="gender" class="form-control">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                     </select>
                                  </div>
                               </div>
                                <div class="col-md-4">
                                   <div class="form-group">
                                      <label class="float-left">Contact</label>
                                      <input type="text" name="contact" class="form-control" placeholder="Phone Number" required>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <label class="float-left">Email</label>
                                      <input type="text" name="email" class="form-control" placeholder="Email" required>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <label class="float-left">Username</label>
                                      <input type="text" name="username" class="form-control" placeholder="Username" required>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <label class="float-left">Password</label>
                                      <input type="password" name="password" class="form-control" placeholder="**********" required>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="float-left">Confirm Password</label>
                                       <input type="password" name="cpassword" class="form-control" placeholder="**********" required>
                                    </div>
                                 </div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                       <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
                       <button type="submit" class="btn btn-save">Save</button>
                    </div>
                 </form>
          </div>
       </div>
    </div>
 </div>



 <section class="content">
    <div class="container-fluid">
       <div class="card card-info">
          <br>
          <div class="col-md-12">
            <table id="example1" class="table">
                <thead class="btn-cancel">
                   <tr>
                      <th>Full Name</th>
                      <th>Username</th>
                      <th>Contact</th>
                      <th>Email</th>

                      <th>Status</th>
                      <th class="text-center">Action</th>
                   </tr>
                </thead>
                <tbody>

                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->Fname."   ".$user->Mname."   ".$user->Lname }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->contact }}</td>
                        <td>{{  $user->email }} </td>

                        <td><span class="badge bg-success">activated</span></td>
                        <td class="text-center">
                        <a class="btn btn-sm btn-success" href="/admin/a/{{ $user->id }}/update" ><i
                                class="fa fa-user-edit"></i> update</a>
                        <a class="btn btn-sm btn-danger" href="/admin/a/{{ $user->id }}/delete"><i
                                class="fa fa-trash-alt"></i> delete</a>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
             </table>
          </div>
       </div>
    </div>
 </section>





</div>
</div>


<!-- delete user  -->


<div id="delete" class="modal animated rubberBand delete-modal" role="dialog">
<div class="modal-dialog modal-dialog-centered">
 <div class="modal-content">
    <div class="modal-body text-center">
       <img src="../asset/img/sent.png" alt="" width="50" height="46">
       <h3>Are you sure want to delete this Department User?</h3>
       <div class="m-t-20">
          <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
          <button type="submit" class="btn btn-danger">Delete</button>
       </div>
    </div>
 </div>
</div>
</div>



<!-- Update account -->


<div id="edit" class="modal animated rubberBand delete-modal" role="dialog">
<div class="modal-dialog modal-dialog-centered modal-lg">
 <div class="modal-content">
    <div class="modal-body text-center">
       <form>
          <div class="card-body">
             <div class="row">
                <div class="col-md-12">
                   <div class="card-header">
                      <h5><img src="../asset/img/user.png" width="40">Department User Information</h5>
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



<!-- jQuery -->
<script src="../asset/jquery/jquery.min.js"></script>
<script src="../asset/js/bootstrap.bundle.min.js"></script>
<script src="../asset/js/adminlte.js"></script>
<!-- DataTables  & Plugins -->
<script src="../asset/tables/datatables/jquery.dataTables.min.js"></script>
<script src="../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../asset/tables/datatables-buttons/js/bsuttons.bootstrap4.min.js"></script>
<script>
$(function () {
 $("#example1").DataTable();
});
</script>


@endsection


