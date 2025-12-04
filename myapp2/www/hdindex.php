<?php
if(isset($_POST['submit'])) {
$message3=shell_exec('echo "test"');
   echo "<pre>$message3</pre>";
}

if(array_key_exists('dcron', $_POST)) {

$varfreq=$_POST['freq1'];

 $varfreq1=$_POST['freq'];
$varperiod=".";
$varcommandarams=$varfreq.$varperiod.$varfreq1;



$varsubstation=$_POST['substation'];






$varhour=$_POST['hour'];
$vardayofshow=$_POST['dayofshow'];
$vargain=$_POST['gain'];
$varminute=$_POST['minute'];


$varcommand="/bin/bash /var/www/html/scripts/hdcron.sh";
$varspace=" ";
$f=$varcommand.$varspace.$varcommandarams.$varspace.$varhour.$varspace.$vardayofshow.$varspace.$varsubstation.$varspace.$varminute;
   $varpatternfreq1="/^\d{1,3}$/";
   $vargain="/^\d{1,2}\.\d{1}$/";
   $varpatternfreq="/^\d{1,3}$/";
   $varpatternhour="/^(?:[1-9]|[1-5]\d|24)$/";
   $varpatternminute="/^(?:[1-9]|[1-5]\d|60)$/";
   $varpatternsubstation="/[1-4]/";
   $varpatterndayofshow="/^.{1,3}$/";
if ((preg_match($varpatternfreq1, $varfreq1) && preg_match($varpatternfreq, $varfreq) && preg_match($varpatternhour, $varhour) && preg_match($varpatternminute, $varminute) && preg_match($varpatternhour, $varhour) && preg_match($varpatterndayofshow, $vardayofshow) && preg_match($varpatternsubstation, $varsubstation))) {
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
<head>
<script src="../script.js"></script>
<link rel="stylesheet" href="../styles.css">
</head>
<label for="selectbox">Goto WebPage:</label>
<select id="selectbox" name="" onchange="javascript:location.href = this.value;">
<option value="">Choose Page To Go To:</option>
    <option value="../index.php">Record SD FM</option>
    <option value="../hdindex.php">Record HD Radio</option>
    <option value="../cronkeep/src">Manage Recordings</option>
    <option value="../sradio.php">Stream FM Radio</option>
  <option value="../hdradio.php">Stream HD Radio</option>
 <option value="../tunerec.php">Record Tune In Radio</option>
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
<label for="minute">minute:</label>
<select name="minute" id="minute">
</select>
<label for="hour">hour:</label>

<select name="hour" id="hour">
</select>
<label for="day of show">day of show</label>
<select name="dayofshow" id="dayofshow">
</select>

<label for="gain">Choose the antenna gain:</label>
<select name="gain" id="gain">
</select>
</br></br>



<input type="submit" name="dcron" value="submit"/>
</form>
</html>








