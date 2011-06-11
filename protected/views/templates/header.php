<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<style>
body {
  text-align: center;
  margin: 0;
  padding: 0;
  background: black url(../protected/images/site-bg.jpg) no-repeat fixed top center;
}

body, td, th, textarea, input, select, h1, h2, h3, h4, h5, h {
        font-size: 80%;
	font-family: Arial, Helvetica, sans-serif;
}

 p, form, h1, h2, h3, h4, h5, h6,  ul, ol {
	margin: 0px;
	padding: 0px;
}

a img {
	border: none;
}

a {
  color: #0099CC;
  text-decoration: none;
}

a:hover {
  color: #FFCC00;
}

.clear-fix {
  clear: both;
}

/******************************************************************
 +Basic Skeleton
******************************************************************/

#wrapper {
  width: 860px;
  margin-left: auto;
  margin-right: auto;
  text-align: left;
}

#header {
  width: 520px;
  float: right;
  height: 200px;
  position: relative;
}

#main {
  display: inline;
  color: white;
  width: 560px;
  float: right;
  margin-top: 10px;
}

#sidebar {
  top: 0;
  width: 223px;
  background: transparent;
  float: left;

}

#footer {
 width: 760px;
 height: 20px;
 padding-top: 10px;
 clear: both;
 text-align: center;
 color: white;
}

/******************************************************************
 +Header
******************************************************************/
#logo {
  margin-left: 36px;
  margin-top: 0px;
  width: 240px;
  height: 40px;
  float: left;
}

#consoles {
  margin-left: 20px;
  margin-top: 3px;
  width: 224px;
  height: 45px;
  float: left;
}
#blurb {
  margin-top: 65px;
  margin-left: 0px;
  width: 515px;
  height: 94px;
  background-image: url(../protected/images/blurb.png);
  float: left;
}

.blurb-title {
  color: white;
  display: block;
  margin-top: 10px;
  margin-left: 15px;
  font-size: 1.8em;
}

.blurb-txt {
  display: block;
  width: 490px;
  color: #99CC00;
  float: left;
  margin-top: 5px;
  margin-left: 15px;
  margin-right: 15px;
  font-size: 1.2em;
}



/******************************************************************
 +main
******************************************************************/

#main h2 {

	font-size: 1.8em;

}
.game {
  margin-left: 0px;
  margin-top: 3px;
  width: 515px;
  height: 196px;
  background: url(../protected/images/game-bg.png) no-repeat;
  display: block;
}

#thankyou{
  margin-left: 0px;
  margin-top: 3px;
  width: 515px;
  height: 196px;
  background: url(../protected/images/game-bg.png) no-repeat;
  display: block;
}
.game-pack {
  margin-top: 13px;
  margin-left: 15px;
  width: 100px;
  display: block;
  float: left;
}

.xbox-title {
  color: #99CC00;
  float: right;
  margin-top: 15px;
  margin-right: 15px;
  font-size: 1.8em;
}

.game-txt {
  display: block;
  width: 360px;
  color: white;
  float: left;
  margin-top: 10px;
  margin-left: 10px;
  margin-right: 15px;
  font-size: 1.2em;
}

.empty {
  margin-top: 10px;
  font-size: 1.9em;
  color: #99CC00;

}

.body-txt {
  display: block;
  width: 360px;
  color: white;
  float: left;
  margin-top: 10px;
  margin-left: 10px;
  margin-right: 15px;
  font-size: 1.2em;
}

.body-txt b{
  color: #99CC00;
}

.pay-button {
  float: right;
  margin-right: 50px;
  margin-top: 10px;
}

.buyme {
  margin-left: 20px;
  margin-top: 4px;
}
#items-box {
  background: url(../protected/images/checkout-bg.png) no-repeat;
  padding-bottom: 5px;
  padding-top: 10px;
}
#items {
  width: 540px;
  text-align: center;
}

th{
 font-size: 1.1em;
 color: #99CC00;
 text-transform:uppercase;
}

td{
 color: white;
 font-size: 1.3em;
}

.qty {
 font-size: 1em;
}



/******************************************************************
 +Sidebar
******************************************************************/

#cart {
  text-align: center;
  margin-left: 0px;
  margin-top: 3px;
  width: 223px;
  height: 190px;
  background-image: url(../protected/images/cart-bg.png);
  position: fixed;
}

#cartprice {
  margin-top: 60px;
  color: white;
  font-size: 1.9em;
  display: block;
}

#checkout {
  text-align: left;
  margin-left: 65px;
  clear: both;
  margin-top: 40px;
}



#paypal {
  margin-left: 0px;
  margin-top: 230px;
  position: fixed;
}

#h3 {
    color: white;
}


</style>
<title>Store</title>
</head>
<body>
    <div id="wrapper">
        
        <div id="blurb">
            <span class="blurb-title">
                Bookstore- Bargains for geeks
            </span>
            <span class="blurb-txt">
                Welcome to the GameStore...the cheapest place to buy games online
            </span>
        </div>
        <div id="sidebar">
            <div id="cart">
                <span id="cartprice">
                    <?php echo $_SESSION['total_items']; ?> item <br/> $<?php echo number_format($_SESSION['total_price'], 2); ?>
                </span>
                <div id="checkout">
                    <a href="checkout"><img src="../protected/views/images/checkout-btn.png" alt="checkout" /></a>
                </div>
            </div>
        </div>
        <div id="content">
        
