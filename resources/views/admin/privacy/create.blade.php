@extends('admin.layout')
@section('content')

<div class="slim-mainpanel">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/privacy/create') }}">policy & Privacy </a></li>
        <li class="breadcrumb-item active" aria-current="page">create country</li>
      </ol>
      <h6 class="slim-pagetitle">policy & Privacy </h6>
    </div><!-- slim-pageheader -->

    {{-- start form  --}}
    {!! Form::open(['method'=>'post','url'=>'admin/policy','class'=>"form-horizontal" ,'role'=>"form",'files'=>'true']) !!}
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
                <label  ">privacy & policy arabic: <span class="tx-danger">*</span></label>
                 <textarea id="editor1" class="form-control" name="content_ar">{{ @$info->content_ar }}</textarea>
              </div><!-- col-8 -->
            </div><!-- row -->
            
            <div class="col-9 col-sm-8 col-xl-12">
                <label title="privacy & policy  ">privacy & policy English: <span class="tx-danger">*</span></label>
                 <textarea id="editor2" class="form-control" name="content_en">{{ @$info->content_en }}</textarea>
              </div><!-- col-8 -->
            </div><!-- row -->
          <div class="wd-300">
            <div class="d-md-flex mg-b-30">
            </div><!-- d-flex -->
            <button type="submit" class="btn btn-primary pd-x-20 pull-right">Save</button>
          </div>
            </div><!-- section-wrapper -->
            
                      

          </div>

        </div>
      </div>
    </div>
  </form>
  {{-- end form  --}}
</div><!-- container -->
</div><!-- slim-mainpanel -->

@stop