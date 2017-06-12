<?php
include $_SERVER['DOCUMENT_ROOT']. '/includes/db.inc.php';
include $_SERVER['DOCUMENT_ROOT'].'/includes/select.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php htmlout($pageTitle); ?></title>
  </head>
  <body>
    <h1><?php htmlout($pageTitle); ?></h1>
    <form action="?<?php htmlout($action); ?>" method="post">
      <div>
        <label for="statecode">statecode: <input type="text" name="statecode" 
            id="statecode" value="<?php htmlout($statecode); ?>"><span style="color:red">(e.g ED/15A/2356)</span></label>
      </div>
      <div>
        <label for="name">Name of corps members: <input type="text" name="name"  size="30"
            id="name" value="<?php htmlout($name); ?>"></label>
      </div>
      <div>
       <label for="Male">Male</label><input type="radio" name="gender" value="MALE"<?php if($gender=="MALE"):?> checked="checked"
<?php endif;?> />
  <label for="Female">Female </label><input type="radio" name="gender" value="FEMALE"<?php if($gender!= "MALE"):?>
checked="checked" <?php endif;?>/>;
 
</div>
      <div>
        <label for="number">Phone number: <input type="text" name="number"
            id="number" value="<?php htmlout($number); ?>"></label>
      </div>
      
      <div>
         <label for="discipline ">discipline of corps members: <select name="discipline"> 
      <option value="">Select one</option>
<?php foreach ($disp as $d): ?>
<option value="<?php htmlout($d['id']); ?>"<?php
if ($d['id'] == $discipline)
echo ' selected="selected"';
?>><?php htmlout($d['name']); ?></option>
<?php endforeach; ?></select></label></div>
            <div>
    <label for="ppaid">PPA of corps members: <select name="ppa">
          <option value="">Select one</option>
    <?php foreach ($ppaId as $ppad): ?>
<option value="<?php htmlout($ppad['id']); ?>"<?php
if ($ppad['id'] == $ppa)
echo ' selected="selected"';
?>><?php htmlout($ppad['name']); ?></option>
<?php endforeach; ?> \n';
};
?> 
</select></label></div>     
     
    
        <input type="submit" value="<?php htmlout($button); ?>">
      </div>
    </form>
    <p><a  href="..">Return to  ESMS</a></p>

  </body>
</html>
