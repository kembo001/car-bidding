

<?php $__env->startSection('content'); ?>
            <div class="content-area">

            <div class="mr-breadcrumb">
              <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading"><?php echo e(__('Group Email')); ?></h4>
                    <ul class="links">
                      <li>
                        <a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Dashboard')); ?> </a>
                      </li>
                      <li>
                        <a href="javascript:;"><?php echo e(__('Email Settings')); ?></a>
                      </li>
                      <li>
                        <a href="<?php echo e(route('admin-group-show')); ?>"><?php echo e(__('Group Email')); ?></a>
                      </li>
                    </ul>
                </div>
              </div>
            </div>

              <div class="add-product-content">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">
                        <div class="gocover" style="background: url(<?php echo e(asset('assets/images/'.$gs->admin_loader)); ?>) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                      <form id="geniusform" action="<?php echo e(route('admin-group-submit')); ?>" method="POST" enctype="multipart/form-data">

                        <?php echo $__env->make('includes.admin.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  

                        
                        <?php echo e(csrf_field()); ?>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading"><?php echo e(__('Select User Type')); ?>*</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <select class="input-field" name="type" required="">
                                <option value=""> <?php echo e(__('Choose User Type')); ?> </option>
                                <option value="0"><?php echo e(__('Customers')); ?></option>
                                <option value="2"><?php echo e(__('Subscribers')); ?></option>
                              </select>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading"><?php echo e(__('Email Subject')); ?> *</h4>
                                <p class="sub-heading">(<?php echo e(__('In Any Language')); ?>)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="subject" placeholder="<?php echo e(__('Email Subject')); ?>" value="" required="">
                          </div>
                        </div>



                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              <h4 class="heading">
                                   <?php echo e(__('Email Body')); ?> *
                              </h4>
                              <p class="sub-heading">(<?php echo e(__('In Any Language')); ?>)</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <textarea class="nic-edit" name="body" placeholder="<?php echo e(__('Details')); ?>"></textarea> 
                          </div>
                        </div>


                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <button class="addProductSubmit-btn" type="submit"><?php echo e(__('Send Email')); ?></button>
                          </div>
                        </div>
                      </form>


                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\new_file\AuctionPro-Files\project\resources\views/admin/email/group.blade.php ENDPATH**/ ?>