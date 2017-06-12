<?php include_once $_SERVER['DOCUMENT_ROOT'] .
'/includes/helpers.inc.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Manage Jokes: Search Results</title>
<meta http-equiv="content-type"
content="text/html; charset=utf-8"/>
</head>
<body>
<h1>Search Results</h1>
<?php if (isset($corpers)): ?>
<table>
<tr><th>CORPERS</th><th>OPTIONS</th></tr>
<?php foreach ($corpers as $corper): ?>
<tr valign="top">
<td><?php htmlout($corper['name']); ?></td>
<td>
<form action="?" method="post">
<div>
<input type="hidden" name="state" value="<?php
htmlout($corper['state']); ?>"/>
<input type="submit" name="action" value="Edit"/>
<input type="submit" name="action" value="Delete"  onclick="return(confirm('do you really want to delete the corps member?'))"/>
</div>
</form>
</td>
</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>
<p><a href="?">New search</a></p>
<p><a href="..">Return to ESMS home</a></p>
</body>
</html>