<?php
if(isset($_POST['submit'])) {
$u=$_POST['del'];
$ee="/bin/bash /home/ted/cronp.sh ";
$ii=$ee.$u;
$message=shell_exec('echo "test"');
      echo "<pre>$message</pre>";
}
if(array_key_exists('lcron', $_POST)) {
$message3=shell_exec('crontab -l | n1');
   echo "<pre>$message3</pre>";
}
if(array_key_exists('dcronbtn', $_POST)) {
$vardel=$_POST['del'];
$varspace=" ";
$varcommand="/bin/bash /var/www/html/scripts/cronp.sh";
$f=$varcommand.$varspace.$vardel;
$vardelpattern="/^(?:[1-9]|[1-5]\d|24)$/";
if (preg_match($vardelpattern, $vardel)) {
$message1=shell_exec($f);
   echo "<pre>$message1</pre>";
 echo "Successfully deleted";
}}


?>
<html>
<body>
<head>
 <script src="../script.js"></script> 
<link rel="stylesheet" href="../styles.css">
</head>
<select id="selectbox" name="" onchange="javascript:location.href = this.value;">
<option value="">Choose Page To Go To:</option>
    <option value="../index.php">Record FM</option>
    <option value="../hdindex.php">Record HD Radio</option>
    <option value="../cronkeep/src/">Manage Recordings</option>
    <option value="../sradio.php">Stream FM Radio</option>
  <option value="../hdradio.php">Stream HD Radio</option>
 <option value="../tunerec.php">Record Tune In Radio</option>
</select>
<form action="" method="post">

<label for="del">del line number:</label>
  <input  type="text" id="del" name="del">
<input type="submit" name="lcron"
                class="button" value="List Cron Jobs" />
<input type="submit" name="dcronbtn"
                class="button" value="Delete Cron Job" />

</form>

</html>
