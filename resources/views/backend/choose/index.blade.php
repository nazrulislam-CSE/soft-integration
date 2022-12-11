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
                  <h3 class="card-title pl-3">Choose</h3>
                  <a data-toggle="modal" data-target="#viewModal" href="{{ route('choose.create') }}" class="btn btn-success col-2 fileinput-button dz-clickable"><i class="fas fa-plus mr-2"></i>Add choose</a>
                  <!-- modal -->
                  <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-lg modal-md modal-dialog-scrollable text-left">
                        <div class="modal-content">
                           <div class="modal-header bg-success">
                              <h4 class="modal-title text-center" id="myModalLabel">Create choose</h4>
                              <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                           </div>
                           <div class="modal-body">
                              <form action="{{ route('choose.store') }}" method="post" enctype="multipart/form-data">
                                 @csrf
                                 <div class="card-body">
                                    <div class="form-group">
                                       <label for="name_en">Name:</label>
                                       @error('name_en')
                                       <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                       <input type="text" name="name_en" class="form-control" id="title_en" placeholder="Write name english">
                                    </div>
                                    <div class="form-group">
                                       <label for="title_en">Title:</label>
                                       @error('title_en')
                                       <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                       <input type="text" name="title_en" class="form-control" id="title_en" placeholder="Write title name english">
                                    </div>
                                    <div class="form-group">
                                        <label for="description_en" class="">choose Description:</label>
                                        <textarea name="description_en" class="description" cols="30" rows="7" class="form-control" ></textarea>
                                        @error('description_en')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                     </div>
                                    <div class="form-group">
                                       <label for="choose_name_en">choose Name:</label>
                                       @error('choose_name_en')
                                       <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                       <input type="text" name="choose_name_en" class="form-control" id="choose_name_en" placeholder="Write choose name english">
                                    </div>
                                    <div class="form-group">
                                       <img id="choose_showImage" class="rounded avatar-lg" src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.jpg') }}" alt="Card image cap" width="100px" height="80px;">
                                    </div>
                                    <div class="form-group">
                                       <label for="choose_image" class="col-form-label col-md-4" style="font-weight: bold;">choose Image:(size:140,150)</label>
                                       <input name="choose_image" class="form-control" type="file" id="choose_image">
                                       @error('choose_image')
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
                           <th>Choose Image</th>
                           <th>Choose Name</th>
                           <th>Choose Title</th>
                           <th>Choose Description</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($choose as $key => $service)
                        <tr>
                           <td>{{ $key+1}}</td>
                           <td><img src="{{ asset($service->choose_image) }}" width="70" height="70" alt="slider"></td>
                           <td>{{ $service->name_en ?? 'NULL' }}</td>
                           <td>{{ $service->title_en ?? 'NULL' }}</td>
                           <td>{{ $service->choose_name_en ?? 'NULL' }}</td>
                           <td>
                              @if($service->status == 1)
                              <a href="{{ route('choose.in_active',['id'=>$service->id]) }}" class="btn btn-success btn-sm">Active</a>
                              @else
                              <a href="{{ route('choose.active',['id'=>$service->id]) }}" class="btn btn-danger btn-sm">Inactive</a>
                              @endif
                           </td>
                           <td class="col-2">
                              <a data-toggle="modal" data-target="#chooseEdit{{ $service->id }}" href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                              <a data-toggle="modal" data-target="#delete-modal{{ $service->id }}" href="{{ route('choose.delete',$service->id ) }}" id="delete" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></a>
                              <!-- Start Delete Menu Modal -->
                              <div class="modal fade" id="delete-modal{{ $service->id }}">
                                 <div class="modal-dialog">
                                    <div class="modal-content bg-primary">
                                       <div class="modal-header">
                                          <h4 class="modal-title">choose Deleted?</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                       </div>
                                       <div class="modal-body bg-light">
                                          <p>Are you sure choose Permanently Deleted?</p>
                                       </div>
                                       <div class="modal-footer justify-content-between bg-light">
                                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                          <a type="button" href="{{ route('choose.delete',['id'=>$service->id]) }}" class="btn btn-primary"><i style="margin-right: 5px; color: white;" class="fas  fa-trash"></i><span class="text-light">OK</span></a>
                                       </div>
                                    </div>
                                    <!-- /.modal-content -->
                                 </div>
                              </div>
                              <!-- Start Service Edit Modal -->
                              <div class="modal fade" id="chooseEdit{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                 <div class="modal-dialog modal-lg modal-dialog-scrollable text-left">
                                    <div class="modal-content">
                                       <div class="modal-header bg-primary">
                                          <h4 class="modal-title text-center" id="myModalLabel">Edit choose</h4>
                                          <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                                       </div>
                                       <div class="modal-body">
                                          <form action="{{ route('choose.update',$service->id) }}" method="post"  enctype="multipart/form-data">
                                             @csrf

                                             <div class="card-body">
                                                <div class="form-group">
                                                   <label for="name_en">Name:</label>
                                                   @error('name_en')
                                                   <span class="text-danger">{{ $message }}</span>
                                                   @enderror
                                                   <input type="text" name="name_en" class="form-control" id="title_en" value="{{ $service->name_en}}">
                                                </div>
                                                <div class="form-group">
                                                   <label for="title_en">Title:</label>
                                                   @error('title_en')
                                                   <span class="text-danger">{{ $message }}</span>
                                                   @enderror
                                                   <input type="text" name="title_en" class="form-control" id="title_en" value="{{ $service->title_en}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description_en" class="">choose Description</label>
                                                    <textarea name="description_en" class="description" cols="30" rows="7" class="form-control" >{{ $service->description_bn }}</textarea>
                                                    @error('description_en')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                 </div>
                                                <div class="form-group">
                                                   <label for="choose_name_en">choose Name:</label>
                                                   @error('choose_name_en')
                                                   <span class="text-danger">{{ $message }}</span>
                                                   @enderror
                                                   <input type="text" name="choose_name_en" class="form-control" id="choose_name_en" value="{{ $service->choose_name_en }}">
                                                </div>
                                                <div class="form-group">
                                                   <label for="choose_description_en" class="">choose Description</label>
                                                   <textarea name="choose_description_en" class="description" cols="30" rows="7" class="form-control" >{{ $service->choose_description_en }}</textarea>
                                                   @error('choose_description_en')
                                                   <p class="text-danger">{{ $message }}</p>
                                                   @enderror
                                                </div>
                                                <div class="form-group">
                                                   <img id="services_showImage" class="rounded avatar-lg" src="{{ asset($service->choose_image) }}" alt="Services image" width="100px" height="80px;">
                                                </div>
                                                <div class="form-group">
                                                   <label for="choose_image" class="col-form-label col-md-4" style="font-weight: bold;">choose Image:(size:140,150)</label>
                                                   <input name="choose_image" class="form-control" type="file" id="choose_image">
                                                   @error('choose_image')
                                                   <p class="text-danger">{{$message}}</p>
                                                   @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <div class="icheck-success d-inline">
                                                        <input type="checkbox" class="form-check-input me-2 cursor" name="status" id="status_edit" value="1" {{ $service->status == 1 ? 'checked': '' }}>
                                                        <label class="form-check-label cursor" for="status_edit">Status</label>
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
<!-- choose Image Show -->
<script type="text/javascript">
   $(document).ready(function(){
       $('#choose_image').change(function(e){
           var reader = new FileReader();
           reader.onload = function(e){
               $('#choose_showImage').attr('src',e.target.result);
           }
           reader.readAsDataURL(e.target.files['0']);
       });
   });
</script>
@endsection
