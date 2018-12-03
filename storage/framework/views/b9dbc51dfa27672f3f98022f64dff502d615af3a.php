<?php $__env->startSection('content'); ?>

<div class="slim-mainpanel">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/home')); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/Faqs')); ?>">Faqs</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create Faq</li>
      </ol>
      <h6 class="slim-pagetitle">Faqs</h6>
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
      <label class="section-title">Faqs</label>

      <div class="table-wrapper">
        <table id="datatable1" class="table display responsive nowrap">
          <thead>
            <tr>
               <th>#</th>
                <th>العنوان بالعربيه</th>
                <th>العنوان بالانجليزيه</th>
                <th>المحتوي بالعربيه</th>
                <th>المحتوي بالامجليزيه</th>
               
                <th>تعديل</th>
                <th>حذف</th>
            </tr>
          </thead>
          <tbody>
               <?php $__currentLoopData = $faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                      <td><?php echo e(@$faq->id); ?></td>
                      <td><?php echo e(@$faq->title_ar); ?></td>
                      <td><?php echo e(@$faq->title_en); ?></td>
                      <td><?php echo @strip_tags(substr($faq->content_ar,0,150)).'...'; ?></td>
                      <td><?php echo @strip_tags('...'.substr($faq->content_en,0,150)); ?></td>
                      <td>
                        <a href="<?php echo e(URL::to('/')); ?>/admin/faqs/<?php echo e(@$faq->id); ?>/edit"><li class="fa fa-pencil btn btn-warning"></li></a>
                      </td>
                      <td><?php echo $__env->make('admin.faq.delete_model', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></td>
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