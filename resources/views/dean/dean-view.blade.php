@extends('app.deanLayout')

@section('content')
<div class="content-wrapper">


    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><img src="../asset/img/dashboard.png" width="40">
                    Case
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">View Case</li>
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
                                <h5 class="m-0"><img src="../asset/img/dashboard.png" width="40">Update case Information</h5>
                            </div>
                        </div>
                        @if(Session()->has('responseCompelete'))
                            <div class="alert alert-success mt-2">
                                {{ Session()->get('responseCompelete') }}
                            </div>
                        @endif
                        <div class="card-body">
                            @if(Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                            @endif

                            @if(Session::get('fail'))
                            <div class="alert alert-success">
                                {{ Session::get('fail') }}
                            </div>
                            @endif
                            <div class="form">



                                <div class="column">
                                    <div class="input-box">
                                        <label>Full Name</label>
                                        <input type="text" value="{{ $cases->session }}"  readonly/>
                                    </div>
                                    <div class="input-box">
                                            <label>ID No</label>
                                            <input type="text"  name="username" value="{{ $cases->session }}"  required readonly/>
                                    </div>
                                    <div class="input-box">
                                        <label>Phone No</label>
                                        <i class="fa fa-phone"></i>
                                        <input type="text"  name="username" value="{{ $cases->phone }}"  required readonly/>
                                     </div>
                                </div>

                                <div class="column">
                                    <div class="input-box">
                                        <label>Department</label>
                                        <input type="text" value="{{ $cases->dept }}"  readonly/>
                                    </div>
                                    <div class="input-box">
                                            <label>Year</label>
                                            <input type="text"  name="username" value="{{ $cases->year }}"  required readonly/>
                                    </div>
                                    <div class="input-box">
                                        <label>Semister</label>
                                        <input type="text"  name="username" value="{{ $cases->semister }}"  required readonly/>
                                     </div>
                                </div>



                                <div class="column mt-2">
                                    <div class="input-box">
                                        <label> Case </label>
                                        <input type="text" value="{{ $cases->case }}"  readonly/>
                                    </div>

                                </div>
                                <div class="column mt-3">
                                    <div class="form-group">
                                        <label> Case Descrption from {{ $cases->caseHandler }}</label>
                                        <textarea class="form-control" name="" id=""  cols="150" rows="5" readonly>{{ $cases->description }}</textarea>
                                    </div>
                                </div>

                                <div class="column">

                                        <div class="col-2">
                                            <p>Attachement</p>
                                        </div>
                                        <div class="col-10">
                                            @if($cases->file != '')
                                            @if($fileTypes == 'pdf')
                                                 <iframe src="{{ asset('asset/file/'.$cases->file) }} " frameborder="2" width="80%" height="500" style="margin: 1rem"></iframe>

                                            @endif
                                            @if($fileTypes != 'pdf')
                                            <img src="{{ asset('asset/file/'.$cases->file)    }}" alt="" width="60%" height="60%" style="margin: 1rem; align: center">
                                            <a lass="btn btn-secondary" href="" download="{{ asset('asset/file/'.$cases->file)}}">DownLoad</a>
                                            @endif
                                            @endif
                                        </div>


                                </div>

                                @if($cases->rdescription != '')
                                <div class="form-floating mb-3">
                                    <textarea class="form-control"   name="response"  id="floatingTextarea2" style="height: 100px" readonly>{{ $cases->rdescription }}</textarea>
                                    <label for="floatingTextarea2">Response</label>
                                  </div>

                                @endif


                                <form action="response/{{ $cases->token }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Case Token: </label>
                                        <input type="text" name="studentResponse" class="form-control" value="{{ $cases->token }}">


                                      <div class="form-floating mb-3">
                                        <label for="floatingTextarea2">Write Your Response</label>
                                        <textarea class="form-control"   name="response" id="floatingTextarea2" style="height: 100px"></textarea>

                                      </div>

                                      @error('response')
                                        <p class="text-danger">{{ $message }}</p>
                                       @enderror

                                        <div class="form-group mb-3">
                                            <label for="forword" class="form-label">Forward to</label>
                                            <select name="forward" class="form-control" id="">
                                                <option value="Registral">Registral</option>
                                                <option value="Ac">Ac</option>
                                                <option value="Collage">Collage</option>
                                                <option value="Chair">Chair</option>
                                                <option value="Instructor">Instructor</option>
                                                <option value="Student">Student</option>
                                            </select>
                                        </div>
                                        @error('forward')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <input name="approved" class="btn btn-primary m-3" type="submit" value="Approve">
                                        <input name="reject" class="btn btn-danger m-3" type="submit" value="Reject">

                                  </div>
                                </form>


                        </div>

                </div>
            </div>
        </div>
        </div>
    </section>
</div>
@endsection
