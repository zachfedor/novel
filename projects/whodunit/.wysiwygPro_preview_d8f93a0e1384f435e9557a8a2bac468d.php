<?php
if ($_GET['randomId'] != "lasAxiJJrNhm3Xt6xxz8XVkiROX5ffBBA9oZwyZ41zprHRVsm9usGNjJXlbek9QN") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
