@extends('app.studentVCLayout')

@section('content')
<div class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">
             <h1 class="m-0"><img src="../asset/img/dashboard.png" width="40">
                Track
            </h1>
          </div>
          <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tracdddk</li>
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
                            <h5 class="m-0"><img src="../asset/img/dashboard.png" width="40">Track your Case</h5>
                         </div>
                    </div>

                    <div class="card-body">


                                @foreach($c as $h)


                                        @if($track < $count)
                                            <div class="alert alert-success">
                                                <p>Compeleted</p> {{ $h }}
                                            </div>
                                        @endif
                                        @if($track == $count)
                                            <div class="alert @if($case->tracking == 0) alert-warning @endif @if($case->tracking == 1) alert-info @endif @if($case->tracking == 2) alert-success @endif @if($case->tracking == 3) alert-danger @endif">
                                              <p class="text-white">@if($case->tracking == 0) {{ 'Pending...' }} @endif @if($case->tracking == 1) {{ 'On Going' }} @endif @if($case->tracking == 2) {{ 'Compeleted' }} @endif @if($case->tracking == 3) {{ 'Rejected' }} @endif </p>{{ $h }}
                                            </div>
                                         @endif

                                    <?php $track++ ?>
                                @endforeach
                </div>

                    </div>

            </div>
        </div>
    </div>
    </div>
 </section>
@endsection
