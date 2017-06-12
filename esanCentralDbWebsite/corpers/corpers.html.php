<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h1>Manage corpers</h1>
<p><a href="?add">add new corps members</a></p>
<ul>



<?php foreach($corpers as $corper):?>
<li>
<form action="" method="post">
<div>
<?php echo htmlout($corper['name']);?>&nbsp;
<input type="hidden" name="state" value="<?php
echo $corper['state']; ?>"/>
<input type="submit" name="action" value="Edit" />
<input type="submit" onclick="return(confirm('do you really want to delete the corps member?'))" name="action" value="Delete" />
</div>
</form>
</li>
<?php endforeach; ?>
</ul>



<p><a  href="..">Return to  ESMS</a></p>

</body>
</html>