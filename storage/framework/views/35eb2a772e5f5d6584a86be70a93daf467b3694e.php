<?php $__env->startSection('content'); ?>

<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/home')); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/categories')); ?>">Categories</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categories List</li>
            </ol>
            <h6 class="slim-pagetitle">Categories</h6>
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
                            <th class="wd-15p">#</th>
                            <th class="wd-15p">Name Ar</th>
                            <th class="wd-15p">Name En</th>
                            <th class="wd-15p">icon</th>

                            <th class="wd-15p">create sub</th>
                            <th class="wd-15p">sub Categories</th>
                            <th class="wd-15p">edit</th>
                            <th class="wd-15p">delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(@$category->id); ?></td>
                            <td><?php echo e(@$category->name_ar); ?> </td>               
                            <td><?php echo e(@$category->name_en); ?> </td>                        
                            <td>
                                <img src="<?php echo e(URL::to('/')); ?>/<?php echo e(@$category->icon); ?>" width="50" height="50" >
                            </td>                        
                            <td>
                               <a href="<?php echo e(URL::to('/')); ?>/admin/categories/<?php echo e(@$category->id); ?>/sub/create">
                                    <li class="fa fa-send btn btn-info"></li>
                               </a>
                            </td>
                             <td>
                               <a href="<?php echo e(URL::to('/')); ?>/admin/categories/<?php echo e(@$category->id); ?>/sub">
                                    <li class="fa fa-database btn btn-primary"></li>
                               </a>
                            </td>
                            <td>
                               <a href="<?php echo e(URL::to('/')); ?>/admin/categories/<?php echo e(@$category->id); ?>/edit"><li class="fa fa-pencil btn btn-warning"></li></a>
                            </td>
                            <td>
                             <?php echo $__env->make('admin.categories.delete_model', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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