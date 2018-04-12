<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.5.4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
<meta charset="utf-8" />
<title><?php echo ConfigUtil::getApplicationTitle();?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link
	href="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css"
	rel="stylesheet" type="text/css" />
<link
	href="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/bootstrap/css/bootstrap.min.css"
	rel="stylesheet" type="text/css" />
<link
	href="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/uniform/css/uniform.default.css"
	rel="stylesheet" type="text/css" />
<link
	href="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css"
	rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link
	href="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/select2/css/select2.min.css"
	rel="stylesheet" type="text/css" />
<link
	href="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/select2/css/select2-bootstrap.min.css"
	rel="stylesheet" type="text/css" />
<link
	href="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"
	rel="stylesheet" type="text/css" />
<link
	href="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"
	rel="stylesheet" type="text/css" />
<link
	href="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.css"
	rel="stylesheet" type="text/css" />
<link
	href="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/datatables/datatables.min.css"
	rel="stylesheet" type="text/css" />
<link
	href="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css"
	rel="stylesheet" type="text/css" />
<link
	href="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/icheck/skins/all.css"
	rel="stylesheet" type="text/css" />
	
<link href="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL STYLES -->
<link
	href="<?php echo ConfigUtil::getAppName();?>/assets/global/css/components.min.css"
	rel="stylesheet" id="style_components" type="text/css" />
<link
	href="<?php echo ConfigUtil::getAppName();?>/assets/global/css/plugins.min.css"
	rel="stylesheet" type="text/css" />


<!-- END THEME GLOBAL STYLES -->
<!-- BEGIN THEME LAYOUT STYLES -->
<link
	href="<?php echo ConfigUtil::getAppName();?>/assets/layouts/layout/css/layout.min.css"
	rel="stylesheet" type="text/css" />
<link
	href="<?php echo ConfigUtil::getAppName();?>/assets/layouts/layout/css/themes/darkblue.min.css"
	rel="stylesheet" type="text/css" id="style_color" />
<link
	href="<?php echo ConfigUtil::getAppName();?>/assets/layouts/layout/css/custom.min.css"
	rel="stylesheet" type="text/css" />

<link
	href="<?php echo ConfigUtil::getAppName();?>/css/jquery-ui-1.11.4.custom.css"
	rel="stylesheet" type="text/css" />
<!--  <link href="<?//php echo ConfigUtil::getAppName();?>/css/SpecialDateSheet.css" rel="stylesheet" type="text/css" /> -->

<!-- END THEME LAYOUT STYLES -->
<!-- <link rel="shortcut icon" href="favicon.ico" /> -->
<!-- END HEAD -->

</head>

<!-- END HEAD -->
<body
	class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">

	<!-- <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white"> -->
	<!-- BEGIN HEADER -->
	<!--  style=" background-color: #0d19a5; !important" -->
	<div class="page-header navbar navbar-fixed-top">
		<!-- BEGIN HEADER INNER -->
		<div class="page-header-inner ">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<a href="#">  <img src="<?php echo ConfigUtil::getAppName();?>/images/logo_main.png" alt="logo" class="logo-default" style="position: absolute;top: -28px;left:-10px; !important" height="70" /> 

				</a>
				<div class="menu-toggler sidebar-toggler"></div>
			</div>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="menu-toggler responsive-toggler"
				data-toggle="collapse" data-target=".navbar-collapse"></a>
			<!-- END RESPONSIVE MENU TOGGLER -->
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<!-- <asp:Literal ID="litAlert" runat="server"></asp:Literal> -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

 <img src="<?php echo ConfigUtil::getAppName();?>/images/ataluk.png" style="position: absolute;top: 0px;right:0px; !important" />

					
					<li class="dropdown dropdown-user"><a href="javascript:;"
						class="dropdown-toggle" data-toggle="dropdown"
						data-hover="dropdown" data-close-others="true"> <!--<img alt="" class="img-circle" src="../assets/layouts/layout/img/avatar3_small.jpg" />-->
							<span class="username username-hide-on-mobile">
<?php echo UserLoginUtils::getLoginInfo();?>
</span> <i class="fa fa-angle-down"></i>
					</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li><a
								href="<?php echo ConfigUtil::getAppName();?>/index.php/Users/MyProfile/id/<?php echo UserLoginUtils::getUsersLoginId(); ?>">
									<i class="icon-user"></i>My Profile
							</a></li>
							<li><a id="btnLogOut"
								href="<?php echo ConfigUtil::getAppName();?>/index.php/Site/LogOut"><i
									class="icon-key"></i>Log Out </a></li>
						</ul></li>
					<!-- END USER LOGIN DROPDOWN -->
					<!-- BEGIN QUICK SIDEBAR TOGGLER -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-quick-sidebar-toggler"><a
						href="javascript:;" class="dropdown-toggle"> <i
							class="icon-logout"></i>
					</a></li>
					<!-- END QUICK SIDEBAR TOGGLER -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END HEADER INNER -->
	</div>
	<!-- END HEADER -->
	<!-- BEGIN HEADER & CONTENT DIVIDER -->
	<div class="clearfix"></div>
	<!-- END HEADER & CONTENT DIVIDER -->
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar-wrapper">
			<!-- BEGIN SIDEBAR -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<div class="page-sidebar navbar-collapse collapse">
				<!-- BEGIN SIDEBAR MENU -->
				<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
				<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
				<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
				<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
				<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
				<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
				<ul class="page-sidebar-menu  page-header-fixed "
					data-keep-expanded="false" data-auto-scroll="true"
					data-slide-speed="200" style="padding-top: 20px">
					<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
					<li class="sidebar-toggler-wrapper hide">
						<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
						<div class="sidebar-toggler"></div> <!-- END SIDEBAR TOGGLER BUTTON -->
					</li>
					<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
					<li class="sidebar-search-wrapper">
						<!-- BEGIN RESPONSIVE QUICK SEARCH FORM --> <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
						<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
						<form class="sidebar-search  sidebar-search-bordered" action="#"
							method="POST">
							<a href="javascript:;" class="remove"> <i class="icon-close"></i>
							</a>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="input-group-btn"> <a href="javascript:;"
									class="btn submit"> <i class="icon-magnifier"></i>
								</a>
								</span>
							</div>
						</form> <!-- END RESPONSIVE QUICK SEARCH FORM -->
					</li>
<?php echo MenuUtil::getMenuByRole($_SERVER['REQUEST_URI']);?>
</ul>
				<!-- END SIDEBAR MENU -->
				<!-- END SIDEBAR MENU -->
			</div>
			<!-- END SIDEBAR -->
		</div>
		<!-- END SIDEBAR -->
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<!-- BEGIN CONTENT BODY -->
			<div class="page-content">
				<div class="page-bar">
					<ul class="page-breadcrumb">
<?php echo MenuUtil::getNavigator($_SERVER['REQUEST_URI']);?>
</ul>
					<div class="page-toolbar">
<?php echo ConfigUtil::getApplicationUpdateVersion();?>
</div>
				</div>
				<!-- END PAGE BAR -->
				<!-- BEGIN PAGE TITLE-->
				<h3 class="page-title">
					<!-- <asp:Literal ID="litPageTitle" runat="server" /> -->
				</h3>
				<!-- END PAGE TITLE-->
				<!-- END PAGE HEADER-->
				<!--<div class="note note-info"><p> A black page template with a minimal dependency assets to use as a base for any custom page you create </p></div>-->
<?php echo $content; ?>
</div>
			<!-- END CONTENT BODY -->
		</div>
		<!-- END CONTENT -->
		<!-- BEGIN QUICK SIDEBAR -->
		<a href="javascript:;" class="page-quick-sidebar-toggler"> <i
			class="icon-login"></i>
		</a>
		<!-- END QUICK SIDEBAR -->
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="page-footer">
		<div class="page-footer-inner">
<?php echo ConfigUtil::getApplicationCopyRight();?>
<span><?php echo ConfigUtil::getApplicationAddress();?></span>

		</div>
		<div class="scroll-to-top">
			<i class="icon-arrow-up"></i>
		</div>
	</div>
	<!-- END FOOTER -->
	<!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
	<!-- BEGIN CORE PLUGINS -->
	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/jquery.min.js"
		type="text/javascript"></script>


	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/bootstrap/js/bootstrap.min.js"
		type="text/javascript"></script>
	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/js.cookie.min.js"
		type="text/javascript"></script>
	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
		type="text/javascript"></script>
	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
		type="text/javascript"></script>
	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/jquery.blockui.min.js"
		type="text/javascript"></script>
	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/uniform/jquery.uniform.min.js"
		type="text/javascript"></script>
			<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/jquery.blockui.min.js"
		type="text/javascript"></script>
		
	<script
	
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
		type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/moment.min.js"
		type="text/javascript"></script>
	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js"
		type="text/javascript"></script>
	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"
		type="text/javascript"></script>

	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/select2/js/select2.full.min.js"
		type="text/javascript"></script>
	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"
		type="text/javascript"></script>
		
	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/jquery-validation/js/additional-methods.min.js"
		type="text/javascript"></script>
	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js"
		type="text/javascript"></script>
	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/datatables/datatables.min.js"
		type="text/javascript"></script>
	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"
		type="text/javascript"></script>


	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN THEME GLOBAL SCRIPTS -->
	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/scripts/app.min.js"
		type="text/javascript"></script>

	<!-- END THEME GLOBAL SCRIPTS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script
		src="<?php echo ConfigUtil::getAppName();?>/js/components-select2.min.js"
		type="text/javascript"></script>

	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"
		type="text/javascript"></script>
	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/icheck/icheck.min.js"
		type="text/javascript"></script>
	<script
		src="<?php echo ConfigUtil::getAppName();?>/js/components-date-time-pickers.min.js"
		type="text/javascript"></script>
	<script src="<?php echo ConfigUtil::getAppName();?>/js/mycustom.js"
		type="text/javascript"></script>

	<!-- END PAGE LEVEL SCRIPTS -->
	<!-- BEGIN THEME LAYOUT SCRIPTS -->
	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/layouts/layout/scripts/layout.min.js"
		type="text/javascript"></script>
	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/layouts/global/scripts/quick-sidebar.min.js"
		type="text/javascript"></script>
		
	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/ckeditor/ckeditor.js"
		type="text/javascript"></script>
		
	<!-- END THEME LAYOUT SCRIPTS -->

	<script
		src="<?php echo ConfigUtil::getAppName();?>/js/jquery-ui-1.11.4.custom.js"
		type="text/javascript"></script>
		
	<script src="<?php echo ConfigUtil::getAppName();?>/js/moment.js"
		type="text/javascript"></script>






	<script>
jQuery(document).ready(function () {

});
</script>
	<!-- END JAVASCRIPTS -->
</body>

</html>




