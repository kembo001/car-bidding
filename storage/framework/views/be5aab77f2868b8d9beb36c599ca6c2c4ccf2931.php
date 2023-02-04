

<?php $__env->startSection('content'); ?>

  <!-- Breadcrumb Area Start -->
  <div class="breadcrumb-area" style="background: url(<?php echo e($gs->breadcumb_banner ? asset('assets/images/'.$gs->breadcumb_banner):asset('assets/images/noimage.png')); ?>);">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="pagetitle">
            <?php echo e($auction->title); ?>

          </h1>

          <ul class="pages">
                
              <li>
                <a href="<?php echo e(route('front.index')); ?>">
                  <?php echo e(__('Home')); ?>

                </a>
              </li>
              <li>
                <a href="<?php echo e(route('front.details',$auction->slug)); ?>">
                  <?php echo e($auction->title); ?>

                </a>
              </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb Area End -->

    <!-- Categori Area Start -->
    <section class="details-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php echo $__env->make('includes.form-success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="row">
                            <div class="col-lg-12">
                                    <div class="one-item-slider">
       
                                        <div class="item">
                                            <img src="<?php echo e(asset('assets/images/auction/'.$auction->photo)); ?>" alt="">
                                        </div>
                                        <?php $__currentLoopData = $auction->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item">
                                            <img src="<?php echo e(asset('assets/images/galleries/'.$item->photo)); ?>" alt="">
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <ul class="all-item-slider">
                                        <li><img src="<?php echo e(asset('assets/images/auction/'.$auction->photo)); ?>" alt=""></li>
                                        <?php $__currentLoopData = $auction->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><img src="<?php echo e(asset('assets/images/galleries/'.$item->photo)); ?>" alt=""></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>

                        <div class="col-lg-12">
                            <div class="details-tab">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="description-tab" data-toggle="tab"
                                            href="#description" role="tab" aria-controls="description"
                                            aria-selected="true"> <?php echo e(__('Description')); ?> </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="bidhistory-tab" data-toggle="tab" href="#bidhistory"
                                            role="tab" aria-controls="bidhistory" aria-selected="false"><?php echo e(__('Bid History')); ?></a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                                        aria-labelledby="description-tab">
                                        <div class="main-content">
                                            <p>
                                                <?php echo $auction->descriptions; ?>

                                            </p>
                                        
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="bidhistory" role="tabpanel"
                                        aria-labelledby="bidhistory-tab">
                                        <div class="main-content">
                
                                    <div class="table-responsiv">
                                        <table id="bid-table" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                                          <thead>
                                            <tr>
                                                <th><?php echo e(__('Bidder')); ?></th>
                                                <th><?php echo e(__('Bid Amount')); ?></th>
                                                <th><?php echo e(__('Date')); ?></th>
                                            </tr>
                                            <tbody id="single-auction">
                                                <?php $__currentLoopData = $auction->bids()->orderBy('bid_amount','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($bid->user->customer_number); ?></td>
                                                   <?php if($gs->currency_format == 0): ?>
                                                    <td><?php echo e($gs->currency_sign); ?><?php echo e(number_format($bid->bid_amount, 2, ',', '.')); ?></td>
                                                    <?php else: ?> 
                                                    <td><?php echo e(number_format($bid->bid_amount, 2, ',', '.')); ?><?php echo e($gs->currency_sign); ?></td>
                                                    <?php endif; ?>
                                                    <td><?php echo e($bid->updated_at->diffForhumans()); ?></td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4">
                    <?php if($auction->status != 0): ?>
                    <div class="bid-details-info">
                        <ul class="info-list">
                            <li>
                                <p>
                                    <strong>
                                        <?php echo e(__('Case#')); ?>:
                                    </strong>
                                </p>
                                <p>
                                <?php echo e($auction->id); ?>

                                </p>
                            </li>
                            <li>
                                <p>
                                    <strong>
                                        <?php echo e(__('Created By')); ?>:
                                    </strong>
                                </p>
                                <p>
                                    <?php if($auction->user_id != 0): ?>
                                        <?php echo e($auction->user->customer_number); ?>

                                    <?php else: ?> 
                                        <?php echo e(__('Admin')); ?>

                                    <?php endif; ?>
                                    
                                </p>
                            </li>
                            <?php if($auction->user_id != 0): ?>
                            <li>
                                <p>
                                    <strong>
                                        <?php echo e(__('Postcode')); ?>:
                                    </strong>
                                </p>
                                <p>
                                <?php echo e($auction->user->zip); ?>

                                </p>
                            </li>
                            <li>
                                <p>
                                    <strong>
                                        <?php echo e(__('City')); ?>:
                                    </strong>
                                </p>
                                <p>
                                <?php echo e($auction->user->city); ?>

                                </p>
                            </li>
                            <?php endif; ?>
                            <li>
                                <p>
                                    <strong>
                                        <?php echo e(__('Condition')); ?>:
                                    </strong>
                                </p>
                                <p>
                                    <?php echo e($auction->conditions); ?>

                                </p>
                            </li>
                            <li>
                                <p>
                                    <strong>
                                        <?php echo e(__('Highest BID')); ?>:
                                    </strong>
                                </p>
                                <p id="highest">
                                    <?php if($gs->currency_format == 0): ?>
                                        <?php echo e($auction->highBids()); ?>

                                    <?php else: ?> 
                                        <?php echo e($auction->highBids()); ?>

                                    <?php endif; ?>
                                </p>
                            </li>
                            <?php if($auction->buy_now != null): ?>
                            <?php if($auction->buy_now > $auction->highBid()): ?>
                            <li>
                                <p>
                                    <strong>
                                        <?php echo e(__('Buy Now')); ?>:
                                    </strong>
                                </p>
                                <p>
                                    <?php if($gs->currency_format == 0): ?>
                                        <?php echo e($gs->currency_sign); ?><?php echo e(number_format($auction->buy_now, 2, ',', '.')); ?>

                                    <?php else: ?> 
                                        <?php echo e(number_format($auction->buy_now, 2, ',', '.')); ?><?php echo e($gs->currency_sign); ?>

                                    <?php endif; ?>
                                </p>
                            </li>
                            <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                        <div class="bids-time">
                            <div class="exist option">
                                <img src="#" alt="">
                                <div class="number">
                                    <span><?php echo e(count($auction->bids)); ?></span>
                                    <p>
                                        <?php echo e(__('Bids')); ?>

                                    </p>
                                </div>
                            </div>
                            <div class="time option">
                                <div class="number">
                                    <?php if(Carbon\Carbon::now($gs->time_zone)->format('Y-m-d') < Carbon\Carbon::parse($auction->start_date)->format('Y-m-d')): ?>
                                        <span class="countdown" data-date="<?php echo e(Carbon\Carbon::parse($auction->start_date)->format('M d,Y H:i:s')); ?>"></span>
                                            <p><?php echo e(__('To Start')); ?></p>
                                    <?php else: ?>
                                        <span class="countdown" data-date="<?php echo e(Carbon\Carbon::parse($auction->end_date)->format('M d,Y H:i:s')); ?>"><?php echo e(Carbon\Carbon::now($gs->time_zone)->diffInDays($auction->end_date)); ?></span>
                                            <p>
                                                <?php echo e(__('Left')); ?>

                                            </p>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>

                        <div class="place-bid-area">
                        <?php if(
                            (Carbon\Carbon::now($gs->time_zone)->format('Y-m-d') >= Carbon\Carbon::parse($auction->start_date)->format('Y-m-d')) && 
                            (Carbon\Carbon::now($gs->time_zone)->format('Y-m-d') <= Carbon\Carbon::parse($auction->end_date)->format('Y-m-d'))): ?>
                            <?php if(Auth::check()): ?>

                            <h4 class="title">
                                <?php echo e(__('Amount')); ?>(<?php echo e($gs->currency_code); ?>):
                            </h4>

                            <form id="bid-form" action="<?php echo e(route('bid.store')); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                <input type="hidden" name="auction_id" value="<?php echo e($auction->id); ?>">
                                <input type="number" min="<?php echo e($auction->highBid() + $gs->bid_increase); ?>" value="<?php echo e($auction->highBid() + $gs->bid_increase); ?>" name="bid_amount" placeholder="<?php echo e(__('Enter Your Amount')); ?>" required="">
                                <button type="submit"><?php echo e(__('Place Bid Now')); ?></button>

                            </form>

                            <?php else: ?> 
                                <button type="button" class="login-button" href="javascript:;" data-toggle="modal" data-target="#log-reg"><?php echo e(__('Login To Bid')); ?></button>

                            <?php endif; ?>

                         <?php endif; ?>

                        </div>

                        <div class="social-area">
                            <h4 class="title">
                                <?php echo e(__('Share')); ?>:
                            </h4>
                        <div class="social-sharing a2a_kit a2a_kit_size_32">
                            <ul class="social-list">
                                <li>
                                    <a class="facebook a2a_button_facebook" href="">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="twitter a2a_button_twitter" href="">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="linkedin a2a_button_linkedin" href="">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="pinterest a2a_button_pinterest" href="">
                                        <i class="fab fa-pinterest-p"></i>
                                    </a>
                                </li>
                                  <li>
                                    <a class="a2a_dd plus" href="https://www.addtoany.com/share">
                                      <i class="fas fa-plus"></i>
                                    </a>
                                  </li>
                            </ul>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        </div>
                    </div>
                    <?php endif; ?>
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
                                                    <div class="left">
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
            <div class="row">

                <div class="col-lg-12">
                    <div class="latest-auction">
                        <div class="header-area">
                            <h4 class="title">
                                <?php echo e(__('Related Auctions')); ?>

                            </h4>
                        </div>
                        <div class="row">

                <?php if($auction->category->auctions()->where('id','!=',$auction->id)->count() > 0): ?>

                    <?php $__currentLoopData = $auction->category->auctions()->where('status','=',1)->where('id','!=',$auction->id)->take(3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(Carbon\Carbon::parse(Carbon\Carbon::now($gs->time_zone)->format('Y-m-d H:i:s'))->lt(Carbon\Carbon::parse($auction->end_date))): ?>
                        <div class="col-lg-4 col-md-4">
                        <a href="<?php echo e(route('front.details',$item->slug)); ?>" class="single-auction">
                                <div class="img">
                                    <img src="<?php echo e(asset('assets/images/auction/'.$item->photo)); ?>" alt="">
                                </div>
                                <div class="content">
                                    
                                        <div class="price-area">
                                                <span class="number left">
                                                    <?php if($gs->currency_format == 0): ?>
                                                      <?php echo e($gs->currency_sign); ?><?php echo e(number_format($item->lowBids(), 2, ',', '.')); ?>

                                                    <?php else: ?> 
                                                      <?php echo e(number_format($item->lowBids(), 2, ',', '.')); ?><?php echo e($gs->currency_sign); ?>

                                                    <?php endif; ?>
                                                    
                                                    <small class="label"><?php echo e(__('lowest')); ?> :</small>
                                                </span>
                                                <span class="number right">
                                                    <div>
                                                        <?php if($gs->currency_format == 0): ?>
                                                        <?php echo e($item->highBids()); ?>

                                                        <?php else: ?> 
                                                        <?php echo e($item->highBids()); ?>

                                                        <?php endif; ?>
                                                    </div>
                                                        
                                                    <small class="label"><?php echo e(__('Highest')); ?> :</small>
                                                </span>
                                            </div>
                                    <h5 class="title">
                                        <?php echo e($item->title); ?>

                                    </h5>
                                    <ul class="bids-info">
                                        <li>
                                            <h6><?php echo e(count($item->bids)); ?></h6>
                                            <p><?php echo e(__('Bids')); ?></p>
                                        </li>
                                        <li>
                                            <h6><?php echo e($item->conditions); ?></h6>
                                            <p><?php echo e(__('Condition')); ?></p>
                                        </li>
                                        <?php if(Carbon\Carbon::now($gs->time_zone)->format('Y-m-d') < Carbon\Carbon::parse($item->start_date)->format('Y-m-d')): ?>
                                        <li>
                                            <h6 class="countdown" data-date="<?php echo e(Carbon\Carbon::parse($item->start_date)->format('M d,Y H:i:s')); ?>"></h6>
                                            <p><?php echo e(__('To Start')); ?></p>
                                        </li>
                                        <?php else: ?> 
                                        <li>
                                            <h6 class="countdown" data-date="<?php echo e(Carbon\Carbon::parse($item->end_date)->format('M d,Y H:i:s')); ?>"></h6>
                                            <p><?php echo e(__('Left')); ?></p>
                                        </li>                                       
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            <?php else: ?>
                <P><?php echo e(__('Currently related auction not available.')); ?></P>
            <?php endif; ?>
                       
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--  Categori Area End -->



    <?php if(Auth::check()): ?>

    <!-- Buy Now Modal Start -->

    <div class="modal fade" id="payment-ck" tabindex="-1" role="dialog" 
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                    <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                    </button>
                <div class="modal-body">

                        <div class="dropdown-overlay"></div>


                                <div class="login-area">
                                    <div class="header-area">
                                        <h4 class="title"><?php echo e(__('Buy Now')); ?></h4>
                                        <h6><?php echo e($auction->title); ?></h6>


<?php 

                                            $fee = ($auction->buy_now  + $gs->buyer_pay_fee) * ($gs->buyer_fee / 100);
                                            $payment_fee = ($auction->buy_now  + $gs->buyer_pay_fee + $fee) * ($gs->buyer_payment_fee / 100);
                                            $vat = ($auction->buy_now  + $gs->buyer_pay_fee + $fee + $payment_fee) * ($gs->auction_vat / 100);
                                            $amount = $auction->buy_now  + $gs->buyer_pay_fee + $fee + $payment_fee + $vat;



?>

                                        <h6><b><?php echo e(__('Amount')); ?></b>: <?php echo e($gs->currency_format == 0 ? $gs->currency_sign.number_format($amount, 2, ',', '.') : number_format($amount, 2, ',', '.').$gs->currency_sign); ?></h6>
                                    </div>


                                    <div class="login-form signin-form">
                                        <form action="<?php echo e(route('front.stripe.submit')); ?>" id="payment-form" method="POST">
                                            <?php echo e(csrf_field()); ?>


                                                    <div class="row">

                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control " placeholder="<?php echo e(__('Shipping Address')); ?>" name="shipping_address">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control " placeholder="<?php echo e(__('City')); ?>" name="shipping_city">
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control " placeholder="<?php echo e(__('Postal Address')); ?>" name="shipping_zip">
                                                        </div>
                                                    </div>



                                                    </div>




                                            <div id="card-view" class="row">

                                                    <input type="hidden" name="cmd" value="_xclick">
                                                    <input type="hidden" name="no_note" value="1">
                                                    <input type="hidden" name="lc" value="UK">
                                                    <input type="hidden" name="currency_code" value="<?php echo e($gs->currency_code); ?>">
                                                    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest">





                                                    <div class="col-lg-12">

                                                    <div class="form-group">

                                                        <input type="text" class="form-control card-elements" placeholder="Card Number" name="card">

                                                    </div>

                                                    </div>

                                                    <div class="col-lg-12">

                                                    <div class="form-group">

                                                        <input type="text" class="form-control card-elements" placeholder="Cvv" name="cvv">

                                                    </div>

                                                    </div>

                                                    <div class="col-lg-12">

                                                    <div class="form-group">

                                                        <input type="text" class="form-control card-elements" placeholder="Month" name="month">

                                                    </div>

                                                    </div>

                                                    <div class="col-lg-12">

                                                    <div class="form-group">

                                                        <input type="text" class="form-control card-elements" placeholder="Year" name="year">

                                                    </div>

                                                    </div>

                                                    <input type="hidden" name="currency_sign" value="<?php echo e($gs->currency_sign); ?>">
                                                    <input type="hidden" name="total" value="<?php echo e($amount); ?>">
                                                    <input type="hidden" name="auction_id" value="<?php echo e($auction->id); ?>">
                                                    <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                                    <input type="hidden" name="customer_name" value="<?php echo e(Auth::user()->first_name.' '.Auth::user()->last_name); ?>">
                                                    <input type="hidden" name="customer_email" value="<?php echo e(Auth::user()->email); ?>">
                                                    <input type="hidden" name="customer_phone" value="<?php echo e(Auth::user()->phone); ?>">
                                                    <input type="hidden" name="customer_address" value="<?php echo e(Auth::user()->address); ?>">
                                                    <input type="hidden" name="customer_city" value="<?php echo e(Auth::user()->city); ?>">
                                                    <input type="hidden" name="customer_zip" value="<?php echo e(Auth::user()->zip); ?>">


                                            </div>




  
                                            <button type="submit" class="submit-btn"><?php echo e(__('SUBMIT')); ?></button>
                                        </form>
                                    </div>
                                </div>


                        </div>
                    </div>
            </div>
        </div>


    <!-- Buy Now Modal End -->

    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script type="text/javascript">


$('.login-button').on('click',function(){
    $('#modal-hidden').val(1);
});


$(document).ready(function(){
setInterval(function(){
            $('#single-auction').load('<?php echo e(route('front.single.details',$auction->id)); ?>');
    }, 5000);
});
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\new_file\AuctionPro-Files\project\resources\views/front/details.blade.php ENDPATH**/ ?>