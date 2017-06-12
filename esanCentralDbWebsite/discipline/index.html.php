<?php
include_once $_SERVER['DOCUMENT_ROOT'] .
'/includes/magicquotes.inc.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/helpers.inc.php';

if (isset($_GET['add']))
{
$pagetitle = 'New discipline';
$action = 'addform';
$name = '';
$id = '';
$button = 'Add discipline';
include 'form.html.php';
exit();
}
if (isset($_GET['addform']))
{
$id = mysqli_real_escape_string($link, $_POST['id']);
$name = mysqli_real_escape_string($link, $_POST['name']);
$sql = "INSERT INTO discipline SET
discipline_name='$name'";
if (!mysqli_query($link, $sql))
{
$error = 'Error adding submitted ppa.';
include 'error.html.php';
exit();
}
header('Location:index.html.php');
exit();
}
if (isset($_POST['action']) and $_POST['action'] == 'Edit')
{
$id = mysqli_real_escape_string($link, $_POST['id']);
$sql = "SELECT id, discipline_name FROM discipline WHERE id='$id'";
$result = mysqli_query($link, $sql);
if (!$result)
{
$error = 'Error fetching ppa details.';
include 'error.html.php';
exit();
}
$row = mysqli_fetch_array($result);
$pagetitle = 'Edit discipline';
$action = 'editform';
$name = $row['discipline_name'];
$id = $row['id'];
$button = 'Update discipline';
include 'form.html.php';
exit();
}
if (isset($_GET['editform']))
{
$id = mysqli_real_escape_string($link, $_POST['id']);
$name = mysqli_real_escape_string($link, $_POST['name']);
$sql = "UPDATE discipline SET
discipline_name='$name'
WHERE id='$id'";
if (!mysqli_query($link, $sql))
{
$error = 'Error updating submitted discipline.' .
mysqli_error($link);
include 'error.html.php';
exit();
}
header('Location:index.html.php');
exit();
}
if (isset($_POST['action']) and $_POST['action'] == 'Delete')
{
include $_SERVER['DOCUMENT_ROOT'] . '/include/db.inc.php';
$id = mysqli_real_escape_string($link, $_POST['id']);
// Delete the ppa
$sql = "DELETE FROM discipline WHERE id='$id'";
if (!mysqli_query($link, $sql))
{
$error = 'Error deleting discipline.';
include 'error.html.php';
exit();
}
header('Location:index.html.php');
exit();
}
// Display ppa list

$result = mysqli_query($link, 'SELECT id, discipline_name FROM discipline');
if (!$result)
{
$error = 'Error fetching discipline from database!';
include 'error.html.php';
exit();
}
while ($row = mysqli_fetch_array($result))
{
$discipline[] = array('id' => $row['id'], 'name' => $row['discipline_name']);
}
include 'discipline.html.php';
?>