<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Post 1</title>
</head>

<body>
<h1>Hello, World!</h1>
<p>This page sets certain $_POST variables. <a href="post2.php">Go to the next page</a></p>
<?php
$_POST['somevar'] = "sumthin";
$_POST['another'] = "sumthin else";
?>
<pre>
<?php print_r( $_POST ); ?>
</pre>
</body>
</html>