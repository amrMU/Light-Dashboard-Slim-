  <?php $__env->startSection('styleCode'); ?>
   
  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('content'); ?>

   <!-- BEGIN PAGE HEADER-->
  <h3 class="page-title">
  إعدادات  <small>تعديل </small>
  </h3>
  <div class="page-bar">
    <ul class="page-breadcrumb">
      <li>
        <i class="fa fa-home"></i>
        <a href="<?php echo e(URL::to('/admin/home')); ?>">الرئيسيه</a>
        <i class="fa fa-angle-right"></i>
      </li>
      <li>
        <a href="#">اعدادات</a>
        <i class="fa fa-angle-right"></i>
      </li>
      <li>
        <a href="#">تحديد المكان علي خرائط جوجل</a>
      </li>
    </ul>
  </div>
  <!-- END PAGE HEADER-->
  <!-- BEGIN SAMPLE FORM PORTLET-->
  <div class="portlet box purple ">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-gift"></i>تحديد المكان علي خرائط جوجل
      </div>
      <div class="tools">
        <a href="" class="collapse">
        </a>

        <a href="" class="reload">
        </a>
        <a href="" class="remove">
        </a>
      </div>
    </div>
          

    <div class="portlet-body form">
      <?php echo Form::open(['method'=>'post','url'=>'admin/contact_us_settings','class'=>"form-horizontal" ,'role'=>"form",'files'=>'true']); ?>

      <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
      <?php endif; ?>
      <?php if(Session::has('success')): ?>
      <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
      <?php endif; ?>
        <div class="form-body">
          <div class="form-group">
          <div style="width: 950px; height: 1010px;margin: 40px">
          		<?php echo Mapper::render(); ?>

          	</div>
          </div>

            </div>  
          </div>
        
        </div>
        <div class="form-actions right1">
        </div>
        <?php echo Form::close(); ?>

    </div>
  </div>
  <!-- END SAMPLE FORM PORTLET-->
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>