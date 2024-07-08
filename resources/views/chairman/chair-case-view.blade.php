@extends('app.chairLayout')

@section('content')
    <div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><img src="../asset/img/dashboard.png" width="40">
                    View Case
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

                        <div class="card-body">


                        @if(Session::get('successCaseSubmission'))
                            <div class="alert alert-success">
                                {{ Session::get('successCaseSubmission') }}
                            </div>
                         @endif

                         @if(Session::get('required'))
                         <div class="alert alert-warning">
                             {{ Session::get('required') }}
                         </div>
                          @endif

                            <div class="form">

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
                                            <label>Chair</label>
                                            <input type="text"  name="username" value="{{ $cases->caseHandler }}"  required readonly/>
                                    </div>
                                </div>



                                <div class="column">
                                    <div class="input-box">
                                        <label>Your Case </label>
                                        <input type="text" value="{{ $cases->dept }}"  readonly/>
                                    </div>
                                    <div class="input-box">
                                            <label>Chair</label>
                                            <input type="text"  name="username" value="{{ $cases->year }}"  required readonly/>
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
                                        <a lass="btn btn-secondary" href="{{ asset('asset/file/'.$cases->file) }} " download="{{ asset('asset/file/'.$cases->file)}}">DownLoad</a>
                                        @endif
                                    @endif

                                </div>

                                @if($cases->rdescription != '')
                                <div class="form-floating mb-3">
                                    <textarea class="form-control"   name="response"  id="floatingTextarea2" style="height: 100px" readonly>{{ $cases->rdescription }}</textarea>
                                    <label for="floatingTextarea2">Response</label>
                                </div>

                                @endif



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


                                <form action="/response/{{ $cases->token }}" method="post" name="form">
                                    @csrf
                                    <div class="form-group hidden">
                                     <!--   <label for="">Case Token</label> -->
                                        <input type="hidden" class="form-control" name="studentResponse" value="{{ $cases->token }}">

                                    <div class="form-floating mb-3">
                                        <label for="floatingTextarea2">Write Your Response</label>
                                        <textarea class="form-control"   name="response" id="floatingTextarea2" style="height: 100px" required="response is required"></textarea>

                                    </div>

                                    @error('response')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                        <div class="form-group mb-3">
                                            <label for="forword" class="form-label">Forward to</label>
                                            <select name="forward" id="forward" class="form-control" onblur="val()" required>

                                                <option value="Dean">Dean</option>
                                                <option value="Instructor" >Instructor</option>
                                                <option value="Student">Student</option>
                                            </select>
                                        </div>
                                        @error('forward')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror

                                        <div class="form-group" id="instructorid">
                               <!--             <p class="text text-primary">You can use either the select option or input field to notify instructor</p>
                                            <input type="text" name="instructor" id="inputInstructor" placeholder="Enter Instructor first name to notify " class="form-control mb-4" onfocus="val0()"> -->

                                            <select name="instructor" id="selectInstructor" class="form-control" onfocus="val1()">
                                                <option value="">Select Instructor </option>
                                                @foreach ($i as $a)
                                                    <option value="{{ $a }}"> {{ $a }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <input name="send" class="btn btn-primary m-3" type="submit" value="Send">

                                </div>
                                </form>


                            </div>
                        </div>

                </div>
            </div>
        </div>
        </div>
    </section>
</div>

<script type="text/javascript">
 document.getElementById('instructorid').style.display = 'none';


 function val() {
    var select = document.forms['form']['forward'].value;

    if(select == 'Instructor') {
        document.getElementById('instructorid').style.display = 'block';
    }
 }

 function val0() {
    document.getElementById('selectInstructor').style.display = 'none';
 }
 function val1() {
    document.getElementById('inputInstructor').style.display = 'none';
 }
</script>
@endsection
