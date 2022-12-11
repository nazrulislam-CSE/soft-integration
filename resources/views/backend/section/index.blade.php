@extends('layouts.app2')
@section('content')
<div class="content-wrapper">
    <!-- Main content -->
  <div class="content">
    <div class="container-fluied">
      <div class="row mt-3">
       <div class="col-12">
           <div class="card py-3">
             <div class="d-flex justify-content-between align-items-center" style="padding:15px">
                <h3 class="card-title pl-3">Section</h3>
                <a data-toggle="modal" data-target="#viewModal" href="{{ route('menu.create') }}" class="btn btn-success col-2 fileinput-button dz-clickable"><i class="fas fa-plus mr-2"></i>Add Section</a>
                <!-- modal -->
                <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable text-left">
                        <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h4 class="modal-title text-center" id="myModalLabel">Create Section</h4>
                                <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('section.store') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name_en">Name En:</label>
                                            @error('name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="name_en" class="form-control" id="name_en" placeholder="Write section name english">
                                        </div>
                                        <div class="form-group">
                                            <label for="name_bn">Name Bn:</label>
                                            @error('name_bn')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="name_bn" class="form-control" id="name_bn" placeholder="Write section name bangla">
                                        </div>
                                        <div class="form-group">
                                            <label for="title_en">Title En:</label>
                                            @error('title_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="title_en" class="form-control" id="title_en" placeholder="Write section title english">
                                        </div>
                                        <div class="form-group">
                                            <label for="title_bn">Title Bn:</label>
                                            @error('title_bn')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="title_bn" class="form-control" id="title_bn" placeholder="Write section title bangla">
                                        </div>
                                        <div class="form-group">
                                            <label for="button_name_en">Button En:</label>
                                            @error('button_name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="button_name_en" class="form-control" id="button_name_en" placeholder="Write button name english">
                                        </div>
                                        <div class="form-group">
                                            <label for="button_name_bn">Button Bn:</label>
                                            @error('button_name_bn')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="button_name_bn" class="form-control" id="button_name_bn" placeholder="Write button name bangla">
                                        </div>
                                        <div class="form-group">
                                            <label for="description_en">Description En:</label>
                                            @error('description_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <textarea name="description_en" class="form-control" id="description_en" rows="3" cols="5">
                                            	
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="description_bn">Description Bn:</label>
                                            @error('description_bn')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <textarea name="description_bn" class="form-control" id="description_bn" rows="3" cols="5">
                                            	
                                            </textarea>
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
                        <th>Name (En)</th>
                        <th>Name (Bn)</th>
                        <th>Title (En)</th>
                        <th>Title (Bn)</th>
                        <th>Description (En)</th>
                        <th>Description (Bn)</th>
                        <th>Status</th>
                        <th colspan="2">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($sections as $key => $section)
                        <tr>
                            <td>{{ $key+1}}</td>
                            <td>{{ $section->name_en ?? 'NULL' }}</td>
                            <td>{{ $section->name_bn ?? 'NULL' }}</td>
                            <td>{{ $section->title_en ?? 'NULL' }}</td>
                            <td>{{ $section->title_bn ?? 'NULL' }}</td>
                            <td>{{ $section->description_en ?? 'NULL' }}</td>
                            <td>{{ $section->description_bn ?? 'NULL' }}</td>
                            <td>
                                @if($section->status == 1)
                                  <a href="{{ route('section.in_active',['id'=>$section->id]) }}" class="btn btn-success btn-sm">Active</a>
                                @else
                                  <a href="{{ route('section.active',['id'=>$section->id]) }}" class="btn btn-danger btn-sm">Inactive</a>
                                @endif
                            </td>
                            <td class="col-2">
                                <a data-toggle="modal" data-target="#sectionEdit{{ $section->id }}" href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                                <a data-toggle="modal" data-target="#delete-modal{{ $section->id }}" href="{{ route('section.delete',$section->id ) }}" id="delete" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></a>

                                <!-- Start Delete Section Modal -->
                                <div class="modal fade" id="delete-modal{{ $section->id }}">
                                    <div class="modal-dialog">
                                      <div class="modal-content bg-primary">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Section Deleted?</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body bg-light">
                                          <p>Are you sure Section Permanently Deleted?</p>
                                        </div>
                                        <div class="modal-footer justify-content-between bg-light">
                                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                          <a type="button" href="{{ route('section.delete',['id'=>$section->id]) }}" class="btn btn-primary"><i style="margin-right: 5px; color: white;" class="fas  fa-trash"></i><span class="text-light">OK</span></a>
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                 </div>

                                <!-- Start Section Edit Modal -->
                                <div class="modal fade" id="sectionEdit{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable text-left">
                                      <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                          <h4 class="modal-title text-center" id="myModalLabel">Edit Section</h4>
                                          <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                                        </div>                                  
                                        <div class="modal-body">
			                                <form action="{{ route('section.update',$section->id) }}" method="post">
			                                    @csrf
			                                    <div class="card-body">
			                                        <div class="form-group">
			                                            <label for="name_en">Name En:</label>
			                                            @error('name_en')
			                                                <span class="text-danger">{{ $message }}</span>
			                                            @enderror
			                                            <input type="text" name="name_en" class="form-control" id="name_en" placeholder="Write section name english" value="{{ $section->name_en }}">
			                                        </div>
			                                        <div class="form-group">
			                                            <label for="name_bn">Name Bn:</label>
			                                            @error('name_bn')
			                                                <span class="text-danger">{{ $message }}</span>
			                                            @enderror
			                                            <input type="text" name="name_bn" class="form-control" id="name_bn" placeholder="Write section name bangla" value="{{ $section->name_bn }}">
			                                        </div>
			                                        <div class="form-group">
			                                            <label for="title_en">Title En:</label>
			                                            @error('title_en')
			                                                <span class="text-danger">{{ $message }}</span>
			                                            @enderror
			                                            <input type="text" name="title_en" class="form-control" id="title_en" placeholder="Write section title english" value="{{ $section->title_en }}">
			                                        </div>
			                                        <div class="form-group">
			                                            <label for="title_bn">Title Bn:</label>
			                                            @error('title_bn')
			                                                <span class="text-danger">{{ $message }}</span>
			                                            @enderror
			                                            <input type="text" name="title_bn" class="form-control" id="title_bn" placeholder="Write section title bangla" value="{{ $section->title_bn }}">
			                                        </div>
			                                        <div class="form-group">
			                                            <label for="button_name_en">Button En:</label>
			                                            @error('button_name_en')
			                                                <span class="text-danger">{{ $message }}</span>
			                                            @enderror
			                                            <input type="text" name="button_name_en" class="form-control" id="button_name_en" placeholder="Write button name english" value="{{ $section->button_name_en }}">
			                                        </div>
			                                        <div class="form-group">
			                                            <label for="button_name_bn">Button Bn:</label>
			                                            @error('button_name_bn')
			                                                <span class="text-danger">{{ $message }}</span>
			                                            @enderror
			                                            <input type="text" name="button_name_bn" class="form-control" id="button_name_bn" placeholder="Write button name bangla" value="{{ $section->button_name_bn}}">
			                                        </div>
			                                        <div class="form-group">
			                                            <label for="description_en">Description En:</label>
			                                            @error('description_en')
			                                                <span class="text-danger">{{ $message }}</span>
			                                            @enderror
			                                            <textarea name="description_en" class="form-control" id="description_en" rows="3" cols="5">{{ $section->description_en }}
			                                            </textarea>
			                                        </div>
			                                        <div class="form-group">
			                                            <label for="description_bn">Description Bn:</label>
			                                            @error('description_bn')
			                                                <span class="text-danger">{{ $message }}</span>
			                                            @enderror
			                                            <textarea name="description_bn" class="form-control" id="description_bn" rows="3" cols="5">{{ $section->description_bn }}
			                                            </textarea>
			                                        </div>
			                                        <div class="mb-4">
			                                            <div class="icheck-success d-inline">
			                                                <input type="checkbox" class="form-check-input me-2 cursor" name="status" id="status"  value="1" {{ $section->status == 1 ? 'checked': '' }}>
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
@endsection