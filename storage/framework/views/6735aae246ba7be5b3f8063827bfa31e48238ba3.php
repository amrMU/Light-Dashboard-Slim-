<?php $__env->startSection('content'); ?>

<div class="slim-mainpanel">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/panel')); ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Account info</li>
      </ol>
      <h6 class="slim-pagetitle">Reset Password</h6>
    </div><!-- slim-pageheader -->
    
    
    <?php if(Session::has('success')): ?>
    <div class="alert alert-success mg-b-0" role="alert"><?php echo e(Session::get('success')); ?></div>
    <?php endif; ?>
    <?php if(count($errors) > 0): ?>
    <div class="alert alert-danger mg-b-0" role="alert">
      <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
    <?php endif; ?>
    <form method="post" action="<?php echo e(URL::to('admin/reset/password/'.$user->id)); ?>"   enctype='multipart/form-data' data-parsley-validate>
      <div class="slim-mainpanel">
        <div class="container row">
          
          <div class="section-wrapper col-xl-9">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>


           
         
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
           <img src="<?php echo e(URL::to('/')); ?>/<?php echo e(@$user->image); ?>" class="img-fluid" alt="">
         </div>
       </div>
     </form>
     
   </div><!-- container -->
 </div><!-- slim-mainpanel -->

 <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>