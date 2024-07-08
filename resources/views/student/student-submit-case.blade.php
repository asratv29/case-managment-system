@extends('app.studentVCLayout')
@if($auth == 1)
@section('dashboard')
<div class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">
             <h1 class="m-0"><img src="../asset/img/dashboard.png" width="40">
                Submit Case
            </h1>
          </div>
          <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Submit Case</li>
             </ol>
          </div>
       </div>
    </div>
 </div>

@endsection


@section('content')

<div id="demo"></div>
<section class="content">
    <div class="container-fluid d-flex justify-content-center align-items-center">
       <div class="row">
            <div class="card shadow card-solid card-primary mt-5 pt-2">
                <div class="card-header text-center mb-3">
                    <h5>submit your case</h5>
                </div>
                <div class="card-body pt-2 mb-3">

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

                    <form action="/student/submit-case-post" method="POST" style="width: 700px;" enctype="multipart/form-data" id="form">

                        @csrf

                        <input type="hidden" name="session" value="{{ Session::get('sessionStudent') }}" />

                        <div class="form-group">
                            <label for="key">Case Subject: - </label>
                            <input id="key" name="studentCase" onblur="val()" onfocus="val1()" class="form-control" list="keywords" placeholder="Write your case..." required>
                        </div>

                            @error('studentCase')
                                <p class="text-danger text-center">{{ $message }}</p>
                            @enderror


                        <div class="form-group" id="instructor-input">
                            <label for="instructor">Case Instructor: - </label>
                            <input type="text" name="instructor" id="instructor" class="form-control" placeholder="please write course insturctor here">
                        </div>
                        <div class="form-group" id="chair-input">
                            <label for="chair">Select Chair: - </label>
                            <select name="chair" id="chair" class="form-control">
                                <option value=""></option>
                                <option value="Programming">Programming</option>
                                <option value="Networking">Networking</option>
                                <option value="Database">Database</option>
                                <option value="Software">Software</option>

                            </select>
                        </div>

                        @error('instructor')
                                <p class="text-danger text-center">{{ $message }}</p>
                         @enderror
                         <span id="error" class="error"></span>
                        <div class="form-group" id="desc"  >
                            <label for="instructor">Case Description: - </label>

                            <textarea name="desc" cols="70" rows="3" value="" class="form-control" ></textarea>
                        </div>
                        <span id="error-desc" class="error"></span>
                        @error('desc')
                            <p class="text-alert">
                                {{ $message }}
                            </p>
                        @enderror

                        <div class="form-group" id="file">
                            <label for="instructor">Case Attachment or Evidence : - </label>
                            <input type="file" id="" name="file">
                        </div>
                        @error('file')
                         <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <span id="error-file" class="error"></span>
                        <div class="form-group">
                            <input type="submit" name="send" id="sendd" class="btn btn-primary  form-control" style="width: 100px;" value="Send">
                        </div>


                    </form>
                </div>
            </div>

        </div>
       </div>
    </div>
 </section>

 <script type="text/javascript">
 document.getElementById('chair-input').style.display = 'none';

   document.getElementById('instructor-input').style.display = 'none';
   document.getElementById('desc').style.display = 'none';
   document.getElementById('file').style.display = 'none';
   document.getElementsByClassName('error').style.display = 'none';
   document.getElementById('error-file').style.display = 'none';




function val1() {
   document.getElementById('instructor-input').style.display = 'none';
   document.getElementById('desc').style.display = 'none';
   document.getElementById('file').style.display = 'none';
   document.getElementById('error-file').style.display = 'none';
   document.getElementById('chair-input').style.display = 'none';

}

   function val() {
    var key = document.getElementById('key').value;
    var error = document.getElementById('error');
    var error_desc = document.getElementById('error-desc');
    var error_file = document.getElementById('error-file');
    var form = document.getElementById('form');

    var keyw = key.match(/hard/i);
    var add = key.match(/add/i);
    var drop = key.match(/drop/i);
    var change = key.match(/change/i);
    var password = key.match(/password/i);
    var exam = key.match(/exam/i);

    if(keyw) {
        form.classList.add("valid");
        form.classList.remove("invalid");

        error.innerHTML = 'Instructor name is required';
        error.style.color = "orange";

        error_desc.innerHTML = 'Breif description is required';
        error_desc.style.color = "orange";

        error_file.innerHTML = 'Case file or attachment is required';
        error_file.style.color = "orange";

        document.getElementById('instructor-input').style.display = 'block';
        document.getElementById('desc').style.display = 'block';
        document.getElementById('file').style.display = 'block';
   document.getElementById('chair-input').style.display = 'block';

    }

    if(add) {
        form.classList.add("valid");
        form.classList.remove("invalid");

   //     error.innerHTML = 'Instructor name is required';
   //     error.style.color = "#00ff00";

        error_desc.innerHTML = 'Breif description is required';
        error_desc.style.color = "orange";

        error_file.innerHTML = 'Case file or attachment is required';
        error_file.style.color = "orange";

      //  document.getElementById('instructor-input').style.display = 'block';
        document.getElementById('desc').style.display = 'block';
        document.getElementById('file').style.display = 'block';
        document.getElementById('error-file').style.display = 'block';
    }

    if(drop) {
        form.classList.add("valid");
        form.classList.remove("invalid");

   //     error.innerHTML = 'Instructor name is required';
    //    error.style.color = "#00ff00";

        error_desc.innerHTML = 'Breif description is required';
        error_desc.style.color = "orange";

        error_file.innerHTML = 'Case file or attachment is required';
        error_file.style.color = "orange";

    //    document.getElementById('instructor-input').style.display = 'block';
        document.getElementById('desc').style.display = 'block';
        document.getElementById('file').style.display = 'block';
    }

    if(change) {
        form.classList.add("valid");
        form.classList.remove("invalid");

       error.innerHTML = 'Instructor name is required';
       error.style.color = "#00ff00";

    //    error_desc.innerHTML = 'Breif description is required';
    //    error_desc.style.color = "#00ff00";

        error_file.innerHTML = 'Case file or attachment is required';
        error_file.style.color = "#00ff00";

       document.getElementById('instructor-input').style.display = 'block';
        document.getElementById('desc').style.display = 'block';
        document.getElementById('file').style.display = 'block';
    }

    if(exam) {
        form.classList.add("valid");
        form.classList.remove("invalid");

     //   error.innerHTML = 'Instructor name is required';
       // error.style.color = "#00ff00";

        error_desc.innerHTML = 'Breif description is required';
        error_desc.style.color = "#00ff00";

        error_file.innerHTML = 'Case file or attachment is required';
        error_file.style.color = "#00ff00";

      //  document.getElementById('instructor-input').style.display = 'block';
        document.getElementById('desc').style.display = 'block';
        document.getElementById('file').style.display = 'block';
    }

   }
 </script>


@endsection
@endif
@if($auth == 0)
@section('dashboard')
<div class="alert alert-warning">The Account is Disabled</div>
@endsection
@endif
