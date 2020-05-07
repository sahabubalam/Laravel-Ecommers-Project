@extends('admin.admin')
@section('admin_content')
<!--Show validation error-->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 <!-- page content -->
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form Elements</h3>
              </div>

              
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  
                  <div class="x_content">
                    <br />

                <form class="form-horizontal form-label-left" method="post" action="{{url('update/product/'.$product->id)}}" enctype="multipart/form-data">
                    @csrf

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Category Name
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                        <select class ="form-control" name="category_id">
                            @foreach($category as $row)
                                <option value="{{$row->id}}"
                                <?php if($row->id==$product->category_id) echo "selected"; ?>
                                >{{$row->category_name}}</option>
                            
                            @endforeach
                         </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Subcategory Name 
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                        <select class ="form-control" name="subcategory_id">
                            @foreach($subcategory as $row)
                                <option value="{{$row->id}}"
                                <?php if($row->id==$product->subcategory_id) echo "selected"; ?>
                                >{{$row->subcategory_name}}</option>
                            
                            @endforeach
                         </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Brand Name 
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                        <select class ="form-control" name="brand_id">
                            @foreach($brand as $row)
                                <option value="{{$row->id}}"
                                <?php if($row->id==$product->brand_id) echo "selected" ?>
                                >{{$row->brand_name}}</option>
                            
                            @endforeach
                         </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Product Name 
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="product_name" class="form-control" value="{{$product->product_name}}">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Product Image
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="file" name="product_image" class="form-control" >
                        </div>
                      </div>
                      <!--hidden for old image-->
                      <div class="item form-group">
                        
                        <div class="col-md-6 col-sm-6 ">
                          <input type="hidden" name="old_image" class="form-control" value="{{$product->product_image}}" >
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Product Code
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="integer"  name="product_code"  class="form-control" value="{{$product->product_code}}">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Product Quantity
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                        <input type="integer" name="product_quantity" class="form-control" value="{{$product->product_quantity}}">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Product Price
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                        <input type="integer" name="product_quantity" class="form-control" value="{{$product->price}}">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Status</label>
                        <div class="col-md-6 col-sm-6 ">
                        <select class ="form-control" name="status" value="{{$product->status}}">            
                            <option>0</option>
                            <option>1</option>               
                         </select>
                        </div>
                      </div>
          
                    
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                 </form>
                  </div>
                </div>
              </div>
            </div>
@endsection