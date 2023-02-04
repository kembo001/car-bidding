 

<?php $__env->startSection('content'); ?>
                    <div class="content-area">
                <?php echo $__env->make('includes.form-success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="row row-cards-one">

                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg1">
                                        <div class="left">
                                            <h5 class="title"><?php echo e(__('Auctions Opened')); ?>! </h5>
                                            <span class="number"><?php echo e(App\Models\Auction::where('status','=',1)->count()); ?></span>
                                            <a href="<?php echo e(route('admin-auction-index')); ?>" class="link"><?php echo e(__('View All')); ?></a>
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
                                            <h5 class="title"><?php echo e(__('Auctions Closed')); ?>!</h5>
                                            <span class="number"><?php echo e(App\Models\Auction::where('status','=',0)->count()); ?></span>
                                            <a href="<?php echo e(route('admin-auction-index')); ?>" class="link"><?php echo e(__('View All')); ?></a>
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
                                            <h5 class="title"><?php echo e(__('Auctions Pending')); ?>!</h5>
                                            <span class="number"><?php echo e(App\Models\Auction::where('is_approve','=',0)->count()); ?></span>
                                            <a href="<?php echo e(route('admin-auction-pending')); ?>" class="link"><?php echo e(__('View All')); ?></a>
                                        </div>
                                        <div class="right d-flex align-self-center">
                                            <div class="icon">
                                                <i class="icofont-check-circled"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                    <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg4">
                                        <div class="left">
                                            <h5 class="title"><?php echo e(__('Total Customers')); ?>!</h5>
                                            <span class="number"><?php echo e(App\Models\User::count()); ?></span>
                                            <a href="<?php echo e(route('admin-user-index')); ?>" class="link"><?php echo e(__('View All')); ?></a>
                                        </div>
                                        <div class="right d-flex align-self-center">
                                            <div class="icon">
                                                <i class="icofont-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg6">
                                        <div class="left">
                                            <h5 class="title"><?php echo e(__('Total Posts')); ?>!</h5>
                                            <span class="number"><?php echo e(count($blogs)); ?></span>
                                            <a href="<?php echo e(route('admin-blog-index')); ?>" class="link"><?php echo e(__('View All')); ?></a>
                                        </div>
                                        <div class="right d-flex align-self-center">
                                            <div class="icon">
                                                <i class="icofont-newspaper"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


  
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="mycard bg7">
                                        <div class="left">
                                            <h5 class="title" ><?php echo e(__('Website Maintenance')); ?>!</h5>
                                            <span class="number" style="font-size:20px;"><?php echo e($gs->is_maintain == 1 ?  __('Activated') : __('Deactivated')); ?></span>
                                            <a href="<?php echo e(route('admin-gs-maintenance')); ?>" class="link"><?php echo e(__('Change')); ?></a>
                                        </div>
                                        <div class="right d-flex align-self-center">
                                            <div class="icon">
                                                <i class="icofont-ui-settings"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

    <div class="row row-cards-one">

        <div class="col-md-6 col-lg-6 col-xl-6">
            <div class="card">
                <h5 class="card-header"><?php echo e(__('Top Referrals')); ?></h5>
                <div class="card-body">
                    <div class="admin-fix-height-card">
                         <div id="chartContainer-topReference"></div>
                    </div>
                       
                </div>
            </div>

        </div>

        <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card">
                        <h5 class="card-header"><?php echo e(__('Most Used OS')); ?></h5>
                        <div class="card-body">
<div class="admin-fix-height-card">
                        <div id="chartContainer-os"></div>
</div>
                        </div>
                    </div>
        </div>
        
    </div>


                    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script type="text/javascript">
        var chart1 = new CanvasJS.Chart("chartContainer-topReference",
            {
                exportEnabled: true,
                animationEnabled: true,

                legend: {
                    cursor: "pointer",
                    horizontalAlign: "right",
                    verticalAlign: "center",
                    fontSize: 16,
                    padding: {
                        top: 20,
                        bottom: 2,
                        right: 20,
                    },
                },
                data: [
                    {
                        type: "pie",
                        showInLegend: true,
                        legendText: "",
                        toolTipContent: "{name}: <strong>{#percent%} (#percent%)</strong>",
                        indexLabel: "#percent%",
                        indexLabelFontColor: "white",
                        indexLabelPlacement: "inside",
                        dataPoints: [
                                <?php $__currentLoopData = $referrals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $browser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    {y:<?php echo e($browser->total_count); ?>, name: "<?php echo e($browser->referral); ?>"},
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ]
                    }
                ]
            });
        chart1.render();

        var chart = new CanvasJS.Chart("chartContainer-os",
            {
                exportEnabled: true,
                animationEnabled: true,
                legend: {
                    cursor: "pointer",
                    horizontalAlign: "right",
                    verticalAlign: "center",
                    fontSize: 16,
                    padding: {
                        top: 20,
                        bottom: 2,
                        right: 20,
                    },
                },
                data: [
                    {
                        type: "pie",
                        showInLegend: true,
                        legendText: "",
                        toolTipContent: "{name}: <strong>{#percent%} (#percent%)</strong>",
                        indexLabel: "#percent%",
                        indexLabelFontColor: "white",
                        indexLabelPlacement: "inside",
                        dataPoints: [
                            <?php $__currentLoopData = $browsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $browser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                {y:<?php echo e($browser->total_count); ?>, name: "<?php echo e($browser->referral); ?>"},
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ]
                    }
                ]
            });
        chart.render();    
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\new_file\AuctionPro-Files\project\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>