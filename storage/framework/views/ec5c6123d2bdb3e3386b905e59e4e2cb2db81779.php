<?php $__env->startSection('content'); ?>

<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/home')); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/slider')); ?>">Slider</a></li>
                <li class="breadcrumb-item active" aria-current="page">slider List</li>
            </ol>
            <h6 class="slim-pagetitle">Slider</h6>
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
        

        <div class="section-wrapper">
            <label class="section-title">Categories</label>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                           <th>#</th>

                           <th>زيارة الإعلان</th>
                           <th>العرض</th>
                           <th>تعديل</th>
                           <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                  <?php echo e(@$slider->id); ?>

                              </td>
                              <td>
                                 <a target="_blank" href="<?php echo e(@$slider->url); ?>"><li class="fa fa-paper-plane btn btn-info"></li></a>
                             </td>
                             <td>
                              <img src="<?php echo e(URL::to('/')); ?><?php echo e($slider->image); ?>" class="img-responsive img-rounded" style="width:93px;display: inline-block;">
                          </td>
                          <td>
                          <a href="<?php echo e(URL::to('/')); ?>/admin/slider/<?php echo e(@$slider->id); ?>/edit"><li class="fa fa-pencil btn btn-warning"></li></a>
                         </td>
                         <td>
                           <?php echo $__env->make('admin.slider.delete_model', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
            
        </div><!-- container -->
    </div><!-- slim-mainpanel -->

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>