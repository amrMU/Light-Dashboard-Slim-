<?php $__env->startSection('content'); ?>

<div class="slim-mainpanel">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/home')); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/abouts_us/create')); ?>">About US</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Info</li>
      </ol>
      <h6 class="slim-pagetitle">About Us</h6>
    </div><!-- slim-pageheader -->

    
    <?php echo Form::open(['method'=>'post','url'=>'admin/about_us','class'=>"form-horizontal" ,'role'=>"form",'files'=>'true']); ?>

      <div class="slim-mainpanel">
        <div class="container">
          <div class="section-wrapper">

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
          <?php echo e(csrf_field()); ?>

          <div class="form-group mg-b-10">
            
            <div class="row row-sm mg-10">
              <div class="col-9 col-sm-8 col-xl-9">
                <label  ">Who We Are : <span class="tx-danger">*</span></label>
                <textarea  class="form-control" id="editor1" name="content_ar"><?php echo e(@$info->content_ar); ?></textarea>
              </div><!-- col-8 -->
              <div class="form-group mg-b-10 col-3">
                <img src="<?php echo e(URL::To('/')); ?><?php echo e(@$info->image); ?>" class="img-fluid rounded" alt="">
              </div>
            </div><!-- row -->
            
            <div class="row row-sm mg-10">
              <div class="col-9 col-sm-8 col-xl-9">
                <label  ">mission: <span class="tx-danger">*</span></label>
                <textarea id="editor2" class="form-control" name="mission_ar"><?php echo e(@$info->mission_ar); ?></textarea>
              </div><!-- col-8 -->
            </div><!-- row -->
            
            <div class="row row-sm mg-10">
              <div class="col-9 col-sm-8 col-xl-9">
                <label  ">history: <span class="tx-danger">*</span></label>
               <textarea id="editor3" class="form-control" name="history_ar"><?php echo e(@$info->history_ar); ?></textarea>
              </div><!-- col-8 -->
            </div><!-- row -->
            
              <div class="row row-sm">
                <div class="col-9 col-sm-8 col-xl-9" >
                  <label title="profile pic">profile pic: <span class="tx-danger">*</span></label>

                  <div class="col-9 mg-t-40 mg-lg-t-0 mg-r-20 custom-file " style="display: block;">
                    <input type="file" class="custom-file-input" name="image" id="customFile2">
                    <label class="custom-file-label custom-file-label-primary" for="customFile">Choose file</label>
                  </div><!-- col -->

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
    <?php echo Form::close(); ?>

  
</div><!-- container -->
</div><!-- slim-mainpanel -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>