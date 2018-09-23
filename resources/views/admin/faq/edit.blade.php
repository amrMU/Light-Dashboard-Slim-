@extends('admin.layout')
@section('content')

<div class="slim-mainpanel">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/admin') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/faqs') }}">Faq</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Info</li>
      </ol>
      <h6 class="slim-pagetitle">Faq</h6>
    </div><!-- slim-pageheader -->

    {{-- start form  --}}
     {!! Form::open(['method'=>'PUT','url'=>'admin/faqs/'.$faq->id,'class'=>"form-horizontal" ,'role'=>"form",'files'=>'true']) !!}
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

          <div class="form-group mg-b-10">
            
            <div class="row row-sm mg-10">
              <div class="col-9 col-sm-8 col-xl-12">
                <label  ">Title Ar: <span class="tx-danger">*</span></label>
                  <input type="text" class="form-control" name="title_ar" value="{{ @$faq->title_ar }}">
              </div><!-- col-8 -->

            </div><!-- row -->
            
            <div class="row row-sm mg-10">
              <div class="col-9 col-sm-8 col-xl-12">
                <label  ">Title En: <span class="tx-danger">*</span></label>
                 <input type="text" class="form-control" name="title_en" value="{{ @$faq->title_en }}">
              </div><!-- col-8 -->
            </div><!-- row -->

            <div class="row row-sm mg-10">
              <div class="col-9 col-sm-8 col-xl-12">
                <label  ">Content ar: <span class="tx-danger">*</span></label>
                 <textarea id="editor1" class="form-control" name="content_ar">{{@$faq->content_ar}}</textarea>
              </div><!-- col-8 -->
            </div><!-- row -->

            <div class="row row-sm mg-10">
              <div class="col-9 col-sm-8 col-xl-12">
                <label  ">Content En: <span class="tx-danger">*</span></label>
                 <textarea id="editor2" class="form-control" name="content_en">{{@$faq->content_en}}</textarea>
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
  </form>
  {{-- end form  --}}
</div><!-- container -->
</div><!-- slim-mainpanel -->

@stop