

<?php $__env->startSection('content'); ?>

  <!-- Breadcrumb Area Start -->
  <div class="breadcrumb-area" style="background: url(<?php echo e($gs->breadcumb_banner ? asset('assets/images/'.$gs->breadcumb_banner):asset('assets/images/noimage.png')); ?>);">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="pagetitle">
            <?php echo e($cat->title); ?>

          </h1>

          <ul class="pages">
                
              <li>
                <a href="<?php echo e(route('front.index')); ?>">
                  <?php echo e(__('Home')); ?>

                </a>
              </li>
              <li>
                <a href="<?php echo e(route('front.category',$cat->slug)); ?>">
                  <?php echo e($cat->title); ?>

                </a>
              </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb Area End -->

	<!-- Categori Area Start -->
	<section class="categori-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-8">
                        <div class="left-area">
                            <div class="filter-result-area">
                            <div class="header-area">
                                <h4 class="title">
                                    <?php echo e(__('Filter Results By')); ?>

                                </h4>
                            </div>
                            <div class="body-area">
                                <form action="" method="GET">
                                    <div class="price-range-block">
                                            <div id="slider-range" class="price-filter-range" name="rangeInput"></div>
                                            <div class="livecount">
                                                <input type="number" name="min" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field" /> 
                                                <span><?php echo e(__('To')); ?></span>
                                                <input type="number" name="max" min=0 max="10000" oninput="validity.valid||(value='10000');" id="max_price" class="price-range-field" />
                                            </div>
                                        </div>
                                        
                                        <button class="filter-btn" type="submit"><?php echo e(__('Search')); ?></button>
                                </form>
                            </div>
                            </div>
                            <div class="all-categories-area">
                                        <div class="header-area">
                                            <h4 class="title">
                                                <?php echo e(__('All Categories')); ?>

                                            </h4>
                                        </div>
                                        <div class="body-area">
                                            <div class="accordion" id="accordionExample">
                                            <?php $__currentLoopData = DB::table('categories')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="card">
                                                    <a href="<?php echo e(route('front.category',$category->slug)); ?>">
                                                    <div class="card-header" id="headingOne">
                                                        <h4 class="button collapsed <?php echo e($category->id == $cat->id ? 'active' : ''); ?>" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                <i class="icofont-thin-double-right"></i><?php echo e($category->title); ?>

                                                        </h4>
                                                    </div>
                                                    </a>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                            </div>
                            <div class="latest_auction_area">
                                <div class="header-area">
                                    <h4 class="title">
                                            <?php echo e(__('Latest Auction')); ?>

                                    </h4>
                                </div>
                                <div class="body-area">
                                    <ul class="filter-list">

                                        <?php $__currentLoopData = App\Models\Auction::where('status','=',1)->latest()->take(3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestAuction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <a href="<?php echo e(route('front.details',$latestAuction->slug)); ?>">
                                                <div class="content">
                                                    <div class="left mr-1">
                                                        <img src="<?php echo e(asset('assets/images/auction/'.$latestAuction->photo)); ?>" alt="">
                                                    </div>
                                                    <div class="right">
                                                    <?php if($gs->currency_format == 0): ?>
                                                    <p class="price"><?php echo e($gs->currency_sign); ?><?php echo e(number_format($latestAuction->start_bid, 2, ',', '.')); ?></p>
                                                    <?php else: ?> 
                                                    <p class="price"><?php echo e(number_format($latestAuction->start_bid, 2, ',', '.')); ?><?php echo e($gs->currency_sign); ?></p>
                                                    <?php endif; ?>
                                                        <p class="title"><?php echo e($latestAuction->title); ?></p>
                                                    </div>
                                                </div>
                                                </a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 order-first order-lg-last">
                        <?php if(count($auctions) > 0): ?>
                        <div class="row">
                            <?php $__currentLoopData = $auctions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $auction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(Carbon\Carbon::parse(Carbon\Carbon::now($gs->time_zone)->format('Y-m-d H:i:s'))->lt(Carbon\Carbon::parse($auction->end_date))): ?>
                                <div class="col-lg-6 col-md-6">
                                <a href="<?php echo e(route('front.details',$auction->slug)); ?>" class="single-auction">
                                        <div class="img">
                                            <img src="<?php echo e(asset('assets/images/auction/'.$auction->photo)); ?>" alt="">
                                        </div>
                                        <div class="content">
                                            
                                                <div class="price-area">
                                                        <span class="number left">
                                                            <?php if($gs->currency_format == 0): ?>
                                                              <?php echo e($gs->currency_sign); ?><?php echo e(number_format($auction->lowBids(), 2, ',', '.')); ?>

                                                            <?php else: ?> 
                                                            <?php echo e(number_format($auction->lowBids(), 2, ',', '.')); ?><?php echo e($gs->currency_sign); ?>

                                                            <?php endif; ?>
                                                            
                                                            <small class="label"><?php echo e(__('lowest')); ?> :</small>
                                                        </span>
                                                        <span class="number right">
                                                            <?php if($gs->currency_format == 0): ?>
                                                              <?php echo e($auction->highBids()); ?>

                                                            <?php else: ?> 
                                                              <?php echo e($auction->highBids()); ?>

                                                            <?php endif; ?>
                                                            
                                                                
                                                            <small class="label"><?php echo e(__('Highest')); ?> :</small>
                                                        </span>
                                                    </div>
                                            <h5 class="title">
                                                <?php echo e($auction->title); ?>

                                            </h5>
                                    <ul class="bids-info">
                                        <li>
                                            <h6><?php echo e(count($auction->bids)); ?></h6>
                                            <p><?php echo e(__('Bids')); ?></p>
                                        </li>
                                        <li>
                                            <h6><?php echo e($auction->conditions); ?></h6>
                                            <p><?php echo e(__('Conditions')); ?></p>
                                        </li>
                                         <?php if(Carbon\Carbon::now($gs->time_zone)->format('Y-m-d') < Carbon\Carbon::parse($auction->start_date)->format('Y-m-d')): ?>
                                            <li>
                                                <h6 class="countdown" data-date="<?php echo e(Carbon\Carbon::parse($auction->start_date)->format('M d,Y H:i:s')); ?>"></h6>
                                                <p><?php echo e(__('To Start')); ?></p>
                                            </li>
                                        <?php else: ?> 
                                            <li>
                                                <h6 class="countdown" data-date="<?php echo e(Carbon\Carbon::parse($auction->end_date)->format('M d,Y H:i:s')); ?>"></h6>
                                                <p><?php echo e(__('Left')); ?></p>
                                            </li>                                       
                                        <?php endif; ?>
                                    </ul>
                                        </div>
                                    </a>
                                </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                        <?php else: ?> 
                        <div class="row justify-content-center">
                            <h3><?php echo e(__('No Auctions Found.')); ?></h3>
                        </div>
                        <?php endif; ?>

                        <div class="page-center">
                            <?php if(isset($min) || isset($max)): ?>
                            <?php echo $auctions->appends(['min' => $min, 'max' => $max])->links(); ?>

                            <?php else: ?> 
                            <?php echo $auctions->links(); ?>   
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!--  Categori Area End -->




<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script type="text/javascript">
    
    $(function () {
      $("#slider-range").slider({
        range: true,
        orientation: "horizontal",
        min: 0,
        max: 10000,
        values: [<?php echo e(isset($_GET['min']) ? $_GET['min'] : '0'); ?>, <?php echo e(isset($_GET['max']) ? $_GET['max'] : '10000'); ?>],
        step: 100,

        slide: function (event, ui) {
          if (ui.values[0] == ui.values[1]) {
              return false;
          }
          
          $("#min_price").val(ui.values[0]);
          $("#max_price").val(ui.values[1]);
        }
      });

      $("#min_price").val($("#slider-range").slider("values", 0));
      $("#max_price").val($("#slider-range").slider("values", 1));

    });

</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\new_file\AuctionPro-Files\project\resources\views/front/category.blade.php ENDPATH**/ ?>