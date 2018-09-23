<!DOCTYPE html>
<?php if(LaravelLocalization::getCurrentLocale() == 'ar'): ?>
<html lang="ar"  dir="rtl">
<?php else: ?>
<html lang="en" >
<?php endif; ?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <!-- Twitter -->
  <meta name="twitter:site" content="<?php echo e(URL::to('/')); ?>">
  <meta name="twitter:title" content="<?php echo e(@$setting->site_name); ?>">
  <meta name="twitter:description" content="<?php echo e(@$setting->description_ar); ?>.">
  <meta name="twitter:image" content="<?php echo e(URL::to('/')); ?><?php echo e(@$setting->logo); ?>">

  <!-- Facebook -->
  <meta property="og:url" content="<?php echo e(URL::to('/')); ?>">
  <meta property="og:title" content="<?php echo e(@$setting->site_name); ?>">
  <meta property="og:description" content="<?php echo e(@$setting->description_ar); ?>.">

  <meta property="og:image" content="<?php echo e(URL::to('/')); ?><?php echo e(@$setting->logo); ?>">
  <meta property="og:image:secure_url" content="<?php echo e(URL::to('/')); ?>">


  <!-- Meta -->
  <meta name="description" content="<?php echo e(@$setting->meta_tags); ?>.">
  <meta name="author" content="<?php echo e(URL::to('/')); ?>">

  <title><?php echo e(@$setting->site_name); ?></title>
    <!-- Vendor css -->
    <link href="<?php echo e(URL::to('assets')); ?>/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo e(URL::to('assets')); ?>/lib/Ionicons/css/ionicons.css" rel="stylesheet">

    <!-- Slim CSS -->
    <link rel="stylesheet" href="<?php echo e(URL::to('assets')); ?>/css/slim.css">

  </head>
  <body>

    <div class="d-md-flex flex-row-reverse">
      <div class="signin-right">
      	<?php echo Form::open(['url' => 'forget/password','method'=>'post']); ?>

      	<h3 class="form-title">Restore password</h3>
      	<?php if(count($errors) > 0): ?>
      	<div class="alert alert-danger">
      		<ul>
      			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      			<li><?php echo e($error); ?></li>
      			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      		</ul>
      	</div>
      	<?php endif; ?>

      	<?php if(Session::has('error')): ?>
      	<div class="alert alert-danger">
      		<ul>
      			<li><?php echo e(Session::get('error')); ?></li>
      		</ul>
      	</div>
      	<?php endif; ?>
          <?php if(Session::has('success')): ?>
        <div class="alert alert-success">
          <ul>
            <li><?php echo e(Session::get('success')); ?></li>
          </ul>
        </div>
        <?php endif; ?>
        <div class="signin-box">

          <div class="form-group">
            <input type="text" class="form-control" name="email"  autocomplete="off"	 placeholder="Enter your email">
          </div><!-- form-group -->
          
          <button type="submit" class="btn btn-primary btn-block btn-signin">continue</button>
         	
        </div>
		<?php echo Form::close(); ?>

      </div><!-- signin-right -->
       <div class="signin-left">
        <div class="signin-box">
          <h2 class="slim-logo"><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(@$setting->site_name); ?><span>.</span></a></h2>

          <p><?php echo e(@$setting->description_ar); ?>.</p>


          <p><a href="<?php echo e(URL::to('/')); ?>" class="btn btn-outline-secondary pd-x-25">Learn More</a></p>

          <p class="tx-12">&copy;  2018. All Rights Reserved.</p>
        </div>
      </div><!-- signin-left -->
    </div><!-- d-flex -->

    <script src="<?php echo e(URL::to('/assets')); ?>/lib/jquery/js/jquery.js"></script>
    <script src="<?php echo e(URL::to('/assets')); ?>/lib/popper.js/js/popper.js"></script>
    <script src="<?php echo e(URL::to('/assets')); ?>/lib/bootstrap/js/bootstrap.js"></script>

    <script src="<?php echo e(URL::to('/assets')); ?>/js/slim.js"></script>

  </body>
</html>
