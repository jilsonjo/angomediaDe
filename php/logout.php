<?PHP
session_start();
unset($_SESSION["useremail"]);
session_destroy();
header('Location: https://angomedia.de');