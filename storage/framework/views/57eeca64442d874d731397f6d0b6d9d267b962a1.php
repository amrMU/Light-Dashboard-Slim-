<?php $__env->startSection('content'); ?>
<div class="slim-mainpanel">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/admin')); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/settings')); ?>">Settings</a></li>
        <li class="breadcrumb-item active" aria-current="page">update Info</li>
      </ol>
      <h6 class="slim-pagetitle">Settings</h6>
    </div><!-- slim-pageheader -->
    <?php echo Form::open(['method'=>'post','url'=>'admin/contact_us_settings','class'=>"form-horizontal" ,'role'=>"form",'files'=>'true']); ?>

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
         
              <div class="row row-sm ">
                <div class="col-9 col-sm-8 col-xl-9 ">
                 <label class="col-9 col-sm-8 col-xl-9 mg-10 control-label ">Site Name</label>
                 <div class="col-12 col-sm-8 col-xl-12 pull-right">
                   <input type="text" name="site_name" class="form-control input-lg" required placeholder="Site Name" value="<?php echo e(@$info->site_name); ?>">
                 </div><!-- col-8 -->
               </div>
               <div class="col-3 col-sm-2 col-xl-3">
                 <img src="<?php echo e(URL::To('/')); ?><?php echo e(@$info->logo); ?>" class="img-fluid rounded" alt="">
               </div><!-- Logo -->
            </div><!-- row -->
            
           <div class="col-9 col-sm-8 col-xl-9">
             <div class="row row-sm mg-10">
               <label class="col-9 col-sm-8 col-xl-12 mg-10 control-label ">Description</label>
              <div class="col-9 col-sm-8 col-xl-12 ">
               <input type="text" name="description_ar"  class="form-control input-lg" required placeholder="description"  value="<?php echo e(@$info->description_ar); ?>">
             </div><!-- col-8 -->
            </div><!-- row -->
            
            <div class="row row-sm mg-10">
               <label class="col-9 col-sm-8 col-xl-12 mg-10 control-label ">Email</label>
              <div class="col-9 col-sm-8 col-xl-12">
               <input type="email" name="email" class="form-control input-lg" required placeholder="Email" value="<?php echo e(@$info->email); ?>">
             </div><!-- col-8 -->
            </div><!-- row -->

            <div class="row row-sm mg-10">
               <label class="col-9 col-sm-8 col-xl-12 mg-10 control-label ">address</label>
               <div class="col-9 col-sm-8 col-xl-12">
                <input type="text" name="description" class="form-control" placeholder="adress" value="<?php echo e(@$info->address); ?>" title="find" />
              </div>
            </div>

             <div class="row row-sm mg-10">
               <label class="col-9 col-sm-8 col-xl-12 mg-10 control-label ">meta tags</label>
              <div class="col-9 col-sm-8 col-xl-12 ">
               <input type="text" name="meta_tags" class="pull-right" data-role="tagsinput"  class="form-control input-lg" required placeholder=""  value="<?php echo e(@$info->meta_tags); ?>">
             </div><!-- col-8 -->
            </div><!-- row -->



            <div class="row row-sm mg-10">
             <label class="col-9 col-sm-8 col-xl-12 mg-10 control-label ">Facebook Url</label>
             <div class="col-9 col-sm-8 col-xl-12">
                <input type="text" name="fburl" class="form-control input-lg" required placeholder="Facebook Url" value="<?php echo e(@$info->fburl); ?>">
             </div><!-- col-8 -->
           </div><!-- row -->

           <div class="row row-sm mg-10">
             <label class="col-9 col-sm-8 col-xl-12 mg-10 control-label ">Twitter Url</label>
             <div class="col-9 col-sm-8 col-xl-12">
                <input type="text" name="twitter_url" class="form-control input-lg" required placeholder="Twitter Url" value="<?php echo e(@$info->twitter_url); ?>">
             </div><!-- col-8 -->
           </div><!-- row -->

          <div class="row row-sm mg-10">
             <label class="col-9 col-sm-8 col-xl-12 mg-10 control-label ">Google Plus Url</label>
             <div class="col-9 col-sm-8 col-xl-12">
                 <input type="text" name="google_url" class="form-control input-lg" required placeholder="Google Plus URl" value="<?php echo e(@$info->google_url); ?>">
             </div><!-- col-8 -->
           </div><!-- row -->

            

           <div class="input_wrap_whatsapp ">
             <div class="row row-sm mg-10">
               <label class="col-9 col-sm-8 col-xl-12 mg-10">whatsapp</label>
               <button type="button" class="col-md-1 add_field_button_whatsapp btn btn-info pull-right ">+ </button>
             <div class="col-md-11">
             <input type="text" name="whatsapp[]" class="form-control input-lg"  placeholder="whatsapp Numper" value="">
            </div>
           </div><!-- row -->
            

            <?php if(isset($info)): ?>
            <?php $__currentLoopData = $info->whatsapp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $whatsapp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="row row-sm mg-10">
               <label class="col-9 col-sm-8 col-xl-12 mg-10">whatsapp</label>
               <a href="#" class="col-md-1 remove_field btn btn-danger pull-left ">-</a>
             <div class="col-md-11">
               <input type="text" name="whatsapp[]" class="form-control input-lg"  placeholder="whatsapp Numper" value="<?php echo e(@$whatsapp->whatsapp); ?>">
             </div>
           </div><!-- row -->
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php endif; ?>
          
           </div><!--input_wrap_whatsapp-->

            <div class="input_wrap_phone ">
             
             <div class="row row-sm mg-10">
               <label class="col-9 col-sm-8 col-xl-12 mg-10">phone</label>
               <button type="button" class="col-md-1 add_field_button_phone btn btn-info pull-right ">+ </button>
              <!-- col-3 -->
             <div class="col-md-11">
             <input type="text" name="phone[]" class="form-control input-lg"  placeholder="phone Numper" value="">
            </div>
           </div><!-- row -->
            
           
            <?php if(isset($info)): ?>
            <?php $__currentLoopData = $info->phone; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="row row-sm mg-10">
                <label class="col-9 col-sm-8 col-xl-12 mg-10">phone</label>
                <a href="#" class="col-md-1 remove_field btn btn-danger pull-left ">-</a>
             <div class="col-md-11">
               <input type="text" name="phone[]" class="form-control input-lg"  placeholder="phone Numper" value="<?php echo e(@$phone->phone); ?>">
             </div>
           </div><!-- row -->
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <?php endif; ?>
          
           </div><!--input_wrap_whatsapp-->
        
           <div class="row row-sm">
            <label class="col-9 col-sm-8 col-xl-11 mg-r-75" title="profile pic">Logo</label>
              <div class="col-9 mg-t-40 mg-lg-t-0 mg-r-20 custom-file " style="display: block;">
                <input type="file" class="custom-file-input" name="logo" id="customFile2">
                <label class="custom-file-label custom-file-label-primary" for="customFile">Choose file</label>
              </div><!-- col -->
            </div><!-- row -->
            </div><!-- col-9-->
             
            
            

          
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
</div>
</div>
<!-- END SAMPLE FORM PORTLET-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jsCode'); ?>

<script>
 var wrapper = $(".input_wrap_whatsapp>div");
 var add_button = $(".add_field_button_whatsapp");

 $(add_button).click(function (e) {
  e.preventDefault();
        $(wrapper).after('<div class="row row-sm mg-10"><label class="col-9 col-sm-8 col-xl-12 mg-10">whatsapp</label><a href="#" class="col-md-1 remove_field btn btn-danger pull-left ">-</a><div class="col-md-11"><input type="text" name="whatsapp[]" class="form-control input-lg"  placeholder="whatsapp Numper" value=""></div></div>'); //add input box
      });

 $(document).on("click",".remove_field",function(){
  $(this).parent().remove();
});
</script>

<script>
 var wrapper_phone = $(".input_wrap_phone>div");
 var add_button = $(".add_field_button_phone");

 $(add_button).click(function (e) {
  e.preventDefault();
        $(wrapper_phone).after(' <div class="row row-sm mg-10"><label class="col-9 col-sm-8 col-xl-12 mg-10">phone</label><a href="#" class="col-md-1 remove_field btn btn-danger pull-left ">-</a><div class="col-md-11"><input type="text" name="phone[]" class="form-control input-lg"  placeholder="phone Numper" value=""></div></div>'); //add input box
      });


    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>