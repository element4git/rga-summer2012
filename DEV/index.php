<?php 
	function curPageURL() {
		 $pageURL = 'http';
		 if (isset($_SERVER["HTTPS"])&&$_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		 $pageURL .= "://";
		 if ($_SERVER["SERVER_PORT"] != "80") {
		  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		 } else {
		  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		 }
		 return $pageURL;
		}  

?>
<!DOCTYPE html>
<head>
	<title> R/GA Summer 2012</title>

	<link type="text/css" rel="stylesheet" href="css/foundation.css" />
    <script>var currentURL = '<?php echo curPageURL();?>';</script>
</head>
<body>
	<div class="container">
		<header class="row">
			<div class="six phone-four columns left">
				<div><img src="images/rgaSummerHeader.png" alt="R/GA Summer 2012" /></div>
			</div>
			<div class="six phone-four columns right ticker afterStart">
				<p>The trucks roll out in:</p>
				<div class="counter"></div>
			</div>
			<div class="six phone-four columns right ticker beforeStart">
				<p>Lunch will be served in:</p>
				<div class="counter"></div>
			</div>
		</header>
		<section class="row">
			<div id="videoStream" class="seven phone-four columns left">
            	<iframe width="720" height="554" src="http://www.ustream.tv/embed/11420826" scrolling="no" frameborder="0" style="border: 0px none transparent;">    </iframe>
<br /><a href="http://www.ustream.tv/" style="padding: 2px 0px 4px; width: 400px; background: #ffffff; display: block; color: #000000; font-weight: normal; font-size: 10px; text-decoration: underline; text-align: center;" target="_blank">Live streaming by Ustream</a>
            </div>
			<div class="five phone-four columns right">
            	<div class="menuInfo">
                    <h2>3 Trucks. 1 Great Lunch.</h2>
                    <p class="truckInfo"><span>Taim Mobile</span> Falafel Sandwich with Date-Lime Smoothie</p>
                    <p class="truckInfo"><span>Country Boys</span> Choice of Vegetarian or Meat Huaraches, Quesadillas, Tacos, Sopes or Chalupas </p>
                    <p class="truckInfo"><span>Go Burger</span> Hamburger or Cheeseburger with French Fries and Lemonade or Iced Tea</p>
                  </div>
			</div>
            <div class="five phone-four columns right">
				<h2>#RGAte</h2>
				<h2>Eat, play, share, repeat.</h2>
                <p>While you enjoy your food and conversation during lunch, feel free to tweet and instagram with the hashtag #RGAte to show how R/GA does lunch.</p>
                <p>For all you foodies @ the truck: <br /> @TaimMobile | @RedHookFoodVend (country boys) | @GoBurger</p>
                
			</div>
		</section>
        <section class="row">
        	<div id="socialFeed" class="phone-four columns left"></div>
        </section>
	</div>
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/modernizr.foundation.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32950364-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>