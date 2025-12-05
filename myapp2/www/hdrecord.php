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
   
$varperiod=".";





$varsubstation=$_POST['substation'];
$varsubstation_sanitized=htmlspecialchars($varsubstation, ENT_QUOTES, 'UTF-8');






$varhour=$_POST['hour'];
$varhour_sanitized=htmlspecialchars($varhour, ENT_QUOTES, 'UTF-8');
   
$vardayofshow=$_POST['dayofshow'];
$vardayofshow_sanitized=htmlspecialchars($vardayofshow, ENT_QUOTES, 'UTF-8');

   $vargain=$_POST['gain'];
$vargain_sanitized=htmlspecialchars($vargain, ENT_QUOTES, 'UTF-8');
   
$varminute=$_POST['minute'];
$varminute_sanitized=htmlspecialchars($varminute, ENT_QUOTES, 'UTF-8');
   


$varcommand="/bin/bash /var/www/html/scripts/hdcron.sh";
$varspace=" ";
$f=$varcommand.$varspace.$varfreq1_sanitized.$varspace.$varfreq_sanitized.$varspace.$varhour_sanitized.$varspace.$vardayofshow_sanitized.$varspace.$varsubstation_sanitized.$varspace.$varminute_sanitized;
   $varpatternfreq1="/^\d{1,3}$/";
   $vargain="/^\d{1,2}\.\d{1}$/";
   $varpatternfreq="/^\d{1,3}$/";
   $varpatternhour="/^(?:[1-9]|[1-5]\d|24)$/";
   $varpatternminute="/^(?:[1-9]|[1-5]\d|60)$/";
   $varpatternsubstation="/[1-4]/";
   $varpatterndayofshow="/^.{1,3}$/";
if ((preg_match($varpatternfreq1, $varfreq1_sanitized) && preg_match($varpatternfreq, $varfreq_sanitized) && preg_match($varpatternhour, $varhour_sanitized) && preg_match($varpatternminute, $varminute_sanitized) && preg_match($varpatternhour, $varhour_sanitized) && preg_match($varpatterndayofshow, $vardayofshow_sanitized) && preg_match($varpatternsubstation, $varsubstation_sanitized))) {
  echo "Successfully Scheduled Recording"; 
   $message3=shell_exec($f);
   echo "<pre>$message3</pre>";
}
else { 
   echo "Your input didn't validate";
}
}
if(array_key_exists('stoprec', $_POST)) {
 echo "Sending Message to Stop Service";
$command="sudo /bin/bash /var/www/html/scripts/sigint.sh';
$varspace=" ";
 $varpatterntunerselect="/^\d{1,6}$/";
if ((preg_match($varpatterntunerselect, $vartunerselect_sanitized)){
$f=$command.$varspace.$vartunerselect_sanitized;
$message3=shell_exec($f);
   echo "<pre>$message3</pre>";
}
}
?>
<html>
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
</br>
<script>
window.onload = function() {
 fillSelect("../txtfiles/m1.txt","freq1");
fillSelect("../txtfiles/m3.txt","freq");
fillSelect("../txtfiles/g1.txt","gain");
fillSelect("../txtfiles/m.txt","minute");
fillSelect("../txtfiles/h.txt","hour");
fillSelect("../txtfiles/cday.txt","dayofshow");
fillSelect("../txtfiles/sub.txt","substation");
}
</script>
<form action="" method="post">
<label for="station">Choose a Radio Station:</label>
</br>
<select style="width:20%;" name="freq1" id="freq1">
</select>
<select style="width:20%;" name="freq" id="freq">
</select>
<select style="width:20%;" name="substation" id="substation">
</select>
</br>
<label for="minute">Minute:</label>
<select name="minute" id="minute">
</select>
<label for="hour">Hour:</label>

<select name="hour" id="hour">
</select>
<label for="day of show">Day of Show</label>
<select name="dayofshow" id="dayofshow">
</select>

<label for="gain">Choose the antenna gain:</label>
<select name="gain" id="gain">
</select>
</br></br>



<input type="submit" name="dcron" value="Schedule Recording"/>
<?php
$command_output=shell_exec('sudo /bin/bash /var/www/html/scripts/tunerpid.sh');
<select name="tunerselect" id="tunerselect">
            <option value="">Select which tuner to stop</option>
       $lines = explode(PHP_EOL, $output);

    // Loop through each line and process it
    foreach ($lines as $line) {
                echo "<option value=\"". htmlspecialchars($line) ."\">". htmlspecialchars($line) ."</option>";
    } </select>
?>
   
   <input type="submit" name="stoprec" value="Stop Recording"/>
</form>
</html>
