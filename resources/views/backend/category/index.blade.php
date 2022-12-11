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
             <div class="d-flex justify-content-between align-categorys-center" style="padding:15px">
                <h3 class="card-title pl-3">Category</h3>
                <a data-toggle="modal" data-target="#viewModal" href="{{ route('category.create') }}" class="btn btn-success col-2 fileinput-button dz-clickable"><i class="fas fa-plus mr-2"></i>Add category</a>
                <!-- modal -->
                <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-md modal-dialog-scrollable text-left">
                        <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h4 class="modal-title text-center" id="myModalLabel">Create Category</h4>
                                <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                            </div>
                            <div class="modal-body">
                                <form  method="post" action="{{ route('category.store') }}">
                                    @csrf
                                        <div class="form-group">
                                            <h5>Category Name English<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                               <input type="text"  name="category_name_en" class="form-control"  value="">
                                            </div>
                                         </div>
                                         @error('category_name_en')
                                            <p class="text-danger">{{ $message }}</p>
                                         @enderror
                                        <div class="form-group">
                                            <h5>Category Name Bangla<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                               <input type="text"  name="category_name_bn" class="form-control"  value="">
                                            </div>
                                         </div>
                                         @error('category_name_bn')
                                         <p class="text-danger">{{ $message }}</p>
                                         @enderror

                                         <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add">
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
                        <th>Category En</th>
                        <th>Category Bn</th>
                        <th>Action</th>

                      </tr>
                  </thead>
                  <tbody>
                    @foreach($category as $key => $category)
                        <tr>
                            <td>{{  $loop->iteration }}</td>
                            <td>{{ $category->category_name_en }}</td>
                            <td>{{ $category->category_name_bn }}</td>
                            <td>
                                @if($category->status == 1)
                                  <a href="{{ route('category.in_active',['id'=>$category->id]) }}" class="btn btn-success btn-sm">Active</a>
                                @else
                                  <a href="{{ route('category.active',['id'=>$category->id]) }}" class="btn btn-danger btn-sm">Inactive</a>
                                @endif
                            </td>
                            <td class="col-2">
                                <a data-toggle="modal" data-target="#categoryEdit{{ $category->id }}" href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                                <a data-toggle="modal" data-target="#delete-modal{{ $category->id }}" href="{{ route('category.delete',$category->id ) }}" id="delete" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></a>

                                <!-- Start Delete Menu Modal -->
                                <div class="modal fade" id="delete-modal{{ $category->id }}">
                                    <div class="modal-dialog">
                                      <div class="modal-content bg-primary">
                                        <div class="modal-header">
                                          <h4 class="modal-title">category Deleted?</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body bg-light">
                                          <p>Are you sure category Permanently Deleted?</p>
                                        </div>
                                        <div class="modal-footer justify-content-between bg-light">
                                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                          <a type="button" href="{{ route('category.delete',['id'=>$category->id]) }}" class="btn btn-primary"><i style="margin-right: 5px; color: white;" class="fas  fa-trash"></i><span class="text-light">OK</span></a>
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                 </div>

                                <!-- Start category Edit Modal -->
                                <div class="modal fade" id="categoryEdit{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable text-left">
                                      <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                          <h4 class="modal-title text-center" id="myModalLabel">Edit category</h4>
                                          <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                                        </div>
                                       <div class="modal-body">
                                        <form  method="post" action="{{ route('category.update',['id'=>$category->id]) }}" >
                                            @csrf
                                            <div class="form-group">
                                               <h5>Category Name English<span class="text-danger">*</span></h5>
                                               <div class="controls">
                                                  <input type="text"  name="category_name_en" class="form-control"  value="{{ $category->category_name_en }}">
                                               </div>
                                            </div>
                                            @error('category_name_en')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <div class="form-group">
                                               <h5>Category Name Bangla<span class="text-danger">*</span></h5>
                                               <div class="controls">
                                                  <input type="text"  name="category_name_bn" class="form-control"  value="{{ $category->category_name_bn }}">
                                               </div>
                                            </div>
                                            @error('category_name_bn')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                            <div class="text-xs-right">
                                               <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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

<!-- category Image Show -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#category_image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#category_showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
