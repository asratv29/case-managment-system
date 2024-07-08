
@extends('app.secreteryLayout')
<link rel="stylesheet" href="{{ asset('asset/css/registration.css') }}">

@section('content')
<div class="content-wrapper">
    <div class="content-header">
       <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
             </div>
             <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item active">ResetPassword</li>
                </ol>
             </div>
          </div>
       </div>
    </div>
    <section class="content">

        <div class="container" style="margin-left: 6.5rem">
            <div class="row ">
                <div class="col-10">
                    <div class="card card-outlind card-primary">
                        <div class="card-header">
                            <div class="col-sm-6">
                                <h5 class="m-0"><img src="../asset/img/dashboard.png" width="40"> Reset student password</h5>
                             </div>
                        </div>

                        <div class="card-body">

                            @if(session()->has('resetCompelete'))
                            <div class="alert alert-success mt-2 ">
                                {{ session()->get('resetCompelete') }}
                            </div>
                          @endif

                        @if(session()->has('resetFaild'))
                            <div class="alert alert-warning mt-2 ">
                                {{ session()->get('resetFaild') }}
                            </div>
                        @endif

                        @if(session()->has('passwordidnotmach'))
                        <div class="alert alert-warning mt-2 ">
                            {{ session()->get('passwordidnotmach') }}
                        </div>
                        @endif





                            <form action="/secretery/{{ $case->token }}" class="form" method="POST">

                                @csrf
                                {{ $case->id }}
                                <div class="column">
                                    <div class="input-box">
                                        <label>Full Name</label>
                                        <input type="text" value="{{ $case->fullname }}"  readonly/>
                                    </div>
                                    <div class="input-box">
                                            <label>ID No</label>
                                            <input type="text"  name="username" value="{{ $case->session }}"  required readonly/>
                                    </div>
                                </div>


                                <div class="column">
                                    <div class="input-box">
                                    <label>Department</label>
                                    <input type="text" value="{{ $case->dept }}"  readonly/>
                                    </div>
                                    <div class="input-box">
                                    <label>Year</label>
                                    <input type="text"  value="{{ $case->year }}"  readonly/>
                                    </div>
                                    <div class="input-box">
                                        <label>Semister</label>
                                        <input type="text" value="{{ $case->semister }}"  readonly/>
                                        </div>
                                </div>


                                <div class="column">
                                    <div class="input-box">
                                    <label>Phone Number</label>
                                    <input type="number" value="{{ $case->phone }}"  readonly/>
                                    </div>
                                    <div class="input-box">
                                    <label>Age</label>
                                    <input type="text"  value="{{ $case->age }}"   readonly/>
                                    </div>
                                </div>


                                <div class="input-box">
                                    <label>Reset Password</label>
                                    <input type="password" name="password" placeholder="Reset Password" required />
                                </div>

                                @error('password')
                                    <div class="text-danger m-3">
                                        {{ $message }}
                                    </div>
                                @enderror



                                <div class="input-box">
                                    <label>Confirm Reset</label>
                                    <input type="password" name="confirm_password" placeholder="Confirm Reset Password" required />
                                </div>

                                @error('confirm_password')
                                    <div class="text-danger m-3">
                                        {{ $message }}
                                    </div>
                                @enderror

                        <div class="card-footer text-center">
                            <button type="submit"  class="btn  btn-primary">Reset</button>
                        </div>
                            </form>
                        </div>

                </div>
            </div>
        </div>
        </div>
    </section>
 </div>


  <!-- jQuery -->
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


