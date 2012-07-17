<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> TITLE </title>
<link rel="stylesheet" type="text/css" href="css/global.css" />
<!--[if lt IE 7]>
	<link rel="stylesheet" type="text/css" href="css/ie.css" />
<![endif]-->
</head>
<body>
	<div id="mainContainer" class="print">
		<div id="mainContent">
        	<form id="serviceCall">
                <label>Phone List API</label>
                <div>
                    <label> Select Call:
                    <select name="call">
                        <option value='getPersonDetailsByEmail'>getPersonDetailsByEmail</option>
                        <option value='getPhoneListFirstName'>getPhoneListFirstName</option>
                    </select> </label> <label> options(comma seperated key : value) <input name="options" type="text" /></label>
                </div>
                <div><input type="button" value="submit" onclick="submitForm()" /></div>
            </form>
            <div id="results">
            </div>
		</div>
	</div>

<div id="fb-root"></div>
</body>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
  FB.init({
    appId  : '205806419459572',
    status : true, // check login status
    cookie : true, // enable cookies to allow the server to access the session
    xfbml  : true, // parse XFBML
    channelURL : 'http://WWW.MYDOMAIN.COM/channel.html', // channel.html file
    oauth  : true // enable OAuth 2.0
  });
</script>
<script src="http://www.google.com/jsapi"></script>
<script language="javascript">
	google.load("jquery", "1.4.2");
	google.load("jqueryui", "1.8.5");
</script>
<script type="text/javascript" src="code/global.js"></script>
<script type="text/javascript" src="code/object.js"></script>
<script type="text/javascript" src="code/onReady.js"></script>
</html>
