 

<?php $__env->startSection('content'); ?>

<?php if($ps->slider == 1): ?>

<?php if(count($sliders)): ?>

<?php echo $__env->make('includes.slider-style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endif; ?>

<?php endif; ?>


	<?php if($ps->slider == 1): ?>

	<!-- Hero Area Start -->
	<section class="hero-area">
		<?php if(count($sliders)): ?>
			<div class="hero-area-slider">
					<?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="intro-content <?php echo e($data->position); ?>" style="background-image: url(<?php echo e(asset('assets/images/sliders/'.$data->photo)); ?>)">
							<div class="container">
								<div class="row">
									<div class="col-lg-12">
										<div class="slider-content">
											<!-- layer 1 -->
											<div class="layer-1">
												<h4 style="font-size: <?php echo e($data->subtitle_size); ?>px; color: <?php echo e($data->subtitle_color); ?>" class="subtitle subtitle<?php echo e($data->id); ?>" data-animation="animated <?php echo e($data->subtitle_anime); ?>"><?php echo e($data->subtitle_text); ?></h4>
												<h2 style="font-size: <?php echo e($data->title_size); ?>px; color: <?php echo e($data->title_color); ?>" class="title title<?php echo e($data->id); ?>" data-animation="animated <?php echo e($data->title_anime); ?>"><?php echo e($data->title_text); ?></h2>
											</div>
											<!-- layer 2 -->
											<div class="layer-2">
												<p style="font-size: <?php echo e($data->details_size); ?>px; color: <?php echo e($data->details_color); ?>"  class="text text<?php echo e($data->id); ?>" data-animation="animated <?php echo e($data->details_anime); ?>"><?php echo e($data->details_text); ?></p>
											</div>
											<!-- layer 3 -->
											<div class="layer-3">
												<a href="<?php echo e($data->link); ?>" target="_blank" class="mybtn1"><span><?php echo e(__('Explore More')); ?> <i class="fas fa-chevron-right"></i></span></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		<?php endif; ?>
	</section>
	<!-- Hero Area End -->

	<?php endif; ?>





	<?php if($ps->service == 1): ?>

	<!-- Features Area Start-->
	<section class="features">
		<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8 col-md-10">
						<div class="section-heading text-center">
							<div class="title">
									<?php echo e($ps->service_title); ?>

							</div>
							<p class="text">
								<?php echo e($ps->service_text); ?>

							</p>
						</div>
					</div>
				</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="feature-area">
						<div class="row">
							<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
							<div class="col-lg-4 col-md-6">
								<a href="<?php echo e($service->link); ?>" target="_blank" class="single-feature">
									<div class="icon">
										<img src="<?php echo e(asset('assets/images/services/'.$service->photo)); ?>" alt="">
									</div>
									<div class="content">
										<h4 class="title">
											<?php echo e($service->title); ?>

										</h4>
										<p class="text">
											<?php echo $service->details; ?>

										</p>
										<span class="link">
											<i class="fas fa-angle-double-right"></i>
										</span>
									</div>
								</a>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Features Area End-->

	<?php endif; ?>

	
	<?php if($ps->featured == 1): ?>

	<!-- Categories Area Start -->
	<section class="categories">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-10">
					<div class="section-heading text-center">
						<div class="title">
								<?php echo e($category_section_title_text->category_section_title); ?>

						</div>
						<p class="text">
								<?php echo e($category_section_title_text->category_section_text); ?>

						</p>
					</div>
				</div>
			</div>
			<div class="row categori-items justify-content-center">

				<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-lg-3 col-md-4 col-6">
							<a href="<?php echo e(route('front.category',$category->slug)); ?>" class="single-categori">
								<div class="img">
									<img src="<?php echo e(asset('assets/images/category/'.$category->image)); ?>" alt="">
								</div>
								<div class="content">
									<h4 class="title">
										
										<?php echo e($category->title); ?>

									</h4>
									<p class="sub-title">
										<?php echo e($category->subtitle); ?>

									</p>
								</div>
							</a>
						</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</section>
<!-- Categories Area End -->

<?php endif; ?>


	<?php if($ps->small_banner == 1): ?>

	<!-- Featured Auction Area Start -->
	<section class="featured_auction">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-10">
					<div class="section-heading text-center">
						<div class="title">
								<?php echo e($auction_title_description->title); ?>

						</div>
						<p class="text">
							<?php echo e($auction_title_description->description); ?>

						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="featured_auction_slider">
						<?php $__currentLoopData = $auctions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $auction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(Carbon\Carbon::parse(Carbon\Carbon::now($gs->time_zone)->format('Y-m-d H:i:s'))->lt(Carbon\Carbon::parse($auction->end_date))): ?>
						<div class="item">
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
				</div>
			</div>
		</div>
	</section>
	<!-- Featured Auction Area End -->

<?php endif; ?>


<?php if($ps->contact_section == 1): ?>

<!-- Submit Address Area Start -->
<div class="submit-address"  style="background: url(<?php echo e(asset('assets/images/'.$ps->c_background)); ?>);">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-7">
				<h4 class="title">
					<?php echo e($ps->c_title); ?>

				</h4>
				<p class="text">
					<?php echo e($ps->c_text); ?>

				</p>
			</div>
			<div class="col-lg-5 col-md-5 d-flex align-self-center j-end">
				<a href="<?php echo e(route('front.contact')); ?>" class="mybtn1"><?php echo e(__('Contact Now')); ?></a>
			</div>
		</div>
	</div>
</div>
<!-- Submit Address Area End -->

<?php endif; ?>


<?php if($ps->latest_auction == 1): ?>

<!-- Featured Auction Area Start -->
<section class="featured_auction">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-10">
				<div class="section-heading text-center">
					<div class="title">
							<?php echo e(__('Latest Auctions')); ?>

					</div>
					<p class="text">
						<?php echo e(__('Click and bid.')); ?>

					</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="latest_auction_slider">
					<?php $__currentLoopData = $lauctions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $auction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if(Carbon\Carbon::parse(Carbon\Carbon::now($gs->time_zone)->format('Y-m-d H:i:s'))->lt(Carbon\Carbon::parse($auction->end_date))): ?>
					<div class="item">
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
			</div>
		</div>
	</div>
</section>
<!-- Featured Auction Area End -->

<?php endif; ?>

<?php if($ps->top_rated == 1): ?>

<!-- Video Area Start -->
<section class="video-section" style="background: url(<?php echo e(asset('assets/images/'.$ps->p_background)); ?>);">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-6 align-self-center">
				<div class="section-heading color-white text-left ">
					<h2 class="title">
						<?php echo e($ps->p_subtitle); ?>

					</h2>
					<p class="text"><?php echo e($ps->p_title); ?></p>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="video-box">
					<img src="<?php echo e(asset('assets/images/'.$ps->video_image)); ?>" alt="">
					<div class="play-icon">
						<a href="<?php echo e($ps->p_text); ?>" class="video-play-btn mfp-iframe">
							<i class="fas fa-play"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Video Area End -->

<?php endif; ?>


<?php if($ps->review_blog == 1): ?>

<!-- Blog Area Start -->
<section class="blog">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 col-md-10">
				<div class="section-heading">
					<h5 class="sub-title">
						<?php echo e($ps->blog_subtitle); ?>

					</h5>
					<h2 class="title">
						<?php echo e($ps->blog_title); ?>

					</h2>
					<p class="text">
						<?php echo e($ps->blog_text); ?> 
					</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="blog-slider">

				<?php $__currentLoopData = $lblogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

				<a href="<?php echo e(route('front.blogshow',$blog->id)); ?>" class="single-blog">
					<div class="img">
						<img src="<?php echo e(asset('assets/images/blogs/'.$blog->photo)); ?>" alt="">
					</div>
					<div class="content">
						<h4 class="title">
							<?php echo e($blog->title); ?>

						</h4>
						<ul class="top-meta">
							<li>
								<span>
										<i class="far fa-calendar"></i> <?php echo e(date('d M, Y',strtotime($blog->created_at))); ?>

								</span>
							</li>
							<li>
								<span>
										<i class="far fa-eye"></i> <?php echo e($blog->views); ?>

								</span>
							</li>
						</ul>
						<div class="text">
							<p>
								<?php echo e(substr(strip_tags($blog->details),0,120)); ?>

							</p>
						</div>
						<span class="link"><?php echo e(__('Read More')); ?> <i class="fas fa-chevron-right"></i></span>
					</div>
				</a>

				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Blog Area End -->

<?php endif; ?>



	<?php if($ps->pricing_plan == 1): ?>



	<?php endif; ?>

		<?php if($ps->hot_sale == 1): ?>

		<!-- Testimonial Area Start -->
		<section class="testimonial">
			<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8 col-md-10">
							<div class="section-heading text-center">
								<div class="title">
									<?php echo e($ps->review_title); ?>

								</div>
								<p class="text">
									<?php echo e($ps->review_text); ?>

								</p>
							</div>
						</div>
					</div>
				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="testimonial-slider">
							<?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="item">
								<div class="single-testimonial">
									<div class="review-text">
										<div class="content">
												<p><?php echo e($review->details); ?></p>
													<img src="assets/images/quot.png" alt="">
										</div>
									</div>
									<div class="people">
										<div class="img">
												<img src="<?php echo e(asset('assets/images/reviews/'.$review->photo)); ?>" alt="">
										</div>
										<div class="content">
											<h4 class="title"><?php echo e($review->title); ?></h4>
											<p class="designation"><?php echo e($review->subtitle); ?></p>
										</div>
									</div>
								</div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	
	
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Testimonial Area End -->
	
		<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\new_file\AuctionPro-Files\project\resources\views/front/index.blade.php ENDPATH**/ ?>