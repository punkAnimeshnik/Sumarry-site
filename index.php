<?php
include "SQL.php";
$menu = mysqli_query($mysqli, "SELECT * FROM `menu_food`");
$stuff = mysqli_query($mysqli, "SELECT * FROM `our_stuff`");
$event = mysqli_query($mysqli, "SELECT * FROM `upcoming_event`");
$upcoming = mysqli_fetch_assoc($event);
$blogs = mysqli_query($mysqli, "SELECT * FROM `blog` ORDER BY data DESC LIMIT 3");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>restaurantBD</title>
		<!-- Bootstrap v3.3.4 Grid Styles -->
<style>html{font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav,section,summary{display:block}audio,canvas,progress,video{display:inline-block;vertical-align:baseline}audio:not([controls]){display:none;height:0}[hidden],template{display:none}a{background-color:transparent}a:active,a:hover{outline:0}abbr[title]{border-bottom:1px dotted}b,strong{font-weight:bold}dfn{font-style:italic}h1{font-size:2em;margin:0.67em 0}mark{background:#ff0;color:#000}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sup{top:-0.5em}sub{bottom:-0.25em}img{border:0}svg:not(:root){overflow:hidden}figure{margin:1em 40px}hr{-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box;height:0}pre{overflow:auto}code,kbd,pre,samp{font-family:monospace, monospace;font-size:1em}button,input,optgroup,select,textarea{color:inherit;font:inherit;margin:0}button{overflow:visible}button,select{text-transform:none}button,html input[type="button"],input[type="reset"],input[type="submit"]{-webkit-appearance:button;cursor:pointer}button[disabled],html input[disabled]{cursor:default}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}input{line-height:normal}input[type="checkbox"],input[type="radio"]{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;padding:0}input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{height:auto}input[type="search"]{-webkit-appearance:textfield;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box}input[type="search"]::-webkit-search-cancel-button,input[type="search"]::-webkit-search-decoration{-webkit-appearance:none}fieldset{border:1px solid #c0c0c0;margin:0 2px;padding:0.35em 0.625em 0.75em}legend{border:0;padding:0}textarea{overflow:auto}optgroup{font-weight:bold}table{border-collapse:collapse;border-spacing:0}td,th{padding:0}*{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}*:before,*:after{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}html{font-size:10px;-webkit-tap-highlight-color:rgba(0,0,0,0)}body{font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;font-size:14px;line-height:1.42857143;color:#333;background-color:#fff}input,button,select,textarea{font-family:inherit;font-size:inherit;line-height:inherit}a{color:#337ab7;text-decoration:none}a:hover,a:focus{color:#23527c;text-decoration:underline}a:focus{outline:thin dotted;outline:5px auto -webkit-focus-ring-color;outline-offset:-2px}figure{margin:0}img{vertical-align:middle}.img-responsive{display:block;max-width:100%;height:auto}.img-rounded{border-radius:6px}.img-thumbnail{padding:4px;line-height:1.42857143;background-color:#fff;border:1px solid #ddd;border-radius:4px;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;transition:all .2s ease-in-out;display:inline-block;max-width:100%;height:auto}.img-circle{border-radius:50%}hr{margin-top:20px;margin-bottom:20px;border:0;border-top:1px solid #eee}.sr-only{position:absolute;width:1px;height:1px;margin:-1px;padding:0;overflow:hidden;clip:rect(0, 0, 0, 0);border:0}.sr-only-focusable:active,.sr-only-focusable:focus{position:static;width:auto;height:auto;margin:0;overflow:visible;clip:auto}[role="button"]{cursor:pointer}.container{margin-right:auto;margin-left:auto;padding-left:15px;padding-right:15px}@media (min-width:768px){.container{width:750px}}@media (min-width:992px){.container{width:970px}}@media (min-width:1200px){.container{width:1170px}}.container-fluid{margin-right:auto;margin-left:auto;padding-left:15px;padding-right:15px}.row{margin-left:-15px;margin-right:-15px}.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12{position:relative;min-height:1px;padding-left:15px;padding-right:15px}.col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12{float:left}.col-xs-12{width:100%}.col-xs-11{width:91.66666667%}.col-xs-10{width:83.33333333%}.col-xs-9{width:75%}.col-xs-8{width:66.66666667%}.col-xs-7{width:58.33333333%}.col-xs-6{width:50%}.col-xs-5{width:41.66666667%}.col-xs-4{width:33.33333333%}.col-xs-3{width:25%}.col-xs-2{width:16.66666667%}.col-xs-1{width:8.33333333%}.col-xs-pull-12{right:100%}.col-xs-pull-11{right:91.66666667%}.col-xs-pull-10{right:83.33333333%}.col-xs-pull-9{right:75%}.col-xs-pull-8{right:66.66666667%}.col-xs-pull-7{right:58.33333333%}.col-xs-pull-6{right:50%}.col-xs-pull-5{right:41.66666667%}.col-xs-pull-4{right:33.33333333%}.col-xs-pull-3{right:25%}.col-xs-pull-2{right:16.66666667%}.col-xs-pull-1{right:8.33333333%}.col-xs-pull-0{right:auto}.col-xs-push-12{left:100%}.col-xs-push-11{left:91.66666667%}.col-xs-push-10{left:83.33333333%}.col-xs-push-9{left:75%}.col-xs-push-8{left:66.66666667%}.col-xs-push-7{left:58.33333333%}.col-xs-push-6{left:50%}.col-xs-push-5{left:41.66666667%}.col-xs-push-4{left:33.33333333%}.col-xs-push-3{left:25%}.col-xs-push-2{left:16.66666667%}.col-xs-push-1{left:8.33333333%}.col-xs-push-0{left:auto}.col-xs-offset-12{margin-left:100%}.col-xs-offset-11{margin-left:91.66666667%}.col-xs-offset-10{margin-left:83.33333333%}.col-xs-offset-9{margin-left:75%}.col-xs-offset-8{margin-left:66.66666667%}.col-xs-offset-7{margin-left:58.33333333%}.col-xs-offset-6{margin-left:50%}.col-xs-offset-5{margin-left:41.66666667%}.col-xs-offset-4{margin-left:33.33333333%}.col-xs-offset-3{margin-left:25%}.col-xs-offset-2{margin-left:16.66666667%}.col-xs-offset-1{margin-left:8.33333333%}.col-xs-offset-0{margin-left:0}@media (min-width:768px){.col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12{float:left}.col-sm-12{width:100%}.col-sm-11{width:91.66666667%}.col-sm-10{width:83.33333333%}.col-sm-9{width:75%}.col-sm-8{width:66.66666667%}.col-sm-7{width:58.33333333%}.col-sm-6{width:50%}.col-sm-5{width:41.66666667%}.col-sm-4{width:33.33333333%}.col-sm-3{width:25%}.col-sm-2{width:16.66666667%}.col-sm-1{width:8.33333333%}.col-sm-pull-12{right:100%}.col-sm-pull-11{right:91.66666667%}.col-sm-pull-10{right:83.33333333%}.col-sm-pull-9{right:75%}.col-sm-pull-8{right:66.66666667%}.col-sm-pull-7{right:58.33333333%}.col-sm-pull-6{right:50%}.col-sm-pull-5{right:41.66666667%}.col-sm-pull-4{right:33.33333333%}.col-sm-pull-3{right:25%}.col-sm-pull-2{right:16.66666667%}.col-sm-pull-1{right:8.33333333%}.col-sm-pull-0{right:auto}.col-sm-push-12{left:100%}.col-sm-push-11{left:91.66666667%}.col-sm-push-10{left:83.33333333%}.col-sm-push-9{left:75%}.col-sm-push-8{left:66.66666667%}.col-sm-push-7{left:58.33333333%}.col-sm-push-6{left:50%}.col-sm-push-5{left:41.66666667%}.col-sm-push-4{left:33.33333333%}.col-sm-push-3{left:25%}.col-sm-push-2{left:16.66666667%}.col-sm-push-1{left:8.33333333%}.col-sm-push-0{left:auto}.col-sm-offset-12{margin-left:100%}.col-sm-offset-11{margin-left:91.66666667%}.col-sm-offset-10{margin-left:83.33333333%}.col-sm-offset-9{margin-left:75%}.col-sm-offset-8{margin-left:66.66666667%}.col-sm-offset-7{margin-left:58.33333333%}.col-sm-offset-6{margin-left:50%}.col-sm-offset-5{margin-left:41.66666667%}.col-sm-offset-4{margin-left:33.33333333%}.col-sm-offset-3{margin-left:25%}.col-sm-offset-2{margin-left:16.66666667%}.col-sm-offset-1{margin-left:8.33333333%}.col-sm-offset-0{margin-left:0}}@media (min-width:992px){.col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12{float:left}.col-md-12{width:100%}.col-md-11{width:91.66666667%}.col-md-10{width:83.33333333%}.col-md-9{width:75%}.col-md-8{width:66.66666667%}.col-md-7{width:58.33333333%}.col-md-6{width:50%}.col-md-5{width:41.66666667%}.col-md-4{width:33.33333333%}.col-md-3{width:25%}.col-md-2{width:16.66666667%}.col-md-1{width:8.33333333%}.col-md-pull-12{right:100%}.col-md-pull-11{right:91.66666667%}.col-md-pull-10{right:83.33333333%}.col-md-pull-9{right:75%}.col-md-pull-8{right:66.66666667%}.col-md-pull-7{right:58.33333333%}.col-md-pull-6{right:50%}.col-md-pull-5{right:41.66666667%}.col-md-pull-4{right:33.33333333%}.col-md-pull-3{right:25%}.col-md-pull-2{right:16.66666667%}.col-md-pull-1{right:8.33333333%}.col-md-pull-0{right:auto}.col-md-push-12{left:100%}.col-md-push-11{left:91.66666667%}.col-md-push-10{left:83.33333333%}.col-md-push-9{left:75%}.col-md-push-8{left:66.66666667%}.col-md-push-7{left:58.33333333%}.col-md-push-6{left:50%}.col-md-push-5{left:41.66666667%}.col-md-push-4{left:33.33333333%}.col-md-push-3{left:25%}.col-md-push-2{left:16.66666667%}.col-md-push-1{left:8.33333333%}.col-md-push-0{left:auto}.col-md-offset-12{margin-left:100%}.col-md-offset-11{margin-left:91.66666667%}.col-md-offset-10{margin-left:83.33333333%}.col-md-offset-9{margin-left:75%}.col-md-offset-8{margin-left:66.66666667%}.col-md-offset-7{margin-left:58.33333333%}.col-md-offset-6{margin-left:50%}.col-md-offset-5{margin-left:41.66666667%}.col-md-offset-4{margin-left:33.33333333%}.col-md-offset-3{margin-left:25%}.col-md-offset-2{margin-left:16.66666667%}.col-md-offset-1{margin-left:8.33333333%}.col-md-offset-0{margin-left:0}}@media (min-width:1200px){.col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12{float:left}.col-lg-12{width:100%}.col-lg-11{width:91.66666667%}.col-lg-10{width:83.33333333%}.col-lg-9{width:75%}.col-lg-8{width:66.66666667%}.col-lg-7{width:58.33333333%}.col-lg-6{width:50%}.col-lg-5{width:41.66666667%}.col-lg-4{width:33.33333333%}.col-lg-3{width:25%}.col-lg-2{width:16.66666667%}.col-lg-1{width:8.33333333%}.col-lg-pull-12{right:100%}.col-lg-pull-11{right:91.66666667%}.col-lg-pull-10{right:83.33333333%}.col-lg-pull-9{right:75%}.col-lg-pull-8{right:66.66666667%}.col-lg-pull-7{right:58.33333333%}.col-lg-pull-6{right:50%}.col-lg-pull-5{right:41.66666667%}.col-lg-pull-4{right:33.33333333%}.col-lg-pull-3{right:25%}.col-lg-pull-2{right:16.66666667%}.col-lg-pull-1{right:8.33333333%}.col-lg-pull-0{right:auto}.col-lg-push-12{left:100%}.col-lg-push-11{left:91.66666667%}.col-lg-push-10{left:83.33333333%}.col-lg-push-9{left:75%}.col-lg-push-8{left:66.66666667%}.col-lg-push-7{left:58.33333333%}.col-lg-push-6{left:50%}.col-lg-push-5{left:41.66666667%}.col-lg-push-4{left:33.33333333%}.col-lg-push-3{left:25%}.col-lg-push-2{left:16.66666667%}.col-lg-push-1{left:8.33333333%}.col-lg-push-0{left:auto}.col-lg-offset-12{margin-left:100%}.col-lg-offset-11{margin-left:91.66666667%}.col-lg-offset-10{margin-left:83.33333333%}.col-lg-offset-9{margin-left:75%}.col-lg-offset-8{margin-left:66.66666667%}.col-lg-offset-7{margin-left:58.33333333%}.col-lg-offset-6{margin-left:50%}.col-lg-offset-5{margin-left:41.66666667%}.col-lg-offset-4{margin-left:33.33333333%}.col-lg-offset-3{margin-left:25%}.col-lg-offset-2{margin-left:16.66666667%}.col-lg-offset-1{margin-left:8.33333333%}.col-lg-offset-0{margin-left:0}}.clearfix:before,.clearfix:after,.container:before,.container:after,.container-fluid:before,.container-fluid:after,.row:before,.row:after{content:" ";display:table}.clearfix:after,.container:after,.container-fluid:after,.row:after{clear:both}.center-block{display:block;margin-left:auto;margin-right:auto}.pull-right{float:right !important}.pull-left{float:left !important}.hide{display:none !important}.show{display:block !important}.invisible{visibility:hidden}.text-hide{font:0/0 a;color:transparent;text-shadow:none;background-color:transparent;border:0}.hidden{display:none !important}.affix{position:fixed}@-ms-viewport{width:device-width}.visible-xs,.visible-sm,.visible-md,.visible-lg{display:none !important}.visible-xs-block,.visible-xs-inline,.visible-xs-inline-block,.visible-sm-block,.visible-sm-inline,.visible-sm-inline-block,.visible-md-block,.visible-md-inline,.visible-md-inline-block,.visible-lg-block,.visible-lg-inline,.visible-lg-inline-block{display:none !important}@media (max-width:767px){.visible-xs{display:block !important}table.visible-xs{display:table}tr.visible-xs{display:table-row !important}th.visible-xs,td.visible-xs{display:table-cell !important}}@media (max-width:767px){.visible-xs-block{display:block !important}}@media (max-width:767px){.visible-xs-inline{display:inline !important}}@media (max-width:767px){.visible-xs-inline-block{display:inline-block !important}}@media (min-width:768px) and (max-width:991px){.visible-sm{display:block !important}table.visible-sm{display:table}tr.visible-sm{display:table-row !important}th.visible-sm,td.visible-sm{display:table-cell !important}}@media (min-width:768px) and (max-width:991px){.visible-sm-block{display:block !important}}@media (min-width:768px) and (max-width:991px){.visible-sm-inline{display:inline !important}}@media (min-width:768px) and (max-width:991px){.visible-sm-inline-block{display:inline-block !important}}@media (min-width:992px) and (max-width:1199px){.visible-md{display:block !important}table.visible-md{display:table}tr.visible-md{display:table-row !important}th.visible-md,td.visible-md{display:table-cell !important}}@media (min-width:992px) and (max-width:1199px){.visible-md-block{display:block !important}}@media (min-width:992px) and (max-width:1199px){.visible-md-inline{display:inline !important}}@media (min-width:992px) and (max-width:1199px){.visible-md-inline-block{display:inline-block !important}}@media (min-width:1200px){.visible-lg{display:block !important}table.visible-lg{display:table}tr.visible-lg{display:table-row !important}th.visible-lg,td.visible-lg{display:table-cell !important}}@media (min-width:1200px){.visible-lg-block{display:block !important}}@media (min-width:1200px){.visible-lg-inline{display:inline !important}}@media (min-width:1200px){.visible-lg-inline-block{display:inline-block !important}}@media (max-width:767px){.hidden-xs{display:none !important}}@media (min-width:768px) and (max-width:991px){.hidden-sm{display:none !important}}@media (min-width:992px) and (max-width:1199px){.hidden-md{display:none !important}}@media (min-width:1200px){.hidden-lg{display:none !important}}.visible-print{display:none !important}@media print{.visible-print{display:block !important}table.visible-print{display:table}tr.visible-print{display:table-row !important}th.visible-print,td.visible-print{display:table-cell !important}}.visible-print-block{display:none !important}@media print{.visible-print-block{display:block !important}}.visible-print-inline{display:none !important}@media print{.visible-print-inline{display:inline !important}}.visible-print-inline-block{display:none !important}@media print{.visible-print-inline-block{display:inline-block !important}}@media print{.hidden-print{display:none !important}}</style>
<link href="https://fonts.googleapis.com/css?family=Lobster+Two&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Sacramento&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="fonts/aweson/css/font-awesome.css">
<!-- версия для разработки, отображает полезные предупреждения в консоли -->
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
<script src="htps://cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js" ></script>
</head>
<body>
	<header>
		<div class="upper" id="baner">
			<div class="container">
				<div class="row">
					<div class="col-md-2">
						<img src="image/logo.png" alt="">
					</div>
					<div class="col-md-3">
						<p>Wellcome To <a href="#" class="red">	restaurantBD.com</a></p>
					</div>
					<div class="col-md-2">
						<form action="#">
							<input type="text" placeholder="Quick Search">
							<button>
								<i class="fa fa-search" aria-hidden="true"></i>
							</button>
						</form>
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-1">
						<p><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a></p>
					</div>
					<div class="col-md-3">
						<p>For Delivary : <a href="tel:687 457 6587-90 ">687 457 6587-90</a></p>
					</div>
				</div>
			</div>
		</div>
		<div class="navMenu" id="header">
			<nav>
				<div class="topMenu" id="myMenu">
					<a href="#home">HOME</a>
					<a href="#about">ABOUT</a>
					<a href="#page">PAGE</a>
					<a href="#menu">MENU</a>
					<a href="#gallery">GAllery</a>
					<a href="#blog">Blog</a>
					<a href="#shop">Shops</a>
					<a href="#contact">Contact</a>
					<a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
					<button>RESERVATION</button>
					</div>
			</nav>			
		</div>
		<div class="banner">
			<div class="container">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<h2>RestaurantBD is the name of pure food</h2>
						<h1>We Provide 100% Pure & Healthy Food</h1>
						<p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s.</p>
						<div class="button" id="app-0">
							<button class="aboutUs" @click="about">ABOUT US</button>
							<button class="seeMenu" @click="menu">SEE MENU</button>
						</div>
					</div>
					<div class="col-md-2"></div>
				</div>
			</div>
		</div>
	</header>
	<main>
		<div class="bookTable" id="home">
			<div class="container">
				<div class="row">
					<div class="col-md-7">
						<h1>Wellcome</h1>
						<h2>To Our Resturant</h2>
						<img src="image/Shape_2.jpg" alt="">
						<p>There are many variations of passages of Loretend to repeat predefined chunks as youm
						 IInjected humour, or randomised words which don't look even slightly believable. If psum 
						 available, but the majority have suffered alteration in some form. <br><br>
						Injected humour, or randomised words which don't look evethe Internet tend to repeat 
					predefined chunks as necessary, making this the first n slightly believable. If you are going
					 to use a passage of Lorem Ipsum, you need to be sure there isn't tend to repeat predefined chunks
					  as youon the Internet tend to repeat predefined chunks as necessary, making this the first true 
					generator on the Internet.</p>
						<div class="sign">
							<h3>Matthew T. Sloan</h3>
						<h4>Founder & Owner</h4>
						</div>						
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-4">
						<div class="formBook">
							<div class="titleBook">
								<img src="image/Shape_1.png" alt="">
							<h1>Book Table</h1>
							<img src="image/Shape_1.png" alt="">
							</div>
							<div class="form">
								<form method="POST" action="book_table.php">
									<input type="text" name="name" placeholder="Your Name" required>
									<input type="phone" name="phone" placeholder="Your Phone" required>
									<input type="number" name="people" min="1" max="9" placeholder=" Total People" required>
									<input type="date" name="date" placeholder="Date" required>
									<input type="time" name="time" placeholder="Time" required>
									<select name="table" id="table">
										<option value="Yes">We need table</option>
										<option value="No">We not need table</option>
									</select>
									<button>Book Now </button>	
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="Menu" id="shop">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="titleItems">
							<h2>Our Restarent Provide </h2>
							<h1>Feature Item </h1>
							<img src="image/Shape_3.png" alt="">
						</div>
						<div id="app">
						<div class="Items">								
							<i class="fa fa-arrow-circle-left" aria-hidden="true" @click="right"></i>														
							<div class="slider">
								<div class="polosa" v-bind:style="{left: position + 'px'}">																
								<?php  while ($food = mysqli_fetch_assoc($menu)) {?>
								<div class="item">									
									<img  src="<?php echo $food['foto']; ?>">  
								<div class="dish"><p><?php echo $food['name']; ?></p></div>	
								<div class="price"><p> <?php echo $food['price']; ?>.00$</p> <div class="sale"> <p><?php echo $food['sale']; ?>.00$</p></div> </div>	
								</div>	<?php	}?>
								</div>								
								</div>
								<i class="fa fa-arrow-circle-right" aria-hidden="true" @click="left"></i>					
							</div>							
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="aboutUs" id="about">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h2>We Provide Best Services</h2>
						<h1>About Us</h1>
						<img src="image/Shape_2(blue).png" alt="">
						<p>Injected humour, or randomised words which don't look evethe Internet tend to repeat predefined chunks as necessary, making this the first n slightly believable. If Lorem Ipsum, you need to be sure there isn't on the Internet tend to repeat predefined chunks as you are going to use a passage of Lorem Ipsum, you need to be sure there isn't on the Internet tend to repeat predefined chunks as necessary, making 
						this the first true generator on the Internet tend to repeat predefined chunks as you</p>
						<div id="app-2">
							<ol >								
							<li v-for="item in aboutUs" v-on:click="Click(item.i )"  v-bind:class="color[item.i]">{{item.name}}<i v-bind:class="i"></i>
							 <transition name = 'fade'>
							<ul v-if="ul[item.i]"><li>{{item.discript}}</li></ul></transition>
							</li>							
						</ol>
						</div>						
					</div>
					<div class="col-md-4">
						<img src="image/foto_1.jpg" alt="">
					</div>
				</div>
			</div>
		</div>
		<div class="openShedule" id="page">
			<h2>3 Easy Steps To Get Home-Delivary</h2>
			<h1>For Home Delivary</h1>
			<img src="image/Shape_3.png" alt="">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="icon">
							<img src="image/iconShedule_3.png" alt="">
						</div>
						<div class="shed">
							<h1>Select a Dish</h1>
							<p>Internet tend to repeat predefined chunks as necessary,
							 making this the first true on the Internet.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="icon">
							<img src="image/iconShedule_2.png" alt="">
						</div>
						<div class="shed">
							<h1>Online Payment</h1>
							<p>Internet tend to repeat predefined chunks as necessary,
							 making this the first true on the Internet.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="icon">
							<img src="image/iconShedule_1.png" alt="">
						</div>
						<div class="shed">
							<h1>Recevied Delivary</h1>
							<p>Internet tend to repeat predefined chunks as necessary, 
							making this the first true on the Internet.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="mainDish" id="menu">
			<h2>We Always Servie Teasty & Healthy Food </h2>
			<h1>Main Dish</h1>
			<img src="image/Shape_3.png" alt="">
			<div id="app-3">
			<nav>
				<div class="mainMenu">
					<a  v-for="item in menu" v-on:click="Click(item.i)" v-bind:class="item.activing">{{item.name}}</a>
					</div>
			</nav>
			<div class="menuDish">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
								<div class="dishi" v-for="dishi in filtredType.slice(0, numb)">
									<div class="Dish">
								<div class="foto" > <img :src=dishi.foto > </div>
								<div class="pimeDish">
									<div class="prime">
										<h2>{{dishi.name}}</h2>
										<h1>{{dishi.price}}</h1>
									</div>
										<div class="discript">
											<p>{{dishi.discr}} </p>
										</div>									
								</div>
							</div>
							</div>
							</div>
							<div class="button">
								<button v-on:click="fullMenu">{{message}}</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="ourStuff" id="gallery">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
							<h2>We Have Awsome Team</h2>
			<h1>Our Stuff</h1>
			<img src="image/Shape_3.png" alt="">
			<div id="app-5" >
				<div class="stuf">				 
					 <i class="fa fa-arrow-circle-left" aria-hidden="true" id="slid_right"></i>				
					 <div class="sliderStuf">
					 <div class="polosaStuff">
					 	<?php while ($stuf = mysqli_fetch_assoc($stuff)) {?>	
						<div class="itemStuff">
							<div class="foto">
								<img src="<?php echo $stuf['foto']; ?>" alt="" >
								<div class="hover" v-if="hover">
									<div class="link_zoom" @click="Click('<?php echo $stuf['foto']; ?>')"><i class="fa fa-search-plus" aria-hidden="true"></i></div>
									<div class="link_zoom"><i class="fa fa-link" aria-hidden="true"></i></div>
								</div>
								</div>
								<div class="data">
									<h1><?php echo $stuf['name']; ?></h1>
								<h2><?php echo $stuf['position']; ?></h2>
								<div class="link">
									<h2>Follow:</h2>
									<a href="https://www.facebook.com"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
									<a href="https://twitter.com"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
									<a href="https://www.linkedin.com"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
									<a href="https://plus.google.com"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
									<a href="https://www.pinterest.com"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a>
								</div>
								</div>
								</div>
							<?php	} ?>												
					 </div>
					 </div>
					 <i class="fa fa-arrow-circle-right" aria-hidden="true" id="slid_left"></i>
			  </div>
			  <transition name = 'fade'>
			  <div class="popup"  v-show="display" @wheel.prevent="wheel" @click="wheel">
			  	<div class="popupBg" @click="wheel" >
			  		<img v-bind:src="foto" class="popupImg" >
			  	</div>
			  </div>
			   </transition>
			</div>			
					</div>
				</div>
			</div>		
		</div>
		<div class="upcomingEvent">
			<div id="app-6-1">
				<div class="video">
				<div class="line_1">
					<div class="line_2">
						<div class="line_3">
							<div class="line_4">
								<button @click="display='true'"><i class="fa fa-play" aria-hidden="true"></i></button>
							</div>
						</div>
					</div>					
				</div>				
			</div>
			 <transition name = 'fade'>
			  <div class="popup_video"  v-show="display" @wheel.prevent="wheel" @click="display = false">
			  	<div class="popupBg" @click="display = false" >
			  			<video src="<?php echo $upcoming['video']; ?>" width="960" height="540" autoplay="autoplay"></video>
			  	</div>
			  </div>
			   </transition>
			</div>			
			<div id="app-6">
			<div class="event">
				<div class="ribbon">
					<p>Kids Entry Free</p>
				</div>
				<h1>Upcoming Event</h1>
				<img src="image/Shape_3.png" alt="">
				<h2><?php echo $upcoming['name']; ?></h2>
				<p><?php echo $upcoming['discript']; ?></p>
				<div class="reserve">
					<div class="sponcers">
						<div class="descr">
							<h3>Sponsered by</h3>
						</div>
						<div class="sponserd">
							<img src="image/Sponserd_1.png" alt="">
							<img src="image/Sponserd_2.png" alt="">
							<img src="image/Sponserd_3.png" alt="">
							<img src="image/Sponserd_4.png" alt="">
						</div>
					</div>
					<div class="location">
						<div class="descr">
							<h3>Time & Date</h3>
						</div>
						<div class="info">
							<h3><?php echo date_format(new DateTime($upcoming['data']), 'd F Y'); ?></h3>
							<h3>Start From : <?php echo date_format(new DateTime($upcoming['time']), 'g A ');  ?> To <?php echo $upcoming['end']; ?></h3>
						</div>
					</div>				
						<button @click="display = true">Buy Ticket</button>						
					</div>					 			
				</div>
				<transition name = 'fade'>
			  <div class="popup"  v-show="display" @wheel.prevent="wheel" >
			  	<div class="popupBg" >
			  		<i class="fa fa-times" aria-hidden="true" @click="display = false" ></i>
			  		<form method="POST" action="ticket.php" class="popupForm">
			  			<h1>Buy Ticket</h1>
			  			    <input type="text" name="name" placeholder="Your Name" required>
									<input type="number" name="people" min="1" max="4" placeholder=" Total People" required>
									<input type="date" name="date" placeholder="Date" readonly value="<?php echo $upcoming['data']; ?>">
									<input type="time" name="time" placeholder="Time" readonly value="<?php echo $upcoming['time']; ?>">
									<select name="table" id="table">
										<option value="Yes">We need table</option>
										<option value="No">We not need table</option>
									</select>
									<button>Buy Ticket</button>	
			  		</form>
			  	</div>
			  </div>
			  		</transition>
			</div>			
		</div>
		<div class="feedback">
			<h2>What Say Customer About Us</h2>
			<h1>Customer Feedback</h1>
			<img src="image/Shape_3.png" alt="">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
							<div class="itemsFeed">
				<i class="fa fa-arrow-circle-left" aria-hidden="true" id="slid_right"></i>
			<div class="sliderFeed">
				<div class="polosaFeed">
					<div class="itemFeed">
						<div class="foto">
							<img src="image/foto_4.jpg" alt="">
						</div>
						<div class="text">
							<i class="fa fa-quote-left" aria-hidden="true"></i>
							<p>Injected humour, or randomised words which don't look evethe Internet tend to repeat predefined sure there isn't on the Internet tend to repeat predefined chunks chunks as necessary, making this the first true generator o.</p>
							<div class="rating">
								<h2>Personal Rating : </h2>
								<h2 class="ass">9.4/10</h2>
							</div>
							<div class="sign">
							<h3>Matthew T. Sloan</h3>
						<h4>Founder & Owner</h4>
						</div>	
						</div>
					</div>
				</div>
			</div>
			<i class="fa fa-arrow-circle-right" aria-hidden="true" id="slid_left"></i>
			</div>		
					</div>
				</div>
			</div>			
		</div>
		<div class="subscribe">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="text">
							<h1>Subscribe News Letter</h1>
							<img src="image/Shape_2(white).png" alt="">
							<p>Injected humour, or randomised words which don't look evethe Internet tend to repeat predefined sure there isn't on the Internet tend to repeat predefined chunks chunks as necessary, making this the first true generator o.</p>
						</div>
						<div class="col-md-1"></div>
					</div>
					<div class="col-md-5">
						<form method="POST" action="subscribe.php" >
							<input type="email" name="email" placeholder="Email Address Here" required>
							<button>
								<i class="fa fa-paper-plane" aria-hidden="true"></i>
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="latestBlog" id="blog">
			<h1>Latest Blog</h1>
			<img src="image/Shape_3.png" alt="">
			<div id="app-7">			
			<div class="container">
				<div class="row">	
					<?php while ($blog = mysqli_fetch_assoc($blogs)) {?> 					
				<div class="col-md-4">
				<div class="blog" @click="comment('<?php echo $blog['ID']?>')">
						<div class="foto">
						<div class="date">
							<h1><?php echo date_format(new DateTime($blog['data']), 'dS'); ?></h1>
							<h2><?php echo date_format(new DateTime($blog['data']), 'F'); ?></h2>
						</div>
				<div class="hover" >
					<i class="fa fa-plus" aria-hidden="true"></i>
				</div>
				<img src="<?php echo $blog['foto']?>" alt="">
				</div>			
				<div class="text">
					<h1><?php echo $blog['name']?></h1>
					<p>	<?php echo $blog['discript']?></p>
					<div class="ribbon">
						<div class="name">
							<p><i  class="fa fa-user" aria-hidden="true"></i><?php echo $blog['avtor']?></p>							
						</div>
						<div class="counter">
							<p><i class="fa fa-eye" aria-hidden="true"></i><?php echo $blog['looks']?></p>							
							<p><i class="fa fa-comments" aria-hidden="true"></i><?php echo $blog['comments']?></p>							
						</div>
					</div>
				</div>
				</div>			
			</div>
			<?php }	?> 	
				</div>
			</div>
			<transition name = 'fade'>
			  <div class="popup"  v-show="display" @wheel.prevent="wheel" >
			  	<div class="popupBg" >
			  		<i class="fa fa-times" aria-hidden="true" @click="display = false" ></i>
			  		<form action="comment.php" class="popupForm" method="POST">
			  			<h1>Leave a Сomment</h1>
			  					<input type="hidden" name="ID" :value="Id" >
			  			    <input type="text" name="name" placeholder="Your Name" required>
									<input type="email" name="email" placeholder=" Your E-mail" required>
								<textarea name="ms" id="massage" cols="30" rows="7" placeholder="Your Comment" required></textarea>
									<button>Leave a comment</button>	
			  		</form>
			  	</div>
			  </div>
			  		</transition>
			</div>
		</div>
		<div class="contact" id="contact">
			<h1>Contact</h1>
			<img src="image/Shape_3.png" alt="">
			<div class="maps">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8687.025456189358!2d90.4067050838039!3d23.73153126015321!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8f6dd6de453%3A0xf90bc8b83d23e862!2sAsia%20Hotel%20%26%20Resorts!5e0!3m2!1sru!2sua!4v1582464937082!5m2!1sru!2sua" width="100%" height="750" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="text">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="openHours">
								<h1>Open Hours</h1>
								<img src="image/Shape_2(blue).png"  alt="">
								<div class="day">
									<h2> Sunday:</h2>
									<p>8:00AM - 10:00PM</p>
								</div>
								<div class="day">
									<h2>Monday:</h2>
									<p>9:00AM - 8:50PM</p>
								</div>
								<div class="day">
									<h2>Tuesday:</h2>
									<p>9:00AM - 10:00PM</p>
								</div>
								<div class="day">
									<h2>Wednesday:</h2>
									<p>9:00AM - 10:00PM</p>
								</div>
								<div class="day">
									<h2>Thursday:</h2>
									<p>9:00AM - 10:00PM</p>
								</div>
								<div class="day">
									<h2>Friday:</h2>
									<p>7:00AM - 9:00PM</p>
								</div>
								<div class="day">
									<h2>Saturday:</h2>
									<p>8:00AM - 9:00PM</p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="senlMessage">
								<h1>Sent Message</h1>
								<form action="message.php" method="POST">
									<input type="text" name="name" placeholder="Your Name">
									<input type="email" name="email" placeholder="Email Adress">
									<textarea  name="message" id="massage" cols="30" rows="10" placeholder="Message"></textarea>
									<button>Send</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<footer>
		<div class="footer">
			<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="instagram">
						<h1>Instagram</h1>
						<div class="foto">
							<img src="image/Insta_1.jpg" alt="">
							<img src="image/Insta_2.jpg" alt="">
							<img src="image/Insta_3.jpg" alt="">
							<img src="image/Insta_4.jpg" alt="">
							<img src="image/Insta_5.jpg" alt="">
							<img src="image/Insta_6.jpg" alt="">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="intro">
						<img src="image/logo.png" alt="">
						<h1>Introduction</h1>
						<p> This site was created by Kolomiyets Ilya Vadimovich to attach it to the resume, the layout of this page was taken from the site: psd.in.ua. This page was not created for commercial use.</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="tags">
						<h1>Tag</h1>
						<div class="tag"><a href="">Food</a></div>
						<div class="tag"><a href="">Restaurant</a></div>
						<div class="tag"><a href="">Food Menu</a></div>
						<div class="tag"><a href="">RestaurantBD</a></div>
						<div class="tag"><a href="">PSD</a></div>
						<div class="tag"><a href="">ul/Ux</a></div>						
						<div class="tag"><a href="">Template</a></div>
						<form action="">
							<input type="search" placeholder="Search Here">
							<button>
							<i class="fa fa-search" aria-hidden="true"></i>
							</button>
						</form>
					</div>
				</div>				
			</div>
			<div class="downner">
					<div class="link">
						<a href="https://www.facebook.com"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
									<a href="https://twitter.com"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
									<a href="https://www.linkedin.com"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
									<a href="https://plus.google.com"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
									<a href="https://www.pinterest.com"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a>
				  </div>
				<div class="menu">
					<nav>
						<div id="app-4">
							<div class="footMenu">
							<p v-on:click="click" :style="{color: Color}">Userful Link</p>
							<div id="men" v-if="display" >
							<a href="#baner" class="" name="link">Home</a>
							<a href="#about" class="" name="link">About</a>
							<a href="#page" class="" name="link">Page</a>
							<a href="#menu" class="" name="link">Menu</a>
							<a href="#gallery" class="" name="link">Gallery</a>
							<a href="#blog" class="" name="link">Blog</a>
							<a href="#shop" class="" name="link">Shops</a>
							<a href="#contact" class="" name="link">Contact</a>
							</div>							
						 </div>
						</div>						
					</nav>
				</div>
			</div>		
		</div>
		</div>		
	</footer>
<script src="main.js"></script>
</body>
</html>