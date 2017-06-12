<?php include_once $_SERVER['DOCUMENT_ROOT'] .
'/includes/helpers.inc.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Manage Jokes</title>
<meta http-equiv="content-type"
content="text/html; charset=utf-8"/>
</head>
<body>
<h1>Search corpers</h1>
<form action="" method="get">
<p>View corpers satisfying the following criteria:</p>
<div>
<label for="author">By statecode:
<input type="text" name="statecode" id="statecode"/>
<span style="color:red">(e.g ED/15A/2356)</span></label></div>
<div>
<label for="ppa">By ppa:</label>
<select name="ppa" id="ppa">
<option value="">Any ppa</option>
<?php foreach ($ppa as $ppad): ?>
<option value="<?php htmlout($ppad['id']); ?>"><?php
htmlout($ppad['name']); ?></option>
<?php endforeach; ?>
</select>
</div>
<div>
<label for="discipline">By discipline:</label>
<select name="discipline" id="discipline">
<option value="">Any discipline</option>
<?php foreach ($discipline as $disp): ?>
<option value="<?php htmlout($disp['id']); ?>"><?php
htmlout($disp['name']); ?></option>
<?php endforeach; ?>
</select>
</div>

<div>
<label for="text">Containing text:</label>
<input type="text" name="text" id="text" size="30"/>
</div>
<div>
<input type="hidden" name="action" value="search"/>
<input type="submit" value="Search"/>
</div>
</form>
<p><a href="index.html.php">View All Corps_member</a></p>
<p><a href="..">Return to ESMS home</a></p>
</body>
</html>