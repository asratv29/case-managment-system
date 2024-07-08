@extends('app.studentVCLayout')
@if($auth == 1)
@section('content')
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
                <li class="breadcrumb-item active">View Response</li>
             </ol>
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
                      <th>Case Id</th>

                      <th>Case Type</th>
                      <th>Case Desc</th>

                      <th>Status</th>
                      <th>Action</th>
                   </tr>
                </thead>
                <tbody>

                    @foreach ($cases as $case )
                    <tr>
                        <td>{{ $case->id }}</td>

                        <td>{{ $case->case }}</td>
                        <td>{{ $case->description }}</td>


                    @if($case->tracking == 0)
                    <td><span class="badge bg-warning">Pending</span></td>
                     @endif
                    @if($case->tracking == 1)
                    <td><span class="badge bg-info">On going</span></td>
                     @endif
                    @if($case->tracking == 2)
                    <td><span class="badge bg-success">Compeleted</span></td>
                    @endif
                    @if($case->tracking == 3)
                    <td><span class="badge bg-danger">Rejected</span></td>
                    @endif

                    <td>
                        <a href="/p/{{ $case->id}}" class="btn btn-primary"><i class="fa fa-edit"></i> View</a>
                        <a href="/stud/{{ $case->id }}" class="btn btn-danger ml-1"><i class="fa fa-railway"></i> Track</a>

                    </td>

                </tr>
                    @endforeach

                </tbody>

             </table>
          </div>
       </div>
    </div>

 </section>
 <!-- jQuery -->

@endsection
@endif
@if($auth == 0)
@section('dashboard')
<div class="alert alert-warning">The Account is Disabled</div>
@endsection
@endif
