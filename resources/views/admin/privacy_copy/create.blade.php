@extends('admin.layout')
  @section('content')
   <!-- BEGIN PAGE HEADER-->
   <h3 class="page-title">
الخصوصيه <small>سياسه الخصوصيه</small>
  </h3>
  <div class="page-bar">
    <ul class="page-breadcrumb">
      <li>
        <i class="fa fa-home"></i>
        <a href="{{URL::to('/admin/policy')}}">الرئيسيه</a>
        <i class="fa fa-angle-right"></i>
      </li>
      
      <li>
        <a href="#">سياسة الخصوصيه  </a>
      </li>
    </ul>
  </div>
  <!-- END PAGE HEADER-->
  <!-- BEGIN SAMPLE FORM PORTLET-->
  <div class="portlet box purple ">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-gift"></i>سياسة الخصوصيه  
      </div>
      <div class="tools">
        <a href="" class="collapse">
        </a>

        <a href="" class="reload">
        </a>
        <a href="" class="remove">
        </a>
      </div>
    </div>
    <div class="portlet-body form">
      {!! Form::open(['method'=>'post','url'=>'admin/policy','class'=>"form-horizontal" ,'role'=>"form",'files'=>'true']) !!}
      @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      @if(Session::has('success'))
      <div class="alert alert-success">{{Session::get('success')}}</div>
      @endif
        <div class="form-body input_wrap">
           
          <div class="form-group">
            <label class="col-md-3 control-label"> سياسة الخصوصيه  </label>
            <div class="col-md-9">
                  <textarea id="editor1" class="form-control" name="content_ar">{{ @$info->cotent_ar }}</textarea>
            </div>
          </div>
         
          
        </div>


        <div class="form-actions right1">
          <button type="submit" class="btn green">حفظ</button>
        </div>
        </div>
        {!! Form::close() !!}
    </div>
  </div>
  <!-- END SAMPLE FORM PORTLET-->
  @stop
  @section('jsCode')
  <script src="{{ URL::to('/') }}/ckeditor/ckeditor.js"></script>

  <script>
       CKEDITOR.replace( 'editor1' );
       CKEDITOR.config.extraPlugins = 'justify';

      // CKEDITOR.replace( 'editor2' );
      // CKEDITOR.config.extraPlugins = 'justify';
  </script>
  
    @stop