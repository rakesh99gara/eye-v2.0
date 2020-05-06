<?php //to ensure you are using same session
session_start();
//session_unset();
session_destroy(); //destroy the session
header("location: index.html"); //to redirect back to "index.php" after logging out
exit();
?>
