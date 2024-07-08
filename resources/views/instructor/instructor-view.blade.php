@extends('app.instructorLayout')

@section('dashboard')


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
@endsection
@section('content')
    <section class="content">
        <div class="container" style="margin-left: 6.5rem">
            <div class="row ">
                <div class="col-10">
                    <div class="card card-outlind card-primary">
                        <div class="card-header">
                            <div class="col-sm-6">
                                <h5 class="m-0"><img src="../asset/img/dashboard.png" width="40">Update Case Information</h5>
                            </div>
                        </div>
                        @if(Session()->has('responseCompelete'))
                            <div class="alert alert-success mt-2">
                                {{ Session()->get('responseCompelete') }}
                            </div>
                        @endif

                        @if(Session()->has('success'))
                        <div class="alert alert-success mt-2">
                            {{ Session()->get('success') }}
                        </div>
                    @endif
                        <div class="card-body">

                            <div class="form">

                                <div class="column">
                                    <div class="input-box">
                                        <label>Full Name</label>
                                        <input type="text" value="{{ $case->fullname }}"  readonly/>
                                    </div>
                                    <div class="input-box">
                                            <label>ID No</label>
                                            <input type="text"  name="username" value="{{ $case->session }}"  required readonly/>
                                    </div>
                                    <div class="input-box">
                                        <label>Phone No</label>
                                        <i class="fa fa-phone"></i>
                                        <input type="text"  name="username" value="{{ $case->phone }}"  required readonly/>
                                     </div>
                                </div>

                                <div class="column">
                                    <div class="input-box">
                                        <label>Department</label>
                                        <input type="text" value="{{ $case->dept }}"  readonly/>
                                    </div>
                                    <div class="input-box">
                                            <label>Year</label>
                                            <input type="text"  name="username" value="{{ $case->year }}"  required readonly/>
                                    </div>
                                    <div class="input-box">
                                        <label>Semister</label>
                                        <input type="text"  name="username" value="{{ $case->semister }}"  required readonly/>
                                     </div>
                                </div>



                                <div class="column mt-2">
                                    <div class="input-box">
                                        <label> Case </label>
                                        <input type="text" value="{{ $case->case }}"  readonly/>
                                    </div>

                                </div>
                                <div class="column mt-3">
                                    <div class="form-group">
                                        <label> Case Descrption</label>
                                        <textarea class="form-control" name="" id=""  cols="150" rows="5" readonly>{{ $case->description }}</textarea>
                                    </div>
                                </div>

                                <div class="column">

                                        <div class="col-2">
                                            <p>Attachement</p>
                                        </div>
                                        <div class="col-10">


                                            @if($fileTypes == 'pdf')
                                                 <iframe src="{{ asset('asset/file/'.$case->file) }} " frameborder="2" width="80%" height="500" style="margin: 1rem"></iframe>

                                            @endif
                                            @if($fileTypes != 'pdf')
                                            <img src="{{ asset('asset/file/'.$case->file)    }}" alt="" width="70%" height="100%" style="margin: 1rem; align: center">
                                            <a lass="btn btn-secondary" href="" download="{{ asset('asset/file/'.$case->file)}}">DownLoad</a>
                                            @endif

                                        </div>

                                </div>
                                @if($case->rdescription != '')
                                    <div class="form-floating mb-3 mt-3">
                                        <label for="floatingTextarea2">Response</label>
                                        <textarea class="form-control" placeholder="" id="floatingTextarea2" style="height: 100px" readonly>{{ $case->rdescription }}</textarea>

                                    </div>
                                @endif
                                <form action="/instructor/response/{{ $case->token }}" method="post" class="mt-5">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="studentResponse" value="{{ $case->token }}">


                                        <div class="form-floating mb-3">
                                            <label for="floatingTextarea2">Write your Response</label>
                                            <textarea class="form-control" placeholder="" id="floatingTextarea2" style="height: 100px" name="response" required></textarea>

                                        </div>

                                        <div class="mb-3">
                                            <label for="forword" class="form-label">Forward to</label>
                                            <select name="forward" id="" class="form-control">
                                                    <option value="Dean" disabled>Dean</option>
                                                    <option value="Student" disabled>Student</option>
                                                    <option value="Chair">Chair</option>
                                            </select>

                                        </div>

                                       <input name="Send" class="btn btn-primary m-3" type="submit" value="Send">


                                  </div>
                                </form>

                        </div>

                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
