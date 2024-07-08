<div id="add" class="modal animated rubberBand delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
       <div class="modal-content">
          <div class="modal-body text-center">
            
             <form action="{{ route('register-user') }}" method="post">

              @if(Session::has('success'))
                  <div class="alert alert-success">{{ Session::get('success') }}</div>
              @endif

              @if(Session::has('fail'))
                  <div class="alert alert-success">{{ Session::get('fail') }}</div>
              @endif


              @csrf
                <div class="card-body">
                   <div class="row">
                      <div class="col-md-12">
                         <div class="card-header">
                            <h5><img src="../asset/img/user.png" width="40"> adDepartment User Information</h5>
                         </div>
                         <div class="row">
                            <div class="col-md-4">
                               <div class="form-group">
                                  <label class="float-left">First Name</label>
                                  <input type="text" name="fname" class="form-control" placeholder="First Name">
                                  <span class="text-danger">
                                      @error('fname') {{ $message }} @enderror
                                  </span>
                               </div>
                            </div>
                            <div class="col-md-4">
                               <div class="form-group">
                                  <label class="float-left">Middle Name</label>
                                  <input type="text" name="mname" class="form-control" placeholder="Middle Name">
                                  <span class="text-danger">
                                      @error('mname') {{ $message }} @enderror
                                  </span>
                               </div>
                            </div>
                            <div class="col-md-4">
                               <div class="form-group">
                                  <label class="float-left">Last Name</label>
                                  <input type="text" name="lname" class="form-control" placeholder="Last Name">
                                  <span class="text-danger">
                                      @error('lname') {{ $message }} @enderror
                                  </span>
                               </div>
                            </div>
                            <div class="col-md-4">
                               <div class="form-group">
                                  <label class="float-left">Role</label>
                                  <select name="role" class="form-control">
                                     <option value="dean">Dean</option>
                                     <option value="chairman">Chairman</option>
                                     <option value="instructor">Instructor</option>
                                     <option value="student">Student</option>
                                  </select>
                                  <span class="text-danger">
                                      @error('role') {{ $message }} @enderror
                                  </span>
                               </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                 <label class="float-left">Gender</label>
                                 <select name="gender" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                 </select>
                                 <span class="text-danger">
                                  @error('gender') {{ $message }} @enderror
                              </span>
                              </div>
                           </div>
                            <div class="col-md-4">
                               <div class="form-group">
                                  <label class="float-left">Contact</label>
                                  <input type="text" name="contact" class="form-control" placeholder="Phone Number">
                                  <span class="text-danger">
                                      @error('contact') {{ $message }} @enderror
                                  </span>
                               </div>
                            </div>
                            <div class="col-md-4">
                               <div class="form-group">
                                  <label class="float-left">Email</label>
                                  <input type="text" name="email" class="form-control" placeholder="Email">
                                  <span class="text-danger">
                                      @error('email') {{ $message }} @enderror
                                  </span>
                               </div>
                            </div>
                            <div class="col-md-4">
                               <div class="form-group">
                                  <label class="float-left">Username</label>
                                  <input type="text" name="username" class="form-control" placeholder="Username">
                                  <span class="text-danger">
                                      @error('username') {{ $message }} @enderror
                                  </span>
                               </div>
                            </div>
                            <div class="col-md-4">
                               <div class="form-group">
                                  <label class="float-left">Password</label>
                                  <input type="password" name="password" class="form-control" placeholder="**********">
                                  <span class="text-danger">
                                      @error('password') {{ $message }} @enderror
                                  </span>
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
 <script src="../asset/jquery/jquery.min.js"></script>
 <script src="../asset/js/bootstrap.bundle.min.js"></script>
 <script src="../asset/js/adminlte.js"></script>
 <script src="../asset/tables/datatables/jquery.dataTables.min.js"></script>
   <script src="../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script src="../asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
   <script src="../asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
   <script>
