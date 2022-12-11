@extends('layouts.app2')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper">
    <!-- Main content -->
  <div class="content">
    <div class="container-fluied">
      <div class="row mt-3">
       <div class="col-12">
           <div class="card py-3">
             <div class="d-flex justify-content-between align-items-center" style="padding:15px">
                <h3 class="card-title pl-3">Logo</h3>
                <a data-toggle="modal" data-target="#viewModal" href="{{ route('logo.create') }}" class="btn btn-success col-2 fileinput-button dz-clickable"><i class="fas fa-plus mr-2"></i>Add Logo</a>
                <!-- modal -->
                <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-md modal-dialog-scrollable text-left">
                        <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h4 class="modal-title text-center" id="myModalLabel">Create Logo</h4>
                                <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('logo.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">

                                        <div class="form-group">
				                         	<img id="logo_showImage" class="rounded avatar-lg" src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.jpg') }}" alt="Card image cap" width="100px" height="80px;">
				                        </div>
				                        <div class="form-group">
				                         	<label for="logo_image" class="col-form-label col-md-2" style="font-weight: bold;">Slider Photo:</label>
				                            <input name="logo_image" class="form-control" type="file" id="logo_image">
				                            @error('logo_image')
		                                        <p class="text-danger">{{$message}}</p>
		                                    @enderror
				                        </div>
                                        <div class="mb-4">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" class="form-check-input me-2 cursor" name="status" id="status" checked value="1">
                                                <label class="form-check-label cursor" for="status">Status</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4 justify-content-sm-end">
                                            <input type="submit" class="btn btn-success btn-rounded" value="Add Now">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-striped">
                  <thead>
                      <tr>
                        <th>Sl</th>
                        <th>logo Image</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($logo as $key => $service)
                        <tr>
                            <td>{{ $key+1}}</td>
                            <td><img src="{{ asset($service->logo_image) }}" width="70" height="70" alt="slider"></td>

                            <td>
                                @if($service->status == 1)
                                  <a href="{{ route('logo.in_active',['id'=>$service->id]) }}" class="btn btn-success btn-sm">Active</a>
                                @else
                                  <a href="{{ route('logo.active',['id'=>$service->id]) }}" class="btn btn-danger btn-sm">Inactive</a>
                                @endif
                            </td>
                            <td class="col-2">
                                <a data-toggle="modal" data-target="#logoEdit{{ $service->id }}" href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                                <a data-toggle="modal" data-target="#delete-modal{{ $service->id }}" href="{{ route('logo.delete',$service->id ) }}" id="delete" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></a>

                                <!-- Start Delete Menu Modal -->
                                <div class="modal fade" id="delete-modal{{ $service->id }}">
                                    <div class="modal-dialog">
                                      <div class="modal-content bg-primary">
                                        <div class="modal-header">
                                          <h4 class="modal-title">logo Deleted?</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body bg-light">
                                          <p>Are you sure logo Permanently Deleted?</p>
                                        </div>
                                        <div class="modal-footer justify-content-between bg-light">
                                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                          <a type="button" href="{{ route('logo.delete',['id'=>$service->id]) }}" class="btn btn-primary"><i style="margin-right: 5px; color: white;" class="fas  fa-trash"></i><span class="text-light">OK</span></a>
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                 </div>

                                <!-- Start Service Edit Modal -->
                                <div class="modal fade" id="logoEdit{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable text-left">
                                      <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                          <h4 class="modal-title text-center" id="myModalLabel">Edit logo</h4>
                                          <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                                        </div>
                                       <div class="modal-body">
                                            <form action="{{ route('logo.update',$service->id) }}" method="post"  enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-body">

			                                        <div class="form-group">
							                         	<img id="logo_showImage" class="rounded avatar-lg" src="{{ asset($service->logo_image) }}" alt="logo image" width="100px" height="80px;">
							                        </div>
							                        <div class="form-group">
							                         	<label for="logo_image" class="col-form-label col-md-2" style="font-weight: bold;">Slider Photo:</label>
							                            <input name="logo_image" class="form-control" type="file" id="logo_image">
							                            @error('logo_image')
					                                        <p class="text-danger">{{$message}}</p>
					                                    @enderror
							                        </div>
			                                        <div class="mb-4">
			                                            <div class="icheck-success d-inline">
			                                                <input type="checkbox" class="form-check-input me-2 cursor" name="status" id="status"  value="1" {{ $service->status == 1 ? 'checked': '' }}>
			                                                <label class="form-check-label cursor" for="status">Status</label>
			                                            </div>
			                                        </div>
			                                        <div class="row mb-4 justify-content-sm-end">
			                                            <div class="col-lg-3 col-md-4 col-sm-5 col-6">
			                                                <input type="submit" class="btn btn-success btn-rounded" value="Update Now">
			                                            </div>
			                                        </div>
			                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal -->
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

<!-- logo Image Show -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#logo_image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#logo_showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
