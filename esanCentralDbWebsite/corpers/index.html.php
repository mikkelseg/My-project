<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include $_SERVER['DOCUMENT_ROOT']. '/includes/db.inc.php';
include $_SERVER['DOCUMENT_ROOT'].'/includes/helpers.inc.php';

if (isset($_GET['add']))
{
$pageTitle = "New Corp's member";
$action = 'addform';
$statecode = '';
$name = '';
$number = '';
$gender='';
$discipline='';
$ppa='';
$button = 'Add Corper';
$sql = "SELECT id, discipline_name FROM discipline";
$result = mysqli_query($link, $sql);
if (!$result)
{
$error = 'Error fetching list of authors.';
include 'error.html.php';
exit();
}
while ($row = mysqli_fetch_array($result))
{
$disp[] = array('id' => $row['id'], 'name' => $row['discipline_name']);
}

$sql = "SELECT id,ppa_name FROM ppa";
$result = mysqli_query($link, $sql);
if (!$result)
{
$error = 'Error fetching list of authors.';
include 'error.html.php';
exit();
}
while ($row = mysqli_fetch_array($result))
{
$ppaId[] = array('id' => $row['id'], 'name' => $row['ppa_name']);
}
include 'form.html.php';
exit();	
		
};

if (isset($_GET['addform']))
{
	include $_SERVER['DOCUMENT_ROOT'].'/includes/select.inc.php';
$statecode = mysqli_real_escape_string($link, $_POST['statecode']);
$name = mysqli_real_escape_string($link, $_POST['name']);
$number = mysqli_real_escape_string($link, $_POST['number']);
$gender = mysqli_real_escape_string($link, $_POST['gender']);

$discipline=mysqli_real_escape_string($link, $_POST['discipline']);
$ppa=mysqli_real_escape_string($link, $_POST['ppa']);

if ($discipline == '')
{
$error = 'You must choose a discipline for this corps members.
Click &lsquo;back&rsquo; and try again.';
include 'error.html.php';
exit();
}

if ($ppa == '')
{
$error = 'You must choose a ppa for this corps members.
Click &lsquo;back&rsquo; and try again.';
include 'error.html.php';
exit();
}

$sql = "INSERT INTO corps_members SET
statecode='$statecode',
names='$name',
sex= '$gender',
phone_number='$number',
disp_id='$discipline',
ppa_id='$ppa' 
";
if (!mysqli_query($link, $sql))
{
$error = 'Error adding submitted author.';
include 'error.html.php';
exit();
}
header('Location:index.html.php');
exit();
};

if (isset($_POST['action']) and $_POST['action'] == 'Edit'){
$id=mysqli_real_escape_string($link,$_POST['state']);
$sql="select statecode,names,sex,phone_number,ppa_id,disp_id FROM corps_members  where statecode='$id'";
$result=mysqli_query($link,$sql);
if(!$result){
	$error='error fetching data from database';
	include 'error.html.php';
	exit(); 	
}
$row=mysqli_fetch_array($result);	
$pageTitle=	'Edit Corper';
$action='editform';
$statecode=$row['statecode'];	
$name=$row['names'];
$number=$row['phone_number'];
$gender=$row['sex'];
$discipline=$row['disp_id'];
$ppa=$row['ppa_id'];

$button='Update corper';

$sql = "SELECT id, discipline_name FROM discipline";
$result = mysqli_query($link, $sql);
if (!$result)
{
$error = 'Error fetching list of authors.';
include 'error.html.php';
exit();
}
while ($row = mysqli_fetch_array($result))
{
$disp[] = array('id' => $row['id'], 'name' => $row['discipline_name']);
}

$sql = "SELECT id,ppa_name FROM ppa";
$result = mysqli_query($link, $sql);
if (!$result)
{
$error = 'Error fetching list of authors.';
include 'error.html.php';
exit();
}
while ($row = mysqli_fetch_array($result))
{
$ppaId[] = array('id' => $row['id'], 'name' => $row['ppa_name']);
}

	
	include 'form.html.php';
	exit();
}
if(isset($_GET['editform'])){
	$id=mysqli_real_escape_string($link,$_POST['statecode']);
	$name=mysqli_real_escape_string($link,$_POST['name']);
	$number=mysqli_real_escape_string($link,$_POST['number']);
	$gender=mysqli_real_escape_string($link,$_POST['gender']);
	$discipline=mysqli_real_escape_string($link,$_POST['discipline']);
	$ppa=mysqli_real_escape_string($link,$_POST['ppa']);
	$sql="UPDATE corps_members INNER JOIN ppa ON ppa_id=ppa.id INNER JOIN discipline ON  disp_id=discipline.id SET 
	names= '$name',
	sex='$gender',
	phone_number='$number',
	discipline_name='$discipline',
	ppa_name='$ppa'
	WHERE statecode='$id'";
	if(!mysqli_query($link,$sql))
	{
		$error='error updating the corpers information.';
		include 'error.html.php';
		exit();		
	}
	header('Location:index.html.php');
exit();	
}

	
if (isset($_POST['action']) and $_POST['action'] == 'Delete')
{	
$id=mysqli_real_escape_string($link,$_POST['state']);
$sql1="delete from corps_members where statecode='$id'";
if(!mysqli_query($link,$sql1))
{
$error = 'Error adding submitted joke: ' . mysqli_error($link);
include 'error.html.php';
exit();
}
}
$result = mysqli_query($link, 'SELECT statecode,names FROM corps_members');
if (!$result)
{
$error = 'Error fetching jokes: '.mysqli_error($link);
include 'error.html.php';
exit();
}
while ($row = mysqli_fetch_array($result))
{
$corpers[] = array('state' => $row['statecode'], 'name' => $row['names']);
}
include 'corpers.html.php';


?>
</body>
</html>
