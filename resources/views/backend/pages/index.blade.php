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
                <h3 class="card-title pl-3">Pages</h3>
                <a data-toggle="modal" data-target="#viewModal" href="{{ route('menu.create') }}" class="btn btn-success col-2 fileinput-button dz-clickable"><i class="fas fa-plus mr-2"></i>Add Page</a>
                <!-- modal -->
                <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-md modal-dialog-scrollable text-left">
                        <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h4 class="modal-title text-center" id="myModalLabel">Create Page</h4>
                                <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('page.store') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name_en">Page:</label>
                                            @error('name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="name_en" class="form-control" id="name_en" placeholder="Write page name english">
                                        </div>
                                        <div class="form-group">
                                            <label for="title_en">Title:</label>
                                            @error('title_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="title_en" class="form-control" id="title_en" placeholder="Write title name english">
                                        </div>
                                        <div class="form-group">
                                            <label for="description_en">Description:</label>
                                            @error('description_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <textarea name="description_en" class="form-control description" id="description_en" rows="3" cols="5">
                                            	
                                            </textarea>
                                        </div>
                                        <div class="mb-4">
        				                        	<label for="position" class="col-form-label" style="font-weight: bold;"> Position:</label>
        				                            <div class="custom_select">
      			                                    <select class="form-control select-active w-100 form-select select-nice" name="position">
      			                                        <option value="Nav">Nav</option>
      			                                        <option value="Bottom">Bottom</option>
      			                                        <option value="Both">Both</option>
      			                                    </select>
      			                                    @error('position')
      				                                    <p class="text-danger">{{$message}}</p>
      				                                @enderror
        			                               </div>
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
                        <th>Name</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($pages as $key => $page)
                        <tr>
                            <td>{{ $key+1}}</td>
                            <td>{{ $page->name_en ?? 'NULL' }}</td>
                            <td>{{ $page->title_en ?? 'NULL' }}</td>
                            <td>
                            	<?php $des =  strip_tags(html_entity_decode($page->description_en))?>
                                {{ Str::limit($des, $limit = 10, $end = '. . .') }}

                                <a data-toggle="modal" data-target="#descriptionEnModal{{ $page->id }}" href="#" class="btn btn-danger btn-sm">Details</a>

                                <!-- Scrollable modal -->
                                <div class="modal fade" id="descriptionEnModal{{ $page->id }}">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                      <div class="modal-content bg-primary">
                                        <div class="modal-header">
                                        	<h4 class="modal-title text-center" id="myModalLabel">{{ $page->title_en }}</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body bg-light">
                                          <p>{!! $page->description_en !!}</p>
                                        </div>
                                        <div class="modal-footer justify-content-between bg-light">
                                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                </div>
                            </td>
                            <td>{{ $page->position ?? 'NULL' }}</td>
                            <td>
                                @if($page->status == 1)
                                  <a href="{{ route('page.in_active',['id'=>$page->id]) }}" class="btn btn-success btn-sm">Active</a>
                                @else
                                  <a href="{{ route('page.active',['id'=>$page->id]) }}" class="btn btn-danger btn-sm">Inactive</a>
                                @endif
                            </td>
                            <td class="col-2">
                                <a data-toggle="modal" data-target="#pageEdit{{ $page->id }}" href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                                <a data-toggle="modal" data-target="#delete-modal{{ $page->id }}" href="{{ route('page.delete',$page->id ) }}" id="delete" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></a>

                                <!-- Start Delete Page Modal -->
                                <div class="modal fade" id="delete-modal{{ $page->id }}">
                                    <div class="modal-dialog">
                                      <div class="modal-content bg-primary">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Page Deleted?</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body bg-light">
                                          <p>Are you sure page Permanently Deleted?</p>
                                        </div>
                                        <div class="modal-footer justify-content-between bg-light">
                                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                          <a type="button" href="{{ route('page.delete',['id'=>$page->id]) }}" class="btn btn-primary"><i style="margin-right: 5px; color: white;" class="fas  fa-trash"></i><span class="text-light">OK</span></a>
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                 </div>

                                <!-- Start Page Edit Modal -->
                                <div class="modal fade" id="pageEdit{{ $page->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable text-left">
                                      <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                          <h4 class="modal-title text-center" id="myModalLabel">Edit Page</h4>
                                          <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                                        </div>
                                       	<div class="modal-body">
                                            <form action="{{ route('page.update',$page->id) }}" method="post">
                                                @csrf
                                                <div class="card-body">
                                                    <div class="form-group">
			                                            <label for="name_en">Page:</label>
			                                            @error('name_en')
			                                                <span class="text-danger">{{ $message }}</span>
			                                            @enderror
			                                            <input type="text" name="name_en" class="form-control" id="name_en" placeholder="Write page name english" value="{{ $page->name_en }}">
			                                        </div>
			                                        <div class="form-group">
			                                            <label for="title_en">Title:</label>
			                                            @error('title_en')
			                                                <span class="text-danger">{{ $message }}</span>
			                                            @enderror
			                                            <input type="text" name="title_en" class="form-control" id="title_en" placeholder="Write title name english" value="{{ $page->title_en }}">
			                                        </div>
			                                        <div class="form-group">
			                                            <label for="description_en">Description:</label>
			                                            @error('description_en')
			                                                <span class="text-danger">{{ $message }}</span>
			                                            @enderror
			                                            <textarea name="description_en" class="form-control description" id="description_en" rows="3" cols="5">{{ $page->description_en }}</textarea>
			                                        </div>
			                                        <div class="mb-4">
        							                        	<label for="position" class="col-form-label" style="font-weight: bold;"> Position:</label>
        							                            <div class="custom_select">
        						                                    <select class="form-control select-active w-100" name="position">
        						                                        <option value="Nav" @if($page->position == "Nav") selected @endif>Nav</option>
        						                                        <option value="Bottom" @if($page->position == "Bottom") selected @endif>Bottom</option>
        						                                        <option value="Both" @if($page->position == "Both") selected @endif>Both</option>
        						                                    </select>
        						                                    @error('position')
        						                                        <p class="text-danger">{{$message}}</p>
        						                                    @enderror
        					                                    </div>
        							                        </div>
                                                    <div class="mb-4">
                                                        <div class="icheck-success d-inline">
                                                            <input type="checkbox" class="form-check-input me-2 cursor" name="status" id="status_edit" value="1" {{ $page->status == 1 ? 'checked': '' }}>
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
@endsection