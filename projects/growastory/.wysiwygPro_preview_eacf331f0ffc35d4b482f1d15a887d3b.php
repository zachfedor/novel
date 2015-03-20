<?php
if ($_GET['randomId'] != "HZvEoZcufuZkuUK0iyhboQhLOU1uBKg8BNovWHL1bj1gfNAo5ARXSuCCUqboit2Q") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
