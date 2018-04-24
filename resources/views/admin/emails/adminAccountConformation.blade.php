<!DOCTYPE html>
<html lang="en-US">
   <head>
          <meta charset="utf-8">
    </head>
    <body>
    	  <h3>Dear {{ ucfirst($username) }},</h3>
    	  <br>
          <h4>Here are your company account credentials</h4>
          <p>Email&nbsp;:&nbsp;{{ $email }}</p>
          <p>Password&nbsp;:&nbsp;{{ $password }}</p>
		  <br>
          <p>You may login using the providing url below</p>
          <p>url&nbsp;{{ $url }}</p>
    </body>
</html>