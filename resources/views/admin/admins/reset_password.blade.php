@extends('admin.layout')
@section('content')

<div class="slim-mainpanel">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/panel') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Account info</li>
      </ol>
      <h6 class="slim-pagetitle">Reset Password</h6>
    </div><!-- slim-pageheader -->
    
    {{-- start form  --}}
    @if(Session::has('success'))
    <div class="alert alert-success mg-b-0" role="alert">{{Session::get('success')}}</div>
    @endif
    @if (count($errors) > 0)
    <div class="alert alert-danger mg-b-0" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <form method="post" action="{{URL::to('admin/reset/password/'.$user->id)}}"   enctype='multipart/form-data' data-parsley-validate>
      <div class="slim-mainpanel">
        <div class="container row">
          
          <div class="section-wrapper col-xl-9">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

           
         
            <div class="row row-sm">
              <div class="col-9 col-sm-8 col-xl-12">
                <label title="Password">Password: <span class="tx-danger">*</span></label>
                <input type="password" name="password" class="form-control " placeholder="Enter Password" >
              </div><!-- col-8 -->
            </div><!-- row -->
            <div class="row row-sm">
              <div class="col-9 col-sm-8 col-xl-12">
                <label title="password confirmation">password confirmation: <span class="tx-danger">*</span></label>
                <input type="password" name="password_confirmation" class="form-control " placeholder="Enter password confirmation" >
              </div><!-- col-8 -->
            </div><!-- row -->
            <div class="wd-300">
              <div class="d-md-flex mg-b-30">
              </div><!-- d-flex -->
              <button type="submit" class="btn btn-primary pd-x-20">Save</button>
            </div>
          </div>
          <div class="col-xl-3">
           <img src="{{URL::to('/')}}/{{ @$user->image }}" class="img-fluid" alt="">
         </div>
       </div>
     </form>
     {{-- end form  --}}
   </div><!-- container -->
 </div><!-- slim-mainpanel -->

 @stop