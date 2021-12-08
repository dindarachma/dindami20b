<?php
    session_start();
    session_destroy();
    header("location:login.php?pesan=success&frm=logout"); 
?>