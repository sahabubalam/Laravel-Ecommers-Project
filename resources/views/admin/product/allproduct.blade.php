@extends('admin.admin')
@section('admin_content')
<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Product Table </h3>
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
                    <h2>Product List
                      
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
                          <th width="13%">Category Name</th>
                          <th width="13%">Subcategory Name</th>
                          <th width="10%">Brand Name</th>
                          <th width="10%">Product Name</th>
                          
                          <th width="10%" >Product Code</th>
                          <th width="5%">Quantity</th>
                          <th width="6%">price</th>
                          <th width="12%">Product image</th>
                          <th width="5%">Product status</th>
                          
                          <th width="11%">Action</th>
                         
                        </tr>
                      </thead>

                  
                      <tbody>
                      @foreach($product as $row)
                        <tr>
                          <td>{{$row->id}}</td>
                         <!--<td>{{$row->category_id}}</td>-->
                          <td>{{$row->category_name}}</td>
                          <td>{{$row->subcategory_name}}</td>
                          <td>{{$row->brand_name}}</td>
                          <td>{{$row->product_name}}</td>
                         
                          <td>{{$row->product_code}}</td>
                          <td>{{$row->product_quantity}}</td>
                          <td>{{$row->price}}</td>
                          <td><img src="{{URL::to($row->product_image)}}" height="70px" width="80px;"></td>
                          <td>{{$row->status}}</td>
                          
                          <td>
                            <a href="{{URL::to('edit/product/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{URL::to('delete/product/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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