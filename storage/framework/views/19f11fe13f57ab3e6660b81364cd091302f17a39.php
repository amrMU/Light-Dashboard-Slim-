<?php $__env->startSection('content'); ?>

<div class="slim-mainpanel">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/panel')); ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
      <h6 class="slim-pagetitle">Dashboard</h6>
    </div><!-- slim-pageheader -->
    
          <div class="row row-xs">
          
          <div class="col-sm-7 col-lg-4">
            <div class="card card-status">
              <a href="<?php echo e(URL::to('/admin/lates_jobs')); ?>">
              <div class="media">
                <i class="icon ion-ios-cloud-download-outline tx-purple"></i>
                <div class="media-body">
                  <h1>570000</h1>
                  <p>Total Jobs</p>
                </div><!-- media-body -->
              </div><!-- media -->
              </a>

            </div><!-- card -->
          </div><!-- col-3 -->
        
          <div class="col-sm-7 col-lg-4 mg-t-10 mg-sm-t-0 mg-b-20">
            <div class="card card-status">
            <a href="<?php echo e(URL::to('/admin/latest_members')); ?>">
              <div class="media">
                <i class="icon ion-ios-bookmarks-outline tx-teal"></i>
                <div class="media-body">
                  <h1><?php echo e(@$latest_members); ?></h1>
                  <p>Latest Members</p>
                </div><!-- media-body -->
              </div><!-- media -->
            </a>

            </div><!-- card -->
          </div><!-- col-3 -->
       
          <div class="col-sm-7 col-lg-4 mg-t-10 mg-lg-t-0">
            <div class="card card-status">
              <a href="<?php echo e(URL::to('/admin/interviews/calendar')); ?>">
              <div class="media">
                <i class="icon ion-ios-analytics-outline tx-pink"></i>
                <div class="media-body">
                  <h1>2,942</h1>
                  <p>Interviews Dates</p>
                </div><!-- media-body -->
              </div><!-- media -->
              </a>
            </div><!-- card -->
          </div><!-- col-3 -->
        </div><!-- row -->

    
    
    <div class="section-wrapper">
          <label class="section-title">Dashboard</label>
          <p class="mg-b-20 mg-sm-b-40"> You are logged in as <?php echo e(@Auth::user()->type_user); ?>!</p>
    </div><!-- section-wrapper -->
    
    
  </div><!-- container -->
</div><!-- slim-mainpanel -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>