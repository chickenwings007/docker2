<?php
include('connection.php'); 
if(!isset($_SESSION['uid']))
{
	echo "<script>window.location='index.php';</script>";
} 
?>
 
<!doctype html>
<html lang="en-US">

<!-- Mirrored from sitesao.com/html/airslice/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Dec 2015 11:23:23 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
<title>Complains</title>
<link rel="shortcut icon" href="images/favicon.png"/>
<link rel='stylesheet' href='css/settings.css' type='text/css' media='all'/>
<link rel='stylesheet' href='css/elegant-icon.css' type='text/css' media='all'/>
<link rel='stylesheet' href='css/font-awesome.min.css' type='text/css' media='all'/>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all'/>
<link rel='stylesheet' href='css/shop.css' type='text/css' media='all'/>
<link rel='stylesheet' href='css/preloader.css' type='text/css' media='all'/>
<link rel='stylesheet' href='css/magnific-popup.css' type='text/css' media='all'/>
<link rel='stylesheet' href='css/skin-selector.css' type='text/css' media='all'/>
 

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
<?php include('header.php'); ?>
<div class="heading-container ">
<div class="container heading-standar">
<div class="heading-wrap">

<div class="page-title">
<h1 align="center">Complains</h1>
</div>
</div>
</div>
</div>
<div class="content-container">
<div class="container">
<div class="row">
<div class="col-md-12 main-wrap">
<div class="main-content">
<div class="shop">
<table class="table table-bordered shop_table cart">
<thead>
<tr>
<th class="product-name" style="text-align:center;">No.</th>
<th class="product-name" style="text-align:center;">Product Name</th>
<th class="product-name" style="text-align:center;">Problem</th>
<th class="product-name" style="text-align:center;">Ticket Date</th>
<th class="product-name" style="text-align:center;">Employee</th>
<th class="product-name" style="text-align:center;">Prefer Date</th>
<th class="product-name" style="text-align:center;">Prefer Time</th>
<th class="product-name" style="text-align:center;">Status</th>
<th class="product-name" style="text-align:center;">Assign Date</th>
<th class="product-name" style="text-align:center;">Complete Date</th>
<th class="product-name" style="text-align:center;">Remark</th>
</tr>
</thead>
<tbody>

<tr class="cart_item">

<?php
	$count=1;
	$qry="select *,(select emp_name from tbl_employee where emp_id=tbl_ticket.emp_id) as ename,(select product_name from tbl_products where product_id=tbl_ticket.product_id) as pname from tbl_ticket where user_id='".$_SESSION['uid']."'";
	$rs = mysql_query($qry);
	if(mysql_num_rows($rs)==0)
	{
?>
<td colspan="11" align="center" style="font-size:24px; letter-spacing:0.5cm;">You Are Happy With Our Product..!!!</td>
<?php
	}
	while($row = mysql_fetch_array($rs))
	{
			$date = $row['ticket_date'];
			$ndate = date("d-m-Y", strtotime($date));
			
			$date = $row['prefer_date'];
			$pdate = date("d-m-Y", strtotime($date));
			
			if($row['assign_date'] == "")
			{
				$adate = $row['assign_date']; 
				echo $adate;
			}
			else
			{
				$date = $row['assign_date'];
				$adate = date("d-m-Y", strtotime($date));
			}
			
			if($row['complete_date'] == "")
			{
				$cdate = $row['complete_date']; 
				echo $cdate;
			}
			else
			{
				$date = $row['complete_date'];
				$cdate = date("d-m-Y", strtotime($date));
			}
			
			$time = $row['prefer_time'];
			$ctime = date("h:i a", strtotime($time));
	
		
?>
<td class="text-center"><?php echo $count; ?></td>
<td class="text-center"><?php echo $row['pname']; ?></td>
<td class="text-center"><strong><?php echo $row['problem']; ?></strong></td>
<td class="text-center"><?php echo $ndate; ?></td>
<td class="text-center"><strong><?php echo $row['ename']; ?></strong></td>
<td class="text-center"><?php echo $pdate; ?></td>
<td class="text-center"><?php echo $ctime; ?></td>
<td class="text-center"><?php echo $row['status']; ?></td>
<td class="text-center"><?php echo $adate; ?></td>
<td class="text-center"><?php echo $cdate; ?></td>
<td class="text-center"><?php echo $row['remark']; ?></td>

</tr>
<?php 
$count++;
}
?>
</tbody>
</table>

</div>
</div>
</div>
</div>
</div>
</div>

<?php include('footer.php'); ?>
</div>
<a href="#" class="go-to-top"><i class="fa fa-angle-up"></i></a>
	
<div class="sitesao-preview__loading">
<div class="sitesao-preview__loading__animation"><i></i><i></i><i></i><i></i></div>
</div>
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery-migrate.min.js'></script>
<script type='text/javascript' src='js/jquery.themepunch.tools.min.js'></script>
<script type='text/javascript' src='js/jquery.themepunch.revolution.min.js'></script>
<script type='text/javascript' src='js/preloader.min.js'></script>
<script type='text/javascript' src='js/easing.min.js'></script>
<script type='text/javascript' src='js/imagesloaded.pkgd.min.js'></script>
<script type='text/javascript' src='js/bootstrap.min.js'></script>
<script type='text/javascript' src='js/superfish-1.7.4.min.js'></script>
<script type='text/javascript' src='js/jquery.appear.min.js'></script>
<script type='text/javascript' src='js/script.js'></script>
<script type='text/javascript' src='js/jquery.parallax.js'></script>
<script type='text/javascript' src='js/jquery.countTo.min.js'></script>
<script type='text/javascript' src='js/isotope.pkgd.min.js'></script>
<script type='text/javascript' src='js/jquery.magnific-popup.min.js'></script>

<script type="text/javascript">
	jQuery(document).ready(function($){
		$('#lnkmy').addClass('active');
	});
</script>


<script type='text/javascript' src='js/jquery.touchSwipe.min.js'></script>
<script type='text/javascript' src='js/jquery.carouFredSel.min.js'></script>

<script type='text/javascript' src='js/skin-selector.js'></script>
<script type="text/javascript">
/* <![CDATA[ */
(function(){try{var s,a,i,j,r,c,l=document.getElementsByTagName("a"),t=document.createElement("textarea");for(i=0;l.length-i;i++){try{a=l[i].getAttribute("href");if(a&&a.indexOf("/cdn-cgi/l/email-protection") > -1  && (a.length > 28)){s='';j=27+ 1 + a.indexOf("/cdn-cgi/l/email-protection");if (a.length > j) {r=parseInt(a.substr(j,2),16);for(j+=2;a.length>j&&a.substr(j,1)!='X';j+=2){c=parseInt(a.substr(j,2),16)^r;s+=String.fromCharCode(c);}j+=1;s+=a.substr(j,a.length-j);}t.innerHTML=s.replace(/</g,"&lt;").replace(/>/g,"&gt;");l[i].setAttribute("href","mailto:"+t.value);}}catch(e){}}}catch(e){}})();
/* ]]> */
</script>
</body>

<!-- Mirrored from sitesao.com/html/airslice/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Dec 2015 11:23:23 GMT -->
</html>