@extends('admin.layout')
@section('content')

<div class="slim-mainpanel">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/slider') }}">slider</a></li>
        <li class="breadcrumb-item active" aria-current="page">create Slider</li>
      </ol>
      <h6 class="slim-pagetitle">slider</h6>
    </div><!-- slim-pageheader -->

    {{-- start form  --}}
    {!! Form::open(['method'=>'PUT','url'=>'admin/slider/'.$slider->id,'class'=>"form-horizontal" ,'role'=>"form",'files'=>'true']) !!}
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
              <div class="col-9 col-sm-8 col-xl-9">
                 <div class="row row-sm mg-10">
                  <div class="col-9 col-sm-8 col-xl-12">
                    <label  ">URL: <span class="tx-danger">*</span></label>
                    <input type="text" name="url" class="form-control input-lg"  placeholder="Visit Url"  value="{{@$slider->url }}">
                  </div><!-- col-8 -->
                </div><!-- row -->

              </div>
              <div class="col-9 col-sm-8 col-xl-3">
               <img src="{{ URL::to('/') }}{{ $slider->image }}" class="img-fluid rounded" >
              </div>
            </div>

            <div class="row row-sm mg-10">
              <div class="col-9 col-sm-8 col-xl-9"> 
                <div class="row row-sm mg-10">
                    <div class="col-9 col-sm-8 col-xl-12 " >
                      <label title="profile pic">Slid: <span class="tx-danger">*</span></label>

                      <div class="col-9 col-sm-8 col-xl-12 custom-file " style="display: block;">
                        <input type="file" class="custom-file-input" name="image" id="customFile2">
                        <label class="custom-file-label custom-file-label-primary" for="customFile">Choose file</label>
                      </div><!-- col -->

                    </div><!-- col-8 -->
                  </div><!-- row -->
              
               </div>
            </div>
            

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