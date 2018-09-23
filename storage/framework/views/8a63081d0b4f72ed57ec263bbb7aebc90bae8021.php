<?php $__env->startSection('content'); ?>

<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/home')); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/contact_us')); ?>">Contact Us </a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Us Requests</li>
            </ol>
            <h6 class="slim-pagetitle">Contact Us Requests</h6>
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
            <label class="section-title">Contact Us Requests</label>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="">#</th>
                            <th class="">Title </th>
                            <th class="">message </th>
                            <th class="">reply</th>

                            <th class="wd-15p">delete</th>
                        </tr>
                    </thead>
                    <tbody>

                     <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                        <td>
                            <?php echo e(@$info->id); ?> 
                            <?php if($info->read == 0): ?>
                            <div class="d-inline p-2 bg-primary text-white">لم يتم القراءه</div>
                          
                            <?php elseif($info->reply == 1): ?>
                            <div class="d-inline p-2 bg-primary text-white">تم  الرد</div>
                           
                            <?php endif; ?>
                        </td>
                        <td title="<?php echo e(@$info->name); ?>"><?php echo e(substr(@$info->name,0,50).'...'); ?></td>
                        <td><?php echo e(@$info->email); ?></td>
                        <td>
                        <a href="<?php echo e(URL::to('/')); ?>/admin/contact_us/<?php echo e(@$info->id); ?>/reply"><li class="fa fa-paper-plane btn btn-primary"></li></a>
                       </td>

                       <td>
                        <a href="<?php echo e(URL::to('/')); ?>/admin/contact_us/<?php echo e(@$info->id); ?>/delete"><li class="fa fa-trash-o btn btn-danger"></li></a>
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