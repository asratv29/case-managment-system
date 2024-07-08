@extends('app.instructorLayout')

@section('dashboard')

         <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0"><img src="../asset/img/complaint.png" width="40"> Complaints</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Cases</li>
                     </ol>
                  </div><br>
               </div>
            </div>
         </div>
@endsection

@section('content')
         <section class="content">
            <div class="container-fluid">
               <div class="card card-info">
                  <br>
                  <div class="col-md-12">
                     <table id="example1" class="table">
                        <thead class="btn-cancel">
                           <tr>
                              <th>ID No</th>
                              <th>Complaint Name</th>
                              <th>case Handler</th>
                              <th>Concern</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                        @foreach($cases as $case)
                        <tr>
                            <td>{{ $case->id }}</td>
                            <td>{{ $case->session }}</td>
                            <td>{{ $case->description }}</td>
                            <td>{{ $case->case }}</td>
                            @if($case->tracking == 0)
                            <td><span class="badge bg-warning">pending</span></td>
                            @endif
                            @if($case->tracking == 1)
                            <td><span class="badge bg-info">On going</span></td>
                            @endif
                            @if($case->tracking == 2)
                            <td><span class="badge bg-success">Conpeleted</span></td>
                            @endif

                            <td class="text-center">
                                <!-- data-toggle="modal" data-target="#edit"-->
                               <a class="btn btn-sm btn-success" href="/iii/{{ $case->id }}" ><i
                                     class="fa fa-edit"></i> View</a>


                            </td>
                         </tr>
                        @endforeach


                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </section>


      <div id="edit" class="modal animated rubberBand delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md">
           <div class="modal-content">
              <div class="modal-body text-center">
                 <form>
                    <div class="card-body">
                       <div class="row">
                          <div class="col-md-12">
                             <div class="card-header">
                                <h5><img src="../asset/img/complaint.png" width="40"> Update Complaint Information</h5>
                             </div>
                             <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <label class="float-left">Complaint Code</label>
                                      <input type="text" class="form-control" placeholder="CMPLT-123" readonly>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <label class="float-left">Department User</label>
                                      <input type="text" class="form-control" placeholder="John Doe">
                                   </div>
                                </div>
                                <div class="col-md-12">
                                   <div class="form-group">
                                      <label class="float-left">Message</label>
                                      <textarea class="form-control"></textarea>
                                   </div>
                                </div>
                                <div class="col-md-12">
                                   <div class="form-group">
                                      <label class="float-left">Date Processed</label>
                                      <input type="date" class="form-control">
                                   </div>
                                </div>
                                <div class="col-md-12">
                                   <div class="form-group">
                                      <label class="float-left">Message</label>
                                      <textarea class="form-control"></textarea>
                                   </div>
                                </div>
                                <div class="col-md-12">
                                   <div class="form-group">
                                      <label class="float-left">Status</label>
                                      <select class="form-control">
                                         <option>pending</option>
                                         <option>on-going</option>
                                         <option>closed</option>
                                      </select>
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


@endsection


