<?php
include('connection.php');
if(!isset($_SESSION['eid']))
{
	echo "<script>window.location = 'index.php'; </script>";
}
?>

<!doctype html>
<html lang="en-US">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
<title>Change Password</title>
<link rel="shortcut icon" href="images/favicon.png"/>
<link rel='stylesheet' href='css/settings.css' type='text/css' media='all'/>
<link rel='stylesheet' href='css/elegant-icon.css' type='text/css' media='all'/>
<link rel='stylesheet' href='css/font-awesome.min.css' type='text/css' media='all'/>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all'/>
<link rel='stylesheet' href='css/shop.css' type='text/css' media='all'/>
<link rel='stylesheet' href='css/page.css' type='text/css' media='all'/>
<link rel='stylesheet' href='css/preloader.css' type='text/css' media='all'/>
<link rel='stylesheet' href='css/magnific-popup.css' type='text/css' media='all'/>
<link rel='stylesheet' href='css/skin-selector.css' type='text/css' media='all'/>
<style>
form .error
{
	color:#FF0000;
	font-size:13px;
}
</style> 
<!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body data-spy="scroll">
<div id="preloader">
<img class="preloader__logo" src="images/logo.png" alt=""/>
<div class="preloader__progress">
<svg width="60px" height="60px" viewBox="0 0 80 80" xmlns="http://www.w3.org/2000/svg">
<path class="preloader__progress-circlebg" fill="none" stroke="#dddddd" stroke-width="4" stroke-linecap="round" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
<path id='preloader__progress-circle' fill="none" stroke="#57bb8a" stroke-width="4" stroke-linecap="round" stroke-dashoffset="192.61" stroke-dasharray="192.61 192.61" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
</svg>
</div>
</div>
<div id="wrapper" class="wide-wrap">
<div class="morphsearch" id="morphsearch">
<form>
<input type="search" name="s" placeholder="Search..." class="morphsearch-input">
<button type="submit" class="morphsearch-submit"></button>
</form>
<span class="morphsearch-close"></span>
</div>
<?php include('header.php'); ?>
<div class="heading-container heading-resize">
<div class="heading-background heading-parallax bg-1">
<div class="container">
<div class="row heading-wrap">
<div class="col-md-12 page-title parallax-content">
<h1>MASTER MIND TECHNOLOGIES</h1>
</div>
</div>
</div>
</div>
</div>
<div class="content-container no-padding">
<div class="container-full">
<div class="row">
<div class="col-md-12 main-wrap">
<div class="main-content">
<div class="row row-custom-padding section-contact">
<div class="column col-md-12">
<div class="container">
<div class="row" >
<h1 align="center" style="color:#57bb8a;"><i class="elegant_icon_key_alt"></i> <strong>Change Password</strong></h1>
<div class="column col-md-6 col-sm-6" id="pass" style="margin-left:300px;">
<form name="myform" id="myform" method="post" enctype="multipart/form-data">
<div class="row">

<div class="col-sm-12">
<div class="form-control-wrap">
<i class="elegant_icon_search_alt"></i>&nbsp;<strong>Old Password :</strong>
<input type="password" name="txtoldpass" id="txtoldpass" class="form-control text" placeholder="Enter Your Password" />
</div>
</div>

<div class="col-sm-12">
<div class="form-control-wrap">
<i class="elegant_icon_lock"></i>&nbsp;<strong>New Password :</strong>
<input type="password" name="txtpassword" id="txtpassword" class="form-control text" placeholder="Enter Your Password" />
</div>
</div>

<div class="col-sm-12">
<div class="form-control-wrap">
<i class="elegant_icon_check_alt"></i>&nbsp;<strong>Confirm Password :</strong>
<input type="password" name="txtcpassword" id="txtcpassword" class="form-control text" placeholder="Confirm Your Password" />
</div>
</div>

</div>
<div class="empty-space-30"></div>

<div class="text-center">
<button type="submit" name="btnchangepass" id="btnchangepass" class="btn btn-primary btn-block btn-lg btn-style-outlined btn-effect-bg-right"><span>Change It...!!!</span></button>
</div>
</form>
</div>

<?php
if(isset($_REQUEST['btnchangepass']))
{
	$qry = mysql_query("select * from tbl_employee where emp_id ='". $_SESSION['eid'] ."' and emp_pass='".$_REQUEST['txtoldpass']."'") or die(mysql_error());
	if(mysql_num_rows($qry)>0)
	{
		while($row = mysql_fetch_array($qry))
		{
			$pass = $row['emp_pass'];
		}
		
		if($pass == $_REQUEST['txtoldpass'])
		{
			echo "<script>alert('password Matched');</script>";
			$sql=mysql_query("update tbl_employee set emp_pass='".$_REQUEST['txtpassword']."' where emp_id='". $_SESSION['eid'] ."'");
			if($sql)
			{
				echo "<script>window.location = 'tickets.php'; </script>";
			}
			else
			{
				echo"<Script>alert('login.php');</script>";
			}
		}
		
	}
	else
	{
		echo "<script>alert('password Not Matched');</script>";
	}
}
?>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php include('footer.php'); ?>
</div>
<a href="#" class="go-to-top"><i class="fa fa-angle-up"></i></a>
<div class="sitesao-preview">

</div>
<div class="sitesao-preview__loading">
<div class="sitesao-preview__loading__animation"><i></i><i></i><i></i><i></i></div>
</div>
<script type='text/javascript' src='js/jquery.js'></script>
<script src="jquery.validate.js"></script>
<script src="additional-methods.js"></script>
<script type="text/javascript">	
jQuery(document).ready(function () {
//	alert('as');
		jQuery('#btnchangepass').click(function(){
//1		alert('sd');
			jQuery("#myform").validate({
				rules:{
					txtoldpass:
					{
						required:true,
						minlength:8
					},
					txtpassword:
					{
						required:true,
						minlength:8
					},
					txtcpassword: 
					{
						required:true,
						equalTo:'#txtpassword'
					}
				},
				messages:{
				txtoldpass: {
					required: "Old Password is required",
					minlength: "Minimum 08 Characters Needed"
				},
					txtpassword: {
					required: "New Password is required",
					minlength: "Minimum 08 Characters Needed"
				},
					txtcpassword: {
					required: "Please Enter Password Again To verify",
					equalTo: "Password Does Not Match Please Re-Type it."
				}
				}
			
			});
	});
});
<!--AJAX ENDED-->
</script>
	<script type='text/javascript' src='js/jquery-migrate.min.js'></script>
<script type='text/javascript' src='js/jquery.themepunch.tools.min.js'></script>
<script type='text/javascript' src='js/jquery.themepunch.revolution.min.js'></script>
<script type='text/javascript' src='js/preloader.min.js'></script>
<script type='text/javascript' src='js/easing.min.js'></script>
<script type='text/javascript' src='js/imagesloaded.pkgd.min.js'></script>
<script type='text/javascript' src='js/bootstrap.min.js'></script>
<script type='text/javascript' src='js/superfish-1.7.4.min.js'></script>

<script type="text/javascript">
	jQuery(document).ready(function($){
		$('#lnkmy').addClass('active');
	});
</script>

<script type='text/javascript' src='js/jquery.appear.min.js'></script>
<script type='text/javascript' src='js/script.js'></script>
<script type='text/javascript' src='js/jquery.parallax.js'></script>
<script type='text/javascript' src='js/jquery.countTo.min.js'></script>
<script type='text/javascript' src='js/isotope.pkgd.min.js'></script>
<script type='text/javascript' src='js/jquery.magnific-popup.min.js'></script>
<script type='text/javascript' src='js/jquery.touchSwipe.min.js'></script>

<script type='text/javascript' src='js/jquery.carouFredSel.min.js'></script>
<script type='text/javascript' src='js/skin-selector.js'></script>
<script type="text/javascript">
/* <![CDATA[ */
(function(){try{var s,a,i,j,r,c,l=document.getElementsByTagName("a"),t=document.createElement("textarea");for(i=0;l.length-i;i++){try{a=l[i].getAttribute("href");if(a&&a.indexOf("/cdn-cgi/l/email-protection") > -1  && (a.length > 28)){s='';j=27+ 1 + a.indexOf("/cdn-cgi/l/email-protection");if (a.length > j) {r=parseInt(a.substr(j,2),16);for(j+=2;a.length>j&&a.substr(j,1)!='X';j+=2){c=parseInt(a.substr(j,2),16)^r;s+=String.fromCharCode(c);}j+=1;s+=a.substr(j,a.length-j);}t.innerHTML=s.replace(/</g,"&lt;").replace(/>/g,"&gt;");l[i].setAttribute("href","mailto:"+t.value);}}catch(e){}}}catch(e){}})();
/* ]]> */
</script>
</body>

</html>