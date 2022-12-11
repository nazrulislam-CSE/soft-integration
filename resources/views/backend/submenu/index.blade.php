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
                <h3 class="card-title pl-3">SubMenu</h3>
                <a data-toggle="modal" data-target="#viewModal" href="{{ route('menu.create') }}" class="btn btn-success col-2 fileinput-button dz-clickable"><i class="fas fa-plus mr-2"></i>Add SubMenu</a>
                <!-- modal -->
                <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-scrollable text-left">
                        <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h4 class="modal-title text-center" id="myModalLabel">Create SubMenu</h4>
                                <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('submenu.store') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                      <div class="form-group">
                                          <label for="menu_id" class="col-form-label" style="font-weight: bold;"> Menu Name:</label>
                                            <div class="custom_select">
                                                <select class="form-control select-active w-100 form-select select-nice" name="menu_id">
                                                  <option value="">Please Select Menu</option>
                                                  @foreach($menus as $menu)
                                                    <option value="{{ $menu->id }}">{{ $menu->name_en }}</option>
                                                  @endforeach
                                                </select>
                                                @error('menu_id')
                                                  <p class="text-danger">{{$message}}</p>
                                              @enderror
                                             </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name_en">SubMenu:</label>
                                            @error('name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="name_en" class="form-control" id="name_en" placeholder="Write menu name english">
                                        </div>
                                        <div class="mb-4">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" class="form-check-input me-2 cursor" name="status" id="status" checked value="1">
                                                <label class="form-check-label cursor" for="status">Status</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4 justify-content-sm-end">
                                            <div class="col-lg-3 col-md-4 col-sm-5 col-6">
                                                <input type="submit" class="btn btn-success btn-rounded" value="Add Now">
                                            </div>
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
                        <th>Menu Name</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($submenus as $key => $menu)
                        <tr>
                            <td>{{ $key+1}}</td>
                            <td>{{ $menu->menu->name_en ?? 'NULL' }}</td>
                            <td>{{ $menu->name_en ?? 'NULL' }}</td>
                            <td>
                                @if($menu->status == 1)
                                  <a href="{{ route('submenu.in_active',['id'=>$menu->id]) }}" class="btn btn-success btn-sm">Active</a>
                                @else
                                  <a href="{{ route('submenu.active',['id'=>$menu->id]) }}" class="btn btn-danger btn-sm">Inactive</a>
                                @endif
                            </td>
                            <td>
                                <a data-toggle="modal" data-target="#submenuEdit{{ $menu->id }}" href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                                <a data-toggle="modal" data-target="#delete-modal{{ $menu->id }}" href="{{ route('menu.delete',$menu->id ) }}" id="delete" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></a>

                                <!-- Start Delete Menu Modal -->
                                <div class="modal fade" id="delete-modal{{ $menu->id }}">
                                    <div class="modal-dialog">
                                      <div class="modal-content bg-primary">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Menu Deleted?</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body bg-light">
                                          <p>Are you sure menu Permanently Deleted?</p>
                                        </div>
                                        <div class="modal-footer justify-content-between bg-light">
                                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                          <a type="button" href="{{ route('submenu.delete',['id'=>$menu->id]) }}" class="btn btn-primary"><i style="margin-right: 5px; color: white;" class="fas  fa-trash"></i><span class="text-light">OK</span></a>
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                 </div>

                                <!-- Start Menu Edit Modal -->
                                <div class="modal fade" id="submenuEdit{{ $menu->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable text-left">
                                      <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                          <h4 class="modal-title text-center" id="myModalLabel">Edit Menu</h4>
                                          <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                                        </div>
                                       <div class="modal-body">
                                            <form action="{{ route('submenu.update',$menu->id) }}" method="post">
                                                @csrf
                                                <div class="card-body">
                                                  <div class="form-group">
                                                      <label for="menu_id" class="col-form-label" style="font-weight: bold;"> Menu Name:</label>
                                                        <div class="custom_select">
                                                            <select class="form-control select-active w-100 form-select select-nice" name="menu_id">
                                                              <option value="">Please Select Menu</option>
                                                              @foreach($menus as $menu)
                                                                <option value="{{ $menu->id }}"  @if($menu->id==$menu->menu_id) selected  @endif>{{ $menu->name_en }} </option>
                                                              @endforeach
                                                            </select>
                                                            @error('menu_id')
                                                              <p class="text-danger">{{$message}}</p>
                                                          @enderror
                                                         </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name_en">SubMenu:</label>
                                                        @error('name_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <input type="text" name="name_en" class="form-control" id="name_en" placeholder="Write submenu name english" value="{{ $menu->menu->name_en ?? 'Null' }}">
                                                    </div>
                                                    <div class="mb-4">
                                                        <div class="icheck-success d-inline">
                                                            <input type="checkbox" class="form-check-input me-2 cursor" name="status" id="status_edit" value="1" {{ $menu->status == 1 ? 'checked': '' }}>
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
@endsection