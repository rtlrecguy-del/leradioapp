<?php
if(isset($_POST['submit'])) {
$message3=shell_exec('echo "test"');
   echo "<pre>$message3</pre>";
}
if(array_key_exists('dcron', $_POST)) {
$varfreq1=$_POST['freq1'];
$ip=$_SERVER['REMOTE_ADDR'];

 $varfreq=$_POST['freq'];
$varperiod=".";
$varcommandarams=$varfreq1.$varperiod.$varfreq;



$varsubstation=$_POST['substation'];


$varcommand="/bin/bash /var/www/html/scripts/hdradio.sh";
$varspace=" ";
$f=$varcommand.$varspace.$varcommandarams.$varspace.$varsubstation.$varspace.$ip;
echo "$f";
$message3=shell_exec($f);
   echo "<pre>$message3</pre>";
}
if(array_key_exists('dstop', $_POST)) {

$uud="pkill -9 ffmpeg";
$message3=shell_exec($uud);
   echo "<pre>$message3</pre>";
$uut="pkill -9 rtl_fm";
$message3=shell_exec($uut);
   echo "<pre>$message3</pre>";
$uup="pkill -9 nrsc";
$message3=shell_exec($uup);
   echo "<pre>$message3</pre>";
}

?>
<html>
<head>
<link rel="stylesheet" href="../styles.css">
<script src="../script.js"></script>
</head>
<script>
window.onload = function() {
  fillSelect("../txtfiles/m1.txt","freq1");
fillSelect("../txtfiles/m3.txt","freq");
fillSelect("../txtfiles/g1.txt","gain");
fillSelect("../txtfiles/sub.txt","substation")
}
</script>
<label for="selectbox"">Goto WebPage:</label>
<select id="selectbox" name="" onchange="javascript:location.href = this.value;">
     <option value="">Choose Page To Go To:</option>
    <option value="../index.php">Record Radio Waves</option>
    <option value="../recordings">Open Recordings</option>
    <option value="../hdindex.php">Record HD Radio</option>
    <option value="../cronkeep/src/">Manage Recordings</option>
    <option value="../sradio.php">Stream FM Radio</option>
  <option value="../hdradio.php">Stream HD Radio</option>
 <option value="../streamlink.php">Record News TV </option>
</select>
</br>
<form action="" method="post">
<label for="station"">Frequency:</label>
<div class="row">
<select style="width:20%;" name="freq1" id="freq1">
</select>
<select style="width:20%;" name="freq" id="freq">
</select>
<select style="width:20%;" name="substation" id="substation">
</select>
</div>
<label for="gain" for="station">Choose the antenna gain:</label>
<select name="gain" id="gain">
</select>
</br>
<input type="submit" name="dcron" value="Stream Radio"/>
<input type="submit" name="dstop" value="Stop Radio"/>
</form>
</body>







