<?php
if(array_key_exists('dcron', $_POST)) {
$directoryPath = './var/www/html/recordings/'; 

if (is_dir($directoryPath)) {

    $files = scandir($directoryPath);

    // Filter out '.' and '..' entries
    $files = array_diff($files, array('.', '..'));

    echo '<select name="selected_file">';
    echo '<option value="">--Select a file--</option>';


    foreach ($files as $file) {
        if (is_file($directoryPath . $file)) {
            echo '<option value="' . htmlspecialchars($file) . '">' . htmlspecialchars($file) . '</option>';
        }
    }
    echo '</select>';
} else {
    echo '<p>Error: Directory not found.</p>';
}}
?>
<html>



  
</html>
