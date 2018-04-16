<!DOCTYPE html>
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
<link
	href="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/font-awesome/css/font-awesome.min.css"
	rel="stylesheet" type="text/css" />
<link
	href="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/bootstrap/css/bootstrap.min.css"
	rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME GLOBAL STYLES -->
<link
	href="<?php echo ConfigUtil::getAppName();?>/assets/global/css/components.min.css"
	rel="stylesheet" id="style_components" type="text/css" />
<!-- END THEME GLOBAL STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo ConfigUtil::getAppName();?>/css/login.min.css"
	rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME LAYOUT STYLES -->
<!-- END THEME LAYOUT STYLES -->
<!--         <link rel="shortcut icon" href="favicon.ico" /> </head> -->

<style type="text/css">
.fullscreenDiv {
	background-color: #e8e8e8;
	width: 100%;
	height: auto;
	bottom: 0px;
	top: 0px;
	left: 0;
	position: absolute;
}

.center {
	position: absolute;
/* 	border: 1px solid blue; */
/* 	width: 100px; */
/* 	height: 50px; */
/*  	top: 50%;  */
 	left: 40%; 
	margin-top: 20px;
 	margin-left: 0px; 
 	
}
</style>
<!-- END HEAD -->


<body class=" login">
	<!-- BEGIN LOGO -->
	<div class="logo">
		<a href="#"><img
			src="<?php echo ConfigUtil::getAppName();?>/images/logo_main.png"
			alt="" width="15%"
			style="position: absolute; left: 40%; margin-top: -40px; !important" /> </a>
	</div>



	<span class="center">
		<font color="white"><?php echo ConfigUtil::getApplicationTitle();?></font>
	</span>

	<!-- END LOGO -->
	<!-- BEGIN LOGIN -->
	<div class="content">
	    
			<?php echo $content; ?>
        </div>
	<!-- END LOGIN FORM -->
	<div class="copyright"> <?php echo ConfigUtil::getApplicationCopyRight();?> </div>
	<!--[if lt IE 9]>
<![endif]-->
	<!-- BEGIN CORE PLUGINS -->
	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/jquery.min.js"
		type="text/javascript"></script>
	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/bootstrap/js/bootstrap.min.js"
		type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script
		src="<?php echo ConfigUtil::getAppName();?>/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"
		type="text/javascript"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN THEME GLOBAL SCRIPTS -->
	<!--         <script src="<?php echo ConfigUtil::getAppName();?>/assets/global/scripts/app.min.js" type="text/javascript"></script> -->
	<!-- END THEME GLOBAL SCRIPTS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<!-- END PAGE LEVEL SCRIPTS -->
	<!-- BEGIN THEME LAYOUT SCRIPTS -->
	<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>