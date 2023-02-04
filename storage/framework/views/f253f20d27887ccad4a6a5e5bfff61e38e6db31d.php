


<?php $__env->startSection('content'); ?>

  <!-- Breadcrumb Area Start -->
  <div class="breadcrumb-area" style="background: url(<?php echo e($gs->breadcumb_banner ? asset('assets/images/'.$gs->breadcumb_banner):asset('assets/images/noimage.png')); ?>);">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="pagetitle">
            <?php echo e(__("Contact")); ?>

          </h1>

          <ul class="pages">
                
              <li>
                <a href="<?php echo e(route('front.index')); ?>">
                  <?php echo e(__("Home")); ?>

                </a>
              </li>
              <li>
                <a href="<?php echo e(route('front.contact')); ?>">
                  <?php echo e(__("Contact")); ?>

                </a>
              </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb Area End -->

    <!-- Contact Us Area Start -->
    <section class="contact-us">
        <div class="container">
            <div class="row justify-content-between">


                <div class="col-xl-5 col-lg-5">
                    <div class="right-area">
                        <?php if($ps->site != null || $ps->email != null ): ?>
                        <div class="contact-info ">
                            <div class="left ">
                                <div class="icon">
                                    <img src="<?php echo e(asset('assets/front/images/envelop.png')); ?>" alt="">
                                </div>
                            </div>
                            <div class="content d-flex align-self-center">
                                <div class="content">
                                        <?php if($ps->site != null && $ps->email != null): ?> 
                                        <a href="<?php echo e($ps->site); ?>" target="_blank"><?php echo e($ps->site); ?></a>
                                        <a href="mailto:<?php echo e($ps->email); ?>"><?php echo e($ps->email); ?></a>
                                        <?php elseif($ps->site != null): ?>
                                        <a href="<?php echo e($ps->site); ?>" target="_blank"><?php echo e($ps->site); ?></a>
                                        <?php else: ?>
                                        <a href="mailto:<?php echo e($ps->email); ?>"><?php echo e($ps->email); ?></a>
                                        <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if($ps->street != null): ?> 
                        <div class="contact-info">
                                <div class="left">
                                <div class="icon">
                                    <img src="<?php echo e(asset('assets/front/images/matker.png')); ?>" alt="">
                                </div>
                                </div>
                                <div class="content d-flex align-self-center">
                                    <div class="content">
                                            <p>
                                                <?php if($ps->street != null): ?> 
                                                    <?php echo $ps->street; ?>

                                                <?php endif; ?>
                                            </p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($ps->phone != null || $ps->fax != null ): ?> 
                            <div class="contact-info">
                                    <div class="left">
                                <div class="icon">
                                    <img src="<?php echo e(asset('assets/front/images/call.png')); ?>" alt="">
                                </div>
                                    </div>
                                    <div class="content d-flex align-self-center">
                                        <div class="content">
                                            <?php if($ps->phone != null && $ps->fax != null): ?>
                                            <a href="tel:<?php echo e($ps->phone); ?>"><?php echo e($ps->phone); ?></a>
                                            <a href="tel:<?php echo e($ps->fax); ?>"><?php echo e($ps->fax); ?></a>
                                            <?php elseif($ps->phone != null): ?>
                                            <a href="tel:<?php echo e($ps->phone); ?>"><?php echo e($ps->phone); ?></a>
                                            <?php else: ?>
                                            <a href="tel:<?php echo e($ps->fax); ?>"><?php echo e($ps->fax); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                        <?php endif; ?>


                                <div class="social-links">
                                    <h4 class="title"><?php echo e(__('Find Us Here')); ?> :</h4>
                                    <ul>

                                     <?php if(App\Models\Socialsetting::find(1)->f_status == 1): ?>
                                      <li>
                                        <a href="<?php echo e(App\Models\Socialsetting::find(1)->facebook); ?>" class="facebook" target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                      </li>
                                      <?php endif; ?>

                                      <?php if(App\Models\Socialsetting::find(1)->g_status == 1): ?>
                                      <li>
                                        <a href="<?php echo e(App\Models\Socialsetting::find(1)->gplus); ?>" class="google-plus" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                      </li>
                                      <?php endif; ?>

                                      <?php if(App\Models\Socialsetting::find(1)->t_status == 1): ?>
                                      <li>
                                        <a href="<?php echo e(App\Models\Socialsetting::find(1)->twitter); ?>" class="twitter" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                      </li>
                                      <?php endif; ?>

                                      <?php if(App\Models\Socialsetting::find(1)->l_status == 1): ?>
                                      <li>
                                        <a href="<?php echo e(App\Models\Socialsetting::find(1)->linkedin); ?>" class="linkedin" target="_blank">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                      </li>
                                      <?php endif; ?>

                                      <?php if(App\Models\Socialsetting::find(1)->d_status == 1): ?>
                                      <li>
                                        <a href="<?php echo e(App\Models\Socialsetting::find(1)->dribble); ?>" class="dribbble" target="_blank">
                                            <i class="fab fa-dribbble"></i>
                                        </a>
                                      </li>
                                      <?php endif; ?>

                                        </ul>
                                </div>
                    </div>
                </div>

                <div class="col-xl-7 col-lg-7">
                    <div class="left-area">
                        <div class="contact-form">
                            <div class="gocover" style="background: url(<?php echo e(asset('assets/images/'.$gs->loader)); ?>) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                            <form id="contactform" action="<?php echo e(route('front.contact.submit')); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                                    <?php echo $__env->make('includes.admin.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
                                    <ul>
                                        <li>
                                            <input type="text" name="name" class="input-field" placeholder="<?php echo e(__('Name')); ?>*" required="">
                                        </li>
                                        <li>
                                            <input type="text" name="phonr" class="input-field" placeholder="<?php echo e(__('Phone Number')); ?>*">
                                        </li>
                                        <li>
                                            <input type="email" name="email" class="input-field" placeholder="<?php echo e(__('Email Address')); ?>*" required="">
                                        </li>
                                        <li>
                                        <li>
                                        <textarea name="text" class="input-field textarea" placeholder="<?php echo e(__('Your Message')); ?>*" required=""></textarea>
                                        </li>
                                    </ul>
                                    <?php if($gs->is_capcha == 1): ?>
                                    <div class="form-input mb-2">
                                        <?php echo NoCaptcha::display(); ?>

                                        <?php echo NoCaptcha::renderJs(); ?>

                                        <?php $__errorArgs = ['g-recaptcha-response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="my-2"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <?php endif; ?>
                                    <input type="hidden" name="to" value="<?php echo e($ps->contact_email); ?>">
                                    <button class="submit-btn" type="submit"><?php echo e(__('Send Message')); ?></button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Contact Us Area End-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\new_file\AuctionPro-Files\project\resources\views/front/contact.blade.php ENDPATH**/ ?>