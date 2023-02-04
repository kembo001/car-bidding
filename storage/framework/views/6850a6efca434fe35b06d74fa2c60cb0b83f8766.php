 

<?php $__env->startSection('content'); ?>
            <div class="content-area">
                        <?php echo $__env->make('includes.form-success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php if( Auth::user()->bids()->where('winner',1)->where('status',0)->count() > 0 ): ?>
                            <?php $__currentLoopData = Auth::user()->bids()->where('winner',1)->where('status',0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wauction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="alert alert-success alert-dismissible text-center">
                                <?php echo e(__('You Have Successfully Won ').$wauction->auction->title.'.'); ?><a href="<?php echo e(route('user-bid-index')); ?>"><?php echo e(__('Pay Now.')); ?></a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <div class="row row-cards-one">
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg1">
                                        <div class="left">
                                            <h5 class="title"><?php echo e(__('Total Income')); ?>!</h5>
                                            <span class="number"><?php echo e($gs->currency_sign); ?><?php echo e(Auth::user()->income); ?></span>
                                            <a href="<?php echo e(route('user-wt-create')); ?>" class="link"><?php echo e(__('Withdraw')); ?></a>
                                        </div>
                                        <div class="right d-flex align-self-center">
                                            <div class="icon">
                                                <i class="icofont-dollar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg2">
                                        <div class="left">
                                            <h5 class="title"><?php echo e(__('Auctions Opened')); ?>!</h5>
                                            <span class="number"><?php echo e($opened); ?></span>
                                            <a href="<?php echo e(route('user-auction-index')); ?>" class="link"><?php echo e(__('View All')); ?></a>
                                        </div>
                                        <div class="right d-flex align-self-center">
                                            <div class="icon">
                                                <i class="icofont-truck-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg3">
                                        <div class="left">
                                            <h5 class="title"><?php echo e(__('Auctions Closed')); ?>!</h5>
                                            <span class="number"><?php echo e($closed); ?></span>
                                            <a href="<?php echo e(route('user-auction-index')); ?>" class="link"><?php echo e(__('View All')); ?></a>
                                        </div>
                                        <div class="right d-flex align-self-center">
                                            <div class="icon">
                                                <i class="icofont-check-circled"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\new_file\AuctionPro-Files\project\resources\views/user/dashboard.blade.php ENDPATH**/ ?>