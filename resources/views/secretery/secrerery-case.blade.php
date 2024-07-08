@extends('app.secreteryLayout')



@section('content')
<div class="content-wrapper">
    <div class="content-header">
       <div class="container-fluid">
          <div class="row mb-2">
             <div class="col-sm-6">
                <h1 class="m-0"><img src="../asset/img/complaint.png" width="40">Registerd Cases</h1>
             </div>
             <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item active">Cases</li>
                </ol>
             </div><br>


        <!--     <a class="btn btn-sm btn-info elevation-4" href="#" data-toggle="modal" data-target="#add" style="margin-left: 7px;"><i
                   class="fa fa-plus-square"></i>
                Add New</a> -->
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
                         <th>Id</th>
                         <th>Complaint Name</th>
                         <th>Department</th>
                         <th>Concern</th>
                         <th>Action</th>
                         <th>Status</th>
                      </tr>
                   </thead>
                   <tbody>

                    @foreach($cases as $case)
                        <tr>
                            <td>{{ $case->session }}</td>
                            <td>{{ $case->fullname }}</td>
                            <td>{{ $case->dept }}</td>
                            <td>{{ $case->case }}</td>
                            <td>
                                <a href="/secretery/{{ $case->token }}" class="btn btn-primary">View</a>
                                <a href="" class="btn btn-danger ml-3">Delete</a>
                            </td>

                    @if($case->tracking == 0)
                        <td><span class="badge bg-warning">Pending</span></td>
                    @endif
                    @if($case->tracking == 1)
                        <td><span class="badge bg-info">On going</span></td>
                    @endif
                    @if($case->tracking == 2)
                        <td><span class="badge bg-success">Compeleted</span></td>
                    @endif
                @endforeach

                        </tr>

                   </tbody>



                </table>
             </div>
          </div>
       </div>

    </section>
 </div>

 <!-- Modal -->

@endsection

@section('table')
<div id="add" class="modal animated rubberBand delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
       <div class="modal-content">
          <div class="modal-body text-center">
             <form>
                <div class="card-body">
                   <div class="row">
                      <div class="col-md-12">
                         <div class="card-header">
                            <h5><img src="../asset/img/complaint.png" width="40"> Complaint Information</h5>
                         </div>
                         <div class="row">
                            <div class="col-md-4">
                               <div class="form-group">
                                  <label class="float-left">Complaint Code</label>
                                  <input type="text" class="form-control" placeholder="CMPLT-123" readonly>
                               </div>
                            </div>
                            <div class="col-md-4">
                               <div class="form-group">
                                  <label class="float-left">Department</label>
                                  <select class="form-control">
                                     <option>Department 1</option>
                                     <option>Department 2</option>
                                     <option>Department 3</option>
                                  </select>
                               </div>
                            </div>
                            <div class="col-md-4">
                               <div class="form-group">
                                  <label class="float-left">Concern</label>
                                  <select class="form-control">
                                     <option>Concern 1</option>
                                     <option>Concern 2</option>
                                     <option>Concern 3</option>
                                  </select>
                               </div>
                            </div>
                            <div class="col-md-12">
                               <div class="form-group">
                                  <label class="float-left">Complaint Name</label>
                                  <input type="text" class="form-control" placeholder="Complaint Name">
                               </div>
                            </div>
                            <div class="col-md-12">
                               <div class="form-group">
                                  <label class="float-left">Complaint Deatails</label>
                                  <textarea class="form-control"></textarea>
                               </div>
                            </div><div class="col-md-6">
                               <div class="form-group">
                                  <label  class="float-left">Attachment</label>
                                  <div class="input-group">
                                     <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" >Choose file</label>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                  <label class="float-left">Timestamp</label>
                                  <input type="date" class="form-control">
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

