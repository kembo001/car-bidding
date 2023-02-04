<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php if(isset($page->meta_tag) && isset($page->meta_description)): ?>
	<meta name="keywords" content="<?php echo e($page->meta_tag); ?>">
	<meta name="description" content="<?php echo e($page->meta_description); ?>">
	<?php elseif(isset($blog->meta_tag) && isset($blog->meta_description)): ?>
	<meta name="keywords" content="<?php echo e($blog->meta_tag); ?>">
	<meta name="description" content="<?php echo e($blog->meta_description); ?>">
	<?php else: ?>
	<meta name="keywords" content="<?php echo e($seo->meta_keys); ?>">
	<meta name="author" content="GeniusOcean">
	<?php endif; ?>
	<title><?php echo e($gs->title); ?></title>
	<!-- favicon -->
	<link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/images/'.$gs->favicon)); ?>" />
	<!-- bootstrap -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/bootstrap.min.css')); ?>">
	<!-- Plugin css -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/plugin.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/animate.css')); ?>">
	<!-- stylesheet -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/style.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/custom.css')); ?>">
	<!-- responsive -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/responsive.css')); ?>">

	<!--Updated CSS-->
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/styles.php?color='.str_replace('#','',$gs->colors))); ?>">


	<?php echo $__env->yieldContent('styles'); ?>

</head>

<body>

<?php if($gs->is_loader == 1): ?>
	<div class="preloader" id="preloader" style="background: url(<?php echo e(asset('assets/images/'.$gs->loader)); ?>) no-repeat scroll center center #FFF;"></div>
<?php endif; ?>

	<!--Main-Menu Area Start-->
	<div class="mainmenu-area">
		<!-- Top Header Area Start -->
		<div class="top-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="content">
							<div class="left-content">
								<p class="title"><?php echo e(__('Follow Us')); ?>:</p>
								<ul class="social-link">
									<?php if(App\Models\Socialsetting::find(1)->f_status == 1): ?>
										<li>
											<a href="<?php echo e(App\Models\Socialsetting::find(1)->facebook); ?>" target="_blank">
												<i class="fab fa-facebook-f"></i>
											</a>
										</li>
									<?php endif; ?>
									<?php if(App\Models\Socialsetting::find(1)->t_status == 1): ?>
									<li>
										<a href="<?php echo e(App\Models\Socialsetting::find(1)->twitter); ?>" target="_blank">
											<i class="fab fa-twitter"></i>
										</a>
									</li>
									<?php endif; ?>
									<?php if(App\Models\Socialsetting::find(1)->l_status == 1): ?>
									<li>
										<a href="<?php echo e(App\Models\Socialsetting::find(1)->linkedin); ?>" target="_blank">
											<i class="fab fa-linkedin-in"></i>
										</a>
									</li>
									<?php endif; ?>
									<?php if(App\Models\Socialsetting::find(1)->g_status == 1): ?>
									<li>
										<a href="<?php echo e(App\Models\Socialsetting::find(1)->gplus); ?>" target="_blank">
											<i class="fab fa-instagram"></i>
										</a>
									</li>
									<?php endif; ?>
								</ul>
							</div>
							<div class="right-content">
								<div class="language-selector">
									<i class="fas fa-globe-americas"></i>
									<select name="language" class="language">
										<?php $__currentLoopData = DB::table('admin_languages')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e(route('front.language',$language->id)); ?>" <?php echo e(Session::has('language') ? ( Session::get('language') == $language->id ? 'selected' : '' ) : (DB::table('admin_languages')->where('is_default','=',1)->first()->id == $language->id ? 'selected' : '')); ?> ><?php echo e($language->language); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>

								<?php if(Auth::check()): ?>
								<div class="language-selector">
										<i class="far fa-user-circle"></i>
										<select name="language" class="language">

												<option value="<?php echo e(route('user.dashboard')); ?>" class="d-none" selected><?php echo e(__('My Account')); ?></option>
												<option value="<?php echo e(route('user.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></option>
												<option value="<?php echo e(route('user.logout')); ?>"><?php echo e(__('Logout')); ?></option>
										</select>
								</div>
								<?php else: ?> 
								<div class="sign-log">
									<div class="links">
										<a class="sign-in" href="#" data-toggle="modal" data-target="#log-reg"><?php echo e(__('Sign in')); ?></a> <span>|</span>
										<a class="join" href="" data-toggle="modal"
											data-target="#log-reg"><?php echo e(__('Join')); ?></a>
									</div>
								</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Top Header Area End -->
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<nav class="navbar navbar-expand-lg navbar-light">
						<a class="navbar-brand" href="<?php echo e(route('front.index')); ?>">
							<img src="<?php echo e(asset('assets/images/'.$gs->logo)); ?>" alt="">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu"
							aria-controls="main_menu" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse fixed-height" id="main_menu">
							<ul class="navbar-nav ml-auto">
								<?php if($gs->is_home == 1): ?>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a>
								</li>
								<?php endif; ?>
								<?php if($gs->is_blog == 1): ?>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo e(route('front.blog')); ?>"><?php echo e(__('Blog')); ?></a>
								</li>
								<?php endif; ?>
								<?php if($gs->is_auction == 1): ?>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
										aria-haspopup="true" aria-expanded="false">
										<?php echo e(__('Auctions')); ?>

									</a>
									<ul class="dropdown-menu">
										<li>
											<a class="dropdown-item" href="<?php echo e(route('front.featured')); ?>"> <i class="fa fa-angle-double-right"></i><?php echo e(__('Featured Auctions')); ?></a>
										</li>
										<?php $__currentLoopData = DB::table('categories')->where('status',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li>
											<a class="dropdown-item" href="<?php echo e(route('front.category',$data->slug)); ?>"> <i class="fa fa-angle-double-right"></i><?php echo e($data->title); ?></a>
										</li>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</ul>
								</li>
								<?php endif; ?>
								<?php if($gs->is_faq == 1): ?>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo e(route('front.faq')); ?>"><?php echo e(__('FAQ')); ?></a>
								</li>
								<?php endif; ?>
								<?php if($gs->is_page == 1): ?>
								<?php if(DB::table('pages')->count() > 0): ?>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
										aria-haspopup="true" aria-expanded="false">
										<?php echo e(__('Pages')); ?>

									</a>
									<ul class="dropdown-menu">
										<?php $__currentLoopData = DB::table('pages')->where('status',1)->orderBy('id','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li><a class="dropdown-item" href="<?php echo e(route('front.page',$data->slug)); ?>"> <i
													class="fa fa-angle-double-right"></i><?php echo e($data->title); ?></a></li>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</ul>
								</li>
								<?php endif; ?>
								<?php endif; ?>
								<?php if($gs->is_contact == 1): ?>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo e(route('front.contact')); ?>"><?php echo e(__('Contact Us')); ?></a>
								</li>
								<?php endif; ?>
							</ul>
						</div>
						<!-- <a class="mybtn1 donet-btn" href="#">
							Donate Now!
						</a> -->
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!--Main-Menu Area Start-->

	<?php echo $__env->yieldContent('content'); ?>

	<!-- Footer Area Start -->
	<footer class="footer" id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-4">
					<div class="footer-widget about-widget">
						<div class="footer-logo">
							<a href="<?php echo e(route('front.index')); ?>">
								<img src="<?php echo e(asset('assets/images/'.$gs->footer_logo)); ?>" alt="">
							</a>
						</div>
						<div class="text">
							<p>
								<?php echo e($gs->footer); ?>

							</p>
						</div>

					</div>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="footer-widget address-widget">
						<h4 class="title">
							<?php echo e(__('ADDRESS')); ?>

						</h4>
						<ul class="about-info">
							<?php if(App\Models\Pagesetting::find(1)->street != null): ?>
							<li>
								<p>
									<i class="fas fa-globe"></i>
									<?php echo e(App\Models\Pagesetting::find(1)->street); ?>

								</p>
							</li>
							<?php endif; ?>
							<?php if(App\Models\Pagesetting::find(1)->phone != null): ?>
							<li>
								<p>
									<a href="tel:<?php echo e(App\Models\Pagesetting::find(1)->phone); ?>">
										<i class="fas fa-phone"></i>
										<?php echo e(App\Models\Pagesetting::find(1)->phone); ?>

									</a>
								</p>
							</li>
							<?php endif; ?>
							<?php if(App\Models\Pagesetting::find(1)->email != null): ?>
							<li>
								<p>
									<i class="far fa-envelope"></i>
									<a href="mailto:<?php echo e(App\Models\Pagesetting::find(1)->emaill); ?>">
										<?php echo e(App\Models\Pagesetting::find(1)->email); ?>

									</a>
								</p>
							</li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="footer-widget  footer-newsletter-widget">
						<h4 class="title">
							<?php echo e(__('NEWSLETTER')); ?>

						</h4>
						<div class="newsletter-form-area">
							<form id="subscribeform" action="<?php echo e(route('front.subscribe')); ?>" method="POST">
								<?php echo e(csrf_field()); ?>

								<input type="email" id="subemail" required="" name="email"
									placeholder="<?php echo e(__('Your email address')); ?>">
								<button id="sub-btn" type="submit">
									<i class="far fa-paper-plane"></i>
								</button>
							</form>
						</div>
						<div class="social-links">
							<h4 class="title">
								<?php echo e(__("We're social, connect with us")); ?>:
							</h4>
							<div class="fotter-social-links">
								<ul>
									<?php if(App\Models\Socialsetting::find(1)->f_status == 1): ?>
									<li>
										<a href="<?php echo e(App\Models\Socialsetting::find(1)->facebook); ?>" class="facebook"
											target="_blank">
											<i class="fab fa-facebook-f"></i>
										</a>
									</li>
									<?php endif; ?>

									<?php if(App\Models\Socialsetting::find(1)->g_status == 1): ?>
									<li>
										<a href="<?php echo e(App\Models\Socialsetting::find(1)->gplus); ?>" class="google-plus"
											target="_blank">
											<i class="fab fa-instagram"></i>
										</a>
									</li>
									<?php endif; ?>

									<?php if(App\Models\Socialsetting::find(1)->t_status == 1): ?>
									<li>
										<a href="<?php echo e(App\Models\Socialsetting::find(1)->twitter); ?>" class="twitter"
											target="_blank">
											<i class="fab fa-twitter"></i>
										</a>
									</li>
									<?php endif; ?>

									<?php if(App\Models\Socialsetting::find(1)->l_status == 1): ?>
									<li>
										<a href="<?php echo e(App\Models\Socialsetting::find(1)->linkedin); ?>" class="linkedin"
											target="_blank">
											<i class="fab fa-linkedin-in"></i>
										</a>
									</li>
									<?php endif; ?>

									<?php if(App\Models\Socialsetting::find(1)->d_status == 1): ?>
									<li>
										<a href="<?php echo e(App\Models\Socialsetting::find(1)->dribble); ?>" class="dribble"
											target="_blank">
											<i class="fab fa-dribbble"></i>
										</a>
									</li>
									<?php endif; ?>

								</ul>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<div class="copy-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="content">
							<div class="content">
								<p><?php echo $gs->copyright; ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer Area End -->



	<!-- Back to Top Start -->
	<div class="bottomtotop">
		<i class="fas fa-chevron-right"></i>
	</div>
	<!-- Back to Top End -->

	<!-- LOgin Register Form Start -->

	<div class="modal fade" id="log-reg" tabindex="-1" role="dialog" 
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
					<button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
							<i class="fas fa-times"></i>
					</button>
				<div class="modal-body">
						<nav class="comment-log-reg-tabmenu core-nav">
							<div class="full-container">
								<div class="nav nav-tabs" id="nav-tab" role="tablist">
									<a class="nav-item nav-link login active" id="nav-log-tab" data-toggle="tab" href="#nav-log"
										role="tab" aria-controls="nav-log" aria-selected="true">
										<?php echo e(__('Login')); ?>

									</a>
									<a class="nav-item nav-link" id="nav-reg-tab" data-toggle="tab" href="#nav-reg" role="tab"
										aria-controls="nav-reg" aria-selected="false">
										<?php echo e(__('Register')); ?>

									</a>
								</div>
							</div>
						</nav>
						<div class="dropdown-overlay"></div>
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade active show" id="nav-log" role="tabpanel" aria-labelledby="nav-log-tab">
								<div class="login-area">
									<div class="header-area">
										<h4 class="title"><?php echo e(__('Login Now')); ?></h4>
									</div>
									<div class="login-form signin-form">
										<?php echo $__env->make('includes.admin.form-login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
										<form id="mloginform" action="<?php echo e(route('user-login-submit')); ?>"
											method="POST">
											<?php echo e(csrf_field()); ?>

											<div class="form-input">
												<input type="email" name="email" placeholder="<?php echo e(__('Type Email Address')); ?>" required="">
												<i class="fas fa-envelope"></i>
											</div>
											<div class="form-input">
												<input type="password" class="Password" name="password"
													placeholder="<?php echo e(__('Type Password')); ?>" required="">
												<i class="fas fa-key"></i>
											</div>
											<div class="form-forgot-pass">
												<div class="left">
													<input type="hidden" id="modal-hidden" name="modal" value="0">
													<input type="checkbox" name="remember" id="mrp">
													<label for="mrp"><?php echo e(__('Remember Password')); ?></label>
												</div>
												<div class="right">
													<a href="javascript:;" id="show-forgot">
														<?php echo e(__('Forgot Password')); ?>?
													</a>
												</div>
											</div>
											<input id="mauthdata" type="hidden" value="<?php echo e(__('Authenticating')); ?>...">
											<button type="submit" class="submit-btn"><?php echo e(__('Login')); ?></button>
										</form>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="nav-reg" role="tabpanel" aria-labelledby="nav-reg-tab">
								<div class="login-area signup-area">
									<div class="header-area">
										<h4 class="title"><?php echo e(__('Signup Now')); ?></h4>
									</div>
									<?php echo $__env->make('includes.admin.form-login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
									<form id="mregisterform"
										action="<?php echo e(route('user-register-submit')); ?>" method="POST">
										<?php echo e(csrf_field()); ?>

										
										<div class="d-flex mb-3">

											<ul class="radio-btn-list">
												<li>
													<div class="radio-design">
														<input type="radio" class="shipping" id="free-shepping1" name="type" value="0" checked > 
														<span class="checkmark"></span>
														<label for="free-shepping1"> 
														<?php echo e(__('Private')); ?>

														</label>
													</div>
												</li>
												<li>
													<div class="radio-design">
														<input type="radio" class="shipping" id="free-shepping2" name="type" value="1"> 
														<span class="checkmark"></span>
														<label for="free-shepping2"> 
														<?php echo e(__('Business')); ?>

														</label>
													</div>
												</li>
											</ul>
										</div>
										<div id="company" class="d-none">
										<div class="form-input">
											<input type="text" class="User Name" name="company_name" placeholder="<?php echo e(__('Company Name')); ?>">
											<i class="fas fa-business-time"></i>
										</div>
	
										<div class="form-input">
											<input type="text" class="User Name" name="cvr_number" placeholder="<?php echo e(__('CVR Number')); ?>">
											<i class="fas fa-percent"></i>
										</div>
									</div>
										<div class="form-input">
											<input type="text" class="User Name" name="first_name" placeholder="<?php echo e(__('First Name')); ?>"
												required="">
											<i class="fas fa-user"></i>
										</div>
	
										<div class="form-input">
											<input type="text" class="User Name" name="last_name" placeholder="<?php echo e(__('Last Name')); ?>"
												required="">
											<i class="fas fa-user-tie"></i>
										</div>

										<div class="form-input">
											<input type="email" class="User Name" name="email" placeholder="<?php echo e(__('Your email address')); ?>"
												required="">
											<i class="fas fa-envelope"></i>
										</div>
	
										<div class="form-input">
											<input type="text" class="User Name" name="phone" placeholder="<?php echo e(__('Phone Number')); ?>"
												required="">
											<i class="fas fa-phone"></i>
										</div>
	
										<div class="form-input">
											<input type="text" class="User Name" name="address" placeholder="<?php echo e(__('ADDRESS')); ?>"
												required="">
											<i class="fas fa-map-marker-alt"></i>
										</div>
	
										<div class="form-input">
											<input type="password" class="Password" name="password" placeholder="<?php echo e(__('Password')); ?>"
												required="">
											<i class="fas fa-key"></i>
										</div>
	
										<div class="form-input">
											<input type="password" class="Password" name="password_confirmation"
												placeholder="<?php echo e(__('Confirm Password')); ?>" required="">
											<i class="fas fa-key"></i>
										</div>
										<?php if($gs->is_capcha == 1): ?>
										<div class="form-input">
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
	
										<input id="mprocessdata" type="hidden" value="<?php echo e(__('Processing...')); ?>">
										<button type="submit" class="submit-btn"><?php echo e(__('Register')); ?></button>
	
									</form>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>

	<!-- LOgin Register Form End -->




	<script type="text/javascript">
		var mainurl = "<?php echo e(url('/')); ?>";
		var gs = <?php echo json_encode($gs); ?>;
	</script>

	<!-- jquery -->
	<script src="<?php echo e(asset('assets/front/js/jquery.js')); ?>"></script>
	<!-- bootstrap -->
	<script src="<?php echo e(asset('assets/front/js/bootstrap.min.js')); ?>"></script>
	<!-- popper -->
	<script src="<?php echo e(asset('assets/front/js/popper.min.js')); ?>"></script>
	<!-- plugin js-->
	<script src="<?php echo e(asset('assets/front/js/plugin.js')); ?>"></script>
	<!-- notify js-->
	<script src="<?php echo e(asset('assets/front/js/notify.js')); ?>"></script>
	<!-- notify js-->
	<script src="<?php echo e(asset('assets/front/js/price-range.js')); ?>"></script>
	<!-- main -->
	<script src="<?php echo e(asset('assets/front/js/main.js')); ?>"></script>
	<!-- custom -->
	<script src="<?php echo e(asset('assets/front/js/custom.js')); ?>"></script>

	<?php echo $seo->google_analytics; ?>


	<?php if($gs->is_talkto == 1): ?>
	<!--Start of Tawk.to Script-->
	<?php echo $gs->talkto; ?>

	<!--End of Tawk.to Script-->
	<?php endif; ?>

	<?php echo $__env->yieldContent('scripts'); ?>

</body>



<script type="text/javascript">


if($('.countdown').length > 0)
{
		$('.countdown').each(function(){
		var date = $(this).data('date');
		var countDownDate = new Date(date).getTime();
		var $this = $(this);
		var x = setInterval(function() {

		var denTime = new Date().toLocaleString("en-US", {timeZone: '<?php echo e($gs->time_zone); ?>'});

		  // Get today's date and time
		  var now = new Date(denTime).getTime();

		  // Find the distance between now and the count down date
		  var distance = countDownDate - now;

		  // Time calculations for days, hours, minutes and seconds
		  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		  // Display the result in the element with id="demo"
		  var text = days + " <?php echo e(__('Days')); ?> " + hours + ":"
		  + minutes + ":" + seconds;
		  $this.html(text);

		  // If the count down is finished, write some text 
		  if (distance < 0) {
			$this.parent().parent().parent().parent().parent().hide();
		    clearInterval(x);
		  var text = 0 + " <?php echo e(__('Days')); ?> " + 0 + ":"
		  + 0 + ":" + 0;
		  $this.html(text);
		  }
		}, 1000);
	});
}



$('.shipping').on('change',function(){
	var val = $(this).val();
	if( val == 1) {
		$('#company').removeClass('d-none');
	}
	else{
		$('#company').addClass('d-none');
	}
});


$('.featured_auction_slider').on('changed.owl.carousel', function () {
		 //   debugger;
		var count = $(this).find('.countdown');
		 if(count.length > 0)
{
		$(count).each(function(){
		var date = $(this).data('date');

		var countDownDate = new Date(date).getTime();
		var $this = $(this);
		var x = setInterval(function() {
			var denTime = new Date().toLocaleString("en-US", {timeZone: '<?php echo e($gs->time_zone); ?>'});

		// Get today's date and time
		var now = new Date(denTime).getTime();

		  // Find the distance between now and the count down date
		  var distance = countDownDate - now;

		  // Time calculations for days, hours, minutes and seconds
		  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		  // Display the result in the element with id="demo"
		  var text = days + " <?php echo e(__('Days')); ?> " + hours + ":"
		  + minutes + ":" + seconds;
		  $this.html(text);

		  // If the count down is finished, write some text 
		  if (distance < 0) {
			$this.parent().parent().parent().parent().parent().parent().hide();
		    clearInterval(x);
		  var text = 0 + " <?php echo e(__('Days')); ?> " + 0 + ":"
		  + 0 + ":" + 0;
		  $this.html(text);
		  }
		}, 1000);
	});
}

        });



		$('.latest_auction_slider').on('changed.owl.carousel', function () {
		 //   debugger;
		var count = $(this).find('.countdown');
		 if(count.length > 0)
{
		$(count).each(function(){
		var date = $(this).data('date');
		var countDownDate = new Date(date).getTime();
		var $this = $(this);
		var x = setInterval(function() {
			var denTime = new Date().toLocaleString("en-US", {timeZone: '<?php echo e($gs->time_zone); ?>'});

			// Get today's date and time
			var now = new Date(denTime).getTime();

		  // Find the distance between now and the count down date
		  var distance = countDownDate - now;

		  // Time calculations for days, hours, minutes and seconds
		  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		  // Display the result in the element with id="demo"
		  var text = days + " <?php echo e(__('Days')); ?> " + hours + ":"
		  + minutes + ":" + seconds;
		  $this.html(text);

		  // If the count down is finished, write some text 
		  if (distance < 0) {

			$this.parent().parent().parent().parent().parent().parent().hide();
		    clearInterval(x);
		  var text = 0 + " <?php echo e(__('Days')); ?> " + 0 + ":"
		  + 0 + ":" + 0;
		  $this.html(text);
		  }
		}, 1000);
	});
}

        });

</script>

</html><?php /**PATH F:\xampp\htdocs\new_file\AuctionPro-Files\project\resources\views/layouts/front.blade.php ENDPATH**/ ?>