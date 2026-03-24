<?php
    session_start();
    session_unset();//removing session data => $_SESSION=[];
    session_destroy();//deleting the file on the server for the session data
    setcookie(session_name(), '', time() - 3600, '/');//deleting the cookie phpsessId

    header('Location:sign-up.php');
?>