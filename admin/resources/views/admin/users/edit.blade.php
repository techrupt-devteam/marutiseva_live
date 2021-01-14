@extends('admin.layout.master')
 
@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $page_name." ".$title }}
        {{-- <small>Preview</small> --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/admin')}}/dashbord"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('/admin')}}/manage_category">Manage {{ $title }}</a></li>
        <li class="active">{{ $page_name." ".$title }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
           <!--  <div class="box-header with-border">
              <h3 class="box-title">{{ $page_name." ".$title }}</h3>
            </div> -->
            <!-- /.box-header -->
            <!-- form start --> 
             @include('admin.layout._status_msg')
              <form action="{{ url('/admin')}}/update_{{$url_slug}}/{{$data['id']}}" method="post" role="form" data-parsley-validate="parsley" enctype="multipart/form-data">
              {!! csrf_field() !!}
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-4">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="first_name">First Name<span style="color:red;" >*</span></label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required="true" value="{{$data['first_name']}}">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="last_name">Last Name<span style="color:red;" >*</span></label>
                        <input type="text" value="{{$data['last_name']}}" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required="true">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="email">Email<span style="color:red;" >*</span></label>
                        <input type="email" class="form-control" id="email" name="email"  value="{{$data['email']}}" placeholder="Email" required="true">
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
              <div class="row">
                <div class="col-md-12">
                  <!-- <div class="col-md-4">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="oldpassword">Password<span style="color:red;" >*</span></label>
                        <input type="passsword" class="form-control" value="{{$data['password']}}" id="password" name="password" placeholder="Password" required="true">
                      </div>
                    </div>
                  </div> -->
                  <div class="col-md-4">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="city">City<span style="color:red;" >*</span></label>
                        <select name="city" id="city" class="form-control city" required="true">
                         <option value="">-Select-</option>  
                         @foreach($city as $cvalue)
                           @php $selected="" ;@endphp
                           @if($data['city']==$cvalue->city)  
                            @php $selected="selected"; @endphp 
                           @endif
                         <option value="{{$cvalue->city}}" {{$selected}}>{{$cvalue->city}}</option>  
                         @endforeach
                         </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="area">Area<span style="color:red;" >*</span></label>
                         <select name="area" id="area" class="form-control" required="true">
                           <option value="">-Select-</option>
                         </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{url('/admin')}}/manage_{{$url_slug}}"  class="btn btn-default">Back</a>
                <button type="submit" class="btn btn-primary pull-right">Update</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
     $("select.city").change(function() {
      var selectedCity = $(".city option:selected").val();
      $.ajax({
        type: "get",
        url: "getArea",
        data: {
          city: selectedCity
        }
      }).done(function(data) {
           var result = data.split('|');
           $("#area").html(result[0]);
         
      });
    });
 </script>
@endsection