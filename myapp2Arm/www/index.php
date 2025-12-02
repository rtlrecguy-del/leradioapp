<?php
if(isset($_POST['submit'])) {
$message3=shell_exec('echo "test"');
   echo "<pre>$message3</pre>";
}

if(array_key_exists('dcron', $_POST)) {
$varfreq1=$_POST['freq'];
$varfreq=$_POST['freq1'];
$varcommanderiod=".";
$varcommandarams=$varfreq.$varcommanderiod.$varfreq1;



$vargain=$_POST['gain'];





 $varfreq=$_POST['freq'];
$varhour=$_POST['hour'];
$vardayofshow=$_POST['dayofshow'];
$vargain=$_POST['gain'];
$varminute=$_POST['minute'];


$varcommand="/bin/bash /var/www/html/scripts/cron.sh";
$varspace=" ";
$f=$varcommand.$varspace.$varcommandarams.$varspace.$varhour.$varspace.$vardayofshow.$varspace.$vargain.$varspace.$varminute;
echo "$f";
$message3=shell_exec($f);
   echo "<pre>$message3</pre>";
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
    <option value="../index.php">Record FM</option>
    <option value="../recordings">Open Recordings</option>
    <option value="../hdindex.php">Record HD Radio</option>
    <option value="../cronkeep/src/">Manage Recordings</option>
    <option value="../sradio.php">Stream FM Radio</option>
  <option value="../hdradio.php">Stream HD Radio</option>
 <option value="../tunerec.php">Record Tune In Radio</option>
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


<label for="minute">minute:</label>
<select name="minute" id="minute">
</select>



<label for="hour">hour:</label>

<select name="hour" id="hour">
</select>
<label for="day of show">day of show</label>
<select name="dayofshow" id="dayofshow">
</select>


<label for="gain">gain:</label>
<select name="gain" id="gain">
</select>

</br></br>

<input type="submit" name="dcron" value="Record FM"/>

</form>
</body>
</html>
















