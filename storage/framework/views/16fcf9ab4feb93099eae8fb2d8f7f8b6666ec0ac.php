<?php $__env->startSection('content'); ?>

<div class="slim-mainpanel">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/home')); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/slider')); ?>">slider</a></li>
        <li class="breadcrumb-item active" aria-current="page">create city</li>
      </ol>
      <h6 class="slim-pagetitle">slider</h6>
    </div><!-- slim-pageheader -->

    
    <?php echo Form::open(['method'=>'post','url'=>'admin/slider','class'=>"form-horizontal" ,'role'=>"form",'files'=>'true']); ?>

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
              <div class="col-9 col-sm-8 col-xl-12">
                <label title="name country ">URL: <span class="tx-danger">*</span></label>
                  <input type="text" name="url" class="form-control input-lg"  placeholder="URL visit" value="<?php echo e(Request::old('url')); ?>">
              </div><!-- col-8 -->
            </div><!-- row -->
            
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