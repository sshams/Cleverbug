<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width= device-width">
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<title>Login</title>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script>
$(document).bind("mobileinit", function(event) {
	$.mobile.defaultPageTransition = "slideup";
});
</script>
<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
<script src="/cleverbug/js/cleverbug.js"></script>
</head>

<body>
<section id="login" data-role="page">
  <h1>Cleverbug Login</h1>
  <form action="login/" method="post" enctype="multipart/form-data" name="loginForm" id="loginForm">
    <label for="username">
      <input name="username" type="text" id="username" value="admin" placeholder="username">
    </label>
    <label for="password">
      <input name="password" type="password" id="password" value="admin" placeholder="password">
    </label>
    <input name="loginButton" type="button" id="loginButton" value="Login" data-inline="true">
    <!--<a href="#register" data-role="button" data-inline="true">Register</a>-->
  </form>
</section>

<section id="welcome" data-role="page">
  <header data-role="header">
    <a href="#" data-role="button" id="logout">Logout</a>
    <h1>Welcome to Cleverbug</h1>
  </header>
  <ul id="userList" data-role="listview" class="users">
  </ul>
</section>

<section id="details" data-role="page">
  <header data-role="header">
    <a href="#welcome" data-role="button">Back</a><h1>Details</h1>
  </header><br>
  <ul data-role="listview">
  	<li><img src="" id="photo" width="100" height="100" /> <span id="usernameSpan"></span> - <span id="dobSpan"></span></li>
  </ul>
  
</section>

<section id="register" data-role="page">
  <header>
    <h1>Register</h1>
    <nav>
      <input type="submit" name="login" id="login" value="Login" data-inline="true" />
      <input type="submit" name="register" id="register" value="Register" data-inline="true" />
      <!--<a href="#" data-role="button">Register</a><a href="/register">Register</a>--> 
    </nav>
  </header>
</section>

</body>
</html>
