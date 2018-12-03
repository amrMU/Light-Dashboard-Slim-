<?php $__env->startSection('content'); ?>

<div class="slim-mainpanel">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/panel')); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(URL::to('/admin/panel')); ?>">Members </a></li>
        <li class="breadcrumb-item active" aria-current="page">Latest Members list</li>
      </ol>
      <h6 class="slim-pagetitle">Latest Members List</h6>
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

      <?php echo Form::open(['method' => 'get', 'url' => 'admin/find/member/date', 'class' => 'form-horizontal']); ?>

    <div class="row  mg-b-15">
      <div class="col-lg-12">Fillter By Dates</div>
      <div class="col-lg-5">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">From</span>
          </div>
           <input type="text" name="from" class="form-control fc-datepicker" placeholder="MM/DD/YYYY" value="<?php echo e(@$from); ?>">
        </div><!-- input-group -->
      </div><!-- col-4 -->

       <div class="col-lg-5">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">To</span>
          </div>
           <input type="text" name="to" class="form-control fc-datepicker" placeholder="MM/DD/YYYY" value="<?php echo e(@$to); ?>">
        </div><!-- input-group -->
      </div><!-- col-4 -->


      <div class="col-lg-2 mg-t-20 mg-lg-t-0">
        <div class="input-group">
            <button class="btn btn-primary">Find..</button>
        </div><!-- input-group -->
      </div><!-- col-sm-4 -->
    </div><!-- row -->
      <?php echo Form::close(); ?>


  <div class="table-wrapper">
    <table id="datatable1" class="table display responsive nowrap">
      <thead>
        <tr>
          <th class="wd-15p">#</th>
          <th class="wd-15p">Name</th>
          <th class="wd-20p">email</th>
          <th class="wd-20p">phone</th>
          <th class="wd-20p">User Status</th>
          <th class="wd-20p">User Type</th>
          <th class="wd-20p">Signup  Time</th>
          <th class="wd-20p">susbend</th>
          <th class="wd-20p">deactivate</th>
          <th class="wd-15p">edit</th>
          <th class="wd-15p">delete</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e(@$user->id); ?></td>
          <td><?php echo e(@$user->name); ?></td>
          <td><?php echo e(@$user->email); ?></td>
          <td><?php echo e(@$user->phone); ?></td>
          <td><?php echo e(@$user->status); ?></td>
          <td><?php echo e(@$user->type_user); ?></td>
          <td title="<?php echo e(@$user->created_at); ?>"><?php echo e(@$user->created_at->diffForHumans()); ?></td>
          <td>
            
            
            <?php if($user->status != "suspended" ): ?>
            <a href="" class="btn btn-danger" data-toggle="modal" data-target="#modaldemo<?php echo e(@$user->id); ?>"><li class="fa fa-ban"></li></a>
            
            
            <?php elseif($user->status == "suspended"): ?>
            
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#susbendMessage<?php echo e(@$user->id); ?>"><li class="fa fa-eye"></li></a>
            <div id="susbendMessage<?php echo e(@$user->id); ?>" class="modal fade">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content tx-size-sm">
                  <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Reasone Susbend</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body pd-20">
                    <h5 class=" lh-3 mg-b-20">
                      <p class="mg-b-5">
                        <?php echo e(@$user->suspended_reason); ?>

                      </p>
                    </div><!-- modal-body -->
                    <div class="modal-footer">
                      <a href="<?php echo e(URL::to('/admin')); ?>/users/<?php echo e(@$user->id); ?>/active" class="btn btn-primary">Active</a>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div><!-- modal-dialog -->
              </div><!-- modal -->
              
              <?php endif; ?>
              
              
              <?php echo Form::open(['method' => 'POST', 'url' => 'admin/users/suspended/'.@$user->id, 'class' => 'form-horizontal']); ?>

              <div id="modaldemo<?php echo e(@$user->id); ?>" class="modal fade">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content tx-size-sm">
                    <div class="modal-header pd-x-20">
                      <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Give User Reasone For Susbend</h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body pd-20">
                      <h5 class=" lh-3 mg-b-20">
                        <p class="mg-b-5">
                          <div class="form-group mg-b-10">
                            <div class="row row-sm">
                              <div class="col-9 col-sm-8 col-xl-12">
                                <label title="Give Me User Message ">message: <span class="tx-danger">*</span></label>
                                <input type="text" name="message" class="form-control " placeholder="write your reasone" required value="<?php echo e(Request::old('message')); ?>">
                              </div><!-- col-8 -->
                            </div><!-- row -->
                          </div>
                        </p>
                      </div><!-- modal-body -->
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div><!-- modal-dialog -->
                </div><!-- modal -->
                <?php echo Form::close(); ?>

                
                
              </td>
              <td> 
               
               
               <?php if($user->status != "deactive" ): ?>
               
               <a href="" class="btn btn-danger" data-toggle="modal" data-target="#Modeldeactivate<?php echo e(@$user->id); ?>"><li class="fa fa-ban"></li></a>
               
               <?php elseif($user->status == "deactive"): ?>
               
               <a href="" class="btn btn-primary" data-toggle="modal" data-target="#deactiveMessage<?php echo e(@$user->id); ?>"><li class="fa fa-eye"></li></a>
               <div id="deactiveMessage<?php echo e(@$user->id); ?>" class="modal fade">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content tx-size-sm">
                    <div class="modal-header pd-x-20">
                      <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Reasone Susbend</h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body pd-20">
                      <h5 class=" lh-3 mg-b-20">
                        <p class="mg-b-5">
                          <?php echo e(@$user->deactive_reason); ?>

                        </p>
                      </div><!-- modal-body -->
                      <div class="modal-footer">
                        <a href="<?php echo e(URL::to('/admin')); ?>/users/<?php echo e(@$user->id); ?>/active" class="btn btn-primary">Active</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div><!-- modal-dialog -->
                </div><!-- modal -->
                
                <?php endif; ?>
                
                
                <?php echo Form::open(['method' => 'POST', 'url' => 'admin/users/deactivate/'.@$user->id, 'class' => 'form-horizontal']); ?>

                <div id="Modeldeactivate<?php echo e(@$user->id); ?>" class="modal fade">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content tx-size-sm">
                      <div class="modal-header pd-x-20">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Give User Reasone For deactivate</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body pd-20">
                        <h5 class=" lh-3 mg-b-20">
                          <p class="mg-b-5">
                            <div class="form-group mg-b-10">
                              <div class="row row-sm">
                                <div class="col-9 col-sm-8 col-xl-12">
                                  <label title="Give Me User Message ">message: <span class="tx-danger">*</span></label>
                                  <input type="text" name="message" class="form-control " placeholder="write your reasone" required value="<?php echo e(Request::old('message')); ?>">
                                </div><!-- col-8 -->
                              </div><!-- row -->
                            </div>
                          </p>
                        </div><!-- modal-body -->
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Save changes</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div><!-- modal-dialog -->
                  </div><!-- modal -->
                  <?php echo Form::close(); ?>

                  
                </td>

                <td>
                  
                  <a href="<?php echo e(URL::to('/')); ?>/admin/job_seekers/<?php echo e(@$user->id); ?>/edit"><li class="fa fa-pencil btn btn-warning"></li></a>
                  
                </td>
                <td>
                  <?php echo $__env->make('panel.job_seeker.latest_delete_model', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div>
        
      </div><!-- container -->
    </div><!-- slim-mainpanel -->

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>