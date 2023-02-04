

<?php $__env->startSection('content'); ?>

<div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading"><?php echo e(__('Website Contents')); ?></h4>
                    <ul class="links">
                      <li>
                        <a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Dashboard')); ?> </a>
                      </li>
                      <li>
                        <a href="javascript:;"><?php echo e(__('Generel Settings')); ?></a>
                      </li>
                      <li>
                        <a href="<?php echo e(route('admin-gs-contents')); ?>"><?php echo e(__('Website Contents')); ?></a>
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
                        <form action="<?php echo e(route('admin-gs-update')); ?>" id="geniusform" method="POST" enctype="multipart/form-data">
                          <?php echo e(csrf_field()); ?>


                        <?php echo $__env->make('includes.admin.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading"><?php echo e(__('Website Title')); ?> *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="<?php echo e(__('Write Your Site Title Here')); ?>" name="title" value="<?php echo e($gs->title); ?>" required="">
                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading"><?php echo e(__('Theme Color')); ?> *</h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group"> 
                                <div class="input-group colorpicker-component cp">
                                  <input type="text" name="colors" value="<?php echo e($gs->colors); ?>"  class="form-control cp"  />
                                  <span class="input-group-addon"><i></i></span>
                                </div>
                              </div>
                  
                          </div>
                        </div>


                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                              <h4 class="heading">
                                 <?php echo e(__('Google ReCapcha')); ?>

                              </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="action-list">
                                  <select class="process select droplinks <?php echo e($gs->is_capcha== 1 ? 'drop-success' : 'drop-danger'); ?>">
                                    <option data-val="1" value="<?php echo e(route('admin-gs-iscapcha',1)); ?>" <?php echo e($gs->is_capcha == 1 ? 'selected' : ''); ?>><?php echo e(__('Activated')); ?></option>
                                    <option data-val="0" value="<?php echo e(route('admin-gs-iscapcha',0)); ?>" <?php echo e($gs->is_capcha == 0 ? 'selected' : ''); ?>><?php echo e(__('Deactivated')); ?></option>
                                  </select>
                                </div>
                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                              <h4 class="heading">
                                  <?php echo e(__('Google ReCapcha Site Key')); ?> *
                              </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="tawk-area">
                                <textarea  name="capcha_site_key"><?php echo e($gs->capcha_site_key); ?></textarea>
                              </div>
                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                              <h4 class="heading">
                                  <?php echo e(__('Google ReCapcha Secret Key')); ?> *
                              </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="tawk-area">
                                <textarea  name="capcha_secret_key"><?php echo e($gs->capcha_secret_key); ?></textarea>
                              </div>
                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading"><?php echo e(__('Website Timezone')); ?> *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <select name="time_zone" class="input-field" required>
                              <?php $__currentLoopData = App\Models\Generalsetting::timezones(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>" <?php echo e($gs->time_zone == $key ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                           


                            
                          </div>
                        </div>




                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                  <h4 class="heading"><?php echo e(__('Bid Increase')); ?> *
                                    </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <input type="number" min="0"  class="input-field" placeholder="<?php echo e(__('Bid Increase')); ?>" name="bid_increase" value="<?php echo e($gs->bid_increase); ?>" required="">
                            </div>
                          </div>

                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    <?php echo e(__('Tawk.to')); ?>

                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks <?php echo e($gs->is_talkto == 1 ? 'drop-success' : 'drop-danger'); ?>">
                                      <option data-val="1" value="<?php echo e(route('admin-gs-talkto',1)); ?>" <?php echo e($gs->is_talkto == 1 ? 'selected' : ''); ?>><?php echo e(__('Activated')); ?></option>
                                      <option data-val="0" value="<?php echo e(route('admin-gs-talkto',0)); ?>" <?php echo e($gs->is_talkto == 0 ? 'selected' : ''); ?>><?php echo e(__('Deactivated')); ?></option>
                                    </select>
                                  </div>
                            </div>
                          </div>
                          <div class="row justify-content-center">
                              <div class="col-lg-3">
                                <div class="left-area">
                                  <h4 class="heading">
                                      <?php echo e(__('Tawk.to Widget Code')); ?> *
                                  </h4>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="tawk-area">
                                    <textarea  name="talkto"><?php echo e($gs->talkto); ?></textarea>
                                  </div>
                              </div>
                            </div>


                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    <?php echo e(__('Disqus')); ?>

                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks <?php echo e($gs->is_disqus == 1 ? 'drop-success' : 'drop-danger'); ?>">
                                      <option data-val="1" value="<?php echo e(route('admin-gs-isdisqus',1)); ?>" <?php echo e($gs->is_disqus == 1 ? 'selected' : ''); ?>><?php echo e(__('Activated')); ?></option>
                                      <option data-val="0" value="<?php echo e(route('admin-gs-isdisqus',0)); ?>" <?php echo e($gs->is_disqus == 0 ? 'selected' : ''); ?>><?php echo e(__('Deactivated')); ?></option>
                                    </select>
                                  </div>
                            </div>
                          </div>
                          <div class="row justify-content-center">
                              <div class="col-lg-3">
                                <div class="left-area">
                                  <h4 class="heading">
                                      <?php echo e(__('Disqus Universal Code')); ?> *
                                  </h4>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="tawk-area">
                                    <textarea  name="disqus"><?php echo e($gs->disqus); ?></textarea>
                                  </div>
                              </div>
                            </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                              
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <button class="addProductSubmit-btn" type="submit"><?php echo e(__('Save')); ?></button>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\new_file\AuctionPro-Files\project\resources\views/admin/generalsetting/websitecontent.blade.php ENDPATH**/ ?>