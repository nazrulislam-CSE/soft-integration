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
                <h3 class="card-title pl-3">About 
                    <span class="badge rounded-pill alert-danger"> {{ count($abouts) }} </span>
                </h3>
                <a data-toggle="modal" data-target="#viewModal" href="{{ route('about.create') }}" class="btn btn-success col-2 fileinput-button dz-clickable"><i class="fas fa-plus mr-2"></i>Add About</a>
                <!-- modal -->
                <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg  modal-md modal-dialog-scrollable text-left">
                        <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h4 class="modal-title text-center" id="myModalLabel">Create About</h4>
                                <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('about.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name_en">Name:</label>
                                            @error('name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="name_en" class="form-control" id="name_en" placeholder="Write name english">
                                        </div>
                                        <div class="form-group">
                                            <label for="title_en">Title:</label>
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="title_en" class="form-control" id="title_en" placeholder="Write title name english">
                                        </div>
                                         <div class="form-group">
                                            <label for="name_en">Btn Name:</label>
                                            @error('button_name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="button_name_en" class="form-control" id="button_name_en" placeholder="Write about button name english">
                                        </div>
                                        <div class="form-group">
                                            <label for="description_en">Description:</label>
                                            @error('description_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <textarea name="description_en" class="description" class="form-control" id="description_en" rows="3" cols="5"></textarea>
                                        </div>
                                        <div class="form-group">
				                         	<img id="about_showImage" class="rounded avatar-lg about_showImage" src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.jpg') }}" alt="Card image cap" width="100px" height="80px;">
				                        </div>
				                        <div class="form-group">
				                         	<label for="about_image" class="col-form-label col-md-4" style="font-weight: bold;">About Photo (Size:448,310):</label>
				                            <input name="about_image" class="form-control about_image" type="file" id="about_image">
				                            @error('about_image')
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
                        <th>Image</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($abouts as $key => $about)
                        <tr>
                            <td>{{ $key+1}}</td>
                            <td>
                                <img src="{{ asset($about->about_image) }}" width="70" height="70" alt="about">
                            </td>
                            <td>{{ $about->name_en ?? 'NULL' }}</td>
                            <td>{{ $about->title_en ?? 'NULL' }}</td>
                            <td>
                                @if($about->status == 1)
                                  <a href="{{ route('about.in_active',['id'=>$about->id]) }}" class="btn btn-success btn-sm">Active</a>
                                @else
                                  <a href="{{ route('about.active',['id'=>$about->id]) }}" class="btn btn-danger btn-sm">Inactive</a>
                                @endif
                            </td>
                            <td class="col-2">
                                <a data-toggle="modal" data-target="#aboutEdit{{ $about->id }}" href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                                <a data-toggle="modal" data-target="#delete-modal{{ $about->id }}" href="{{ route('about.delete',$about->id ) }}" id="delete" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></a>

                                <!-- Start Delete About Modal -->
                                <div class="modal fade" id="delete-modal{{ $about->id }}">
                                    <div class="modal-dialog">
                                      <div class="modal-content bg-primary">
                                        <div class="modal-header">
                                          <h4 class="modal-title">About Deleted?</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body bg-light">
                                          <p>Are you sure About Permanently Deleted?</p>
                                        </div>
                                        <div class="modal-footer justify-content-between bg-light">
                                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                          <a type="button" href="{{ route('about.delete',['id'=>$about->id]) }}" class="btn btn-primary"><i style="margin-right: 5px; color: white;" class="fas  fa-trash"></i><span class="text-light">OK</span></a>
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                 </div>

                                <!-- Start Menu Edit Modal -->
                                <div class="modal fade" id="aboutEdit{{ $about->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg  modal-dialog-scrollable text-left">
                                      <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                          <h4 class="modal-title text-center" id="myModalLabel">Edit about</h4>
                                          <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                                        </div>
                                      <div class="modal-body">
		                                <form action="{{ route('about.update',$about->id) }}" method="post" enctype="multipart/form-data">
		                                    @csrf
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="name_en">Name:</label>
                                                    @error('name_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <input type="text" name="name_en" class="form-control" id="name_en" placeholder="Write name english" value="{{ $about->name_en }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title_en">Title:</label>
                                                    @error('title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <input type="text" name="title_en" class="form-control" id="title_en" placeholder="Write title name english" value="{{ $about->title_en }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name_en">Btn Name:</label>
                                                    @error('button_name_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <input type="text" name="button_name_en" class="form-control" id="button_name_en" placeholder="Write about button name english" value="{{ $about->button_name_en }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description_en">Description:</label>
                                                    @error('description_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <textarea name="description_en" class="description" class="form-control" id="description_en" rows="3" cols="5">{{ $about->description_en }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <img id="about_showImage" class="rounded avatar-lg about_showImage" src="{{ asset($about->about_image) }}" alt="Card image cap" width="100px" height="80px;">
                                                </div>
                                                <div class="form-group">
                                                    <label for="about_image" class="col-form-label col-md-4" style="font-weight: bold;">About Photo (Size:448,310):</label>
                                                    <input name="about_image" class="form-control about_image" type="file" id="about_image">
                                                    @error('about_image')
                                                        <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <div class="icheck-success d-inline">
                                                        <input type="checkbox" class="form-check-input me-2 cursor" name="status" id="status" checked value="1" {{ $about->status == 1 ? 'checked': '' }}>
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
<!-- About Image Show -->
<script type="text/javascript">
    $(document).ready(function(){
        $('.about_image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('.about_showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection