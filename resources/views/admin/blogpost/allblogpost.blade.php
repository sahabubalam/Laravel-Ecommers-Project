@extends('admin.admin')
@section('admin_content')
<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Blog Post Table </h3>
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
                    <h2>Blog Post List
                      
                    </h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th width="5%">ID</th>
                          <!--<th width="5%">Category ID</th>-->
                          <th width="10%">Category Name</th>
                          <th width="15%">BlogPost Title Bangla</th>
                          <th width="20%">BlogPost Title English</th>
                          <th width="5%">BlogPost Image</th>
                          
                          <th width="20%" >BlogPost Details English</th>
                          <th width="10%">BlogPost Details Bangla</th>
                          
                          <th width="10%">Action</th>
                         
                        </tr>
                      </thead>

                  
                      <tbody>
                      @foreach($allblog as $row)
                        <tr>
                          <td>{{$row->id}}</td>
                         <!--<td>{{$row->category_id}}</td>-->
                          <td>{{$row->category_name}}</td>
                          <td>{{$row->post_title_eng}}</td>
                          <td>{{$row->post_title_bng}}</td>
                          <td><img src="{{URL::to($row->post_image)}}" height="70px" width="80px;"></td>
                          <td>{{$row->post_details_eng}}</td>
                          <td>{{$row->post_details_bng}}</td>
                          <td>
                            <a href="{{URL::to('edit/blogpost/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{URL::to('delete/blogpost/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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

  



@endsection