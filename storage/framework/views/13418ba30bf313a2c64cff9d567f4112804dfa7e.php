<?php $__env->startSection('content'); ?>

<div class="slim-mainpanel">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/home')); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/categories')); ?>">Categories</a></li>
        <li class="breadcrumb-item active" aria-current="page">create category</li>
      </ol>
      <h6 class="slim-pagetitle">Categories</h6>
    </div><!-- slim-pageheader -->

    
    <?php echo Form::open(['method'=>'PUT','url'=>'admin/categories/sub/'.$info->id,'class'=>"form-horizontal" ,'role'=>"form",'files'=>'true']); ?>

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
          <div class="form-group mg-b-10">
            
            <div class="row row-sm mg-10">
              <div class="col-9 col-sm-8 col-xl-12">
                <label title="name country ">name ar: <span class="tx-danger">*</span></label>
                <input type="text" name="name" class="form-control input-lg"  placeholder="العنوان بالعربيه" value="<?php echo e(@$info->name_ar); ?>">
              </div><!-- col-8 -->
            </div><!-- row -->

            <div class="row row-sm mg-10">
              <div class="col-9 col-sm-8 col-xl-12">
                <label title="name country ">name en: <span class="tx-danger">*</span></label>
                <input type="text" name="name_en" class="form-control input-lg"  placeholder="الإسم " value="<?php echo e(@$info->name_en); ?>">
              </div><!-- col-8 -->
            </div><!-- row -->
            

                </div><!-- col-8 -->
              <div class="wd-300">
                <div class="d-md-flex mg-b-30">
                </div><!-- d-flex -->
                <button type="submit" class="btn btn-primary pd-x-20  pull-right">Save</button>
              </div>
              </div>
                </div><!-- section-wrapper -->
              </div><!-- row -->


        </div>
      </div>
    </div>
    <?php echo Form::close(); ?>

  
</div><!-- container -->
</div><!-- slim-mainpanel -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>