<?php
if(isset($_POST['submit'])) {
$command_output = shell_exec('echo "test');
$sanitized_output = htmlspecialchars($command_output, ENT_QUOTES | ENT_HTML5, 'UTF-8');
echo $sanitized_output;
  $command = "ps aux | grep '[f]fmpeg'";
    $output = shell_exec($command);

    if ($output === null) {
        echo "No Processes Running\n";
    } else {
        $processes = explode("\n", trim($output));
        $ffmpeg_process_count = count($processes);

    
        if (empty(trim($output))) {
            $ffmpeg_process_count = 0;
        }
$sanitized_process_count=htmlspecialchars($ffmpeg_process_count_output, ENT_QUOTES | ENT_HTML5, 'UTF-8')
        echo "Total Number of Processes Recording or Listening: " . $sanitized_process_count. "\n";
    }
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
}
}
if(array_key_exists('stopplay', $_POST)) {
 echo "Sending Message to Stop Service";
$message3=shell_exec('/bin/bash /var/www/html/scripts/signint.sh');
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
<input type="submit" name="stopplay" value="Stop Radio"/>
</form>
</body>
</html>
