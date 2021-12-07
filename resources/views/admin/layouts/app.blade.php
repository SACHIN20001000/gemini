<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="X-UA-Compatible" content="IE=9" />
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>

		<!-- Title -->
		<title> Valex -  Premium dashboard ui bootstrap rwd admin html5 template </title>

		<!-- Favicon -->
		<link rel="icon" href="{{URL::asset('assets/img/brand/favicon.png')}}" type="image/x-icon"/>

		<!-- Icons css -->
		<link href="{{URL::asset('assets/css/icons.css')}}" rel="stylesheet">

		<!-- Bootstrap css -->
		<link href="{{URL::asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

		<!--  Owl-carousel css-->
		<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />

		<!-- P-scroll bar css-->
		<link href="{{URL::asset('assets/plugins/perfect-scrollbar/p-scrollbar.css')}}" rel="stylesheet" />

		<!--  Right-sidemenu css -->
		<link href="{{URL::asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">

		<!-- Sidemenu css -->
		<link rel="stylesheet" href="{{URL::asset('assets/css/sidemenu.css')}}">

		<!-- Maps css -->
		<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">

		<!-- style css -->
		<link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet">
		<link href="{{URL::asset('assets/css/style-dark.css')}}')}}" rel="stylesheet">
		<link href="{{URL::asset('assets/css/boxed.css')}}" rel="stylesheet">
		<link href="{{URL::asset('assets/css/dark-boxed.css')}}" rel="stylesheet">

		<!---Skinmodes css-->
		<link href="{{URL::asset('assets/css/skin-modes.css')}}" rel="stylesheet" />

	</head>

	<body class="main-body app sidebar-mini">

		<!-- Loader -->
		<div id="global-loader">
			<img src="{{URL::asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->
		<div class="page">
		 @include('admin.layouts.navigation')
			<div class="main-content app-content">

			<!-- main-header -->
			<div class="main-header sticky side-header nav nav-item">
				<div class="container-fluid">
					<div class="main-header-left ">
						<div class="responsive-logo">
							<a href="index.html"><img src="{{URL::asset('assets/img/brand/logo.png')}}" class="logo-1"
									alt="logo"></a>
							<a href="index.html"><img src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="dark-logo-1"
									alt="logo"></a>
							<a href="index.html"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-2"
									alt="logo"></a>
							<a href="index.html"><img src="{{URL::asset('assets/img/brand/favicon-white.png')}}" class="dark-logo-2"
									alt="logo"></a>
						</div>
						<div class="app-sidebar__toggle" data-bs-toggle="sidebar">
							<a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
							<a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
						</div>
						<div class="main-header-center ms-3 d-sm-none d-md-none d-lg-block">
							<input class="form-control" placeholder="Search for anything..." type="search"> <button
								class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
						</div>
					</div>
					<div class="main-header-right">
						<ul class="nav nav-item  navbar-nav-right ms-auto">


							<li class="dropdown nav-item main-header-notification">
								<a class="new nav-link" href="#">
									<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
										fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
										stroke-linejoin="round" class="feather feather-bell">
										<path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
										<path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
									</svg><span class=" pulse"></span></a>
								<div class="dropdown-menu">
									<div class="menu-header-content bg-primary text-start">
										<div class="d-flex">
											<h6 class="dropdown-title mb-1 tx-15 text-white fw-semibold">Notifications
											</h6>
											<span class="badge rounded-pill bg-warning ms-auto my-auto float-end">Mark
												All Read</span>
										</div>
										<p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You have
											4 unread Notifications</p>
									</div>
									<div class="main-notification-list Notification-scroll">
										<a class="d-flex p-3 border-bottom" href="#">
											<div class="notifyimg bg-pink">
												<i class="la la-file-alt text-white"></i>
											</div>
											<div class="ms-3">
												<h5 class="notification-label mb-1">New files available</h5>
												<div class="notification-subtext">10 hour ago</div>
											</div>
											<div class="ms-auto">
												<i class="las la-angle-right text-end text-muted"></i>
											</div>
										</a>
										<a class="d-flex p-3 border-bottom" href="#">
											<div class="notifyimg bg-purple">
												<i class="la la-gem text-white"></i>
											</div>
											<div class="ms-3">
												<h5 class="notification-label mb-1">Updates Available</h5>
												<div class="notification-subtext">2 days ago</div>
											</div>
											<div class="ms-auto">
												<i class="las la-angle-right text-end text-muted"></i>
											</div>
										</a>
										<a class="d-flex p-3 border-bottom" href="#">
											<div class="notifyimg bg-success">
												<i class="la la-shopping-basket text-white"></i>
											</div>
											<div class="ms-3">
												<h5 class="notification-label mb-1">New Order Received</h5>
												<div class="notification-subtext">1 hour ago</div>
											</div>
											<div class="ms-auto">
												<i class="las la-angle-right text-end text-muted"></i>
											</div>
										</a>
										<a class="d-flex p-3 border-bottom" href="#">
											<div class="notifyimg bg-warning">
												<i class="la la-envelope-open text-white"></i>
											</div>
											<div class="ms-3">
												<h5 class="notification-label mb-1">New review received</h5>
												<div class="notification-subtext">1 day ago</div>
											</div>
											<div class="ms-auto">
												<i class="las la-angle-right text-end text-muted"></i>
											</div>
										</a>
										<a class="d-flex p-3 border-bottom" href="#">
											<div class="notifyimg bg-danger">
												<i class="la la-user-check text-white"></i>
											</div>
											<div class="ms-3">
												<h5 class="notification-label mb-1">22 verified registrations</h5>
												<div class="notification-subtext">2 hour ago</div>
											</div>
											<div class="ms-auto">
												<i class="las la-angle-right text-end text-muted"></i>
											</div>
										</a>
										<a class="d-flex p-3 border-bottom" href="#">
											<div class="notifyimg bg-primary">
												<i class="la la-check-circle text-white"></i>
											</div>
											<div class="ms-3">
												<h5 class="notification-label mb-1">Project has been approved</h5>
												<div class="notification-subtext">4 hour ago</div>
											</div>
											<div class="ms-auto">
												<i class="las la-angle-right text-end text-muted"></i>
											</div>
										</a>
									</div>
									<div class="dropdown-footer">
										<a href="">VIEW ALL</a>
									</div>
								</div>
							</li>

							<!-- <li class="nav-item full-screen fullscreen-button">
								<a class="new nav-link full-screen-link" href="#"><svg
										xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
										fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
										stroke-linejoin="round" class="feather feather-maximize">
										<path
											d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
										</path>
									</svg></a>
							</li> -->

							<li class="dropdown main-profile-menu nav nav-item nav-link">
								<a class="profile-user d-flex" href=""><img alt=""
										src="{{URL::asset('assets/img/faces/6.jpg')}}"></a>
								<div class="dropdown-menu">
									<div class="main-header-profile bg-primary p-3">
										<div class="d-flex wd-100p">
											<div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/6.jpg')}}"
													class=""></div>
											<div class="ms-3 my-auto">
												<h6>Petey Cruiser</h6><span>Premium Member</span>
											</div>
										</div>
									</div>
									<a class="dropdown-item" href=""><i class="bx bx-user-circle"></i>Profile</a>
									<a class="dropdown-item" href=""><i class="bx bx-cog"></i> Edit Profile</a>
									<a class="dropdown-item" href=""><i class="bx bxs-inbox"></i>Inbox</a>
									<a class="dropdown-item" href=""><i class="bx bx-envelope"></i>Messages</a>
									<a class="dropdown-item" href=""><i class="bx bx-slider-alt"></i> Account
										Settings</a>
									<!-- <a class="dropdown-item" href="signin.html"><i class="bx bx-log-out"></i> Sign
										Out</a> -->
										<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                      <i class="bx bx-log-out"></i> Sign Out
                                    </a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
								</div>
							</li>


						</ul>
					</div>
				</div>
			</div>
			@yield('content')
		</div>
		<div class="modal fade" id="chatmodel" tabindex="-1" role="dialog"  aria-hidden="true">
				<div class="modal-dialog modal-dialog-right chatbox" role="document">
					<div class="modal-content chat border-0">
						<div class="card overflow-hidden mb-0 border-0">
							<!-- action-header -->
							<div class="action-header clearfix">
								<div class="float-start hidden-xs d-flex ms-2">
									<div class="img_cont me-3">
										<img src="{{URL::asset('assets/img/faces/6.jpg')}}" class="rounded-circle user_img" alt="img">
									</div>
									<div class="align-items-center mt-2">
										<h4 class="text-white mb-0 fw-semibold">Daneil Scott</h4>
										<span class="dot-label bg-success"></span><span class="me-3 text-white">online</span>
									</div>
								</div>
								<ul class="ah-actions actions align-items-center">
									<li class="call-icon">
										<a href="" class="d-done d-md-block phone-button" data-bs-toggle="modal" data-bs-target="#audiomodal">
											<i class="si si-phone"></i>
										</a>
									</li>
									<li class="video-icon">
										<a href="" class="d-done d-md-block phone-button" data-bs-toggle="modal" data-bs-target="#videomodal">
											<i class="si si-camrecorder"></i>
										</a>
									</li>
									<li class="dropdown">
										<a href="" data-bs-toggle="dropdown" aria-expanded="true">
											<i class="si si-options-vertical"></i>
										</a>
										<ul class="dropdown-menu dropdown-menu-right">
											<li><i class="fa fa-user-circle"></i> View profile</li>
											<li><i class="fa fa-users"></i>Add friends</li>
											<li><i class="fa fa-plus"></i> Add to group</li>
											<li><i class="fa fa-ban"></i> Block</li>
										</ul>
									</li>
									<li>
										<a href=""  class="" data-bs-dismiss="modal" aria-label="Close">
											<span aria-hidden="true"><i class="si si-close text-white"></i></span>
										</a>
									</li>
								</ul>
							</div>
							<!-- action-header end -->

							<!-- msg_card_body -->
							<div class="card-body msg_card_body">
								<div class="chat-box-single-line">
									<abbr class="timestamp">February 1st, 2019</abbr>
								</div>
								<div class="d-flex justify-content-start">
									<div class="img_cont_msg">
										<img src="{{URL::asset('assets/img/faces/6.jpg')}}" class="rounded-circle user_img_msg" alt="img">
									</div>
									<div class="msg_cotainer">
										Hi, how are you Jenna Side?
										<span class="msg_time">8:40 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end ">
									<div class="msg_cotainer_send">
										Hi Connor Paige i am good tnx how about you?
										<span class="msg_time_send">8:55 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="{{URL::asset('assets/img/faces/9.jpg')}}" class="rounded-circle user_img_msg" alt="img">
									</div>
								</div>
								<div class="d-flex justify-content-start ">
									<div class="img_cont_msg">
										<img src="{{URL::asset('assets/img/faces/6.jpg')}}" class="rounded-circle user_img_msg" alt="img">
									</div>
									<div class="msg_cotainer">
										I am good too, thank you for your chat template
										<span class="msg_time">9:00 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end ">
									<div class="msg_cotainer_send">
										You welcome Connor Paige
										<span class="msg_time_send">9:05 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="{{URL::asset('assets/img/faces/9.jpg')}}" class="rounded-circle user_img_msg" alt="img">
									</div>
								</div>
								<div class="d-flex justify-content-start ">
									<div class="img_cont_msg">
										<img src="{{URL::asset('assets/img/faces/6.jpg')}}" class="rounded-circle user_img_msg" alt="img">
									</div>
									<div class="msg_cotainer">
										Yo, Can you update Views?
										<span class="msg_time">9:07 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										But I must explain to you how all this mistaken  born and I will give
										<span class="msg_time_send">9:10 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="{{URL::asset('assets/img/faces/9.jpg')}}" class="rounded-circle user_img_msg" alt="img">
									</div>
								</div>
								<div class="d-flex justify-content-start ">
									<div class="img_cont_msg">
										<img src="{{URL::asset('assets/img/faces/6.jpg')}}" class="rounded-circle user_img_msg" alt="img">
									</div>
									<div class="msg_cotainer">
										Yo, Can you update Views?
										<span class="msg_time">9:07 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										But I must explain to you how all this mistaken  born and I will give
										<span class="msg_time_send">9:10 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="{{URL::asset('assets/img/faces/9.jpg')}}" class="rounded-circle user_img_msg" alt="img">
									</div>
								</div>
								<div class="d-flex justify-content-start ">
									<div class="img_cont_msg">
										<img src="{{URL::asset('assets/img/faces/6.jpg')}}" class="rounded-circle user_img_msg" alt="img">
									</div>
									<div class="msg_cotainer">
										Yo, Can you update Views?
										<span class="msg_time">9:07 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										But I must explain to you how all this mistaken  born and I will give
										<span class="msg_time_send">9:10 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="{{URL::asset('assets/img/faces/9.jpg')}}" class="rounded-circle user_img_msg" alt="img">
									</div>
								</div>
								<div class="d-flex justify-content-start">
									<div class="img_cont_msg">
										<img src="{{URL::asset('assets/img/faces/6.jpg')}}" class="rounded-circle user_img_msg" alt="img">
									</div>
									<div class="msg_cotainer">
										Okay Bye, text you later..
										<span class="msg_time">9:12 AM, Today</span>
									</div>
								</div>
							</div>
							<!-- msg_card_body end -->
							<!-- card-footer -->
							<div class="card-footer">
								<div class="msb-reply d-flex">
									<div class="input-group">
										<input type="text" class="form-control " placeholder="Typing....">
										<div class="input-group-text ">
											<button type="button" class="btn btn-primary ">
												<i class="far fa-paper-plane" aria-hidden="true"></i>
											</button>
										</div>
									</div>
								</div>
							</div><!-- card-footer end -->
						</div>
					</div>
				</div>
			</div>

			<!--Video Modal -->
			<div id="videomodal" class="modal fade">
				<div class="modal-dialog" role="document">
					<div class="modal-content bg-dark border-0 text-white">
						<div class="modal-body mx-auto text-center p-7">
							<h5>Valex Video call</h5>
							<img src="{{URL::asset('assets/img/faces/6.jpg')}}" class="rounded-circle user-img-circle h-8 w-8 mt-4 mb-3" alt="img">
							<h4 class="mb-1 fw-semibold">Daneil Scott</h4>
							<h6>Calling...</h6>
							<div class="mt-5">
								<div class="row">
									<div class="col-4">
										<a class="icon icon-shape rounded-circle mb-0 me-3" href="#">
											<i class="fas fa-video-slash"></i>
										</a>
									</div>
									<div class="col-4">
										<a class="icon icon-shape rounded-circle text-white mb-0 me-3" href="#" data-bs-dismiss="modal" aria-label="Close">
											<i class="fas fa-phone bg-danger text-white"></i>
										</a>
									</div>
									<div class="col-4">
										<a class="icon icon-shape rounded-circle mb-0 me-3" href="#">
											<i class="fas fa-microphone-slash"></i>
										</a>
									</div>
								</div>
							</div>
						</div><!-- modal-body -->
					</div>
				</div><!-- modal-dialog -->
			</div><!-- modal -->

			<!-- Audio Modal -->
			<div id="audiomodal" class="modal fade">
				<div class="modal-dialog" role="document">
					<div class="modal-content border-0">
						<div class="modal-body mx-auto text-center p-7">
							<h5>Valex Voice call</h5>
							<img src="{{URL::asset('assets/img/faces/6.jpg')}}" class="rounded-circle user-img-circle h-8 w-8 mt-4 mb-3" alt="img">
							<h4 class="mb-1  fw-semibold">Daneil Scott</h4>
							<h6>Calling...</h6>
							<div class="mt-5">
								<div class="row">
									<div class="col-4">
										<a class="icon icon-shape rounded-circle mb-0 me-3" href="#">
											<i class="fas fa-volume-up bg-light text-dark"></i>
										</a>
									</div>
									<div class="col-4">
										<a class="icon icon-shape rounded-circle text-white mb-0 me-3" href="#" data-bs-dismiss="modal" aria-label="Close">
											<i class="fas fa-phone text-white bg-success"></i>
										</a>
									</div>
									<div class="col-4">
										<a class="icon icon-shape  rounded-circle mb-0 me-3" href="#">
											<i class="fas fa-microphone-slash bg-light text-dark"></i>
										</a>
									</div>
								</div>
							</div>
						</div><!-- modal-body -->
					</div>
				</div><!-- modal-dialog -->
			</div><!-- modal -->

			<!-- Footer opened -->
			<div class="main-footer ht-40">
				<div class="container-fluid pd-t-0-f ht-100p">
					<span>Copyright © 2021 <a href="#">Valex</a>. Designed by <a href="https://www.spruko.com/">Spruko</a> All rights reserved.</span>
				</div>
			</div>
			<!-- Footer closed -->

		</div>
		<!-- End Page -->

		<!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

		<!-- JQuery min js -->
		<script src="{{URL::asset('assets/plugins/jquery/jquery.min.js')}}"></script>

		<!-- Bootstrap Bundle js -->
		<script src="{{URL::asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

		<!--Internal  Chart.bundle js -->
		<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>

		<!-- Ionicons js -->
		<script src="{{URL::asset('assets/plugins/ionicons/ionicons.js')}}"></script>

		<!-- Moment js -->
		<script src="{{URL::asset('assets/plugins/moment/moment.js')}}"></script>

		<!--Internal Sparkline js -->
		<script src="{{URL::asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

		<!-- Moment js -->
		<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>

		<!--Internal Apexchart js-->
		<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>

		<!-- Rating js-->
		<script src="{{URL::asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/rating/jquery.barrating.js')}}"></script>

		<!--Internal  Perfect-scrollbar js -->
		<script src="{{URL::asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>

		<!-- Eva-icons js -->
		<script src="{{URL::asset('assets/js/eva-icons.min.js')}}"></script>

		<!-- right-sidebar js -->
		<script src="{{URL::asset('assets/plugins/sidebar/sidebar.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/sidebar/sidebar-custom.js')}}"></script>

		<!-- Sticky js -->
		<script src="{{URL::asset('assets/js/sticky.js')}}"></script>
		<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>

		<!-- Left-menu js-->
		<script src="{{URL::asset('assets/plugins/side-menu/sidemenu.js')}}"></script>

		<!-- Internal Map -->
		<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>

		<!--Internal  index js -->
		<script src="{{URL::asset('assets/js/index.js')}}"></script>

		<!-- Apexchart js-->
		<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
		<script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>

		<!-- Laravel Javascript Validation -->
		<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

		<!-- custom js -->
		<script src="{{URL::asset('assets/js/custom.js')}}"></script>

	</body>
</html>