<?php
if(isset($_POST['submit'])) {
$command_output = shell_exec('echo "test');
$sanitized_output = htmlspecialchars($command_output, ENT_QUOTES | ENT_HTML5, 'UTF-8');
echo $sanitized_output;
}
exec("pgrep ffmpeg", $output, $return);
if ($return == 0) {
   echo 'Recording ... <button class="red-button">Click Me</button>';
}
else {
   echo 'Not Recording ... <button class="green-button">Click Me</button>';
}


if(array_key_exists('dcron', $_POST)) {


$varfreq1_sanitized=filter_var($_POST['freq1'], FILTER_SANITIZE_NUMBER_INT);
$varfreq_sanitized=filter_var($_POST['freq'], FILTER_SANITIZE_NUMBER_INT);
$varip=$_SERVER['REMOTE_ADDR'];
$varip_sanitized=htmlspecialchars($varip, ENT_QUOTES, 'UTF-8');





$varcommand="sudo /bin/bash /var/www/html/scripts/fmradio.sh";
$varspace=" ";
$vardot=".";
$f=$varcommand.$varspace.$vvarfreq1_sanitized.$vardot.$varfreq_sanitized.$varspace.$varip_sanitized;
   $varpatternfreq1="/^\d{1,3}$/";
   $varpatterngain="/\d{1,2}\.\d{1}$/";
   $varpatternfreq="/^\d{1,3}\$/";
   $varpatternip="/^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/";
if ((preg_match($varpatternfreq1, $varfreq1_sanitized) && preg_match($varpatternfreq, $varfreq_sanitized) && preg_match($varpatternip, $varip_sanitized))) {
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
 <option value="">Choose Page To Go To:</option>
    <option value="../index.php">Welcome Page</option>
    <option value="../fmrecord.php">Record SD FM</option>
    <option value="../hdrecord.php">Record HD Radio</option>
    <option value="../cron.php">Manage Recordings</option>
    <option value="../fmradio.php">Stream FM Radio</option>
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
</select>
</br>
<input type="submit" name="dcron" value="Stream Radio"/>
<input type="submit" name="dstop" value="Stop Radio"/>
</form>
</body>
</html>
