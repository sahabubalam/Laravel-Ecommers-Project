@extends('admin.admin')
@section('admin_content')
<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Brand Table </h3>
              </div>

            
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Brand List
                      
                    </h2>
                   
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box">

<form method="post" action="{{url('update/brand/'.$brand->id)}}" enctype="multipart/form-data">
      @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>Brand Name</label>
            <input type="text" class="form-control"  value="{{$brand->brand_name}}" name="brand_name">
          
          </div>
          <div class="form-group">
            <label>Brand Logo</label>
            <input type="file" class="form-control"   name="brand_logo">
          
          </div>
          <div class="form-group">
            
            <input type="hidden" class="form-control"   name="old_logo" value="{{$brand->brand_logo}}">
          
          </div>
        
        </div>
      
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update</button>
          
         
        </div>
      </form>
                    
                  
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>

             


@endsection