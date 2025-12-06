<?php
if(array_key_exists('lcron', $_POST)) {
echo "</br>Schedule for CRON JOB.   Day|Hour|Minute|Station</br>";
$command_output=shell_exec('crontab -l | cat -n');
   if (!empty($command_output)) {
echo "$command_output;"
}} 
if(array_key_exists('dcronbtn', $_POST)) {
    $vardel=$_POST['del'];


$varspace=" ";
$varcommand="/bin/bash /var/www/html/scripts/delcron.sh";
$f=$varcommand.$varspace.$vardel;
$vardelpattern="/^(?:[1-9]|[1-5]\d|24)$/";
if (preg_match($vardelpattern,  $vardel) {
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
   <option value="../index.php">Welcome Page</option>
    <option value="../fmrecord.php">Record SD FM</option>
    <option value="../hdrecord.php">Record HD Radio</option>
    <option value="../cron.php">Manage Recordings</option>
    <option value="../fmradio.php">Stream FM Radio</option>
  <option value="../hdradio.php">Stream HD Radio</option>
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
