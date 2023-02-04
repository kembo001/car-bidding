
<?php $__env->startSection('content'); ?>

  <!-- Breadcrumb Area Start -->
  <div class="breadcrumb-area" style="background: url(<?php echo e($gs->breadcumb_banner ? asset('assets/images/'.$gs->breadcumb_banner):asset('assets/images/noimage.png')); ?>);">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="pagetitle">
            <?php echo e(__("404")); ?>

          </h1>

          <ul class="pages">
                
              <li>
                <a href="<?php echo e(route('front.index')); ?>">
                  <?php echo e(__("Home")); ?>

                </a>
              </li>
              <li>
                <a href="javascript:;">
                  <?php echo e(__("404")); ?>

                </a>
              </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb Area End -->


<section class="fourzerofour">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="content">
            <img src="<?php echo e(asset('assets/front/images/404.png')); ?>" alt="">

              <?php echo $gs->error_title; ?>


              <?php echo $gs->error_text; ?>


            <a class="mybtn1 pt-3" href="<?php echo e(route('front.index')); ?>"><?php echo e(__("Back To Home Page")); ?></a>
          </div>
        </div>
      </div>
    </div>
  </section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\new_file\AuctionPro-Files\project\resources\views/errors/404.blade.php ENDPATH**/ ?>