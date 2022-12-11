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
                <h3 class="card-title pl-3">Services 
                    <span class="badge rounded-pill alert-danger"> {{ count($services) }} </span>
                </h3>
                <a data-toggle="modal" data-target="#viewModal" href="{{ route('services.create') }}" class="btn btn-success col-2 fileinput-button dz-clickable"><i class="fas fa-plus mr-2"></i>Add Services</a>
                <!-- modal -->
                <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-md modal-dialog-scrollable text-left">
                        <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h4 class="modal-title text-center" id="myModalLabel">Create Services</h4>
                                <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('services.store') }}" method="post" enctype="multipart/form-data">
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
                                            @error('title_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="title_en" class="form-control" id="title_en" placeholder="Write title name english">
                                        </div>
                                        <div class="form-group">
                                            <label for="service_name_en">Sevice Name:</label>
                                            @error('service_name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="service_name_en" class="form-control" id="service_name_en" placeholder="Write service name english">
                                        </div>
                                        <div class="form-group">
                                            <label for="menu_id">Menu Name:</label>
                                            @error('menu_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <select name="menu_id" class="form-control" aria-label="Default select example">
                                                <option value="">--Select Menu--</option>
                                                @foreach ($menus as $menu)
                                                    <option value="{{ $menu->id }}">{{ $menu->name_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="submenu_id">SubMenu Name:</label>
                                            @error('submenu_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <select name="submenu_id" class="form-control" aria-label="Default select example">
                                                <option value="">--Select SubMenu--</option>
                                                @foreach ($submenus as $menu)
                                                    <option value="{{ $menu->id }}">{{ $menu->name_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="services_btn_en">Services Button Name:</label>
                                            @error('service_button_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="service_button_en" class="form-control" id="service_button_en" placeholder="Write service button name english">
                                        </div>
                                        <div class="form-group">
                                            <label for="service_description_en">Service Description:</label>
                                            @error('service_description_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <textarea name="service_description_en" class="form-control description" id="service_description_en" rows="3" cols="5"></textarea>
                                        </div>
                                        <div class="form-group">
				                         	<img id="services_showImage" class="rounded avatar-lg services_showImage" src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.jpg') }}" alt="Card image cap" width="100px" height="80px;">
				                        </div>
				                        <div class="form-group">
				                         	<label for="service_image" class="col-form-label col-md-4" style="font-weight: bold;">Service Photo (Size:304,204):</label>
				                            <input name="service_image" class="form-control services_image" type="file" id="service_image">
				                            @error('service_image')
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
                <table id="example1" class="table table-bordered table-hover table-striped table-responsive">
                  <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Menu</th>
                        <th>Submenu</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($services as $key => $service)
                        <tr>
                            <td>{{ $key+1}}</td>
                            <td>
                                <img src="{{ asset($service->service_image) }}" width="70" height="70" alt="slider">
                            </td>
                            <td>{{ $service->name_en ?? 'NULL' }}</td>
                            <td>{{ $service->menu->name_en ?? 'NULL' }}</td>
                            <td>{{ $service->submenu->name_en ?? 'NULL' }}</td>
                            <td>{{ $service->title_en ?? 'NULL' }}</td>
                            <td>
                                @if($service->status == 1)
                                  <a href="{{ route('services.in_active',['id'=>$service->id]) }}" class="btn btn-success btn-sm">Active</a>
                                @else
                                  <a href="{{ route('services.active',['id'=>$service->id]) }}" class="btn btn-danger btn-sm">Inactive</a>
                                @endif
                            </td>
                            <td class="col-2">
                                <a data-toggle="modal" data-target="#servicesEdit{{ $service->id }}" href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                                <a data-toggle="modal" data-target="#delete-modal{{ $service->id }}" href="{{ route('services.delete',$service->id ) }}" id="delete" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></a>

                                <!-- Start Delete Menu Modal -->
                                <div class="modal fade" id="delete-modal{{ $service->id }}">
                                    <div class="modal-dialog">
                                      <div class="modal-content bg-primary">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Services Deleted?</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body bg-light">
                                          <p>Are you sure Services Permanently Deleted?</p>
                                        </div>
                                        <div class="modal-footer justify-content-between bg-light">
                                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                          <a type="button" href="{{ route('services.delete',['id'=>$service->id]) }}" class="btn btn-primary"><i style="margin-right: 5px; color: white;" class="fas  fa-trash"></i><span class="text-light">OK</span></a>
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                 </div>

                                <!-- Start Service Edit Modal -->
                                <div class="modal fade" id="servicesEdit{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable text-left">
                                      <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                          <h4 class="modal-title text-center" id="myModalLabel">Edit Services</h4>
                                          <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                                        </div>
                                       <div class="modal-body">
                                            <form action="{{ route('services.update',$service->id) }}" method="post"  enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="name_en">Name:</label>
                                                        @error('name_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <input type="text" name="name_en" class="form-control" id="name_en" placeholder="Write name english" value="{{ $service->name_en }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title_en">Title:</label>
                                                        @error('title_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <input type="text" name="title_en" class="form-control" id="title_en" placeholder="Write title name english" value="{{ $service->title_en }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="service_name_en">Sevice Name:</label>
                                                        @error('service_name_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <input type="text" name="service_name_en" class="form-control" id="service_name_en" placeholder="Write service name english" value="{{ $service->service_name_en }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="menu_id">Menu Name:</label>
                                                        @error('menu_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <select name="menu_id" class="form-control" aria-label="Default select example">
                                                            <option value="">--Select Menu--</option>
                                                            @foreach ($menus as $menu)
                                                                <option value="{{ $menu->id }}" {{ $menu->id == $service->menu_id ? 'selected' : '' }}>{{ $menu->name_en }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="submenu_id">SubMenu Name:</label>
                                                        @error('submenu_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <select name="submenu_id" class="form-control" aria-label="Default select example">
                                                            <option value="">--Select SubMenu--</option>
                                                            @foreach ($submenus as $menu)
                                                                <option value="{{ $menu->id }}" {{ $menu->id == $service->menu_id ? 'selected' : '' }}>{{ $menu->name_en }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="services_btn_en">Services Button Name:</label>
                                                        @error('service_button_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <input type="text" name="service_button_en" class="form-control" id="service_button_en" placeholder="Write service button name english" value="{{ $service->service_button_en }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="service_description_en">Service Description:</label>
                                                        @error('service_description_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <textarea name="service_description_en" class="form-control" id="service_description_en" rows="3" cols="5">{{ $service->service_description_en }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <img id="services_showImage" class="rounded avatar-lg services_showImage" src="{{ asset($service->service_image) }}" alt="Card image cap" width="100px" height="80px;">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="service_image" class="col-form-label col-md-4" style="font-weight: bold;">Service Photo (Size:304,204):</label>
                                                        <input name="service_image" class="form-control services_image" type="file" id="service_image">
                                                        @error('service_image')
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
                                                        <input type="submit" class="btn btn-success btn-rounded" value="Update Now">
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

<!-- Services Image Show -->
<script type="text/javascript">
    $(document).ready(function(){
        $('.services_image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('.services_showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection