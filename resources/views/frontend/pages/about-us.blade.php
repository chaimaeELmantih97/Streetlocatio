@extends('frontend.layouts.master')

@section('title','E-SHOP || About Us')

@section('main-content')

	 <!-- breadcrumb area start -->
	 <div class="breadcrumb-area">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="breadcrumb-wrap">
						<nav aria-label="breadcrumb">
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
								<li class="breadcrumb-item active" aria-current="page">About us</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- breadcrumb area end -->
	
	<!-- About Us -->
	<!-- about us area start -->
	<section class="about-us section-padding">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-5">
					<div class="about-thumb">
						<img src="assets/img/about/about.jpg" alt="about thumb">
					</div>
				</div>
				<div class="col-lg-7">
					<div class="about-content">
						<h2 class="about-title">{{__('messages.about',[],Session::get('locale'))}}</h2>
						@if (Session::get('locale')=='en')
						<h5 class="about-sub-title">
							Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.
						</h5>
						<p>Contrairement à une opinion répandue, le Lorem Ipsum n'est pas simplement du texte aléatoire.</p>
						<p> D. Jewelry has some of the most competitively priced in the market. It is our goal to supply our clients.</p>
						@else 
						<h5 class="about-sub-title">
							Lorem Ipsum is simply dummy text of the printing and typesetting industry.
						</h5>
						<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. </p>
						<p> The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</p>
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- about us area end -->

	<!-- choosing area start -->
	<div class="choosing-area section-padding pt-0">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title text-center">
						{{--<h2 class="title">{{__('messages.home',[],Session::get('locale'))}}</h2>--}}
					</div>
				</div>
			</div>
			<div class="row mbn-30">
				<div class="col-sm-6 col-lg-3">
					<div class="policy-item">
						<div class="policy-icon">
							<i class="pe-7s-plane"></i>
						</div>
						<div class="policy-content">
							<h6>{{__('messages.FS1',[],Session::get('locale'))}}</h6>
							<p>{{__('messages.FS2',[],Session::get('locale'))}}</p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="policy-item">
						<div class="policy-icon">
							<i class="pe-7s-help2"></i>
						</div>
						<div class="policy-content">
							<h6>{{__('messages.Sp1',[],Session::get('locale'))}}</h6>
							<p>{{__('messages.SP2',[],Session::get('locale'))}}</p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="policy-item">
						<div class="policy-icon">
							<i class="pe-7s-back"></i>
						</div>
						<div class="policy-content">
							<h6>{{__('messages.MR1',[],Session::get('locale'))}}</h6>
							<p>{{__('messages.MR2',[],Session::get('locale'))}}</p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="policy-item">
						<div class="policy-icon">
							<i class="pe-7s-credit"></i>
						</div>
						<div class="policy-content">
							<h6>{{__('messages.100P',[],Session::get('locale'))}}</h6>
							<p>{{__('messages.100P2',[],Session::get('locale'))}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- choosing area end -->

	<!-- testimonial area start -->
	<section class="testimonial-area section-padding bg-img" data-bg="assets/img/testimonial/testimonials-bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- section title start -->
					<div class="section-title text-center">
						<h2 class="title">testimonials</h2>
						<p class="sub-title">What they say</p>
					</div>
					<!-- section title start -->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="testimonial-thumb-wrapper">
						<div class="testimonial-thumb-carousel">
							<div class="testimonial-thumb">
								<img src="assets/img/testimonial/testimonial-1.png" alt="testimonial-thumb">
							</div>
							<div class="testimonial-thumb">
								<img src="assets/img/testimonial/testimonial-2.png" alt="testimonial-thumb">
							</div>
							<div class="testimonial-thumb">
								<img src="assets/img/testimonial/testimonial-3.png" alt="testimonial-thumb">
							</div>
							<div class="testimonial-thumb">
								<img src="assets/img/testimonial/testimonial-2.png" alt="testimonial-thumb">
							</div>
						</div>
					</div>
					<div class="testimonial-content-wrapper">
						<div class="testimonial-content-carousel">
							<div class="testimonial-content">
								<p>Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci augue nec sapien. Cum sociis natoque</p>
								<div class="ratings">
									<span><i class="fa fa-star-o"></i></span>
									<span><i class="fa fa-star-o"></i></span>
									<span><i class="fa fa-star-o"></i></span>
									<span><i class="fa fa-star-o"></i></span>
									<span><i class="fa fa-star-o"></i></span>
								</div>
								<h5 class="testimonial-author">lindsy niloms</h5>
							</div>
							<div class="testimonial-content">
								<p>Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci augue nec sapien. Cum sociis natoque</p>
								<div class="ratings">
									<span><i class="fa fa-star-o"></i></span>
									<span><i class="fa fa-star-o"></i></span>
									<span><i class="fa fa-star-o"></i></span>
									<span><i class="fa fa-star-o"></i></span>
									<span><i class="fa fa-star-o"></i></span>
								</div>
								<h5 class="testimonial-author">Daisy Millan</h5>
							</div>
							<div class="testimonial-content">
								<p>Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci augue nec sapien. Cum sociis natoque</p>
								<div class="ratings">
									<span><i class="fa fa-star-o"></i></span>
									<span><i class="fa fa-star-o"></i></span>
									<span><i class="fa fa-star-o"></i></span>
									<span><i class="fa fa-star-o"></i></span>
									<span><i class="fa fa-star-o"></i></span>
								</div>
								<h5 class="testimonial-author">Anamika lusy</h5>
							</div>
							<div class="testimonial-content">
								<p>Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci augue nec sapien. Cum sociis natoque</p>
								<div class="ratings">
									<span><i class="fa fa-star-o"></i></span>
									<span><i class="fa fa-star-o"></i></span>
									<span><i class="fa fa-star-o"></i></span>
									<span><i class="fa fa-star-o"></i></span>
									<span><i class="fa fa-star-o"></i></span>
								</div>
								<h5 class="testimonial-author">Maria Mora</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- testimonial area end -->

	<!-- team area start -->
	<div class="team-area section-padding">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title text-center">
						<h2 class="title">Our Team</h2>
						<p>Accumsan vitae pede lacus ut ullamcorper sollicitudin quisque libero</p>
					</div>
				</div>
			</div>
			<div class="row mbn-30">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="team-member mb-30">
						<div class="team-thumb">
							<img src="assets/img/team/team_member_1.jpg" alt="">
							<div class="team-social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
							</div>
						</div>
						<div class="team-content text-center">
							<h6 class="team-member-name">Jonathan Scott</h6>
							<p>CEO</p>
						</div>
					</div>
				</div> <!-- end single team member -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="team-member mb-30">
						<div class="team-thumb">
							<img src="assets/img/team/team_member_2.jpg" alt="">
							<div class="team-social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
							</div>
						</div>
						<div class="team-content text-center">
							<h6 class="team-member-name">oliver bastin</h6>
							<p>designer</p>
						</div>
					</div>
				</div> <!-- end single team member -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="team-member mb-30">
						<div class="team-thumb">
							<img src="assets/img/team/team_member_3.jpg" alt="">
							<div class="team-social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
							</div>
						</div>
						<div class="team-content text-center">
							<h6 class="team-member-name">erik jonson</h6>
							<p>developer</p>
						</div>
					</div>
				</div> <!-- end single team member -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="team-member mb-30">
						<div class="team-thumb img-full">
							<img src="assets/img/team/team_member_4.jpg" alt="">
							<div class="team-social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
							</div>
						</div>
						<div class="team-content text-center">
							<h6 class="team-member-name">jon doe</h6>
							<p>marketing officer</p>
						</div>
					</div>
				</div> <!-- end single team member -->
			</div>
		</div>
	</div>
@endsection