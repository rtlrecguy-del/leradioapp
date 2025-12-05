<?php
if(isset($_POST['submit'])) {
$command_output = shell_exec('echo "test');
$sanitized_output = htmlspecialchars($command_output, ENT_QUOTES | ENT_HTML5, 'UTF-8');
echo $sanitized_output;
}

if(array_key_exists('dcron', $_POST)) {

$varfreq1_sanitized=filter_var($_POST['freq1'], FILTER_SANITIZE_NUMBER_INT);
$varfreq_sanitized=filter_var($_POST['freq'], FILTER_SANITIZE_NUMBER_INT);
   
$varcommanderiod=".";
$varcommandarams=$varfreq.$varcommanderiod.$varfreq1;
$varcommandparams_sanitized=htmlspecialchars($varcommandparams, ENT_QUOTES, 'UTF-8');



$vargain=$_POST['gain'];
$vargain_sanitized=htmlspecialchars($vargain, ENT_QUOTES, 'UTF-8');


$varhour=$_POST['hour'];
$varhour_sanitized=htmlspecialchars($varhour, ENT_QUOTES, 'UTF-8');
   
$vardayofshow_sanitized=filter_var($_POST['vardayofshow'], FILTER_SANITIZE_NUMBER_INT);

$varminute_sanitized=filter_var($_POST['varminute'], FILTER_SANITIZE_NUMBER_INT);

$varcommand="/bin/bash /var/www/html/scripts/fmcron.sh";
$varspace=" ";
$f=$varcommand.$varspace.$varcommandarams_sanitized.$varspace.$varhour_sanitized.$varspace.$vardayofshow_sanitized.$varspace.$vargain_sanitized.$varspace.$varminute_sanitized;
   $varpatternfreq1="/^\d{1,3}$/";
   $vargain="/^\d{1,2}\.\d{1}$/";
   $varpatternfreq="/^\d{1,3}$/";
   $varpatternhour="/^(?:[1-9]|[1-5]\d|24)$/";
   $varpatternminute="/^(?:[1-9]|[1-5]\d|60)$/";
   $varpatterndayofshow="/^.{1,3}$/";
if ((preg_match($varpatternfreq1, $varfreq1) && preg_match($varpatternfreq, $varfreq_sanitized) && preg_match($varpatternhour, $varhour_sanitized) && preg_match($varpatternminute, $varminute_sanitized) && preg_match($varpatternhour, $varhour_sanitized) && preg_match($varpatterndayofshow, $vardayofshow_sanitized))) {
  echo "Successfully Scheduled Recording";
   $message3=shell_exec($f);
   echo "<pre>$message3</pre>";
}
else { 
   echo "Your input didn't validate";
}
   
   

}


?>

<html>
<body>
<head>
 <script src="../script.js"></script> 
<link rel="stylesheet" href="../styles.css">
</head>

<script>
window.onload = function() {
  fillSelect("../txtfiles/m1.txt","freq1");
fillSelect("../txtfiles/m3.txt","freq");
fillSelect("../txtfiles/g1.txt","gain");
fillSelect("../txtfiles/m.txt","minute");
fillSelect("../txtfiles/h.txt","hour");
fillSelect("../txtfiles/cday.txt","dayofshow");
}
</script>
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
<label for="freq">Frequency:</label>
<div class="row">
<select style="width:20%;" name="freq1" id="freq1">
</select>
<select style="width:20%;" name="freq" id="freq">
</select>
</div>


<label for="minute">Minute:</label>
<select name="minute" id="minute">
</select>



<label for="hour">Hour:</label>

<select name="hour" id="hour">
</select>
<label for="day of show">Day of Show</label>
<select name="dayofshow" id="dayofshow">
</select>


<label for="gain">Gain:</label>
<select name="gain" id="gain">
</select>

</br></br>

<input type="submit" name="dcron" value="Record FM"/>

</form>
</body>
</html>
