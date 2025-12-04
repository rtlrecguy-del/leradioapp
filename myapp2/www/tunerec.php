<?php
if(isset($_POST['submit'])) {
$message3=shell_exec('echo "test"');
   echo "<pre>$message3</pre>";
}
if(array_key_exists('dstop', $_POST)) {
$uud="sudo /usr/bin/pkill mpv";
$message3=shell_exec($uud);
   echo "<pre>$message3</pre>";
}
if(array_key_exists('dcron', $_POST)) {
$varsudo="sudo";
 $varstation=$_POST['station'];
$varhour=$_POST['hour'];
$vardayofshow=$_POST['dayofshow'];
$vartinid=$_POST['tinid'];
$varminute=$_POST['minute'];
$command="/bin/bash /var/www/html/scripts/tuneincron.sh";
$varspace=" ";
$f=$command.$varspace.$varstation.$varspace.$varhour.$varspace.$vardayofshow.$varspace.$vartinid.$varspace.$varminute;
   $varpatterntinid="/^([+-]?(?=\d|\.\d)\d*(\.\d*)?|.{0,13})$/";
   $varpatternstation="/[1-4]/";
   $varpatternhour="/^(?:[1-9]|[1-5]\d|24)$/";
   $varpatternminute="/^(?:[1-9]|[1-5]\d|60)$/";
   $varpatterndayofshow="/^.{1,3}$/";
if ((preg_match($varpatternstation,$varstation) && preg_match($varpatternminute, $varminute) && preg_match($varpatternhour, $varhour) && preg_match($varpatterndayofshow, $vardayofshow) && preg_match($varpatterntinid, $vartinid))) {
  echo "Successfully Scheduled Recording"; 
   $message3=shell_exec($f);
   echo "<pre>$message3</pre>";
}
else {
   echo "Input not Validated";
}}
?>
<html>
<head>
<script src="../script.js"></script>
<link rel="stylesheet" href="../styles.css">
</head>
<script>
window.onload = function() {
fillSelect("../txtfiles/h.txt","hour");
fillSelect("../txtfiles/cday.txt","dayofshow");
fillSelect("../txtfiles/h.txt","hour");
fillSelect("../txtfiles/m.txt","minute");
}
</script>
<select id="selectbox" name="" onchange="javascript:location.href = this.value;">
<option value="">Choose Page To Go To:</option>
   <option value="../index.php">Record SD FM</option>
    <option value="../hdindex.php">Record HD Radio</option>
    <option value="../cron.php">Manage Recordings</option>
    <option value="../sradio.php">Stream FM Radio</option>
  <option value="../hdradio.php">Stream HD Radio</option>
 <option value="../tunerec.php">Record Tune In Radio</option>
</select>
<form action="" method="post">
<label for="station">Choose a Radio Station:</label>
<select name="station" id="station">
  <option value="1">Fox</option>
  <option value="2">MSNBC</option>
<option value="3">CNN</option>
<option value="4">Enter Custom TuneIn ID</option>
</select>
<label for="tinid">Enter custom tuneinID example. s1967021</label>
<input type="text" name="tinid" value="Blank">
<label for="day of show">day of show</label>
<select name="dayofshow" id="dayofshow">
</select></br>
<label for="minute">minute:</label>
<select name="minute" id="minute">
</select>

<label for="hour">Hour:</label>

<select name="hour" id="hour">
</select>
<input type="submit" name="dcron" class="button" value="Record Radio"/>
</form>
</html>







