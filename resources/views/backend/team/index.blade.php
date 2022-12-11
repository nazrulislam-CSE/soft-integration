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
                <h3 class="card-title pl-3">Team</h3>
                <a data-toggle="modal" data-target="#viewModal" href="{{ route('team.create') }}" class="btn btn-success col-2 fileinput-button dz-clickable"><i class="fas fa-plus mr-2"></i>Add Team</a>
                <!-- modal -->
                <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-md modal-dialog-scrollable text-left">
                        <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h4 class="modal-title text-center" id="myModalLabel">Create Team</h4>
                                <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('team.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title_en">Title:</label>
                                            @error('title_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="title_en" class="form-control" id="title_en" placeholder="Write title name english">
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
                                            <label for="description_en" class=""> Description:</label>
                                            <textarea name="description_en" class="description" cols="30" rows="7" class="form-control" ></textarea>
                                            @error('description_en')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                         </div>
                                         <div class="form-group">
                                            <label for="team_name_en">Team Name:</label>
                                            @error('team_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="team_name_en" class="form-control" id="team_name_en" value="">
                                         </div>
                                         <div class="form-group">
                                            <label for="designation_en">Designation:</label>
                                            @error('designation_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="designation_en" class="form-control" id="designation_en" value="">
                                         </div>
                                        <div class="form-group">
                                            <label for="facebook">Facebook Link:</label>
                                            @error('facebook')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="facebook" class="form-control" id="facebook" placeholder="Write facebook link">
                                        </div>
                                        <div class="form-group">
                                            <label for="github">Github Link:</label>
                                            @error('github')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="github" class="form-control" id="github" placeholder="Write github link">
                                        </div>
                                        <div class="form-group">
                                            <label for="linkedin">Linkedin Link:</label>
                                            @error('linkedin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="linkedin" class="form-control" id="linkedin" placeholder="Write linkedin link">
                                        </div>
                                        <div class="form-group">
                                            <label for="instagram">Instagram Link:</label>
                                            @error('instagram')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="instagram" class="form-control" id="instagram" placeholder="Write instagram link">
                                        </div>
                                        <div class="form-group">
				                         	<img id="team_showImage" class="rounded avatar-lg team_showImage" src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.jpg') }}" alt="Card image cap" width="100px" height="80px;">
				                        </div>
				                        <div class="form-group">
				                         	<label for="team_image" class="col-form-label col-md-4" style="font-weight: bold;">Team Photo (Size:257,290):</label>
				                            <input name="team_image" class="form-control team_image" type="file" id="team_image">
				                            @error('team_image')
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
                        <th>Team Image</th>
                        <th>Team Name</th>
                        <th>Designation</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($teams as $key => $team)
                        <tr>
                            <td>{{ $key+1}}</td>
                            <td><img src="{{ asset($team->team_image) }}" width="70" height="70" alt="team"></td>
                            <td>{{ $team->team_name_en ?? 'NULL' }}</td>
                            <td>{{ $team->designation_en ?? 'NULL' }}</td>
                            <td>{{ $team->title_en ?? 'NULL' }}</td>
                            <td>
                                @if($team->status == 1)
                                  <a href="{{ route('team.in_active',['id'=>$team->id]) }}" class="btn btn-success btn-sm">Active</a>
                                @else
                                  <a href="{{ route('team.active',['id'=>$team->id]) }}" class="btn btn-danger btn-sm">Inactive</a>
                                @endif
                            </td>
                            <td class="col-2">
                                <a data-toggle="modal" data-target="#teamEdit{{ $team->id }}" href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                                <a data-toggle="modal" data-target="#delete-modal{{ $team->id }}" href="{{ route('team.delete',$team->id ) }}" id="delete" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></a>

                                <!-- Start Delete Menu Modal -->
                                <div class="modal fade" id="delete-modal{{ $team->id }}">
                                    <div class="modal-dialog">
                                      <div class="modal-content bg-primary">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Team Deleted?</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body bg-light">
                                          <p>Are you sure Team Permanently Deleted?</p>
                                        </div>
                                        <div class="modal-footer justify-content-between bg-light">
                                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                          <a type="button" href="{{ route('team.delete',['id'=>$team->id]) }}" class="btn btn-primary"><i style="margin-right: 5px; color: white;" class="fas  fa-trash"></i><span class="text-light">OK</span></a>
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                 </div>

                                <!-- Start Service Edit Modal -->
                                <div class="modal fade" id="teamEdit{{ $team->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable text-left">
                                      <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                          <h4 class="modal-title text-center" id="myModalLabel">Edit Team</h4>
                                          <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                                        </div>
                                        <div class="modal-body">
                                          <form action="{{ route('team.update',$team->id) }}" method="post"  enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="title_en">Title:</label>
                                                    @error('title_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <input type="text" name="title_en" class="form-control" id="title_en"  value="{{ $team->title_en }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="submenu_id">SubMenu Name:</label>
                                                    @error('submenu_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <select name="submenu_id" class="form-control" aria-label="Default select example">
                                                        <option value="">--Select SubMenu--</option>
                                                        @foreach ($submenus as $menu)
                                                            <option value="{{ $menu->id }}" {{ $menu->id == $team->submenu_id ? 'selected' : '' }}>{{ $menu->name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="description_en" class=""> Description</label>
                                                    <textarea name="description_en" class="description" cols="30" rows="7" class="form-control" >{{ $team->description_en }}</textarea>
                                                    @error('description_en')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                 </div>
                                                 <div class="form-group">
                                                    <label for="team_name_en">Team Name:</label>
                                                    @error('team_name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <input type="text" name="team_name_en" class="form-control" id="team_name_en" value="{{ $team->team_name_en }}">
                                                 </div>
                                                 <div class="form-group">
                                                    <label for="designation_en">Designation:</label>
                                                    @error('designation_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <input type="text" name="designation_en" class="form-control" id="designation_en" value="{{ $team->designation_en }}">
                                                 </div>
                                                <div class="form-group">
                                                    <label for="facebook">Facebook Link:</label>
                                                    @error('facebook')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <input type="text" name="facebook" class="form-control" id="facebook" value="{{ $team->facebook }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="github">Github Link:</label>
                                                    @error('github')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <input type="text" name="github" class="form-control" id="github"value="{{ $team->github }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="linkedin">Linkedin Link:</label>
                                                    @error('linkedin')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <input type="text" name="linkedin" class="form-control" id="linkedin"value="{{ $team->linkedin }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="instagram">Instagram Link:</label>
                                                    @error('instagram')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <input type="text" name="instagram" class="form-control" id="instagram" value="{{ $team->instagram }}">
                                                </div>
                                                   <div class="form-group">
        							                         	<img id="team_showImage" class="rounded avatar-lg team_showImage" src="{{ asset($team->team_image) }}" alt="Project image" width="100px" height="80px;">
        							                        </div>
        							                        <div class="form-group">
        							                         	<label for="team_image" class="col-form-label col-md-4" style="font-weight: bold;">Team Photo (Size:257,290):</label>
        							                            <input name="team_image" class="form-control team_image" type="file" id="team_image">
        							                            @error('team_image')
        					                                 <p class="text-danger">{{$message}}</p>
        					                               @enderror
        							                        </div>
			                                        <div class="mb-4">
			                                            <div class="icheck-success d-inline">
                                                            <input type="checkbox" class="form-check-input me-2 cursor" name="status" id="status_edit" value="1" {{ $team->status == 1 ? 'checked': '' }}>
                                                            <label class="form-check-label cursor" for="status_edit">Status</label>
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
        $('.team_image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('.team_showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
