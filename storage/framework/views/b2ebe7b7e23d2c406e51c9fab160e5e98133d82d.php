<?php $__env->startSection('content'); ?>

<div class="slim-mainpanel">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/admin')); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/faqs')); ?>">Faq</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Info</li>
      </ol>
      <h6 class="slim-pagetitle">Faq</h6>
    </div><!-- slim-pageheader -->

    
     <?php echo Form::open(['method'=>'post','url'=>'admin/faqs','class'=>"form-horizontal" ,'role'=>"form",'files'=>'true']); ?>

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
                <label title="name country ">Title Ar: <span class="tx-danger">*</span></label>
                  <input type="text" class="form-control" name="title_ar" >
              </div><!-- col-8 -->

            </div><!-- row -->
            
            <div class="row row-sm mg-10">
              <div class="col-9 col-sm-8 col-xl-12">
                <label title="name country ">Title En: <span class="tx-danger">*</span></label>
                 <input type="text" class="form-control" name="title_en" >
              </div><!-- col-8 -->
            </div><!-- row -->

            <div class="row row-sm mg-10">
              <div class="col-9 col-sm-8 col-xl-12">
                <label title="name country ">Content ar: <span class="tx-danger">*</span></label>
                 <textarea id="editor1" class="form-control" name="content_ar"></textarea>
              </div><!-- col-8 -->
            </div><!-- row -->

            <div class="row row-sm mg-10">
              <div class="col-9 col-sm-8 col-xl-12">
                <label title="name country ">Content En: <span class="tx-danger">*</span></label>
                 <textarea id="editor2" class="form-control" name="content_en"></textarea>
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
  
</div><!-- container -->
</div><!-- slim-mainpanel -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>