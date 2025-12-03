<?php
if(isset($_POST['submit'])) {
$message3=shell_exec('echo "test"');
   echo "<pre>$message3</pre>";
}

if(array_key_exists('dcron', $_POST)) {
 $varstation=$_POST['station'];
$varhour=$_POST['hour'];
$vardayofshow=$_POST['dayofshow'];
$tinid1=$_POST['tinid'];
$varminute=$_POST['minute'];
$command="/bin/bash /var/www/html/scripts/tuneincron.sh";
$varspace=" ";
$varsudo="sudo";
$f=$varsudo.$varspace.$command.$varspace.$varstation.$varspace.$varhour.$varspace.$vardayofshow.$varspace.$tinid1.$varspace.$varminute;
echo "$f";
$message3=shell_exec($f);
   echo "<pre>$message3</pre>";
}
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
    <option value="../index.php">Record Radio Waves</option>
    <option value="../recordings">Open Recordings</option>
    <option value="../hdindex.php">Record HD Radio</option>
    <option value="../cronkeep/src/">Manage Recordings</option>
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




















<input type="submit" name="dcron" class="button" value="Record Radio"/>
</font>
</form>
</html>







