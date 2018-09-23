<!DOCTYPE html>
<?php if(LaravelLocalization::getCurrentLocale() == 'ar'): ?>
<html lang="ar"  dir="rtl">
<?php else: ?>
<html lang="en" >
<?php endif; ?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Twitter -->
  <meta name="twitter:site" content="<?php echo e(URL::to('/')); ?>">
  <meta name="twitter:title" content="<?php echo e(@$setting->site_name); ?>">
  <meta name="twitter:description" content="<?php echo e(@$setting->description_ar); ?>.">
  <meta name="twitter:image" content="<?php echo e(URL::to('/')); ?><?php echo e(@$setting->logo); ?>">

  <!-- Facebook -->
  <meta property="og:url" content="<?php echo e(URL::to('/')); ?>">
  <meta property="og:title" content="<?php echo e(@$setting->site_name); ?>">
  <meta property="og:description" content="<?php echo e(@$setting->description_ar); ?>.">

  <meta property="og:image" content="<?php echo e(URL::to('/')); ?><?php echo e(@$setting->logo); ?>">
  <meta property="og:image:secure_url" content="<?php echo e(URL::to('/')); ?>">


  <!-- Meta -->
  <meta name="description" content="<?php echo e(@$setting->meta_tags); ?>.">
  <meta name="author" content="<?php echo e(URL::to('/')); ?>">

  <title><?php echo e(@$setting->site_name); ?></title>

  <!-- vendor css -->
  <link href="<?php echo e(URL::to('/assets')); ?>/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="<?php echo e(URL::to('/assets')); ?>/lib/Ionicons/css/ionicons.css" rel="stylesheet">
  <link href="<?php echo e(URL::to('/assets')); ?>/lib/fullcalendar/css/fullcalendar.css" rel="stylesheet">

  <link href="<?php echo e(URL::to('/assets')); ?>/lib/datatables/css/jquery.dataTables.css" rel="stylesheet">
  
  <link href="<?php echo e(URL::to('/assets')); ?>/lib/medium-editor/css/medium-editor.css" rel="stylesheet">
  <link href="<?php echo e(URL::to('/assets')); ?>/lib/medium-editor/css/default.css" rel="stylesheet">

  <link href="<?php echo e(URL::to('/assets')); ?>/lib/summernote/css/summernote-bs4.css" rel="stylesheet">
  
  
     <link href="<?php echo e(URL::to('/assets')); ?>/lib/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet">

  
  <!-- Slim CSS -->
  <link rel="stylesheet" href="<?php echo e(URL::to('/assets')); ?>/css/slim.css">
  

</head>
<body >

  <div class="slim-header">
    <div class="container">
      <div class="slim-header-left">
        <h2 class="slim-logo"><a href="<?php echo e(URL::to('/admin/home')); ?>"><?php echo e(@$setting->site_name); ?><span>.</span></a></h2>

      </div><!-- slim-header-left -->
      <div class="slim-header-right">
        <div class="dropdown dropdown-a">
         
          <div class="dropdown-menu">
            <div class="dropdown-menu-header">
              <h6 class="dropdown-menu-title">Activity Logs</h6>
              <div>
                <a href="">Filter List</a>
                <a href="">Settings</a>
              </div>
            </div><!-- dropdown-menu-header -->
            <div class="dropdown-activity-list">
              <div class="activity-label">Today, December 13, 2017</div>
              <div class="activity-item">
                <div class="row no-gutters">
                  <div class="col-2 tx-right">10:15am</div>
                  <div class="col-2 tx-center"><span class="square-10 bg-success"></span></div>
                  <div class="col-8">Purchased christmas sale cloud storage</div>
                </div><!-- row -->
              </div><!-- activity-item -->
              <div class="activity-item">
                <div class="row no-gutters">
                  <div class="col-2 tx-right">9:48am</div>
                  <div class="col-2 tx-center"><span class="square-10 bg-danger"></span></div>
                  <div class="col-8">Login failure</div>
                </div><!-- row -->
              </div><!-- activity-item -->
              <div class="activity-item">
                <div class="row no-gutters">
                  <div class="col-2 tx-right">7:29am</div>
                  <div class="col-2 tx-center"><span class="square-10 bg-warning"></span></div>
                  <div class="col-8">(D:) Storage almost full</div>
                </div><!-- row -->
              </div><!-- activity-item -->
              <div class="activity-item">
                <div class="row no-gutters">
                  <div class="col-2 tx-right">3:21am</div>
                  <div class="col-2 tx-center"><span class="square-10 bg-success"></span></div>
                  <div class="col-8">1 item sold <strong>Christmas bundle</strong></div>
                </div><!-- row -->
              </div><!-- activity-item -->
              <div class="activity-label">Yesterday, December 12, 2017</div>
              <div class="activity-item">
                <div class="row no-gutters">
                  <div class="col-2 tx-right">6:57am</div>
                  <div class="col-2 tx-center"><span class="square-10 bg-success"></span></div>
                  <div class="col-8">Earn new badge <strong>Elite Author</strong></div>
                </div><!-- row -->
              </div><!-- activity-item -->
            </div><!-- dropdown-activity-list -->
            <div class="dropdown-list-footer">
              <a href="page-activity.html"><i class="fa fa-angle-down"></i> Show All Activities</a>
            </div>
          </div><!-- dropdown-menu-right -->
        </div><!-- dropdown -->
        <div class="dropdown dropdown-b">
        
          <div class="dropdown-menu">
           
            <div class="dropdown-list">
              <!-- loop starts here -->
              <a href="" class="dropdown-link">
                <div class="media">
                  <img src="http://via.placeholder.com/500x500" alt="">
                  <div class="media-body">
                    <p><strong>Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                    <span>October 03, 2017 8:45am</span>
                  </div>
                </div><!-- media -->
              </a>
              <!-- loop ends here -->
              <a href="" class="dropdown-link">
                <div class="media">
                  <img src="http://via.placeholder.com/500x500" alt="">
                  <div class="media-body">
                    <p><strong>Mellisa Brown</strong> appreciated your work <strong>The Social Network</strong></p>
                    <span>October 02, 2017 12:44am</span>
                  </div>
                </div><!-- media -->
              </a>
              <a href="" class="dropdown-link read">
                <div class="media">
                  <img src="http://via.placeholder.com/500x500" alt="">
                  <div class="media-body">
                    <p>20+ new items added are for sale in your <strong>Sale Group</strong></p>
                    <span>October 01, 2017 10:20pm</span>
                  </div>
                </div><!-- media -->
              </a>
              <a href="" class="dropdown-link read">
                <div class="media">
                  <img src="http://via.placeholder.com/500x500" alt="">
                  <div class="media-body">
                    <p><strong>Julius Erving</strong> wants to connect with you on your conversation with <strong>Ronnie Mara</strong></p>
                    <span>October 01, 2017 6:08pm</span>
                  </div>
                </div><!-- media -->
              </a>
              <div class="dropdown-list-footer">
                <a href="page-notifications.html"><i class="fa fa-angle-down"></i> Show All Notifications</a>
              </div>
            </div><!-- dropdown-list -->
          </div><!-- dropdown-menu-right -->
        </div><!-- dropdown -->
        <div class="dropdown dropdown-c">
          <a href="#" class="logged-user" data-toggle="dropdown">
            <img src="<?php echo e(URL::to('/')); ?>/<?php echo e(@Auth::user()->image); ?>" alt="">
            <span><?php echo e(@Auth::user()->name); ?></span>
            <i class="fa fa-angle-down"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <nav class="nav">
              <a href="<?php echo e(URL::to('/admin/settings')); ?>" class="nav-link"><i class="icon ion-ios-gear"></i> General Settings</a>
              <a href="<?php echo e(URL::to('/admin/user/reset_password')); ?>" class="nav-link"><i class="icon ion-ios-gear"></i> Account Settings</a>
              <a href="<?php echo e(URL::to('/admin/logout')); ?>" class="nav-link"><i class="icon ion-forward"></i> Sign Out</a>
            </nav>
          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
      </div><!-- header-right -->
    </div><!-- container -->
  </div><!-- slim-header -->

  <div class="slim-navbar">
    <div class="container">
      <ul class="nav">
        
        <li class="nav-item with-sub ">
          <a class="nav-link" href="#">
          
            <i class="icon ion-grid"></i>
            <span>More</span> &nbsp;
             
            <?php if($contactus_requests_count > 0): ?>
            <i class="fa fa-bell-o text-primary"><?php echo e(@$contactus_requests_count); ?></i>
            <?php endif; ?>
            
          
          </a>
          <div class="sub-item ">
            <ul>
              <li class="sub-with-sub">
                <a href="#">Pages</a>
                <ul >
                 <li><a href="<?php echo e(URL::to('/admin/about_us/create')); ?>">About Us</a></li>
                 <li><a href="<?php echo e(URL::to('/admin/terms/create')); ?>">terms</a></li>
                 <li><a href="<?php echo e(URL::to('/admin/policy/create')); ?>">policy</a></li>
                 
                </ul>
              </li>
              <li class="sub-with-sub">
                <a href="#">Faq</a>
                <ul >
                 <li><a href="<?php echo e(URL::to('/admin/faqs')); ?>">Faq </a></li>
                 <li><a href="<?php echo e(URL::to('/admin/faqs/create')); ?>">New</a></li>
               </ul>
             </li>
              <li class="">
                <a href="<?php echo e(URL::to('admin/contact_us')); ?>">Contact Us Requests 
                <?php if($contactus_requests_count > 0): ?>
                <span class="fa fa-bell-o text-primary"></span><span class="text-primary"><?php echo e(@$contactus_requests_count); ?></span>
                <?php endif; ?>
                </a>
                <ul>
                  
                </ul>
              </li>
            </ul>
          </div><!-- dropdown-menu -->
        </li>

        <li class="nav-item with-sub">
          <a class="nav-link" href="#">
            <i class="icon icon ion-person-stalker"></i>
            <span>Users</span>
          </a>
          <div class="sub-item">
            <ul>
             
              <li class="sub-with-sub">
                <a href="#">Admin</a>
                <ul>
                  <li><a href="<?php echo e(URL::to('/admin/admins')); ?>">Admins List</a></li>
                  <li><a href="<?php echo e(URL::to('/admin/admins/create')); ?>">New</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- dropdown-menu -->
        </li> 

        <li class="nav-item with-sub ">

          <a class="nav-link" href="#">
            <i class="icon icon ion-flag"></i>
            <span>Areas</span>
          </a>
          <div class="sub-item">
            <ul>
              <li class="sub-with-sub">
                <a href="#">countries</a>
                <ul>
                  <li><a href="<?php echo e(URL::to('/admin/countries')); ?>">Countries</a></li>
                  <li><a href="<?php echo e(URL::to('/admin/countries/create')); ?>">New</a></li>
                </ul>
              </li>
               <li class="sub-with-sub">
                <a href="#">Cities</a>
                <ul>
                  <li><a href="<?php echo e(URL::to('/admin/cities')); ?>">Cities</a></li>
                  <li><a href="<?php echo e(URL::to('/admin/cities/create')); ?>">New</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- dropdown-menu -->
        </li>


        <li class="nav-item with-sub ">
          <a class="nav-link" href="#">&nbsp;
            <i class="icon ion-settings"></i>
            <span>categories</span>
          </a>&nbsp;
          <div class="sub-item">
            <ul>
              <li><a href="<?php echo e(URL::to('/admin/categories')); ?>">Categories List</a></li>
              <li><a href="<?php echo e(URL::to('/admin/categories/create')); ?>">New</a></li>
            </ul>
          </div><!-- dropdown-menu -->
        </li>

        <li class="nav-item with-sub ">
          <a class="nav-link" href="#">&nbsp;
            <i class="icon ion-images"></i>
            <span>slider</span>
          </a>&nbsp;
          <div class="sub-item">
            <ul>
              <li><a href="<?php echo e(URL::to('/admin/slider/create')); ?>">Slider</a></li>
              <li><a href="<?php echo e(URL::to('/admin/slider/create')); ?>">New</a></li>
            </ul>
          </div><!-- dropdown-menu -->
        </li>

        <li class="nav-item ">
          <a class="nav-link" href="<?php echo e(URL::to('/admin/home')); ?>">
            <i class="icon ion-home"></i>
            <span>Dashboard</span>
          </a>
        </li>

      </ul>
    </div><!-- container -->
  </div><!-- slim-navbar -->
  <?php echo $__env->yieldContent('content'); ?>
  

  <script src="<?php echo e(URL::to('/assets')); ?>/lib/jquery/js/jquery.js"></script>
  
  <script src="<?php echo e(URL::to('/assets')); ?>/lib/popper.js/js/popper.js"></script>
  <script src="<?php echo e(URL::to('/assets')); ?>/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo e(URL::to('/assets')); ?>/lib/datatables/js/jquery.dataTables.js"></script>
  <script src="<?php echo e(URL::to('/assets')); ?>/lib/datatables-responsive/js/dataTables.responsive.js"></script>
  <script src="<?php echo e(URL::to('/assets')); ?>/lib/summernote/js/summernote-bs4.min.js"></script>
  <script src="<?php echo e(URL::to('/assets')); ?>/lib/jquery-ui/js/jquery-ui.js"></script>
  <script src="<?php echo e(URL::to('/assets')); ?>/lib/medium-editor/js/medium-editor.js"></script>
  
  <script src="<?php echo e(URL::to('/assets')); ?>/lib/moment/js/moment.js"></script>
  

  <script src="<?php echo e(URL::to('/assets')); ?>/lib/fullcalendar/js/fullcalendar.js"></script>


  <script src="<?php echo e(URL::to('/assets')); ?>/lib/jquery.maskedinput/js/jquery.maskedinput.js"></script>
  <script src="<?php echo e(URL::to('/assets')); ?>/lib/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/ckeditor/ckeditor.js"></script>
 
  <script>
    CKEDITOR.replace( 'editor1' );
    CKEDITOR.config.extraPlugins = 'justify';
    CKEDITOR.replace( 'editor2' );
    CKEDITOR.config.extraPlugins = 'justify';
    CKEDITOR.replace( 'editor3' );
    CKEDITOR.config.extraPlugins = 'justify';
  </script>


<script src="<?php echo e(URL::to('/assets')); ?>/js/slim.js"></script>

<script>
  $(function(){
    'use strict';

        // Inline editor
        var editor = new MediumEditor('.editable');

        // Summernote editor
        $('#summernote').summernote({
          height: 150,
          tooltip: false
        })
      });
    </script>
  
  <script>
   var wrapper = $(".input_wrap>div");
   var add_button = $(".add_field_button");

   $(add_button).click(function (e) {
    e.preventDefault();
    $(wrapper).after('<div class="col-9 col-sm-8 col-xl-12"><div class="col-9 col-sm-8 col-xl-12"><label title="plan feature">feature: <span class="tx-danger">*</span></label><a href="#" class="remove_field btn btn-danger pull-right mg-b-5 mg-t-5">-</a><input type="text" name="feature[]" class="form-control " required value=""></div></div>'); //add input box
  });

   $(document).on("click",".remove_field",function(){
    $(this).parent().remove();
  });
</script>

  

<script>

  $(function(){
    'use strict'

        // Datepicker
        $('.fc-datepicker').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true
        });

        $('#datepickerNoOfMonths').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true,
          numberOfMonths: 2
        });

      });
    </script>
    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          },
            // "aaSorting": [[0,'desc']]
            "aaSorting": []
          });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>
    <?php echo $__env->yieldContent('jsCode'); ?>

  </body>
  </html>
