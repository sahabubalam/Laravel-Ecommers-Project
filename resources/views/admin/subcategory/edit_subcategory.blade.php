@extends('admin.admin')
@section('admin_content')
<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>category Table </h3>
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
                   
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box">

<form method="post" action="{{url('update/subcategory/'.$subcategory->id)}}">
      @csrf
        <div class="modal-body">
        
          <div class="form-group">
            <label>Subcategory Name</label>
            <input type="text" class="form-control"  value="{{$subcategory->subcategory_name}}" name="subcategory_name">
          
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