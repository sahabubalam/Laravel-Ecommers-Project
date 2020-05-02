@extends('admin.admin')
@section('admin_content')
<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>category Table </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Category List
                      
                    </h2>
                    <a href="#" class="btn btn-warning" style="float:right;" data-toggle="modal" data-target="#exampleModal">Add New</a>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Category Name</th>
                          <th>Action</th>
                         
                        </tr>
                      </thead>

                  
                      <tbody>
                      @foreach($category as $row)
                        <tr>
                          <td>{{$row->id}}</td>
                          <td>{{$row->category_name}}</td>
                          <td>
                            <a href="{{URL::to('edit/category/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{URL::to('delete/category/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                          </td>
                          
                        </tr>
                        
         
                        @endforeach
                      </tbody>
                     
                    </table>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>

             
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
       
      </div>
      <form method="post" action="{{route('store.category')}}">
      @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>Category Name</label>
            <input type="text" class="form-control" placeholder="Category" name="category_name">
          
          </div>
        
        </div>
      
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         
        </div>
      </form>
    </div>
  </div>
</div>



@endsection