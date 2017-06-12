<?php
// Display search form
include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';


if (isset($_POST['action']) and $_POST['action'] == 'Delete'){
include 'index.html.php';
exit();
};


if (isset($_POST['action']) and $_POST['action'] == 'Edit'){
include 'index.html.php';
exit();
};

if (isset($_GET['action']) and $_GET['action'] == 'search')
{
include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
// The basic SELECT statement
$select = 'SELECT statecode,names';
$from = ' FROM corps_members';
$where = ' WHERE TRUE';
$ppa = mysqli_real_escape_string($link, $_GET['ppa']);
$discipline = mysqli_real_escape_string($link, $_GET['discipline']);
$statecod = mysqli_real_escape_string($link, $_GET['statecode']);


if ($statecod != '') // A discipline is selected
{
$where .= " AND statecode='$statecod'";
}


if ($ppa != '') // An ppa is selected
{
$where .= " AND ppa_id='$ppa'";
}

if ($discipline != '') // A discipline is selected
{
$where .= " AND disp_id='$discipline'";
}

$text = mysqli_real_escape_string($link, $_GET['text']);
if ($text != '') // Some search text was specified
{
$where .= " AND names LIKE '%$text%'";
}
$result = mysqli_query($link, $select . $from . $where);
if (!$result)
{
$error = 'Error fetching jokes.';
include 'error.html.php';
exit();
}
while ($row = mysqli_fetch_array($result))
{
$corpers[] = array('state' => $row['statecode'], 'name' => $row['names']);
}
include 'search.html.php';
exit();
}

$result = mysqli_query($link, 'SELECT statecode FROM corps_members');
if (!$result)
{
$error = 'Error fetching statecode from corps_members!';
include 'error.html.php';
exit();
}
while ($row = mysqli_fetch_array($result))
{
$state[] = $row['statecode'];
}
$result = mysqli_query($link, 'SELECT id, ppa_name FROM ppa');
if (!$result)
{
$error = 'Error fetching ppa from ppa table!';
include 'error.html.php';
exit();
}
while ($row = mysqli_fetch_array($result))
{
$ppa[] = array('id' => $row['id'], 'name' => $row['ppa_name']);
}
$result = mysqli_query($link, 'SELECT id, discipline_name FROM discipline');
if (!$result)
{
$error = 'Error fetching discipline from discipline table!';
include 'error.html.php';
exit();
}
while ($row = mysqli_fetch_array($result))
{
$discipline[] = array('id' => $row['id'], 'name' => $row['discipline_name']);
}

include 'searchform.html.php';
?>