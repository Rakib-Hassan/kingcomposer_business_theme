<!doctype html>
<html amp lang="en">   
<head>
<title>Amazing Business Results</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
<meta name="keywords" content="Amazing Business Results">
<meta name="description" content="Amazing Business Results">

<link rel="icon" href="image/amp_favicon.png">
<link rel="canonical" href="article.amp.html">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,600,600i,700&display=swap" rel="stylesheet"> 

<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
<script async src="https://cdn.ampproject.org/v0.js"></script>
<script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
<script async custom-element="amp-lightbox" src="https://cdn.ampproject.org/v0/amp-lightbox-0.1.js"></script>
<script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
<script async custom-element="amp-selector" src="https://cdn.ampproject.org/v0/amp-selector-0.1.js"></script>
<script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
<script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
<script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
<script async custom-element="amp-recaptcha-input" src="https://cdn.ampproject.org/v0/amp-recaptcha-input-0.1.js"></script>

<style amp-custom>
<?php

$bufferCss = file_get_contents(get_template_directory_uri() . '/style.css');
$bufferCss = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $bufferCss);
$bufferCss = str_replace(': ', ':', $bufferCss);
$bufferCss = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $bufferCss);
echo $bufferCss;

?>
</style>
</head>

<body>
<!-- Header start -->
<header class="header">
    <div class="hdrIn">
        <a id="logo" href="#">
            <amp-img width="294" height="89" layout="responsive" src="image/logo.png" alt="Amazing"></amp-img>
            <em class="discernible_name">empty</em>
        </a>
        <button id="menuBtn" on="tap:menu.toggleClass(class='toggleMenu')" title="Title">
            <span class="menuBtnIn">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </span>
            <em class="discernible_name">empty</em>
        </button>
        <nav class="navigation">
            <ul id="menu" class="menu">
                <li><a href="#">Home</a></li>
                <li class="menu-item-has-children"><a href="#">About</a>
                    <ul class="sub-menu">
                        <li><a href="JavaScript:;">Sub menu item 1</a></li>
                        <li><a href="JavaScript:;">Sub menu item 2</a></li>
                        <li><a href="JavaScript:;">Sub menu item 3</a></li>
                        <li><a href="JavaScript:;">Sub menu item 4</a></li>
                        <li><a href="JavaScript:;">Sub menu item 5</a></li>
                        <li><a href="JavaScript:;">Sub menu item 6</a></li>
                        <li><a href="JavaScript:;">Sub menu item 7</a></li>
                        <li><a href="JavaScript:;">Sub menu item 8</a></li>
                    </ul>
                </li>
                <li><a href="#">Videos</a></li>
                <li><a href="#">Business Coaching</a></li>
                <li><a href="#">Zoho Services</a></li>
                <li><a href="#">My Services</a></li>
                <li class="current-menu-item current_page_item"><a href="#">Contact</a></li>
                <li><a href="#">Blog</a></li>
            </ul>
        </nav>
    </div>
</header>
<!-- Header area end -->

<!-- contactMe start -->
<div class="contactMe">
    <div class="contactIn">
    	<h1>Contact Me</h1>
        <p><span>Book an Online Meeting: <a href="#">Click Here</a></span><br><span>Phone: <a href="tel:+647-694-3379">(647) 694-3379</a></span></p>
        <form method="post" action-xhr="/components/amp-form/submit-form-xhr" target="_top">
            <div class="inputCont">
                <input class="form-control" type="text" placeholder="Name*">
            </div>
            <div class="inputCont">
                <input class="form-control" type="tel" placeholder="Phone*">
            </div>
            <div class="inputCont">
                <input class="form-control" type="email" placeholder="Email*">
            </div>
            <div class="inputCont">
                <textarea class="form-control" rows="5" cols="5" name="comment" placeholder="Reason"></textarea>
            </div>
            <div class="inputCont">
                <amp-img width="632" height="135" layout="responsive" src="image/recaptcha.jpg" alt="Recaptcha"></amp-img>
            </div>
            <div class="btnCont">
                <input type="submit" value="Submit">
            </div>
            <div submit-success><template type="amp-mustache">Success! Thanks for trying the<code>amp-form</code> demo!</template> </div>
            <div submit-error><template type="amp-mustache">Error!</template></div>
        </form>
    </div>
</div>
<!-- contactMe end -->

<!-- Footer start -->
<footer class="footer">
    <div class="ftrIn">
        <div class="ftrInLft">
        	<a class="ftrLogo" href="#"><amp-img width="208" height="63" layout="responsive" src="image/ftrLogo.png" alt="Logo"></amp-img></a>
        	<span class="ftrPhone">Phone: <a href="tel:+647-694-3379">(647) 694-3379 </a></span>
        </div>
        <div class="ftrInRgt">
        	<p>&copy; 2019 All Rights Reserved</p>
        </div>
	</div>
</footer>
<!-- Footer end -->
</body>
</html>