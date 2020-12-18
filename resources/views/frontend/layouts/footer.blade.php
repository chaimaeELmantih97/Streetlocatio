@php
$settings=DB::table('settings')->get();
@endphp  
<footer class="footer wow bounceInUp" data-wow-duration="2s">
	<div class="wrap-section-border">
	  <section class="section_mod-h section-bg section-bg_second">
		<div class="bg-inner border-section-top border-section-top_mod-b">
		  <div class="container">
			<div class="row">
			  <div class="col-xs-12">
				<h2 class="footer-title">Street <span class="footer-title__inner">Location</span></h2>
				<div class="decor-1 decor-1_mod-b"></div>
			  </div>
			  <!-- end col -->
			</div>
			<!-- end row -->

			<div class="row">
			  <div class="col-xs-12">
				<div class="footer__name">: Adresse :</div>
				<div class="footer__text">@foreach($settings as $data)   
					{{$data->address}}
					@endforeach
				</div>
			  </div>
			  <!-- end col -->
			</div>
			<!-- end row -->
			<div class="row">
			  <div class="col-xs-12">
				<div class="footer__item"> <span class="footer__name">Tel:</span> <span class="footer__text">+@foreach($settings as $data)   
					{{$data->phone}}
					@endforeach</span> </div>
				{{-- <div class="footer__item"> <span class="footer__name">Fax:</span> <span class="footer__text">+1
					(234) 567 8998</span> </div> --}}
				<div class="footer__item"> <span class="footer__name">email:</span> <span
					class="footer__text">@foreach($settings as $data)   
					{{$data->email}}
					@endforeach</span> </div>
				<div class="footer__item"> <span class="footer__name">Horaires:</span> <span class="footer__text">Lundi -
					Samedi :: 9am - 6pm</span> </div>
			  </div>
			  <!-- end col -->
			</div>
			<!-- end row -->
			<div class="row">
			  <div class="col-xs-12">
				<ul class="social-links list-inline">
				  <li><a class="icon fa fa-facebook" href="javascript:void(0);"></a></li>
				  <li><a class="icon fa fa-twitter" href="javascript:void(0);"></a></li>
				  <li><a class="icon fa fa-youtube-play" href="javascript:void(0);"></a></li>
				  <li><a class="icon fa fa-instagram" href="javascript:void(0);"></a></li>
				  <li><a class="icon fa fa-google-plus" href="javascript:void(0);"></a></li>
				</ul>
			  </div>
			  <!-- end col -->
			</div>
			<!-- end row -->
		  </div>
		  <!-- end container -->
		</div>
		<!-- end bg-inner -->
	  </section>
	  <!-- end section_mod-b -->
	</div>
	<!-- end wrap-section-border -->
	<div class="footer__wrap-btn"> <a class="footer__btn scroll" href="#this-top">top</a> </div>
	<div class="copyright"><div class="copyright-text text-center">
		<p>Powered By <a href="https://feen-tech.com">FeenTech</a>. Store 1 © 2020</p>
	</div></div>
  </footer>
</div>
<!-- end #wrapper -->
</div>
<!-- end layout-theme -->
<span class="scroll-top"> <i class="fa fa-angle-up"> </i></span>

<!-- SCRIPTS -->
<script src="{{url('assets2/js/jquery-migrate-1.2.1.js')}}"></script>
<script src="{{url('assets2/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets2/js/modernizr.custom.js')}}"></script>
<script src="{{url('assets2/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{url('assets2/js/waypoints.min.js')}}"></script>
<script src="{{url('assets2/plugins/prettyphoto/js/jquery.prettyPhoto.js')}}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="{{url('assets2/plugins/jelect/jquery.jelect.js')}}"></script>




<!--THEME-->
<script src="{{url('assets2/js/cssua.min.js')}}"></script>
<script src="{{url('assets2/js/wow.min.js')}}"></script>
<script src="{{url('assets2/js/custom.js')}}"></script>

