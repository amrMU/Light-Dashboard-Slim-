@extends('admin.layout')

@section('content')

<div class="slim-mainpanel">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/panel') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
      <h6 class="slim-pagetitle">Dashboard</h6>
    </div><!-- slim-pageheader -->
    {{-- start blocks --}}
          <div class="row row-xs">
          {{-- start Card --}}
          <div class="col-sm-7 col-lg-4">
            <div class="card card-status">
              <a href="{{ URL::to('/admin/lates_jobs') }}">
              <div class="media">
                <i class="icon ion-ios-cloud-download-outline tx-purple"></i>
                <div class="media-body">
                  <h1>570000</h1>
                  <p>Total Jobs</p>
                </div><!-- media-body -->
              </div><!-- media -->
              </a>

            </div><!-- card -->
          </div><!-- col-3 -->
        {{-- End Card --}}
          <div class="col-sm-7 col-lg-4 mg-t-10 mg-sm-t-0 mg-b-20">
            <div class="card card-status">
            <a href="{{ URL::to('/admin/latest_members') }}">
              <div class="media">
                <i class="icon ion-ios-bookmarks-outline tx-teal"></i>
                <div class="media-body">
                  <h1>{{ @$latest_members }}</h1>
                  <p>Latest Members</p>
                </div><!-- media-body -->
              </div><!-- media -->
            </a>

            </div><!-- card -->
          </div><!-- col-3 -->
       
          <div class="col-sm-7 col-lg-4 mg-t-10 mg-lg-t-0">
            <div class="card card-status">
              <a href="{{ URL::to('/admin/interviews/calendar') }}">
              <div class="media">
                <i class="icon ion-ios-analytics-outline tx-pink"></i>
                <div class="media-body">
                  <h1>2,942</h1>
                  <p>Interviews Dates</p>
                </div><!-- media-body -->
              </div><!-- media -->
              </a>
            </div><!-- card -->
          </div><!-- col-3 -->
        </div><!-- row -->

    {{-- end blocks --}}
    {{-- Start Content --}}
    <div class="section-wrapper">
          <label class="section-title">Dashboard</label>
          <p class="mg-b-20 mg-sm-b-40"> You are logged in as {{@Auth::user()->type_user}}!</p>
    </div><!-- section-wrapper -->
    {{-- end Content --}}
    
  </div><!-- container -->
</div><!-- slim-mainpanel -->
@endsection
