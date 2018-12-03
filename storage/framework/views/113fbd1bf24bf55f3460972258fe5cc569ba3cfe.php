<?php $__env->startSection('content'); ?>

<div class="slim-mainpanel">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/admin')); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/cities')); ?>">cities</a></li>
        <li class="breadcrumb-item active" aria-current="page">create city</li>
      </ol>
      <h6 class="slim-pagetitle">cities</h6>
    </div><!-- slim-pageheader -->

    
    <form action="<?php echo e(URL::to('admin/cities')); ?>" method="post"  data-parsley-validate>
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
                
                <select name="country_id" class="form-control">
                <option value="">Select One</option>
                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e(@$country->id); ?>"><?php echo e(@$country->name_ar); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>

              </div><!-- col-8 -->
            </div><!-- row -->

             <div class="row row-sm mg-10">
              <div class="col-9 col-sm-8 col-xl-12">
                <label title="name country ">name: <span class="tx-danger">*</span></label>
                <input type="text" name="name_ar" class="form-control " placeholder="Enter name" required value="<?php echo e(Request::old('name_ar')); ?>">
              </div><!-- col-8 -->
            </div><!-- row -->
            
             <div class="row row-sm mg-10">
              <div class="col-9 col-sm-8 col-xl-12">
                <label title="name country ">name: <span class="tx-danger">*</span></label>
                <input type="text" name="name_en" class="form-control " placeholder="Enter name" required value="<?php echo e(Request::old('name_en')); ?>">
              </div><!-- col-8 -->
            </div><!-- row -->

          </div>

          <div class="wd-300">
            <div class="d-md-flex mg-b-30">
            </div><!-- d-flex -->
            <button type="submit" class="btn btn-primary pd-x-20">Save</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  
</div><!-- container -->
</div><!-- slim-mainpanel -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>