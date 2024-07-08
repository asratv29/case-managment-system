@extends('app.studentVCLayout')
@if($auth == 1)
@section('dashboard')
<div class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">
             <h1 class="m-0"><img src="../asset/img/dashboard.png" width="40">
                View Response
            </h1>
          </div>
          <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Case</li>
             </ol>
          </div>
       </div>
    </div>
 </div>

@endsection


@section('content')
<section class="content">
    <div class="container" style="margin-left: 6.5rem">
        <div class="row ">
            <div class="col-10">
                <div class="card card-outlind card-primary">
                    <div class="card-header">
                        <div class="col-sm-6">
                            <h5 class="m-0"><img src="../asset/img/dashboard.png" width="40">Response</h5>
                         </div>
                    </div>

                    <div class="card-body">

                        <form action="#" class="form">

                            @csrf

                            <div class="column">
                                <div class="input-box">
                                    <label>Full Name</label>
                                    <input type="text" value="{{ $cases->fullname }}"  readonly/>
                                </div>
                                <div class="input-box">
                                        <label>ID No</label>
                                        <input type="text"  name="username" value="{{ $cases->session }}"  required readonly/>
                                </div>
                            </div>


                            <div class="column">
                                <div class="input-box">
                                    <label>Your Case </label>
                                    <input type="text" value="{{ $cases->case }}"  readonly/>
                                </div>
                                <div class="input-box">
                                        <label>Your Case Handled by</label>
                                        <input type="text"  name="username" value="{{ $cases->caseHandler }}"  required readonly/>
                                </div>
                            </div>

                            <div class="column">
                                <div class="input-box">
                                    <label for="">Case Description</label>
                                  <textarea name="" id="" class="form-control">{{ $cases->description }}</textarea>
                                </div>
                            </div>

                            <div class="column">
                                @if($cases->file != '')
                                    @if($fileTypes == 'pdf')
                                        <iframe src="{{ asset('asset/file/'.$cases->file) }} " frameborder="2" width="100%" height="500" style="margin: 1rem"></iframe>
                                    @endif
                                    @if($fileTypes != 'pdf')
                                      <img src="{{ asset('asset/file/'.$cases->file)    }}" alt="" width="100%" height="100%" style="margin: 1rem">
                                    @endif
                                    <a lass="btn btn-secondary" href="{{ asset('asset/file/'.$cases->file) }} " download="{{ asset('asset/file/'.$cases->file)}}">DownLoad</a>

                                @endif
                            </div>


                            @if($cases->tracking == 2)
                                <div class="alert alert-success mt-4">
                                    <i></i><span>success</span>
                                </div>
                            @endif
                            @if($cases->tracking == 1)
                                <div class="alert alert-info mt-4">
                                    <i></i><span>on going</span>
                                </div>
                            @endif
                            @if($cases->tracking == 0)
                                <div class="alert alert-warning mt-4">
                                    <i></i><span>pending</span>
                                </div>
                            @endif
                            @if($cases->tracking == 3)
                             <td><span class="badge bg-danger mt-4">Rejected</span></td>
                            @endif
                            @if($cases->tracking == 3)
                             <form action="">
                                <div class="form-group">
                                    <textarea name="" id="" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control">Appeal</button>
                                </div>
                             </form>
                            @endif



                             @if($cases->caseHandler == 'Secretery')
                             <div class="column">
                                <form action="student/password/reset" method="post">
                                    <div class="input-box form-group">
                                        <label>Your new password </label>
                                        <input type="text" class="form-control" value="{{ $cases->response }}">
                                        <input type="submit" class="btn btn-primary form-control" value="Set Passcode">
                                    </div>


                                </form>
                            </div>
                             @endif

                        </form>
                    </div>

            </div>
        </div>
    </div>
    </div>
 </section>
@endsection
@endif
@if($auth == 0)
@section('dashboard')
<div class="alert alert-warning">The Account is Disabled</div>
@endsection
@endif
