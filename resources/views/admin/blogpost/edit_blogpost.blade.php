@extends('admin.admin')
@section('admin_content')

@php
$category=DB::table('categories')->get();

@endphp
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

                    <form class="form-horizontal form-label-left" method="post" action="{{url('update/blogpost/'.$editblog->id)}}" enctype="multipart/form-data">
                    @csrf

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Category Id 
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                        <select class ="form-control" name="category_id">
                            @foreach($category as $row)
                                <option value="{{$row->id}}"
                                <?php if($row->id==$editblog->category_id){
                                    echo "selected";
                                } ?>
                                >{{$row->category_name}}</option>
                            
                            @endforeach
                         </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Post Title English 
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="post_title_eng" class="form-control" value="{{$editblog->post_title_eng}}">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Post Title Bangla 
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="post_title_bng" class="form-control" value="{{$editblog->post_title_bng}}">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Post Image 
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="file"  name="post_image"  class="form-control">
                        </div>
                      </div>
                      <!--hidden for old image change-->
                      <div class="item form-group">
                        
                        <div class="col-md-6 col-sm-6 ">
                          <input type="hidden"  name="old_image"  class="form-control" value="{{$editblog->post_image}}">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Post Details English 
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea class="form-control" name="post_details_eng" >
                          {{$editblog->post_details_eng}}
                          </textarea>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Post Details Bangla</label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea class="form-control" name="post_details_bng">
                          {{$editblog->post_details_bng}}
                          </textarea>
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