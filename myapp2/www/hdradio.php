<?php
$command_output=shell_exec('sudo /bin/bash /var/www/html/scripts/tunerstatus.sh');
if (empty($command_output)) {
   echo "Nothing is recording or playing";
}
else {
$sanitized_output = htmlspecialchars($command_output, ENT_QUOTES | ENT_HTML5, 'UTF-8');
echo $sanitized_output;
}
if(array_key_exists('dcron', $_POST)) {

$varfreq1_sanitized=filter_var($_POST['freq1'], FILTER_SANITIZE_NUMBER_INT);
$varfreq_sanitized=filter_var($_POST['freq'], FILTER_SANITIZE_NUMBER_INT);

$varip=$_SERVER['REMOTE_ADDR'];
$varip_sanitized=htmlspecialchars($varip, ENT_QUOTES, 'UTF-8');

   
$varperiod=".";
$varcommandarams=$varfreq1_sanitized.$varperiod.$varfreq_sanitized;



$varsubstation_sanitized=filter_var($_POST['substation'], FILTER_SANITIZE_NUMBER_INT);



$varcommand="sudo /bin/bash /var/www/html/scripts/hdradio.sh";
$varspace=" ";
$f=$varcommand.$varspace.$varcommandarams.$varspace.$varsubstation_sanitized.$varspace.$varip_sanitized;
   $varpatternfreq1="/^\d{1,3}/";
   $varpatternfreq="/^\d{1,3}$/";
   $varpatternip="/^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/";
    $varpatternsubstation="/[1-4]/";
if ((preg_match($varpatternfreq1, $varfreq1_sanitized) && preg_match($varpatternfreq, $varfreq_sanitized) && preg_match($varpatternsubstation, $varsubstation_sanitized) && preg_match($varpatternip, $varip_sanitized))) {
  echo "&nbsp;&nbsp;Listen at address udp://0.0.0.0:12345";
   $message3=shell_exec($f);
   echo "<pre>$message3</pre>";
}
else {
   echo "Input did not validate";
}
  
 

}
if(array_key_exists('stopplay', $_POST)) {
   echo "Sending Message to Stop Service";
$command="sudo /bin/bash /var/www/html/scripts/sigintplay.sh";
$message3=shell_exec($f);
}
   if(array_key_exists('stoprec', $_POST)) {
   echo "Sending Message to Stop Service";
$f="sudo /bin/bash /var/www/html/scripts/sigintrec.sh";
$message3=shell_exec($f);
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
<select id="selectbox" name="" onchange="javascript:location.href = this.value;">
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
<select style="width:20%;" name="substation" id="substation">
</select>
</div>
</br>
<input type="submit" name="dcron" value="Stream Radio"/>
  <input type="submit" name="stoprec" value="Stop recordings"/>
   <input type="submit" name="stopplay" value="Stop Radio"/>
</form>
</body>







