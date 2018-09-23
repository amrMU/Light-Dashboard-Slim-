<!DOCTYPE html>
@if(LaravelLocalization::getCurrentLocale() == 'ar')
<html lang="ar"  dir="rtl">
@else
<html lang="en" >
@endif
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Twitter -->
  <meta name="twitter:site" content="{{ URL::to('/') }}">
  <meta name="twitter:title" content="{{@$setting->site_name}}">
  <meta name="twitter:description" content="{{@$setting->description_ar}}.">
  <meta name="twitter:image" content="{{ URL::to('/') }}{{@$setting->logo}}">

  <!-- Facebook -->
  <meta property="og:url" content="{{ URL::to('/') }}">
  <meta property="og:title" content="{{@$setting->site_name}}">
  <meta property="og:description" content="{{@$setting->description_ar}}.">

  <meta property="og:image" content="{{ URL::to('/') }}{{@$setting->logo}}">
  <meta property="og:image:secure_url" content="{{ URL::to('/') }}">


  <!-- Meta -->
  <meta name="description" content="{{@$setting->meta_tags}}.">
  <meta name="author" content="{{ URL::to('/') }}">

  <title>{{@$setting->site_name}}</title>

    <!-- Vendor css -->
    <link href="{{ URL::to('panel') }}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ URL::to('panel') }}/lib/Ionicons/css/ionicons.css" rel="stylesheet">

    <!-- Slim CSS -->
    <link rel="stylesheet" href="{{ URL::to('panel') }}/css/slim.css">

  </head>
  <body>

    <div class="d-md-flex flex-row-reverse">
      <div class="signin-right">
      	{!! Form::open(['url' => 'reset/password/'.@$token,'method'=>'post']) !!}
      	<h3 class="form-title">Restore password</h3>
      	@if (count($errors) > 0)
      	<div class="alert alert-danger">
      		<ul>
      			@foreach ($errors->all() as $error)
      			<li>{{ $error }}</li>
      			@endforeach
      		</ul>
      	</div>
      	@endif

      	@if(Session::has('error'))
      	<div class="alert alert-danger">
      		<ul>
      			<li>{{Session::get('error')}}</li>
      		</ul>
      	</div>
      	@endif
        @if(Session::has('success'))
        <div class="alert alert-success">
          <ul>
            <li>{{Session::get('success')}}</li>
          </ul>
        </div>
        @endif
        <div class="signin-box">

          <div class="form-group">
            <input type="password" class="form-control" name="password"  autocomplete="off"	 placeholder="Enter New Password">
          </div><!-- form-group -->

          <div class="form-group">
            <input type="password" class="form-control" name="password_confirmation"  autocomplete="off"  placeholder="Enter Password Confirmation">
          </div><!-- form-group -->
          
          <button type="submit" class="btn btn-primary btn-block btn-signin">continue</button>
         	
        </div>
		{!! Form::close() !!}
      </div><!-- signin-right -->
       <div class="signin-left">
        <div class="signin-box">
          <h2 class="slim-logo"><a href="{{ URL::to('/') }}">{{@$setting->site_name}}<span>.</span></a></h2>

          <p>{{@$setting->description_ar}}.</p>


          <p><a href="{{ URL::to('/') }}" class="btn btn-outline-secondary pd-x-25">Learn More</a></p>

          <p class="tx-12">&copy;  2018. All Rights Reserved.</p>
        </div>
      </div><!-- signin-left -->
    </div><!-- d-flex -->

    <script src="{{ URL::to('/panel') }}/lib/jquery/js/jquery.js"></script>
    <script src="{{ URL::to('/panel') }}/lib/popper.js/js/popper.js"></script>
    <script src="{{ URL::to('/panel') }}/lib/bootstrap/js/bootstrap.js"></script>

    <script src="{{ URL::to('/panel') }}/js/slim.js"></script>

  </body>
</html>
