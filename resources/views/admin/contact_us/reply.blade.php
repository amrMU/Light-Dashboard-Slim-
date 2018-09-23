@extends('admin.layout')
@section('content')

<div class="slim-mainpanel">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/admin/contact_us') }}">Contact Us</a></li>
        <li class="breadcrumb-item active" aria-current="page">Reply Request</li>
      </ol>
      <h6 class="slim-pagetitle">Contact Us</h6>
    </div><!-- slim-pageheader -->

    {{-- start form  --}}
    {!! Form::open(['method'=>'post','url'=>'admin/contact_us/reply','class'=>"form-horizontal" ,'role'=>"form",'files'=>'true']) !!}
      <div class="slim-mainpanel">
        <div class="container">
          <div class="section-wrapper">

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
          {{ csrf_field() }}
          <div class="form-group mg-b-10">
            

             <div class="row row-sm mg-10">
              <div class="col-9 col-sm-8 col-xl-12">
                <label title="email">name</label>
                 <input type="text" class="form-control input-lg" placeholder="الإسم" value="{{@$info->name}}" disabled>
              </div><!-- col-8 -->
            </div><!-- row -->
            
             <div class="row row-sm mg-10">
              <div class="col-9 col-sm-8 col-xl-12">
                <label title="email ">email</label>
                 
              <input type="text" class="form-control"  placeholder="البريد الالكترةني"  value="{{@$info->email}}" disabled>
              <input type="hidden" name="email" class="form-control"  placeholder="البريد الالكترةني"  value="{{@$info->email}}" >
              <input type="hidden" name="id" class="form-control"  placeholder="البريد الالكترةني"  value="{{@$info->id}}" >
              </div><!-- col-8 -->
            </div><!-- row -->
            
            <div class="row row-sm mg-10">
              <div class="col-9 col-sm-8 col-xl-12">
              <label title="message">message</label>
                <textarea name="message" id="" class="form-control" disabled>{{@$info->message}}</textarea>
              </div><!-- col-8 -->
            </div><!-- row -->
             
            <div class="row row-sm mg-10">
              <div class="col-9 col-sm-8 col-xl-12">
              <label title="title">title: <span class="tx-danger">*</span></label>
                 <input type="text"  name="title" class="form-control"  placeholder="العنوان"  value="{{ Request::old('title') }}" >
              </div><!-- col-8 -->
            </div><!-- row -->
            <div class="row row-sm mg-10">
              <div class="col-9 col-sm-8 col-xl-12">
              <label title="title">title: <span class="tx-danger">*</span></label>
                <textarea id="editor1" name="message">{{ Request::old('message') }}</textarea>
              </div><!-- col-8 -->
            </div><!-- row -->
             
          </div>

          <div class="wd-300">
            <div class="d-md-flex mg-b-30">
            </div><!-- d-flex -->
            <button type="submit" class="btn btn-primary pd-x-20 pull-right">Save</button>
          </div>
        </div>
      </div>
    </div>
    {!! Form::close() !!}
  {{-- end form  --}}
</div><!-- container -->
</div><!-- slim-mainpanel -->

@stop