<?php
session_start();
unset($_SESSION['id']); 
session_destroy();
header("Location: http://www.blitzschlag.org");
 ?>
