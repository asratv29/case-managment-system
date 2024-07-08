@extends('app.layoutes')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
       <div class="container-fluid">
          <div class="row mb-2">
             <div class="col-sm-6">
                <h1 class="m-0"><img src="../asset/img/user.png" width="40">{{ $user->role }}</h1>
             </div>
             <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item active">Update</li>
                </ol>
             </div><br>
          </div>
       </div>
    </div>
@endsection
@section('contents')

<div id="edit" class="">

    <div class="modal-dialog modal-dialog-centered modal-lg">
     <div class="modal-content">
        <div class="modal-body text-center">
           <form  action="/admin/update/a/u/{{ $user->id }}" method="POST" >
            @csrf
            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            @if(Session::has('fail'))
                <div class="alert alert-warning">{{ Session::get('fail') }}</div>
            @endif
            @if(Session::has('exists'))
            <div class="alert alert-success">{{ Session::get('exists') }}</div>
            @endif


              <div class="card-body">
                 <div class="row">
                    <div class="col-md-12">
                       <div class="card-header">
                          <h5><img src="{{ asset('asset/img/user.png') }}" width="40">{{ $user->role }} Update Information</h5>
                       </div>
                       <div class="row">
                          <div class="col-md-4">
                             <div class="form-group">
                                <label class="float-left">First Name</label>
                                <input type="text" class="form-control" value="{{ $user->Fname }}"  readonly name="fname" placeholder="First Name">
                             </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                                <label class="float-left">Middle Name</label>
                                <input type="text" class="form-control" value="{{ $user->Mname }}"  readonly name="mname" placeholder="Middle Name">
                             </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                                <label class="float-left">Last Name</label>
                                <input type="text" class="form-control" value="{{ $user->Lname }}" readonly name="lname" placeholder="Last Name">
                             </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                                <label class="float-left">Role</label>
                                <select class="form-control"  readonly name="role">
                                   <option value="{{ $user->role }}" selected>{{ $user->role }}</option>
                                </select>
                             </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                               <label class="float-left">Gender</label>
                               <select class="form-control" name="gender" readonly>
                                  <option value="{{ $user->gender }}"   selected>{{ $user->gender }}</option>

                               </select>
                            </div>
                         </div>
                          <div class="col-md-4">
                             <div class="form-group">
                                <label class="float-left">Contact</label>
                                <input type="text" class="form-control" value="{{ $user->contact }}" name="contact" required>
                             </div>
                          </div>

                          <div class="col-md-4">

                             <div class="form-group">
                                <label class="float-left">Email</label>
                                <input type="text" class="form-control" value="{{ $user->email }}" readonly>
                             </div>
                             @error('email')
                             <p class="text-danger text-center">{{ $message }}</p>

                             @enderror
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                                <label class="float-left">Username</label>
                                <input type="text" class="form-control" value="{{ $user->username }}"  readonly >
                             </div>
                             @error('username')
                             <p class="text-danger text-center">{{ $message }}</p>
                             @enderror
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                               <label class="float-left">Status</label>
                               <input type="text" class="form-control" value="{{ $user->status }}" name="status" required>
                            </div>
                         </div>
                          <div class="col-md-6">
                             <div class="form-group">
                                <label class="float-left">Password</label>
                                <input type="password" class="form-control" name="password"  placeholder="**********" required>
                                @error('password')
                                     <p class="text-danger text-center">{{ $message }}</p>
                                @enderror
                             </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                               <label class="float-left">Confirm Password</label>
                               <input type="password" class="form-control" name="cpassword"  placeholder="**********" required>
                            </div>
                            @error('cpassword')
                                <p class="text-danger text-center">{{ $message }}</p>
                            @enderror
                         </div>
                       </div>
                    </div>
                 </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">

                 <button type="submit" class="btn btn-save">Save Changes</button>
              </div>
           </form>
        </div>
     </div>
    </div>
    </div>

@endsection
