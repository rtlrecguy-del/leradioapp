<?php
if(isset($_POST['submit'])) {
$message3=shell_exec('echo "test"');
   echo "<pre>$message</pre>";
}
if(array_key_exists('dcron', $_POST)) {

$varfreq=$_POST['freq'];
$varfreq1=$_POST['freq1'];
$ip=$_SERVER['REMOTE_ADDR'];


$vargain=$_POST['gain'];

$varsudo="sudo";


$varcommand="/bin/bash /var/www/html/scripts/sradio.sh";
$varspace=" ";
$vardot=".";
$f=$varsudo.$varspace.$varcommand.$varspace.$varfreq1.$vardot.$varfreq.$varspace.$ip;
   $varpatternfreq1="/^\d{1,3}$/";
   $varpatterngain="/\d{1,2}\.\d{1}$/";
   $varpatternfreq="/^\d{1,3}\$/";
   $varpatternip="/^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/";
if ((preg_match($varpatternfreq1, $varfreq1) && preg_match($varpatternfreq, $varfreq) && preg_match($varpatterngain, $vargain) && preg_match($varpatternip, $ip))) {
  echo "Successfully Started Open VLC on client at address udp://@0.0.0.0:12345";
   $message3=shell_exec($f);
   echo "<pre>$message3</pre>";
}
else {
   echo "Input did not validate";
}}
if(array_key_exists('dstop', $_POST)) {

$uud="sudo /usr/bin/pkill ffmpeg";
$message3=shell_exec($uud);
   echo "<pre>$message3</pre>";
$uut="sudo /usr/bin/pkill rtl_fm";
$message3=shell_exec($uut);
   echo "<pre>$message3</pre>";
$uup="sudo /usr/bin/pkill nrsc5";
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
}
</script>
<label for="selectbox"">Goto WebPage:</label>
<select id="selectbox" name="" onchange="javascript:location.href = this.value;">
    <option value="../index.php">Record SD FM</option>
    <option value="../hdindex.php">Record HD Radio</option>
    <option value="../cron.php">Manage Recordings</option>
    <option value="../sradio.php">Stream FM Radio</option>
  <option value="../hdradio.php">Stream HD Radio</option>
</select>
</br>
<form action="" method="post">
<label for="station"">Frequency:</label>
<div class="row">
<select style="width:20%;" name="freq1" id="freq1">
</select>
<select style="width:20%;" name="freq" id="freq">
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
</html>









