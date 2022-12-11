@extends('layouts.app2')
@section('content')
<div class="content-wrapper">
    <!-- Main content -->
  <div class="content">
    <div class="container-fluied">
      <div class="row mt-3">
       <div class="col-12">
           <div class="card py-3">
              <!-- /.card-header -->
                <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-striped">
                  <thead>
                      <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($messages as $key => $message)
                        <tr>
                            <td>{{ $key+1}}</td>
                            <td>{{ $message->name ?? 'NULL' }}</td>
                            <td>{{ $message->email ?? 'NULL' }}</td>
                            <td>{{ $message->phone ?? 'NULL' }}</td>
                            <td>{{ $message->subject ?? 'NULL' }}</td>
                            <td>{{ $message->message ?? 'NULL' }}</td>
                            <td>
                                @if($message->status == 1)
                                  <a href="{{ route('message.in_active',['id'=>$message->id]) }}" class="btn btn-success btn-sm">Active</a>
                                @else
                                  <a href="{{ route('message.active',['id'=>$message->id]) }}" class="btn btn-danger btn-sm">Inactive</a>
                                @endif
                            </td>
                            <td>
                                <a data-toggle="modal" data-target="#delete-modal{{ $message->id }}" href="{{ route('message.delete',$message->id ) }}" id="delete" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></a>

                                <!-- Start Delete Message Modal -->
                                <div class="modal fade" id="delete-modal{{ $message->id }}">
                                    <div class="modal-dialog">
                                      <div class="modal-content bg-primary">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Message Deleted?</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body bg-light">
                                          <p>Are you sure Message Permanently Deleted?</p>
                                        </div>
                                        <div class="modal-footer justify-content-between bg-light">
                                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                          <a type="button" href="{{ route('message.delete',['id'=>$message->id]) }}" class="btn btn-primary"><i style="margin-right: 5px; color: white;" class="fas  fa-trash"></i><span class="text-light">OK</span></a>
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                 </div>
                            </td>
                        </tr>
                    @endforeach
                  </tfoot>
                </table>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content -->
</div>
@endsection